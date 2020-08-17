@extends('frontend.layouts.main')
@section('title','Trang Chủ')
@section('content')
<!-- banner -->
<div class="banner">
    <div class="container">
        <h3>Electronic Store, <span>Special Offers</span></h3>
    </div>
</div>
<!-- end banner -->
<!-- banner-bottom -->
<div class="banner-bottom" style="background: #f3f3f3;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 wthree_banner_bottom_right">
                <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs menu_top_pro" role="tablist">
                        <?php $i=0;
                        foreach($top_cat as $li){
                        if($i==0){ ?>
                        <li role="presentation" class="active"><a href="#{{$li->category_id}}" id="" role="tab" data-toggle="tab" aria-controls="">{{$li->category_name}}</a></li>
                        <?php
                        }else{ ?>
                        <li role="presentation" ><a href="#{{$li->category_id}}" id="" role="tab" data-toggle="tab" aria-controls="">{{$li->category_name}}</a></li>

                        <?php  }
                        $i++;
                        }
                        ?>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <?php $i1=0; $count_pro=0;
                        foreach($top_cat as $value){
                        if ($i1==0){?>
                        <div role="tabpanel" class="tab-pane fade active in" id="{{$value->category_id}}" aria-labelledby="">
                            <div class="agile_ecommerce_tabs col-md-12">
                                <?php $count_pro=1;
                                foreach($product as $key => $value2){
                                if($value->category_id==$key){
                                    foreach ($product[$key] as $item){
                                if ($count_pro<=8){  ?>
                                <div class="col-md-3 agile_ecommerce_tab_left single_product">
                                    <div class="hs-wrapper">
                                        <?php
                                        $data = json_decode($item->product_images);
                                        if(is_array($data)){
                                        foreach($data as $image){ ?>
                                        <img src="{{asset('storage/files/' .basename($image))}}" alt="" class="img-responsive" >
                                        <?php }
                                        } ?>
                                        <div class="w3_hs_bottom">
                                            <ul>
                                                <li>
                                                    <a href="#" data-toggle="modal" data-target="#myModal"><span>Chi tiết</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h5><a href="single.html">{{$item->product_title}}</a></h5>
                                    <div class="simpleCart_shelfItem">
                                        <?php $price= number_format($item->product_price_sell ,0,',','.'); ?>
                                        <p><i class="item_price"><?php echo $price.' VNĐ'; ?></i></p>
                                            <a href="#" data-url="{{ route('addToCart', ['id' => $item->product_id]) }}" class="btn btn-primary add_to_cart">Add to cart</a>
                                    </div>
                                </div>
                                <?php }
                                $count_pro++;
                                }
                                }
                                }?>
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                        <?php }else{ ?>
                        <div role="tabpanel" class="tab-pane fade" id="{{$value->category_id}}" aria-labelledby="">
                            <div class="agile_ecommerce_tabs">
                                <?php $count_pro=1;
                                foreach($product as $key => $value2){
                                if($value->category_id==$key){
                                    foreach ($product[$key] as $item){
                                if ($count_pro<=8){   ?>
                                <div class="col-md-3 agile_ecommerce_tab_left single_product">
                                    <div class="hs-wrapper">
                                        <?php
                                        $data = json_decode($item->product_images);
                                        if(is_array($data)){
                                        foreach($data as $image){ ?>
                                        <img src="{{asset('storage/files/' .basename($image))}}" alt="" class="img-responsive" >
                                        <?php }
                                        } ?>
                                        <div class="w3_hs_bottom">
                                            <ul>
                                                <li>
                                                    <a href="#" data-toggle="modal" data-target="#myModal"><span>Chi tiết</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h5><a href="single.html">{{$item->product_title}}</a></h5>
                                    <div class="simpleCart_shelfItem">
                                        <?php $price= number_format($item->product_price_sell ,0,',','.'); ?>
                                        <p><i class="item_price"><?php echo $price.' VNĐ'; ?></i></p>
                                            <a href="#" data-url="{{ route('addToCart', ['id' => $item->product_id]) }}" class="btn btn-primary add_to_cart">Add to cart</a>
                                    </div>
                                </div>
                                <?php }
                                $count_pro++;
                                }
                                }
                                } ?>
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                        <?php }
                        $i1++;
                        } ?>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- //banner-bottom -->
<!-- our services -->
<div class="special-deals">
    <div class="container">
        <h2>Dịch vụ</h2>
        <div class="w3agile_special_deals_grids">
            <div class="col-md-7 w3agile_special_deals_grid_left">
                <div class="w3agile_special_deals_grid_left_grid">
                    <img src="{{asset('/electronic_store')}}/images/21.jpg" alt=" " class="img-responsive" />
                    <div class="w3agile_special_deals_grid_left_grid_pos">
                        <h4>We Offer <span>Best Products</span></h4>
                    </div>
                </div>
                <div class="wmuSlider example1">
                    <div class="wmuSliderWrapper">
                        <article style="position: absolute; width: 100%; opacity: 0;">
                            <div class="banner-wrap">
                                <div class="w3agile_special_deals_grid_left_grid1">
                                    <img src="{{asset('/electronic_store')}}/images/t1.png" alt=" " class="img-responsive" />
                                    <p>Quis autem vel eum iure reprehenderit qui in ea voluptate
                                        velit esse quam nihil molestiae consequatur, vel illum qui dolorem
                                        eum fugiat quo voluptas nulla pariatur</p>
                                    <h4>Laura</h4>
                                </div>
                            </div>
                        </article>
                        <article style="position: absolute; width: 100%; opacity: 0;">
                            <div class="banner-wrap">
                                <div class="w3agile_special_deals_grid_left_grid1">
                                    <img src="{{asset('/electronic_store')}}/images/t2.png" alt=" " class="img-responsive" />
                                    <p>Quis autem vel eum iure reprehenderit qui in ea voluptate
                                        velit esse quam nihil molestiae consequatur, vel illum qui dolorem
                                        eum fugiat quo voluptas nulla pariatur</p>
                                    <h4>Michael</h4>
                                </div>
                            </div>
                        </article>
                        <article style="position: absolute; width: 100%; opacity: 0;">
                            <div class="banner-wrap">
                                <div class="w3agile_special_deals_grid_left_grid1">
                                    <img src="{{asset('/electronic_store')}}/images/t3.png" alt=" " class="img-responsive" />
                                    <p>Quis autem vel eum iure reprehenderit qui in ea voluptate
                                        velit esse quam nihil molestiae consequatur, vel illum qui dolorem
                                        eum fugiat quo voluptas nulla pariatur</p>
                                    <h4>Rosy</h4>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
            <div class="col-md-5 w3agile_special_deals_grid_right">
                <img src="{{asset('/electronic_store')}}/images/20.jpg" alt=" " class="img-responsive" />
                <div class="w3agile_special_deals_grid_right_pos">
                    <h4>Women's <span>Special</span></h4>
                    <h5>save up <span>to</span> 30%</h5>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- //our services -->
<!-- new-products -->
<div class="new-products">
    <div class="container">
        <h3>Sản Phẩm Mới</h3>
        <div class="agileinfo_new_products_grids">
            <?php
            foreach($lastest_product as $product){  ?>
                <div class="col-md-3 agileinfo_new_products_grid">
                    <div class="agile_ecommerce_tab_left agileinfo_new_products_grid1">
                        <div class="hs-wrapper hs-wrapper1">
                            <?php
                            $data = json_decode($product->product_images);
                            if(is_array($data)){
                            foreach($data as $image){ ?>
                            <img src="{{asset('storage/files/' .basename($image))}}" alt="" class="img-responsive" >
                            <?php }
                            } ?>
                            <div class="w3_hs_bottom w3_hs_bottom_sub">
                                <ul>
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#myModal2"><span>Chi tiết</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <h5><a href="">{{$product->product_title}}</a></h5>
                        <div class="simpleCart_shelfItem">
                            <?php $price= number_format($product->product_price_sell ,0,',','.'); ?>
                            <p><i class="item_price"><?php echo $price.' VNĐ'; ?></i></p>
                            <a href="#" data-url="{{ route('addToCart', ['id' => $product->product_id]) }}" class="btn btn-primary add_to_cart">Add to cart</a>
                        </div>
                    </div>
                </div>
      <?php }
            ?>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- //new-products -->
<!-- top-brands -->
<div class="top-brands">
    <div class="container">
        <h3>Hãng Sản Xuất</h3>
        <div class="sliderfig">
            <ul id="flexiselDemo1">
                <?php
                foreach ($manufacturer as $manu){
                    if($manu->manufacturer_image){ ?>
                    <li>
                        <a href="{{route('cat.pro.all',['manu'=>$manu->manufacturer_id])}}">
                            <img src="{{asset('storage/files/'.basename($manu->manufacturer_image))}}" alt=" " class="img-responsive" />
                        </a>
                    </li>
         <?php      }
                }
                ?>
            </ul>
        </div>
    </div>
</div>
<!-- //top-brands -->

<script type="text/javascript">
    //slide js
    $(window).load(function() {
        $("#flexiselDemo1").flexisel({
            visibleItems: 4,
            animationSpeed: 1000,
            autoPlay: true,
            autoPlaySpeed: 3000,
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint:480,
                    visibleItems: 1
                },
                landscape: {
                    changePoint:640,
                    visibleItems:2
                },
                tablet: {
                    changePoint:768,
                    visibleItems: 3
                }
            }
        });
    });
    //js cho video
    $('.popup-with-zoom-anim').magnificPopup({
        type: 'inline',
        fixedContentPos: false,
        fixedBgPos: true,
        overflowY: 'auto',
        closeBtnInside: true,
        preloader: false,
        midClick: true,
        removalDelay: 300,
        mainClass: 'my-mfp-zoom-in'
    });
    //
    $('.example1').wmuSlider();
    function addToCart(event) {
        event.preventDefault();
        let urlCart = $(this).data('url');


        $.ajax({
            type: 'GET',
            url: urlCart,
            dataType: 'json',
            success: function (data) {
                if (data.code === 200) {
                    alert('Thêm sản phẩm thành công !');
                }
            },

            error: function () {

            }
            
        });
    }
    
    $(function () {
        $('.add_to_cart').on('click', addToCart);
    })
</script>

@endsection
