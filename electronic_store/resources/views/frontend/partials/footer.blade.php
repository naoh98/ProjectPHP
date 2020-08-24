<!-- footer -->
<div class="footer">
    <div class="container">
        <div class="w3_footer_grids">
            <div class="col-md-3 w3_footer_grid">
                <h3>Contact</h3>
                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>
                <ul class="address">
                    <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>1234k Avenue, 4th block, <span>New York City.</span></li>
                    <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">info@example.com</a></li>
                    <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 567</li>
                </ul>
            </div>
            <div class="col-md-3 w3_footer_grid">
                <h3>Information</h3>
                <ul class="info">
                    <li><a href="">About Us</a></li>
                    <li><a href="">Contact Us</a></li>
                    <li><a href="">Short Codes</a></li>
                    <li><a href="">FAQ's</a></li>
                    <li><a href="">Special Products</a></li>
                </ul>
            </div>
            <div class="col-md-3 w3_footer_grid">
                <h3>Category</h3>
                <ul class="info">
                    <li><a href="">Mobiles</a></li>
                    <li><a href="">Laptops</a></li>
                    <li><a href="">Purifiers</a></li>
                    <li><a href="">Wearables</a></li>
                    <li><a href="">Kitchen</a></li>
                </ul>
            </div>
            <div class="col-md-3 w3_footer_grid">
                <h3>Profile</h3>
                <ul class="info">
                    <li><a href="">Home</a></li>
                    <li><a href="">Today's Deals</a></li>
                </ul>
                <h4>Follow Us</h4>
                <div class="agileits_social_button">
                    <ul>
                        <li><a href="#" class="facebook"> </a></li>
                        <li><a href="#" class="twitter"> </a></li>
                        <li><a href="#" class="google"> </a></li>
                        <li><a href="#" class="pinterest"> </a></li>
                    </ul>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="footer-copy">
        <div class="footer-copy1">
            <div class="footer-copy-pos">
                <a href="#home1" class="scroll"><img src="{{asset('/electronic_store')}}/images/arrow.png" alt=" " class="img-responsive" /></a>
            </div>
        </div>
    </div>
</div>
<!-- end footer -->
<script type="text/javascript">




    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true   // 100% fit in a container
        });


    });

    //Dropdown user
    function dropdownUser() {
        $('#myDropdown').toggleClass('show');
    }
    $('.w3l_login__btn').on('click', (e) => {
        e.preventDefault();
        dropdownUser();
    });


    // $(window).click(function (e) {
    //
    //     if (!e.target.matches('#myDropdown')) {
    //         let isopened = $('#myDropdown');
    //         let i;
    //         for (i = 0; i < isopened.length; i++) {
    //             let openDropdown = isopened[i];
    //             if (openDropdown.hasClass('show')){
    //                 openDropdown.removeClass('show');
    //             }
    //         }
    //     }
    // });




    // VALIDATE FORM SIGN UP
    const email = $('#myEmail');
    const password = $('#myPassWord');
    const name = $('#myName');
    const rePassword = $('#myRePassword');
    let messages = [];
    $( "#form_register" ).submit(function( event ) {

        if (email.val() === '' || email.val() == null) {
            $('#error-email').addClass('visible-input').text('Email is required');
            event.preventDefault();

        }
        if (name.val() === '' || name.val() == null) {
            $('#error-name').addClass('visible-input').text('Name is required');
            event.preventDefault();

        }

        if (password.val().length < 8) {
            $('#error-password').addClass('visible-input').text('Password must be greater than 8 characters');
            event.preventDefault();

        }
        if (password.val() !== rePassword.val()) {
            $('#error-repassword').addClass('visible-input').text('Password must match Confirm password');
            event.preventDefault();
        }
    });
    // JS FOR USER PROFILE

    $('#checkpass').on('click', function () {
        if ($(this).is(":checked")) {
            $('.check_password').addClass('show');
        }
        else {
            $('.check_password').removeClass('show');
        }
    });

    const profileEmail = $('#profile_email');
    const profilePassword = $('#profile_password');
    const confirmPassword = $('#confirm_password');
    const errorConfirmPassword =  $('#error-profile-repassword');

    $('#form_profile').submit(function (event) {

        if ( profileEmail.val() === '' && profileEmail.val() == null) {
            $('#error-profile-email').addClass('visible-input').text('Email is required !');
            event.preventDefault();
        }

    });

    $('#profile_password, #confirm_password').on('keyup', function () {
        if (profilePassword.val() !== confirmPassword.val()) {
           errorConfirmPassword.removeClass('invisible-input');
           errorConfirmPassword.addClass('visible-input').text('Password do not match !');

        } else {
            errorConfirmPassword.removeClass('visible-input').text('Password do not match !');
            errorConfirmPassword.addClass('invisible-input');
        }

    });








</script>
