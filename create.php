<?php 
$connection = new mysqli("localhost", "root", "", "jobify");
if($_POST){

$fullname = $_POST['full_name'];
$email = $_POST['email'];
$password = base64_encode($_POST['password']);
$number = $_POST['number'];

$sql = "INSERT INTO jobs (name, email, password, number) VALUES ('{$fullname}', '{$email}', '{$password}', '{$number}')";
$res = $connection->query($sql);

if ($res ==  1){
    echo "<script> alert('Successfully Submited')</script>";
}else{
    echo "<script> alert('Something wrong Please Check you email or Password')</script>";
}
}
?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JOBIFY</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
      .ify{
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
    </style> 
  </head>
   <body>
                                    
    
    <form method="POST" class="w-25 m-auto">
        <h1 class="mt-5 mb-4 text-center ify">JOBIFY</h1>
    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Enter Your Name</label>
    <input type="text" class="form-control" required name="full_name" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Enter Your Email Address</label>
    <input type="email" class="form-control" required name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Enter Your Password</label>
    <input type="password" class="form-control" required name="password" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Enter Your Age</label>
    <input type="number" class="form-control" required name="number" id="exampleInputPassword1">
  </div>

  <button type="submit" class="button1">Submit</button>
</form>
    
  </body>
  </html>