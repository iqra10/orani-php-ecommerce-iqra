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
    
if (isset($_GET['id'])) {
    
    
   $the_id = $_GET['id'];
    
$departments = get_department_by_id( $the_id );
    
    
    foreach ( $departments as $department ) {
        
        $title = $department['title'];
        $img = $department['img'];
        
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
   
          $query = "UPDATE departments SET ";
          $query .="title  = '{$title}', ";
          $query .="img = '{$img}' ";  
          $query .="WHERE id = '{$the_id}' ";     


     
$add_query = mysqli_query($connection, $query);     
     
    echo "<p style='color: #0A77F4; font-size: 16px; padding-top: 10px;'>Department Added.</p>";

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

                                   <button type="submit" class="btn btn-primary" name="update" id="primary-popover-content" data-container="body" data-toggle="popover" title="Primary color states" data-placement="bottom" data-content="<div class='color-code'>
                                    <div class='row'>
                                      <div class='col-sm-6 col-xs-12'>
                                        <span class='block'>Normal</span>
                                        <span class='block'>
                                          <small>#4680ff</small>
                                      </span>
                                  </div>
                                              <div class='col-sm-6 col-xs-12'>
                                                <div class='display-color' style='background-color:#4680ff;'></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class='color-code'>
                                      <div class='row'>
                                        <div class='col-sm-6 col-xs-12'>
                                          <span class='block'>Hover</span>
                                          <span class='block'>
                                            <small>#79a3ff</small>
                                        </span>
                                    </div>
                                    <div class='col-sm-6 col-xs-12'>
                                      <div class='display-color' style='background-color:#79a3ff;'></div>
                                  </div>
                              </div>
                          </div>

                              <div class='color-code'>
                                  <div class='row'>
                                    <div class='col-sm-6 col-xs-12'>
                                      <span class='block'>Active</span>
                                      <span class='block'>
                                        <small>#0956ff</small>
                                    </span>
                                </div>
                                <div class='col-sm-6 col-xs-12'>
                                  <div class='display-color' style='background-color:#0956ff;'></div>
                              </div>
                          </div>
                      </div>

                                  <div class='color-code'>
                                      <div class='row'>
                                        <div class='col-sm-6 col-xs-12'>
                                          <span class='block'>Disabled</span>
                                          <span class='block'>
                                            <small>#c3d5ff</small>
                                        </span>
                                    </div>
                                    <div class='col-sm-6 col-xs-12'>
                                      <div class='display-color' style='background-color:#c3d5ff;'></div>
                                  </div>
                              </div>
                          </div>

                                                  ">Primary button</button>
                                                                
                                                                   
      
<?php include "includes/footer.php" ?>