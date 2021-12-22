<?php include 'includes/header.php' ?>
            
<!-- nav -->
 <?php include 'includes/nav.php' ?>

     <div class="pcoded-content">
                                              
                                              
         <p style="background-color: white; color: #0A77F4; margin: 10px; line-height: 4em; font-size: 20px; padding-left: 10px;"> <?php echo $_SESSION['status']; ?></p>
                                              
                                              
        </div>      

    
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
                                                            <th>Title</th>
                                                            <th>Image</th>
                                                            <th>Edit</th>
                                                            <th>Delete</th>
                                                                                                                       

                                                        </tr>
                                                    </thead>
                                                    <tbody>
    <?php 
 
    $query = "SELECT * FROM departments";
    $select_users = mysqli_query($connection,$query);  
    while($row = mysqli_fetch_assoc($select_users)) {
        $id         = $row['id'];
        $title      = $row['title'];
        $img        = $row['img'];

        
        
    printf('   <tr>
                <td>%s</td>
                <td>%s</td>
                <td><img width="100" src="../img/categories/%s" /></td>
                <td><a href="edit_department.php?id=%s">Edit</a></td>
                <td><a href="view_all_departments.php?delete=%s">Delete</a></td>

                </tr> ',
       $id,
       $title,
       $img,
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
    
 $delete_product = delete_department_by_id($id);
               
 $_SESSION['status'] = "Deleted successfully";  
     
 header('Location: view_all_departments.php');

     
 } else {
      
      $_SESSION['status'] = "";  
 
      
  }
                                                
?>                                                

<?php include "includes/footer.php" ?>