var $ = require('jquery');
var jquery_validation = require('jquery-validation');

$(document).ready(function () {

  $.validator.addMethod( "extension", function( value, element, param ) {
	param = typeof param === "string" ? param.replace( /,/g, "|" ) : "png|jpe?g|gif";
	return this.optional( element ) || value.match( new RegExp( "\\.(" + param + ")$", "i" ) );
  }, $.validator.format( "Please enter a value with a valid extension." ) );

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
          },
          image : {
            required : true,
            extension : 'jpeg|jpg|png|gif'
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
          },
          image : {
            required : 'Please upload an image',
            extension : 'File must have an image extension.'
          }
        }

      });

});
