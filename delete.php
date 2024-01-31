<?php
$connection = new mysqli("localhost", "root", "", "jobify");
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM users_data WhERE id = $id";
    $res = $connection->query($sql);
    if($res == 1){
        header('location: employe.php');
    }else{
        echo "Error";
    }
}

?>