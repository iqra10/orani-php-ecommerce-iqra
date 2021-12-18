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
    <h4>Add Product</h4>

<?php

if (isset( $_GET['edit'] ))  {
    
    $id =  $_GET['edit'];
    
} else {
    
    $id = '';
    
}
  
$products = get_product_by_id($id);

    var_dump($products);

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
<!--            <select name="dep_id" class="form-control">-->
                
            <input type="text" value="<?php echo $dep_id; ?>" name="dep-id" class="form-control">

				<?php
                 
//             if(isset($_GET['dep_id'])) {
//                 
//                 $dep_id = $_GET['dep_id'];
//                 
//             } else {
//                 
//                 $dep_id = '';
//             }
//
//				$department_by_id = get_department_by_id($dep_id);
//
//				foreach ( $department_by_id as $department ) {
//
//					echo $id    = $department['id'];
//					echo $title = $department['title'];
//                    
//             echo "<option value='$id'>$title</option>";
//
//
//            
// }
				?>

<!--            </select>-->
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
        
    <button type="submit" class="btn btn-primary" name="add" id="primary-popover-content" data-container="body"
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