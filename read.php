<?php 
$connection = new mysqli("localhost", "root", "", "jobify");
$sql = "SELECT * FROM jobs";
$res = $connection->query($sql);

if(isset($_GET['page'])) {
  $page = $_GET['page'];
}else{
  $page = 1;
}

$rows_per_page = 4;
$total_rows = $res->num_rows;
$total_pages = ceil($total_rows/$rows_per_page);

$offset = ($page - 1) * $rows_per_page;
$sql = "SELECT * FROM jobs LIMIT $offset, $rows_per_page";
$res = $connection->query($sql);

if($_POST) {
  $search_term = $_POST['search_term'];

  $sql2 = "SELECT * FROM jobs WHERE name LIKE '%{$search_term}%'OR email LIKE '{$search_term}'";
  $res = $connection->query($sql2);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
      .batn{
        background: red;
        border-radius: 10px;
        border: 2px solid white;
        padding: 5px;

      }
      .button1{
            background: blue; 
            outline: none;
            padding: 10px;
            color: white;
            border-radius: 3px;
            border: none;
            font-size: 20px;

        }
        .input{
          padding: 5px;
          border-radius: 3px;
          border: 1px solid black;
        }
        .new{
          margin-left: 50%;
        }
        .row{
          --bs-gutter-x: 0 !important;
        }
    </style>
  </head>
<body>
<div class="row">
<h1 class="text-center text-light bg-primary p-5">EMPLOYEES DATA</h1>

<div class="col-lg-6">
  <form  class="" method="POST">
    <div class="mt-5">
      <input class="input" type="text" name="search_term" placeholder="Search Here" >
      <!-- <input class="input" type="submit" value="Search"> -->
      <button type="submit"  value="Search" class="btn btn-primary">Search Here</button>
  
    </div>
  </form>
</div>

<div class="col-lg-6">
        <div class="mt-5">
        <a href="create.php"><button type="button" class="btn btn-primary new">Add New</button></a>
        </div>
</div>
</div>

<table class="table table-borderless table-hover table-stripes">

  <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Age</th>
        <th>Options</th>

    </tr>
  </thead>
  <tbody>
  <?php
  if($res->num_rows > 0) {
    $id = $offset+1;  
    while ($row = $res->fetch_assoc() ) { ?>
    <tr>
    <td><?php echo $id; ?></td>
    <td> <?php echo $row['name']; ?></td>
    <td> <?php echo $row['email']; ?></td>
    <!-- <td>Momin Abad</td> -->
    <td> <?php echo $row['number']; ?></td>
    <td>
    
      <a href="update.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-primary">Update</button></a>
      <a href="delete.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-primary">Delete</button></a>
    </td>
</tr>
<?php $id++; } } else{
                echo "<script> alert('No Data To show')</script>";

} ?>

  </tbody>
</table>
<!-- Pagination starts  -->
<ul class="pagination">
        <?php if ($page > 1) { ?>
         <li class="page-item"><a class="page-link" href="read.php?page=<?php echo $page-1; ?>">Previous</a></li>
         <?php } ?>
         <?php 
     //second step   
     for ($i = 1; $i <= $total_pages; $i++){
        if ($page == $i) {
            echo '<li class="page-item active"><a class="page-link" href="read.php?page='.$i.'">'.$i.'</a></li>';
        } else {
            echo '<li class="page-item"><a class="page-link" href="read.php?page='.$i.'">'.$i.'</a></li>';
        }
     }
     ?>
     <?php if ($page < $total_pages) { ?>
       <li class="page-item"><a class="page-link" href="read.php?page=<?php echo $page+1; ?>">Next</a></li>
       <?php } ?>
     </ul>

</body>
</html>