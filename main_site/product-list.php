<!DOCTYPE html>
<?php include("controllers/DBConnect.php"); ?>
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
$view_type=isset($_GET['vw'])?$_GET['vw']:"g";
$limit=isset($_GET['limit'])?$_GET['limit']:21;
$next_pagination=isset($_GET['next'])?$_GET['next']:0;
$page_no=isset($_GET['page_no'])?$_GET['page_no']:1;
$record_end=($limit*$page_no) ;
$record_start=($page_no==1)?$page_no:$record_end-$limit;
$def_product_url="product-details.php?prod_id=";
$pages_limit=9;
$db_con= new DBConnect();
$select_type_ids=isset($_GET["typ_ids"])?$_GET["typ_ids"]:"";
$product_return= $db_con->getProductlist($category_id,$limit,$page_no,$select_type_ids);
$type_list= $db_con->getTypeList($category_id);
$cat_name= $db_con->getcatdetails($category_id);
//print_r($_SERVER['DOCUMENT_ROOT']);die;
$img_orignal_path="/panache_bill/uploads/";
$img_default_url="/..".$img_orignal_path;
$product_lists= $product_return['product_list'];
$number_pages= $product_return['number_pages'];
$total_records= $product_return['total_records'];
//$image_list= $product_return['image_list'];
$record_end=($total_records<$record_end)?$total_records:$record_end;
$record_range=$record_start." -".$record_end;
$server_dir_img=$_SERVER['DOCUMENT_ROOT']."/".$img_orignal_path;
$sel_type_ids_arr=array();
if($select_type_ids!='') {
    $sel_type_ids_arr = explode(',', $select_type_ids);
}

?>
<?php include("menu.php"); ?>
<div class="banner-wrapper has_background">
    <img src="assets/images/banner-for-all2.jpg"
         class="img-responsive attachment-1920x447 size-1920x447" alt="img">
    <div class="banner-wrapper-inner">
        <h1 class="page-title"><?= $cat_name; ?></h1>
        <div role="navigation" aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
            <ul class="trail-items breadcrumb">
                <li class="trail-item trail-begin"><a href="index.php"><span>Home</span></a></li>
                <li class="trail-item trail-end active"><span><?= $cat_name; ?></span>
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
                            <a  data-toggle="tooltip" data-placement="top"
                                    class="modes-mode mode-grid display-mode <?= ($view_type=='g')?'active':''; ?>" value="grid" onclick="setview('g',this)">
                                <span class="button-inner">
                                    Shop Grid
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </span>
                            </a>
                            <a  data-toggle="tooltip" data-placement="top"
                                    class="modes-mode mode-list display-mode <?= ($view_type=='l')?'active':''; ?>" value="list" onclick="setview('l',this)">
                                <span class="button-inner">
                                    Shop List
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </span>
                            </a>
                        </form>
                    </div>
                    <!--<form class="akasha-ordering" method="get">
                        <select title="product_cat" name="orderby" class="orderby">
                            <option value="menu_order" selected="selected">Default sorting</option>
                            <option value="popularity">Sort by popularity</option>

                            <option value="date">Sort by latest</option>
                            <option value="price">Sort by price: low to high</option>
                            <option value="price-desc">Sort by price: high to low</option>
                        </select>
                    </form>-->
                    <form class="per-page-form">
                      <!--  <label>
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
                        </label>-->
                    </form>
                </div>
                <?php
                $view_name=($view_type=="l")?"prod_list.php":"prod_grid.php";

                include($view_name); ?>
                <?php if($number_pages!=0){ ?>
                <div class="shop-control shop-after-control">
                    <nav class="akasha-pagination">
                        <?php
                        $start_page=0;
                        $end_page=$pages_limit;

                        //$next_pagination=1;
                      //  if(isset($next_pagination) && $next_pagination!=0){
                            $start_page=($pages_limit*$next_pagination);
                            $end_page=$start_page+$pages_limit;
                      //  }
                         if($number_pages< ($pages_limit*(1+$next_pagination))){
                            $end_page=$number_pages;
                        }
                         if($next_pagination!=0){
                         ?>
                         <a class="prev page-numbers" onclick="requestnext(<?= $next_pagination-1; ?>,<?= $start_page; ?>)">Prev</a>
                        <?php
                        }
                        for($i=$start_page; $i<$end_page; $i++){
                            $page_number=$i+1;

                            if($page_number==$page_no){
                            ?>
                        <span class="page-numbers current"><?= $page_number; ?> </span>
                                <?php }else{ ?>
                        <a class="page-numbers" onclick="gotpage(this)"><?= $page_number; ?></a>

                    <?php } } ?>
                        <?php if($number_pages > ($pages_limit*(1+$next_pagination))){ ?>
                        <a class="next page-numbers" onclick="requestnext(<?= $next_pagination+1; ?>,<?= $end_page+1; ?>)">Next</a>
                        <?php } ?>
                    </nav>
                    <p class="akasha-result-count">Showing <?= $record_range ?> of <?= $total_records ?> results</p>
                </div>
                <?php } ?>
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
                 <!--   <div id="akasha_price_filter-2" class="widget akasha widget_price_filter"><h2
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
                    </div>-->
                  <!--  <div id="akasha_akasha_layered_nav-4"
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
                    </div>-->
                <!--    <div id="akasha_layered_nav-6"
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
                    </div>-->

                </div><!-- .widget-area -->
            </div>
        </div>
    </div>
</div>
<?php  include("footer.php"); ?>
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
<script type="application/javascript">
    function requestnext(page_next,page_number){
        var newUrl= changeurl("next",page_next);
        newUrl= changeurl("page_no",page_number,newUrl);
        window.location.href =newUrl;
    }
    function gotpage(page_link){
        var page_number= $(page_link).html();
        var newUrl = changeurl("page_no",page_number);
         window.location.href =newUrl;
    }
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
           var  newUrl= changeurl("typ_ids",type_selected);
           window.location.href =newUrl;
       // }
    }
    function setview(view_type,el){
       if(!$(el).hasClass('active')) {
           var newUrl = changeurl("vw", view_type);
           window.location.href = newUrl;
       }
    }

    function changeurl(param,param_value,currentUrl="") {
        if(currentUrl==""){
            currentUrl = window.location.href;
        }
var url = new URL(currentUrl);
if(param=="typ_ids"){
    url.searchParams.delete("page_no")
    url.searchParams.delete("next")
}
if(param_value!='') {
    url.searchParams.set(param, param_value); // setting your param
}else{
    url.searchParams.delete(param)
}
var newUrl = url.href;
//console.log(newUrl)

return newUrl;
    }
</script>
</body>
</html>