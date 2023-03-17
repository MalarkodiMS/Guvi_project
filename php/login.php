<?php
$conn = mysqli_connect('localhost:3308', 'root', '', 'guvi');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

  $email = $_POST['email'];
  $password = $_POST['password'];

  //$hashed_password = md5($password);
  $qry = "Select * from users where email = '" . $email . "' and password = '" . $password . "'";
  $result = $conn->query($qry);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

  $count = mysqli_num_rows($result);
  if ($count == 1) {
    // user exists
    //session_start();
    //$_SESSION['user_data'] = $row;

    // $response = array(
    //   'status' => 1,
    //   'msg' => 'Login successful'
    // );
    $response = $row;
    
    
  } else {
     $response = array(
       'status' => 0,
       'msg' => 'Invalid Credentials'
     );
      
         
      }
  echo json_encode($response);
  exit();
