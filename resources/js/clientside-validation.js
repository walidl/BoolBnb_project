var $ = require('jquery');
var jquery_validation = require('jquery-validation');

$(document).ready(function () {

  $("#form").validate({
        rules : {
          title : {
            required : true,
            minlength : 2,
            lettersonly : true
          },
          description : {
            required : true,
            minlength : 20
          }
        },

        messages : {
          title : {
            required : 'Please enter a title.',
            minlength : 'Title must have al least two characters.'
          },
          description : {
            required : 'Please enter a description.',
            minlength : 'Description must have at least 20 characters.'
          }
        }

      });

});
