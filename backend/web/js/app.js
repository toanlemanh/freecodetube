$(function(){
    'use strict';
    $('#videoFile').change(event => {
        $(event.target).closest('form').trigger('submit');
    })
    // add style for chip component (tagsinput)
    $('#video-tags').tagsinput({
        tagClass: 'badge bg-info',
    });

});