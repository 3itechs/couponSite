<?php
<nav class="navbar navbar-expand-lg navbar-dark bg-gradient-primary shadow-sm py-3" id="ftco-navbar" style="background: linear-gradient(90deg, #1e3c72 0%, #2a5298 100%);">
    <div class="container">
        <a class="navbar-brand font-weight-bold text-uppercase" href="<?php echo DOMAINVAR;?>">
            <img src="<?php echo DOMAINVAR;?>/assets/images/logo.png" alt="Logo" style="height:40px; margin-right:10px;">
            promosplusdeals
        </a>
        <form action="#" class="searchform order-sm-start order-lg-last d-flex align-items-center ml-auto mr-3" style="max-width: 300px;">
            <div class="input-group">
                <input type="text" class="typeahead form-control rounded-left pl-3" placeholder="Search for coupons, stores..." style="border-right:0;">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-warning rounded-right" style="border-left:0;">
                        <span class="fa fa-search"></span>
                    </button>
                </div>
            </div>
        </form>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto align-items-lg-center">
                <li class="nav-item active px-2">
                    <a href="<?php echo DOMAINVAR;?>" class="nav-link font-weight-bold">
                        <i class="fa fa-home mr-1"></i>Home
                    </a>
                </li>
                <li class="nav-item px-2">
                    <a href="<?php echo DOMAINVAR;?>/categories.html" class="nav-link font-weight-bold">
                        <i class="fa fa-th-large mr-1"></i>Categories
                    </a>
                </li>
                <li class="nav-item px-2">
                    <a href="<?php echo DOMAINVAR;?>/stores.html" class="nav-link font-weight-bold">
                        <i class="fa fa-shopping-bag mr-1"></i>Stores
                    </a>
                </li>
                <li class="nav-item px-2 d-none d-lg-block">
                    <a href="#latest-coupons" class="btn btn-warning font-weight-bold ml-3 px-4 py-2 rounded-pill shadow-sm">Latest Coupons</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<style>
    .navbar-brand img {
        vertical-align: middle;
    }
    .navbar-nav .nav-link {
        color: #fff !important;
        transition: color 0.2s;
    }
    .navbar-nav .nav-link:hover, .navbar-nav .nav-item.active .nav-link {
        color: #ffd700 !important;
        background: rgba(255,255,255,0.08);
        border-radius: 5px;
    }
    .navbar .btn-warning {
        background: #ffd700;
        color: #1e3c72;
        border: none;
        transition: background 0.2s, color 0.2s;
    }
    .navbar .btn-warning:hover {
        background: #fff;
        color: #2a5298;
    }
    .searchform .form-control:focus {
        box-shadow: 0 0 0 0.2rem rgba(30,60,114,.15);
        border-color: #ffd700;
    }
</style>


<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>



