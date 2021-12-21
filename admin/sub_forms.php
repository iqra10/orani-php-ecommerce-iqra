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
                                                    <h4></h4>
                  <?php
    
if (isset($_GET['id'])) {
    
    
   $the_id = $_GET['id'];
    

    
$query = "SELECT * FROM contact WHERE id = '{$the_id}'" ;    
    $result = mysqli_query($connection, $query);
    
    
    while ( $row = mysqli_fetch_array($result) ) {
        
        $id             = $row['id'];
        $name           = $row['name'];
        $email          = $row['email']; 
        $message        = $row['message'];
        
        
    }
    
       
}
      ?>      
                                                    
                                                    
                                                    

                                                    
                                                    
                                                    
        <div class="container-form">
<form action="" method="post">
  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input name="username" type="text" value="<?php echo $name; ?>" class="form-control">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Email</label>
    <input name="email" type="email" value="<?php echo $email; ?>" class="form-control" id="exampleInputEmail1">
  </div>
    
     <label for="message" class="form-label">Message</label>
    <div class="mb-3">
    <textarea name="message" class="form-control" aria-label="With textarea"><?php echo $message; ?></textarea>
</div>
    
<!--  <button type="submit" name="submit" class="btn btn-primary">Submit</button>-->
</form>

</div>

                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
<!--




                                                    
                                                        <form action="" method="post">
                              <div class="form-group row">
                                                                                        <div class="col-sm-6">
                                                                                            <input type="text"
                                                                                            class="form-control form-txt-danger"
                                                                                            placeholder=".form-txt-danger">
                                                                                        </div>
                                                                                        <div class="col-sm-6">
                                                                                            <input type="text"
                                                                                            class="form-control form-txt-success"
                                                                                            placeholder=".form-txt-success">
                                                                                        </div>
                                                                                    </div>
                                                            
                                                            
                                                            <div class="form-group row">
                                                                                      <label class="col-sm-2 col-form-label">Textarea</label>
                                                                                <div class="col-sm-10">
                                                                                    <textarea rows="5" cols="5" class="form-control"
                                                                                    placeholder="Default textarea"></textarea>
                                                                                </div>
                                                            
-->
                                                            
             

                                
                                                                   
      
<?php include "includes/footer.php" ?>