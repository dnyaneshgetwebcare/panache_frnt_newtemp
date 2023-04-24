<?php
//print_r($display_list_type);die;
foreach ($display_list_type as $display_type) {
    $result_ar = $db_con->getNewArrival($display_type['id']);
    //$occasion_list = $occ_result['product_list'];
    //$result_ar=$db_con->getNewArrival(1);
    /*$perweeding=$result['product_list'];
    $result_ar=$db_con->getNewArrival();*/
    $new_arrivals=$result_ar['product_list'];
?>

<div class="section-001">
    <div class="container">
        <div class="akasha-heading style-01">
            <div class="heading-inner">
                <h3 class="title"> <?= $display_type['name']; ?> </h3>
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
                   /* $img_path="assets/images/apro134-1-600x778.jpg";
                    if($new_arrival['images']!='' && file_exists($server_dir_img.''.$new_arrival['images'])){
                        //$img_path= '/../panache_bil_git_hub/uploads/'.$product['images'];
                        $img_path= $img_default_url.''.$new_arrival['images'];
                    }*/
                    $img_path= $db_con->getImagePath($new_arrival['images'],array('width'=>600,'height'=>766));
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
                <img src="assets/images/banner28.jpg"
                     class="attachment-full size-full" alt="img"></figure>
            <div class="banner-info container">
                <div class="banner-content">
                    <div class="title-wrap">
                        <div class="banner-label">

                        </div>
                        <h6 class="title">
                            <?= $display_type['name'] ?> </h6>
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
<?php } ?>
