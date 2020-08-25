
//$('#myModal88').modal('show');

//start-smooth-scrolling
    $(".scroll").click(function(event){
        event.preventDefault();
        $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
    });
//
    $('.menucat ul li').hover(function () {
            // over
            $(this).find('>ul').show();
        }, function () {
            // out
            $(this).find('>ul').hide();
        }
    );
//
    var auto;
    $('.hs-wrapper').hover(function () {
        var count=0;
        var img = $(this).find('img');
        auto = setInterval(function () {
            for (var i=0;i<img.length;i++){
                $(img[i]).css('display','none');
            }
            count++;
            if(count>img.length){
                count=1;
            }
            $(img[count-1]).css('display','block');
        },700);
    }, function () {
        clearInterval(auto);
    });


    // ADD TO CART AJAX
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

