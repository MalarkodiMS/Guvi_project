$(document).ready(function () {
  $("#registrationForm").submit(function (e) {
    e.preventDefault();

    var username = $("input[name='username']").val();
    var email = $("input[name='email']").val();
    var dept=$("input[name='dept']").val();
    var college=$("input[name='college']").val();
    var password = $("input[name='password']").val();
    
    alert(username);
    $.ajax({
      url: "php/register.php",
      method: "POST",
      data: {
        username: username,
        email: email,
        dept:dept,
        college:college,
        password: password
       
      },
      success: function (data) {
        alert(data);
        $("#registrationForm")[0].reset();
      },
    });
  });
});