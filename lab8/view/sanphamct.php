    <!---->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">

        </li>
    </ol>
    <!---->
    <!-- banner -->
    <section class="ab-info-main py-md-5 py-4">
        <div class="container py-md-3">
            <!-- top Products -->
            <div class="row">
                <!-- product left -->

                <?php
                include 'boxright.php'
                ?>


                <!-- //product left -->
                <!-- product right -->
                <div class="left-ads-display col-lg-8">
                    <div class="row">

                        <div class="row boxcontent">

                            <?php
                            extract($onesp);
                            $img = $img_path . $img;
                            echo '
                <div class="desc1-left col-md-6">
                <img src="' . $img . '" class="img-fluid" alt="">
            </div>
                ';
                            ?>





                            <div class="desc1-right col-md-6 pl-lg-4">
                                <?php
                                extract($onesp);
                                echo ' <div>
                                <h3>' . $name . '</h3>
                                <h5>' . $price . '</h5>
                                
                                </div>';

                                ?>
                                <div class="available mt-3">
                                <form action="index.php?act=addcart" method="post" class="w3layouts-newsletter">
                                        <input type="number" name="sl" value="1" min=1 max=10 required="" style="height: 24px;
                                                                                                                 margin-right: 10px;">
                                        <input type="hidden" name="id" value="<?php echo $id ?>">
                                        <input type="hidden" name="img" value="<?php echo $img ?>">
                                        <input type="hidden" name="name" value="<?php echo $name ?>">
                                        <input type="hidden" name="price" value="<?php echo $price ?>">
                                        <!-- <input type="submit" value="Đặt Hàng" name="addtocart"> -->
                                        <div> 
                                        <select id="product-select" name="value"  class="single-option-selector">
											
										
											
											<option   value="red" required> màu đỏ</option>
											
											<option  value="blue"> màu xanh </option>
											
											<option  value="black">màu đen<br></option>
											
											<option  value="pink"> màu hồng</option> 
											
										</select>
                                            <!-- <input type="radio" name="value" value="mau đỏ" required> màu đỏ <br>
                                            <input type="radio" name="value" value="màu xanh"> màu xanh <br>
                                            <input type="radio" name="value" value="màu đen">màu đen<br>
                                            <input type="radio" name="value" value="màu hồng"> màu hồng <br> -->
                                        </div> 
                                        <input type="submit" value="Đặt Hàng" name="addtocart" style="margin-left: 10px; height: 25px;">

                                    </form>

                                    <?php
                                    echo ' <p>' . $mota . '</p>';

                                    ?>

                                </div>
                                <div class="share-desc">
                                    <div class="share">
                                        <h4>Share Product :</h4>
                                        <ul class="w3layouts_social_list list-unstyled">
                                            <li>
                                                <a href="#" class="w3pvt_facebook">
                                                    <span class="fa fa-facebook-f"></span>
                                                </a>
                                            </li>
                                            <li class="mx-2">
                                                <a href="#" class="w3pvt_twitter">
                                                    <span class="fa fa-twitter"></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="w3pvt_dribble">
                                                    <span class="fa fa-dribbble"></span>
                                                </a>
                                            </li>
                                            <li class="ml-2">
                                                <a href="#" class="w3pvt_google">
                                                    <span class="fa fa-google-plus"></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
                            <script>
                                $(document).ready(function() {
                                    $("#binhluan").load("view/binhluan/binhluanform.php", {
                                        idpro: <?= $id ?>
                                    });
                                });
                            </script>

                            <div class="manhhihi" style="width: 100%" id="binhluan">
                            </div>


                        </div>

                        <div class="row sub-para-w3layouts mt-5">

                            <h3 class="shop-sing">Lorem ipsum dolor sit amet</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elPellentesque vehicula augue eget nisl ullamcorper, molestie blandit ipsum auctor. Mauris volutpat augue dolor.Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut lab ore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. labore et dolore magna aliqua.</p>
                            <p class="mt-3 italic-blue">Consectetur adipisicing elPellentesque vehicula augue eget nisl ullamcorper, molestie blandit ipsum auctor. Mauris volutpat augue dolor.Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut lab ore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. labore et dolore magna aliqua.</p>
                            <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elPellentesque vehicula augue eget nisl ullamcorper, molestie blandit ipsum auctor. Mauris volutpat augue dolor.Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut lab ore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. labore et dolore magna aliqua.</p>
                        </div>



                        <h3 class="shop-sing">Sản Phẩm Cùng Loại </h3>
                        <div class="row m-0">
                            <?php
                            foreach ($sp_cungloai as  $sp_cungloai) {
                                extract($sp_cungloai);
                                $hinh = $img_path . $img;
                                $linksp = "index.php?act=sanphamct&idsp=" . $id;
                                echo '    <div class="col-md-4 product-men">
                                
                    <div class="product-shoe-info shoe text-center">
                        <div class="men-thumb-item">
                        <a href="' . $linksp . '"><img src="' . $hinh . '" class="img-fluid" alt=""></a>
                            <span class="product-new-top">New</span>
                        </div>
                        <div class="item-info-product">
                            <h4>
                            <a href="' . $linksp . '">' . $name . '</a>
                            </h4>

                            <div class="product_price">
                                <div class="grid-price">
                                <span class="money"> <a href="' . $linksp . '">' . $price . '</a></span>
                                </div>
                            </div>
                            <ul class="stars">
                                <li><a href="#"><span class="fa fa-star" aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="fa fa-star" aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="fa fa-star-half-o" aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="fa fa-star-half-o" aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="fa fa-star-o" aria-hidden="true"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>';
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
    </section>