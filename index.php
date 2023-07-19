<?php
$page_tittle ='All student';
$css_file ='style.css';
include_once('./includes/header.php');
require_once('./connect_db.php');

global $con;
$stmt = $con->prepare('SELECT * FROM students');
$stmt->execute();
$students = $stmt->fetchAll();

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
    ?>