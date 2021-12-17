<?php include 'includes/header.php' ?>


<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All departments</span>
                    </div>

                    <ul>

						<?php 
                        
$departments = get_departments();
 
foreach ( $departments as $department ) {
    
							$id    = $department['id'];
							$title = $department['title'];
							$img   = $department['img'];
                                               
                            
   echo "<li><a href='shop-grid.php?p_id={$id}'>$title</a></li>";
                      
}
                       
                        
?>              
                        <!--
													<li><a href="#">Vegetables</a></li>
													<li><a href="#">Fruit & Nut Gifts</a></li>
													<li><a href="#">Fresh Berries</a></li>
						-->
                        <!--
													<li><a href="#">Ocean Foods</a></li>
													<li><a href="#">Butter & Eggs</a></li>
						-->
                        <!--                            <li><a href="#">Fastfood</a></li>-->
                        <!--
													<li><a href="#">Fresh Onion</a></li>
													<li><a href="#">Papayaya & Crisps</a></li>
													<li><a href="#">Oatmeal</a></li>
													<li><a href="#">Fresh Bananas</a></li>
						-->
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+65 11.188.888</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
                <div class="hero__item set-bg" data-setbg="img/hero/banner.jpg">
                    <div class="hero__text">
                        <span>FRUIT FRESH</span>
                        <h2>Vegetable <br/>100% Organic</h2>
                        <p>Free Pickup and Delivery Available</p>
                        <a href="shop.php" class="primary-btn">SHOP NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->


<!-- Categories Section Begin -->
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">


				<?php

				$query = "SELECT * FROM departments";

				$select_all_query = mysqli_query( $connection, $query );

				while ( $row = mysqli_fetch_array( $select_all_query ) ) {

					$id    = $row['id'];
					$title = $row['title'];
					$img   = $row['img'];

					echo "<div class='col-lg-3'>";
					echo "<div class='categories__item set-bg' data-setbg='img/categories/$img'>";
					echo "<h5><a href='shop-grid.php?p_id={$id}'>$title</a></h5>";
					echo "</div>";
					echo "</div>";

				}

				?>

            </div>
        </div>
    </div>
</section>


<!-- Categories Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Featured Product</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">All</li>
						<?php

						$query = "SELECT * FROM departments";

						$select_all_query = mysqli_query( $connection, $query );

                        $departments = get_departments();


						foreach ( $departments as $department ) {
//                            var_dump( $department);
//                            die();

							$id    = $department['id'];
							$title = $department['title'];
							$img   = $department['img'];
							$class = sanitize_key( $department['title'] );

							printf( '<li data-filter=".%s">%s</li>',
								$class,
								$title
							);
						}
						?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">

			<?php
			// Product Loop
			$product_query = "SELECT * FROM products";

			$products_result = mysqli_query( $connection, $product_query );

			while ( $product = mysqli_fetch_array( $products_result ) ) :

				$id               = $product['id'];
				$title            = $product['title'];
				$img              = $product['img'];
				$dep_id           = $product['dep_id'];
				$price            = $product['price'];
				$department       = get_department_by_id( $dep_id );
				$department_class = sanitize_key( $department['title'] );
//                var_dump( $img);

				printf( '<div class="col-lg-3 col-md-4 col-sm-6 mix %s">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="img/%s">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">%s</a></h6>
                        <h5>%s</h5>
                    </div>
                </div>
            </div>',
					$department_class,
					$img,
					$title,
					$price
				);

			endwhile;

			?>


<!--                    <div class="col-lg-3 col-md-4 col-sm-6 mix freshmeat">-->
<!--                        <div class="featured__item">-->
<!--                            <div class="featured__item__pic set-bg" data-setbg="img/featured/feature-1.jpg">-->
<!--                                <ul class="featured__item__pic__hover">-->
<!--                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>-->
<!--                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>-->
<!--                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                            <div class="featured__item__text">-->
<!--                                <h6><a href="#">Crab Pool Security</a></h6>-->
<!--                                <h5>$30.00</h5>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->

        </div>
    </div>
</section>
<!-- Featured Section End -->

<!-- Banner Begin -->
<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="img/banner/banner-1.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="img/banner/banner-2.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->

<!-- Latest Product Section Begin -->
<section class="latest-product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Latest Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">

								<?php

								$query = "SELECT * FROM products LIMIT 1, 3";

								$query .= "ORDER BY id DESC";

								$select_query = mysqli_query( $connection, $query );

								while ( $row = mysqli_query( $connection, $query ) ) {

									$id        = $row['id'];
									$title     = $row['title'];
									$img       = $row['img'];
									$cat_title = $row['cat_title'];
									$tag       = $row['tag'];
									$price     = $row['price'];

//printf( ' <div class="col-lg-4 col-md-6">
//                    <div class="latest-product__text">
//                        <h4>Latest Products</h4>
//                        <div class="latest-product__slider owl-carousel">
//                            <div class="latest-prdouct__slider__item">
//                                <a href="#" class="latest-product__item">
//                    <div class="latest-product__item__pic">
//                        <img src="img/%s" alt="">
//                    </div>
//                    <div class="latest-product__item__text">
//                        <h6>%s</h6>
//                        <span>%s</span>
//                    </div>
//                </a></div></div>', 
//
//     $img,
//     $title,
//     $price
//      
//      
//      );    
//    
								}


								?>

                                <div class="latest-product__item__pic">
                                    <img src="img/latest-product/lp-1.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="img/latest-product/lp-2.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="img/latest-product/lp-3.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                        </div>
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="img/latest-product/lp-1.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="img/latest-product/lp-2.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="img/latest-product/lp-3.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Top Rated Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="img/latest-product/lp-1.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="img/latest-product/lp-2.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="img/latest-product/lp-3.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                        </div>
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="img/latest-product/lp-1.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="img/latest-product/lp-2.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="img/latest-product/lp-3.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Review Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="img/latest-product/lp-1.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="img/latest-product/lp-2.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="img/latest-product/lp-3.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                        </div>
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="img/latest-product/lp-1.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="img/latest-product/lp-2.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="img/latest-product/lp-3.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Latest Product Section End -->

<!-- Blog Section Begin -->
<section class="from-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title from-blog__title">
                    <h2>From The Blog</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="img/blog/blog-1.jpg" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                            <li><i class="fa fa-comment-o"></i> 5</li>
                        </ul>
                        <h5><a href="#">Cooking tips make cooking simple</a></h5>
                        <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="img/blog/blog-2.jpg" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                            <li><i class="fa fa-comment-o"></i> 5</li>
                        </ul>
                        <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                        <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="img/blog/blog-3.jpg" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                            <li><i class="fa fa-comment-o"></i> 5</li>
                        </ul>
                        <h5><a href="#">Visit the clean farm in the US</a></h5>
                        <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->

<?php include 'includes/footer.php' ?>
