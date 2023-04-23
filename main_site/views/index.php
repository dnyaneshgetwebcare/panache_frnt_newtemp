<!DOCTYPE html>
<?php include("../controllers/DBConnect.php");

$db_con= new DBConnect();

$result=$db_con->getBestSellers();
$best_sellers=$result['product_list'];
$best_sellers_img=$result['image_list'];
$result_ar=$db_con->getNewArrival();
$new_arrivals=$result_ar['product_list'];
$new_arrivals_img=$result_ar['image_list'];
//print_r($product_details);
 $def_product_url="product-details.php?prod_id=";
$img_orignal_path="/panache_bil_git_hub/uploads/";
$img_default_url="/../..".$img_orignal_path;
$server_dir_img=$_SERVER['DOCUMENT_ROOT']."/".$img_orignal_path;
?>

<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("include_files.php"); ?>
    <title>Panache Rental Boutique</title>
</head>
<body>
<?php include("menu.php"); ?>
<div class="fullwidth-template">
    <div class="slide-home-01">
        <div class="response-product product-list-owl owl-slick equal-container better-height"
             data-slick="{&quot;arrows&quot;:false,&quot;slidesMargin&quot;:0,&quot;dots&quot;:true,&quot;infinite&quot;:false,&quot;speed&quot;:300,&quot;slidesToShow&quot;:1,&quot;rows&quot;:1}"
             data-responsive="[{&quot;breakpoint&quot;:480,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesMargin&quot;:&quot;0&quot;}},{&quot;breakpoint&quot;:768,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesMargin&quot;:&quot;0&quot;}},{&quot;breakpoint&quot;:992,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesMargin&quot;:&quot;0&quot;}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesMargin&quot;:&quot;0&quot;}},{&quot;breakpoint&quot;:1500,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesMargin&quot;:&quot;0&quot;}}]">
            <div class="slide-wrap">
                <img src="../assets/images/slide2222.jpg" alt="image">
                <div class="slide-info">
                    <div class="container">
                        <div class="slide-inner">
                            <h5>Limited Colletion</h5>
                            <h1>Women</h1>
                            <h2> Wears</h2>
                            <a href="product-list.php?cat_id=2">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide-wrap">
                <img src="../assets/images/slide11new.jpg" alt="image">
                <div class="slide-info">
                    <div class="container">
                        <div class="slide-inner">
                            <h5>Exclusive</h5>
                            <h1><span>Lengha</h1>
                            <h2>for Wedding</h2>
                            <a href="product-list.php?cat_id=2">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide-wrap">
                <img src="../assets/images/slide333.jpg" alt="image">
                <div class="slide-info">
                    <div class="container">
                        <div class="slide-inner">
                            <h5>Wedding</h5>
                            <h1>Mens</h1>

                            <a href="product-list.php?cat_id=1">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-003 section-002">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="akasha-banner style-01 left-center">
                        <div class="banner-inner">
                            <figure class="banner-thumb">
                                <img src="../assets/images/banner11.jpg"
                                     class="attachment-full size-full" alt="img"></figure>
                            <div class="banner-info ">
                                <div class="banner-content">
                                    <div class="title-wrap">
                                        <h6 class="title">
                                            <a target="_self" href="product-list.php?cat_id=2">Womens</a>
                                        </h6>
                                    </div>
                                    <div class="button-wrap">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="akasha-banner style-01 right-top">
                        <div class="banner-inner">
                            <figure class="banner-thumb">
                                <img src="../assets/images/banner12.jpg"
                                     class="attachment-full size-full" alt="img"></figure>
                            <div class="banner-info ">
                                <div class="banner-content">
                                    <div class="title-wrap">
                                        <h6 class="title">
                                            <a target="_self" href="product-list.php?cat_id=1">Mens</a>
                                        </h6>
                                    </div>
                                    <div class="button-wrap">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="akasha-banner style-01 left-bottom">
                        <div class="banner-inner">
                            <figure class="banner-thumb">
                                <img src="../assets/images/banner13.jpg"
                                     class="attachment-full size-full" alt="img"></figure>
                            <div class="banner-info ">
                                <div class="banner-content">
                                    <div class="title-wrap">
                                        <h6 class="title">
                                            <a target="_self" href="product-list.php?cat_id=3">Jewellery/Accessories</a>
                                        </h6>
                                    </div>
                                    <div class="button-wrap">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-001">
        <div class="container">
            <div class="akasha-heading style-01">
                <div class="heading-inner">
                    <h3 class="title">Pre-Wedding </h3>
                    <div class="subtitle">Made easy for selection of outfit for Pre-Wedding.
                    </div>
                </div>
            </div>
            <div class="akasha-products style-02">
                <div class="response-product product-list-owl owl-slick equal-container better-height"
                     data-slick="{&quot;arrows&quot;:false,&quot;slidesMargin&quot;:30,&quot;dots&quot;:true,&quot;infinite&quot;:false,&quot;speed&quot;:300,&quot;slidesToShow&quot;:4,&quot;rows&quot;:2}"
                     data-responsive="[{&quot;breakpoint&quot;:480,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesMargin&quot;:&quot;10&quot;}},{&quot;breakpoint&quot;:768,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesMargin&quot;:&quot;10&quot;}},{&quot;breakpoint&quot;:992,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesMargin&quot;:&quot;20&quot;}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesMargin&quot;:&quot;20&quot;}},{&quot;breakpoint&quot;:1500,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesMargin&quot;:&quot;30&quot;}}]">
                    <?php foreach ($best_sellers as $best_seller){
                            $product_name= $best_seller['name'];
                           /* $img_path="../assets/images/apro134-1-600x778.jpg";
                            if($best_seller['images']!='' && file_exists($server_dir_img.''.$best_seller['images'])){
                                //$img_path= '/../../panache_bil_git_hub/uploads/'.$product['images'];
                                $img_path= $img_default_url.''.$best_seller['images'];
                            }*/
                        $img_path=$db_con->getImagePath($best_seller['images']);
                            $product_url=$def_product_url.''.$best_seller['id'];
                        ?>
                    <div class="product-item featured_products style-02 rows-space-30 post-34 product type-product status-publish has-post-thumbnail product_cat-light product_cat-new-arrivals product_tag-light product_tag-hat product_tag-sock first instock sale featured shipping-taxable product-type-grouped">
                        <div class="product-inner tooltip-top">
                            <div class="product-thumb">
                                <a class="thumb-link"
                                   href="<?= $product_url; ?>" tabindex="0">
                                    <img class="img-responsive"
                                         src="<?= $img_path; ?>"
                                         alt="<?= $product_name; ?>" width="270" height="350">
                                </a>
                                <div class="flash">
                                    <span class="onnew"><span class="text">New</span></span></div>
                                <a href="#" class="button yith-wcqv-button">Quick View</a></div>
                            <div class="product-info">
                               <!-- <div class="rating-wapper nostar">
                                    <div class="star-rating"><span style="width:0%">Rated <strong
                                            class="rating">0</strong> out of 5</span></div>
                                    <span class="review">(0)</span></div>-->
                                <h3 class="product-name product_title">
                                    <a href="<?= $product_url; ?>"
                                       tabindex="0"><?= $product_name; ?></a>
                                </h3>
                                <span class="price"><span class="akasha-Price-amount amount"><span
                                        class="akasha-Price-currencySymbol">₹</span><?= $best_seller['rent_amount'] ?>  </span> <!--– <span
                                        class="akasha-Price-amount amount"><span
                                        class="akasha-Price-currencySymbol">₹</span>139.00</span>--></span>
                            </div>
                            <div class="group-button clearfix">
                                <div class="yith-wcwl-add-to-wishlist">
                                    <div class="yith-wcwl-add-button show">
                                        <a href="#" class="add_to_wishlist">Add to Wishlist</a>
                                    </div>
                                </div>
                                <div class="add-to-cart">
                                    <a href="#" class="button product_type_grouped">
                                        View products</a></div>

                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="akasha-banner style-02 left-center">
            <div class="banner-inner">
                <figure class="banner-thumb">
                    <img src="../assets/images/banner101.jpg"
                         class="attachment-full size-full" alt="img"></figure>
                <div class="banner-info container">
                    <div class="banner-content">
                        <div class="title-wrap">
                            <div class="banner-label">
                                Occasion
                            </div>
                            <h6 class="title">
                                Pre-Wedding </h6>
                        </div>
                        <div class="button-wrap">
                            <div class="subtitle">
                                Once in a while, Right in the middle of an ordinary life, Love gives us a fairy tale.
                            </div>
                            <a class="button" target="_self" href="#"><span>Shop now</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-001">
        <div class="container">
            <div class="akasha-heading style-01">
                <div class="heading-inner">
                    <h3 class="title">New Arrival</h3>
                    <div class="subtitle">
                        Made with care for your little ones, our products are perfect for every occasion. Check it out.
                    </div>
                </div>
            </div>
            <div class="akasha-products style-01">
                <div class="response-product product-list-owl owl-slick equal-container better-height"
                     data-slick="{&quot;arrows&quot;:true,&quot;slidesMargin&quot;:30,&quot;dots&quot;:true,&quot;infinite&quot;:false,&quot;speed&quot;:300,&quot;slidesToShow&quot;:4,&quot;rows&quot;:1}"
                     data-responsive="[{&quot;breakpoint&quot;:480,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesMargin&quot;:&quot;10&quot;}},{&quot;breakpoint&quot;:768,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesMargin&quot;:&quot;10&quot;}},{&quot;breakpoint&quot;:992,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesMargin&quot;:&quot;20&quot;}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesMargin&quot;:&quot;20&quot;}},{&quot;breakpoint&quot;:1500,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesMargin&quot;:&quot;30&quot;}}]">
                     <?php foreach ($new_arrivals as $new_arrival){
                            $product_name= $new_arrival['name'];
                            /*$img_path="../assets/images/apro134-1-600x778.jpg";
                            if($new_arrival['images']!='' && file_exists($server_dir_img.''.$new_arrival['images'])){
                                //$img_path= '/../../panache_bil_git_hub/uploads/'.$product['images'];
                                $img_path= $img_default_url.''.$new_arrival['images'];
                            }*/
                         $img_path=$db_con->getImagePath($new_arrival['images']);
                            $product_url=$def_product_url.''.$new_arrival['id'];
                        ?>
                    <div class="product-item recent-product style-01 rows-space-0 post-93 product type-product status-publish has-post-thumbnail product_cat-light product_cat-table product_cat-new-arrivals product_tag-table product_tag-sock first instock shipping-taxable purchasable product-type-simple  ">
                        <div class="product-inner tooltip-left">
                            <div class="product-thumb">
                                <a class="thumb-link"
                                   href="<?= $product_url ?>" tabindex="0">
                                    <img class="img-responsive"
                                         src="<?= $img_path; ?>"
                                         alt="<?= $product_name; ?>" width="270" height="350">
                                </a>
                                <div class="flash">
                                    <span class="onnew"><span class="text">New</span></span></div>
                                <div class="group-button">
                                    <div class="yith-wcwl-add-to-wishlist">
                                        <div class="yith-wcwl-add-button show">
                                            <a href="#" class="add_to_wishlist">Add to Wishlist</a>
                                        </div>
                                    </div>

                                    <a href="#" class="button yith-wcqv-button">Quick View</a>
                                    <div class="add-to-cart">
                                        <a href="#" class="button product_type_simple add_to_cart_button">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info equal-elem">
                                <h3 class="product-name product_title">
                                    <a href="<?= $product_url; ?>"
                                       tabindex="0"><?= $product_name; ?></a>
                                </h3>
                               <!-- <div class="rating-wapper nostar">
                                    <div class="star-rating"><span style="width:0%">Rated <strong
                                            class="rating">0</strong> out of 5</span></div>
                                    <span class="review">(0)</span></div>-->
                                <span class="price"><span class="akasha-Price-amount amount"><span
                                        class="akasha-Price-currencySymbol">₹</span><?= $new_arrival['rent_amount'] ?></span></span>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="section-038">
        <div class="akasha-banner style-07 left-center">
            <div class="banner-inner">
                <figure class="banner-thumb">
                    <img src="../assets/images/banner28.jpg"
                         class="attachment-full size-full" alt="img"></figure>
                <div class="banner-info container">
                    <div class="banner-content">
                        <div class="title-wrap">
                            <div class="banner-label">

                            </div>
                            <h6 class="title">
                                New Collection </h6>
                        </div>
                        <div class="cate">

                        </div>
                        <div class="button-wrap">
                            <div class="subtitle">
                                Panache Rental has got new exclusive collection for you.
                            </div>
                            <a class="button" target="_self" href="#"><span>Shop now</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section-014">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="akasha-iconbox style-02">
                        <div class="iconbox-inner">
                            <div class="icon">
                                <span class="flaticon-rocket-ship"></span>
                            </div>
                            <div class="content">
                                <h4 class="title">Cleanliness and Hygiene</h4>
                                <div class="desc">Cleanliness and hygiene is maintance at store.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="akasha-iconbox style-02">
                        <div class="iconbox-inner">
                            <div class="icon">
                                <span class="flaticon-padlock"></span>
                            </div>
                            <div class="content">
                                <h4 class="title">Safe Deposite</h4>
                                <div class="desc">Deposite will be applicable as per policy for safety purpose.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="akasha-iconbox style-02">
                        <div class="iconbox-inner">
                            <div class="icon">
                                <span class="flaticon-recycle"></span>
                            </div>
                            <div class="content">
                                <h4 class="title">3 Days Return</h4>
                                <div class="desc">Pick up outfit before your event, use it on event day and return next day of event.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="akasha-iconbox style-02">
                        <div class="iconbox-inner">
                            <div class="icon">
                                <span class="flaticon-support"></span>
                            </div>
                            <div class="content">
                                <h4 class="title">Shop Confidence</h4>
                                <div class="desc">Our Buyer Protection covers your purchase from click to delivery.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php include("footer.php"); ?>
<a href="#" class="backtotop active">
    <i class="fa fa-angle-up"></i>
</a>
<script src="../assets/js/jquery-1.12.4.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/chosen.min.js"></script>
<script src="../assets/js/countdown.min.js"></script>
<script src="../assets/js/jquery.scrollbar.min.js"></script>
<script src="../assets/js/lightbox.min.js"></script>
<script src="../assets/js/magnific-popup.min.js"></script>
<script src="../assets/js/slick.js"></script>
<script src="../assets/js/jquery.zoom.min.js"></script>
<script src="../assets/js/threesixty.min.js"></script>
<script src="../assets/js/jquery-ui.min.js"></script>
<script src="../assets/js/mobilemenu.js"></script>
<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyC3nDHy1dARR-Pa_2jjPCjvsOR4bcILYsM'></script>
<script src="../assets/js/functions.js"></script>
</body>
</html>