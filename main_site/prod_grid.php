<div class=" auto-clear equal-container better-height akasha-products">
                    <ul class="row products columns-3">
                        <?php foreach ($product_lists as $product ) {
                            $product_name= $product['name'];
                            /*$img_path="assets/images/apro134-1-600x778.jpg";
                            $img_path= $img_default_url.''.$product['images'];
                            if($product['images']!='' && file_exists($server_dir_img.''.$product['images'])){
                                //$img_path= '/../../panache_bil_git_hub/uploads/'.$product['images'];
                                $img_path= $img_default_url.''.$product['images'];
                            }*/

                           // $img_path = $db_con->getImagePathList($image_list,$product['id']);
                            //echo $product['images'];
                            $img_path= $db_con->getImagePath($product['images'],array('width'=>600,'height'=>766));
                            //echo "new >> ".$img_path;
                            $product_url=$def_product_url.''.$product['id'];

                            ?>
                        <li class="product-item wow fadeInUp product-item rows-space-30 col-bg-4 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-ts-6 style-01 post-24 product type-product status-publish has-post-thumbnail product_cat-chair product_cat-table product_cat-new-arrivals product_tag-light product_tag-hat product_tag-sock first instock featured shipping-taxable purchasable product-type-variable has-default-attributes"
                            data-wow-duration="1s" data-wow-delay="0ms" data-wow="fadeInUp">
                            <div class="product-inner tooltip-left">
                                <div class="product-thumb">
                                    <a class="thumb-link" href="<?= $product_url; ?>">
                                        <img class="img-responsive"
                                             src="<?= $img_path; ?>"
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
                                                   <!-- <div class="data-val attribute-pa_color"
                                                         data-attributetype="box_style"><a class="change-value color"
                                                                                           href="#"
                                                                                           style="background: #3155e2;"
                                                                                           data-value="blue"></a><a
                                                            class="change-value color" href="#"
                                                            style="background: #49aa51;" data-value="green"></a><a
                                                            class="change-value color" href="#"
                                                            style="background: #ff63cb;" data-value="pink"></a></div>-->
                                                    <a class="reset_variations" href="#" style="visibility: hidden;">Clear</a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                    <!--<div class="group-button">
                                        <div class="yith-wcwl-add-to-wishlist">
                                            <div class="yith-wcwl-add-button show">
                                                <a href="#" class="add_to_wishlist">Add to Wishlist</a>
                                            </div>
                                        </div>

                                        <a href="#" class="button yith-wcqv-button">Quick View</a>
                                        <div class="add-to-cart">
                                            <a href="#" class="button product_type_variable add_to_cart_button">Select
                                                options</a>
                                        </div>
                                    </div>-->
                                </div>
                                <div class="product-info equal-elem">
                                    <h3 class="product-name product_title">
                                        <a href="<?= $product_url; ?>"> <?= $product['item_code']; ?> <?= $product_name; ?></a>
                                    </h3>
                                    <!--<div class="rating-wapper nostar">
                                        <div class="star-rating"><span style="width:0%">Rated <strong
                                                class="rating">0</strong> out of 5</span></div>
                                        <span class="review">(0)</span></div>-->
                                    <span class="price"><span class="akasha-Price-amount amount"><span
                                            class="akasha-Price-currencySymbol">₹</span><?= $product['rent_amount']; ?></span> <!--– <span
                                            class="akasha-Price-amount amount"><span
                                            class="akasha-Price-currencySymbol">₹</span>54.00</span>--></span>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
               </ul>
                </div>