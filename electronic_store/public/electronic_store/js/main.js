
//$('#myModal88').modal('show');

//start-smooth-scrolling
    $(".scroll").click(function(event){
        event.preventDefault();
        $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
    });
