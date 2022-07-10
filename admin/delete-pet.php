<?php
include('../config/constants.php');
if(isset($_GET['id']) && isset($_GET['image_name']) )
{
    $id= $_GET['id'];
    $image_name= $_GET['image_name'] ;

    if($image_name!="")
    {
        $path="../images/pet/".$image_name ; //img destination
        
    
    $remove= unlink($path);

    if($remove==false)
    {
        $_SESSION['img-delete']="<div class='error'>Error in image deletion.</div>";
  
        //redirect
        header("location:".SITEURL.'admin/manage-pet.php');
        die();

    }
}


$sql = "DELETE FROM tbl_pet WHERE id=$id" ;

$res= mysqli_query($conn,$sql); //$conn is described in constants

if($res==true)
{

    //query is successful
   $_SESSION['delete']="<div class='success'>Pet is Deleted.</div>";
  
   //redirect
   header("location:".SITEURL.'admin/manage-pet.php');


}
else
{
     //query is NOT successful
   $_SESSION['delete']="<div class='error'>Pet is not deleted.</div>";
   //redirect
   header("location:".SITEURL.'admin/manage-pet.php');
}
}
else
{
    $_SESSION['delete']="<div class='error'>Nothing is deleted</div>";
    header("location:".SITEURL.'admin/manage-pet.php');

}



?>