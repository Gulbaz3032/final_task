<?php 
$conn = new mysqli ('localhost', 'root', '', 'jobify');
if ($_POST) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $img_name = $_FILES['img']['name'];
    $img_tmp_name = $_FILES['img']['tmp_name'];
    $img_size = $_FILES['img']['tmp_name'];

    $img_type = $_FILES['img']['type'];
    $type_split = explode('/', $img_type);
    $img_ext = end($type_split);

    $req_ext = ['jpg', 'png', 'jpeg'];
    
    if (in_array($img_ext, $req_ext)) {
        if ($img_size > 2000000) {
            echo "Img is too large";
        } else {
            $img_name = rand().$img_name;
            $sql = "INSERT INTO photos (name, img, email, gender) VALUES ('{$name}', '{$img_name}', '{$email}', '{$gender}')";
            $res = $conn->query($sql);
            if ($res > 0) {
                // move_uploaded_file($img_tmp_name, "uploads/".$img_name);
                echo "<script> alert('Successfully Submited')</script>";
                header('location: more.php');
            } else {
                echo "failure";
            }
        }
    } else {
        echo "Inappropriate format";
    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Cv Uploads</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
    <style>
      .come{
        color: #1A91CF;

      }
    </style>
</head>
<body>
    <!-- <form method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Name..."><br>
        <input type="file" name="img">
        <input type="submit">
    </form> -->
    <h4 class="come text-center mb-5">if you are intrested please fill the given form</h4>

    <form method="post" enctype="multipart/form-data" class="w-25">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Enter Your Name</label>
    <input type="text" class="form-control"  id="exampleInputEmail1"name="name" aria-describedby="emailHelp">
    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Enter Your Email</label>
    <input type="email" class="form-control" name="email" id="exampleInputPassword1">
  </div>
    
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Select Your Cv Or Image</label>
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
  
  <button type="submit" class="btn btn-primary mt-3">Submit</button>
</form>


</body>
</html>