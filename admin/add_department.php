<?php include 'includes/header.php' ?>
            
            
<!-- nav -->
 <?php include 'includes/nav.php' ?>
    
<div class="pcoded-content">
                        <div class="pcoded-inner-content">
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- Basic Form Inputs card start -->
                                                <div class="card">

                                                <div class="card-block">
                                                    <h4>Add Department</h4>
                                                    
<?php
    
 if ( isset( $_POST['add'] ) ) {
     
        $title = $_POST['title'];
        $img = $_FILES['img']['name'];
        $img_temp = $_FILES['img']['tmp_name'];
		
	move_uploaded_file($img_temp, "./../img/categories/$img"); 
     
$query = "INSERT INTO departments(title, img)" ;
     
$query .= "VALUES('{$title}', '{$img}')";  
     
$add_query = mysqli_query($connection, $query);     
     
    echo "<p style='color: #0A77F4; font-size: 16px; padding-top: 10px;'>Department Added.</p>";

     
 } 
                                                    
?>                                                
                        
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Department Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control">
                                </div>
                            </div>
                              <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Upload File</label>
                                                    <div class="col-sm-10">

                                            <input type="file" name="img" class="form-control">
                                                    </div>     
                                                    </div>   

                                           <button type="submit" class="btn btn-primary" name="add" id="primary-popover-content">Add Department</button>

                             </form>
      
<?php include "includes/footer.php" ?>