 <div id="cop-<?php echo $coupon_id;?>" class="row"><input  name="ucop_id[]" value="<?php echo $coupon_id;?>" type="hidden"  />
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><label class="control-label pull-left">Coupon Title</label><input  class="form-control m-bot5" type="text" name="ucouponname[]" value="<?php echo $couponname;?>" placeholder="Coupon Title*" required></div>    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><label class="control-label pull-left">Coupon Code</label><input  class="form-control m-bot5" type="text" name="ucoupon_code[]" id="coupon_code" value="<?php echo $coupon_code;?>" placeholder="Coupon Code" ></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><label class="control-label pull-left">Tracking link</label><textarea rows="2" class="form-control m-bot5" id="utracking_link" name="utracking_link[]" placeholder="Tracking Link*" required><?php echo $ctracking_link;?></textarea></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><label class="control-label pull-left">Coupon Description</label><textarea rows="2" class="form-control m-bot5" id="coupon_desc" name="ucoupon_desc[]" placeholder="Coupon Description*"><?php echo $coupon_desc;?></textarea></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><label class="control-label pull-lef">Expiry Date Range</label><div class="input-group input-large" data-date="" data-date-format="">

<?php $start_ar = explode("-",$start_date);
						   $expsdate =  $start_ar[2]."/".$start_ar[1]."/".$start_ar[0]; ?>
<input type="text" class="form-control exp-sdate" id="uexp-sdate<?=$c?>" name="uexp-sdate[]" value="<?php echo $expsdate;?>" ><span class="input-group-addon">To</span>

<?php $exp_ar = explode("-",$exp_date);
						   $expedat =  $exp_ar[2]."/".$exp_ar[1]."/".$exp_ar[0]; ?>
<input type="text" class="form-control exp-edate" id="uexp-edate<?=$c?>" name="uexp-edate[]"  value="<?php echo $expedat;?>" ></div><span class="error" id="expdate-error<?=$c?>"></span></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><div class=" col-lg-3">

 <label class="control-label pull-left">Discount Type</label>
  <select id="udiscount_type" name="udiscount_type[]" class="form-control m-bot5" > 
  <option <? if($discount_type == '1'){echo "selected";} ?> value="1">%</option>
  <option <? if($discount_type == '2'){echo "selected";} ?> value="2">$</option>
  <option <? if($discount_type == '3'){echo "selected";} ?> value="3">&euro;</option>
  <option <? if($discount_type == '4'){echo "selected";} ?> value="4">&pound;</option>
  </select>



</div><div class=" col-lg-3">
<label class="control-label pull-left">Discount Value</label><input  class="form-control" type="text" name="udiscount_value[<?=$c?>]" id="udiscount_value" value="<?php echo $discount_value;?>" >

</div><div class=" col-lg-5">
<label class="control-label pull-left">Coupon Type</label>
    <select id="ucoupon_type" name="ucoupon_type[]" class="form-control m-bot5" >
     <option  value="0">--Select Coupon Type--</option>
 <option <?php if($coupon_type == '4'){echo "selected";}?> value="4">FreeShipping</option>
 <option <?php if($coupon_type == '10'){echo "selected";}?> value="10">Deals</option>
 <option <?php if($coupon_type == '11'){echo "selected";}?> value="11">Clearance</option>
 <option <?php if($coupon_type == '14'){echo "selected";}?> value="14">Exclusive </option>
 <option <?php if($coupon_type == '15'){echo "selected";}?> value="15">Codes</option>
 </select></div></div><a id="<?php echo $coupon_id;?>" href="javascript:void(0)" class="remove_coupon btnDeleteAction txt_red">Remove</a><div class="form-group" style="height:15px; background-color:#A1BFDF;float:left;width:100%;"></div></div>