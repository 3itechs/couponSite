<?php if($coupon_code != ''){ $filter = 'code';}else{ $filter = 'deal';}?>

<div id="<?=$coupon_id?>" class="sin-coupon row no-gutters  <?php echo $filter;?>">

    <div class="col-sm-3 col-lg-2">

        <div class="coupon-img">

           <!--<span class="new">new</span> -->

          <img onclick="javascripts: showCodes('<?=$coupon_id?>'), copyMyCodes('<?=$coupon_id?>'), window.open('<?=DOMAIN?>/out.html?cid=<?=$coupon_id?>'); return false;" id="copname<?=$coupon_id?>" src="<?php echo DOMAIN;?>/assets/images/stores/<?php echo $store_logo;?>" alt="<?php echo $storename;?>">

        </div>

    </div>

    <div class="col-sm-9 col-lg-6 col-xl-7">

        <div id="<?=$coupon_id?>" class="coupon-content">

            <h2 onclick="javascripts: showCodes('<?=$coupon_id?>'), copyMyCodes('<?=$coupon_id?>'), window.open('<?=DOMAIN?>/out.html?cid=<?=$coupon_id?>'); return false;" id="copname<?=$coupon_id?>"><?php echo $couponname;?></h2>

            <p id="copdesc<?=$coupon_id?>"><?php echo $desc;?></p>

            <p><strong>Expires <?php echo $exp_date;?></strong></p>

        </div>

    </div>

    <div class="col-sm-12 col-lg-4 col-xl-3">

        <div  id="<?=$coupon_id?>" class="coupon-code " >

                <?php if($coupon_code != ''){?>

                         <div class="coupon-hcode" onclick="javascripts: showCodes('<?=$coupon_id?>'), copyMyCodes('<?=$coupon_id?>'), window.open('<?=DOMAIN?>/out.html?cid=<?=$coupon_id?>'); return false;" id="copname<?=$coupon_id?>">

                            <span class="getcode" id="getcode<?=$coupon_id?>">Get Code</span>

                            <span id="in<?=$coupon_id?>" class="hcode"><?php echo $coupon_code;?></span>

                            <span style="display:none;" id="successMsg<?=$coupon_id?>" class='copy-code'> Code Coppied</span>

                         </div>

                 <?php }else{?>

                          <div class="coupon-no-code" onclick="javascripts: window.open('<?=DOMAIN?>/out.html?cid=<?=$coupon_id?>'); return false;" id="copname<?=$coupon_id?>">

                             <span id="deal<?=$coupon_id?>" class="getDeal">Get Deal</span>

                          </div>

                 <?php }?>

          <p><?php echo $used_total;?> Used </p> 

         </div>

    </div>

</div>