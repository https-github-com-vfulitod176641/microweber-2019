<?php only_admin_access(); ?>

<?php
if ($params['coupon_id'] !== 'false') {
	$addNew = false;
	$data = coupon_get_by_id($params['coupon_id']);
} else {
	$addNew = true;
	
	$data['id'] = '';
	$data['coupon_name'] = '';
	$data['coupon_code'] = '';
	$data['cupon_name'] = '';
	$data['discount_type'] = '';
	$data['discount_value'] = '';
	$data['total_amount'] = '';
	$data['uses_per_coupon'] = '';
	$data['uses_per_customer'] = '';
	$data['is_active'] = 1;
}
?>

<script>
// SET GLOBAL MULTILANGUAGE TEXTS
var TEXT_FIELD_MUST_BE_FLOAT_NUMBER = "<?php _e('The field must be float number.');?>";
var TEXT_FIELD_MUST_BE_NUMBER = "<?php _e('The field must be number.');?>";
var TEXT_SUCCESS_SAVE = "<?php _e('Coupon are saved success!');?>";
var TEXT_FIELD_CANNOT_BE_EMPTY = "<?php _e('This field cannot be empty.');?>";
var TEXT_FILL_ALL_FIELDS = "<?php _e('Please fill all fields correct.');?>";
</script>

<div class="js-validation-messages"></div>
<form class="js-edit-coupon-form" action="<?php print api_url('coupons_save_coupon');?>">
    <input type="hidden" name="id" value="<?php print $data['id'] ?>"/>


    <div class="mw-ui-field-holder">
        <label class="mw-ui-label">Coupon name</label>
        <input type="text" name="coupon_name" class="mw-ui-field js-coupon-name js-validation" value="<?php print $data['coupon_name'] ?>"/>
    	  <div class="js-field-message"></div>
    </div>

    <div class="mw-ui-field-holder">
        <label class="mw-ui-label">Code</label>
        <input type="text" name="coupon_code" class="mw-ui-field js-coupon-code js-validation" value="<?php print $data['coupon_code'] ?>"/>
        <div class="js-field-message"></div>
        <br />
        <br />
    	<button type="button" class="mw-ui-btn js-generate-new-promo-code">Generate New Promo Code</button>
    </div>
    
     	<div class="mw-ui-field-holder">
        <label class="mw-ui-label">Discount Type</label>
        <select name="discount_type" class="mw-ui-field js-discount-type">
        	<option value="percentage">Percentage</option>
        	<option value="fixed_amount">Fixed Amount</option>
         </select>
    </div>
    
        <div class="mw-ui-field-holder">
        <label class="mw-ui-label">Discount</label>
        <input type="text" name="discount_value" class="mw-ui-field js-validation js-validation-float-number" value="<?php print $data['discount_value'] ?>"/>
    		<div class="js-field-message"></div>
    </div>
    
    <div class="mw-ui-field-holder">
        <label class="mw-ui-label">Total Amount</label>
        <input type="text" name="total_amount" class="mw-ui-field js-validation js-validation-float-number" value="<?php print $data['total_amount'] ?>"/>
    	<div class="js-field-message"></div>
    </div>

    <div class="mw-ui-field-holder">
        <label class="mw-ui-label">Uses Per Coupon</label>
        <input type="text" name="uses_per_coupon" class="mw-ui-field js-validation js-validation-number" value="<?php print $data['uses_per_coupon'] ?>"/>
    	  <div class="js-field-message"></div>
    </div>
    
 	<div class="mw-ui-field-holder">
        <label class="mw-ui-label">Uses Per Customer</label>
        <input type="text" name="uses_per_customer" class="mw-ui-field js-validation js-validation-number" value="<?php print $data['uses_per_customer'] ?>"/>
    	  <div class="js-field-message"></div>
    </div>
    
     <div class="mw-ui-field-holder">
        <label class="mw-ui-label">
        <input type="checkbox" name="is_active" value="1" <?php if($data['is_active'] == 1): ?> checked="checked"<?php endif; ?> /> Active
        </label>
    </div>
    
    <hr>
    
    <div class="mw-ui-btn-nav pull-right">
        <span class="mw-ui-btn " onclick="editModal.modal.remove()">Cancel</span>
        <button type="button" class="mw-ui-btn mw-ui-btn-invert js-save-coupon">Save</button>
    </div>
    <div class="mw-ui-btn-nav pull-left">
        <?php if (!$addNew) { ?>
            <a class="mw-ui-btn" href="javascript:deleteCoupon('<?php print $data['id'] ?>')">Delete</a>
        <?php } ?>
    </div>
</form>

<script src="<?php print $config['url_to_module'];?>js/edit-coupon.js" />

<script type='text/javascript'>

$(document).ready(function () {
	
	<?php if($addNew): ?>
	$('.js-coupon-code').val(uniqueId());
	<?php endif; ?>

	<?php if (isset($data['discount_type'])): ?>
	$(".js-discount-type").val("<?php echo $data['discount_type']; ?>").change();
	<?php endif; ?>
});

</script>