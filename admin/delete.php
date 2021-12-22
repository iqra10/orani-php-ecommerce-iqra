<?php include 'includes/header.php' ?>



<?php 
    
    
    

if(isset($_GET['delete'])) {
  
echo $id = $_GET['delete'];
    
$delete_product = delete_department_by_id($id);
         
 $_SESSION['status'] = "$p_id Deleted";  
     
 header('Location: view_all_departments.php');

     
 } 
        



?>     

