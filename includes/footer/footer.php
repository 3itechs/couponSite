
<footer class="footer-modern" style="background: linear-gradient(90deg, #1e3c72 0%, #2a5298 100%); color: #fff; position: relative; overflow: hidden;">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-md-4 mb-4 mb-md-0">
                <a href="#" class="footer-site-logo d-flex align-items-center mb-3" style="font-size: 2rem; font-weight: bold; color: #ffd700; letter-spacing: 1px; text-decoration:none;">
                    <img src="<?php echo DOMAINVAR;?>/assets/images/logo.png" alt="Logo" style="height:40px; margin-right:12px; border-radius:8px; box-shadow:0 2px 8px rgba(30,60,114,0.15);">
                    PromosPlusDeals
                </a>
                <p style="color: #e0e0e0;">Get the latest coupon codes and deals for your favorite stores at promosplusdeals.com</p>
            </div>
            <div class="col-md-2 mb-4 mb-md-0">
                <h5 class="footer-title">Discover</h5>
                <ul class="list-unstyled nav-links">
                    <li><a href="https://www.promosplusdeals.com">Home</a></li>
                    <li><a href="https://www.promosplusdeals.com/about-us.html">About Us</a></li>
                    <li><a href="https://www.promosplusdeals.com/categories.html">Categories</a></li>
                </ul>
            </div>
            <div class="col-md-2 mb-4 mb-md-0">
                <h5 class="footer-title">Legal Info</h5>
                <ul class="list-unstyled nav-links">
                    <li><a href="https://www.promosplusdeals.com/privacy-policy.html">Privacy Policy</a></li>
                    <li><a href="https://www.promosplusdeals.com/terms.html">Terms &amp; Conditions</a></li>
                    <li><a href="https://www.promosplusdeals.com/stores.html">Partners</a></li>
                </ul>
            </div>
            <div class="col-md-4 text-md-right text-center">
                <h5 class="footer-title">Follow Us</h5>
                <div class="footer-social">
                    <a href="#" class="social-icon"><i class="fa fa-instagram"></i></a>
                    <a href="#" class="social-icon"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="social-icon"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="social-icon"><i class="fa fa-pinterest"></i></a>
                    <a href="#" class="social-icon"><i class="fa fa-dribbble"></i></a>
                </div>
                <form class="footer-newsletter mt-4" action="#" method="post" autocomplete="off">
                    <div class="input-group">
                        <input type="email" class="form-control" placeholder="Subscribe for updates" style="border-radius: 20px 0 0 20px; border:none;">
                        <div class="input-group-append">
                            <button class="btn btn-warning" type="submit" style="border-radius: 0 20px 20px 0;">Subscribe</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <hr style="border-color:rgba(255,255,255,0.08); margin:2.5rem 0 1.5rem 0;">
        <div class="row">
            <div class="col-12 text-center">
                <p class="mb-0" style="color: #ffd700;"><small>&copy; PromosPlusDeals <?php echo date('Y'); ?>. All Rights Reserved.</small></p>
            </div>
        </div>
    </div>
</footer>
<style>
.footer-modern {
    font-family: 'Segoe UI', 'Arial', sans-serif;
    box-shadow: 0 -2px 16px 0 rgba(30,60,114,0.10);
}
.footer-modern .footer-title {
    color: #ffd700;
    font-size: 1.1rem;
    margin-bottom: 1rem;
    letter-spacing: 0.5px;
    font-weight: 600;
}
.footer-modern .nav-links li {
    margin-bottom: 0.5rem;
}
.footer-modern .nav-links a {
    color: #fff;
    text-decoration: none;
    transition: color 0.2s, background 0.2s;
    font-size: 1rem;
    border-radius: 4px;
    padding: 2px 6px;
    display: inline-block;
}
.footer-modern .nav-links a:hover {
    color: #ffd700;
    background: rgba(255,255,255,0.08);
}
.footer-modern .footer-site-logo img {
    vertical-align: middle;
    transition: transform 0.2s;
}
.footer-modern .footer-site-logo:hover img {
    transform: scale(1.08) rotate(-2deg);
}
.footer-modern .footer-social {
    margin-top: 0.5rem;
}
.footer-modern .social-icon {
    display: inline-block;
    color: #fff;
    font-size: 1.3rem;
    background: rgba(255,255,255,0.08);
    border-radius: 50%;
    width: 38px;
    height: 38px;
    text-align: center;
    line-height: 38px;
    margin-right: 8px;
    transition: background 0.2s, color 0.2s, transform 0.2s;
}
.footer-modern .social-icon:hover {
    background: #ffd700;
    color: #1e3c72;
    transform: scale(1.1) rotate(-8deg);
    text-decoration: none;
}
.footer-modern .footer-newsletter .form-control {
    background: rgba(255,255,255,0.08);
    color: #fff;
    border: none;
    font-size: 1rem;
    padding-left: 16px;
}
.footer-modern .footer-newsletter .form-control:focus {
    background: rgba(255,255,255,0.15);
    color: #fff;
    box-shadow: none;
}
.footer-modern .footer-newsletter .btn-warning {
    background: #ffd700;
    color: #1e3c72;
    font-weight: 600;
    border: none;
    transition: background 0.2s, color 0.2s;
}
.footer-modern .footer-newsletter .btn-warning:hover {
    background: #fff;
    color: #2a5298;
}
.footer-modern p, .footer-modern small {
    color: #e0e0e0;
}
@media (max-width: 991.98px) {
    .footer-modern .footer-site-logo {
        font-size: 1.3rem;
    }
    .footer-modern .social-icon {
        font-size: 1.1rem;
        width: 32px;
        height: 32px;
        line-height: 32px;
    }
    .footer-modern .text-md-right {
        text-align: left !important;
    }
}
</style>
<!-- FontAwesome for icons (if not already included) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
  </body>
</html>