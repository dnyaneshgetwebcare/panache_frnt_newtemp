<!DOCTYPE html>
<?php include("controllers/DBConnect.php");

$db_con= new DBConnect();

$result=$db_con->getBestSellers();
$occaion_master=$db_con->getOccassionMaster(1);
$display_list_type=$db_con->getDisplayType(1);
$best_sellers=$result['product_list'];

 $def_product_url="product-details.php?prod_id=";
$img_orignal_path="/panache_bil_git_hub/uploads/";
$img_default_url="/..".$img_orignal_path;
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
                <img src="assets/images/banner/2.jpg" alt="image">
                <div class="slide-info">
                    <div class="container">
                        <div class="slide-inner">
                            <h5 style="color: aqua;">Limited Colletion</h5>
                            <h1 style="color: antiquewhite;" >Women</h1>
                            <h2 style="color: aliceblue;"> Wears</h2>
                            <a href="product-list.php?cat_id=2">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide-wrap">
                <img src="assets/images/banner/banner2.jpg" alt="image">
                <div class="slide-info">
                    <div class="container">
                        <div class="slide-inner">
                            <h5 style="color: aqua;">Exclusive</h5>
                            <h1><span style="color: bisque;" >Lengha</h1>
                            <h2 style="color: aliceblue;">for Wedding</h2>
                            <a href="product-list.php?cat_id=2">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide-wrap">
                <img src="assets/images/banner/women5.jpg" alt="image">
                <div class="slide-info">
                    <div class="container">
                        <div class="slide-inner">
                            <h5>Bridel</h5>
                            <h1>Wears</h1>

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
                                <img src="assets/images/banner/women.jpeg" style="height: 570px;"
                                     class="attachment-full size-full" alt="img"></figure>
                            <div class="banner-info ">
                                <div class="banner-content">
                                    <div class="title-wrap">
                                        <h6 class="title">
                                            <a target="_self" href="product-list.php?cat_id=2" style="color: aliceblue;" >Womens</a>
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
                                <img src="assets/images/banner/mens_banner_1.jpg"
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
                                <img src="assets/images/banner/jewl_banner.jpg"
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
<?php include('views/occassion_view.php'); ?>
<?php include('views/product_display.php'); ?>

<div class="section-014">
        <div class="container">
            <div class="row">
                 <div class="col-md-6 col-lg-3">
                    <div class="akasha-iconbox style-02">
                        <div class="iconbox-inner">
                            <div class="icon">
                                <span class="flaticon-recycle"></span>
                            </div>
                            <div class="content">
                                <h4 class="title">3 Days Return</h4>
                                <div class="desc">Our return policy allows you to pick up your outfit prior to your event, use it on the day of the event, and return it the following day.</div>
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
                                <h4 class="title">Security Deposite</h4>
                                <div class="desc">Our deposit policy is determined by the specific dress you choose to rent, and it is fully refundable*.</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="akasha-iconbox style-02">
                        <div class="iconbox-inner">
                            <div class="icon">
                                <span class="flaticon-shopping-bag"></span>
                            </div>
                            <div class="content">
                                <h4 class="title">Variety</h4>
                                <div class="desc">We offer a diverse range of clothing collections that are guaranteed to elevate your event to the next level.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="akasha-iconbox style-02">
                        <div class="iconbox-inner">
                            <div class="icon">
                                <span class="flaticon-diamond"></span>
                            </div>
                            <div class="content">
                                <h4 class="title">Cleanliness and Hygiene</h4>
                                <div class="desc">We prioritize cleanliness and hygiene maintenance at our store to ensure a pleasant and safe experience for our customers.
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
<script src="assets/js/jquery-1.12.4.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/chosen.min.js"></script>
<script src="assets/js/countdown.min.js"></script>
<script src="assets/js/jquery.scrollbar.min.js"></script>
<script src="assets/js/lightbox.min.js"></script>
<script src="assets/js/magnific-popup.min.js"></script>
<script src="assets/js/slick.js"></script>
<script src="assets/js/jquery.zoom.min.js"></script>
<script src="assets/js/threesixty.min.js"></script>
<script src="assets/js/jquery-ui.min.js"></script>
<script src="assets/js/mobilemenu.js"></script>
<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyC3nDHy1dARR-Pa_2jjPCjvsOR4bcILYsM'></script>
<script src="assets/js/functions.js"></script>
</body>
</html>