<?php
$connection = new mysqli("localhost", "root", "", "jobify");
 
if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$sql = "SELECT * FROM users_data WHERE id = $id";
$res = $connection->query($sql);
$row = $res->fetch_assoc();

if($_POST){
    $name = mysqli_real_escape_string($connection, $_POST['full_name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);

    $sql2 = "UPDATE users_data SET name = '{$name}', email = '{$email}' WHERE id = $id";
    $res2 = $connection->query($sql2);

    if($res2 == 1){
        header("location: employe.php");
    }else{
        echo "Something Wrong Please Check";
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST" class="form">

    <input class="input" type="text" required name="full_name" value='<?php echo $row['name']?>' placeholder="Enter Your Name..."><br>
    <input class="input" type="email" required name="email" value='<?php echo $row['email']?>' placeholder="Enter Your Email..."><br>
    <input class="input" type="password" required name="password" value='<?php echo $row['password']?>' placeholder="Enter Your Password..."><br>
    <input class="input" type="number" required name="number" value='<?php echo $row['mobile']?>' placeholder="Enter Your Number..."><br>
    <input class="submit" type="submit"><br>
    
    </form>                                   
    
</body>
</html>