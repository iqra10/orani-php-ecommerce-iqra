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
    <h4>Edit Product</h4>
        
 <?php 
    
    if (isset( $_GET['edit'] ))  {
    
    $id =  $_GET['edit'];
    
} else {
    
    $id = '';
    
}
    
    
  
    if ( isset($_POST['update'] ) ) {
        
    $title       = $_POST['title'];
	$price       = $_POST['price'];
	$id_dep      = $_POST['dep_id'];
	$description = $_POST['description'];
	$info        = $_POST['info'];
	$img         = $_FILES['img']['name'];
	$img_temp    = $_FILES['img']['tmp_name'];
    $rate        = $_POST['rate'];
	$review      = $_POST['review'];

	move_uploaded_file( $img_temp, "./../img/$img" );
        
   if(empty($img)) {
    
 $query = "SELECT img FROM products WHERE id = $id ";
        $select_image = mysqli_query($connection,$query);
            
        while($row = mysqli_fetch_array($select_image)) {
            
           $img = $row['img'];
        
        }   
    
}     
        
        
        
        

  $query = "UPDATE products SET ";
        
  $query .= "title = '{$title}', ";
        
  $query .= "price = '{$price}', ";
        
  $query .= "dep_id = '{$id_dep}', ";

  $query .= "description = '{$description}', ";
    
  $query .= "info = '{$info}', ";
        
  $query .= "img = '{$img}', ";

  $query .= "rate = '{$rate}', "; 
        
  $query .= "review = '{$review}' "; 
        
  $query .= "WHERE id = '{$id}' ";        
        
 $update_product_query = mysqli_query($connection,$query);
        
	echo "<p style='color: #0A77F4; font-size: 16px; padding-top: 10px;'>$title Updated.</p>";
       
        
        
    }
    
    
    
    
    
    
    
?>    
        
        
        
        
        
        
        
        
        
        
        

<?php


  
$products = get_product_by_id($id);

//    var_dump($products);

foreach( $products as $product ) {
    
    $title       = $product['title'];
	$price       = $product['price'];
	$dep_id      = $product['dep_id'];
	$description = $product['description'];
	$info        = $product['info'];
	$img         = $product['img'];
    
    
    
    
}
     
//
//	echo "<p style='color: #0A77F4; font-size: 16px; padding-top: 10px;'>$title Added.</p>";




?>
    <form method="post" enctype="multipart/form-data">
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Product Name</label>
        <div class="col-sm-10">
            <input type="text" value="<?php echo $title; ?>" name="title" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Price</label>
        <div class="col-sm-10">
            <input type="text" name="price" value="<?php echo $price; ?>" class="form-control">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Select Category</label>
        <div class="col-sm-10">
            <select name="dep_id" class="form-control">
                
                 
                
               <?php
                
                if(isset($_GET['dep_id'])) {
                 
                 $dep_id = $_GET['dep_id'];
                 
             } else {
                 
                 $dep_id = '';
             }


        $query = "SELECT * FROM departments" ;
        $result = mysqli_query($connection,$query);
        

        while($row = mysqli_fetch_array($result)) {
            
        echo $id = $row['id'];
        $title = $row['title'];


        if($id == $dep_id) {

      
        echo "<option selected value='{$id}'>{$title}</option>";


        } else {

          echo "<option value='{$id}'>{$title}</option>";


        }
      
        }
                
                
                
                
				?>

            </select>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
            <textarea rows="5" cols="5" class="form-control" name="description"><?php echo $description; ?></textarea>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Information</label>
        <div class="col-sm-10">
            <textarea rows="5" cols="5" name="info" class="form-control"><?php echo $info; ?></textarea>
        </div>
    </div>


    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Upload File</label>
        <div class="col-sm-10">
        <img width="100" src="../img/<?php echo $img; ?>" />
            <input type="file" name="img" class="form-control">
        </div>
    </div>
        
        
  <div class="form-group row">
 <div class="col-md-12">
                    <div class="checkbox-fade fade-in-primary">
                            <label class="col-form-label">
                           <?php    
                                                
 if ( isset ($_GET['edit']) ) {
     
     
 $the_id = $_GET['edit'];
     
 }  else {
     
      $the_id = '';
     
 }                                                              
                                                
                                                
                                                
                                                
        $products = get_product_by_id($the_id);

//    var_dump($products);

foreach( $products as $product ) {
    $id          = $product['id'];
    $title       = $product['title'];
	$price       = $product['price'];
	$dep_id      = $product['dep_id'];
	$description = $product['description'];
	$info        = $product['info'];
	$img         = $product['img'];
    $rate        = $product['rate'];
    $review      = $product['review'];
    
  if ($rate === 'rated') {
                        
                        echo "<input type='checkbox' name='rate' checked value='rated'>";
                        
                    }   else {
      
                              echo "<input type='checkbox' name='' value=''>";

      
  }
     
}                          
                        ?>                                                  
                                                
                                                
                                                
                                                
<!--                                                <input type="checkbox" name="rate" value="rated">-->
                                                <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                <span class="text-inverse">Rate Product</span>
                                            </label>
                                        </div>
                                    </div>
        
        </div>
        
                
                                    <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="checkbox-fade fade-in-primary">
                                            <label class="col-form-label">
                                                
 <?php                                                
 
 $products = get_product_by_id($the_id);

//    var_dump($products);

foreach( $products as $product ) {
    $id          = $product['id'];
    $title       = $product['title'];
	$price       = $product['price'];
	$dep_id      = $product['dep_id'];
	$description = $product['description'];
	$info        = $product['info'];
	$img         = $product['img'];
    $rate        = $product['rate'];
    $review      = $product['review'];
    
  if ($review === 'reviewed') {
                        
                        echo "<input type='checkbox' name='review' checked value='reviewed'>";
                        
                    }   else {
      
                              echo "<input type='checkbox' name='review' value=''>";

      
  }
    
    
    
}
                         
                                                
                        ?>    
                                                
                                                                                           
                                                
                                                <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                <span class="text-inverse">Review Product</span>
                                            </label>
                                        </div>
                                    </div>
        
        </div>      
        
        
        
        
    <button type="submit" class="btn btn-primary" name="update" id="primary-popover-content" data-container="body"
            data-toggle="popover" title="Primary color states" data-placement="bottom" data-content="<div class='color-code'>
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

                                                  ">Primary button
    </button>



<?php include "includes/footer.php" ?>