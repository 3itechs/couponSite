
<nav class="navbar navbar-expand-lg navbar-dark shadow-sm" id="ftco-navbar" style="background: linear-gradient(90deg, #1e3c72 0%, #2a5298 100%);">
    <div class="container">
        <a class="navbar-brand font-weight-bold text-uppercase d-flex align-items-center" href="<?php echo DOMAINVAR;?>">
            
            promosplusdeals
        </a>
        <form action="#" class="searchform order-sm-start order-lg-last d-flex align-items-center ml-auto mr-3" style="max-width: 320px;">
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
        transition: transform 0.2s;
    }
    .navbar-brand:hover img {
        transform: scale(1.08) rotate(-2deg);
    }
    .navbar-nav .nav-link {
        color: #fff !important;
        transition: color 0.2s, background 0.2s;
        border-radius: 5px;
        font-size: 1.08rem;
        letter-spacing: 0.5px;
    }
    .navbar-nav .nav-link:hover, .navbar-nav .nav-item.active .nav-link {
        color: #ffd700 !important;
        background: rgba(255,255,255,0.08);
    }
    .navbar .btn-warning {
        background: #ffd700;
        color: #1e3c72;
        border: none;
        transition: background 0.2s, color 0.2s;
        font-weight: 600;
    }
    .navbar .btn-warning:hover {
        background: #fff;
        color: #2a5298;
    }
    .searchform .form-control:focus {
        box-shadow: 0 0 0 0.2rem rgba(30,60,114,.15);
        border-color: #2a5298;
    }
    @media (max-width: 991.98px) {
        .navbar-nav .nav-item {
            margin-bottom: 8px;
        }
        .searchform {
            margin: 10px 0;
        }
    }
</style>



