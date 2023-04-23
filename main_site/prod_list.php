<div class=" auto-clear equal-container better-height akasha-products">
                    <ul class="row products columns-3">
                          <?php foreach ($product_lists as $product ) {
                            $product_name= $product['name'];
                            /*$img_path="assets/images/apro134-1-600x778.jpg";
                            if($product['images']!='' && file_exists($server_dir_img.''.$product['images'])){
                                //$img_path= '/../../panache_bil_git_hub/uploads/'.$product['images'];
                                $img_path= $img_default_url.''.$product['images'];
                            }*/

                              $img_path = $db_con->getImagePath($product['images'],array('width'=>600,'height'=>766));
                            ?>
                        <li class="product-item wow fadeInUp product-item list col-md-12 post-24 product type-product status-publish has-post-thumbnail product_cat-chair product_cat-table product_cat-new-arrivals product_tag-light product_tag-hat product_tag-sock first instock featured shipping-taxable purchasable product-type-variable has-default-attributes"
                            data-wow-duration="1s" data-wow-delay="0ms" data-wow="fadeInUp">
                            <div class="product-inner images">
                                <div class="product-thumb">
                                    <a class="thumb-link" href="#">
                                        <img class="img-responsive"
                                             src="<?= $img_path; ?>"
                                             alt="<?= $product_name; ?>" width="600" height="778">
                                    </a>
                                    <div class="flash">
                                        <span class="onnew"><span class="text">New</span></span></div>
                                   <!-- <form class="variations_form cart" method="post" enctype="multipart/form-data">
                                        <table class="variations">
                                            <tbody>
                                            <tr>
                                                <td class="value">
                                                    <select title="box_style" data-attributetype="box_style"
                                                            data-id="pa_color"
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
                                                    </select>
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
                                    <a href="#" class="button yith-wcqv-button" data-product_id="24">Quick View</a>-->
                                </div>
                                <div class="product-info">
                                    <!--<div class="rating-wapper nostar">
                                        <div class="star-rating"><span style="width:0%">Rated <strong
                                                class="rating">0</strong> out of 5</span></div>
                                        <span class="review">(0)</span></div>-->
                                    <h3 class="product-name product_title">
                                        <a href="#"><?= $product['item_code']; ?> <?= $product_name; ?></a>
                                    </h3>
                                    <span class="price"><span class="akasha-Price-amount amount"><span
                                            class="akasha-Price-currencySymbol">₹</span>45.00</span> – <span
                                            class="akasha-Price-amount amount"><span
                                            class="akasha-Price-currencySymbol">₹</span>54.00</span></span>
                                    <div class="akasha-product-details__short-description">
                                        <p><?= $product['details']; ?></p>
                                        <ul>
                                            <li>Water-resistant fabric with soft lycra detailing inside</li>
                                            <li>CLean zip-front, and three piece hood</li>
                                            <li>Subtle branding and diagonal panel detail</li>
                                        </ul>
                                    </div>
                                </div>
                                <!--<div class="group-button">
                                    <div class="group-button-inner">
                                        <div class="add-to-cart">
                                            <a href="#" class="button product_type_variable add_to_cart_button">Select
                                                options</a>
                                        </div>
                                        <div class="yith-wcwl-add-to-wishlist">
                                            <div class="yith-wcwl-add-button show">
                                                <a href="#" class="add_to_wishlist">Add to Wishlist</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>-->
                            </div>
                        </li>
                        <?php } ?>

                    </ul>
                </div>