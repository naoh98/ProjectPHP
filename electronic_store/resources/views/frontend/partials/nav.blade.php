<!-- navigation -->
<div class="navigation">
    <div class="container">
        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header nav_2">
                <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                <ul class="nav navbar-nav">
                    <li><a href="">Trang Chủ</a></li>
                    <!-- Mega Menu -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sản Phẩm<b class="caret"></b></a>
                            <div class="menu dropdown-menu">
                                <?php showcat($menu); ?>
                            </div>
                    </li>
                    <li><a href="">Giới Thiệu</a></li>
                    <li><a href="">Liên Hệ</a></li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- end navigation -->

<?php
function showcat(&$categories,$parent_id = 0){
$cat_child = [];
foreach ($categories as $key => $item){
    if($item->parent_id==$parent_id){
        $cat_child[] = $item;
        unset($categories[$key]);
    }
}
if ($cat_child){

echo '<ul>';
foreach ($cat_child as $key => $item){?>
<li>
    <a href=""> {{$item->category_name}}
        <?php showcat($categories,$item->category_id); ?>
    </a>
</li>
<?php }
echo '</ul>';

}
} ?>