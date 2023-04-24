
<?php

foreach ($occaion_master as $occasion){
    $occ_result=$db_con->getOccassionProduct($occasion['id']);
    $occasion_list=$occ_result['product_list'];
    //print_r($occasion); die;
?>
<div class="section-001">
    <div class="container">
        <div class="akasha-heading style-01">
            <div class="heading-inner">
                <h3 class="title"><?= $occasion['name'] ?></h3>
                <div class="subtitle">Made easy for selection of outfit for Pre-Wedding.
                </div>
            </div>
        </div>
        <div class="akasha-products style-02">
            <div class="response-product product-list-owl owl-slick equal-container better-height"
                 data-slick="{&quot;arrows&quot;:false,&quot;slidesMargin&quot;:30,&quot;dots&quot;:true,&quot;infinite&quot;:false,&quot;speed&quot;:300,&quot;slidesToShow&quot;:4,&quot;rows&quot;:2}"
                 data-responsive="[{&quot;breakpoint&quot;:480,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesMargin&quot;:&quot;10&quot;}},{&quot;breakpoint&quot;:768,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesMargin&quot;:&quot;10&quot;}},{&quot;breakpoint&quot;:992,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesMargin&quot;:&quot;20&quot;}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesMargin&quot;:&quot;20&quot;}},{&quot;breakpoint&quot;:1500,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesMargin&quot;:&quot;30&quot;}}]">
                <?php foreach ($occasion_list as $occasion_item){
                    $product_name= $occasion_item['name'];
                    /*$img_path="assets/images/apro134-1-600x778.jpg";
                    if($occasion_item['images']!='' && file_exists($server_dir_img.''.$occasion_item['images'])){
                        //$img_path= '/../panache_bil_git_hub/uploads/'.$product['images'];
                        $img_path= $img_default_url.''.$occasion_item['images'];
                    }*/
                    $img_path= $db_con->getImagePath($occasion_item['images'],array('width'=>600,'height'=>766));
                    $product_url=$def_product_url.''.$occasion_item['id'];
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
                                            class="akasha-Price-currencySymbol">₹</span><?= $occasion_item['rent_amount'] ?>  </span> <!--– <span
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
                <img src="assets/images/banner101.jpg"
                     class="attachment-full size-full" alt="img"></figure>
            <div class="banner-info container">
                <div class="banner-content">
                    <div class="title-wrap">
                        <div class="banner-label">
                            Occasion
                        </div>
                        <h6 class="title">
                            <?= $occasion['name'] ?> </h6>
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
<?php  } ?>