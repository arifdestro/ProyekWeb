<!-- <footer class="footer-area">
    <div class="container">
        <div class="">
            <div class="site-logo text-center py-4">
                <a href="#"><img src="./img/logo1.png" width="150px" alt="logo"></a>
            </div>
            <div class="social text-center">
                <h5 class="text-uppercase">Follow Us</h5>
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
            </div>
            <div class="copyrights text-center">
                <p class="para">
                    &copy; Copyright <strong>SIMBA2019</strong>. All Rights Reserved
                </p>
            </div>
        </div>
    </div>
</footer> -->

<footer class="sticky-footer" id="footer">
    <div class="footer-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-6 footer-info">
                    <div class="site-logo text-left py-4">
                        <a href="#"><img src="./img/logo1.png" width="100px" alt="logo"></a>
                    </div>
                    <p>Merupakan aplikasi berbasis web yang dapat membantu dalam manajemen event seperti lomba dan lain-lain.</p>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Link Terkait</h4>
                    <ul>
                        <li><a href="#intro">Home</a></li>
                        <li><a href="#about">About us</a></li>
                        <li><a href="#services">Services</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h4>Hubungi Kami</h4>
                    <p>
                        Jl. Adityawarman,Sumbersari,
                        Jember,Jawa Timur 68124,<br>
                        <strong>Phone:</strong> 0838-5210-9582<br>
                        <strong>Email:</strong> destro.comm1299@qmail.id<br>
                    </p>

                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <!-- <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a> -->
                    </div>

                </div>

                <div class="col-lg-3 col-md-6 footer-newsletter">
                    <img src="./img/banner/img.png" alt="piala" width="100%">
                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong>SIMBA <script>
                    var CurrentYear = new Date().getFullYear()
                    document.write(CurrentYear)
                </script></strong>. All Rights Reserved
        </div>
    </div>
</footer><!-- #footer -->

<div class="login-bg">
    <div class="row">
        <div class="col-5">
            <div class="modal fade" id="login_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-ungu">
                            <h5 class="modal-title text-light font-m-bold ml-3" id="LoginLabel">Login User</h5>
                            <button type="button" class="close btn bg-biru-tua" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body row justify-content-center">
                            <form class="font-m-light col-11 mt-3" action="cek_login_user.php" method="post">
                                <div class="form-group">
                                    <label for="username-user" class="font-m-med">Username</label>
                                    <input type="text" class="form-control" id="username-user" name="username-user" aria-describedby="usernameHelp" placeholder="Enter username" required>

                                </div>
                                <div class="form-group">
                                    <label for="password-user" class="font-m-med">Password</label>
                                    <input type="password" class="form-control tampil-sandi" id="password-user" name="password-user" placeholder="Password" required>
                                    <small id="passwordHelp" class="form-text float-right"><a href="forgot_password.php">Lupa password?</a></small>
                                    <div class="form-group form-check float-left">
                                        <input type="checkbox" class="form-check-input" id="tampil-sandi">
                                        <label class="form-check-label" for="tampil-sandi"><small>Tampilkan Sandi</small></label>
                                    </div>
                                </div>

                        </div>
                        <div class="modal-footer text-center">
                            <input type="submit" class="btn btn-primary" name="login_user" value="login">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--  Jquery js file  -->
<script src="./js/jquery.3.4.1.js"></script>

<!--  Bootstrap js file  -->
<script src="./js/bootstrap.min.js"></script>

<!--  isotope js library  -->
<script src="./vendor/isotope/isotope.min.js"></script>

<!--  Magnific popup script file  -->
<script src="./vendor/Magnific-Popup/dist/jquery.magnific-popup.min.js"></script>

<!--  Owl-carousel js file  -->
<script src="./vendor/owl-carousel/js/owl.carousel.min.js"></script>

<!--  custom js file  -->
<script src="./js/main.js"></script>

<!-- timeline -->
<script src="./js/timeline.min.js"></script>

<!-- Timeline -->
<script type="text/javascript">
    jssor_1_slider_init();
    jssor_2_slider_init();
</script>
<script type="text/javascript" src="js/timeline.min.js"></script>
<script>
    timeline(document.querySelectorAll('.timeline'), {
        forceVerticalMode: 700,
        mode: 'horizontal',
        verticalStartPosition: 'left',
        visibleItems: 4
    });
</script>
<script>
    document.getElementById('galeriku').ondragstart = function() {
        return false;
    };
</script>

<script type="text/javascript">
    (function() {
        var options = {
            whatsapp: "+6283852109582", // WhatsApp number
            call_to_action: "Message us", // Call to action
            position: "right", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol,
            host = "getbutton.io",
            url = proto + "//static." + host;
        var s = document.createElement('script');
        s.type = 'text/javascript';
        s.async = true;
        s.src = url + '/widget-send-button/js/init.js';
        s.onload = function() {
            WhWidgetSendButton.init(host, proto, options);
        };
        var x = document.getElementsByTagName('script')[0];
        x.parentNode.insertBefore(s, x);
    })();
</script>
</div>

</body>

</html>