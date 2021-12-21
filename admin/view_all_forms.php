<?php include 'includes/header.php' ?>
            
            
<!-- nav -->
 <?php include 'includes/nav.php' ?>


<div class="pcoded-content">
                        <div class="pcoded-inner-content">
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">

                                                     <div class="card">
                                        <div class="card-header">
                                            <div class="card-header-right">
												<ul class="list-unstyled card-option">
													<li><i class="fa fa-chevron-left"></i></li>
													<li><i class="fa fa-window-maximize full-card"></i></li>
													<li><i class="fa fa-minus minimize-card"></i></li>
													<li><i class="fa fa-refresh reload-card"></i></li>
													<li><i class="fa fa-times close-card"></i></li>
												</ul>
											</div>

                                        </div>
                                        <div class="card-block table-border-style">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Id</th>
                                                            <th>Username</th>
<!--
                                                            <th>Email</th>
                                                            <th></th>
-->
                                                            <th>View</th>
                                                            <th>Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
    <?php 
 
    $query = "SELECT * FROM contact" ;
    $select_users = mysqli_query($connection,$query);  
    while($row = mysqli_fetch_assoc($select_users)) {
        $id             = $row['id'];
        $name           = $row['name'];
        $email          = $row['email']; 
        $message        = $row['message'];

        
        
    printf('   <tr>
                <td>%s</td>
                <td>%s</td>
                <td><a href="sub_forms.php?id=%s">View</a></td>
                <td><a href="view_all_forms.php?delete=%s">Delete</a></td>
                </tr> ',
       $id,
       $name,
//       $email,
//       $password,
       $id,
       $id
          
          );    
                                                        
                                                        
    }

?>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                                        
            
            
<?php 

if(isset($_GET['delete'])) {
  
 $id = $_GET['delete'];
    
$delete_user = delete_user_by_id($id);
    
header('Location: view_all_forms.php');
    
        
}



      


?>

<?php include "includes/footer.php" ?>