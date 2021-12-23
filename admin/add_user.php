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

                               <button type="submit" class="btn btn-primary" name="add_user" id="primary-popover-content">Add User</button>
                                                                
                                                                   
                        </form>
                                                    
                                                    
<?php include "includes/footer.php" ?>