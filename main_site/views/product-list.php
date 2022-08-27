<!DOCTYPE html>
<?php include("../controllers/DBConnect.php"); ?>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <?php include("include_files.php"); ?>
    <title>Panache Rental Boutique</title>
</head>
<body>
<?php
$category_id=isset($_GET['cat_id'])?$_GET['cat_id']:1;
$limit=isset($_GET['limit'])?$_GET['limit']:21;
$page_no=isset($_GET['page_no'])?$_GET['page_no']:1;

$db_con= new DBConnect();
$select_type_ids=isset($_GET["typ_ids"])?$_GET["typ_ids"]:"";
$product_return= $db_con->getProductlist($category_id,$limit,$page_no,$select_type_ids);
$type_list= $db_con->getTypeList($category_id);
//print_r($_REQUEST);die;
$product_lists= $product_return['product_list'];
$number_pages= $product_return['number_pages'];
//print_r($number_pages);
$sel_type_ids_arr=array();
if($select_type_ids!='') {
    $sel_type_ids_arr = explode(',', $select_type_ids);
}

?>
<?php include("menu.php"); ?>
<div class="banner-wrapper has_background">
    <img src="../assets/images/banner-for-all2.jpg"
         class="img-responsive attachment-1920x447 size-1920x447" alt="img">
    <div class="banner-wrapper-inner">
        <h1 class="page-title">Shop</h1>
        <div role="navigation" aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
            <ul class="trail-items breadcrumb">
                <li class="trail-item trail-begin"><a href="index.html"><span>Home</span></a></li>
                <li class="trail-item trail-end active"><span>Shop</span>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="main-container shop-page left-sidebar">
    <div class="container">
        <div class="row">
            <div class="main-content col-xl-9 col-lg-8 col-md-8 col-sm-12 has-sidebar">
                <div class="shop-control shop-before-control">
                    <div class="grid-view-mode">
                        <form>
                            <a href="shop.html" data-toggle="tooltip" data-placement="top"
                                    class="modes-mode mode-grid display-mode active" value="grid">
                                <span class="button-inner">
                                    Shop Grid
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </span>
                            </a>
                            <a href="shop-list.html" data-toggle="tooltip" data-placement="top"
                                    class="modes-mode mode-list display-mode " value="list">
                                <span class="button-inner">
                                    Shop List
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </span>
                            </a>
                        </form>
                    </div>
                    <form class="akasha-ordering" method="get">
                        <select title="product_cat" name="orderby" class="orderby">
                            <option value="menu_order" selected="selected">Default sorting</option>
                            <option value="popularity">Sort by popularity</option>
                            <option value="rating">Sort by average rating</option>
                            <option value="date">Sort by latest</option>
                            <option value="price">Sort by price: low to high</option>
                            <option value="price-desc">Sort by price: high to low</option>
                        </select>
                    </form>
                    <form class="per-page-form">
                        <label>
                            <select class="option-perpage">
                                <option value="12" selected="">
                                    Show 12
                                </option>
                                <option value="5">
                                    Show 05
                                </option>
                                <option value="10">
                                    Show 10
                                </option>
                                <option value="12">
                                    Show 12
                                </option>
                                <option value="15">
                                    Show 15
                                </option>
                                <option value="20">
                                    Show All
                                </option>
                            </select>
                        </label>
                    </form>
                </div>
                <div class=" auto-clear equal-container better-height akasha-products">
                    <ul class="row products columns-3">
                        <?php foreach ($product_lists as $product ) {
                            $product_name= $product['name']
                            ?>
                        <li class="product-item wow fadeInUp product-item rows-space-30 col-bg-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-ts-6 style-01 post-24 product type-product status-publish has-post-thumbnail product_cat-chair product_cat-table product_cat-new-arrivals product_tag-light product_tag-hat product_tag-sock first instock featured shipping-taxable purchasable product-type-variable has-default-attributes"
                            data-wow-duration="1s" data-wow-delay="0ms" data-wow="fadeInUp">
                            <div class="product-inner tooltip-left">
                                <div class="product-thumb">
                                    <a class="thumb-link" href="#">
                                        <img class="img-responsive"
                                             src="<?= '/../../panache_bil_git_hub/uploads/'.$product['images']; ?>"
                                             alt="<?= $product_name; ?>" width="600" height="778">
                                    </a>
                                    <div class="flash">
                                        <span class="onnew"><span class="text">New</span></span></div>
                                    <form class="variations_form cart">
                                        <table class="variations">
                                            <tbody>
                                            <tr>
                                                <td class="value">
                                                 <!--   <select title="box_style" data-attributetype="box_style" data-id="pa_color"
                                                            class="attribute-select " name="attribute_pa_color"
                                                            data-attribute_name="attribute_pa_color"
                                                            data-show_option_none="yes">
                                                        <option data-type="" data-pa_color="" value="">Choose an
                                                            option
                                                        </option>
                                                        <option data-width="30" data-height="30" data-type="color"
                                                                data-pa_color="#3155e2" value="blue"
                                                                class="attached enabled">Blue
                                                        </option>
                                                        <option data-width="30" data-height="30" data-type="color"
                                                                data-pa_color="#49aa51" value="green"
                                                                class="attached enabled">Green
                                                        </option>
                                                        <option data-width="30" data-height="30" data-type="color"
                                                                data-pa_color="#ff63cb" value="pink"
                                                                class="attached enabled">Pink
                                                        </option>
                                                    </select>-->
                                                    <div class="data-val attribute-pa_color"
                                                         data-attributetype="box_style"><a class="change-value color"
                                                                                           href="#"
                                                                                           style="background: #3155e2;"
                                                                                           data-value="blue"></a><a
                                                            class="change-value color" href="#"
                                                            style="background: #49aa51;" data-value="green"></a><a
                                                            class="change-value color" href="#"
                                                            style="background: #ff63cb;" data-value="pink"></a></div>
                                                    <a class="reset_variations" href="#" style="visibility: hidden;">Clear</a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </form>
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
                                            <a href="#" class="button product_type_variable add_to_cart_button">Select
                                                options</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-info equal-elem">
                                    <h3 class="product-name product_title">
                                        <a href="#"> <?= $product_name; ?></a>
                                    </h3>
                                    <div class="rating-wapper nostar">
                                        <div class="star-rating"><span style="width:0%">Rated <strong
                                                class="rating">0</strong> out of 5</span></div>
                                        <span class="review">(0)</span></div>
                                    <span class="price"><span class="akasha-Price-amount amount"><span
                                            class="akasha-Price-currencySymbol">$</span>45.00</span> – <span
                                            class="akasha-Price-amount amount"><span
                                            class="akasha-Price-currencySymbol">$</span>54.00</span></span>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
               </ul>
                </div>
                <div class="shop-control shop-after-control">
                    <nav class="akasha-pagination">
                        <?php
                        $start_page=0;
                        $end_page=10;
                        if($page_no >10){
                            $start_page=$start_page+$page_no;
                            $end_page=$start_page+$page_no;
                        }
                        for($i=$start_page; $i<$end_page; $i++){
                            $page_number=$i+1;

                            if($page_number==$page_no){
                            ?>
                        <span class="page-numbers current"><?= $page_number; ?> </span>
                                <?php }else{ ?>
                        <a class="page-numbers" ><?= $page_number; ?></a>

                    <?php } } ?>
                        <a class="next page-numbers" >Next</a>
                    </nav>
                    <p class="akasha-result-count">Showing 1–12 of 20 results</p>
                </div>
            </div>
            <div class="sidebar col-xl-3 col-lg-4 col-md-4 col-sm-12">
                <div id="widget-area" class="widget-area shop-sidebar">
                    <div id="akasha_product_search-2" class="widget akasha widget_product_search">
                        <form class="akasha-product-search">
                            <input id="akasha-product-search-field-0" class="search-field"
                                   placeholder="Search products…" value="" name="s" type="search">
                            <button type="submit" value="Search">Search</button>
                        </form>
                    </div>
                        <div id="akasha_product_categories-3" class="widget akasha widget_product_categories"><h2
                            class="widgettitle">Product categories<span class="arrow"></span></h2>
                        <ul class="product-categories type_list">
                            <?php foreach ($type_list as $type_item) {
                                $class_cur= (array_search($type_item['type_id'],$sel_type_ids_arr)===false)?"":"current-cat";
                                ?>
                            <li class="cat-item   <?= $class_cur.' cat-item-'.$type_item['type_id']; ?>"
                                data-type="<?= $type_item['type_id']; ?>" onclick="change_type(this)">
                                <a ><?= $type_item['name']; ?></a>
                                <span class="count">(<?= $type_item['total_cnt']; ?>)</span></li>
                         <?php  } ?>
                        </ul>
                    </div>
                    <div id="akasha_price_filter-2" class="widget akasha widget_price_filter"><h2
                            class="widgettitle">Filter By Price<span class="arrow"></span></h2>
                        <form method="get" action="#">
                            <div class="price_slider_wrapper">
                                <div data-label-reasult="Range:" data-min="0" data-max="1000" data-unit="$"
                                     class="price_slider" data-value-min="100" data-value-max="800">
                                </div>
                                <div class="price_slider_amount">
                                    <button type="submit" class="button">Filter</button>
                                    <div class="price_label">
                                        Price: <span class="from">$100</span> — <span class="to">$800</span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="akasha_akasha_layered_nav-4"
                         class="widget akasha_widget_layered_nav widget_layered_nav">
                        <h2 class="widgettitle">Filter By Color<span class="arrow"></span></h2>
                        <div class="color-group">
                            <a class="term-color " href="#">
                                <i style="color: #000000"></i>
                                <span class="term-name">Black</span>
                                <span class="count">(4)</span> </a>
                            <a class="term-color " href="#">
                                <i style="color: #3155e2"></i>
                                <span class="term-name">Blue</span>
                                <span class="count">(3)</span> </a>
                            <a class="term-color " href="#">
                                <i style="color: #49aa51"></i>
                                <span class="term-name">Green</span>
                                <span class="count">(1)</span> </a>
                            <a class="term-color " href="#">
                                <i style="color: #ff63cb"></i>
                                <span class="term-name">Pink</span>
                                <span class="count">(3)</span> </a>
                            <a class="term-color " href="#">
                                <i style="color: #a825ea"></i>
                                <span class="term-name">Purple</span>
                                <span class="count">(1)</span> </a>
                            <a class="term-color " href="#">
                                <i style="color: #db2b00"></i>
                                <span class="term-name">Red</span>
                                <span class="count">(5)</span> </a>
                            <a class="term-color " href="#">
                                <i style="color: #FFFFFF"></i>
                                <span class="term-name">White</span>
                                <span class="count">(2)</span> </a>
                            <a class="term-color " href="#s">
                                <i style="color: #e8e120"></i>
                                <span class="term-name">Yellow</span>
                                <span class="count">(2)</span> </a>
                        </div>
                    </div>
                    <div id="akasha_layered_nav-6"
                         class="widget akasha widget_layered_nav akasha-widget-layered-nav"><h2
                            class="widgettitle">Filter By Size<span class="arrow"></span></h2>
                        <ul class="akasha-widget-layered-nav-list">
                            <li class="akasha-widget-layered-nav-list__item akasha-layered-nav-term ">
                                <a rel="nofollow" href="#">XS</a>
                                <span class="count">(1)</span></li>
                            <li class="akasha-widget-layered-nav-list__item akasha-layered-nav-term ">
                                <a rel="nofollow" href="#">S</a>
                                <span class="count">(4)</span></li>
                            <li class="akasha-widget-layered-nav-list__item akasha-layered-nav-term ">
                                <a rel="nofollow" href="#">M</a>
                                <span class="count">(2)</span></li>
                            <li class="akasha-widget-layered-nav-list__item akasha-layered-nav-term ">
                                <a rel="nofollow" href="#">L</a>
                                <span class="count">(3)</span></li>
                            <li class="akasha-widget-layered-nav-list__item akasha-layered-nav-term ">
                                <a rel="nofollow" href="#">XL</a>
                                <span class="count">(1)</span></li>
                            <li class="akasha-widget-layered-nav-list__item akasha-layered-nav-term ">
                                <a rel="nofollow" href="#">XXL</a>
                                <span class="count">(4)</span></li>
                            <li class="akasha-widget-layered-nav-list__item akasha-layered-nav-term ">
                                <a rel="nofollow" href="#">3XL</a>
                                <span class="count">(4)</span></li>
                            <li class="akasha-widget-layered-nav-list__item akasha-layered-nav-term ">
                                <a rel="nofollow" href="#">4XL</a>
                                <span class="count">(3)</span></li>
                        </ul>
                    </div>

                </div><!-- .widget-area -->
            </div>
        </div>
    </div>
</div>
<?php  include("footer.php"); ?>
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
<script type="application/javascript">
    function change_type(req_li) {
        if($(req_li).hasClass("current-cat")){
            $(req_li).removeClass("current-cat");
        }else{
            $(req_li).addClass("current-cat");
        }
        var type_selected="";
        $('.type_list').each(function(){
            $(this).find('li').each(function(){
                if($(this).hasClass("current-cat")){
                    type_selected+=$(this).attr("data-type")+",";
                    //console.log($(this).attr("data-type"));
                }
        });

        });
        //if(type_selected!=""){
            type_selected=type_selected.slice(0,-1);
            console.log(type_selected);
            var newurl= changeurl("typ_ids",type_selected);
            console.log(newurl);
          window.location.href = newurl;
       // }
    }
    function changeurl(param,param_value) {
        var currentUrl = window.location.href;
var url = new URL(currentUrl);
if(param_value!='') {
    url.searchParams.set(param, param_value); // setting your param
}else{
    url.searchParams.delete(param)
}
var newUrl = url.href;

return newUrl;
    }
</script>
</body>
</html>