<?php

session_start();

if(isset($_SESSION['name'])){
    header('location: more.php');
}

$connection = new mysqli("localhost", "root", "", "jobify");
if($_POST){

    $email = $_POST['email'];
    $password = $_POST['password'];

 $sql = "SELECT * FROM users WHERE password = '{$password}' AND email = '{$email}' OR name = '{$email}'";

    $res = $connection->query($sql);
    
    if($res->num_rows > 0){
        // Echo User Exist 
        $user_data = $res->fetch_assoc();
        $_SESSION['name'] = $user_data['name'];
        $_SESSION['email'] = $user_data['email'];
        header('location: more.php');

    }else{
        // echo "Wrong Email or Password";
        echo "<script> alert('Wrong Email or Password Please Try Again')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
    .input {
        background: #00B050;
        outline: none;
        padding: 10px;
        color: white;
        border-radius: 3px;
        border: none;
        font-size: 20px;
    }

    .log {
        color: #00B050;
    }
    </style>
</head>

<body>
    <form method="POST" class="w-25 m-auto ">
        <h3 class="mx-5 mt-5 log">LOGIN HERE</h3>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Enter Your Email Address</label>
            <input type="email" class="form-control" required name="email" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Enter Your Password</label>
            <input type="password" class="form-control" required name="password" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <input class="input" type="Submit">
    </form>



</body>

</html>