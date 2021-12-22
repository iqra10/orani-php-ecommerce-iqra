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
                                                    <h4>Add User</h4>
                                                    
<?php
    
 if(isset($_POST['add_user'])) {
     
      $username = $_POST['username'];
      $password = $_POST['password'];
     

$username = mysqli_real_escape_string($connection, $username);
    
$paswword = mysqli_real_escape_string($connection, $password);   
    
//$crypt_password = crypt($password, 'iusesomecrazystrings22');  
     
     
     
     
$query = "INSERT INTO users(username, password)" ;

$query .= "VALUES('{$username}', '{$password}')" ;
     
$add_query = mysqli_query($connection, $query);
     
    echo "<p style='color: #0A77F4; font-size: 16px; padding-top: 10px;'>User Added.</p>";


     
 } 
                                                    
?>                                                
                                                    <form method="post" enctype="multipart/form-data">
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Username</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="username" class="form-control">
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                           <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Password</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="password" name="password" class="form-control">
                                                                    </div>
                                                                </div>
                                                         
                                                                       <button type="submit" class="btn btn-primary" name="add_user" id="primary-popover-content" data-container="body" data-toggle="popover" title="Primary color states" data-placement="bottom" data-content="<div class='color-code'>
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

                                                  ">Add User</button>
                                                                
                                                                   
      
<?php include "includes/footer.php" ?>