 <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <li>
                      <a href="index.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  
                  <li class="sub-menu">
                      <a href="users.php">
                          <i class="fa fa-users"></i>
                          <span>Users</span>
                      </a>
                  </li>
                  
                 <?php /*?> <li class="sub-menu">
                      <a href="javascript:;" <?php if( $fname == 'users' || $fname == 'users' ){ echo "class='active'";}?> >
                          <i class="fa fa-user"></i>
                          <span>Users</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="users.php">All Users</a></li>
                          <li><a  href="activities.php">Ativities</a></li>
                      </ul>
                  </li><?php */?>
                  
                   <li class="sub-menu">
                      <a href="stores.php" <?php if( $fname == 'stores' || $fname == 'addstore' ){ echo "class='active'";}?> >
                          <i class="fa fa-shopping-cart"></i>
                          <span>Stores</span>
                      </a>                      
                  </li>
                  
                   <li class="sub-menu">
                      <a href="coupons.php" <?php if( $fname == 'coupons' || $fname == 'addcoupon' ){ echo "class='active'";}?> >
                          <i class="fa fa-tag"></i>
                          <span>Coupons</span>
                      </a>
                  </li>
                  
                   
                                    
                  <li class="sub-menu">
                      <a href="main-slider.php">
                          <i class="fa fa-users"></i>
                          <span>Slider</span>
                      </a>
                  </li>
                  
                                    
                   <li class="sub-menu">
                      <a href="networks.php" <?php // if( $fname == 'stores' || $fname == 'addstore' ){ echo "class='active'";}?> >
                          <i class="fa fa-database"></i>
                          <span>Networks</span>
                      </a>
                  </li>
                  
                                     
                  <li class="sub-menu">
                      <a href="categories.php">
                          <i class="fa fa-users"></i>
                          <span>Categories</span>
                      </a>
                  </li> 
                  
                 <li class="sub-menu">
                      <a href="subscribers.php" <?php if( $fname == 'subscribers' || $fname == 'addsubscriber' ){ echo "class='active'";}?> >
                          <i class="fa fa-users"></i>
                          <span>Subscribers</span>
                      </a>
                  </li>                
                 
                  <li class="sub-menu">
                      <a href="static-pages.php" <?php if( $fname == 'pagesmeta' || $fname == 'addpagesmeta' ){ echo "class='active'";}?> >
                          <i class="fa fa-code"></i>
                          <span>Static Pages</span>
                      </a>
                  </li> 
                  
                                    
                  <!--multi level menu end-->

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>