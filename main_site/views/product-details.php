<!DOCTYPE html>
<?php include("../controllers/DBConnect.php");
$product_id=isset($_GET['prod_id'])?$_GET['prod_id']:2;
$db_con= new DBConnect();
$product_details= $db_con->getproductDetails($product_id)[0];
$related_products=$db_con->getrelatedProductlist($product_details['category_id'],$product_details['type_id'])['product_list'];
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
  <?php include("include_files.php") ?>
    <title>Panache Rental Boutique </title>
</head>
<body class="single single-product">
<?php include("menu.php"); ?>
<div class="banner-wrapper no_background" style="padding-top: 80px;">
    <div class="banner-wrapper-inner">
        <nav class="akasha-breadcrumb"><a href="index.html">Home</a><i class="fa fa-angle-right"></i><a href="#">Shop</a>
            <i class="fa fa-angle-right"></i><?= $product_details['name']; ?>
        </nav>
    </div>
</div>
<?php
 $img_path1="../assets/images/apro131-2.jpg";
                            if($product_details['images']!='' && file_exists($server_dir_img.''.$product_details['images'])){
                                //$img_path= '/../../panache_bil_git_hub/uploads/'.$product['images'];
                                $img_path1= $img_default_url.''.$product_details['images'];
                            }
?>
<div class="single-thumb-vertical main-container shop-page no-sidebar">
    <div class="container">
        <div class="row">
            <div class="main-content col-md-12">
                <div class="akasha-notices-wrapper"></div>
                <div id="product-27"
                     class="post-27 product type-product status-publish has-post-thumbnail product_cat-table product_cat-new-arrivals product_cat-lamp product_tag-table product_tag-sock first instock shipping-taxable purchasable product-type-variable has-default-attributes">
                    <div class="main-contain-summary">
                        <div class="contain-left has-gallery">
                            <div class="single-left">
                                <div class="akasha-product-gallery akasha-product-gallery--with-images akasha-product-gallery--columns-4 images">
                                    <a href="#" class="akasha-product-gallery__trigger"></a>
                                    <div class="flex-viewport">
                                        <figure class="akasha-product-gallery__wrapper">
                                            <div class="akasha-product-gallery__image">
                                                <img alt="img"
                                                     src="<?= $img_path1; ?>">
                                            </div>
                                          <!--  <div class="akasha-product-gallery__image">
                                                <img src="../assets/images/apro134-1.jpg"
                                                     alt="img">
                                            </div>
                                            <div class="akasha-product-gallery__image">
                                                <img src="../assets/images/apro132-1.jpg"
                                                     class="" alt="img">
                                            </div>
                                            <div class="akasha-product-gallery__image">
                                                <img src="../assets/images/apro133-1.jpg"
                                                     class="" alt="img">
                                            </div>-->
                                        </figure>
                                    </div>
                                    <ol class="flex-control-nav flex-control-thumbs">
                                        <li><img
                                                src="<?= $img_path1; ?>"
                                                alt="img">
                                        </li>
                                   <!--     <li><img
                                                src="../assets/images/apro134-1-100x100.jpg"
                                                alt="img">
                                        </li>
                                        <li><img
                                                src="../assets/images/apro132-1-100x100.jpg"
                                                alt="img">
                                        </li>
                                        <li><img
                                                src="../assets/images/apro133-1-100x100.jpg"
                                                alt="img">
                                        </li>-->
                                    </ol>
                                </div>
                            </div>
                            <div class="summary entry-summary">
                                <div class="flash">
                                    <span class="onnew"><span class="text">New</span></span></div>
                                <h1 class="product_title entry-title"><?= $product_details['name']; ?></h1>
                                <p class="price"><span class="akasha-Price-amount amount"><span
                                        class="akasha-Price-currencySymbol">$</span>146.00</span> – <span
                                        class="akasha-Price-amount amount"><span
                                        class="akasha-Price-currencySymbol">$</span>185.00</span></p>
                               <!-- <p class="stock in-stock">
                                    Availability: <span> In stock</span>
                                </p>-->
                                <div class="akasha-product-details__short-description">
                                    <p><?= $product_details['details']; ?></p>
                                   <!-- <ul>
                                        <li>Water-resistant fabric with soft lycra detailing inside</li>
                                        <li>CLean zip-front, and three piece hood</li>
                                        <li>Subtle branding and diagonal panel detail</li>
                                    </ul>-->
                                </div>
                                <form class="variations_form cart">
                                    <table class="variations">
                                        <tbody>
                                        <tr>
                                            <td class="label"><label>Color</label></td>
                                            <td class="value">
                                                <select title="box_style" data-attributetype="box_style"
                                                        data-id="pa_color"
                                                        class="attribute-select " name="attribute_pa_color"
                                                        data-attribute_name="attribute_pa_color"
                                                        data-show_option_none="yes">
                                                    <option data-type="" data-pa_color="" value="">Choose an option
                                                    </option>
                                                    <option data-width="30" data-height="30" data-type="color"
                                                            data-pa_color="#3155e2" value="blue"
                                                            class="attached enabled">Blue
                                                    </option>
                                                    <option data-width="30" data-height="30" data-type="color"
                                                            data-pa_color="#ff63cb" value="pink"
                                                            class="attached enabled">Pink
                                                    </option>
                                                    <option data-width="30" data-height="30" data-type="color"
                                                            data-pa_color="#db2b00" value="red"
                                                            class="attached enabled">Red
                                                    </option>
                                                    <option data-width="30" data-height="30" data-type="color"
                                                            data-pa_color="#e8e120" value="yellow"
                                                            class="attached enabled">Yellow
                                                    </option>
                                                </select>
                                                <div class="data-val attribute-pa_color" data-attributetype="box_style">
                                                    <a class="change-value color" href="#" style="background: #3155e2;"
                                                       data-value="blue"></a><a class="change-value color" href="#"
                                                                                style="background: #ff63cb;"
                                                                                data-value="pink"></a><a
                                                        class="change-value color" href="#" style="background: #db2b00;"
                                                        data-value="red"></a><a class="change-value color" href="#"
                                                                                style="background: #e8e120;"
                                                                                data-value="yellow"></a></div>
                                                <a class="reset_variations" href="#"
                                                   style="visibility: hidden;">Clear</a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="single_variation_wrap">
                                        <div class="akasha-variation single_variation"></div>
                                        <div class="akasha-variation-add-to-cart variations_button akasha-variation-add-to-cart-disabled">
                                            <div class="quantity">
                                                <span class="qty-label">Quantiy:</span>
                                                <div class="control">
                                                    <a class="btn-number qtyminus quantity-minus" href="#">-</a>
                                                    <input type="text" data-step="1" min="0" max="" name="quantity[25]" value="0" title="Qty" class="input-qty input-text qty text" size="4" pattern="[0-9]*" inputmode="numeric">
                                                    <a class="btn-number qtyplus quantity-plus" href="#">+</a>
                                                </div>
                                            </div>
                                            <button type="submit"
                                                    class="single_add_to_cart_button button alt disabled akasha-variation-selection-needed">
                                                Add to cart
                                            </button>
                                            <input name="add-to-cart" value="27" type="hidden">
                                            <input name="product_id" value="27" type="hidden">
                                            <input name="variation_id" class="variation_id" value="0" type="hidden">
                                        </div>
                                    </div>
                                </form>
                                <div class="yith-wcwl-add-to-wishlist">
                                    <div class="yith-wcwl-add-button show">
                                        <a href="#" rel="nofollow"
                                           data-product-id="27" data-product-type="variable" class="add_to_wishlist">
                                            Add to Wishlist</a>
                                    </div>
                                </div>
                                <div class="clear"></div>
                               <!-- <a href="#"
                                   class="compare button" data-product_id="27" rel="nofollow">Compare</a>-->
                                <div class="product_meta">
                                   <!-- <div class="wcml-dropdown product wcml_currency_switcher">
                                        <ul>
                                            <li class="wcml-cs-active-currency">
                                                <a class="wcml-cs-item-toggle">USD</a>
                                                <ul class="wcml-cs-submenu">
                                                    <li>
                                                        <a>EUR</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>-->
                                    <span class="sku_wrapper">SKU: <span class="sku">885B712</span></span>
                                    <span class="posted_in">Categories: <a
                                            href="#"
                                            rel="tag">Bags</a>, <a
                                            href="#" rel="tag">New arrivals</a>, <a
                                            href="#" rel="tag">Summer Sale</a></span>
                                    <span class="tagged_as">Tags: <a href="#"
                                                                     rel="tag">Bags</a>, <a
                                            href="#" rel="tag">Sock</a></span>
                                </div>
                                <div class="akasha-share-socials">
                                    <h5 class="social-heading">Share: </h5>
                                    <a target="_blank" class="facebook" href="#">
                                        <i class="fa fa-facebook-f"></i>
                                    </a>
                                    <a target="_blank" class="twitter"
                                       href="#"><i class="fa fa-twitter"></i>
                                    </a>
                                    <a target="_blank" class="pinterest"
                                       href="#"> <i class="fa fa-pinterest"></i>
                                    </a>
                                    <a target="_blank" class="googleplus"
                                       href="#"><i class="fa fa-google-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="single-product-policy">
                            <div class="akasha-iconbox style-01">
                                <div class="iconbox-inner">
                                    <div class="icon">
                                        <span class="flaticon-rocket-ship"></span>
                                        <span class="flaticon-rocket-ship"></span>
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Fast Shipping.</h4>
                                        <div class="desc">With sites in 5 languages, we ship to over 200
                                            countries
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="akasha-iconbox style-01">
                                <div class="iconbox-inner">
                                    <div class="icon">
                                        <span class="flaticon-padlock"></span>
                                        <span class="flaticon-padlock"></span>
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Safe delivery</h4>
                                        <div class="desc">Pay with the world’s most popular, secure
                                            payment methods.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="akasha-iconbox style-01">
                                <div class="iconbox-inner">
                                    <div class="icon">
                                        <span class="flaticon-recycle"></span>
                                        <span class="flaticon-recycle"></span>
                                    </div>
                                    <div class="content">
                                        <h4 class="title">365 Days Return</h4>
                                        <div class="desc">Round-the-clock assistance for a shopping
                                            experience.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-12 col-sm-12 dreaming_related-product">
                <div class="block-title">
                    <h2 class="product-grid-title">
                        <span>Related Products</span>
                    </h2>
                </div>
                <div class="owl-slick owl-products equal-container better-height"
                     data-slick="{&quot;arrows&quot;:false,&quot;slidesMargin&quot;:30,&quot;dots&quot;:true,&quot;infinite&quot;:false,&quot;slidesToShow&quot;:4}"
                     data-responsive="[{&quot;breakpoint&quot;:480,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesMargin&quot;:&quot;10&quot;}},{&quot;breakpoint&quot;:768,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesMargin&quot;:&quot;10&quot;}},{&quot;breakpoint&quot;:992,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesMargin&quot;:&quot;20&quot;}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesMargin&quot;:&quot;20&quot;}},{&quot;breakpoint&quot;:1500,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesMargin&quot;:&quot;30&quot;}}]">
                    <?php foreach ($related_products as $product){
                        if($product['id']==$product_id){
                            continue;
                        }
                       $product_url=$def_product_url.''.$product['id'];
                        $product_name= $product['name'];
                            $img_path="../assets/images/apro134-1-600x778.jpg";
                            if($product['images']!='' && file_exists($server_dir_img.''.$product['images'])){
                                //$img_path= '/../../panache_bil_git_hub/uploads/'.$product['images'];
                                $img_path= $img_default_url.''.$product['images'];
                            }
                        ?>
                    <div class="product-item style-01 post-27 product type-product status-publish has-post-thumbnail product_cat-table product_cat-new-arrivals product_cat-lamp product_tag-table product_tag-sock  instock shipping-taxable purchasable product-type-variable has-default-attributes ">
                        <div class="product-inner tooltip-left">
                            <div class="product-thumb">
                                <a class="thumb-link"
                                   href="<?= $product_url; ?>" tabindex="0">
                                    <img class="img-responsive"
                                         src="<?= $img_path; ?>"
                                         alt="<?= $product_name; ?>" width="600" height="778">
                                </a>
                                <div class="flash"><span class="onnew"><span class="text">New</span></span></div>
                                <div class="group-button">
                                    <div class="yith-wcwl-add-to-wishlist">
                                        <div class="yith-wcwl-add-button show">
                                            <a href="#" class="add_to_wishlist">Add to Wishlist</a>
                                        </div>
                                    </div>
                                    <div class="akasha product compare-button">
                                        <a href="#" class="compare button">Compare</a>
                                    </div>
                                    <a href="#" class="button yith-wcqv-button">Quick View</a>
                                    <div class="add-to-cart">
                                        <a href="#" class="button product_type_variable add_to_cart_button">Add to
                                            cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info equal-elem">
                                <h3 class="product-name product_title">
                                    <a href="<?= $product_url; ?>"
                                       tabindex="0"><?= $product_name; ?></a>
                                </h3>
                                <div class="rating-wapper nostar">
                                    <div class="star-rating"><span style="width:0%">Rated <strong
                                            class="rating">0</strong> out of 5</span></div>
                                    <span class="review">(0)</span></div>
                                <span class="price"><span class="akasha-Price-amount amount"><span
                                        class="akasha-Price-currencySymbol">$</span>60.00</span></span>
                            </div>
                        </div>
                    </div>
                <?php } ?>
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