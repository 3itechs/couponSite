<?php if($coupon_code != ''){ $filter = 'codes';}else{ $filter = 'deals';}?>

<div class="col-md-4 col-sm-6 col-xs-12">

    <div class="home-coupon row no-gutters filterDiv <?php echo $filter;?>">

    <div class="col-sm-12">

        <div class="coupon-img">

           <!-- <span class="new">new</span>-->

          <img onclick="javascripts: showCodes('<?=$coupon_id?>'), copyMyCodes('<?=$coupon_id?>'), window.open('<?=DOMAIN?>/out.html?cid=<?=$coupon_id?>'); return false;" id="copname<?=$coupon_id?>" src="<?php echo DOMAIN;?>/assets/images/stores/<?php echo $store_logo;?>" alt="<?php echo $sname;?>">

        </div>

    </div>

    <div class="col-sm-12">

        <div class="coupon-content">
            <script>
    console.log("coupon content");
</script>

            <h2 onclick="javascripts: showCodes('<?=$coupon_id?>'), copyMyCodes('<?=$coupon_id?>'), window.open('<?=DOMAIN?>/out.html?cid=<?=$coupon_id?>'); return false;" id="copname<?=$coupon_id?>"><?php echo substrwords($couponname, 60);?></h2>

          

        </div>

    </div>

    <div class="col-sm-12">

        <div class="coupon-code">

           <?php if($coupon_code != ''){?> 

            <div class="coupon-hcode" onclick="javascripts: showCodes('<?=$coupon_id?>'), copyMyCodes('<?=$coupon_id?>'), window.open('<?=DOMAIN?>/out.html?cid=<?=$coupon_id?>'); return false;" id="copname<?=$coupon_id?>">

                 <span class="getcode">Get Code</span>
                 <script>
    console.log("col-sm-12");
</script>

                 <span id="in<?=$coupon_id?>" class="hcode"><?php echo $coupon_code;?></span>

                 <span style="display:none;" id="successMsg<?=$coupon_id?>" class='copy-code'> Code Coppied</span>

            </div>

            <?php }else{?>

             <div class="coupon-no-code" onclick="javascripts: window.open('<?=DOMAIN?>/out.html?cid=<?=$coupon_id?>'); return false;" id="copname<?=$coupon_id?>">

                 <span id="deal<?=$coupon_id?>" class="getDeal">Get Deal</span>

            </div>

            <?php }?>

         </div>

    </div>

</div>

</div>