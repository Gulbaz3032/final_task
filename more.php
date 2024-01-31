<?php
$connection = new mysqli("localhost", "root", "", "jobify");

session_start();

if(!isset($_SESSION['name'])){
    header('location: index.php');
}
if(isset($_POST['logout'])){
    session_destroy();
    header('location: index.php');
}

if(isset($_POST['data'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $img_name = $_FILES['img']['name'];
    $img_tmp_name = $_FILES['img']['tmp_name'];
    $img_size = $_FILES['img']['tmp_name'];

    $img_type = $_FILES['img']['type'];
    $type_split = explode('/', $img_type);
    $img_ext = end($type_split);

    $req_ext = ['jpg', 'png', 'jpeg'];

    $gender = $_POST['gender'];
    $frontend_skills = $_POST['frontend_skills'];
    $backend_skills = $_POST['backend_skills'];
    $frontend_skills_serialized = implode(', ', $frontend_skills);
    $backend_skills_serialized = implode(', ', $backend_skills);
    $img_name = rand().$img_name;
    move_uploaded_file($img_tmp_name, "images/".$img_name);
    $sql = "INSERT INTO users_data (name, email, img, gender, frontend_skills, backend_skills) VALUES ('{$name}', '{$email}', '{$img_name}', '{$gender}', '{$frontend_skills_serialized}', '{$backend_skills_serialized}')";
    $res = $connection->query($sql);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkbox</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

      <style>
        body{
          background: white-smoke;
        }
        .dream{
        font-size: 50px;
      }
      .super{
        color: #1A91CF;
      }
      .come{
        color: #1A91CF;

      }
      .photo{
        width: 600px;
      }
      .row{
        height: 100vh;
        --bs-gutter-x: 0 !important;
      }
      .button1{
            background: #1A91CF; 
            outline: none;
            padding: 10px;
            color: white;
            border-radius: 3px;
            border: none;
            font-size: 20px;

        }
        .buton{
          background: #1A91CF; 
            outline: none;
            padding: 10px;
            color: white;
            border-radius: 3px;
            border: none;
            font-size: 20px;
        }
        .button3{
            background: #1A91CF; 
            outline: none;
            padding: 8px;
            color: white;
            border-radius: 3px;
            border: none;
            font-size: 20px;
            margin-left: 76%;
        }
      </style>
      
      </head>

<body>


<div class="row">
    <div class="col-lg-6">
    <h3 class="text-center come mt-4">Well Come to JOBIFY</h3>


    <h1 class="mt-5 pt-5  mx-5 dream">Find Your Dream Job</h1>
        <h1 class="super mx-5"> is Super Easy</h1>
        <h1 class="mx-5"> Now.</h1>
        <h5 class="mt-5 mx-5">Look beyound the obvious. Use Cutshort to easily <br> get discovered by awesome companies.</h5>
        <a href="img.php"><button type="submit" class="button1 mx-5 mt-3">Find Job</button></a>



    </div>
    <div class="col-lg-6">
    <form method="POST">
        <input class="button3 mt-4" type="submit" name="logout" value="Log Out" name="Submit_btn">
    </form>
      <div class="mt-5 pt-3">
      <img src="resize.jpeg" class="photo" alt="" srcset="">
      </div>
    </div>

  </div>

        <h4 class="come text-center mb-5">if you are intrested please fill the given form</h4>
        
<form method="post" enctype="multipart/form-data">

<div class="w-25 mx-auto">
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Enter Your Name</label>
    <input type="text" class="form-control"  id="exampleInputEmail1"name="name" aria-describedby="emailHelp">
    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Enter Your Email</label>
    <input type="email" class="form-control" name="email" id="exampleInputPassword1">
  </div>
    
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Select Your Image</label>
    <input type="file" class="form-control" name="img" id="exampleInputPassword1">
  </div>
    Select Your Gender
  <div class="form-check">
  <input class="form-check-input" type="radio" value="male" name="gender" id="male">
  <label class="form-check-label" for="flexRadioDefault1">
    Male
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="gender" value="female" id="female">
  <label class="form-check-label" for="flexRadioDefault2">
    Female
  </label>
</div>
</div>


<h5 class="come mb-3 mt-5 text-center">Select Your Frontend Languages</h5>


    <ul class="list-group w-100 mx-auto">
        <li class="list-group-item">
            <input class="form-check-input me-1" type="checkbox" value="html" name="frontend_skills[]" id="html"
                aria-label="...">
            HTML
        </li>
        <li class="list-group-item">
            <input class="form-check-input me-1" type="checkbox" value="css" name="frontend_skills[]" aria-label="..."
                id="css">
            CSS
        </li>
        <li class="list-group-item">
            <input class="form-check-input me-1" type="checkbox" value="bootstrap" id="bootstrap" name="frontend_skills[]"
                aria-label="...">
            Bootstrap
        </li>

        <li class="list-group-item">
            <input class="form-check-input me-1" type="checkbox" value="js" id="js" name="frontend_skills[]"
                aria-label="...">
            JS
        </li>
        <li class="list-group-item">
            <input class="form-check-input me-1" type="checkbox" value="react" id="react" name="frontend_skills[]"
                aria-label="...">
            React.js
        </li>

        <h5 class="mt-3 mb-2 come">Select Your Backend Languages</h5>


            <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="python" name="backend_skills[]" id="python"
                    aria-label="...">
                Python
            </li>
            <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="node" name="backend_skills[]" aria-label="..."
                    id="node">
                Node.js
            </li>
            <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="java" id="java" name="backend_skills[]"
                    aria-label="...">
                Java
            </li>
            <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="ruby" id="ruby" name="backend_skills[]"
                    aria-label="...">
                Ruby
            </li>
            <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="php" id="php" name="backend_skills[]"
                    aria-label="...">
                PHP
            </li>

        <a href="employe.php"><input type="submit" value="submit" name="data" class="btn buton mt-3"></a>

        </ul>



  </form>
 
         <!-- Checking above  -->

      
</body>

</html>