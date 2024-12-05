$(function(){
    'use strict';
    $('#videoFile').change(event => {
        $(event.target).closest('form').trigger('submit');
    })

});