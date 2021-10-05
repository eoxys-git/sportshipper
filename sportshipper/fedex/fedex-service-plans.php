<?php 

if($_SESSION['plan_back_show'] == 'true'){
	$class = 'show-fedex-plan';
} ?>

<div class="fedex-plan-row choose-plan-show plan-row-pricing <?php echo $class;?>">
	<h4>Choose a support plan</h4>
	<div>
		<?php
			$params = array(
				'post_type' => 'product',
				'post_status' => 'publish',
				'product_cat' => 'service-plans',
				'order' => 'ASC',
			);
			$query = new WP_Query($params);

			while( $query->have_posts() ) : $query->the_post();	
				$product_id = get_the_id(); 
				$product = wc_get_product($product_id);

				$most_popular = get_post_meta($product_id, '_custom_product_most__popular_field', true);
				    $plan_btn_text = get_post_meta($product_id, 'plan_btn_text', true);?>
				<div class="bg-white border fedex-plans" data-plan="<?php echo $product->get_name(); ?>">
                  <div class="py-1 text-white rounded-t-lg bg-brand-plum">
                  	<?php if( $most_popular == 'yes'){?>
                  		<div class="most">
                        <strong class="text-sm">Most popular</strong>
                    </div>
                         <?php }?>
                     </div>
                
	            	<div class="flex ">
						<div class="plans-header">
							<h4><?php echo $product->get_name(); ?></h4>
							<h6><?php echo $product->get_short_description(); ?></h6>
							<p><?php echo get_woocommerce_currency_symbol().$product->get_price(); ?></p>
						</div>

						<div class="plan-details">
							<?php echo $product->get_description();	?>
							<div class="plans-footer">
								<button class="button select-plan" plan-id="<?php echo $product_id; ?>"><?php echo $plan_btn_text;?></button>
							</div>
						</div>
					</div>
				</div>
			<?php endwhile;
			wp_reset_postdata();
		?>
	</div>
</div>