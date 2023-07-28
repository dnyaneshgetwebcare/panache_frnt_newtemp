<div class="banner-wrapper has_background">
    <?php if($banner_img_path!=null){ ?>
    <img src="<?= $banner_img_path; ?>"
         class="img-responsive attachment-1920x447 size-1920x447" alt="img">
<?php }else{ ?>
    <div style="min-height: 280px; background-image: linear-gradient(to right, rgb(255 0 0 / 1%), rgb(202 202 204));"></div>
    <?php } ?>
    <div class="banner-wrapper-inner">
        <h1 class="page-title"><?= $title; ?></h1>
        <div role="navigation" aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
            <ul class="trail-items breadcrumb">
                <li class="trail-item trail-begin"><a href="index.php"><span>Home</span></a></li>
                <li class="trail-item trail-end active"><span><?= $title; ?></span>
                </li>
            </ul>
        </div>
    </div>
</div>