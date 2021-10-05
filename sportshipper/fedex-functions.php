<?php
/*=================== fedex-common function start ==================================*/
/*==============================================================================*/

define('Newline',"<br />");

function printSuccess($client, $response) {
    printReply($client, $response);
}

function printReply($client, $response){
	$highestSeverity=$response->HighestSeverity;
	if($highestSeverity=="SUCCESS"){echo '<h2>The transaction was successful.</h2>';}
	if($highestSeverity=="WARNING"){echo '<h2>The transaction returned a warning.</h2>';}
	if($highestSeverity=="ERROR"){echo '<h2>The transaction returned an Error.</h2>';}
	if($highestSeverity=="FAILURE"){echo '<h2>The transaction returned a Failure.</h2>';}
	echo "\n";
	printNotifications($response -> Notifications);
	printRequestResponse($client, $response);
}

function printRequestResponse($client){
	echo '<h2>Request</h2>' . "\n";
	echo '<pre>' . htmlspecialchars($client->__getLastRequest()). '</pre>';  
	echo "\n";
   
	echo '<h2>Response</h2>'. "\n";
	echo '<pre>' . htmlspecialchars($client->__getLastResponse()). '</pre>';
	echo "\n";
}

// * Print SOAP Fault
function printFault($exception, $client) {
   echo '<h2>Fault</h2>' . "<br>\n";                        
   echo "<b>Code:</b>{$exception->faultcode}<br>\n";
   echo "<b>String:</b>{$exception->faultstring}<br>\n";
   writeToLog($client);
   writeToLog($exception);
    
  echo '<h2>Request</h2>' . "\n";
	echo '<pre>' . htmlspecialchars($client->__getLastRequest()). '</pre>';  
	echo "\n";
}

// * SOAP request/response logging to a file
function writeToLog($client){  

	/**
	* __DIR__ refers to the directory path of the library file.
	* This location is not relative based on Include/Require.
	*/
	if (!$logfile = fopen(__DIR__.'/fedextransactions.log', "a"))
	{
   		error_func("Cannot open " . __DIR__.'/fedextransactions.log' . " file.\n", 0);
   		exit(1);
	}

 	fwrite($logfile, sprintf("\r%s:- %s",date("D M j G:i:s T Y"), $client->__getLastRequest(). "\r\n" . $client->__getLastResponse()."\r\n\r\n")); 
}

// * This section provides a convenient place to setup many commonly used variables
// * needed for the php sample code to function.
function getProperty($var){

	if($var == 'key') Return 'h4COCh1313uey2JT'; 
	if($var == 'password') Return 'YKxjXUpzkbvIulD4KyVkQb1hY'; 
	if($var == 'parentkey') Return 'Hb1TfWMygUh7bbHP'; 
	if($var == 'parentpassword') Return 'u0mnYl8d6FRQK5Ot8SyxMXVqq'; 
	if($var == 'shipaccount') Return '150067600';
	if($var == 'billaccount') Return '150067600';
	if($var == 'dutyaccount') Return '150067600'; 
	if($var == 'freightaccount') Return '150067600';  
	if($var == 'trackaccount') Return '150067600'; 
	if($var == 'dutiesaccount') Return '150067600';
	if($var == 'importeraccount') Return '150067600';
	if($var == 'brokeraccount') Return '150067600';
	if($var == 'distributionaccount') Return '150067600';
	if($var == 'locationid') Return 'PLBA';
	if($var == 'printlabels') Return true;
	if($var == 'printdocuments') Return true;
	if($var == 'packagecount') Return '4';
	if($var == 'validateaccount') Return 'XXX';
	if($var == 'meter') Return '4004310';

	if($var == 'shiptimestamp') Return mktime(10, 0, 0, date("m"), date("d")+1, date("Y"));

	if($var == 'spodshipdate') Return '2018-05-08';
	if($var == 'serviceshipdate') Return '2018-05-07';
	if($var == 'shipdate') Return '2018-05-08';

	if($var == 'readydate') Return '2014-12-15T08:44:07';
	//if($var == 'closedate') Return date("Y-m-d");
	if($var == 'closedate') Return '2016-04-18';
	if($var == 'pickupdate') Return date("Y-m-d", mktime(8, 0, 0, date("m")  , date("d")+1, date("Y")));
	if($var == 'pickuptimestamp') Return mktime(8, 0, 0, date("m")  , date("d")+1, date("Y"));
	if($var == 'pickuplocationid') Return 'SQLA';
	if($var == 'pickupconfirmationnumber') Return '1';

	if($var == 'dispatchdate') Return date("Y-m-d", mktime(8, 0, 0, date("m")  , date("d")+1, date("Y")));
	if($var == 'dispatchlocationid') Return 'NQAA';
	if($var == 'dispatchconfirmationnumber') Return '4';		
	
	if($var == 'tag_readytimestamp') Return mktime(10, 0, 0, date("m"), date("d")+1, date("Y"));
	if($var == 'tag_latesttimestamp') Return mktime(20, 0, 0, date("m"), date("d")+1, date("Y"));	

	if($var == 'expirationdate') Return date("Y-m-d", mktime(8, 0, 0, date("m"), date("d")+15, date("Y")));
	if($var == 'begindate') Return '2014-10-16';
	if($var == 'enddate') Return '2014-10-16';	

	if($var == 'trackingnumber') Return 'XXX';

	if($var == 'hubid') Return '5531';
	
	if($var == 'jobid') Return 'XXX';

	if($var == 'searchlocationphonenumber') Return '5555555555';
	if($var == 'customerreference') Return '39589';

	if($var == 'shipper') Return array(
		'Contact' => array(
			'PersonName' => 'Sender Name',
			'CompanyName' => 'Sender Company Name',
			'PhoneNumber' => '1234567890'
		),
		'Address' => array(
			'StreetLines' => array('Addres \r  s Line 1'),
			'City' => 'Collierville',
			'StateOrProvinceCode' => 'TN',
			'PostalCode' => '38017',
			'CountryCode' => 'US',
			'Residential' => 1
		)
	);
	if($var == 'recipient') Return array(
		'Contact' => array(
			'PersonName' => 'Recipient Name',
			'CompanyName' => 'Recipient Company Name',
			'PhoneNumber' => '1234567890'
		),
		'Address' => array(
			'StreetLines' => array('Address Line 1'),
			'City' => 'Herndon',
			'StateOrProvinceCode' => 'VA',
			'PostalCode' => '20171',
			'CountryCode' => 'US',
			'Residential' => 1
		)
	);	

	if($var == 'address1') Return array(
		'StreetLines' => array('10 Fed Ex Pkwy'),
		'City' => 'Memphis',
		'StateOrProvinceCode' => 'TN',
		'PostalCode' => '38115',
		'CountryCode' => 'US'
    );
	if($var == 'address2') Return array(
		'StreetLines' => array('13450 Farmcrest Ct'),
		'City' => 'Herndon',
		'StateOrProvinceCode' => 'VA',
		'PostalCode' => '20171',
		'CountryCode' => 'US'
	);					  
	if($var == 'searchlocationsaddress') Return array(
		'StreetLines'=> array('Address Line 1'),
		'City'=>'Collierville',
		'StateOrProvinceCode'=>'TN',
		'PostalCode'=>'38017',
		'CountryCode'=>'US'
	);
									  
	if($var == 'shippingchargespayment') Return array(
		'PaymentType' => 'SENDER',
		'Payor' => array(
			'ResponsibleParty' => array(
				'AccountNumber' => getProperty('billaccount'),
				'Contact' => null,
				'Address' => array('CountryCode' => 'US')
			)
		)
	);	
	if($var == 'freightbilling') Return array(
		'Contact'=>array(
			'ContactId' => 'freight1',
			'PersonName' => 'Big Shipper',
			'Title' => 'Manager',
			'CompanyName' => 'Freight Shipper Co',
			'PhoneNumber' => '1234567890'
		),
		'Address'=>array(
			'StreetLines'=>array(
				'1202 Chalet Ln', 
				'Do Not Delete - Test Account'
			),
			'City' =>'Harrison',
			'StateOrProvinceCode' => 'AR',
			'PostalCode' => '72601-6353',
			'CountryCode' => 'US'
			)
	);
}

function setEndpoint($var){
	if($var == 'changeEndpoint') Return true;
	if($var == 'endpoint') Return 'https://wsbeta.fedex.com:443/web-services/dgds';
}

function printNotifications($notes){
	foreach($notes as $noteKey => $note){
		if(is_string($note)){    
			echo $noteKey . ': ' . $note . Newline;
		}
		else{
			printNotifications($note);
		}
	}
	echo Newline;
}

function printError($client, $response){
	printReply($client, $response);
}

function trackDetails($details, $spacer){
	foreach($details as $key => $value){
		if(is_array($value) || is_object($value)){
	    	$newSpacer = $spacer. '&nbsp;&nbsp;&nbsp;&nbsp;';
			echo '<tr><td>'. $spacer . $key.'</td><td>&nbsp;</td></tr>';
			trackDetails($value, $newSpacer);
		}elseif(empty($value)){
			echo '<tr><td>'.$spacer. $key .'</td><td>'.$value.'</td></tr>';
		}else{
			echo '<tr><td>'.$spacer. $key .'</td><td>'.$value.'</td></tr>';
		}
	}
}

/*=================== fedex-common function end ==================================*/
/*==============================================================================*/

/*============== ajax function for get round trip quote for fedex ==============*/
/*==============================================================================*/
add_action('wp_ajax_get_round_trip_quote', 'get_round_trip_quote');
add_action('wp_ajax_nopriv_get_round_trip_quote', 'get_round_trip_quote');
function get_round_trip_quote(){
	
	if ( !session_id() ){
		session_start();
	}
	$_SESSION['plan_back_show'] = '';
	$_SESSION['fedex_round_trip_api_response'] = '';
	$_SESSION['fedex_api_response'] = '';
	$_SESSION['selected_service_type'] = '';

	$_SESSION['trip_type'] = 'Round Trip';

	$arrival_date = date('Y-m-d', strtotime(sanitize_text_field($_REQUEST['arrival_date'])));
	$return_date = date('Y-m-d', strtotime(sanitize_text_field($_REQUEST['return_date'])));

	$_SESSION['arrival_date'] = sanitize_text_field($_REQUEST['arrival_date']);
	$_SESSION['return_date'] = sanitize_text_field($_REQUEST['return_date']);

	$_SESSION['shipper_address'] = sanitize_text_field($_REQUEST['shipper_address']);
	$_SESSION['origin_city'] = sanitize_text_field($_REQUEST['origin_city']);
	$_SESSION['origin_lat'] = sanitize_text_field($_REQUEST['origin_lat']);
	$_SESSION['origin_long'] = sanitize_text_field($_REQUEST['origin_long']);
	$_SESSION['origin_state_code'] = sanitize_text_field($_REQUEST['origin_state_code']);
	$_SESSION['origin_postal_code'] = sanitize_text_field($_REQUEST['origin_postal_code']);
	$_SESSION['origin_country_code'] = sanitize_text_field($_REQUEST['origin_country_code']);

	$_SESSION['recipient_address'] = sanitize_text_field($_REQUEST['recipient_address']);
	$_SESSION['destination_city'] = sanitize_text_field($_REQUEST['destination_city']);
	$_SESSION['destination_lat'] = sanitize_text_field($_REQUEST['destination_lat']);
	$_SESSION['destination_long'] = sanitize_text_field($_REQUEST['destination_long']);
	$_SESSION['destination_state_code'] = sanitize_text_field($_REQUEST['destination_state_code']);
	$_SESSION['destination_postal_code'] = sanitize_text_field($_REQUEST['destination_postal_code']);
	$_SESSION['destination_country_code'] = sanitize_text_field($_REQUEST['destination_country_code']);

	function add_Package_Bags_List(){
		$selected_bags = $_REQUEST['selected_bags'];
		
		$_SESSION['fedex_selected_bags'] = $selected_bags;
		$product_id = 555;
		$weight_unit = get_option('woocommerce_weight_unit');
		$dimensions_unit = get_option('woocommerce_dimension_unit');

		$packageLineBags = array();
		$sequence_number = 1;

		foreach ($selected_bags as $key => $value) {
			for ($i=0; $i < $value; $i++) {
				$key_option = explode('-',$key);

				$mata_data = get_post_meta($product_id, $key_option['0'], true);
				$all_bags =	array(
					'SequenceNumber' => $sequence_number,
					'GroupPackageCount' => 1,
					'Weight' => array(
						'Value' => $mata_data[$key_option[1]]['weight'],
						'Units' => 'LB'
					),
					/*'Dimensions' => array(
						'Length' => $mata_data[$key_option[1]]['length'],
						'Width' => $mata_data[$key_option[1]]['width'],
						'Height' => $mata_data[$key_option[1]]['height'],
						'Units' => 'IN'
					)*/
				);
				$sequence_number++;
				$packageLineBags[] = $all_bags;
			}
		}
		$_SESSION['selected_package_bags_list'] = $packageLineBags;
		return $packageLineBags;
	}

	$path_to_wsdl = get_stylesheet_directory_uri().'/fedex/FedExWebServicesStandardWSDL/RateService_v28.wsdl';

	ini_set("soap.wsdl_cache_enabled", "0");
	$client = new SoapClient($path_to_wsdl, array('trace' => 1)); // Refer to http://us3.php.net/manual/en/ref.soap.php for more information

	$request['WebAuthenticationDetail'] = array(
		'ParentCredential' => array(
			'Key' => getProperty('parentkey'),
			'Password' => getProperty('parentpassword')
		),
		'UserCredential' => array(
			'Key' => getProperty('key'), 
			'Password' => getProperty('password')
		)
	); 
	$request['ClientDetail'] = array(
		'AccountNumber' => getProperty('shipaccount'),
		'MeterNumber' => getProperty('meter')
	);
	$request['TransactionDetail'] = array('CustomerTransactionId' => ' *** Rate Available Services Request using PHP ***');
	$request['Version'] = array(
		'ServiceId' => 'crs', 
		'Major' => '28', 
		'Intermediate' => '0', 
		'Minor' => '0'
	);
	$request['Origin'] = array(
		'PostalCode' => sanitize_text_field($_REQUEST['origin_postal_code']), // Origin details
		'CountryCode' => sanitize_text_field($_REQUEST['origin_country_code'])
	);
	$request['Destination'] = array(
		'PostalCode' => sanitize_text_field($_REQUEST['destination_postal_code']), // Destination details
		'CountryCode' => sanitize_text_field($_REQUEST['destination_country_code'])
	);
	$request['ShipDate'] = $return_date;
	$request['CarrierCodes'] = 'FDXE';
	$request['ReturnTransitAndCommit'] = true;
	$request['RequestedShipment']['DropoffType'] = 'REGULAR_PICKUP'; // valid values REGULAR_PICKUP, REQUEST_COURIER, ...
	//$request['RequestedShipment']['ShipTimestamp'] = date('c');
	$request['RequestedShipment']['ShipTimestamp'] = date('Y-m-d\TH:i:s', strtotime($arrival_date));
	// Service Type and Packaging Type are not passed in the request
	$request['RequestedShipment']['Shipper'] = array(
		'Address'=> array(
			'StreetLines' => sanitize_text_field($_REQUEST['shipper_address']),
			'City' => sanitize_text_field($_REQUEST['origin_city']),
			'StateOrProvinceCode' => sanitize_text_field($_REQUEST['origin_state_code']),
			'PostalCode' => sanitize_text_field($_REQUEST['origin_postal_code']),
			'CountryCode' => sanitize_text_field($_REQUEST['origin_country_code']),
		)
	);
	$request['RequestedShipment']['Recipient'] = array(
		'Address'=> array(
			'StreetLines' => sanitize_text_field($_REQUEST['recipient_address']),
			'City' => sanitize_text_field($_REQUEST['destination_city']),
			'StateOrProvinceCode' => sanitize_text_field($_REQUEST['destination_state_code']),
			'PostalCode' => sanitize_text_field($_REQUEST['destination_postal_code']),
			'CountryCode' => sanitize_text_field($_REQUEST['destination_country_code']),
		)
	);
	$request['RequestedShipment']['ShippingChargesPayment'] = array(
		'PaymentType' => 'SENDER',
		'Payor' => array(
			'ResponsibleParty' => array(
				'AccountNumber' => getProperty('billaccount'),
				'Contact' => null,
				'Address' => array(
					'CountryCode' => 'US'
				)
			)
		)
	);

	$request['RequestedShipment']['PackageCount'] = array_sum($_REQUEST['selected_bags']);
	//$request['RequestedShipment']['PackageCount'] = 2;
	$request['RequestedShipment']['RequestedPackageLineItems'] = add_Package_Bags_List();

	try {
		if(setEndpoint('changeEndpoint')){
			$newLocation = $client->__setLocation(setEndpoint('endpoint'));
		}

		$response = $client ->getRates($request);

		if ($response -> HighestSeverity != 'FAILURE' && $response -> HighestSeverity != 'ERROR'){
			$html =	'';
			$html_row = '';
			$fedex_logo ='<svg class="service-option__logo" height="693" viewBox="0 54.221 150 41.558" width="2500" xmlns="http://www.w3.org/2000/svg"><path d="m78.749 54.221v40.104h22.254v-8.955h-12.833v-7.904h12.834v-8.598h-12.834v-5.711h12.834v-8.937h-22.254zm22.254 14.647 11.317 12.728-11.317 12.73h11.591l5.5-6.24 5.564 6.24h11.99l-11.421-12.771 11.275-12.687h-11.528l-5.416 6.174-5.605-6.174zm44.17 16.753c-2.56 0-4.826 1.916-4.826 4.764 0 2.846 2.266 4.761 4.826 4.761 2.565 0 4.827-1.915 4.827-4.761 0-2.848-2.262-4.764-4.827-4.764zm0 .759c2.26 0 3.899 1.697 3.899 4.005 0 2.306-1.639 4.003-3.899 4.003-2.255 0-3.898-1.697-3.898-4.003 0-2.308 1.643-4.005 3.898-4.005zm-1.874 1.054v5.774h.863v-2.613h.822c.562 0 .819.166.969.654.181.64.148 1.42.38 1.96h.991c-.18-.207-.281-1.11-.36-1.623-.102-.795-.272-1.23-.757-1.306v-.022c.563-.072.99-.602.99-1.243 0-1.05-.563-1.581-1.792-1.581h-2.105zm.863.779h1.033c.82 0 1.054.341 1.054.8 0 .386-.233.822-1.054.822h-1.033z" fill="#adafb2"></path><path d="m63.656 88.219c-3.46 0-5.612-3.227-5.612-6.593 0-3.598 1.871-7.06 5.612-7.06 3.88 0 5.425 3.462 5.425 7.06-.001 3.413-1.638 6.593-5.425 6.593zm-33.362-10.631c.592-2.547 2.568-4.212 5.034-4.212 2.715 0 4.589 1.614 5.083 4.212zm39.06-23.364v16.41h-.103c-2.079-2.39-4.676-3.22-7.689-3.22-6.173 0-10.822 4.197-12.454 9.744-1.862-6.112-6.663-9.858-13.78-9.858-5.782 0-10.345 2.594-12.728 6.822v-5.254h-11.95v-5.705h13.04v-8.94h-23.69v40.099h10.65v-16.855h10.618a15.915 15.915 0 0 0 -.486 3.963c0 8.364 6.39 14.233 14.545 14.233 6.858 0 11.377-3.219 13.767-9.09h-9.127c-1.235 1.766-2.171 2.289-4.64 2.289-2.861 0-5.33-2.498-5.33-5.457h18.586c.807 6.643 5.982 12.373 13.085 12.373 3.063 0 5.869-1.508 7.584-4.053h.103v2.596h9.389v-40.098h-9.39" fill="#4d148c"></path></svg>';
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

					$serviceType = '<div class="service-option-name" service-price="'.$amount.'" selected-service="'.$service_name.'" selected-service-type="'.$ServiceType_name.'"><input type="radio" name="select_service" class="select-fedex-service" >'.$fedex_logo .$service_name . ', '. $deliveryDate .'</div>';

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

				$serviceType = '<div class="service-option-name" service-price="'.$amount.'" selected-service="'.$service_name.'" selected-service-type="'.$ServiceType_name.'"><input type="radio" name="select_service" class="select-fedex-service">'.$fedex_logo .$service_name . ', '. $deliveryDate .'</div>';
				
				$service_amount = '<div class="service-option-amount">'.get_woocommerce_currency_symbol().$amount .'</div>';

				$html_row .= '<div class="service-row">' . $serviceType . $service_amount . '</div>';

				if ($response -> HighestSeverity == 'WARNING') {
					$html_row = '<div class="service-row">' . $response -> Notifications -> Message . '</div>';
				}
			}
			//$html .= 'Rates for following service type(s).';
			$html .= '<div class="fedex-service-container">';
			$html .= '<div class="fedex-service-top-row"><p>'.$_SESSION['origin_city'].' -> '.$_SESSION['destination_city'].'</p></div>';
			$html .=  $html_row;
			$html .=  '</div>';

			$_SESSION['fedex_api_response']= $response;
			$error = '';
		}else{

			$highestSeverity=$response->HighestSeverity;
			if($highestSeverity=="SUCCESS"){$html = 'The transaction was successful.';}
			if($highestSeverity=="WARNING"){$html = 'The transaction returned a warning.';}
			if($highestSeverity=="ERROR"){$html = 'The transaction returned an Error.';}
			if($highestSeverity=="FAILURE"){$html = 'The transaction returned a Failure. please try again later.';}
			//printError($client, $response);
			$error = 'error';
		}

		writeToLog($client);    // Write to log file   
	} catch (SoapFault $exception) {
		$html = printFault($exception, $client);
	}
	echo json_encode(array('status'=>'1','html' => $html,'error' => $error));
	exit;
}

/*============== ajax function for get one way quote for fedex ==============*/
/*===========================================================================*/
add_action('wp_ajax_get_one_way_quote', 'get_one_way_quote');
add_action('wp_ajax_nopriv_get_one_way_quote', 'get_one_way_quote');
function get_one_way_quote(){

	if ( !session_id() ){
		session_start();
	}

	$_SESSION['plan_back_show'] = '';
	$_SESSION['fedex_round_trip_api_response'] = '';
	$_SESSION['fedex_api_response'] = '';
	$_SESSION['selected_service_type'] = '';
	$_SESSION['trip_type'] = 'One Way';

	$arrival_date = date('Y-m-d', strtotime(sanitize_text_field($_REQUEST['arrival_date'])));

	$_SESSION['arrival_date'] = sanitize_text_field($_REQUEST['arrival_date']);

	$_SESSION['shipper_address'] = sanitize_text_field($_REQUEST['shipper_address']);
	$_SESSION['origin_city'] = sanitize_text_field($_REQUEST['origin_city']);
	$_SESSION['origin_lat'] = sanitize_text_field($_REQUEST['origin_lat']);
	$_SESSION['origin_lng'] = sanitize_text_field($_REQUEST['origin_lng']);
	$_SESSION['origin_state_code'] = sanitize_text_field($_REQUEST['origin_state_code']);
	$_SESSION['origin_postal_code'] = sanitize_text_field($_REQUEST['origin_postal_code']);
	$_SESSION['origin_country_code'] = sanitize_text_field($_REQUEST['origin_country_code']);

	$_SESSION['recipient_address'] = sanitize_text_field($_REQUEST['recipient_address']);
	$_SESSION['destination_city'] = sanitize_text_field($_REQUEST['destination_city']);
	$_SESSION['destination_lat'] = sanitize_text_field($_REQUEST['destination_lat']);
	$_SESSION['destination_lng'] = sanitize_text_field($_REQUEST['destination_lng']);
	$_SESSION['destination_state_code'] = sanitize_text_field($_REQUEST['destination_state_code']);
	$_SESSION['destination_postal_code'] = sanitize_text_field($_REQUEST['destination_postal_code']);
	$_SESSION['destination_country_code'] = sanitize_text_field($_REQUEST['destination_country_code']);

	function add_Package_Bags_List(){
		$selected_bags = $_REQUEST['selected_bags'];
		
		$_SESSION['fedex_selected_bags'] = $selected_bags;
		$product_id = 555;
		$weight_unit = get_option('woocommerce_weight_unit');
		$dimensions_unit = get_option('woocommerce_dimension_unit');

		$packageLineBags = array();
		$sequence_number = 1;

		foreach ($selected_bags as $key => $value) {
			for ($i=0; $i < $value; $i++) {
				$key_option = explode('-',$key);

				$mata_data = get_post_meta($product_id, $key_option['0'], true);
				$all_bags =	array(
					'SequenceNumber' => $sequence_number,
					'GroupPackageCount' => 1,
					'Weight' => array(
						'Value' => $mata_data[$key_option[1]]['weight'],
						'Units' => 'LB'
					),
					/*'Dimensions' => array(
						'Length' => $mata_data[$key_option[1]]['length'],
						'Width' => $mata_data[$key_option[1]]['width'],
						'Height' => $mata_data[$key_option[1]]['height'],
						'Units' => 'IN'
					)*/
				);
				$sequence_number++;
				$packageLineBags[] = $all_bags;
			}
		}
		$_SESSION['selected_package_bags_list'] = $packageLineBags;
		return $packageLineBags;
	}

	$path_to_wsdl = get_stylesheet_directory_uri().'/fedex/FedExWebServicesStandardWSDL/RateService_v28.wsdl';

	ini_set("soap.wsdl_cache_enabled", "0");
	$client = new SoapClient($path_to_wsdl, array('trace' => 1)); // Refer to http://us3.php.net/manual/en/ref.soap.php for more information

	$request['WebAuthenticationDetail'] = array(
		'ParentCredential' => array(
			'Key' => getProperty('parentkey'),
			'Password' => getProperty('parentpassword')
		),
		'UserCredential' => array(
			'Key' => getProperty('key'), 
			'Password' => getProperty('password')
		)
	); 
	$request['ClientDetail'] = array(
		'AccountNumber' => getProperty('shipaccount'),
		'MeterNumber' => getProperty('meter')
	);
	$request['TransactionDetail'] = array('CustomerTransactionId' => ' *** Rate Available Services Request using PHP ***');
	$request['Version'] = array(
		'ServiceId' => 'crs', 
		'Major' => '28', 
		'Intermediate' => '0', 
		'Minor' => '0'
	);
	$request['Origin'] = array(
		'PostalCode' => sanitize_text_field($_REQUEST['origin_postal_code']), // Origin details
		'CountryCode' => sanitize_text_field($_REQUEST['origin_country_code'])
	);
	$request['Destination'] = array(
		'PostalCode' => sanitize_text_field($_REQUEST['destination_postal_code']), // Destination details
		'CountryCode' => sanitize_text_field($_REQUEST['destination_country_code'])
	);
	$request['ShipDate'] = $return_date;
	$request['CarrierCodes'] = 'FDXE';
	$request['ReturnTransitAndCommit'] = true;
	$request['RequestedShipment']['DropoffType'] = 'REGULAR_PICKUP'; // valid values REGULAR_PICKUP, REQUEST_COURIER, ...
	//$request['RequestedShipment']['ShipTimestamp'] = date('c');
	$request['RequestedShipment']['ShipTimestamp'] = date('Y-m-d\TH:i:s', strtotime($arrival_date));
	// Service Type and Packaging Type are not passed in the request
	$request['RequestedShipment']['Shipper'] = array(
		'Address'=> array(
			'StreetLines' => sanitize_text_field($_REQUEST['shipper_address']),
			'City' => sanitize_text_field($_REQUEST['origin_city']),
			'StateOrProvinceCode' => sanitize_text_field($_REQUEST['origin_state_code']),
			'PostalCode' => sanitize_text_field($_REQUEST['origin_postal_code']),
			'CountryCode' => sanitize_text_field($_REQUEST['origin_country_code']),
		)
	);
	$request['RequestedShipment']['Recipient'] = array(
		'Address'=> array(
			'StreetLines' => sanitize_text_field($_REQUEST['recipient_address']),
			'City' => sanitize_text_field($_REQUEST['destination_city']),
			'StateOrProvinceCode' => sanitize_text_field($_REQUEST['destination_state_code']),
			'PostalCode' => sanitize_text_field($_REQUEST['destination_postal_code']),
			'CountryCode' => sanitize_text_field($_REQUEST['destination_country_code']),
		)
	);
	$request['RequestedShipment']['ShippingChargesPayment'] = array(
		'PaymentType' => 'SENDER',
		'Payor' => array(
			'ResponsibleParty' => array(
				'AccountNumber' => getProperty('billaccount'),
				'Contact' => null,
				'Address' => array(
					'CountryCode' => 'US'
				)
			)
		)
	);

	$request['RequestedShipment']['PackageCount'] = array_sum($_REQUEST['selected_bags']);
	//$request['RequestedShipment']['PackageCount'] = 2;
	$request['RequestedShipment']['RequestedPackageLineItems'] = add_Package_Bags_List();

	try {
		if(setEndpoint('changeEndpoint')){
			$newLocation = $client->__setLocation(setEndpoint('endpoint'));
		}

		$response = $client ->getRates($request);
		
		if ($response -> HighestSeverity != 'FAILURE' && $response -> HighestSeverity != 'ERROR'){
			$html =	'';
			$html_row = '';
			$fedex_logo ='<svg class="service-option__logo" height="693" viewBox="0 54.221 150 41.558" width="2500" xmlns="http://www.w3.org/2000/svg"><path d="m78.749 54.221v40.104h22.254v-8.955h-12.833v-7.904h12.834v-8.598h-12.834v-5.711h12.834v-8.937h-22.254zm22.254 14.647 11.317 12.728-11.317 12.73h11.591l5.5-6.24 5.564 6.24h11.99l-11.421-12.771 11.275-12.687h-11.528l-5.416 6.174-5.605-6.174zm44.17 16.753c-2.56 0-4.826 1.916-4.826 4.764 0 2.846 2.266 4.761 4.826 4.761 2.565 0 4.827-1.915 4.827-4.761 0-2.848-2.262-4.764-4.827-4.764zm0 .759c2.26 0 3.899 1.697 3.899 4.005 0 2.306-1.639 4.003-3.899 4.003-2.255 0-3.898-1.697-3.898-4.003 0-2.308 1.643-4.005 3.898-4.005zm-1.874 1.054v5.774h.863v-2.613h.822c.562 0 .819.166.969.654.181.64.148 1.42.38 1.96h.991c-.18-.207-.281-1.11-.36-1.623-.102-.795-.272-1.23-.757-1.306v-.022c.563-.072.99-.602.99-1.243 0-1.05-.563-1.581-1.792-1.581h-2.105zm.863.779h1.033c.82 0 1.054.341 1.054.8 0 .386-.233.822-1.054.822h-1.033z" fill="#adafb2"></path><path d="m63.656 88.219c-3.46 0-5.612-3.227-5.612-6.593 0-3.598 1.871-7.06 5.612-7.06 3.88 0 5.425 3.462 5.425 7.06-.001 3.413-1.638 6.593-5.425 6.593zm-33.362-10.631c.592-2.547 2.568-4.212 5.034-4.212 2.715 0 4.589 1.614 5.083 4.212zm39.06-23.364v16.41h-.103c-2.079-2.39-4.676-3.22-7.689-3.22-6.173 0-10.822 4.197-12.454 9.744-1.862-6.112-6.663-9.858-13.78-9.858-5.782 0-10.345 2.594-12.728 6.822v-5.254h-11.95v-5.705h13.04v-8.94h-23.69v40.099h10.65v-16.855h10.618a15.915 15.915 0 0 0 -.486 3.963c0 8.364 6.39 14.233 14.545 14.233 6.858 0 11.377-3.219 13.767-9.09h-9.127c-1.235 1.766-2.171 2.289-4.64 2.289-2.861 0-5.33-2.498-5.33-5.457h18.586c.807 6.643 5.982 12.373 13.085 12.373 3.063 0 5.869-1.508 7.584-4.053h.103v2.596h9.389v-40.098h-9.39" fill="#4d148c"></path></svg>';
			if(is_array($response -> RateReplyDetails)){
				foreach ($response -> RateReplyDetails as $rateReply){

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

					$serviceType = '<div class="one-way-service-option-name" service-price="'.$amount.'" selected-service="'.$service_name.'" selected-service-type="'.$ServiceType_name.'"><input type="radio" name="select_service" class="select-fedex-service">'.$fedex_logo .$service_name . ', '. $deliveryDate .'</div>';

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

				$serviceType = '<div class="one-way-service-option-name" service-price="'.$amount.'" selected-service="'.$service_name.'" selected-service-type="'.$ServiceType_name.'"><input type="radio" name="select_service" class="select-fedex-service">'.$fedex_logo .$service_name . ', '. $deliveryDate .'</div>';
				
				$service_amount = '<div class="service-option-amount">'.get_woocommerce_currency_symbol().$amount .'</div>';

				$html_row .= '<div class="service-row">' . $serviceType . $service_amount . '</div>';

				if ($response -> HighestSeverity == 'WARNING') {
					$html_row = '<div class="service-row">' . $response -> Notifications -> Message . '</div>';
				}
			}
			//$html .= 'Rates for following service type(s).';
			$html .= '<div class="fedex-service-container">';
			$html .= '<div class="fedex-service-top-row"><p>'.$_SESSION['origin_city'].' -> '.$_SESSION['destination_city'].'</p></div>';
			$html .=  $html_row;
			$html .=  '</div>';
			$error = '';
			$_SESSION['fedex_api_response']= $response;
		}else{

			$highestSeverity=$response->HighestSeverity;
			if($highestSeverity=="SUCCESS"){$html = 'The transaction was successful.';}
			if($highestSeverity=="WARNING"){$html = 'The transaction returned a warning.';}
			if($highestSeverity=="ERROR"){$html = 'The transaction returned an Error.';}
			if($highestSeverity=="FAILURE"){$html = 'The transaction returned a Failure. please try again later.';}
			//printError($client, $response);
			$error = 'error';
		}

		writeToLog($client);    // Write to log file   
	} catch (SoapFault $exception) {
		$html = printFault($exception, $client);
	}
	echo json_encode(array('status'=>'1','html' => $html,'error' => $error));
	exit;
}

/*======================= for save the selected fedex service values =========================*/
/*===========================================================================================*/
add_action('wp_ajax_select_fedex_service', 'select_fedex_service_function');
add_action('wp_ajax_nopriv_select_fedex_service', 'select_fedex_service_function');
function select_fedex_service_function(){
	if ( !session_id() ){
		session_start();
	}
	$selected_service = $_REQUEST['selected_service'];
	$selected_service_price = $_REQUEST['selected_service_price'];
	$selected_service_type = $_REQUEST['selected_service_type'];

	$_SESSION['selected_service'] = $selected_service;
	$_SESSION['selected_service_price'] = $selected_service_price;
	$_SESSION['selected_service_type'] = $selected_service_type;

	if ($_SESSION['selected_service']) {
		$selected = true;
	}

	function add_Package_Bags_List(){
		$selected_bags = $_SESSION['fedex_selected_bags'];
		
		$_SESSION['fedex_selected_bags'] = $selected_bags;
		$product_id = 555;
		$weight_unit = get_option('woocommerce_weight_unit');
		$dimensions_unit = get_option('woocommerce_dimension_unit');

		$packageLineBags = array();
		$sequence_number = 1;

		foreach ($selected_bags as $key => $value) {
			for ($i=0; $i < $value; $i++) {
				$key_option = explode('-',$key);

				$mata_data = get_post_meta($product_id, $key_option['0'], true);
				$all_bags =	array(
					'SequenceNumber' => $sequence_number,
					'GroupPackageCount' => 1,
					'Weight' => array(
						'Value' => $mata_data[$key_option[1]]['weight'],
						'Units' => 'LB'
					),
					/*'Dimensions' => array(
						'Length' => $mata_data[$key_option[1]]['length'],
						'Width' => $mata_data[$key_option[1]]['width'],
						'Height' => $mata_data[$key_option[1]]['height'],
						'Units' => 'IN'
					)*/
				);
				$sequence_number++;
				$packageLineBags[] = $all_bags;
			}
		}
		
		$_SESSION['selected_package_bags_list'] = $packageLineBags;
		return $packageLineBags;
	}

	$path_to_wsdl = get_stylesheet_directory_uri().'/fedex/FedExWebServicesStandardWSDL/RateService_v28.wsdl';

	ini_set("soap.wsdl_cache_enabled", "0");
	$client = new SoapClient($path_to_wsdl, array('trace' => 1)); // Refer to http://us3.php.net/manual/en/ref.soap.php for more information

	$request['WebAuthenticationDetail'] = array(
		'ParentCredential' => array(
			'Key' => getProperty('parentkey'),
			'Password' => getProperty('parentpassword')
		),
		'UserCredential' => array(
			'Key' => getProperty('key'), 
			'Password' => getProperty('password')
		)
	); 

	$request['ClientDetail'] = array(
		'AccountNumber' => getProperty('shipaccount'),
		'MeterNumber' => getProperty('meter')
	);
	$request['TransactionDetail'] = array('CustomerTransactionId' => ' *** Rate Available Services Request using PHP ***');
	$request['Version'] = array(
		'ServiceId' => 'crs', 
		'Major' => '28', 
		'Intermediate' => '0', 
		'Minor' => '0'
	);
	$request['Origin'] = array(
		'PostalCode' => sanitize_text_field($_SESSION['destination_postal_code']), // Origin details
		'CountryCode' => sanitize_text_field($_SESSION['destination_country_code'])
	);
	$request['Destination'] = array(
		'PostalCode' => sanitize_text_field($_SESSION['origin_postal_code']), // Destination details
		'CountryCode' => sanitize_text_field($_SESSION['origin_country_code'])
	);
	$request['ShipDate'] = $_SESSION['arrival_date'];
	$request['CarrierCodes'] = 'FDXE';
	$request['ReturnTransitAndCommit'] = true;
	$request['RequestedShipment']['DropoffType'] = 'REGULAR_PICKUP'; // valid values REGULAR_PICKUP, REQUEST_COURIER, ...
	//$request['RequestedShipment']['ShipTimestamp'] = date('c');
	$request['RequestedShipment']['ShipTimestamp'] = date('Y-m-d\TH:i:s', strtotime($_SESSION['return_date']));
	// Service Type and Packaging Type are not passed in the request
	$request['RequestedShipment']['Shipper'] = array(
		'Address'=> array(
			'StreetLines' => sanitize_text_field($_SESSION['recipient_address']),
			'City' => sanitize_text_field($_SESSION['destination_city']),
			'StateOrProvinceCode' => sanitize_text_field($_SESSION['destination_state_code']),
			'PostalCode' => sanitize_text_field($_SESSION['destination_postal_code']),
			'CountryCode' => sanitize_text_field($_SESSION['destination_country_code']),
		),
	);
	$request['RequestedShipment']['Recipient'] = array(
		'Address'=> array(
			'StreetLines' => sanitize_text_field($_SESSION['shipper_address']),
			'City' => sanitize_text_field($_SESSION['origin_city']),
			'StateOrProvinceCode' => sanitize_text_field($_SESSION['origin_state_code']),
			'PostalCode' => sanitize_text_field($_SESSION['origin_postal_code']),
			'CountryCode' => sanitize_text_field($_SESSION['origin_country_code']),
		),
	);
	$request['RequestedShipment']['ShippingChargesPayment'] = array(
		'PaymentType' => 'SENDER',
		'Payor' => array(
			'ResponsibleParty' => array(
				'AccountNumber' => getProperty('billaccount'),
				'Contact' => null,
				'Address' => array(
					'CountryCode' => 'US'
				)
			)
		)
	);

	$request['RequestedShipment']['PackageCount'] = array_sum($_SESSION['fedex_selected_bags']);
	//$request['RequestedShipment']['PackageCount'] = 2;
	$request['RequestedShipment']['RequestedPackageLineItems'] = add_Package_Bags_List();

	try {
		if(setEndpoint('changeEndpoint')){
			$newLocation = $client->__setLocation(setEndpoint('endpoint'));
		}

		$response = $client ->getRates($request);

		if ($response -> HighestSeverity != 'FAILURE' && $response -> HighestSeverity != 'ERROR'){
			$html =	'';
			$html_row = '';
			$fedex_logo ='<svg class="service-option__logo" height="693" viewBox="0 54.221 150 41.558" width="2500" xmlns="http://www.w3.org/2000/svg"><path d="m78.749 54.221v40.104h22.254v-8.955h-12.833v-7.904h12.834v-8.598h-12.834v-5.711h12.834v-8.937h-22.254zm22.254 14.647 11.317 12.728-11.317 12.73h11.591l5.5-6.24 5.564 6.24h11.99l-11.421-12.771 11.275-12.687h-11.528l-5.416 6.174-5.605-6.174zm44.17 16.753c-2.56 0-4.826 1.916-4.826 4.764 0 2.846 2.266 4.761 4.826 4.761 2.565 0 4.827-1.915 4.827-4.761 0-2.848-2.262-4.764-4.827-4.764zm0 .759c2.26 0 3.899 1.697 3.899 4.005 0 2.306-1.639 4.003-3.899 4.003-2.255 0-3.898-1.697-3.898-4.003 0-2.308 1.643-4.005 3.898-4.005zm-1.874 1.054v5.774h.863v-2.613h.822c.562 0 .819.166.969.654.181.64.148 1.42.38 1.96h.991c-.18-.207-.281-1.11-.36-1.623-.102-.795-.272-1.23-.757-1.306v-.022c.563-.072.99-.602.99-1.243 0-1.05-.563-1.581-1.792-1.581h-2.105zm.863.779h1.033c.82 0 1.054.341 1.054.8 0 .386-.233.822-1.054.822h-1.033z" fill="#adafb2"></path><path d="m63.656 88.219c-3.46 0-5.612-3.227-5.612-6.593 0-3.598 1.871-7.06 5.612-7.06 3.88 0 5.425 3.462 5.425 7.06-.001 3.413-1.638 6.593-5.425 6.593zm-33.362-10.631c.592-2.547 2.568-4.212 5.034-4.212 2.715 0 4.589 1.614 5.083 4.212zm39.06-23.364v16.41h-.103c-2.079-2.39-4.676-3.22-7.689-3.22-6.173 0-10.822 4.197-12.454 9.744-1.862-6.112-6.663-9.858-13.78-9.858-5.782 0-10.345 2.594-12.728 6.822v-5.254h-11.95v-5.705h13.04v-8.94h-23.69v40.099h10.65v-16.855h10.618a15.915 15.915 0 0 0 -.486 3.963c0 8.364 6.39 14.233 14.545 14.233 6.858 0 11.377-3.219 13.767-9.09h-9.127c-1.235 1.766-2.171 2.289-4.64 2.289-2.861 0-5.33-2.498-5.33-5.457h18.586c.807 6.643 5.982 12.373 13.085 12.373 3.063 0 5.869-1.508 7.584-4.053h.103v2.596h9.389v-40.098h-9.39" fill="#4d148c"></path></svg>';
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

					$serviceType = '<div class="rount-trip-service-option-name" service-price="'.$amount.'" selected-service="'.$service_name.'" selected-service-type="'.$ServiceType_name.'"><input type="radio" name="select_service" class="select-fedex-service" >'.$fedex_logo .$service_name . ', '. $deliveryDate .'</div>';

					$service_amount = '<div class="service-option-amount">'.get_woocommerce_currency_symbol().$amount .'</div>';

					$html_row .= '<div class="service-row rount-trip">' . $serviceType . $service_amount . '</div>';
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

				$serviceType = '<div class="rount-trip-service-option-name" service-price="'.$amount.'" selected-service="'.$service_name.'" selected-service-type="'.$ServiceType_name.'"><input type="radio" name="select_service" class="select-fedex-service">'.$fedex_logo .$service_name . ', '. $deliveryDate .'</div>';
				
				$service_amount = '<div class="service-option-amount">'.get_woocommerce_currency_symbol().$amount .'</div>';

				$html_row .= '<div class="service-row rount-trip">' . $serviceType . $service_amount . '</div>';

				if ($response -> HighestSeverity == 'WARNING') {
					$html_row = '<div class="service-row rount-trip">' . $response -> Notifications -> Message . '</div>';
				}
			}
			$html .= '<div class="rount-trip-fedex-service-container">';
			$html .= '<div class="fedex-service-top-row"><p>'.$_SESSION['destination_city'].' -> '.$_SESSION['origin_city'].'</p></div>';
			$html .=  $html_row;
			$html .=  '</div>';

			$_SESSION['fedex_round_trip_api_response']= $response;
		}else{

			$highestSeverity=$response->HighestSeverity;
			if($highestSeverity=="SUCCESS"){$html = 'The transaction was successful.';}
			if($highestSeverity=="WARNING"){$html = 'The transaction returned a warning.';}
			if($highestSeverity=="ERROR"){$html = 'The transaction returned an Error.';}
			if($highestSeverity=="FAILURE"){$html = 'The transaction returned a Failure. please try again later.';}
			//printError($client, $response);
		}

		writeToLog($client);    // Write to log file   
	} catch (SoapFault $exception) {
		$html = printFault($exception, $client);
	}

	//echo $html;

	echo json_encode(array('status'=>'1','html' => $html));
	exit;
}

/*========================== ajax function for rount_trip_select_fedex_service =================================*/
/*==============================================================================================================*/
add_action('wp_ajax_rount_trip_select_fedex_service', 'rount_trip_select_fedex_service_function');
add_action('wp_ajax_nopriv_rount_trip_select_fedex_service', 'rount_trip_select_fedex_service_function');
function rount_trip_select_fedex_service_function(){
	if ( !session_id() ){
		session_start();
	}
	$selected_service = $_REQUEST['selected_service'];
	$selected_service_price = $_REQUEST['selected_service_price'];
	$selected_service_type = $_REQUEST['selected_service_type'];

	$_SESSION['rount_trip_selected_service'] = $selected_service;
	$_SESSION['rount_trip_selected_service_price'] = $selected_service_price;
	$_SESSION['rount_trip_selected_service_type'] = $selected_service_type;
	
	if ($_SESSION['rount_trip_selected_service']) {
		$selected = true;
	}

	echo json_encode(array('status'=>'1','selected' => $selected));
	exit;
}

/*========================== ajax function for one_way_select_fedex_service ====================================*/
/*==============================================================================================================*/
add_action('wp_ajax_one_way_select_fedex_service', 'one_way_select_fedex_service_function');
add_action('wp_ajax_nopriv_one_way_select_fedex_service', 'one_way_select_fedex_service_function');
function one_way_select_fedex_service_function(){
	if ( !session_id() ){
		session_start();
	}
	$selected_service = $_REQUEST['selected_service'];
	$selected_service_price = $_REQUEST['selected_service_price'];
	$selected_service_type = $_REQUEST['selected_service_type'];

	$_SESSION['selected_service'] = $selected_service;
	$_SESSION['selected_service_price'] = $selected_service_price;
	$_SESSION['selected_service_type'] = $selected_service_type;
	if ($_SESSION['selected_service']) {
		$selected = true;
	}
	echo json_encode(array('status'=>'1','selected' => $selected));
	exit;
}

/*======================= for save the selected fedex server values =========================*/
/*===========================================================================================*/
add_action('wp_ajax_select_plan', 'selected_fedex_plan');
add_action('wp_ajax_nopriv_select_plan', 'selected_fedex_plan');
function selected_fedex_plan(){
	if ( !session_id() ){
		session_start();
	}

	$product_id = $_REQUEST['plan_id'];

	$_SESSION['plan_price'] = $plan_price;
	$_SESSION['plan_name'] = $plan_name;
	if ($product_id) {
		$selected = true;

		WC()->cart->empty_cart();
		WC()->cart->add_to_cart(555, 1);
		WC()->cart->add_to_cart($product_id, 1);

		if ($_SESSION['trip_type'] == 'Round Trip'){
			WC()->cart->add_to_cart(556, 1);
			WC()->cart->add_to_cart($product_id, 1);
		}
		$_SESSION['plan_back_show'] ='true';

	}

	echo json_encode(array('status'=>'1','selected' => $selected));
	exit;
}

/*======================== for remove and set values for billing fields ======================================*/
/*============================================================================================================*/
add_filter( 'woocommerce_billing_fields', 'remove_extra_fields_on_checkout_page', 9999 );
function remove_extra_fields_on_checkout_page( $fields ) {
	if ( !session_id() ){
		session_start();
	}

	$fields['billing_address_1']['default'] = $_SESSION['shipper_address'];
	$fields['billing_city']['default'] = $_SESSION['origin_city'];
	$fields['billing_state']['default'] = $_SESSION['origin_state_code'];
	$fields['billing_postcode']['default'] = $_SESSION['origin_postal_code'];
	$fields['billing_country']['default'] = $_SESSION['origin_country_code'];

	unset($fields['billing_address_2']);
	unset($fields['billing_company']);

	return $fields;
}

/*======================== for remove and set values for shipping fields ======================================*/
/*=============================================================================================================*/
add_filter( 'woocommerce_shipping_fields', 'remove_extra_shipping_fields_on_checkout_page', 9999);
function remove_extra_shipping_fields_on_checkout_page( $fields ) {

	if ( !session_id() ){
		session_start();
	}

	$fields['shipping_address_1']['default'] = $_SESSION['recipient_address'];
	$fields['shipping_city']['default'] = $_SESSION['destination_city'];
	$fields['shipping_state']['default'] = $_SESSION['destination_state_code'];
	$fields['shipping_postcode']['default'] = $_SESSION['destination_postal_code'];
	$fields['shipping_country']['default'] = $_SESSION['destination_country_code'];

	unset($fields['shipping_address_2']);
	unset($fields['shipping_company']);

	$fields['shipping_phone'] = array(
			'label' => 'Phone',
			'required' => 1,
			'type' => 'tel',
			'class' => array(
				'0' => 'form-row-wide',
			),
			'validate' => array(
				'0' => 'phone',
			),
			'priority' => '100',
		);

	$fields['shipping_email'] = array(
		'label' => 'Email address',
		'required' => 1,
		'type' => 'email',
		'class' => array(
				'0' => 'form-row-wide',
			),
		'validate' => array(
				'0' => 'email',
			),
		'priority' => '110',
	);

	return $fields;
}

/*======================= for set default billing contery =============================*/
/*=============================================================================================*/
add_filter( 'default_checkout_billing_country', 'change_default_checkout_billing_country' );
function change_default_checkout_billing_country() {
	if ( !session_id() ){
		session_start();
	}
	return $_SESSION['origin_country_code'];
}

/*======================= for set default billing state =============================*/
/*=============================================================================================*/
add_filter( 'default_checkout_billing_state', 'change_default_checkout_billing_state' );
function change_default_checkout_billing_state() {
	if ( !session_id() ){
		session_start();
	}
	return $_SESSION['origin_state_code'];
}

/*======================= for set default shipping contery =============================*/
/*==============================================================================================*/
add_filter( 'default_checkout_shipping_country', 'change_default_checkout_shipping_country' );
function change_default_checkout_shipping_country() {
	if ( !session_id() ){
		session_start();
	}
	return $_SESSION['destination_country_code'];
}

/*======================= for set default shipping state =============================*/
/*==============================================================================================*/
add_filter( 'default_checkout_shipping_state', 'change_default_checkout_shipping_state' );
function change_default_checkout_shipping_state() {
	if ( !session_id() ){
		session_start();
	}
	return $_SESSION['destination_state_code'];
}

/*================================== for set fedex service price =========================================*/
/*========================================================================================================*/
add_action( 'woocommerce_before_calculate_totals', 'add_custom_price', 20, 1);
function add_custom_price( $cart ) {
	if ( !session_id() ){
		session_start();
	}
	$selected_bags = $_SESSION['fedex_selected_bags'];

	$bag_name = '';
	foreach ($selected_bags as $key => $bags_count) {
		$selected_bag_name = explode('-',$key);
		
		$bag_name .= str_replace("_", " ",$selected_bag_name[1]).' - '. $bags_count.', ';
	}

	
	foreach ( $cart->get_cart() as $cart_item ) {
		if ($cart_item['product_id'] == 555 ) {
			$service_price = $_SESSION['selected_service_price'];
			$selected_service = $_SESSION['selected_service'];
			$selected_service_name = $selected_service.' <p>'.$bag_name.'</p>';

			$cart_item['data']->set_price( $service_price );
			$cart_item['data']->set_name( $selected_service_name );
		}

		if ($cart_item['product_id'] == 556 ) {
			$rount_trip_selected_service_price = $_SESSION['rount_trip_selected_service_price'];
			$rount_trip_selected_service = $_SESSION['rount_trip_selected_service'];
			$rount_trip_service_name = $rount_trip_selected_service.' <p>'.$bag_name.'</p>';

			$cart_item['data']->set_price( $rount_trip_selected_service_price );
			$cart_item['data']->set_name( $rount_trip_service_name );
		}
	}
}

/*================================== for disable shipping calc =========================================*/
/*======================================================================================================*/
add_filter( 'woocommerce_cart_ready_to_calc_shipping', 'disable_shipping_calc_on_cart', 99 );
function disable_shipping_calc_on_cart( $show_shipping ) {
    return false;
}

/*===================================== add service details on thankyou page ===================================*/
/*==============================================================================================================*/
add_action( 'woocommerce_thankyou', 'show_pickup_and_drop_location_on_view_order_and_thankyou_page', 99 );
add_action( 'woocommerce_view_order', 'show_pickup_and_drop_location_on_view_order_and_thankyou_page', 99 );
function show_pickup_and_drop_location_on_view_order_and_thankyou_page( $order_id ){ 

	$order = wc_get_order( $order_id );

	$pickup_address = $order->get_formatted_billing_address();
	$pickup_email = $order->get_billing_email();
	$pickup_phone = $order->get_billing_phone();


	$pickup_city = $order->get_billing_city();
	$pickup_state = $order->get_billing_state();
	$pickup_postcode = $order->get_billing_postcode();

	$drop_address = $order->get_formatted_shipping_address();
	$drop_email = $order->get_meta('_shipping_email');
	$drop_phone = $order->get_meta('_shipping_phone');

	$fedexlocation = $order->get_meta('fedexlocation');
	$fedexlocationdestination = $order->get_meta('fedexlocationdestination');
	$droplocation = $order->get_meta('droplocation');

	$drop_city = $order->get_shipping_city();
	$drop_state = $order->get_shipping_state();
	$drop_postcode = $order->get_shipping_postcode();

	$trip_type = $order->get_meta('trip_type');
	?>
	<section>
		<p class="woocommerce-column__title"><strong>Service Type:</strong> <?php echo $trip_type; ?></p>
	</section>
	<section>
		<p class="woocommerce-column__title"><strong>Form: </strong> <?php echo $pickup_city . ', ' . $pickup_state . ', '. $pickup_postcode; ?><strong> To:</strong> <?php echo $drop_city . ', ' . $drop_state . ', '. $drop_postcode;?></p>
	</section>
	<section class="woocommerce-customer-details customer-pickup-info">
		<div>
			<h2 class="woocommerce-column__title">Origin</h2>
			<address>
				<?php echo $pickup_address; ?>
				<p class="woocommerce-customer-details--phone"><?php echo $pickup_email; ?></p>
				<p class="woocommerce-customer-details--email"><?php echo $pickup_phone; ?></p>
			</address>
		</div>
		<div>
			<h2 class="woocommerce-column__title">Destination</h2>
			<address>
				<?php echo $drop_address; ?>
				<p class="woocommerce-customer-details--phone"><?php echo $drop_email; ?></p>
				<p class="woocommerce-customer-details--email"><?php echo $drop_phone; ?></p>
			</address>
		</div>
	</section>
	<section class="woocommerce-customer-details customer-pickup-info">
			<div>
				<h2 class="woocommerce-column__title">Drop Off Service Type</h2>
				<address>
					<?php echo $droplocation; ?>
				</address>
			</div>
			  <?php if($droplocation == "Self Drop"){?>
			<div>
				<h2 class="woocommerce-column__title">Fedex Location Details</h2>
				<address>
					<?php 
							echo $fedexlocation['Company_Name'].'<br>';
							echo $fedexlocation['Street_Lines'].'<br>';
							echo $fedexlocation['City'].'<br>';
							echo $fedexlocation['Country_Code'].'<br>';
							echo $fedexlocation['Postal_Code'].'<br>';
							echo $fedexlocation['Phone_Number'].'<br>';
						?>
				</address>
			</div>
			<?php }
			else{
				echo '<div><h2 class="woocommerce-column__title" style="padding: 32px;"></h2><address></address></div>';
			} ?>
	</section>
	<?php 
	
	if ($trip_type == 'Round Trip') { ?>
		<section>
			<p class="woocommerce-column__title"><strong>Form: </strong><?php echo $drop_city . ', ' . $drop_state . ', '. $drop_postcode;?> <strong> To:</strong> <?php echo $pickup_city . ', ' . $pickup_state . ', '. $pickup_postcode; ?></p>
		</section>
		<section class="woocommerce-customer-details customer-pickup-info">
			<div>
				<h2 class="woocommerce-column__title">Origin</h2>
				<address>
					<?php echo $drop_address; ?>
					<p class="woocommerce-customer-details--phone"><?php echo $drop_email; ?></p>
					<p class="woocommerce-customer-details--email"><?php echo $drop_phone; ?></p>
					
				</address>
			</div>
			<div>
				<h2 class="woocommerce-column__title">Destination</h2>
				<address>
					<?php echo $pickup_address; ?>
					<p class="woocommerce-customer-details--phone"><?php echo $pickup_email; ?></p>
					<p class="woocommerce-customer-details--email"><?php echo $pickup_phone; ?></p>
				</address>
			</div>
		</section>

		<section class="woocommerce-customer-details customer-pickup-info">
			<div>
				<h2 class="woocommerce-column__title">Drop Off Service Type</h2>
				<address>
					<?php echo $droplocation; ?>
				</address>
			</div>
			  <?php if($droplocation == "Self Drop"){?>
			<div>
				<!-- <h2 class="woocommerce-column__title">Fedex Location Details</h2>
				<address> -->
					<?php 
						// echo $fedexlocation['Company_Name'].'<br>';
						// echo $fedexlocation['Street_Lines'].'<br>';
						// echo $fedexlocation['City'].'<br>';
						// echo $fedexlocation['Country_Code'].'<br>';
						// echo $fedexlocation['Postal_Code'].'<br>';
						// echo $fedexlocation['Phone_Number'].'<br>';
					?>
				<!-- </address> -->

				<h2 class="woocommerce-column__title">Fedex Location Return Pickup Details</h2>
				<address>
					<?php 
							echo $fedexlocationdestination['Company_Name'].'<br>';
							echo $fedexlocationdestination['Street_Lines'].'<br>';
							echo $fedexlocationdestination['City'].'<br>';
							echo $fedexlocationdestination['Country_Code'].'<br>';
							echo $fedexlocationdestination['Postal_Code'].'<br>';
							echo $fedexlocationdestination['Phone_Number'].'<br>';
						?>
				</address>
			</div>
		<?php } else{
				echo '<div><h2 class="woocommerce-column__title" style="padding: 32px;"></h2><address></address></div>';
			}?>
		</section>
	<?php }
}

/*========================= show show_the_drop_location_email_and_phone_in_admin ===========================*/
/*==========================================================================================================*/
add_action( 'woocommerce_admin_order_data_after_shipping_address', 'show_the_drop_location_email_and_phone_in_admin', 10, 1 );
function show_the_drop_location_email_and_phone_in_admin( $order ) {    

   	$shipping_email = $order->get_meta('_shipping_email');
	$shipping_phone = $order->get_meta('_shipping_phone');
	echo '<p><strong>Email address: </strong><a href="mailto:'.$shipping_email.'">'.$shipping_email.'</a></p>';
	echo '<p><strong>Phone: </strong><a href="tel:'.$shipping_phone.'">'.$shipping_phone.'</a></p>';
}

/*=========================== for change_billing_and_shipping_labal_in_admin ===================================*/
/*==============================================================================================================*/
add_filter( 'gettext', 'change_billing_and_shipping_labal_in_admin', 10, 3 );
function change_billing_and_shipping_labal_in_admin( $translated_text, $text, $domain ) {
    global $pagenow, $post_type;

    if( in_array($pagenow, ['post.php', 'post-new.php']) && 'shop_order' === $post_type && is_admin() ) {
        if( 'Billing' === $text ) {
            $translated_text = __('Origin', $domain); // <== Here the replacement txt
        }

        if( 'Shipping' === $text ) {
            $translated_text = __('Destination', $domain); // <== Here the replacement txt
        }

    }
    return $translated_text;
}

/*=========================== for update order meta for save value ======================================*/
/*=======================================================================================================*/
add_action('woocommerce_checkout_update_order_meta', 'update_order_meta_for_save_value');
function update_order_meta_for_save_value( $order_id ) {
	if ( !session_id() ){
		session_start();
	}

	if ($_SESSION['trip_type']){
		update_post_meta( $order_id, 'trip_type', $_SESSION['trip_type']);
	}

	if ($_SESSION['arrival_date']){
		update_post_meta( $order_id, 'arrival_date', $_SESSION['arrival_date']);
	}

	if ($_SESSION['return_date']){
		update_post_meta( $order_id, 'return_date', $_SESSION['return_date']);
	}

	if ($_SESSION['selected_package_bags_list']){
		update_post_meta( $order_id, 'selected_package_bags_list', $_SESSION['selected_package_bags_list']);
	}

	if ($_SESSION['selected_service_type']){
		update_post_meta( $order_id, 'selected_service_type', $_SESSION['selected_service_type']);
	}

	if ($_SESSION['rount_trip_selected_service_type']){
		update_post_meta( $order_id, 'rount_trip_selected_service_type', $_SESSION['rount_trip_selected_service_type']);
	}
}

/*=========================== for show address details in order page in admin ==================================*/
/*==============================================================================================================*/
add_action( 'add_meta_boxes', 'show_pickup_drop_address' );
function show_pickup_drop_address() {
    add_meta_box('show-pickup-drop-address', 'Address Details', 'show_pickup_drop_address_details_fun', 'shop_order');
}
function show_pickup_drop_address_details_fun() {
	$order_id = get_the_id();
	$order = wc_get_order( $order_id );

	$pickup_address = $order->get_formatted_billing_address();
	$pickup_email = $order->get_billing_email();
	$pickup_phone = $order->get_billing_phone();

	$pickup_city = $order->get_billing_city();
	$pickup_state = $order->get_billing_state();
	$pickup_postcode = $order->get_billing_postcode();

	$drop_address = $order->get_formatted_shipping_address();
	$drop_email = $order->get_meta('_shipping_email');
	$drop_phone = $order->get_meta('_shipping_phone');
	$fedexlocation = $order->get_meta('fedexlocation');
	$fedexlocationdestination = $order->get_meta('fedexlocationdestination');
	$droplocation = $order->get_meta('droplocation');

	$drop_city = $order->get_shipping_city();
	$drop_state = $order->get_shipping_state();
	$drop_postcode = $order->get_shipping_postcode();


	$trip_type = $order->get_meta('trip_type'); ?>

	<table>
		<tr>
			<td>Service Type:</td>
			<td><?php echo $trip_type; ?></td>
		</tr>
		<tr>
			<td>
				<strong>Form: </strong> <?php echo $pickup_city . ', ' . $pickup_state . ', '. $pickup_postcode; ?><strong> To:</strong> <?php echo $drop_city . ', ' . $drop_state . ', '. $drop_postcode;?>
			</td>
		</tr>
		<tr>
			<td><strong>Origin:</strong></td>
			<td><strong>Destination:</strong></td>
		</tr>
		<tr>
			<td>
				<p>
					<?php 
						echo $pickup_address.'<br>';
						echo $pickup_email.'<br>';
						echo $pickup_phone.'<br>'; 
					?>
				</p>
			</td>
			<td>
				<p>
					<?php 
						echo $drop_address.'<br>';
						echo $drop_email.'<br>';
						echo $drop_phone.'<br>';
					?>
				</p>
			</td>
		</tr>
		<tr>
			<td>
				<strong>Drop Off Service Type: </strong> <?php echo $droplocation ;?>
			</td>
		</tr>
		<?php if($droplocation == "Self Drop"){ ?>
			<tr>
				<td><strong>Fedex Location Details:</strong></td>
			</tr>
			<tr>
				<td>
					<p>
						<?php 
							echo $fedexlocation['Company_Name'].'<br>';
							echo $fedexlocation['Street_Lines'].'<br>';
							echo $fedexlocation['City'].'<br>';
							echo $fedexlocation['Country_Code'].'<br>';
							echo $fedexlocation['Postal_Code'].'<br>';
							echo $fedexlocation['Phone_Number'].'<br>';
						?>
					</p>
				</td>
			</tr>
		<?php }
		
		if ($trip_type == 'Round Trip') { ?>
			<tr>
				<td>
					<strong>Form: </strong><?php echo $drop_city . ', ' . $drop_state . ', '. $drop_postcode;?> <strong> To:</strong> <?php echo $pickup_city . ', ' . $pickup_state . ', '. $pickup_postcode; ?>
				</td>
			</tr>
			<tr>
				<td><strong>Origin:</strong></td>
				<td><strong>Destination:</strong></td>
			</tr>
			<tr>
				<td>
					<p>
						<?php 
							echo $drop_address.'<br>';
							echo $drop_email.'<br>';
							echo $drop_phone.'<br>';
						?>
					</p>
				</td>
				<td>
					<p>
						<?php 
							echo $pickup_address.'<br>';
							echo $pickup_email.'<br>';
							echo $pickup_phone.'<br>';
						?>
					</p>
				</td>
			</tr>
			<tr>
				<td>
					<strong>Drop Off Service Type: </strong> <?php echo $droplocation ;?>
				</td>
			</tr>
             <?php if($droplocation == "Self Drop"){?>
			<tr>
				<td><strong>Fedex Location Return Pickup Details:</strong></td>
			</tr>
			<tr>
				<td>
					<p>
						<?php 
							echo $fedexlocationdestination['Company_Name'].'<br>';
							echo $fedexlocationdestination['Street_Lines'].'<br>';
							echo $fedexlocationdestination['City'].'<br>';
							echo $fedexlocationdestination['Country_Code'].'<br>';
							echo $fedexlocationdestination['Postal_Code'].'<br>';
							echo $fedexlocationdestination['Phone_Number'].'<br>';
						?>
					</p>
				</td>
			</tr>
		<?php } }?>
	</table>
	<?php
}

/*========================== add customer pickup and drop location to email template ===========================*/
/*==============================================================================================================*/
add_action('woocommerce_email_customer_details', 'customer_pickup_and_drop_location_to_email_template', 99, 3 );
function customer_pickup_and_drop_location_to_email_template( $order, $sent_to_admin, $plain_text ) {
  
	$order_id = $order->ID;

	$pickup_address = $order->get_formatted_billing_address();
	$pickup_email = $order->get_billing_email();
	$pickup_phone = $order->get_billing_phone();

	$pickup_city = $order->get_billing_city();
	$pickup_state = $order->get_billing_state();
	$pickup_postcode = $order->get_billing_postcode();

	$drop_address = $order->get_formatted_shipping_address();
	$drop_email = $order->get_meta('_shipping_email');
	$drop_phone = $order->get_meta('_shipping_phone');
	$fedexlocation = $order->get_meta('fedexlocation');
	$fedexlocationdestination = $order->get_meta('fedexlocationdestination');
	$droplocation = $order->get_meta('droplocation');

	$drop_city = $order->get_shipping_city();
	$drop_state = $order->get_shipping_state();
	$drop_postcode = $order->get_shipping_postcode();

	$trip_type = $order->get_meta('trip_type'); ?>

	<table>
		<tr>
			<td><strong>Service Type:</strong></td>
			<td><?php echo $trip_type; ?></td>
		</tr>
		<tr>
			<td>
				<strong>Form: </strong> <?php echo $pickup_city . ', ' . $pickup_state . ', '. $pickup_postcode; ?><strong> To:</strong> <?php echo $drop_city . ', ' . $drop_state . ', '. $drop_postcode;?>
			</td>
		</tr>
		<tr>
			<td><strong>Origin:</strong></td>
			<td><strong>Destination:</strong></td>
		</tr>
		<tr>
			<td>
				<p>
					<?php 
						echo $pickup_address.'<br>';
						echo $pickup_email.'<br>';
						echo $pickup_phone.'<br>'; 
					?>
				</p>
			</td>
			<td>
				<p>
					<?php 
						echo $drop_address.'<br>';
						echo $drop_email.'<br>';
						echo $drop_phone.'<br>';
					?>
				</p>
			</td>
		</tr>
		<tr>
			<td>
				<strong>Drop Off Service Type: </strong> <?php echo $droplocation ;?>
			</td>
		</tr>
		<?php if($droplocation == "Self Drop"){?>
			<tr>
				<td><strong>Fedex Location Details:</strong></td>
			</tr>
			<tr>
				<td>
					<p>
						<?php 
							echo $fedexlocation['Company_Name'].'<br>';
							echo $fedexlocation['Street_Lines'].'<br>';
							echo $fedexlocation['City'].'<br>';
							echo $fedexlocation['Country_Code'].'<br>';
							echo $fedexlocation['Postal_Code'].'<br>';
							echo $fedexlocation['Phone_Number'].'<br>';
						?>
					</p>
				</td>
			</tr>
		<?php }
		if ($trip_type == 'Round Trip') { ?>
			<tr>
				<td>
					<strong>Form: </strong><?php echo $drop_city . ', ' . $drop_state . ', '. $drop_postcode;?> <strong> To:</strong> <?php echo $pickup_city . ', ' . $pickup_state . ', '. $pickup_postcode; ?>
				</td>
			</tr>
			<tr>
				<td><strong>Origin:</strong></td>
				<td><strong>Destination:</strong></td>
			</tr>
			<tr>
				<td>
					<p>
						<?php 
							echo $drop_address.'<br>';
							echo $drop_email.'<br>';
							echo $drop_phone.'<br>';
						?>
					</p>
				</td>
				<td>
					<p>
						<?php 
							echo $pickup_address.'<br>';
							echo $pickup_email.'<br>';
							echo $pickup_phone.'<br>';
						?>
					</p>
				</td>
			</tr>
			<tr>
				<td>
					<strong>Drop Off Service Type: </strong> <?php echo $droplocation ;?>
				</td>
			</tr>
			<?php if($droplocation == "Self Drop"){ ?>
			<tr>
				<td>
					<strong>Fedex Location Return Pickup Details:</strong>
				</td>
			</tr>
			<tr>
				<td>
					<p>
						<?php 
							echo $fedexlocationdestination['Company_Name'].'<br>';
							echo $fedexlocationdestination['Street_Lines'].'<br>';
							echo $fedexlocationdestination['City'].'<br>';
							echo $fedexlocationdestination['Country_Code'].'<br>';
							echo $fedexlocationdestination['Postal_Code'].'<br>';
							echo $fedexlocationdestination['Phone_Number'].'<br>';
						?>
					</p>
				</td>
			</tr>
		<?php } 
	}?>

	</table>
<?php }

/*========================== for add mutipel product in cart ===========================*/
/*======================================================================================*/
add_filter('woocommerce_add_cart_item_data','AddNewProductInsteadChangeQuantity',11,2);
function AddNewProductInsteadChangeQuantity( $cart_item_data, $product_id ) {
	$unique_key = md5( microtime() . rand() );
	$cart_item_data['unique_key'] = $unique_key;
	return $cart_item_data;
}
add_filter('woocommerce_is_sold_individually','__return_true' );

/*========================== for add Generate Label button on my account order page ===========================*/
/*=============================================================================================================*/
add_filter( 'woocommerce_my_account_my_orders_actions', 'add_generate_label_actions_orders_actions', 10, 2 );
function add_generate_label_actions_orders_actions( $actions, $order ) {

	$order_id = $order->ID;
	$shipping_label = get_post_meta($order_id, 'fedex_shipping_label', true);
	$shipping_label_for_return = get_post_meta($order_id, 'fedex_shipping_label_for_return', true);

	if ($shipping_label) {
		$actions['print-label-btn'] = array(
			'url'  => get_stylesheet_directory_uri().'/fedex/label/'.$shipping_label,
			'name' => 'Print Label',
		);
	}
	else{
		$actions['generate-label-btn'] = array(
			'url'  => wc_get_account_endpoint_url('orders').'?order_id='.$order_id,
			'name' => 'Generate Label',
		);
	}

	if ($shipping_label_for_return) {
		$actions['print-label-btn-return'] = array(
			'url'  => get_stylesheet_directory_uri().'/fedex/label/'.$shipping_label_for_return,
			'name' => 'Label For Return',
		);
	}

	return $actions;
}

/*================== function for generate fedex shipping label =========================*/
/*=======================================================================================*/
add_action('init', 'generate_fedex_shipping_label');
function generate_fedex_shipping_label(){

	if ( !session_id() ){
		session_start();
	}

	if (isset($_REQUEST['order_id'])) {

		$order_id = $_REQUEST['order_id'];
		$order = wc_get_order( $order_id );
		$shipper_name = $order->get_billing_first_name().' '.$order->get_billing_last_name();
		$shipper_phone = $order->get_billing_phone();
		$shipper_city = $order->get_billing_city();
		$shipper_state = $order->get_billing_state();
		$shipper_postcode = $order->get_billing_postcode();
		$shipper_countrycode = $order->get_billing_country();
		$shipper_address = $order->get_billing_address_1() .' '. $shipper_postcode;

		$recipient_name = $order->get_shipping_first_name().' '.$order->get_shipping_last_name();
		$recipient_phone = $order->get_meta('_shipping_phone');
		$recipient_city = $order->get_shipping_city();
		$recipient_state = $order->get_shipping_state();
		$recipient_postcode = $order->get_shipping_postcode();
		$recipient_countrycode = $order->get_shipping_country();
		$recipient_address = $order->get_shipping_address_1() .' '. $recipient_postcode;

		$trip_type = $order->get_meta('trip_type');
		$arrival_date = $order->get_meta('arrival_date');
		$return_date = $order->get_meta('return_date');
		$selected_package_bags_list = $order->get_meta('selected_package_bags_list');
		$selected_service_type = $order->get_meta('selected_service_type');
		$rount_trip_selected_service_type = $order->get_meta('rount_trip_selected_service_type');

		$TotalNetWeight = array();

		foreach ($selected_package_bags_list as $key => $package){
        $TotalNetWeight[] = $package['Weight']['Value'];
		}

		$path_to_wsdl = get_stylesheet_directory_uri().'/fedex/FedExWebServicesStandardWSDL/ShipService_v26.wsdl';

		define('SHIP_MASTERLABEL', 'wp-content/themes/sportshipper/fedex/label/label-'.$order_id.'.pdf');

		ini_set("soap.wsdl_cache_enabled", "0");

		$client = new SoapClient($path_to_wsdl, array('trace' => 1)); 


		$request['WebAuthenticationDetail'] = array(
			'ParentCredential' => array(
				'Key' => getProperty('parentkey'), 
				'Password' => getProperty('parentpassword')
			),
			'UserCredential' => array(
				'Key' => getProperty('key'), 
				'Password' => getProperty('password')
			),
		);

		$request['ClientDetail'] = array(
			'AccountNumber' => getProperty('shipaccount'), 
			'MeterNumber' => getProperty('meter')
		);
		$request['TransactionDetail'] = array('CustomerTransactionId' => 'ProcessShip_Basic');
		$request['Version'] = array(
			'ServiceId' => 'ship', 
			'Major' => '26', 
			'Intermediate' => '0', 
			'Minor' => '0'
		);
		$request['Origin'] = array(
			'PostalCode' => $shipper_postcode, // Origin details
			'CountryCode' => $shipper_countrycode
		);
		$request['Destination'] = array(
			'PostalCode' => $recipient_postcode, // Destination details
			'CountryCode' => $recipient_countrycode
		);

		$request['RequestedShipment'] = array(
			//'ShipTimestamp' => '2021-09-01T15:46:24-06:00',
			'ShipTimestamp' => date('Y-m-d\TH:i:s', strtotime($arrival_date)),
			'DropoffType' => 'REGULAR_PICKUP', // valid values REGULAR_PICKUP, REQUEST_COURIER, DROP_BOX, BUSINESS_SERVICE_CENTER and 
			'ServiceType' => $selected_service_type, // valid values STANDARD_OVERNIGHT, PRIORITY_OVERNIGHT, FEDEX_GROUND, ...
			'PackagingType' => 'YOUR_PACKAGING', // valid values FEDEX_BOX, FEDEX_PAK, FEDEX_TUBE, YOUR_PACKAGING, ...
			'Shipper' => array(
				'Contact' => array(
					'PersonName' => $shipper_name,
					'CompanyName' => '',
					'PhoneNumber' => $shipper_phone,
				),
				'Address' => array(
					'StreetLines' => $shipper_address,
					'City' => $shipper_city,
					'StateOrProvinceCode' => $shipper_state,
					'PostalCode' => $shipper_postcode,
					'CountryCode' => $shipper_countrycode,
				)
			),
			'Recipient' => array(
				'Contact' => array(
					'PersonName' => $recipient_name,
					'CompanyName' => '',
					'PhoneNumber' => $recipient_phone,
				),
				'Address' => array(
					'StreetLines' => $recipient_address,
					'City' => $recipient_city,
					'StateOrProvinceCode' => $recipient_state,
					'PostalCode' => $recipient_postcode,
					'CountryCode' => $recipient_countrycode,
					'Residential' => true
				)
			),
			'LabelSpecification' => array(
				'LabelFormatType' => 'COMMON2D', // valid values COMMON2D, LABEL_DATA_ONLY
				'ImageType' => 'PDF',  // valid values DPL, EPL2, PDF, ZPLII and PNG
				'LabelStockType' => 'PAPER_7X4.75'
			), 
			
			'PackageCount' => 1,
			'PackageDetail' => 'INDIVIDUAL_PACKAGES', 
			//'RequestedPackageLineItems' => $selected_package_bags_list,                                       
			'RequestedPackageLineItems' => array(
				'0' => array(
					'SequenceNumber'=>1,
					'GroupPackageCount'=>1,
					'Weight' => array(
						'Value' => array_sum($TotalNetWeight),
						'Units' => 'LB'
					),
					// 'Dimensions' => array(
					// 	'Length' => 163,
					// 	'Width' => 124,
					// 	'Height' => 123,
					// 	'Units' => 'IN'
					// ),
					'CustomerReferences' => array(
						'0' => array(
							'CustomerReferenceType' => 'CUSTOMER_REFERENCE', // valid values CUSTOMER_REFERENCE, INVOICE_NUMBER, 
							'Value' => ''
						), 
						'1' => array(
							'CustomerReferenceType' => 'INVOICE_NUMBER', 
							'Value' => '#'.$order_id						
						),
						'2' => array(
							'CustomerReferenceType' => 'P_O_NUMBER', 
							'Value' => ''
						)
					),
					// 'SpecialServicesRequested' => array(
					// 	//'SpecialServiceTypes' => array('COD'),
					// 	'CodDetail' => array(
					// 		'CodCollectionAmount' => array(
					// 			'Currency' => 'USD', 
					// 			'Amount' => 150
					// 		),
					// 		'CollectionType' => 'ANY' // ANY, GUARANTEED_FUNDS
					// 	)
					// )
				),
			),
		);

		$request['RequestedShipment']['ShippingChargesPayment'] = array(
			'PaymentType' => 'SENDER',
			'Payor' => array(
				'ResponsibleParty' => array(
					'AccountNumber' => getProperty('billaccount'),
					'Contact' => null,
					'Address' => array(
						'CountryCode' => 'US'
					)
				)
			)
		);

		$response = $client->processShipment($request);

		$fp = fopen(SHIP_MASTERLABEL, 'wb');   
		fwrite($fp, ($response->CompletedShipmentDetail->CompletedPackageDetails->Label->Parts->Image));
		fclose($fp);
		if ($response->CompletedShipmentDetail->CompletedPackageDetails->Label->Parts->Image) {
			update_post_meta($order_id, 'fedex_shipping_label', 'label-'.$order_id.'.pdf');
		}

		if ($trip_type == 'Round Trip') {
			$path_to_wsdl = get_stylesheet_directory_uri().'/fedex/FedExWebServicesStandardWSDL/ShipService_v26.wsdl';

			define('SHIP_LABEL_RETURN', 'wp-content/themes/sportshipper/fedex/label/label-for-return-'.$order_id.'.pdf');

			ini_set("soap.wsdl_cache_enabled", "0");

			$client_return = new SoapClient($path_to_wsdl, array('trace' => 1)); 


			$requestreturn['WebAuthenticationDetail'] = array(
				'ParentCredential' => array(
					'Key' => getProperty('parentkey'), 
					'Password' => getProperty('parentpassword')
				),
				'UserCredential' => array(
					'Key' => getProperty('key'), 
					'Password' => getProperty('password')
				),
			);

			$requestreturn['ClientDetail'] = array(
				'AccountNumber' => getProperty('shipaccount'), 
				'MeterNumber' => getProperty('meter')
			);
			$requestreturn['TransactionDetail'] = array('CustomerTransactionId' => 'ProcessShip_Basic');
			$requestreturn['Version'] = array(
				'ServiceId' => 'ship', 
				'Major' => '26', 
				'Intermediate' => '0', 
				'Minor' => '0'
			);
			$requestreturn['Origin'] = array(
				'PostalCode' => $shipper_postcode, // Origin details
				'CountryCode' => $shipper_countrycode
			);
			$requestreturn['Destination'] = array(
				'PostalCode' => $recipient_postcode, // Destination details
				'CountryCode' => $recipient_countrycode
			);
			$requestreturn['RequestedShipment'] = array(
				//'ShipTimestamp' => '2021-09-01T15:46:24-06:00',
				'ShipTimestamp' => date('Y-m-d\TH:i:s', strtotime($return_date)),
				'DropoffType' => 'REGULAR_PICKUP', // valid values REGULAR_PICKUP, REQUEST_COURIER, DROP_BOX, BUSINESS_SERVICE_CENTER and 
				'ServiceType' => $rount_trip_selected_service_type, // valid values STANDARD_OVERNIGHT, PRIORITY_OVERNIGHT, FEDEX_GROUND, ...
				'PackagingType' => 'YOUR_PACKAGING', // valid values FEDEX_BOX, FEDEX_PAK, FEDEX_TUBE, YOUR_PACKAGING, ...
				'Shipper' => array(
					'Contact' => array(
						'PersonName' => $recipient_name,
						'CompanyName' => '',
						'PhoneNumber' => $recipient_phone,
					),
					'Address' => array(
						'StreetLines' => $recipient_address,
						'City' => $recipient_city,
						'StateOrProvinceCode' => $recipient_state,
						'PostalCode' => $recipient_postcode,
						'CountryCode' => $recipient_countrycode,
					)
				),
				'Recipient' => array(
					'Contact' => array(
						'PersonName' => $shipper_name,
						'CompanyName' => '',
						'PhoneNumber' => $shipper_phone,
					),
					'Address' => array(
						'StreetLines' => $shipper_address,
						'City' => $shipper_city,
						'StateOrProvinceCode' => $shipper_state,
						'PostalCode' => $shipper_postcode,
						'CountryCode' => $shipper_countrycode,
						'Residential' => true
					)
				),
				'LabelSpecification' => array(
					'LabelFormatType' => 'COMMON2D', // valid values COMMON2D, LABEL_DATA_ONLY
					'ImageType' => 'PDF',  // valid values DPL, EPL2, PDF, ZPLII and PNG
					'LabelStockType' => 'PAPER_7X4.75'
				), 
				
				'PackageCount' => 1,
				'PackageDetail' => 'INDIVIDUAL_PACKAGES', 
				//'RequestedPackageLineItems' => $selected_package_bags_list,                                       
				'RequestedPackageLineItems' => array(
					'0' => array(
						'SequenceNumber'=>1,
						'GroupPackageCount'=>1,
						'Weight' => array(
							'Value' => array_sum($TotalNetWeight),
							'Units' => 'LB'
						),
						/*'Dimensions' => array(
							'Length' => 163,
							'Width' => 124,
							'Height' => 123,
							'Units' => 'IN'
						),
						'CustomerReferences' => array(
							'0' => array(
								'CustomerReferenceType' => 'CUSTOMER_REFERENCE', // valid values CUSTOMER_REFERENCE, INVOICE_NUMBER, 
								'Value' => 'GR4567892'
							), 
							'1' => array(
								'CustomerReferenceType' => 'INVOICE_NUMBER', 
								'Value' => 'INV4567892'
							),
							'2' => array(
								'CustomerReferenceType' => 'P_O_NUMBER', 
								'Value' => 'PO4567892'
							)
						),
						'SpecialServicesRequested' => array(
							//'SpecialServiceTypes' => array('COD'),
							'CodDetail' => array(
								'CodCollectionAmount' => array(
									'Currency' => 'USD', 
									'Amount' => 150
								),
								'CollectionType' => 'ANY' // ANY, GUARANTEED_FUNDS
							)
						)*/
					),
				),
			);

			$requestreturn['RequestedShipment']['ShippingChargesPayment'] = array(
				'PaymentType' => 'SENDER',
				'Payor' => array(
					'ResponsibleParty' => array(
						'AccountNumber' => getProperty('billaccount'),
						'Contact' => null,
						'Address' => array(
							'CountryCode' => 'US'
						)
					)
				)
			);

			$response_return = $client_return->processShipment($requestreturn);
			$fp = fopen(SHIP_LABEL_RETURN, 'wb');   
			fwrite($fp, ($response_return->CompletedShipmentDetail->CompletedPackageDetails->Label->Parts->Image));
			fclose($fp);
			if ($response_return->CompletedShipmentDetail->CompletedPackageDetails->Label->Parts->Image) {
				update_post_meta($order_id, 'fedex_shipping_label_for_return', 'label-for-return-'.$order_id.'.pdf');
			}
		}
	}
}

/*================== function for show lable print btn on view order page ====================*/
/*============================================================================================*/
add_action( 'woocommerce_view_order', 'show_lable_print_btn_on_view_order', 99 );
function show_lable_print_btn_on_view_order( $order_id ){ 

	$trip_type = get_post_meta($order_id, 'trip_type', true);
	$shipping_label = get_post_meta($order_id, 'fedex_shipping_label', true);
	$shipping_label_for_return = get_post_meta($order_id, 'fedex_shipping_label_for_return', true);

	echo '<section>';
		echo '<a href="'.get_stylesheet_directory_uri().'/fedex/label/'.$shipping_label.'" class="woocommerce-button button print-label-btn">Print Label</a>';
		if ($shipping_label_for_return) {	
			echo '<a href="'.get_stylesheet_directory_uri().'/fedex/label/'.$shipping_label_for_return.'" class="woocommerce-button button print-label-btn-return">Label For Return</a>';
		}	
	echo '</section>';
}

/*================== function for create account and login if user not login on checkout ====================*/
/*===========================================================================================================*/
add_action( 'template_redirect', 'sws_up_check_meta_exists' );
function sws_up_check_meta_exists() {
	$guest = $_REQUEST['guest_account'];
	if(isset($guest)){	
		if($guest != 'true'){
			$redirect_to_checkout = wc_get_checkout_url().'/?guest_account=true';
			wp_redirect( esc_url_raw( $redirect_to_checkout ) );
		}
	}
	elseif (is_checkout() && !is_user_logged_in() && empty($_REQUEST['key'])) {
			$redirect = wc_get_account_endpoint_url('my-account').'/?redirect=checkout';
			wp_redirect( esc_url_raw( $redirect ) );
	}

	if( is_account_page() && is_user_logged_in() && (isset($_REQUEST['redirect']) == 'checkout') ) {
		$redirect_to_checkout = wc_get_checkout_url();
		wp_redirect( esc_url_raw( $redirect_to_checkout ) );
	}
}

/*================== function for getSearchLocationsDropOff ====================*/
/*==============================================================================*/
add_action( 'woocommerce_checkout_after_customer_details', 'getSearchLocationsDropOff', 10, 1 );
function getSearchLocationsDropOff() {
	$triptype = $_SESSION['trip_type']; 

	$_SESSION['fedex_service_type'] = 'PickUp';
	$pickup_charge = get_option('fedex_default_pickup_price');
	?>
	<div class="drop-services">
		<label><strong>Handling Method:</strong></label>
		<select name="drop_location" id="drop_location">
			<option value="PickUp">Pick up at my location +<span><?php echo wc_price($pickup_charge); ?></span></option>
			<option value="Self Drop">Drop off at local carrier store</option>
		</select>
	</div>
	<?php 

		/*========================== For Pickup Location ======================================*/
		/*=====================================================================================*/

		echo '<div class="return-pickup"><h5 class="return-bag">Drop off</h5></div>';

		$path_to_wsdl =  get_stylesheet_directory_uri().'/fedex/FedExWebServicesStandardWSDL/LocationsService_v12.wsdl';

		ini_set("soap.wsdl_cache_enabled", "0");

		$client = new SoapClient($path_to_wsdl, array('trace' => 1));

		$request['WebAuthenticationDetail'] = array(
			'ParentCredential' => array(
				'Key' => getProperty('parentkey'),
				'Password' => getProperty('parentpassword')
			),
			'UserCredential' => array(
				'Key' => getProperty('key'), 
				'Password' => getProperty('password')
			)
		);
		$request['ClientDetail'] = array(
			'AccountNumber' => getProperty('shipaccount'), 
			'MeterNumber' => getProperty('meter')
		);
		$request['TransactionDetail'] = array('CustomerTransactionId' => '*** Search Locations Request using PHP ***');
		$request['Version'] = array(
			'ServiceId' => 'locs', 
			'Major' => '12', 
			'Intermediate' => '0', 
			'Minor' => '0'
		);

		$request['EffectiveDate'] = date('Y-m-d', strtotime($_SESSION['arrival_date']));

		$bNearToPhoneNumber = false;
		if ($bNearToPhoneNumber){
			$request['LocationsSearchCriterion'] = 'PHONE_NUMBER';
		    $request['PhoneNumber'] = getProperty('searchlocationphonenumber'); // Replace 'XXX' with phone number
		}else{
		    $request['LocationsSearchCriterion'] = 'ADDRESS';
			//$request['Address'] = getProperty('searchlocationsaddress');
			$request['Address'] = array(
				'StreetLines' => sanitize_text_field($_SESSION['shipper_address']),
				'City' => sanitize_text_field($_SESSION['origin_city']),
				'StateOrProvinceCode' => sanitize_text_field($_SESSION['origin_state_code']),
				'PostalCode' => sanitize_text_field($_SESSION['origin_postal_code']),
				'CountryCode' => sanitize_text_field($_SESSION['origin_country_code']),
			);
		}

		$request['MultipleMatchesAction'] = 'RETURN_ALL';
		$request['SortDetail'] = array(
			'Criterion' => 'DISTANCE',
			'Order' => 'LOWEST_TO_HIGHEST'
		);
		$request['Constraints'] = array(
			'RadiusDistance' => array(
				'Value' => 10,
				'Units' => 'KM'
			),
			'ExpressDropOfTimeNeeded' => '01:00:00.00',

			'RequiredLocationAttributes' => array(
				'ACCEPTS_CASH','ALREADY_OPEN'
			),
			'ResultsRequested' => 4,

			'LocationTypesToInclude' => array('FEDEX_OFFICE')
		);
		$request['DropoffServicesDesired'] = array(
			'Express' => 1, // Location desired services
		    'FedExStaffed' => 1,
		    'FedExSelfService' => 1,
		    'FedExAuthorizedShippingCenter' => 1,
		    'HoldAtLocation' => 1
		);

		try{
			if(setEndpoint('changeEndpoint')){
				$newLocation = $client->__setLocation(setEndpoint('endpoint'));
			}
			
			$response = $client ->searchLocations($request);
			/*echo '<pre>';
			print_r($request);
			//print_r($response);
			echo '</pre>';*/
			if ($response -> HighestSeverity != 'FAILURE' && $response -> HighestSeverity != 'ERROR'){
				$html = "";
				if(is_array($response->AddressToLocationRelationships->DistanceAndLocationDetails)){

					foreach ($response->AddressToLocationRelationships->DistanceAndLocationDetails  as $location){

						$Company_Name = $location->LocationDetail->LocationContactAndAddress->Contact->CompanyName;
						$Phone_Number = $location->LocationDetail->LocationContactAndAddress->Contact->PhoneNumber;
						$Street_Lines = $location->LocationDetail->LocationContactAndAddress->Address->StreetLines;
						$City = $location->LocationDetail->LocationContactAndAddress->Address->City;
						$Postal_Code = $location->LocationDetail->LocationContactAndAddress->Address->PostalCode;
						$Country_Code = $location->LocationDetail->LocationContactAndAddress->Address->CountryCode;
						$lat =  $_SESSION['origin_lat'];
						$long =  $_SESSION['origin_long'];

						$html .= '<li class="office ui-selectee origin" comapny_name="' . $Company_Name .'" Street_Lines="' . $Street_Lines .'"  City="' . $City .'" Country_Code="' . $Country_Code .'" Postal_Code="' . $Postal_Code .'"  phone_number= "'. $Phone_Number .'">
						<div class="info-text ui-selectee">
						<span class="title ui-selectee">' . $Company_Name .'</span> 
						<span class="address ui-selectee">' .$Street_Lines. ' '.$City.' '.$Country_Code. ' '.$Postal_Code.'</span>
						<span class="phone ui-selectee">Phone: '. $Phone_Number .'</span>
						</div>
						</li>';
					}
				}
				else{
					$Company_Name = $response->AddressToLocationRelationships->DistanceAndLocationDetails->LocationDetail->LocationContactAndAddress->Contact->CompanyName;
					$Phone_Number = $response->AddressToLocationRelationships->DistanceAndLocationDetails->LocationDetail->LocationContactAndAddress->Contact->PhoneNumber;
					$Street_Lines = $response->AddressToLocationRelationships->DistanceAndLocationDetails->LocationDetail->LocationContactAndAddress->Address->StreetLines;
					$City = $response->AddressToLocationRelationships->DistanceAndLocationDetails->LocationDetail->LocationContactAndAddress->Address->City;
					$Postal_Code = $response->AddressToLocationRelationships->DistanceAndLocationDetails->LocationDetail->LocationContactAndAddress->Address->PostalCode;
					$Country_Code = $response->AddressToLocationRelationships->DistanceAndLocationDetails->LocationDetail->LocationContactAndAddress->Address->CountryCode;
					$Geographic_Coordinates = $response->AddressToLocationRelationships->DistanceAndLocationDetails->LocationDetail->LocationContactAndAddress->Address->GeographicCoordinates;
					$geolocation =  str_replace("/"," ",$Geographic_Coordinates);
					$lat =  $_SESSION['origin_lat'];
					$long =  $_SESSION['origin_long'];


					$html .= '<li class="office ui-selectee origin" comapny_name="' . $Company_Name .'" Street_Lines="' . $Street_Lines .'"  City="' . $City .'" Country_Code="' . $Country_Code .'" Postal_Code="' . $Postal_Code .'"  phone_number= "'. $Phone_Number .'">
					  	<div class="info-text ui-selectee">
					  	 <span class="title ui-selectee">' . $Company_Name .'</span> 
					  	 <span class="address ui-selectee">' .$Street_Lines. ' '.$City.' '.$Country_Code. ' '.$Postal_Code.'</span>
					  	  <span class="phone ui-selectee">Phone: '. $Phone_Number .'</span>
					  	</div>
					  	</li>';
				} ?>
					<div class="fedex-location">	
						<div class="fedex-list">
							<input type="hidden" name="fedexlocation[Company_Name]"  id="Company_Name" value ="">
							<input type="hidden" name="fedexlocation[Street_Lines]"  id="Street" value ="">
							<input type="hidden" name="fedexlocation[City]" id="City" value ="">
							<input type="hidden" name="fedexlocation[Country_Code]"  id="Country_Code" value ="">
							<input type="hidden" name="fedexlocation[Postal_Code]" id="Postal_Code" value ="">
							<input type="hidden" name="fedexlocation[Phone_Number]" id="Phone_Number" value =""> 
							<ul class="offices ui-selectable" >
							<?php echo $html;  ?>
							</ul>
						</div>
						<div class="fedex-map">
							<iframe width="700" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?php echo $lat;?> , <?php echo $long;?>&z=15&output=embed" >
							</iframe>
						</div>
					</div>
				<?php
				//printSuccess($client, $response);
			}else{
				$highestSeverity=$response->HighestSeverity;
				if($highestSeverity=="SUCCESS"){
					$message = $response->Notifications->Message;
				}
				if($highestSeverity=="WARNING"){
					$message = $response->Notifications->Message;
				}
				if($highestSeverity=="ERROR"){
					$message = $response->Notifications->Message;
				}
				if($highestSeverity=="FAILURE"){
					$message = $response->Notifications->Message;
				}
				echo '<div class="fedex-location"><p>'.$message.'</p></div>';
				// printError($client, $response);
				
				echo '<input type="hidden" name="fedex_location_error"  id="fedex_location_error" value ="null">';
			}
			writeToLog($client); 
		} catch (SoapFault $exception) {
		// printFault($exception, $client);
		}

		/*========================== For Return Pickup Location ======================================*/
		/*============================================================================================*/
		if($triptype == 'Round Trip') {
			echo '<div class="return-pickup"><h5 class="return-bag">Return Drop off</h5></div>';
			$path_to_wsdl =  get_stylesheet_directory_uri().'/fedex/FedExWebServicesStandardWSDL/LocationsService_v12.wsdl';
				ini_set("soap.wsdl_cache_enabled", "0");

				$client = new SoapClient($path_to_wsdl, array('trace' => 1));

				$request['WebAuthenticationDetail'] = array(
						'ParentCredential' => array(
							'Key' => getProperty('parentkey'),
							'Password' => getProperty('parentpassword')
						),
						'UserCredential' => array(
							'Key' => getProperty('key'), 
							'Password' => getProperty('password')
					)
				);
				$request['ClientDetail'] = array(
					'AccountNumber' => getProperty('shipaccount'), 
					'MeterNumber' => getProperty('meter')
				);
				$request['TransactionDetail'] = array('CustomerTransactionId' => '*** Search Locations Request using PHP ***');
				$request['Version'] = array(
					'ServiceId' => 'locs', 
					'Major' => '12', 
					'Intermediate' => '0', 
					'Minor' => '0'
				);
				$request['EffectiveDate'] = date('Y-m-d', strtotime($_SESSION['return_date']));

				$bNearToPhoneNumber = false;
				if ($bNearToPhoneNumber){
					$request['LocationsSearchCriterion'] = 'PHONE_NUMBER';
					$request['PhoneNumber'] = getProperty('searchlocationphonenumber'); // Replace 'XXX' with phone number
				}else{
					$request['LocationsSearchCriterion'] = 'ADDRESS';
					//$request['Address'] = getProperty('searchlocationsaddress');
					$request['Address'] =  array(
						'StreetLines' => sanitize_text_field($_SESSION['recipient_address']),
						'City' => sanitize_text_field($_SESSION['destination_city']),
						'StateOrProvinceCode' => sanitize_text_field($_SESSION['destination_state_code']),
						'PostalCode' => sanitize_text_field($_SESSION['destination_postal_code']),
						'CountryCode' => sanitize_text_field($_SESSION['destination_country_code']),
					);
				}

				$request['MultipleMatchesAction'] = 'RETURN_ALL';
				$request['SortDetail'] = array(
					'Criterion' => 'DISTANCE',
					'Order' => 'LOWEST_TO_HIGHEST'
				);
				$request['Constraints'] = array(
					'RadiusDistance' => array(
						'Value' => 100,
						'Units' => 'KM'
					),
					'ExpressDropOfTimeNeeded' => '01:00:00.00',

					'RequiredLocationAttributes' => array(
						'ACCEPTS_CASH','ALREADY_OPEN'
					),
					'ResultsRequested' => 4,

					'LocationTypesToInclude' => array('FEDEX_OFFICE')
				);
				$request['DropoffServicesDesired'] = array(
					'Express' => 1, // Location desired services
					'FedExStaffed' => 1,
					'FedExSelfService' => 1,
					'FedExAuthorizedShippingCenter' => 1,
					'HoldAtLocation' => 1
				);

				try{
					if(setEndpoint('changeEndpoint')){
						$newLocation = $client->__setLocation(setEndpoint('endpoint'));
					}
					
					$response = $client ->searchLocations($request);
					/*echo '<pre>';
					print_r($request);
					print_r($response);
					echo '</pre>';*/
					if ($response -> HighestSeverity != 'FAILURE' && $response -> HighestSeverity != 'ERROR'){
						$html = "";
						if(is_array($response->AddressToLocationRelationships->DistanceAndLocationDetails)){

							foreach ($response->AddressToLocationRelationships->DistanceAndLocationDetails  as $location){

								$Company_Name = $location->LocationDetail->LocationContactAndAddress->Contact->CompanyName;
								$Phone_Number = $location->LocationDetail->LocationContactAndAddress->Contact->PhoneNumber;
								$Street_Lines = $location->LocationDetail->LocationContactAndAddress->Address->StreetLines;
								$City = $location->LocationDetail->LocationContactAndAddress->Address->City;
								$Postal_Code = $location->LocationDetail->LocationContactAndAddress->Address->PostalCode;
								$Country_Code = $location->LocationDetail->LocationContactAndAddress->Address->CountryCode;
								$lat =  $_SESSION['destination_lat'];
								$long =  $_SESSION['destination_long'];

								$html .= '<li class="office ui-selectee return" comapny_name="' . $Company_Name .'" Street_Lines="' . $Street_Lines .'"  City="' . $City .'" Country_Code="' . $Country_Code .'" Postal_Code="' . $Postal_Code .'"  phone_number= "'. $Phone_Number .'">
								<div class="info-text ui-selectee">
								<span class="title ui-selectee">' . $Company_Name .'</span> 
								<span class="address ui-selectee">' .$Street_Lines. ' '.$City.' '.$Country_Code. ' '.$Postal_Code.'</span>
								<span class="phone ui-selectee">Phone: '. $Phone_Number .'</span>
								</div>
								</li>';
							}
						}
						else{
							$Company_Name = $response->AddressToLocationRelationships->DistanceAndLocationDetails->LocationDetail->LocationContactAndAddress->Contact->CompanyName;
							$Phone_Number = $response->AddressToLocationRelationships->DistanceAndLocationDetails->LocationDetail->LocationContactAndAddress->Contact->PhoneNumber;
							$Street_Lines = $response->AddressToLocationRelationships->DistanceAndLocationDetails->LocationDetail->LocationContactAndAddress->Address->StreetLines;
							$City = $response->AddressToLocationRelationships->DistanceAndLocationDetails->LocationDetail->LocationContactAndAddress->Address->City;
							$Postal_Code = $response->AddressToLocationRelationships->DistanceAndLocationDetails->LocationDetail->LocationContactAndAddress->Address->PostalCode;
							$Country_Code = $response->AddressToLocationRelationships->DistanceAndLocationDetails->LocationDetail->LocationContactAndAddress->Address->CountryCode;
							$Geographic_Coordinates = $response->AddressToLocationRelationships->DistanceAndLocationDetails->LocationDetail->LocationContactAndAddress->Address->GeographicCoordinates;
							$geolocation =  str_replace("/"," ",$Geographic_Coordinates);
							$lat =  $_SESSION['origin_lat'];
							$long =  $_SESSION['origin_long'];


							$html .= '<li class="office ui-selectee return" comapny_name="' . $Company_Name .'" Street_Lines="' . $Street_Lines .'"  City="' . $City .'" Country_Code="' . $Country_Code .'" Postal_Code="' . $Postal_Code .'"  phone_number= "'. $Phone_Number .'">
							<div class="info-text ui-selectee">
							<span class="title ui-selectee">' . $Company_Name .'</span> 
							<span class="address ui-selectee">' .$Street_Lines. ' '.$City.' '.$Country_Code. ' '.$Postal_Code.'</span>
							<span class="phone ui-selectee">Phone: '. $Phone_Number .'</span>
							</div>
							</li>';
						} ?>
						<div class="fedex-location">	
							<div class="fedex-list">
								<input type ="hidden" name ="fedexlocationdestination[Company_Name]"  id="Company_Name_destination" value ="">
								<input type ="hidden" name ="fedexlocationdestination[Street_Lines]"  id="Street_destination" value ="">
								<input type ="hidden" name ="fedexlocationdestination[City]" id="City_destination" value ="">
								<input type ="hidden" name ="fedexlocationdestination[Country_Code]"  id="Country_Code_destination" value ="">
								<input type ="hidden" name ="fedexlocationdestination[Postal_Code]" id="Postal_Code_destination" value ="">
								<input type ="hidden" name ="fedexlocationdestination[Phone_Number]" id="Phone_Number_destination" value =""> 
								<ul class="offices ui-selectable" >
								<?php echo $html;  ?>
								</ul>
							</div>
							<div class="fedex-map">
								<iframe width="700" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?php echo $lat;?> , <?php echo $long;?>&z=15&output=embed" ></iframe>
							</div>
						</div>
						<?php	   
						//printSuccess($client, $response);
					} else{
						$highestSeverity=$response->HighestSeverity;
						if($highestSeverity=="SUCCESS"){
							$message = $response->Notifications->Message;
						}
						if($highestSeverity=="WARNING"){
							$message = $response->Notifications->Message;
						}
						if($highestSeverity=="ERROR"){
							$message = $response->Notifications->Message;
						}
						if($highestSeverity=="FAILURE"){
							$message = $response->Notifications->Message;
						}
						echo '<div class="fedex-location"><p>'.$message.'</p></div>';
						// printError($client, $response);
						echo '<input type="hidden" name="fedex_location_error"  id="fedex_location_error" value ="error">';
					} 

					writeToLog($client);    // Write to log file   
				} catch (SoapFault $exception) {
					// printFault($exception, $client);
				}
		}
}

function printString($value, $spacer, $description){
	echo '<tr><td>'.$description.'</td><td>'.$value.'</td></tr>';
}

function locationDetails($details, $spacer){
	foreach($details as $key => $value){
		if(is_array($value) || is_object($value)){
        	$newSpacer = $spacer. '&nbsp;&nbsp;&nbsp;&nbsp;';
    		echo '<tr><td>'.'</td><td>'.$spacer .$key.'</td><td>&nbsp;</td></tr>';
    		locationDetails($value, $newSpacer);
    	}elseif(empty($value)){
    		if (!is_numeric($value)){
    			echo '<tr><td>'.'</td><td>'.$spacer.$key .'</td><td>&nbsp;</td></tr>';
    		}
    	}else{
    		echo '<tr><td>'.'</td><td>'.$spacer.$key.'</td><td>'.$value.'</td></tr>';
    	}
    }
}

/*================== function for save value for pickup dropoff options ====================*/
/*==========================================================================================*/
add_action('woocommerce_checkout_create_order', 'save_order_custom_meta_data', 10, 2 );
function save_order_custom_meta_data( $order, $data ) {
	$order->update_meta_data( 'fedexlocation', $_REQUEST['fedexlocation'] );
	$order->update_meta_data( 'fedexlocationdestination', $_REQUEST['fedexlocationdestination'] );
	$order->update_meta_data( 'droplocation', $_REQUEST['drop_location'] );
}

/*================== function for (Most Popular) option on product page in admin ====================*/
/*===================================================================================================*/
add_action('woocommerce_product_options_general_product_data', 'woocommerce_product_custom_fields');
function woocommerce_product_custom_fields(){
	global $woocommerce, $post;
	echo '<div class="product_custom_field">';
		woocommerce_wp_checkbox(
			array(
				'id' => '_custom_product_most__popular_field',
				'placeholder' => 'Custom Product Checkbox Field',
				'label' => __('Most Popular', 'woocommerce'),
				'desc_tip' => 'true'
			)
		);
	echo '</div>';
}

/*================== function for save value (Most Popular) ====================*/
/*==============================================================================*/
add_action('woocommerce_process_product_meta', 'woocommerce_product_custom_fields_save');
function woocommerce_product_custom_fields_save($post_id){
	// Custom Product Text Field
	$woocommerce_custom_product_checkbox_field = $_POST['_custom_product_most__popular_field'];
	if (!empty($woocommerce_custom_product_checkbox_field )){
		update_post_meta($post_id, '_custom_product_most__popular_field', esc_attr($woocommerce_custom_product_checkbox_field ));
	}
	else{
		update_post_meta($post_id, '_custom_product_most__popular_field', '');
	}
}

/*================== function for "show checkout as guest optoin"  ====================*/
/*=====================================================================================*/
add_action( 'xoo_el_before_form','bbloomer_add_login_text' );
function bbloomer_add_login_text() {
	echo '<a href="'.wc_get_checkout_url().'?guest_account=checkout"><p class="bb-login-subtitle">Checkout As Guest</p></a>';
}

/*================== function for "show checkout as guest optoin"  ====================*/
/*=====================================================================================*/
add_action( 'woocommerce_checkout_before_customer_details', 'action_woocommerce_checkout_before_customer_details', 10, 1 ); 
function action_woocommerce_checkout_before_customer_details( $wccm_checkout_text_before ) { 
	echo '<a href="'.site_url().'/pricing/"><button type="button" class="back-button">< Back</button></a>';
}

/*================== function for change return to shop url  ====================*/
/*===============================================================================*/
add_filter( 'woocommerce_return_to_shop_redirect', 'return_to_shop_url_change' );
function return_to_shop_url_change() {
	$url = site_url();
	return esc_url( $url );
}

/*================== function for change return to shop text ====================*/
/*===============================================================================*/
add_filter( 'woocommerce_return_to_shop_text', 'return_to_shop_text_change' );
function return_to_shop_text_change() {
	$text = 'Return to home'; 
	return $text;
}

/*================== function for general settings fedex_default_pickup_price ====================*/
/*================================================================================================*/
add_filter('woocommerce_general_settings', 'general_settings_fedex_pickup_price');
function general_settings_fedex_pickup_price($settings) {
    $key = 0;
    //echo get_option('fedex_default_pickup_price');
    foreach( $settings as $values ){
        $new_settings[$key] = $values;
        $key++;

        // Inserting array just after the post code in "Store Address" section
        if($values['id'] == 'woocommerce_store_postcode'){
            $new_settings[$key] = array(
                'title'    => __('Fedex Default Pickup Price'),
                'desc'     => __('Add Default Pickup Price'),
                'id'       => 'fedex_default_pickup_price',
                'default'  => '',
                'type'     => 'text',
                'desc_tip' => true,
            );
            $key++;
        }
    }
    return $new_settings;
}

/*============== ajax function for get one way quote for fedex ==============*/
/*===========================================================================*/
add_action('wp_ajax_update_fedex_extra_surcharge', 'update_fedex_extra_surcharge_function');
add_action('wp_ajax_nopriv_update_fedex_extra_surcharge', 'update_fedex_extra_surcharge_function');
function update_fedex_extra_surcharge_function(){

	if ( !session_id() ){
		session_start();
	}
	if (!empty($_REQUEST['service_type'])) {
		$_SESSION['fedex_service_type'] = $_REQUEST['service_type'];
	}
	echo json_encode(array('status'=>'1','service_type' => true));
	exit;
}

/*================== function for add fedex extra fee ====================*/
/*========================================================================*/
add_action( 'woocommerce_cart_calculate_fees','woocommerce_fedex_extra_surcharge');
function woocommerce_fedex_extra_surcharge() {
	global $woocommerce;
	if ( !session_id() ){
		session_start();
	}
	if ( is_admin() && ! defined( 'DOING_AJAX' ) )
		return;

	if ($_SESSION['fedex_service_type'] == 'Self Drop'){
		$surcharge = 0;
		$_SESSION['fedex_service_type'] == 'PickUp';
		$woocommerce->cart->add_fee('Pickup Surcharge', $surcharge, false, 'fedex_pickup' );
	}
	else {
		$_SESSION['fedex_service_type'] == 'PickUp';
		$surcharge = get_option('fedex_default_pickup_price');
		$woocommerce->cart->add_fee('Pickup Surcharge', $surcharge, false, 'fedex_pickup' );
	}
}

/*================== function for add checkout validation ====================*/
/*============================================================================*/
add_action( 'woocommerce_after_checkout_validation', 'validate_checkout', 10, 2); 
function validate_checkout( $data, $errors ){

	if ($_POST['drop_location'] == 'Self Drop') {
		if (empty($_POST['fedex_location_error'])) {
			if (!array_filter($_POST['fedexlocation'])){
				//echo 'Please select a fedex location...';
				wc_add_notice( 'Please select a self drop fedex location', 'error' );
			}

			$triptype = $_SESSION['trip_type'];
			if ($triptype  == 'Round Trip') {
				if (!array_filter($_POST['fedexlocationdestination'])){ 
					//echo 'Please select a return pickup fedex location...';
					wc_add_notice( 'Please select a return pickup fedex location...', 'error' );
				}
			}
		}
		else{
			wc_add_notice( '<strong>Please Select Type Off Services:</strong> Pickup', 'error' );
		}
	}
}

/*================== test fucntion for footer ====================*/
//add_action( 'wp_footer', 'custom_test_footer_fucntion');
function custom_test_footer_fucntion() {
	if ( !session_id() ){
		session_start();
	}
	
	$path_to_wsdl = get_stylesheet_directory_uri().'/fedex/FedExWebServicesStandardWSDL/ShipService_v26.wsdl';

	define('SHIP_MASTERLABEL', 'wp-content/themes/sportshipper/fedex/label/shipmasterlabel_new.pdf');

	ini_set("soap.wsdl_cache_enabled", "0");

	$client = new SoapClient($path_to_wsdl, array('trace' => 1)); 


	$request['WebAuthenticationDetail'] = array(
		'ParentCredential' => array(
			'Key' => getProperty('parentkey'), 
			'Password' => getProperty('parentpassword')
		),
		'UserCredential' => array(
			'Key' => getProperty('key'), 
			'Password' => getProperty('password')
		),
	);

	$request['ClientDetail'] = array(
		'AccountNumber' => getProperty('shipaccount'), 
		'MeterNumber' => getProperty('meter')
	);
	$request['TransactionDetail'] = array('CustomerTransactionId' => 'ProcessShip_Basic');
	$request['Version'] = array(
		'ServiceId' => 'ship', 
		'Major' => '26', 
		'Intermediate' => '0', 
		'Minor' => '0'
	);
	$request['Origin'] = array(
		'PostalCode' => sanitize_text_field($_SESSION['destination_postal_code']), // Origin details
		'CountryCode' => sanitize_text_field($_SESSION['destination_country_code'])
	);
	$request['Destination'] = array(
		'PostalCode' => sanitize_text_field($_SESSION['origin_postal_code']), // Destination details
		'CountryCode' => sanitize_text_field($_SESSION['origin_country_code'])
	);
	$request['RequestedShipment'] = array(
		'ShipTimestamp' => '2021-09-01T15:46:24-06:00',
		'DropoffType' => 'REGULAR_PICKUP', // valid values REGULAR_PICKUP, REQUEST_COURIER, DROP_BOX, BUSINESS_SERVICE_CENTER and 
		'ServiceType' => 'PRIORITY_OVERNIGHT', // valid values STANDARD_OVERNIGHT, PRIORITY_OVERNIGHT, FEDEX_GROUND, ...
		'PackagingType' => 'YOUR_PACKAGING', // valid values FEDEX_BOX, FEDEX_PAK, FEDEX_TUBE, YOUR_PACKAGING, ...
		'Shipper' => array(
			'Contact' => array(
				'PersonName' => 'Person Name',
				'CompanyName' => 'Company Name',
				'PhoneNumber' => '400-2345-3489'
			),
			'Address' => array(
				'StreetLines' => sanitize_text_field($_SESSION['shipper_address']),
				'City' => sanitize_text_field($_SESSION['origin_city']),
				'StateOrProvinceCode' => sanitize_text_field($_SESSION['origin_state_code']),
				'PostalCode' => sanitize_text_field($_SESSION['origin_postal_code']),
				'CountryCode' => sanitize_text_field($_SESSION['origin_country_code']),
			)
		),
		'Recipient' => array(
			'Contact' => array(
				'PersonName' => 'Liana',
				'CompanyName' => 'Erida',
				'PhoneNumber' => '1234567890'
			),
			'Address' => array(
				'StreetLines' => sanitize_text_field($_SESSION['recipient_address']),
				'City' => sanitize_text_field($_SESSION['destination_city']),
				'StateOrProvinceCode' => sanitize_text_field($_SESSION['destination_state_code']),
				'PostalCode' => sanitize_text_field($_SESSION['destination_postal_code']),
				'CountryCode' => sanitize_text_field($_SESSION['destination_country_code']),
				'Residential' => true
			)
		),
		'LabelSpecification' => array(
			'LabelFormatType' => 'COMMON2D', // valid values COMMON2D, LABEL_DATA_ONLY
			'ImageType' => 'PDF',  // valid values DPL, EPL2, PDF, ZPLII and PNG
			'LabelStockType' => 'PAPER_7X4.75'
		), 
		
		'PackageCount' => 1,
		'PackageDetail' => 'INDIVIDUAL_PACKAGES',                                        
		'RequestedPackageLineItems' => array(
			'0' => array(
				'SequenceNumber'=>1,
				'GroupPackageCount'=>1,
				'Weight' => array(
					'Value' => 50.0,
					'Units' => 'LB'
				),
				'Dimensions' => array(
					'Length' => 108,
					'Width' => 5,
					'Height' => 5,
					'Units' => 'IN'
				),
				/*'CustomerReferences' => array(
					'0' => array(
						'CustomerReferenceType' => 'CUSTOMER_REFERENCE', // valid values CUSTOMER_REFERENCE, INVOICE_NUMBER, 
						'Value' => 'GR4567892'
					), 
					'1' => array(
						'CustomerReferenceType' => 'INVOICE_NUMBER', 
						'Value' => 'INV4567892'
					),
					'2' => array(
						'CustomerReferenceType' => 'P_O_NUMBER', 
						'Value' => 'PO4567892'
					)
				),
				'SpecialServicesRequested' => array(
					//'SpecialServiceTypes' => array('COD'),
					'CodDetail' => array(
						'CodCollectionAmount' => array(
							'Currency' => 'USD', 
							'Amount' => 150
						),
						'CollectionType' => 'ANY' // ANY, GUARANTEED_FUNDS
					)
				)*/
			)
		)
	);
	$request['RequestedShipment']['ShippingChargesPayment'] = array(
		'PaymentType' => 'SENDER',
		'Payor' => array(
			'ResponsibleParty' => array(
				'AccountNumber' => getProperty('billaccount'),
				'Contact' => null,
				'Address' => array(
					'CountryCode' => 'US'
				)
			)
		)
	);


	$response = $client->processShipment($request); 

	$fp = fopen(SHIP_MASTERLABEL, 'wb');   
	fwrite($fp, ($response->CompletedShipmentDetail->CompletedPackageDetails->Label->Parts->Image));
	fclose($fp);
	//echo '<a href="./'.SHIP_MASTERLABEL.'">'.SHIP_MASTERLABEL.'</a> was generated. Processing package# 1 ...'; 
}
?>