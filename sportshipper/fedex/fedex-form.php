<?php 
	if ( !session_id() ){
		session_start();
	}
?>
<div class="form-container">
	<div class="row quote-heading">
		<div class="quote-trip-types">
			<div class="quote-input-wrapper">
				<select class="form-control input-lg LoNotSensitive select-placeholder" id="bag_type" name="bag_type">
					<option class="select-placeholder" form-id="one_way" value="One-way">One-way</option>
					<option class="select-placeholder" form-id="round_trip" value="Round Trip" selected>Round Trip</option>
				</select>
			</div>
		</div>
		<div class="quote-trip-bags">
			<div class="quote-input-wrapper">
				<?php
					$selected_bags = $_SESSION['fedex_selected_bags'];

					if ($selected_bags) {
						$total_selected_bags = array_sum($selected_bags);
					}
					else{
						$total_selected_bags = 0;
					}
				?>
				<div class="bags">
					<h6><span class="total-bags"><?php echo $total_selected_bags; ?></span>x bags <i class="arrow down"></i></h6>
					<div class="error-msg">
						<h6 class="bags-error"></h6>
					</div>
				</div>
				<div class="luggage-container luggage-container-show-hide">
					<?php 
						$product_id = 555;
						$weight_unit = get_option('woocommerce_weight_unit');
					if (is_front_page() || is_page('luggage') || is_page( 'pricing' ) ) { ?>
						<div class="luggage-types luggage-boxes">
							<div class="title">
								<h6>Luggage/ Boxes <span></span><i class="arrow up"></i></h6>
							</div>
							<div class="luggage-boxes-types">
								<?php
									$luggage_boxes = get_post_meta($product_id, 'product_luggage_boxes', true);
								?>
								<div class="product-container">
									<div class="product-title">
										<p>Oversize</p>
										<span><?php echo $luggage_boxes['oversize']['weight'].' '.$weight_unit; ?></span>
									</div> 
									<div class="product-coutn">
										<div class="form-group__controls">
											<?php
												$bag_quantity = 0;
												$selected = '';
												if ($selected_bags['product_luggage_boxes-oversize']) {
													$bag_quantity = $selected_bags['product_luggage_boxes-oversize'];
													$selected = 'selected';
												}
											?>
											<div selected-packages="product_luggage_boxes-oversize" product-id="<?php echo $product_id;?>" class="number-input product <?php echo $selected; ?>">
												<button class="button button-larger decrease" data-button="decrease" type="button">-</button>
												<span product-quantity='<?php echo $bag_quantity; ?>' class="number-input__count"><?php echo $bag_quantity; ?></span>
												<button class="button button-larger increase" data-button="increase" type="button">+</button>
											</div>
										</div>
									</div>
								</div>
								<div class="product-container">
									<div class="product-title">
										<p>Checked</p>
										<span><?php echo $luggage_boxes['checked']['weight'].' '.$weight_unit; ?></span>
									</div> 
									<div class="product-coutn">
										<div class="form-group__controls">
											<?php
												$bag_quantity = 0;
												$selected = '';
												if ($selected_bags['product_luggage_boxes-checked']) {
													$bag_quantity = $selected_bags['product_luggage_boxes-checked'];
													$selected = 'selected';
												}
											?>
											<div selected-packages="product_luggage_boxes-checked" product-id="<?php echo $product_id;?>" class="number-input product <?php echo $selected; ?>">
												<button class="button button-larger decrease" data-button="decrease" type="button">-</button>
												<span product-quantity='<?php echo $bag_quantity; ?>' class="number-input__count"><?php echo $bag_quantity; ?></span>
												<button class="button button-larger increase" data-button="increase" type="button">+</button>
											</div>
										</div>
									</div>
								</div>
								<div class="product-container">
									<div class="product-title">
										<p>Carry-on</p>
										<span><?php echo $luggage_boxes['carry_on']['weight'].' '.$weight_unit; ?></span>
									</div> 
									<div class="product-coutn">
										<div class="form-group__controls">
											<?php
												$bag_quantity = 0;
												$selected = '';
												if ($selected_bags['product_luggage_boxes-carry_on']) {
													$bag_quantity = $selected_bags['product_luggage_boxes-carry_on'];
													$selected = 'selected';
												}
											?>
											<div selected-packages="product_luggage_boxes-carry_on" product-id="<?php echo $product_id;?>" class="number-input product <?php echo $selected; ?>">
												<button class="button button-larger decrease" data-button="decrease" type="button">-</button>
												<span product-quantity='<?php echo $bag_quantity; ?>' class="number-input__count"><?php echo $bag_quantity; ?></span>
												<button class="button button-larger increase" data-button="increase" type="button">+</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php } 

					if (is_front_page() || is_page('golf-clubs') || is_page( 'pricing' )) { ?>
						<div class="luggage-types golf-clubs">
							<div class="title">
								<h6>Golf Clubs <span></span><i class="arrow down"></i></h6>
							</div>
							<div class="golf-clubs-boxes-types show-hide">
								<?php
									$golf_clubs = get_post_meta($product_id, 'product_golf_clubs', true);
								?>
								<div class="product-container">
									<div class="product-title product">
										<p>Large Golf Clubs</p>
										<span><?php echo $golf_clubs['large_golf_clubs']['weight'].' '.$weight_unit; ?></span>
									</div> 
									<div class="product-coutn">
										<div class="form-group__controls">
											<?php
												$bag_quantity = 0;
												$selected = '';
												if ($selected_bags['product_golf_clubs-large_golf_clubs']) {
													$bag_quantity = $selected_bags['product_golf_clubs-large_golf_clubs'];
													$selected = 'selected';
												}
											?>
											<div selected-packages="product_golf_clubs-large_golf_clubs" product-id="<?php echo $product_id;?>" class="number-input product <?php echo $selected; ?>">
												<button class="button button-larger decrease" data-button="decrease" type="button">-</button>
												<span product-quantity='<?php echo $bag_quantity; ?>' class="number-input__count"><?php echo $bag_quantity; ?></span>
												<button class="button button-larger increase" data-button="increase" type="button">+</button>
											</div>
										</div>
									</div>
								</div>
								<div class="product-container">
									<div class="product-title product">
										<p>Golf Clubs</p>
										<span><?php echo $golf_clubs['large_golf']['weight'].' '.$weight_unit; ?></span>
									</div> 
									<div class="product-coutn">
										<div class="form-group__controls">
											<?php
												$bag_quantity = 0;
												$selected = '';
												if ($selected_bags['product_golf_clubs-large_golf']) {
													$bag_quantity = $selected_bags['product_golf_clubs-large_golf'];
													$selected = 'selected';
												}
											?>
											<div selected-packages="product_golf_clubs-large_golf" product-id="<?php echo $product_id;?>" class="number-input product <?php echo $selected; ?>">
												<button class="button button-larger decrease" data-button="decrease" type="button">-</button>
												<span product-quantity='<?php echo $bag_quantity; ?>' class="number-input__count"><?php echo $bag_quantity; ?></span>
												<button class="button button-larger increase" data-button="increase" type="button">+</button>
											</div>
										</div>
									</div>
								</div> 
							</div>
						</div>
					<?php }  

					if (is_front_page() || is_page('skis-snowboard')  || is_page( 'pricing' )) { ?>
						<div class="luggage-types skis-snowboards">
							<div class="title">
								<h6>Skis Snowboards <span></span><i class="arrow down"></i></h6>
							</div>
							<div class="skis-snowboards-boxes-types show-hide">
								<?php
									$skis_snowboards = get_post_meta($product_id, 'product_skis_snowboards', true);
								?>
								<div class="product-container">
									<div class="product-title">
										<p>Skis</p>
										<span><?php echo $skis_snowboards['skis']['weight'].' '.$weight_unit; ?></span>
									</div> 
									<div class="product-coutn">
										<div class="form-group__controls">
											<?php
												$bag_quantity = 0;
												$selected = '';
												if ($selected_bags['product_skis_snowboards-skis']) {
													$bag_quantity = $selected_bags['product_skis_snowboards-skis'];
													$selected = 'selected';
												}
											?>
											<div selected-packages="product_skis_snowboards-skis" product-id="<?php echo $product_id;?>" class="number-input product <?php echo $selected; ?>">
												<button class="button button-larger decrease" data-button="decrease" type="button">-</button>
												<span product-quantity='<?php echo $bag_quantity; ?>' class="number-input__count"><?php echo $bag_quantity; ?></span>
												<button class="button button-larger increase" data-button="increase" type="button">+</button>
											</div>
										</div>
									</div>
								</div>
								<div class="product-container">
									<div class="product-title">
										<p>Large Skis</p>
										<span><?php echo $skis_snowboards['large_skis']['weight'].' '.$weight_unit; ?></span>
									</div> 
									<div class="product-coutn">
										<div class="form-group__controls">
											<?php
												$bag_quantity = 0;
												$selected = '';
												if ($selected_bags['product_skis_snowboards-large_skis']) {
													$bag_quantity = $selected_bags['product_skis_snowboards-large_skis'];
													$selected = 'selected';
												}
											?>
											<div selected-packages="product_skis_snowboards-large_skis" product-id="<?php echo $product_id;?>" class="number-input product <?php echo $selected; ?>">
												<button class="button button-larger decrease" data-button="decrease" type="button">-</button>
												<span product-quantity='<?php echo $bag_quantity; ?>' class="number-input__count"><?php echo $bag_quantity; ?></span>
												<button class="button button-larger increase" data-button="increase" type="button">+</button>
											</div>
										</div>
									</div>
								</div>
								<div class="product-container">
									<div class="product-title">
										<p>Snowboard</p>
										<span><?php echo $skis_snowboards['snowboard']['weight'].' '.$weight_unit; ?></span>
									</div> 
									<div class="product-coutn">
										<div class="form-group__controls">
											<?php
												$bag_quantity = 0;
												$selected = '';
												if ($selected_bags['product_skis_snowboards-snowboard']) {
													$bag_quantity = $selected_bags['product_skis_snowboards-snowboard'];
													$selected = 'selected';
												}
											?>
											<div selected-packages="product_skis_snowboards-snowboard" product-id="<?php echo $product_id;?>" class="number-input product <?php echo $selected; ?>">
												<button class="button button-larger decrease" data-button="decrease" type="button">-</button>
												<span product-quantity='<?php echo $bag_quantity; ?>' class="number-input__count"><?php echo $bag_quantity; ?></span>
												<button class="button button-larger increase" data-button="increase" type="button">+</button>
											</div>
										</div>
									</div>
								</div>
								<div class="product-container">
									<div class="product-title">
										<p>Large Snowboard</p>
										<span><?php echo $skis_snowboards['large_snowboard']['weight'].' '.$weight_unit; ?></span>
									</div> 
									<div class="product-coutn">
										<div class="form-group__controls">
											<?php
												$bag_quantity = 0;
												$selected = '';
												if ($selected_bags['product_skis_snowboards-large_snowboard']) {
													$bag_quantity = $selected_bags['product_skis_snowboards-large_snowboard'];
													$selected = 'selected';
												}
											?>
											<div selected-packages="product_skis_snowboards-large_snowboard" product-id="<?php echo $product_id;?>" class="number-input product <?php echo $selected; ?>">
												<button class="button button-larger decrease" data-button="decrease" type="button">-</button>
												<span product-quantity='<?php echo $bag_quantity; ?>' class="number-input__count"><?php echo $bag_quantity; ?></span>
												<button class="button button-larger increase" data-button="increase" type="button">+</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php }

					if (is_front_page() || is_page('boxes') || is_page( 'pricing' )) { ?>
						<div class="luggage-types boxes">
							<div class="title">
								<h6>Boxes<span></span><i class="arrow down"></i></h6>
							</div>
							<div class="boxes-boxes-types show-hide">
								<?php
									$boxes = get_post_meta($product_id, 'product_boxes', true);
								?>
								<div class="product-container">
									<div class="product-title">
										<p>Oversize</p>
										<span><?php echo $boxes['oversize']['weight'].' '.$weight_unit; ?></span>
									</div> 
									<div class="product-coutn">
										<div class="form-group__controls">
											<?php
												$bag_quantity = 0;
												$selected = '';
												if ($selected_bags['product_boxes-oversize']) {
													$bag_quantity = $selected_bags['product_boxes-oversize'];
													$selected = 'selected';
												}
											?>
											<div selected-packages="product_boxes-oversize" product-id="<?php echo $product_id;?>" class="number-input product <?php echo $selected; ?>">
												<button class="button button-larger decrease" data-button="decrease" type="button">-</button>
												<span product-quantity='<?php echo $bag_quantity; ?>' class="number-input__count"><?php echo $bag_quantity; ?></span>
												<button class="button button-larger increase" data-button="increase" type="button">+</button>
											</div>
										</div>
									</div>
								</div>
								<div class="product-container">
									<div class="product-title">
										<p>Checked</p>
										<span><?php echo $boxes['checked']['weight'].' '.$weight_unit; ?></span>
									</div> 
									<div class="product-coutn">
										<div class="form-group__controls">
											<?php
												$bag_quantity = 0;
												$selected = '';
												if ($selected_bags['product_boxes-checked']) {
													$bag_quantity = $selected_bags['product_boxes-checked'];
													$selected = 'selected';
												}
											?>
											<div selected-packages="product_boxes-checked" product-id="<?php echo $product_id;?>" class="number-input product <?php echo $selected; ?>">
												<button class="button button-larger decrease" data-button="decrease" type="button">-</button>
												<span product-quantity='<?php echo $bag_quantity; ?>' class="number-input__count"><?php echo $bag_quantity; ?></span>
												<button class="button button-larger increase" data-button="increase" type="button">+</button>
											</div>
										</div>
									</div>
								</div>
								<div class="product-container">
									<div class="product-title">
										<p>Carry-on</p>
										<span><?php echo $boxes['carry_on']['weight'].' '.$weight_unit; ?></span>
									</div> 
									<div class="product-coutn">
										<div class="form-group__controls">
											<?php
												$bag_quantity = 0;
												$selected = '';
												if ($selected_bags['product_boxes-carry_on']) {
													$bag_quantity = $selected_bags['product_boxes-carry_on'];
													$selected = 'selected';
												}
											?>
											<div selected-packages="product_boxes-carry_on" product-id="<?php echo $product_id;?>" class="number-input product <?php echo $selected; ?>">
												<button class="button button-larger decrease" data-button="decrease" type="button">-</button>
												<span product-quantity='<?php echo $bag_quantity; ?>' class="number-input__count"><?php echo $bag_quantity; ?></span>
												<button class="button button-larger increase" data-button="increase" type="button">+</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php } 

					if ( is_front_page() || is_page('bikes')  || is_page( 'pricing' ) ) { ?>
						<div class="luggage-types bikes">
							<div class="title">
								<h6>Bikes <span></span><i class="arrow down"></i></h6>
							</div>
							<div class="bikes-boxes-types show-hide">
								<?php
									$bikes = get_post_meta($product_id, 'product_bikes', true);
								?>
								<div class="product-container">
									<div class="product-title">
										<p>Oversize</p>
										<span><?php echo $bikes['bikes_oversize']['weight'].' '.$weight_unit; ?></span>
									</div> 
									<div class="product-coutn">
										<div class="form-group__controls">
											<?php
												$bag_quantity = 0;
												$selected = '';
												if ($selected_bags['product_bikes-bikes_oversize']) {
													$bag_quantity = $selected_bags['product_bikes-bikes_oversize'];
													$selected = 'selected';
												}
											?>
											<div selected-packages="product_bikes-bikes_oversize" product-id="<?php echo $product_id;?>" class="number-input product <?php echo $selected; ?>">
												<button class="button button-larger decrease" data-button="decrease" type="button">-</button>
												<span product-quantity='<?php echo $bag_quantity; ?>' class="number-input__count"><?php echo $bag_quantity; ?></span>
												<button class="button button-larger increase" data-button="increase" type="button">+</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<!-- ================ for one_way_quick_quote_form ========================= -->
	<form action="" class="form-show-hide " id="one_way_quick_quote_form" method="post" remote="" novalidate="novalidate">
		<input id="from_one_way_city" name="from_one_way_city" type="hidden" autocomplete="off" value="<?php echo $_SESSION['origin_city']; ?>">
		<input id="from_one_way_state_code" name="from_one_way_state_code" type="hidden" autocomplete="off" value="<?php echo $_SESSION['origin_state_code']; ?>">
		<input id="from_one_way_postal_code" name="from_one_way_postal_code" type="hidden" autocomplete="off" value="<?php echo $_SESSION['origin_postal_code']; ?>">
		<input id="from_one_way_country_code" name="from_one_way_country_code" type="hidden" autocomplete="off" value="<?php echo $_SESSION['origin_country_code']; ?>">
		<input id="from_one_way_lat" name="from_one_way_lat" type="hidden" autocomplete="off" value="<?php echo $_SESSION['origin_lat']; ?>">
		<input id="from_one_way_lng" name="from_one_way_long" type="hidden" autocomplete="off" value="<?php echo $_SESSION['origin_lng']; ?>">

		<input id="to_one_way_city" name="to_one_way_city" type="hidden" autocomplete="off" value="<?php echo $_SESSION['destination_city']; ?>">
		<input id="to_one_way_state_code" name="to_one_way_state_code" type="hidden" autocomplete="off" value="<?php echo $_SESSION['destination_state_code']; ?>">
		<input id="to_one_way_postal_code" name="to_one_way_postal_code" type="hidden" autocomplete="off" value="<?php echo $_SESSION['destination_postal_code']; ?>">
		<input id="to_one_way_country_code" name="to_one_way_country_code" type="hidden" autocomplete="off" value="<?php echo $_SESSION['destination_country_code']; ?>">
		<input id="to_one_way_lat" name="to_one_way_lat" type="hidden" autocomplete="off" value="<?php echo $_SESSION['destination_lat']; ?>">
		<input id="to_one_way_lng" name="to_one_way_lng" type="hidden" autocomplete="off" value="<?php echo $_SESSION['destination_lng']; ?>">

		<div class="row quote-heading">
			<div class="quote-heading-column">
				<div class="quote-input-wrapper">
					<h6>FROM</h6>
					<div class="typeahead__container">
						<div class="typeahead__field">
							<div class="la-pulse ac-loader">
								<div></div><div></div><div></div>
							</div>
							<div class="input-fields">
								<span class="typeahead__cancel-button"></span>
								<input autocomplete="off" class="form-control input-address input-lg data-hj-whitelist LoNotSensitive" data-ship-point-type="o" id="one_way_from" name="one_way_from" placeholder="From" spellcheck="false" type="text" value="<?php echo $_SESSION['shipper_address']; ?>">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="quote-heading-column">
				<div class="quote-input-wrapper">
					<h6>TO</h6>
					<div class="typeahead__container">
						<div class="typeahead__field">
							<div class="la-pulse ac-loader">
								<div></div><div></div><div></div>
							</div>
							<div class="input-fields">
								<span class="typeahead__cancel-button"></span>
								<input autocomplete="off" class="form-control input-address input-lg data-hj-whitelist LoNotSensitive" data-ship-point-type="d" id="one_way_to" name="one_way_to" placeholder="To" spellcheck="false" type="text" value="<?php echo $_SESSION['recipient_address']; ?>">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="quote-date">
				<div class="quote-input-wrapper date_wrapper">
					<h6>ARRIVAL</h6>
					<input type="text" class="form-control input-address input-lg input-fields" name="arrival_date" id="arrival_date" value="<?php echo $_SESSION['arrival_date']; ?>" placeholder="DD MM YYYY">
				</div>
			</div>
			<div class="quote-button-column">
				<input class="btn btn-primary btn-md col-xs-12 segmentCTA newFadedBtn" data-segment-brand="Ship Sticks" data-segment-location="top banner" data-segment-type="Get Quote button" id="one_way_get_quote" name="one_way_get_quote" type="submit" value="Search"autocomplete="off">
			</div>
			<div class="row-spacer show-on-mobile"></div>
		</div>
	</form>

	<!-- ================== for round_trip_quick_quote_form======================= -->
	<form action="" class="form-show-hide active" id="round_trip_quick_quote_form" method="post" remote="" novalidate="novalidate">
		<input id="from_round_trip_city" name="from_round_trip_city" type="hidden" autocomplete="off" value="<?php echo $_SESSION['origin_city']; ?>">
		<input id="from_round_trip_state_code" name="from_round_trip_state_code" type="hidden" autocomplete="off" value="<?php echo $_SESSION['origin_state_code']; ?>">
		<input id="from_round_trip_postal_code" name="from_round_trip_postal_code" type="hidden" autocomplete="off" value="<?php echo $_SESSION['origin_postal_code']; ?>">
		<input id="from_round_trip_country_code" name="from_round_trip_country_code" type="hidden" autocomplete="off" value="<?php echo $_SESSION['origin_country_code']; ?>">
		<input id="from_round_trip_lat" name="from_round_trip_lat" type="hidden" autocomplete="off" value="<?php echo $_SESSION['origin_lat']; ?>">
		<input id="from_round_trip_long" name="from_round_trip_long" type="hidden" autocomplete="off" value="<?php echo $_SESSION['origin_long']; ?>">

		<input id="to_round_trip_city" name="to_round_trip_city" type="hidden" autocomplete="off" value="<?php echo $_SESSION['destination_city']; ?>">
		<input id="to_round_trip_state_code" name="to_round_trip_state_code" type="hidden" autocomplete="off" value="<?php echo $_SESSION['destination_state_code']; ?>">
		<input id="to_round_trip_postal_code" name="to_round_trip_postal_code" type="hidden" autocomplete="off" value="<?php echo $_SESSION['destination_postal_code']; ?>">
		<input id="to_round_trip_country_code" name="to_round_trip_country_code" type="hidden" autocomplete="off" value="<?php echo $_SESSION['destination_country_code']; ?>"
		>
		<input id="to_round_trip_lat" name="to_round_trip_lat" type="hidden" autocomplete="off" value="<?php echo $_SESSION['destination_lat']; ?>">
		<input id="to_round_trip_long" name="to_round_trip_long" type="hidden" autocomplete="off" value="<?php echo $_SESSION['destination_long']; ?>">

		<div class="row quote-heading">
			<div class="quote-heading-column">
				<div class="quote-input-wrapper">
					<h6>FROM</h6>
					<div class="typeahead__container">
						<div class="typeahead__field">
							<div class="la-pulse ac-loader">
								<div></div><div></div><div></div>
							</div>
							<div class="input-fields">
								<span class="typeahead__cancel-button"></span>
								<input autocomplete="off" class="form-control input-address input-lg data-hj-whitelist LoNotSensitive" data-ship-point-type="o" id="round_trip_from" name="round_trip_from" placeholder="From" spellcheck="false" type="text" value="<?php echo $_SESSION['shipper_address']; ?>">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="quote-heading-column">
				<div class="quote-input-wrapper">
					<h6>TO</h6>
					<div class="typeahead__container">
						<div class="typeahead__field">
							<div class="la-pulse ac-loader">
								<div></div><div></div><div></div>
							</div>
							<div class="input-fields">
								<span class="typeahead__cancel-button"></span>
								<input autocomplete="off" class="form-control input-address input-lg data-hj-whitelist LoNotSensitive" data-ship-point-type="d" id="round_trip_to" name="round_trip_to" placeholder="To" spellcheck="false" type="text" value="<?php echo $_SESSION['recipient_address']; ?>">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="quote-date">
				<div class="quote-input-wrapper date_wrapper">
					<h6>ARRIVAL</h6>
					<input type="text" class="input-fields form-control input-address input-lg" name="round_trip_arrival_date" value="<?php echo $_SESSION['arrival_date']; ?>" placeholder="DD MM YYYY" id="round_trip_arrival_date">
				</div>
			</div>
			<div class="quote-date">
				<div class="quote-input-wrapper date_wrapper">
					<h6>RETURN</h6>
					<input type="text" class="input-fields form-control input-address input-lg" name="round_trip_return_date" value="<?php echo $_SESSION['return_date']; ?>" placeholder="DD MM YYYY" id="round_trip_return_date">
				</div>
			</div>
			<div class="quote-button-column">
				<input class="btn btn-primary btn-md col-xs-12 segmentCTA newFadedBtn" data-segment-brand="Ship Sticks" data-segment-location="top banner" data-segment-type="Get Quote button" id="round_trip_get_quote" name="round_trip_get_quote" type="submit" value="Search" autocomplete="off">
			</div>
			<div class="row-spacer show-on-mobile"></div>
		</div>
	</form>

	<div id="map" class="map"></div>
</div>
<!-- ======================== for popup contant ==================================== -->
<div class="popup-container">
	<div class="popup-parent">
		<div class="popup-body"  align = "center">
			<div id="popup-header">
				<span class="button back">< Back</span>
				<div class="popup-heading"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png"></div>
				<!-- <samp class="popup-close">X</samp> -->
			</div>
			<div id="fedex-loading">
				<img width="80" src="<?php echo get_stylesheet_directory_uri(); ?>/img/loading-buffering.gif">
			</div>
			<div id="fedex-result"></div>
			<!-- <div id="fedex-round-trip-result"></div>
			<div id="fedex-options-show"></div> -->

			<!-- ======================== for fedex service plans show deatils ==================================== -->

			<?php //@include_once "fedex-service-plans.php"; ?>

			<!-- ============================================================ -->
		</div>
	</div>
<div>

<?php @include_once "fedex-custom-js.php"; ?>