<?php 
session_start();
$page_title = "Add student";
$css_file = 'style.css';


if(isset($_SESSION['name'])){
require_once("./init.php");


if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "POST"){
    $name   = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
    $collage  = filter_var($_POST['collage'],FILTER_SANITIZE_EMAIL);
    $department  = filter_var($_POST['department'],FILTER_SANITIZE_NUMBER_INT);
    $GPA   = filter_var($_POST['GPA'],FILTER_SANITIZE_STRING);

    add_student($name,$department,$collage,$GPA);
}

?>


<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
<div class="container mt-5">
  <div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" value="<?php echo $students_data['name']?>" name="name" class="form-control">
  </div>

  <div class="mb-3">
    <label class="form-label">collage</label>
    <input type="text" value="<?php echo $students_data['collage']?>" name="collage" class="form-control">
  </div>

  <div class="mb-3">
    <label class="form-label">department</label>
    <input type="text" value="<?php echo $students_data['department']?>" name="department" class="form-control">
  </div>

  <div class="mb-3">
    <label class="form-label">GPA</label>
    <input type="text" value="<?php echo $students_data['GPA']?>" name="GPA" class="form-control">
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>

<?php include_once("./includes/footer.php");
}else{
  header("location:signin.php"); 
}
 ?>