// Wait for the DOM to be ready
$(function() {
  // add regex method to validate phone number
  // function is expecting value(input)
  // use built in method test to validate number against pattern
  $.validator.addMethod("phone", function(value){
    // ^\s* = Line start, match any whitespaces at the beginning if any.
    // (?:\+?(\d{1,3}))?   #GROUP 1: The country code. Optional.
    // [-. (]*             #Allow certain non numeric characters
    // (\d{3})             #GROUP 2: The Area Code. Required.
    // [-. )]*             #Allow certain non numeric characters
    // (\d{3})             #GROUP 3: The Exchange number. Required.
    // [-. ]*              #Allow certain non numeric characters
    // (\d{4})             #Group 4: The Subscriber Number. Required.
    // (?: *x(\d+))?       #Group 5: The Extension number. Optional.
    // \s*$                #Match any ending whitespaces if any and the end of string.
    return /^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$/.test(value);
  });
  // Initialize form validation on the form.
  $("form[id='contactForm']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute of an input field. 
      // Validation rules are defined on the right side
      firstName: {
        required: true,
        minlength: 2,
      },
      lastName:{
        required: true,
        minlength: 2,
      },
      email: {
        required: true,
        // Specify that email should be validated
        // by the built-in "email" rule
        email: true
      },
      phone: {
        required: true,
        //minlength: 10,
        phone: true,
      },
      comments: {
        required: true,
        maxlength: 250, 
      }
    },

    // Specify validation error messages
    messages: {
      firstName: "Please enter your firstname",
      lastName: "Please enter your lastname",
      email: "Please enter a valid email address",
      phone: {
        required: "Please provide a phone number",
        phone: "Your phone number must be 10 digits long",
      },
      comments: {
        maxlength: "Comment is too long",
      }
    },

    // the form is submitted to the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
    
  });
});