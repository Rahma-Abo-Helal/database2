
<?php


/*
/////////////////register//////////////////
*/ 

function register($name,$email,$password){
    global $con;
    
    $stmt = $con->prepare("INSERT INTO user(name,email,password) VALUES(?,?,?)");
    $stmt->execute(array($name,$email,$password));
    
    echo "
    <script>
        toastr.success('تم بنجاح :- تم اضافة الصلاحيه بنجاح')
    </script>";
    
    header("Refresh:1;url=index.php"); 
    }



    /*
/////////////////login//////////////////
*/ 

    function login($email,$passwrd){
        global $con;
        $stmt = $con->prepare("SELECT * FROM user WHERE email=?");
        $stmt->execute(array($email));
        $user_data = $stmt->fetch();
        $row_count = $stmt->rowCount();
        if($row_count > 0){
            if(password_verify($passwrd,$user_data['password'])){
                @session_start();
                $_SESSION['id']    = $user_data['id'];
                $_SESSION['name']  = $user_data['name'];
                $_SESSION['email']  = $user_data['email'];
                header("Refresh:1;url=index.php");
                echo "
                <script>
                    toastr.success('تم بنجاح :- تم تسجيل الدخول')
                </script>";
                header("Refresh:1;url=index.php");
            }else{
                echo "
                <script>
                    toastr.error(' كلمة السر غير صحيحة')
                </script>";
            }
        }else{
            echo "
                <script>
                    toastr.error('البريد الالكتروني غير صحيح')
                </script>";
        }
    }
// if(sha1($passwrd) == $user_data['password']){
/*
/////////////////add student//////////////////
*/ 

function add_student(&$name,$department,$collage,$GPA){
global $con;

$stmt = $con->prepare("INSERT INTO students(name,collage,department,GPA) values(?,?,?,?)");
$stmt->execute(array($name,$collage,$department,$GPA));

echo "
<script>
    toastr.success('تم بنجاح :- تم اضافة الصلاحيه بنجاح')
</script>";

header("Refresh:1;url=index.php"); 
}

/*
/////////////////delete student with id//////////////////
*/ 
function delete_with_id($table,$id){
    global $con;
    
    $stmt = $con->prepare("DELETE FROM students WHERE id=?");
    $stmt->execute(array($_GET['id']));
    header('location:index.php');

}

/*
/////////////////get all student//////////////////
*/ 
function get_all_students($table){
global $con;

$stmt = $con->prepare("SELECT * FROM $table");
$stmt->execute();
$students = $stmt->fetchAll();

return $students;
}
