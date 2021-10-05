<?php
	/* Template Name: Pricing */ 
	get_header();

	include(get_stylesheet_directory().'/fedex/fedex-custom-js.php');

	global $woocommerce;
?>
<a href="<?php echo site_url();?>"><button type="button" class="back-button-pricing">< Back</button></a>
<?php
	//$_SESSION['current_store_id']= $store_id;
	$response = $_SESSION['fedex_api_response'];
	/*echo '<pre>';
	print_r($response);
	echo '</pre>';*/
	$html =	'';
		$html_row = '';
		$fedex_logo ='<svg class="service-option__logo" height="693" viewBox="0 54.221 150 41.558" width="2500" xmlns="http://www.w3.org/2000/svg"><path d="m78.749 54.221v40.104h22.254v-8.955h-12.833v-7.904h12.834v-8.598h-12.834v-5.711h12.834v-8.937h-22.254zm22.254 14.647 11.317 12.728-11.317 12.73h11.591l5.5-6.24 5.564 6.24h11.99l-11.421-12.771 11.275-12.687h-11.528l-5.416 6.174-5.605-6.174zm44.17 16.753c-2.56 0-4.826 1.916-4.826 4.764 0 2.846 2.266 4.761 4.826 4.761 2.565 0 4.827-1.915 4.827-4.761 0-2.848-2.262-4.764-4.827-4.764zm0 .759c2.26 0 3.899 1.697 3.899 4.005 0 2.306-1.639 4.003-3.899 4.003-2.255 0-3.898-1.697-3.898-4.003 0-2.308 1.643-4.005 3.898-4.005zm-1.874 1.054v5.774h.863v-2.613h.822c.562 0 .819.166.969.654.181.64.148 1.42.38 1.96h.991c-.18-.207-.281-1.11-.36-1.623-.102-.795-.272-1.23-.757-1.306v-.022c.563-.072.99-.602.99-1.243 0-1.05-.563-1.581-1.792-1.581h-2.105zm.863.779h1.033c.82 0 1.054.341 1.054.8 0 .386-.233.822-1.054.822h-1.033z" fill="#adafb2"></path><path d="m63.656 88.219c-3.46 0-5.612-3.227-5.612-6.593 0-3.598 1.871-7.06 5.612-7.06 3.88 0 5.425 3.462 5.425 7.06-.001 3.413-1.638 6.593-5.425 6.593zm-33.362-10.631c.592-2.547 2.568-4.212 5.034-4.212 2.715 0 4.589 1.614 5.083 4.212zm39.06-23.364v16.41h-.103c-2.079-2.39-4.676-3.22-7.689-3.22-6.173 0-10.822 4.197-12.454 9.744-1.862-6.112-6.663-9.858-13.78-9.858-5.782 0-10.345 2.594-12.728 6.822v-5.254h-11.95v-5.705h13.04v-8.94h-23.69v40.099h10.65v-16.855h10.618a15.915 15.915 0 0 0 -.486 3.963c0 8.364 6.39 14.233 14.545 14.233 6.858 0 11.377-3.219 13.767-9.09h-9.127c-1.235 1.766-2.171 2.289-4.64 2.289-2.861 0-5.33-2.498-5.33-5.457h18.586c.807 6.643 5.982 12.373 13.085 12.373 3.063 0 5.869-1.508 7.584-4.053h.103v2.596h9.389v-40.098h-9.39" fill="#4d148c"></path></svg>';
			$service_option_name = 'service-option-name';
			if ($_SESSION['trip_type'] == 'One Way'){
				$service_option_name = 'one-way-service-option-name';
			}
			if(is_array($response -> RateReplyDetails)){

				foreach ($response -> RateReplyDetails as $rateReply){
					//echo '<tr>';
					if($rateReply->RatedShipmentDetails && is_array($rateReply->RatedShipmentDetails)){
						$amount = number_format($rateReply->RatedShipmentDetails[0]->ShipmentRateDetail->TotalNetCharge->Amount,2,".",",");
					}else{
						$amount = number_format($rateReply->RatedShipmentDetails->ShipmentRateDetail->TotalNetCharge->Amount,2,".",",");
					}
					if(array_key_exists('DeliveryTimestamp',$rateReply)){
						$deliveryDate= date('d M Y', strtotime($rateReply->DeliveryTimestamp));
					}else{
						$deliveryDate= date('d M Y', strtotime($rateReply->TransitTime));
					}
					$service_name = $rateReply -> ServiceDescription -> Names[1] -> Value;
					 $ServiceType_name = $rateReply -> ServiceDescription -> ServiceType;
				
						 if( $_SESSION['selected_service_type'] == $ServiceType_name){
						 $var = 'checked';
					       }
					       else {
					       	 $var = '';
					       }

					$serviceType = '<div class="'.$service_option_name.'" service-price="'.$amount.'" selected-service="'.$service_name.'" selected-service-type="'.$ServiceType_name.'"><input type="radio" '.$var .' name="select_service_fedex" class="select-fedex-service" >'.$fedex_logo .$service_name . ', '. $deliveryDate .'</div>';

					$service_amount = '<div class="service-option-amount">'.get_woocommerce_currency_symbol().$amount .'</div>';

					$html_row .= '<div class="service-row">' . $serviceType . $service_amount . '</div>';
				}

			}else{
				$rateReply = $response -> RateReplyDetails;
				if($rateReply->RatedShipmentDetails && is_array($rateReply->RatedShipmentDetails)){
					$amount = number_format($rateReply->RatedShipmentDetails[0]->ShipmentRateDetail->TotalNetCharge->Amount,2,".",",");
				}else{
					$amount = number_format($rateReply->RatedShipmentDetails->ShipmentRateDetail->TotalNetCharge->Amount,2,".",",");
				}
				if(array_key_exists('DeliveryTimestamp',$rateReply)){
					$deliveryDate= date('d M Y', strtotime($rateReply->DeliveryTimestamp));
				}else{
					$deliveryDate= date('d M Y', strtotime($rateReply->TransitTime));
				}
				
				$service_name = $rateReply -> ServiceDescription -> Names[1] -> Value;
				$ServiceType_name = $rateReply -> ServiceDescription -> ServiceType; 
				 $var = '';
						 if( $_SESSION['selected_service_type'] == $ServiceType_name){
						 $var = 'checked';
					       }
					       else {
					       	 $var = '';
					       }

				$serviceType = '<div class="service-option-name" service-price="'.$amount.'" selected-service="'.$service_name.'" selected-service-type="'.$ServiceType_name.'"><input type="radio" '.$var .'  name="select_service_fedex" class="select-fedex-service">'.$fedex_logo .$service_name . ', '. $deliveryDate .'</div>';
				
				$service_amount = '<div class="service-option-amount">'.get_woocommerce_currency_symbol().$amount .'</div>';

				$html_row .= '<div class="service-row">' . $serviceType . $service_amount . '</div>';

				if ($response -> HighestSeverity == 'WARNING') {
					$html_row = '<div class="service-row">' . $response -> Notifications -> Message . '</div>';
				}
			}
			//$html .= 'Rates for following service type(s).';
			$html .= '<div class="fedex-service-container pricing-container">';
			$html .= '<div class="fedex-service-top-row"><p>'.$_SESSION['shipper_address'].' -> '.$_SESSION['recipient_address'].'</p></div>';
			$html .=  $html_row;
			$html .=  '</div>';
?>
<div class="fedex-result">
	<?php echo $html; ?>
</div>
<div id="fedex-result"></div>
<div id="fedex-round-trip-result">
	<?php 
		$response_round = $_SESSION['fedex_round_trip_api_response'];

		$html =	'';
		$html_row = '';
		$fedex_logo ='<svg class="service-option__logo" height="693" viewBox="0 54.221 150 41.558" width="2500" xmlns="http://www.w3.org/2000/svg"><path d="m78.749 54.221v40.104h22.254v-8.955h-12.833v-7.904h12.834v-8.598h-12.834v-5.711h12.834v-8.937h-22.254zm22.254 14.647 11.317 12.728-11.317 12.73h11.591l5.5-6.24 5.564 6.24h11.99l-11.421-12.771 11.275-12.687h-11.528l-5.416 6.174-5.605-6.174zm44.17 16.753c-2.56 0-4.826 1.916-4.826 4.764 0 2.846 2.266 4.761 4.826 4.761 2.565 0 4.827-1.915 4.827-4.761 0-2.848-2.262-4.764-4.827-4.764zm0 .759c2.26 0 3.899 1.697 3.899 4.005 0 2.306-1.639 4.003-3.899 4.003-2.255 0-3.898-1.697-3.898-4.003 0-2.308 1.643-4.005 3.898-4.005zm-1.874 1.054v5.774h.863v-2.613h.822c.562 0 .819.166.969.654.181.64.148 1.42.38 1.96h.991c-.18-.207-.281-1.11-.36-1.623-.102-.795-.272-1.23-.757-1.306v-.022c.563-.072.99-.602.99-1.243 0-1.05-.563-1.581-1.792-1.581h-2.105zm.863.779h1.033c.82 0 1.054.341 1.054.8 0 .386-.233.822-1.054.822h-1.033z" fill="#adafb2"></path><path d="m63.656 88.219c-3.46 0-5.612-3.227-5.612-6.593 0-3.598 1.871-7.06 5.612-7.06 3.88 0 5.425 3.462 5.425 7.06-.001 3.413-1.638 6.593-5.425 6.593zm-33.362-10.631c.592-2.547 2.568-4.212 5.034-4.212 2.715 0 4.589 1.614 5.083 4.212zm39.06-23.364v16.41h-.103c-2.079-2.39-4.676-3.22-7.689-3.22-6.173 0-10.822 4.197-12.454 9.744-1.862-6.112-6.663-9.858-13.78-9.858-5.782 0-10.345 2.594-12.728 6.822v-5.254h-11.95v-5.705h13.04v-8.94h-23.69v40.099h10.65v-16.855h10.618a15.915 15.915 0 0 0 -.486 3.963c0 8.364 6.39 14.233 14.545 14.233 6.858 0 11.377-3.219 13.767-9.09h-9.127c-1.235 1.766-2.171 2.289-4.64 2.289-2.861 0-5.33-2.498-5.33-5.457h18.586c.807 6.643 5.982 12.373 13.085 12.373 3.063 0 5.869-1.508 7.584-4.053h.103v2.596h9.389v-40.098h-9.39" fill="#4d148c"></path></svg>';
			if(!empty($response_round)){
			if(is_array($response_round -> RateReplyDetails)){

				foreach ($response_round -> RateReplyDetails as $rateReply){
					//echo '<tr>';
					if($rateReply->RatedShipmentDetails && is_array($rateReply->RatedShipmentDetails)){
						$amount = number_format($rateReply->RatedShipmentDetails[0]->ShipmentRateDetail->TotalNetCharge->Amount,2,".",",");
					}else{
						$amount = number_format($rateReply->RatedShipmentDetails->ShipmentRateDetail->TotalNetCharge->Amount,2,".",",");
					}
					if(array_key_exists('DeliveryTimestamp',$rateReply)){
						$deliveryDate= date('d M Y', strtotime($rateReply->DeliveryTimestamp));
					}else{
						$deliveryDate= date('d M Y', strtotime($rateReply->TransitTime));
					}
					$service_name = $rateReply -> ServiceDescription -> Names[1] -> Value;
					$ServiceType_name = $rateReply -> ServiceDescription -> ServiceType;
					 $varround = '';
						 if($_SESSION['rount_trip_selected_service_type'] == $ServiceType_name){
						 $varround = 'checked';
					       }
					       else {
					       	 $varround = '';
					       }

					$serviceType = '<div class="rount-trip-service-option-name" service-price="'.$amount.'" selected-service="'.$service_name.'" selected-service-type="'.$ServiceType_name.'"><input type="radio"  '.$varround .' name="select_service" class="select-fedex-service" >'.$fedex_logo .$service_name . ', '. $deliveryDate .'</div>';

					$service_amount = '<div class="service-option-amount">'.get_woocommerce_currency_symbol().$amount .'</div>';

					$html_row .= '<div class="service-row rount-trip">' . $serviceType . $service_amount . '</div>';
				}

			}else{
				$rateReply = $response_round -> RateReplyDetails;
				if($rateReply->RatedShipmentDetails && is_array($rateReply->RatedShipmentDetails)){
					$amount = number_format($rateReply->RatedShipmentDetails[0]->ShipmentRateDetail->TotalNetCharge->Amount,2,".",",");
				}else{
					$amount = number_format($rateReply->RatedShipmentDetails->ShipmentRateDetail->TotalNetCharge->Amount,2,".",",");
				}
				if(array_key_exists('DeliveryTimestamp',$rateReply)){
					$deliveryDate= date('d M Y', strtotime($rateReply->DeliveryTimestamp));
				}else{
					$deliveryDate= date('d M Y', strtotime($rateReply->TransitTime));
				}

				$service_name = $rateReply -> ServiceDescription -> Names[1] -> Value;
				$ServiceType_name = $rateReply -> ServiceDescription -> ServiceType;
				 $varround = '';
						 if($_SESSION['rount_trip_selected_service_type'] == $ServiceType_name){
						 $varround = 'checked';
					       }
					       else {
					       	 $varround = '';
					       }

				$serviceType = '<div class="rount-trip-service-option-name" service-price="'.$amount.'" selected-service="'.$service_name.'" selected-service-type="'.$ServiceType_name.'"><input type="radio" '.$varround .' name="select_service" class="select-fedex-service">'.$fedex_logo .$service_name . ', '. $deliveryDate .'</div>';
				
				$service_amount = '<div class="service-option-amount">'.get_woocommerce_currency_symbol().$amount .'</div>';

				$html_row .= '<div class="service-row rount-trip">' . $serviceType . $service_amount . '</div>';

				if ($response_round -> HighestSeverity == 'WARNING') {
					$html_row = '<div class="service-row rount-trip">' . $response_round -> Notifications -> Message . '</div>';
				}
			}
			$html .= '<div class="rount-trip-fedex-service-container rount-pricing-container">';
			$html .= '<div class="fedex-service-top-row"><p>'.$_SESSION['recipient_address'].' -> '.$_SESSION['shipper_address'].'</p></div>';
			$html .=  $html_row;
			$html .=  '</div>';
		}
	?>
	<div class="fedex-round-trip-result ">
		<?php echo $html; ?>
	</div>
</div>
<div id="fedex-options-show"></div>
<?php include(get_stylesheet_directory().'/fedex/fedex-service-plans.php'); 

get_footer();
?>