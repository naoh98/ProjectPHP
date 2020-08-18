@extends('frontend.layouts.main')
@section('title',$product->product_title)
@section('content')
    <div class="banner banner1"
         style="background: url('{{asset('/storage/files/'.basename($product->category_image))}}')no-repeat center;background-size: 100% 100%;">
    </div>
    <!-- //banner -->
    <!-- breadcrumbs -->
    <div class="breadcrumb_dress">
        <div class="container-fluid">
            <ul>
                <li><a href="{{url('/')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
                <li>Chi tiết sản phẩm</li>
            </ul>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- single -->
    <div class="single" style="padding-bottom: 3em;">
        <div class="container">
            <div class="col-md-5 single-left">
                <div class="flexslider">
                    <ul class="slides">
                        <?php
                        if ($product->product_images){
                            $data = json_decode($product->product_images);
                            foreach ($data as $image){ ?>
                            <li data-thumb="{{asset('/storage/files/'.basename($image))}}">
                                <div class="thumb-image"> <img src="{{asset('/storage/files/'.basename($image))}}" data-imagezoom="true" class="img-responsive" alt=""> </div>
                            </li>
                  <?php     }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-7 single-right">
                <h3 style="text-align: center;">{{$product->product_title}}</h3>
                <div class="rating1" style="text-align: center;">
					<span class="starRating">
						<input id="rating5" type="radio" name="rating" value="5">
						<label for="rating5">5</label>
						<input id="rating4" type="radio" name="rating" value="4">
						<label for="rating4">4</label>
						<input id="rating3" type="radio" name="rating" value="3" checked>
						<label for="rating3">3</label>
						<input id="rating2" type="radio" name="rating" value="2">
						<label for="rating2">2</label>
						<input id="rating1" type="radio" name="rating" value="1">
						<label for="rating1">1</label>
					</span>
                </div>
                <div class="description">
                    <div>
                        <label>Danh mục: </label>
                        <span><a href="{{route('cat.pro',['category_id'=>$product->category_id])}}">{{$product->category_name}}</a></span>
                    </div>
                    <div>
                        <label>Hãng sản xuất: </label>
                        <span><a href="{{route('cat.pro.all',['manu'=>$product->manufacturer_id])}}">{{$product->manufacturer_name}}</a></span>
                    </div>
                </div>
                <div class="occasional">
                    <div style="margin-bottom: 20px;">
                        <p>{{$product->manufacturer_desc}}</p>
                    </div>
                    <h5>Thông tin chi tiết</h5>
                    <?php
                        if (count($attributes)<=0){ ?>
                            <div>
                                <p style="color: grey;">Hiện không có thông tin nào về sản phẩm này.</p>
                            </div>
                 <?php  }else{
                    foreach ($attributes as $attribute){ ?>
                    <div style="width: 33%; float: left;">
                        <label>{{$attribute->attribute_name}}:</label>
                        <span>{{$attribute->value}}</span>
                    </div>
            <?php   }
               }
                    ?>
                    <div class="clearfix"> </div>
                </div>
                <div class="simpleCart_shelfItem" style="display: flex; justify-content: center;">
                    <?php $price= number_format($product->product_price_sell ,0,',','.'); ?>
                    <p style="margin-right: 20px"><i class="item_price"><?php echo $price.' Đ'; ?></i></p>
                    <form action="#" method="post" style="margin-top: 5px;">
                        <input type="hidden" name="cmd" value="_cart">
                        <input type="hidden" name="add" value="1">
                        <input type="hidden" name="w3ls_item" value="Smart Phone">
                        <input type="hidden" name="amount" value="450.00">
                        <button type="submit" class="w3ls-cart">Add to cart</button>
                    </form>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    
    <div class="additional_info" style="padding-top: 3em;">
        <div class="container">
            <div class="sap_tabs">
                <div id="horizontalTab1" style="display: block; width: 100%; margin: 0px;">
                    <ul>
                        <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Giới thiệu về sản phẩm</span></li>
                        <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Đánh giá</span></li>
                    </ul>
                    <div class="tab-1 resp-tab-content additional_info_grid" aria-labelledby="tab_item-0">
                            <h3>{{$product->product_title}}</h3>
                            <p class="col-md-9">{{$product->product_desc}}</p>
                            <?php
                            if ($product->product_main_image){ ?>
                                <img class="col-md-3" src="{{asset('/storage/files/'.basename($product->product_main_image))}}" style="height: 320px; " >
                    <?php   }
                            ?>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="tab-2 resp-tab-content additional_info_grid" aria-labelledby="tab_item-1">
                        <h4>Reviews</h4>
                        <div class="additional_info_sub_grids">
                            <div class="col-xs-2 additional_info_sub_grid_left">
                                <img src="images/t1.png" alt=" " class="img-responsive" />
                            </div>
                            <div class="col-xs-10 additional_info_sub_grid_right">
                                <div class="additional_info_sub_grid_rightl">
                                    <a href="single.html">Laura</a>
                                    <h5>Oct 06, 2016.</h5>
                                    <p>Quis autem vel eum iure reprehenderit qui in ea voluptate
                                        velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat
                                        quo voluptas nulla pariatur.</p>
                                </div>
                                <div class="additional_info_sub_grid_rightr">
                                    <div class="rating">
                                        <div class="rating-left">
                                            <img src="images/star-.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="rating-left">
                                            <img src="images/star-.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="rating-left">
                                            <img src="images/star-.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="rating-left">
                                            <img src="images/star.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="rating-left">
                                            <img src="images/star.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="additional_info_sub_grids">
                            <div class="col-xs-2 additional_info_sub_grid_left">
                                <img src="images/t2.png" alt=" " class="img-responsive" />
                            </div>
                            <div class="col-xs-10 additional_info_sub_grid_right">
                                <div class="additional_info_sub_grid_rightl">
                                    <a href="single.html">Michael</a>
                                    <h5>Oct 04, 2016.</h5>
                                    <p>Quis autem vel eum iure reprehenderit qui in ea voluptate
                                        velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat
                                        quo voluptas nulla pariatur.</p>
                                </div>
                                <div class="additional_info_sub_grid_rightr">
                                    <div class="rating">
                                        <div class="rating-left">
                                            <img src="images/star-.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="rating-left">
                                            <img src="images/star-.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="rating-left">
                                            <img src="images/star.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="rating-left">
                                            <img src="images/star.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="rating-left">
                                            <img src="images/star.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="review_grids">
                            <h5>Add A Review</h5>
                            <form action="#" method="post">
                                <textarea name="Review" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Add Your Review';}" required="">Add Your Review</textarea>
                                <input type="submit" value="Submit" >
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script src="{{asset('/electronic_store')}}/js/easyResponsiveTabs.js" type="text/javascript"></script>
            <script type="text/javascript">
                $(document).ready(function () {
                    $('#horizontalTab1').easyResponsiveTabs({
                        type: 'default', //Types: default, vertical, accordion
                        width: 'auto', //auto or any width like 600px
                        fit: true   // 100% fit in a container
                    });
                });
            </script>
        </div>
    </div>

    <!-- flexslider -->
    <script defer src="{{asset('/electronic_store')}}/js/jquery.flexslider.js"></script>
    <link rel="stylesheet" href="{{asset('/electronic_store')}}/css/flexslider.css" type="text/css" media="screen" />
    <script>
        // Can also be used with $(document).ready()
        $(window).load(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });
        });
    </script>
    <!-- flexslider -->
    <!-- zooming-effect -->
    <script src="{{asset('/electronic_store')}}/js/imagezoom.js"></script>
    <!-- //zooming-effect -->
@endsection