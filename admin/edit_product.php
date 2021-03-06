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

	if ( isset( $_GET['edit'] ) ) {

		$id = $_GET['edit'];
        

	} else {

		$id = '';

	}

    if ( isset( $_GET['dep_id'] ) ) {

        $dep_id = $_GET['dep_id'];

    } else {

        $dep_id = '';
    }


	if ( isset( $_POST['update'] ) ) {

//        var_export( $_POST);
//        die();

		$title       = $_POST['title'];
		$price       = $_POST['price'];
		$id_dep      = $_POST['dep_id'];
		$description = $_POST['description'];
		$info        = $_POST['info'];
		$img         = $_FILES['img']['name'];
		$img_temp    = $_FILES['img']['tmp_name'];
		$status      = $_POST['status'];
		$rate        = $_POST['rate'] ?? 0;
		$review      = $_POST['review'] ?? 0;


		move_uploaded_file( $img_temp, "./../img/$img" );

		if ( empty( $img ) ) {

			$query        = "SELECT img FROM products WHERE id = $id ";
			$select_image = mysqli_query( $connection, $query );

			while ( $row = mysqli_fetch_array( $select_image ) ) {

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

		$query .= "status = '{$status}' ";


		$query .= ", rate = '{$rate}' ";

		$query .= ", review = '{$review}' ";

		$query .= " WHERE id = '{$id}' ";

		$update_product_query = mysqli_query( $connection, $query );

		echo "<p style='color: #0A77F4; font-size: 16px; padding-top: 10px;'>$title Updated.</p>";


	}


	?>

	<?php


	$products = get_product_by_id( $id );

	//    var_dump($products);

	foreach ( $products as $product ) {

		$title       = $product['title'];
		$price       = $product['price'];
		$dep_id      = $product['dep_id'];
		$description = $product['description'];
		$info        = $product['info'];
		$img         = $product['img'];
		$status      = $product['status'];
		$rate        = $product['rate'];
		$review      = $product['review'];

	}


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

					$query  = "SELECT * FROM departments";
					$result = mysqli_query( $connection, $query );


					while ( $row = mysqli_fetch_array( $result ) ) {

						$id    = $row['id'];
						$title = $row['title'];


						if ( $id == $dep_id ) {


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
                <textarea rows="5" cols="5" class="form-control"
                          name="description"><?php echo $description; ?></textarea>
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
                <img width="100" src="../img/<?php echo $img; ?>"/>
                <input type="file" name="img" class="form-control">
            </div>
        </div>


        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Product Status</label>
            <div class="col-sm-10">
                <select name="status" class="form-control">


					<?php

					if ( isset( $_GET['status'] ) ) {

						$the_status = $_GET['status'];

					}

					?>

                    <option value="Publish" <?php if ( $status == 'Publish' ) {
						echo 'selected';
					} ?> >Publish
                    </option>


                    <option value="Draft" <?php if ( $status == 'Draft' ) {
						echo 'selected';
					} ?> >Draft
                    </option>

                </select>
            </div>
        </div>


        <div class="form-group row">
            <div class="col-md-12">
                <div class="checkbox-fade fade-in-primary">
                    <label class="col-form-label">
                        <input type="checkbox" name="rate" value="<?php echo $rate; ?>" <?php echo $rate ? 'checked="checked"' : ''?> />
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

                        <input type="checkbox" name="review" value="<?php echo $review; ?>" <?php echo $review ? 'checked="checked"' : ''?> />

                        <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                        <span class="text-inverse">Review Product</span>
                    </label>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary" name="update" id="primary-popover-content">Update
        </button>
    </form>


<?php include "includes/footer.php" ?>