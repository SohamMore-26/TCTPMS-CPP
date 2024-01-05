<?php
include 'database.php';
if(isset($_POST['submit']))
{
    $sem=$_POST['sem'];
    $branch=$_POST['branch'];
    $scheme=$_POST['scheme'];
    $ayst=$_POST['aystdatefrom'];
    $ayend=$_POST['aystdateto'];
    $semst=$_POST['stsemfrom'];
    $semend=$_POST['stfromto'];
    $ct1st=$_POST['ct1from'];
    $ct1end=$_POST['ct1to'];
    $ct2st=$_POST['ct2from'];
    $ct2end=$_POST['ct2to'];
    $prest=$_POST['prefrom'];
    $preend=$_POST['preto'];
    $thst=$_POST['thfrom'];
    $thend=$_POST['thto'];

    $sql="insert into acadcal_form(semester,branch,scheme,Acad_st,Acad_end,sem_st,sem_end,ct1_st,ct1_end,ct2_st,ct2_end,PE_st,PE_end,TE_st,TE_end)
    values('$sem','$branch','$scheme','$ayst','$ayend','$semst','$semend','$ct1st','$ct1end','$ct2st','$ct2end','$prest','$preend','$thst','$thend')";
    if(mysqli_query($con,$sql))
    {
        echo "<script>alert('new record inserted')</script>";
        echo "<script>window,open('adm_AcadCalForm.php','_self')</script>";
    }   
    else{
        echo "error".mysqli_error();
    }

}
?>