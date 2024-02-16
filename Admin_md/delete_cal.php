<?php
    include "config.php";

    if(isset($_GET['id']))
    {
        $delete = mysqli_query($con,"delete from academic_cal where id = '".$_GET['id']."'") or die(mysqli_error($con));
        if($delete)
        {
            echo "<script>";
            echo "alert('Record Deleted.....!');";
            echo "window.location.href='adm_AcadCalForm.php';";
            echo "</script>";
        }
        else
        {
            echo "<script>";
            echo "windoe.alert('Record Not Deleted.....!');";
            echo "window.location.href='view_registration.php';";
            echo "</script>";
        }
    }
?>