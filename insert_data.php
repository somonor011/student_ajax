<?php
include('con1.php');
$name = $_POST['stu_name'];
$gender = $_POST['stu_gender'];
$course = $_POST['stu_course'];
$profile = $_POST['stu_profile'];
if (!empty($name) && !empty($gender) && !empty($course) && !empty($profile)) {
    $sql = "INSERT INTO `tbl_ajax_master2`(`name`, `gender`, `course`, `profile`) VALUES ('$name','$gender','$course','$profile')";
    $result = $con->query($sql);
    if($result){
        $getId = "SELECT * FROM `tbl_ajax_master2` ORDER BY id DESC";
        $rs  = $con->query($getId);
        $row = mysqli_fetch_assoc($rs);
        echo $row['id'];
    }
}