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
                                                    <h4>Edit Department</h4>
                  <?php
    
if (isset($_GET['id'])) {
    
    
   $the_id = $_GET['id'];
    

    
$query = "SELECT * FROM departments WHERE id = '{$the_id}'" ;    
    $result = mysqli_query($connection, $query);
    
    
    while ( $row = mysqli_fetch_array($result) ) {
        $title = $row['title'];
        $img = $row['img'];
        
        
        
    }
    
       
}
      ?>      
                                                    
                                                    
                                                    
                                                    
    <!---- Upadate Query --->
                                                    
                                                    
        <?php
    
if (isset($_POST['update'])) {
    
    
        $title = $_POST['title'];
        $img = $_FILES['img']['name'];
        $img_temp = $_FILES['img']['tmp_name'];
		
	move_uploaded_file($img_temp, "./../img/categories/$img"); 
    
       if(empty($img)) {
    
 $query = "SELECT img FROM departments WHERE id = $the_id ";
        $select_image = mysqli_query($connection,$query);
            
        while($row = mysqli_fetch_array($select_image)) {
            
           $img = $row['img'];
        
        }   
    
} 
    
   
          $query = "UPDATE departments SET ";
          $query .="title  = '{$title}', ";
          $query .="img = '{$img}' ";  
          $query .="WHERE id = '{$the_id}' ";     


     
$add_query = mysqli_query($connection, $query);     
     
    echo "<p style='color: #0A77F4; font-size: 16px; padding-top: 10px;'>Department Updated.</p>";

}
                                                    
                                                    
                                                    
                                                    
        ?>
                                                    
                                                    <form method="post" enctype="multipart/form-data">
                                                        <div class="form-group row">
                                                            
                                                            <label class="col-sm-2 col-form-label">Department Name</label>
                                                            <div class="col-sm-10">
                
                        <input type="text" name="title" value="<?php echo $title; ?>" class="form-control">
                        </div>
                    </div>
                          <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Upload File</label>
                                            <div class="col-sm-10">
                                       <img width="100" src="../img/categories/<?php echo $img; ?>" />

                                    <input type="file" name="img" class="form-control">
                                            </div>     
                                            </div>

                                   <button type="submit" class="btn btn-primary" name="update" id="primary-popover-">Update</button>
                                                                
                                                                   
      
<?php include "includes/footer.php" ?>