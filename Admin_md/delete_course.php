<?php
    include "config.php";

    if(isset($_GET['id']))
    {
        $delete = mysqli_query($con,"delete from courseinfo where id = '".$_GET['id']."'") or die(mysqli_error($con));
        if($delete)
        {
            echo "<script>";
            echo "alert('Record Deleted.....!');";
            echo "window.location.href='adm_add_courses.php';";
            echo "</script>";
        }
        else
        {
            echo "<script>";
            echo "windoe.alert('Record Not Deleted.....!');";
            echo "</script>";
        }
    }
?>