<?php
    // Establish database connection
    $conn = mysqli_connect('localhost:3308', 'root', '', 'guvi');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['dept']) && isset($_POST['college']) && isset($_POST['password'])) {
        // Get form data
        $name = $conn->real_escape_string($_POST['username']);
        $email = $conn->real_escape_string($_POST['email']);
        $dept = $conn->real_escape_string($_POST['dept']);
        $college = $conn->real_escape_string($_POST['college']);
        $password = $conn->real_escape_string($_POST['password']);

        // Prepare and execute insert statement
        $stmt = mysqli_prepare($conn, "INSERT INTO users (username, email,dept,college, password) VALUES (?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param( $stmt,'sssss', $name, $email, $dept , $college , $password);
        if (mysqli_stmt_execute($stmt)) {
            echo "User registered successfully!";
            header('Location: http://localhost/Guvi/login.html');
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
            //header('Location: http://localhost/Guvi/login.html');
        }

        // Close statement and connection
        mysqli_stmt_close($stmt);
    }
   
    // Close connection
    mysqli_close($conn);
?>