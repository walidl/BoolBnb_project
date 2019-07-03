/*Validation lato client tramite jquery-validation,un plugin jQuery
Controllo dell'input del title e della description nelle pagine che permettono la creazione di un
nuovo appartamento e la modifica di uno già esistente*/

var $ = require('jquery');
var jquery_validation = require('jquery-validation');

$(document).ready(function () {

  $("#form").validate({
        rules : {
          title : {
            required : true,
            minlength : 2
          },
          description : {
            required : true,
            minlength : 20
          },
          email : {
            required : true,
            email : true
          }
        },

        messages : {
          title : {
            required : 'Please enter a title.',
            minlength : 'Title must have at least two characters.'
          },
          description : {
            required : 'Please enter a description.',
            minlength : 'Description must have at least 20 characters.'
          },
          email : {
            required : 'Please enter your email.',
            email : 'Please enter a valid email.'
          }
        }

      });

});
