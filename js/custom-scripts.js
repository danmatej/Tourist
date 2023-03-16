$(document).ready(function() {
  // Add event listener for password and confirm password inputs
  $('#password, #confirmPassword').on('input', function() {
    // Get password and confirm password values
    const password = $('#password').val();
    const confirmPassword = $('#confirmPassword').val();

    // Validate passwords
    const { valid, message } = validatePasswords(password, confirmPassword);

    // Update UI
    if (valid) {
      $('#submitButton').prop('disabled', false);
      $('#errorMessage').text('');
      $('#errorMessage').removeClass('text-center alert alert-danger');
    } else {
      $('#submitButton').prop('disabled', true);


      $('#errorMessage').text(message);
      $('#errorMessage').addClass('text-center alert alert-danger');
    }
  });
});

function validatePasswords(password, confirmPassword) {
  // Check if password fields are empty
  if (password.trim() === '' || confirmPassword.trim() === '') {
    return { valid: false, message: 'Passwords cannot be empty' };
  }

  // Check if passwords match

  if (password !== confirmPassword) {
    return { valid: false, message: 'Passwords do not match' };
  }


  // Check password length
  if (password.length < 8) {
    return { valid: false, message: 'Password must be at least 8 characters long' };
  }


  // Check for at least one uppercase letter, one lowercase letter, and one number
  const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/;
  if (!passwordRegex.test(password)) {
    return { valid: false, message: 'Password must contain at least one lowercase letter, one uppercase letter, and one number' };
  }

  // All checks passed
  return { valid: true };
}