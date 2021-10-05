<?php 
add_filter('woocommerce_product_data_tabs', 'product_luggage_custome_tabs');
function product_luggage_custome_tabs($tabs) {
	$tabs['plan_btn_text'] = [
		'label' => __('Button Text', 'txtdomain'),
		'target' => 'plan_btn_text',
		'class' => ['hide_if_external'],
		'priority' => 100
	];
	$tabs['luggage_boxes'] = [
		'label' => __('Luggage/ Boxes', 'txtdomain'),
		'target' => 'luggage_boxes',
		'class' => ['hide_if_external'],
		'priority' => 110
	];
	$tabs['golf_clubs'] = [
		'label' => __('Golf Clubs', 'txtdomain'),
		'target' => 'golf_clubs',
		'class' => ['hide_if_external'],
		'priority' => 120
	];
	$tabs['skis_snowboards'] = [
		'label' => __('Skis Snowboards', 'txtdomain'),
		'target' => 'skis_snowboards',
		'class' => ['hide_if_external'],
		'priority' => 130
	];
	$tabs['boxes'] = [
		'label' => __('Boxes', 'txtdomain'),
		'target' => 'boxes',
		'class' => ['hide_if_external'],
		'priority' => 140
	];
	$tabs['bikes'] = [
		'label' => __('Bikes', 'txtdomain'),
		'target' => 'bikes',
		'class' => ['hide_if_external'],
		'priority' => 150
	];
	return $tabs;
}

add_action('woocommerce_product_data_panels', 'product_data_panels');
function product_data_panels() { 
	$product_id = get_the_ID();
	$weight_unit = get_option('woocommerce_weight_unit');
	$dimensions_unit = get_option('woocommerce_dimension_unit'); ?>

	<!-- ========================= for Luggage/ Boxes tab option ================================ -->
	<div id="luggage_boxes" class="panel woocommerce_options_panel">
		<?php
			$luggage_boxes = get_post_meta($product_id, 'product_luggage_boxes', true);

			echo '<div class="options_group">';

				/*========================= for oversize =================================*/

				echo '<h3 style="padding-left: 10px;">Oversize :</h3>';
				woocommerce_wp_text_input( array(
					'id'                => 'oversize_weight',
					'name'              => 'luggage_boxes[oversize][weight]',
					'value' 			=> $luggage_boxes['oversize']['weight'],
					'label'             => __('Weight('.$weight_unit.') :', 'txtdomain'),
					'placeholder'       => 'weight',
					'desc_tip'          => 'true',
				) );
				woocommerce_wp_text_input( array(
					'id'                => 'oversize_length',
					'name'              => 'luggage_boxes[oversize][length]',
					'value' 			=> $luggage_boxes['oversize']['length'],
					'label'             => __('Length :', 'txtdomain'),
					'placeholder'       => 'length',
					'desc_tip'          => 'true',
				) );
				woocommerce_wp_text_input( array(
					'id'                => 'oversize_width',
					'name'              => 'luggage_boxes[oversize][width]',
					'value' 			=> $luggage_boxes['oversize']['width'],
					'label'             => __('Width :', 'txtdomain'),
					'placeholder'       => 'width',
					'desc_tip'          => 'true',
				) );
				woocommerce_wp_text_input( array(
					'id'                => 'oversize_height',
					'name'              => 'luggage_boxes[oversize][height]',
					'value' 			=> $luggage_boxes['oversize']['height'],
					'label'             => __('Height :', 'txtdomain'),
					'placeholder'       => 'height',
					'desc_tip'          => 'true',
				) );

				/*========================== for checked ================================*/

				echo '<h3 style="padding-left: 10px;">Checked :</h3>';
				woocommerce_wp_text_input( array(
					'id'                => 'checked_weight',
					'name'              => 'luggage_boxes[checked][weight]',
					'value' 			=> $luggage_boxes['checked']['weight'],
					'label'             => __('Weight('.$weight_unit.') :', 'txtdomain'),
					'placeholder'       => 'weight',
					'desc_tip'          => 'true',
				) );
				woocommerce_wp_text_input( array(
					'id'                => 'checked_length',
					'name'              => 'luggage_boxes[checked][length]',
					'value' 			=> $luggage_boxes['checked']['length'],
					'label'             => __('Length :', 'txtdomain'),
					'placeholder'       => 'length',
					'desc_tip'          => 'true',
				) );
				woocommerce_wp_text_input( array(
					'id'                => 'checked_width',
					'name'              => 'luggage_boxes[checked][width]',
					'value' 			=> $luggage_boxes['checked']['width'],
					'label'             => __('Width :', 'txtdomain'),
					'placeholder'       => 'width',
					'desc_tip'          => 'true',
				) );
				woocommerce_wp_text_input( array(
					'id'                => 'checked_height',
					'name'              => 'luggage_boxes[checked][height]',
					'value' 			=> $luggage_boxes['checked']['height'],
					'label'             => __('Height :', 'txtdomain'),
					'placeholder'       => 'height',
					'desc_tip'          => 'true',
				) );

				/*=========================== for carry-on ===============================*/

				echo '<h3 style="padding-left: 10px;">Carry-on :</h3>';
				woocommerce_wp_text_input( array(
					'id'                => 'carry_on_weight',
					'name'              => 'luggage_boxes[carry_on][weight]',
					'value' 			=> $luggage_boxes['carry_on']['weight'],
					'label'             => __('Weight('.$weight_unit.') :', 'txtdomain'),
					'placeholder'       => 'weight',
					'desc_tip'          => 'true',
				) );
				woocommerce_wp_text_input( array(
					'id'                => 'carry_on_length',
					'name'              => 'luggage_boxes[carry_on][length]',
					'value' 			=> $luggage_boxes['carry_on']['length'],
					'label'             => __('Length :', 'txtdomain'),
					'placeholder'       => 'length',
					'desc_tip'          => 'true',
				) );
				woocommerce_wp_text_input( array(
					'id'                => 'carry_on_width',
					'name'              => 'luggage_boxes[carry_on][width]',
					'value' 			=> $luggage_boxes['carry_on']['width'],
					'label'             => __('Width :', 'txtdomain'),
					'placeholder'       => 'width',
					'desc_tip'          => 'true',
				) );
				woocommerce_wp_text_input( array(
					'id'                => 'carry_on_width',
					'name'              => 'luggage_boxes[carry_on][height]',
					'value' 			=> $luggage_boxes['carry_on']['height'],
					'label'             => __('Height :', 'txtdomain'),
					'placeholder'       => 'height',
					'desc_tip'          => 'true',
				) );
			echo '</div>';
		?>
	</div>

	<!-- ========================= for Golf Clubs tab option ================================ -->
	<div id="golf_clubs" class="panel woocommerce_options_panel">
		<?php
			$golf_clubs = get_post_meta($product_id, 'product_golf_clubs', true);

			echo '<div class="options_group">';

				/*========================= for Large Golf Clubs =================================*/

				echo '<h3 style="padding-left: 10px;">Large Golf Clubs :</h3>';
				woocommerce_wp_text_input( array(
					'id'                => 'large_golf_clubs_weight',
					'name'              => 'golf_clubs[large_golf_clubs][weight]',
					'value' 			=> $golf_clubs['large_golf_clubs']['weight'],
					'label'             => __('Weight('.$weight_unit.') :', 'txtdomain'),
					'placeholder'       => 'weight',
					'desc_tip'          => 'true',
				) );
				woocommerce_wp_text_input( array(
					'id'                => 'large_golf_clubs_length',
					'name'              => 'golf_clubs[large_golf_clubs][length]',
					'value' 			=> $golf_clubs['large_golf_clubs']['length'],
					'label'             => __('Length :', 'txtdomain'),
					'placeholder'       => 'length',
					'desc_tip'          => 'true',
				) );
				woocommerce_wp_text_input( array(
					'id'                => 'large_golf_clubs_width',
					'name'              => 'golf_clubs[large_golf_clubs][width]',
					'value' 			=> $golf_clubs['large_golf_clubs']['width'],
					'label'             => __('Width :', 'txtdomain'),
					'placeholder'       => 'width',
					'desc_tip'          => 'true',
				) );
				woocommerce_wp_text_input( array(
					'id'                => 'large_golf_clubs_height',
					'name'              => 'golf_clubs[large_golf_clubs][height]',
					'value' 			=> $golf_clubs['large_golf_clubs']['height'],
					'label'             => __('Height :', 'txtdomain'),
					'placeholder'       => 'height',
					'desc_tip'          => 'true',
				) );

				/*========================== for Golf Clubs ================================*/

				echo '<h3 style="padding-left: 10px;">Golf Clubs :</h3>';
				woocommerce_wp_text_input( array(
					'id'                => 'large_golf_weight',
					'name'              => 'golf_clubs[large_golf][weight]',
					'value' 			=> $golf_clubs['large_golf']['weight'],
					'label'             => __('Weight('.$weight_unit.') :', 'txtdomain'),
					'placeholder'       => 'weight',
					'desc_tip'          => 'true',
				) );
				woocommerce_wp_text_input( array(
					'id'                => 'large_golf_length',
					'name'              => 'golf_clubs[large_golf][length]',
					'value' 			=> $golf_clubs['large_golf']['length'],
					'label'             => __('Length :', 'txtdomain'),
					'placeholder'       => 'length',
					'desc_tip'          => 'true',
				) );
				woocommerce_wp_text_input( array(
					'id'                => 'large_golf_width',
					'name'              => 'golf_clubs[large_golf][width]',
					'value' 			=> $golf_clubs['large_golf']['width'],
					'label'             => __('Width :', 'txtdomain'),
					'placeholder'       => 'width',
					'desc_tip'          => 'true',
				) );
				woocommerce_wp_text_input( array(
					'id'                => 'large_golf_height',
					'name'              => 'golf_clubs[large_golf][height]',
					'value' 			=> $golf_clubs['large_golf']['height'],
					'label'             => __('Height :', 'txtdomain'),
					'placeholder'       => 'height',
					'desc_tip'          => 'true',
				) );

			echo '</div>';
		?>
	</div>

	<!-- ========================= for Skis Snowboards tab option ================================ -->
	<div id="skis_snowboards" class="panel woocommerce_options_panel">
		<?php
			$skis_snowboards = get_post_meta($product_id, 'product_skis_snowboards', true);
			echo '<div class="options_group">';

				/*========================= for Skis =================================*/

				echo '<h3 style="padding-left: 10px;">Skis :</h3>';
				woocommerce_wp_text_input( array(
					'id'                => 'skis_weight',
					'name'              => 'skis_snowboards[skis][weight]',
					'value' 			=> $skis_snowboards['skis']['weight'],
					'label'             => __('Weight('.$weight_unit.') :', 'txtdomain'),
					'placeholder'       => 'weight',
					'desc_tip'          => 'true',
				) );
				woocommerce_wp_text_input( array(
					'id'                => 'skis_length',
					'name'              => 'skis_snowboards[skis][length]',
					'value' 			=> $skis_snowboards['skis']['length'],
					'label'             => __('Length :', 'txtdomain'),
					'placeholder'       => 'length',
					'desc_tip'          => 'true',
				) );
				woocommerce_wp_text_input( array(
					'id'                => 'skis_width',
					'name'              => 'skis_snowboards[skis][width]',
					'value' 			=> $skis_snowboards['skis']['width'],
					'label'             => __('Width :', 'txtdomain'),
					'placeholder'       => 'width',
					'desc_tip'          => 'true',
				) );
				woocommerce_wp_text_input( array(
					'id'                => 'skis_height',
					'name'              => 'skis_snowboards[skis][height]',
					'value' 			=> $skis_snowboards['skis']['height'],
					'label'             => __('Height :', 'txtdomain'),
					'placeholder'       => 'height',
					'desc_tip'          => 'true',
				) );

				/*========================== for Large Skis ================================*/

				echo '<h3 style="padding-left: 10px;">Large Skis :</h3>';
				woocommerce_wp_text_input( array(
					'id'                => 'large_skis_weight',
					'name'              => 'skis_snowboards[large_skis][weight]',
					'value' 			=> $skis_snowboards['large_skis']['weight'],
					'label'             => __('Weight('.$weight_unit.') :', 'txtdomain'),
					'placeholder'       => 'weight',
					'desc_tip'          => 'true',
				) );
				woocommerce_wp_text_input( array(
					'id'                => 'large_skis_length',
					'name'              => 'skis_snowboards[large_skis][length]',
					'value' 			=> $skis_snowboards['large_skis']['length'],
					'label'             => __('Length :', 'txtdomain'),
					'placeholder'       => 'length',
					'desc_tip'          => 'true',
				) );
				woocommerce_wp_text_input( array(
					'id'                => 'large_skis_width',
					'name'              => 'skis_snowboards[large_skis][width]',
					'value' 			=> $skis_snowboards['large_skis']['width'],
					'label'             => __('Width :', 'txtdomain'),
					'placeholder'       => 'width',
					'desc_tip'          => 'true',
				) );
				woocommerce_wp_text_input( array(
					'id'                => 'large_skis_height',
					'name'              => 'skis_snowboards[large_skis][height]',
					'value' 			=> $skis_snowboards['large_skis']['height'],
					'label'             => __('Height :', 'txtdomain'),
					'placeholder'       => 'height',
					'desc_tip'          => 'true',
				) );

				/*=========================== for Snowboard ===============================*/

				echo '<h3 style="padding-left: 10px;">Snowboard :</h3>';
				woocommerce_wp_text_input( array(
					'id'                => 'snowboard_weight',
					'name'              => 'skis_snowboards[snowboard][weight]',
					'value' 			=> $skis_snowboards['snowboard']['weight'],
					'label'             => __('Weight('.$weight_unit.') :', 'txtdomain'),
					'placeholder'       => 'weight',
					'desc_tip'          => 'true',
				) );
				woocommerce_wp_text_input( array(
					'id'                => 'snowboard_length',
					'name'              => 'skis_snowboards[snowboard][length]',
					'value' 			=> $skis_snowboards['snowboard']['length'],
					'label'             => __('Length :', 'txtdomain'),
					'placeholder'       => 'length',
					'desc_tip'          => 'true',
				) );
				woocommerce_wp_text_input( array(
					'id'                => 'snowboard_width',
					'name'              => 'skis_snowboards[snowboard][width]',
					'value' 			=> $skis_snowboards['snowboard']['width'],
					'label'             => __('Width :', 'txtdomain'),
					'placeholder'       => 'width',
					'desc_tip'          => 'true',
				) );
				woocommerce_wp_text_input( array(
					'id'                => 'snowboard_width',
					'name'              => 'skis_snowboards[snowboard][height]',
					'value' 			=> $skis_snowboards['snowboard']['height'],
					'label'             => __('Height :', 'txtdomain'),
					'placeholder'       => 'height',
					'desc_tip'          => 'true',
				) );

				/*=========================== for Large Snowboard ===============================*/

				echo '<h3 style="padding-left: 10px;">Large Snowboard :</h3>';
				woocommerce_wp_text_input( array(
					'id'                => 'large_snowboard_weight',
					'name'              => 'skis_snowboards[large_snowboard][weight]',
					'value' 			=> $skis_snowboards['large_snowboard']['weight'],
					'label'             => __('Weight('.$weight_unit.') :', 'txtdomain'),
					'placeholder'       => 'weight',
					'desc_tip'          => 'true',
				) );
				woocommerce_wp_text_input( array(
					'id'                => 'large_snowboard_length',
					'name'              => 'skis_snowboards[large_snowboard][length]',
					'value' 			=> $skis_snowboards['large_snowboard']['weight'],
					'label'             => __('Length :', 'txtdomain'),
					'placeholder'       => 'length',
					'desc_tip'          => 'true',
				) );
				woocommerce_wp_text_input( array(
					'id'                => 'large_snowboard_width',
					'name'              => 'skis_snowboards[large_snowboard][width]',
					'value' 			=> $skis_snowboards['large_snowboard']['weight'],
					'label'             => __('Width :', 'txtdomain'),
					'placeholder'       => 'width',
					'desc_tip'          => 'true',
				) );
				woocommerce_wp_text_input( array(
					'id'                => 'large_snowboard_width',
					'name'              => 'skis_snowboards[large_snowboard][height]',
					'value' 			=> $skis_snowboards['large_snowboard']['weight'],
					'label'             => __('Height :', 'txtdomain'),
					'placeholder'       => 'height',
					'desc_tip'          => 'true',
				) );
			echo '</div>';
		?>
	</div>

	<!-- ========================= for Boxes tab option ================================ -->
	<div id="boxes" class="panel woocommerce_options_panel">
		<?php
			$boxes = get_post_meta($product_id, 'product_boxes', true);
			echo '<div class="options_group">';

				/*========================= for oversize =================================*/

				echo '<h3 style="padding-left: 10px;">Oversize :</h3>';
				woocommerce_wp_text_input( array(
					'id'                => 'oversize_weight',
					'name'              => 'boxes[oversize][weight]',
					'value' 			=> $boxes['oversize']['weight'],
					'label'             => __('Weight('.$weight_unit.') :', 'txtdomain'),
					'placeholder'       => 'weight',
					'desc_tip'          => 'true',
				) );
				woocommerce_wp_text_input( array(
					'id'                => 'oversize_length',
					'name'              => 'boxes[oversize][length]',
					'value' 			=> $boxes['oversize']['length'],
					'label'             => __('Length :', 'txtdomain'),
					'placeholder'       => 'length',
					'desc_tip'          => 'true',
				) );
				woocommerce_wp_text_input( array(
					'id'                => 'oversize_width',
					'name'              => 'boxes[oversize][width]',
					'value' 			=> $boxes['oversize']['width'],
					'label'             => __('Width :', 'txtdomain'),
					'placeholder'       => 'width',
					'desc_tip'          => 'true',
				) );
				woocommerce_wp_text_input( array(
					'id'                => 'oversize_height',
					'name'              => 'boxes[oversize][height]',
					'value' 			=> $boxes['oversize']['height'],
					'label'             => __('Height :', 'txtdomain'),
					'placeholder'       => 'height',
					'desc_tip'          => 'true',
				) );

				/*========================== for checked ================================*/

				echo '<h3 style="padding-left: 10px;">Checked :</h3>';
				woocommerce_wp_text_input( array(
					'id'                => 'checked_weight',
					'name'              => 'boxes[checked][weight]',
					'value' 			=> $boxes['checked']['weight'],
					'label'             => __('Weight('.$weight_unit.') :', 'txtdomain'),
					'placeholder'       => 'weight',
					'desc_tip'          => 'true',
				) );
				woocommerce_wp_text_input( array(
					'id'                => 'checked_length',
					'name'              => 'boxes[checked][length]',
					'value' 			=> $boxes['checked']['length'],
					'label'             => __('Length :', 'txtdomain'),
					'placeholder'       => 'length',
					'desc_tip'          => 'true',
				) );
				woocommerce_wp_text_input( array(
					'id'                => 'checked_width',
					'name'              => 'boxes[checked][width]',
					'value' 			=> $boxes['checked']['width'],
					'label'             => __('Width :', 'txtdomain'),
					'placeholder'       => 'width',
					'desc_tip'          => 'true',
				) );
				woocommerce_wp_text_input( array(
					'id'                => 'checked_height',
					'name'              => 'boxes[checked][height]',
					'value' 			=> $boxes['checked']['height'],
					'label'             => __('Height :', 'txtdomain'),
					'placeholder'       => 'height',
					'desc_tip'          => 'true',
				) );

				/*=========================== for carry-on ===============================*/

				echo '<h3 style="padding-left: 10px;">Carry-on :</h3>';
				woocommerce_wp_text_input( array(
					'id'                => 'carry_on_weight',
					'name'              => 'boxes[carry_on][weight]',
					'value' 			=> $boxes['carry_on']['weight'],
					'label'             => __('Weight('.$weight_unit.') :', 'txtdomain'),
					'placeholder'       => 'weight',
					'desc_tip'          => 'true',
				) );
				woocommerce_wp_text_input( array(
					'id'                => 'carry_on_length',
					'name'              => 'boxes[carry_on][length]',
					'value' 			=> $boxes['carry_on']['length'],
					'label'             => __('Length :', 'txtdomain'),
					'placeholder'       => 'length',
					'desc_tip'          => 'true',
				) );
				woocommerce_wp_text_input( array(
					'id'                => 'carry_on_width',
					'name'              => 'boxes[carry_on][width]',
					'value' 			=> $boxes['carry_on']['width'],
					'label'             => __('Width :', 'txtdomain'),
					'placeholder'       => 'width',
					'desc_tip'          => 'true',
				) );
				woocommerce_wp_text_input( array(
					'id'                => 'carry_on_width',
					'name'              => 'boxes[carry_on][height]',
					'value' 			=> $boxes['carry_on']['height'],
					'label'             => __('Height :', 'txtdomain'),
					'placeholder'       => 'height',
					'desc_tip'          => 'true',
				) );
			echo '</div>';
		?>
	</div>

	<!-- ========================= for Bikes tab option ================================ -->
	<div id="bikes" class="panel woocommerce_options_panel">
		<?php
			$bikes = get_post_meta($product_id, 'product_bikes', true);
			echo '<div class="options_group">';

				/*========================= for bikes =================================*/

				echo '<h3 style="padding-left: 10px;">Oversize :</h3>';
				woocommerce_wp_text_input( array(
					'id'                => 'bikes_oversize_weight',
					'name'              => 'bikes[bikes_oversize][weight]',
					'value' 			=> $bikes['bikes_oversize']['weight'],
					'label'             => __('Weight('.$weight_unit.') :', 'txtdomain'),
					'placeholder'       => 'weight',
					'desc_tip'          => 'true',
				) );
				woocommerce_wp_text_input( array(
					'id'                => 'bikes_oversize_length',
					'name'              => 'bikes[bikes_oversize][length]',
					'value' 			=> $bikes['bikes_oversize']['length'],
					'label'             => __('Length :', 'txtdomain'),
					'placeholder'       => 'length',
					'desc_tip'          => 'true',
				) );
				woocommerce_wp_text_input( array(
					'id'                => 'bikes_oversize_width',
					'name'              => 'bikes[bikes_oversize][width]',
					'value' 			=> $bikes['bikes_oversize']['width'],
					'label'             => __('Width :', 'txtdomain'),
					'placeholder'       => 'width',
					'desc_tip'          => 'true',
				) );
				woocommerce_wp_text_input( array(
					'id'                => 'bikes_oversize_height',
					'name'              => 'bikes[bikes_oversize][height]',
					'value' 			=> $bikes['bikes_oversize']['height'],
					'label'             => __('Height :', 'txtdomain'),
					'placeholder'       => 'height',
					'desc_tip'          => 'true',
				) );

			echo '</div>';
		?>
	</div>

	<!-- ========================= for plan Button text ================================ -->
	<div id="plan_btn_text" class="panel woocommerce_options_panel">
		<?php
			$plan_btn_text = get_post_meta($product_id, 'plan_btn_text', true);
			echo '<div class="options_group">';

				woocommerce_wp_text_input( array(
					'id'                => 'bikes_oversize_weight',
					'name'              => 'plan_btn_text',
					'value' 			=> $plan_btn_text,
					'label'             => __('Label: ', 'txtdomain'),
					'placeholder'       => 'Label',
					'desc_tip'          => 'true',
				) );

			echo '</div>';
		?>
	</div>
<?php }

add_action('woocommerce_process_product_meta', 'woocommerce_process_product_meta_save');
function woocommerce_process_product_meta_save($post_id){
	$product = wc_get_product($post_id);

	$plan_btn_text = sanitize_text_field($_POST['plan_btn_text']);
	$luggage_boxes = $_POST['luggage_boxes'];
	$golf_clubs = $_POST['golf_clubs'];
	$skis_snowboards = $_POST['skis_snowboards'];
	$boxes = $_POST['boxes'];
	$bikes = $_POST['bikes'];

	$product->update_meta_data('plan_btn_text', $plan_btn_text);
	$product->update_meta_data('product_luggage_boxes', $luggage_boxes);
	$product->update_meta_data('product_golf_clubs', $golf_clubs);
	$product->update_meta_data('product_skis_snowboards', $skis_snowboards);
	$product->update_meta_data('product_boxes', $boxes);
	$product->update_meta_data('product_bikes', $bikes);

	$product->save();
}
?>