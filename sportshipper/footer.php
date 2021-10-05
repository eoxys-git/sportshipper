<?php
/**
* The template for displaying the footer.
*
* Contains the closing of the #content div and all content after.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package Astra
* @since 1.0.0
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
//@include_once "fedex-custom-js.php"; 

?>
			<?php astra_content_bottom(); ?>

			</div> <!-- ast-container -->

		</div><!-- #content -->

		<?php astra_content_after(); ?>

		<?php astra_footer_before(); ?>

		<?php astra_footer(); ?>

		<?php astra_footer_after(); ?>

	</div><!-- #page -->

	<?php astra_body_bottom(); ?>

	<script type="text/javascript">
		jQuery(".origin").on('click', function(e) {
			jQuery(".origin").removeClass('ui-selected');
			jQuery(this).addClass('ui-selected');

			var comapny = jQuery(this).attr('comapny_name');
			var street_lines = jQuery(this).attr('street_lines');
			var city = jQuery(this).attr('city');
			var country_code = jQuery(this).attr('country_code');
			var postal_code = jQuery(this).attr('postal_code');
			var phone_number =jQuery(this).attr('phone_number');

			jQuery('#Company_Name').val(comapny);
			jQuery('#Street').val(street_lines);
			jQuery('#City').val(city);
			jQuery('#Country_Code').val(country_code);
			jQuery('#Postal_Code').val(postal_code);
			jQuery('#Phone_Number').val(phone_number);
		});

		jQuery(".return" ).on('click', function(e) {
			jQuery(".return").removeClass('ui-selected');
			jQuery(this).addClass('ui-selected');

			var comapny = jQuery(this).attr('comapny_name');
			var street_lines = jQuery(this).attr('street_lines');
			var city = jQuery(this).attr('city');
			var country_code = jQuery(this).attr('country_code');
			var postal_code = jQuery(this).attr('postal_code');
			var phone_number =jQuery(this).attr('phone_number');

			jQuery('#Company_Name_destination').val(comapny);
			jQuery('#Street_destination').val(street_lines);
			jQuery('#City_destination').val(city);
			jQuery('#Country_Code_destination').val(country_code);
			jQuery('#Postal_Code_destination').val(postal_code);
			jQuery('#Phone_Number_destination').val(phone_number);
		});

		jQuery('select#drop_location').on('change', function() {
			var drop_services =  this.value;
			if (drop_services == 'PickUp'){
				jQuery(".fedex-location").hide();
				jQuery(".return-pickup").hide();
			}
			else {
				jQuery(".fedex-location").show();
				jQuery(".return-pickup").show();
			}
			jQuery( 'body' ).trigger( 'update_checkout' );
			jQuery.ajax({
				type: "POST",
				dataType: "json",
				url: "<?php echo admin_url('admin-ajax.php'); ?>",
				data : {
					action: 'update_fedex_extra_surcharge',
					status: '1',
					service_type: drop_services,
				},
				success: function(response) {
					jQuery( 'body' ).trigger( 'update_checkout' );
					return true;
				}
			});
		});

		jQuery("a.print-label-btn, a.print-label-btn-return" ).on('click', function(e) {
			e.preventDefault();
			var url = jQuery(this).attr('href');
			window.open(url, '_blank');
		});
	</script>

	<?php wp_footer(); ?>

	</body>
</html>