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

if ( isset( $_POST['add'] ) ) {

	$title       = $_POST['title'];
	$price       = $_POST['price'];
	$id_dep      = $_POST['category'];
	$description = $_POST['description'];
	$info        = $_POST['info'];
	$img         = $_FILES['img']['name'];
	$img_temp    = $_FILES['img']['tmp_name'];
	$status      = $_POST['status'];
	$review      = isset( $_POST['review'] ) ? $_POST['review'] : 0;
	$rate        = isset( $_POST['rate'] ) ? $_POST['rate'] : 0;


	move_uploaded_file( $img_temp, "./../img/$img" );


	$query = "INSERT INTO products(title, img, price, description, info, dep_id, status, rate, review) ";

	$query .= "VALUES('{$title}', '{$img}', '{$price}', '{$description}', '{$info}', '{$id_dep}', '{$status}', '{$rate}', '{$review}') ";

	mysqli_query( $connection, $query );

	echo "<p style='color: #0A77F4; font-size: 16px; padding-top: 10px;'>$title Added.</p>";


}

?>
    <form method="post" enctype="multipart/form-data">
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Product Name</label>
        <div class="col-sm-10">
            <input type="text" name="title" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Price</label>
        <div class="col-sm-10">
            <input type="text" name="price" value="$" class="form-control">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Select Category</label>
        <div class="col-sm-10">
            <select name="category" class="form-control">

				<?php

				$query = "SELECT * FROM departments";

				$select_all_query = mysqli_query( $connection, $query );

				while ( $row = mysqli_fetch_array( $select_all_query ) ) {

					$id    = $row['id'];
					$title = $row['title'];

					echo "<option value='$id'>$title</option>";

				}


				?>

            </select>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
            <textarea rows="5" cols="5" class="form-control" name="description"></textarea>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Information</label>
        <div class="col-sm-10">
            <textarea rows="5" cols="5" name="info" class="form-control"></textarea>
        </div>
    </div>


    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Upload File</label>
        <div class="col-sm-10">

            <input type="file" name="img" class="form-control">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Product Status</label>
        <div class="col-sm-10">
            <select name="status" class="form-control">

                <option value="Publish">Publish</option>
                <option value="Draft">Draft</option>

            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-12">
            <div class="checkbox-fade fade-in-primary">
                <label class="col-form-label">
                    <input type="checkbox" name="rate" value="1" />
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
                    <input type="checkbox" name="review" value="1">
                    <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                    <span class="text-inverse">Review Product</span>
                </label>
            </div>
        </div>
    </div>


    <button type="submit" class="btn btn-primary" name="add" id="primary-popover-content">Add Product
    </button>

        </form>

<?php include "includes/footer.php" ?>