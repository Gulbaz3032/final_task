<?php


// session_start();

// if(!isset($_SESSION['name'])){
//     header('location: login.php');
// }
// if($_POST){
//     session_destroy();
//     header('location: login.php');
// }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>WEll Come</h1>
    <h4>Hello <?php echo $_SESSION['name']?> </h4>
    <h4>Your Email Is <?php echo $_SESSION['email']?> </h4>

    <form method="POST">
        <input type="submit" value="Log Out" name="Submit_btn">
    </form>
</body>
</html>