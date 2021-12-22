<?php
include_once 'db.php';

function sanitize_key( $key ) {
	$raw_key = $key;
	$key     = strtolower( $key );
	$key     = preg_replace( '/[^a-z0-9_\-]/', '', $key );

	/**
	 * Filters a sanitized key string.
	 *
	 * @param string $key Sanitized key.
	 * @param string $raw_key The key prior to sanitization.
	 *
	 * @since 3.0.0
	 *
	 */
	return $key;
}

function redirect($location) {
    
    
    header("Location:" . $location);
    
    exit;
    
}


function get_department_by_id( $dep_id ) {
    
    
    global $connection;

	$query = "SELECT * FROM departments WHERE id='{$dep_id}'" ;
        
    return mysqli_fetch_array(mysqli_query( $connection, $query ));
        
}




function get_departments() {
	global $connection;
	$query = "SELECT * FROM departments";

	$select_all_query = mysqli_query( $connection, $query );
	$departments = [];
	while($department = mysqli_fetch_array($select_all_query)){
		$departments[] = $department;
	}
	return $departments;

}

function get_total_products_num_by_status() {
    
    $query = "SELECT * FROM products WHERE status = 'Publish'" ;
    
    global $connection;
    
    $result = mysqli_query( $connection, $query);
    
    $count = mysqli_num_rows( $result );
    
    return $count;
    
}


function get_total_products_num_by_status_by_id($dep_id) {
    
    $query = "SELECT * FROM products WHERE dep_id = '{$dep_id}'AND status = 'Publish' LIMIT 3 ";
    
    global $connection;
    
    $result = mysqli_query( $connection, $query);
    
    $count = mysqli_num_rows( $result );
    
    return $count;
    
}

function get_products() {
    
	global $connection;
    
	$query = "SELECT * FROM products LIMIT 6";

	$select_all_query = mysqli_query( $connection, $query );
    
	$products = [];
    
	while($product = mysqli_fetch_array($select_all_query)){
        
		$products[] = $product;
	}
	return $products;

}
    
   

function get_products_by_status_by_id($dep_id) {
    
    global $connection;

	$query = "SELECT * FROM products WHERE dep_id='{$dep_id}' AND status = 'Publish' LIMIT 4 ";
        
    $result = mysqli_query( $connection, $query );
    
    $products = [];
    
	while($product = mysqli_fetch_array($result)){ 
        
		$products[] = $product;
	}
	return $products;

}


function get_latest_products_by_status() {
    
  global $connection;

	$query = "SELECT * FROM products WHERE status = 'Publish' LIMIT 6";
    
//    $query .= "ORDER BY id DESC ";
    
    $result = mysqli_query( $connection, $query );
    
    $latest_products = [];  
    
	while($product = mysqli_fetch_array($result)){
        
		$latest_products[] = $product;
	}
    
	return $latest_products;

}


function delete_product_by_id($id) {
    
    global $connection;
    
$query = "DELETE FROM products WHERE id = '{$id}'" ;
    
$delete_query = mysqli_query( $connection, $query );
    
return $delete_query;    
    
    
    
}

function delete_user_by_id($id) {
    
    global $connection;
    
$query = "DELETE FROM users WHERE id = '{$id}'" ;
    
$delete_query = mysqli_query( $connection, $query );
    
return $delete_query;    
    
    
    
}

function delete_department_by_id($id) {
    
    global $connection;
    
$query = "DELETE FROM departments WHERE id = '{$id}'" ;
    
$delete_query = mysqli_query( $connection, $query );
    
return $delete_query;    
    
    
    
}

function get_product_by_id($id) {
    
    global $connection;
    
    $query = "SELECT * FROM products WHERE id = '{$id}'" ;
    
    $result = mysqli_query( $connection, $query );
    
    $products = [];
    
    while ( $product = mysqli_fetch_array( $result )) {
        
        $products[] = $product;
        
        
    }
    
    return $products;
    
}    


    
