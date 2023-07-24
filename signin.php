<?php
$page_tittle ='signin';
$css_file ='style.css';
require_once("./init.php");

if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "POST"){
    $email  = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $password   = filter_var($_POST['password'],FILTER_SANITIZE_STRING);

   
    login($email,$password);
}



?>

<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
<div class="container mt-5">
  <div class="mb-3">
    <label class="form-label">email</label>
    <input type="email" value="<?php echo $students_data['collage']?>" name="email" class="form-control">
  </div>

  <div class="mb-3">
    <label class="form-label">password</label>
    <input type="password" value="<?php echo $students_data['department']?>" name="password" class="form-control">
  </div>
 
  <button type="submit" class="btn btn-primary">login</button>
</div>
</form>

<?php include_once("./includes/footer.php");
 ?>