<?php
session_start();

if(isset($_SESSION['name'])){
  header('location: more.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
        body{
            font-family: 'Poppins', sans-serif;
        }
        .photo1{
            width: 500px;
            margin-top: 14%;
        }
        .photo2{
            width: 300px;
            margin-top: 14%;
        }
        .row{
            --bs-gutter-x: 0 !important;
        }
        .JOB{
            color: #00B050;
            font-size: 40px;
        }
        .button1{
            background: #00B050; 
            outline: none;
            padding: 10px;
            color: white;
            border-radius: 3px;
            border: none;
            font-size: 20px;

        }
        .img1{
            width: 120px;
        }

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- Navbar starts  -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="10001.png" class="img1 mx-4" alt="" srcset=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-5">
        <li class="nav-item mx-4">
          <a class="nav-link active text-success" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item mx-4">
          <a class="nav-link active text-success" href="#">About</a>
        </li>
        <li class="nav-item mx-4">
          <a class="nav-link active text-success" href="#">Work</a>
        </li>         
        <li class="nav-item mx-4">
          <a class="nav-link active text-success" href="#">Contact</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

        <!-- Navbar Ends  -->

    <div class="row">
        <div class="col-lg-6">
        <img src="10001.png" class="photo2" alt="" srcset="">
        <h6 class="mt-3 mx-5">REIMAGINE YOUR HUMAN CAPITAL<br> STRATEGY WITH MORE EFFICIENCY & DATA<br> INTEGRITY</h6>
        <h3 class="mt-3 mx-5 JOB">JOBIFY Registration</h3>
        <!-- <a href="create.php"><button class="button1 mt-4 mx-5"><i class="fa-solid fa-key"></i>REGISTER</button></a> -->
        <!-- <a href="login.php"><button class="button1 mt-4">LOGIN</button></a> -->
        <a href="create.php"><button type="button" class="btn button1 mt-4 mx-5"><i class="fa-solid fa-key"></i>REGISTER</button></a>
        
        <a href="login.php"><button type="button" class="btn button1 mt-4">LOGIN</button></a>
        </div>
        <div class="col-lg-6">
        <img src="organize_resume.svg" class="photo1" alt="" srcset="" >
        </div>

    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>