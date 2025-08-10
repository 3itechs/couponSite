<?php include "../flink/DB.php";
$pid = $_GET['pid'];
 $sqlPosts_2 = "SELECT post_id, postname, post_heading, post_desc, post_url, post_slug, post_number, primary_category, child_category, tag, post_img,  added_date, DATE_FORMAT(edited_date,'%M %d, %Y'), added_by, meta_title, meta_keywords, meta_desc FROM posts WHERE post_id = '$pid'";               
$rs_store_2 = $db->ExecuteQuery($sqlPosts_2);            
list($postid, $postname, $post_heading, $post_desc, $post_url,  $post_slug, $post_number, $primary_category, $child_category, $tag, $post_img, $added_date, $edited_date, $added_by, $meta_title, $meta_keywords, $meta_desc ) = $db->GetSelectedRows($rs_store_2);
 ?>
<!doctype html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <meta charset="UTF-8" />
    <title><?php if($meta_title !=''){ echo $meta_title;}else{echo "";}?></title>
    <meta name="description" content="<?php if($meta_keywords !=''){ echo $meta_keywords;}else{echo "";}?>">
    <meta name="keywords" content="<?php if($meta_desc !=''){ echo $meta_desc;}else{echo "";}?>">
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif|Oswald:400,500,600,700|Roboto+Condensed:400,700" rel="stylesheet">
   <link href="<?php echo DOMAINVAR?>/assets/css/combined.css" rel="stylesheet" />
    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="<?php echo DOMAINVAR?>/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo DOMAINVAR?>/assets/css/owl.theme.default.min.css">

    <link rel="shortcut icon" href="<?php echo DOMAINVAR?>/assets/images/favicon.png" />
   
</head>

<body>
    <div class="animsition main-wrapper">
        <?php include("../flink/header-new.php");?>
    <section class="tagBox">
      <div class="container">
        <div class="post_main">
          <div class="row">
            <div class="col-sm-12 text-center">
              <div class="vk-space x-small"></div>
              <h1 class="text-left"><?php echo $post_heading;?></h1>
              <div class="vk-space x-small"></div>
            </div>
          </div>
        <div class="row">
         
          <div class="col-md-12 col-sm-12 pull-left">
            <div class="tag_postBox">
              <img src="<?php echo MEDIA?>/posts/<?php echo $post_img?>" alt="" class="postImg">
              <div class="postAuther">
              	<div class="authorName">By 2<span><?php echo $added_by;?></span></div>
                <div class="date_time">Last updated: <span><?php echo $edited_date;?></span></div>
              </div>
              <div class="post_inner"><p><?php echo html_entity_decode(str_replace("<div","<p",str_replace("</div>","</p>",$post_desc)));?></p></div>
            </div>
          </div>
        </div>
      
        </div>
      </div>
    </section>


    <footer class="vk-footer vk-parallax vk-background-image-2 vk-background-black-1">
        <div class="container">
            <div class="row">
                <div class="col-md-4 footer-item about">
                    <p class=""><img src="https://www.wadav.com/assets/images/small-logo.png" class="img-responsive" alt="" style="height:16px;"></p>
                    <p class="vk-text"> &copy; 2018 WADAV llc. <br>All Rights Reserved
                        <p>
                            <a href="https://www.dmca.com/Protection/Status.aspx?ID=eca5cc28-15d9-4eb7-9ff4-312c1a634ad6" title="DMCA.com Protection Status" class="dmca-badge"> <img src="https://images.dmca.com/Badges/dmca-badge-w150-5x1-05.png?ID=eca5cc28-15d9-4eb7-9ff4-312c1a634ad6" alt="DMCA.com Protection Status"></a>
                            <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js">
                            </script>
                        </p>

                </div>
                <!--./about-->

                <div class="col-md-4 footer-item quick-link">
                    <ul>
                        <li><a href="https://www.wadav.com/privacy-policy.html">Privacy Policy</a></li>
                        <li><a href="https://www.wadav.com/terms-of-use.html">Term of Use</a></li>
                    </ul>
                </div>
                <!--./quick-link-->

                <div class="col-md-4 footer-item quick-link">
                    <ul>
                        <li><a href="https://www.wadav.com/careers.html">Careers</a></li>
                        <li><a href="https://www.wadav.com/wadav-for-students.html">Wadav for Students</a></li>
                        <li>                        
                          <div class="follow-us">
                              <ul class="vk-list vk-social-link">
                                  <li><a target="_blank" href="https://www.facebook.com/Wadav-2011173892461183/"><i class="fa fa-facebook"></i></a></li>
                                  <li><a target="_blank" href="https://twitter.com/thewadav"><i class="fa fa-twitter"></i></a></li>
                                  <li><a target="_blank" href="https://www.pinterest.com/thewadav/"><i class="fa fa fa-pinterest"></i></a></li>
                                  <li><a target="_blank" href="https://www.youtube.com/channel/UCEYFL0FwHrJAbxY_QUvC_EA"><i class="fa fa-youtube-play"></i></a></li>
                                  <li><a target="_blank" href="https://plus.google.com/105846697618358812403"><i class="fa fa-google-plus"></i></a></li>
                              </ul>
                          </div>
                        </li>

                    </ul>
                </div>
                <!--./office-->
            </div>
            <!--./row-->

        </div>
        <!--./container-->
        <div class="footer-bot">
            <div class="container">
                <p class="vk-text"> All company logos used on this page are trademarks of their respective owners and are their property</p>
            </div>
        </div>
        <!--./footer-bot-->
    </footer>
    <!--./vk-footer-->
    </div>
    <!--./main-wrapper-->

    <!-- BEGIN: SCRIPT -->
    <script src="https://www.wadav.com/assets/js/combined.js"></script>
    <script src="https://www.wadav.com/assets/js/jquery.functions.js"></script>
    
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="slick/slick.min.js"></script>
  
  <link rel="stylesheet" type="text/css" href="slick/slick.css">
  <link rel="stylesheet" type="text/css" href="slick/slick-theme.css">
    
    <script type="text/javascript">
    $(document).on('ready', function() {
     
      $(".center").slick({
        dots: false,
        infinite: true,
        centerMode: true,
        slidesToShow: 5,
        slidesToScroll: 1
      });
      $(".variable").slick({
        dots: true,
        infinite: true,
        variableWidth: true
      });
      $(".lazy").slick({
        lazyLoad: 'ondemand', // ondemand progressive anticipated
        infinite: true
      });
    });
</script>
    
    
    <style type="text/css">
   

    .slider {
        width: 92%;
        margin-right: 100px ;
		margin-left: 53px ;
    }

    .slick-slide {
      margin:0;
    }

    .slick-slide img {
      width: 100%;
    }

    .slick-prev:before,
    .slick-next:before {
      color: black;
    }


    .slick-slide {
      transition: all ease-in-out .3s;
     /* opacity: .2;*/
    }

    .slick-active {
     /* opacity: .5;*/
    }

    .slick-current {
     /* opacity: 1;*/
    }
	
	.sidenav {
    height: 100%; /* 100% Full-height */
    width: 0; /* 0 width - change this with JavaScript */
    position: fixed; /* Stay in place */
    z-index: 1; /* Stay on top */
    top: 0; /* Stay at the top */
    left: 0;
    background-color: #111; /* Black*/
    overflow-x: hidden; /* Disable horizontal scroll */
    padding-top: 60px; /* Place content 60px from the top */
    transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
}

/* The navigation menu links */
.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

/* When you mouse over the navigation links, change their color */
.sidenav a:hover {
    color: #f1f1f1;
}

/* Position and style the close button (top right corner) */
.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

/* Style page content - use this if you want to push the page content to the right when you open the side navigation */
#main {
    transition: margin-left .5s;
    padding: 20px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
}
  </style>
</body>

</html>