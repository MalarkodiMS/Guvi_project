$(document).ready(function () {
  // Get the user data from local storage
  var userData = JSON.parse(localStorage.getItem("userData"));
    console.log(userData)
    console.log(userData.username)
  // Display the user data on the page
  $("#name").val(userData.username);

  // Set the value of the email input field
  $("#email").val(userData.email);
  $("#department").val(userData.dept);
  $("#college").val(userData.college);
  
});