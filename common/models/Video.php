<?php

namespace common\models;

use Imagine\Image\Box;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\FileHelper;
use yii\imagine\Image;

/**
 * This is the model class for table "{{%video}}".
 *
 * @property string $video_id
 * @property string $title
 * @property string|null $description
 * @property int|null $created_by
 * @property string|null $tags
 * @property int|null $status
 * @property int|null $has_thumbnail
 * @property string|null $video_name
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property User $createdBy
 */
class Video extends \yii\db\ActiveRecord
{
    const STATUS_UNLISTED = 0;
    const STATUS_PUBLISHED = 1;
    /**
     * @var \yii\web\UploadedFile
     */
    public $video;
    /**
     * @var \yii\web\UploadedFile
     */
    public $thumbnailFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%video}}';
    }
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            [
                'class' => BlameableBehavior::class,
                'updatedByAttribute' => false,
            ]
        ];
    }

    /**
     * {@inheritdoc}
     *
     * I set some default values using rules => by default
     */
    public function rules()
    {
        return [
            [['video_id', 'title'], 'required'],
            [['description'], 'string'],
            [['created_by', 'status', 'has_thumbnail', 'created_at', 'updated_at'], 'integer'],
            [['video_id'], 'string', 'max' => 16],
            [['status'], 'default', 'value'=> self::STATUS_UNLISTED],
            [['has_thumbnail'], 'default', 'value'=> 0],
            [['title', 'tags', 'video_name'], 'string', 'max' => 512],
            [['thumbnailFile'], 'image', 'minWidth' => 1280],
            [['video_id'], 'unique'],
            [['video'], 'file', 'extensions' => 'mp4'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'video_id' => 'Video ID',
            'title' => 'Title',
            'description' => 'Description',
            'created_by' => 'Created By',
            'tags' => 'Tags',
            'status' => 'Status',
            'has_thumbnail' => 'Has Thumbnail',
            'video_name' => 'Video Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\VideoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\VideoQuery(get_called_class());
    }
    public function save($runValidation = true, $attributeNames = null):bool
    {
        // validation and get valid data from video object
        // videoId => random string , not guessable video name => store in file system and database
        $isInserted = $this->isNewRecord;
        if ($isInserted) {
            $this->video_id = Yii::$app->security->generateRandomString(8);
            $this->video_name = $this->video->name;
            $this->title = $this->video->name;
        }
        if ($this->thumbnailFile)
        {
            $this->has_thumbnail = 1;
        }
        $saved = parent::save($runValidation, $attributeNames);
        if (!$saved) {
            return false;
        }
        if ($isInserted) {
            // store video in file system in path
            // check directory @frontend/storage/videos with unique id
            $videoPath = Yii::getAlias('@frontend/storage/videos/' . $this->video_id . '.mp4');
            if (!is_dir(dirname($videoPath))) {
                FileHelper::createDirectory(dirname($videoPath));
            }
            $this->video->saveAs($videoPath);
        }
        if ($this->thumbnailFile)
        {
            $thumbnailPath = Yii::getAlias("@frontend/storage/thumbs/".$this->video_id.".jpg");
            if (!is_dir(dirname($thumbnailPath)))
            {
                FileHelper::createDirectory(dirname($thumbnailPath));
            }
            $this->thumbnailFile->saveAs($thumbnailPath);
            Image::getImagine()
                ->open($thumbnailPath)
                ->thumbnail(new Box(1280, 1280))
                ->save($thumbnailPath);
        }
        return true;
    }
    public function generateVideoLink ()
    {
       return Yii::$app->params['frontendUrl'] .'storage/videos/'. $this->video_id . '.mp4';

    }
    public function generateThumbLink ()
    {
         return Yii::$app->params['frontendUrl'] .'storage/thumbs/'. $this->video_id . '.jpg';
    }
    public function getStatusLabels()
    {
        return [
            self::STATUS_UNLISTED => 'Unlisted',
            self::STATUS_PUBLISHED => 'Published'
        ];
    }
    public function afterDelete()
    {
        //remove stuff
        $videoPath = Yii::getAlias("@frontend/storage/videos/".$this->video_id.".mp4");
        $thumbPath = Yii::getAlias("@frontend/storage/thumbs/".$this->video_id.".jpg");
        if (file_exists($videoPath)) {
            $this->unlink($videoPath);
        }
       if (file_exists($thumbPath)) {
           $this->unlink($thumbPath);
       }
        parent::afterDelete(); // TODO: Change the autogenerated stub
    }
}
