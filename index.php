<?php
session_start();
$page_tittle ='All student';
$css_file ='style.css';

if(isset($_SESSION['name'])){
require_once("./init.php");

$students = get_all_students("students");
?>

<table class="table">
<thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">collage</th>
        <th scope="col">department</th>
        <th scope="col">GPA</th>
    </tr>
</thead>
<body>

    <?php foreach($students as $students){ ?>
        <tr>
        <td><?php echo $students['id']?></td>
        <td><?php echo $students['name']?></td>
        <td><?php echo $students['collage']?></td>
        <td><?php echo $students['department']?></td>
        <td><?php echo $students['GPA']?></td>
        <td><a class="btn bt-danger" href="delete.php?id=<?php echo $students['id']?>">DELETE</a></td>
    </tr>
    <?php } ?>
    </tbody>
    </table>

    <a href ="add_student.php">ADD STUDENT</a>
    <?php
      include_once("./includes/footer.php");

   }else{
    header("location:signin.php"); 

   }

    ?>