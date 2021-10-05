<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6acveu0WDTTMWBCrtOWNyveqONTv4jjM&callback=initialize&libraries=places&sensor=false&v=weekly&signed_in=true" async></script>

<script type="text/javascript">

	function initialize() {

		var latlng = new google.maps.LatLng(45.780363,15.974286);

		var map = new google.maps.Map(document.getElementById('map'), {
			center: latlng,
			zoom: 8
		});
		var marker = new google.maps.Marker({
			map: map,
			position: latlng,
			draggable: true,
			anchorPoint: new google.maps.Point(0, -29)
		});
		var input = document.getElementById('one_way_from');
		//map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
		var geocoder = new google.maps.Geocoder();
		var autocomplete_one_way_from = new google.maps.places.Autocomplete(input);


		var input = document.getElementById('one_way_to');
		//map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
		var geocoder = new google.maps.Geocoder();
		var autocomplete_one_way_to = new google.maps.places.Autocomplete(input);

		var input = document.getElementById('round_trip_from');
		//map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
		var geocoder = new google.maps.Geocoder();
		var autocomplete_round_trip_from = new google.maps.places.Autocomplete(input);


		var input = document.getElementById('round_trip_to');
		//map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
		var geocoder = new google.maps.Geocoder();
		var autocomplete_round_trip_to = new google.maps.places.Autocomplete(input);

		/*======================= for autocomplete_one_way_from field =========================*/
		autocomplete_one_way_from.bindTo('bounds', map);
		var infowindow = new google.maps.InfoWindow();   
		autocomplete_one_way_from.addListener('place_changed', function() {
			infowindow.close();
			marker.setVisible(false);
			var place = autocomplete_one_way_from.getPlace();
			if (!place.geometry) {
				window.alert("Autocomplete's returned place contains no geometry");
				return;
			}

			if (place.geometry.viewport) {
				map.fitBounds(place.geometry.viewport);
			} else {
				map.setCenter(place.geometry.location);
				map.setZoom(17);
			}

			marker.setPosition(place.geometry.location);
			marker.setVisible(true);          

			bindDataOneWayForm(place.formatted_address,place.geometry.location.lat(),place.geometry.location.lng(),place.address_components);
			infowindow.setContent(place.formatted_address);
			infowindow.open(map, marker);

		});

		/*======================= for autocomplete_one_way_to field =========================*/
		autocomplete_one_way_to.bindTo('bounds', map);
		var infowindow = new google.maps.InfoWindow();   
		autocomplete_one_way_to.addListener('place_changed', function() {
			infowindow.close();
			marker.setVisible(false);
			var place = autocomplete_one_way_to.getPlace();
			if (!place.geometry) {
				window.alert("Autocomplete's returned place contains no geometry");
				return;
			}

			if (place.geometry.viewport) {
				map.fitBounds(place.geometry.viewport);
			} else {
				map.setCenter(place.geometry.location);
				map.setZoom(17);
			}

			marker.setPosition(place.geometry.location);
			marker.setVisible(true);          

			bindDataOneWayTo(place.formatted_address,place.geometry.location.lat(),place.geometry.location.lng(),place.address_components);
			infowindow.setContent(place.formatted_address);
			infowindow.open(map, marker);

		});

		/*======================= for autocomplete_round_trip_from field =========================*/
		autocomplete_round_trip_from.bindTo('bounds', map);
		var infowindow = new google.maps.InfoWindow();   
		autocomplete_round_trip_from.addListener('place_changed', function() {
			infowindow.close();
			marker.setVisible(false);
			var place = autocomplete_round_trip_from.getPlace();
			if (!place.geometry) {
				window.alert("Autocomplete's returned place contains no geometry");
				return;
			}

			if (place.geometry.viewport) {
				map.fitBounds(place.geometry.viewport);
			} else {
				map.setCenter(place.geometry.location);
				map.setZoom(17);
			}

			marker.setPosition(place.geometry.location);
			marker.setVisible(true);          

			bindData_RTT_Form(place.formatted_address,place.geometry.location.lat(),place.geometry.location.lng(),place.address_components);
			infowindow.setContent(place.formatted_address);
			infowindow.open(map, marker);

		});

		/*======================= for autocomplete_round_trip_to field =========================*/
		autocomplete_round_trip_to.bindTo('bounds', map);
		var infowindow = new google.maps.InfoWindow();   
		autocomplete_round_trip_to.addListener('place_changed', function() {
			infowindow.close();
			marker.setVisible(false);
			var place = autocomplete_round_trip_to.getPlace();
			if (!place.geometry) {
				window.alert("Autocomplete's returned place contains no geometry");
				return;
			}

			if (place.geometry.viewport) {
				map.fitBounds(place.geometry.viewport);
			} else {
				map.setCenter(place.geometry.location);
				map.setZoom(17);
			}

			marker.setPosition(place.geometry.location);
			marker.setVisible(true);          

			bindData_RTF_To(place.formatted_address,place.geometry.location.lat(),place.geometry.location.lng(),place.address_components);
			infowindow.setContent(place.formatted_address);
			infowindow.open(map, marker);

		});
	}

	function bindDataOneWayForm(address,lat,lng,address_components){

		var address = '';
		var postcode = '';
		var city = '';
		for (const component of address_components) {
			const componentType = component.types[0];
			switch (componentType) {
				case "street_number": {
					address += component.long_name + ', ';
					break;
				}

				case "route": {
					address += component.long_name + ', ';
					break;
				}

				case "sublocality_level_1":
					address += component.long_name + ', ';
				break;

				case "locality":
					address += component.long_name + ', ';

					city = component.long_name;
				break;

				case "postal_code": {
					postcode = component.long_name;
					break;
				}

				case "administrative_area_level_2":
					city = component.long_name;
				break;

				case "administrative_area_level_1": {
					var state = component.long_name;
					var state_code = component.short_name;
					break;
				}

				case "country":
					var country = component.long_name;
					var country_code = component.short_name;
				break;
			}
		}

		document.getElementById('from_one_way_city').value = city;
		document.getElementById('from_one_way_lat').value = lat;
		document.getElementById('from_one_way_lng').value = lng;
		document.getElementById('from_one_way_state_code').value = state_code;
		document.getElementById('from_one_way_postal_code').value = postcode;
		document.getElementById('from_one_way_country_code').value = country_code;

		if(postcode == '') {
			var geocoder = new google.maps.Geocoder();
			const latlng = {
				lat: parseFloat(lat),
				lng: parseFloat(lng),
			};
			geocoder.geocode({ 'latLng': latlng }, function (results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					for (const component of results[0]['address_components']) {
						const componentType = component.types[0];
						switch (componentType) {
							case "postal_code": {
								post_code = component.long_name;
							break;
							}
							case "locality":
								city = component.long_name;
							break;

							case "administrative_area_level_2":
								city = component.long_name;
							break;
						}
					}
					document.getElementById('from_one_way_postal_code').value = post_code;
				}
			});
		}
	}

	function bindDataOneWayTo(address,lat,lng,address_components){

		var address = '';
		var postcode = '';
		var city = '';
		for (const component of address_components) {
			const componentType = component.types[0];
			switch (componentType) {
				case "street_number": {
					address += component.long_name + ', ';
					break;
				}

				case "route": {
					address += component.long_name + ', ';
					break;
				}

				case "sublocality_level_1":
					address += component.long_name + ', ';
				break;

				case "locality":
					address += component.long_name + ', ';

					city = component.long_name;
				break;

				case "postal_code": {
					postcode = component.long_name;
					break;
				}

				case "administrative_area_level_2":
					city = component.long_name;
				break;

				case "administrative_area_level_1": {
					var state = component.long_name;
					var state_code = component.short_name;
					break;
				}

				case "country":
					var country = component.long_name;
					var country_code = component.short_name;
				break;
			}
		}

		document.getElementById('to_one_way_city').value = city;
		document.getElementById('to_one_way_lat').value = lat;
		document.getElementById('to_one_way_lng').value = lng;
		document.getElementById('to_one_way_state_code').value = state_code;
		document.getElementById('to_one_way_postal_code').value = postcode;
		document.getElementById('to_one_way_country_code').value = country_code;

		if(postcode == '') {
			var geocoder = new google.maps.Geocoder();
			const latlng = {
				lat: parseFloat(lat),
				lng: parseFloat(lng),
			};
			geocoder.geocode({ 'latLng': latlng }, function (results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					for (const component of results[0]['address_components']) {
						const componentType = component.types[0];
						switch (componentType) {
							case "postal_code": {
								post_code = component.long_name;
								break;
							}
							case "locality":
								city = component.long_name;
							break;

							case "administrative_area_level_2":
								city = component.long_name;
							break;
						}
					}
					document.getElementById('to_one_way_postal_code').value = post_code;
					document.getElementById('to_one_way_city').value = city;
				}
			});
		}
	}

	function bindData_RTT_Form(address,lat,lng,address_components){
		var address = '';
		var postcode = '';
		var city = '';
		for (const component of address_components) {
			const componentType = component.types[0];
			switch (componentType) {
				case "street_number": {
					address += component.long_name + ', ';
					break;
				}

				case "route": {
					address += component.long_name + ', ';
					break;
				}

				case "sublocality_level_1":
					address += component.long_name + ', ';
				break;

				case "locality":
					address += component.long_name + ', ';

					city = component.long_name;
				break;

				case "postal_code": {
					postcode = component.long_name;
					break;
				}

				case "administrative_area_level_2":
					city = component.long_name;
				break;

				case "administrative_area_level_1": {
					var state = component.long_name;
					var state_code = component.short_name;
					break;
				}

				case "country":
					var country = component.long_name;
					var country_code = component.short_name;
				break;
			}
		}

		document.getElementById('from_round_trip_city').value = city;
		document.getElementById('from_round_trip_lat').value = lat;
		document.getElementById('from_round_trip_long').value = lng;
		document.getElementById('from_round_trip_state_code').value = state_code;
		document.getElementById('from_round_trip_postal_code').value = postcode;
		document.getElementById('from_round_trip_country_code').value = country_code;

		if(postcode == '') {
			var geocoder = new google.maps.Geocoder();
			const latlng = {
				lat: parseFloat(lat),
				lng: parseFloat(lng),
			};
			geocoder.geocode({ 'latLng': latlng }, function (results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					for (const component of results[0]['address_components']) {
						const componentType = component.types[0];
						switch (componentType) {
							case "postal_code": {
								post_code = component.long_name;
								break;
							}
							case "locality":
								city = component.long_name;
							break;

							case "administrative_area_level_2":
								city = component.long_name;
							break;
						}
					}
					document.getElementById('from_round_trip_postal_code').value = post_code;
					document.getElementById('from_round_trip_city').value = city;
				}
			});
		}
	}

	function bindData_RTF_To(address,lat,lng,address_components){

		var address = '';
		var postcode = '';
		var city = '';
		for (const component of address_components) {
			const componentType = component.types[0];
			switch (componentType) {
				case "street_number": {
					address += component.long_name + ', ';
					break;
				}

				case "route": {
					address += component.long_name + ', ';
					break;
				}

				case "sublocality_level_1":
					address += component.long_name + ', ';
				break;

				case "locality":
					address += component.long_name + ', ';

					city = component.long_name;
				break;

				case "postal_code": {
					postcode = component.long_name;
					break;
				}

				case "administrative_area_level_2":
					city = component.long_name;
				break;

				case "administrative_area_level_1": {
					var state = component.long_name;
					var state_code = component.short_name;
					break;
				}

				case "country":
					var country = component.long_name;
					var country_code = component.short_name;
				break;
			}
		}

		document.getElementById('to_round_trip_city').value = city;
		document.getElementById('to_round_trip_lat').value = lat;
		document.getElementById('to_round_trip_long').value = lng;
		document.getElementById('to_round_trip_state_code').value = state_code;
		document.getElementById('to_round_trip_postal_code').value = postcode;
		document.getElementById('to_round_trip_country_code').value = country_code;

		if(postcode == '') {
			var geocoder = new google.maps.Geocoder();
			const latlng = {
				lat: parseFloat(lat),
				lng: parseFloat(lng),
			};
			geocoder.geocode({ 'latLng': latlng }, function (results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					for (const component of results[0]['address_components']) {
						const componentType = component.types[0];
						switch (componentType) {
							case "postal_code": {
								post_code = component.long_name;
								break;
							}
							case "locality":
								city = component.long_name;
							break;

							case "administrative_area_level_2":
								city = component.long_name;
							break;
						}
					}
					document.getElementById('to_round_trip_city').value = city;
					document.getElementById('to_round_trip_postal_code').value = post_code;
				}
			});
		}
	}

	jQuery(function(){
	    jQuery( "#round_trip_arrival_date" ).datepicker({
		    dateFormat : "dd MM yy",
		    minDate: "0",  
		    showButtonPanel: true,
		});
		jQuery( "#round_trip_return_date" ).datepicker({
			dateFormat : "dd MM yy",
			minDate: "0",  
			showButtonPanel: true,
		});

		jQuery( "#arrival_date" ).datepicker({
			dateFormat : "dd MM yy",
			minDate: "0",  
			showButtonPanel: true,
		});
	});

	/*============ for show dorpdown(bags) menu ===========*/
	jQuery( ".bags" ).click(function() {
		jQuery('.quote-trip-bags .luggage-container').toggleClass( "luggage-container-show-hide" );
		jQuery('.bags h6 .arrow').toggleClass( "down" );
		jQuery('.bags h6 .arrow').toggleClass( "up" );
	});

	/*============ for hide dorpdown(bags) menu ===========*/
	jQuery(document).click(function(e) {
		jQuery('.quote-input-wrapper')
		.not(jQuery('.quote-input-wrapper').has(jQuery(e.target)))
		.children('.luggage-container')
		.addClass('luggage-container-show-hide');

		jQuery('.quote-input-wrapper')
		.not(jQuery('.quote-input-wrapper').has(jQuery(e.target)))
		.children('.bags')
		.find('.arrow')
		.addClass('down')
		.removeClass('up');
	});

	jQuery( ".luggage-types.luggage-boxes .title" ).click(function() {
		jQuery('.luggage-boxes-types').toggleClass( "show-hide" );
		jQuery('.luggage-types.luggage-boxes .arrow').toggleClass( "down" );
		jQuery('.luggage-types.luggage-boxes .arrow').toggleClass( "up" );
	});

	jQuery( ".luggage-types.golf-clubs .title" ).click(function() {
		jQuery('.golf-clubs-boxes-types').toggleClass( "show-hide" );
		jQuery('.luggage-types.golf-clubs .arrow').toggleClass( "down" );
		jQuery('.luggage-types.golf-clubs .arrow').toggleClass( "up" );
	});

	jQuery( ".luggage-types.skis-snowboards .title" ).click(function() {
		jQuery('.skis-snowboards-boxes-types').toggleClass( "show-hide" );
		jQuery('.luggage-types.skis-snowboards .arrow').toggleClass( "down" );
		jQuery('.luggage-types.skis-snowboards .arrow').toggleClass( "up" );
	});

	jQuery( ".luggage-types.boxes .title" ).click(function() {
		jQuery('.boxes-boxes-types').toggleClass( "show-hide" );
		jQuery('.luggage-types.boxes .arrow').toggleClass( "down" );
		jQuery('.luggage-types.boxes .arrow').toggleClass( "up" );
	});

	jQuery( ".luggage-types.bikes .title" ).click(function() {
		jQuery('.bikes-boxes-types').toggleClass( "show-hide" );
		jQuery('.luggage-types.bikes .arrow').toggleClass( "down" );
		jQuery('.luggage-types.bikes .arrow').toggleClass( "up" );
	});

	jQuery('#bag_type').on('change', function() {

		jQuery('.quote-trip-bags .luggage-container').addClass( "luggage-container-show-hide");
		jQuery('.bags h6 .arrow').addClass( "down" );
		jQuery('.bags h6 .arrow').removeClass( "up" );

		jQuery('.luggage-boxes-types, .golf-clubs-boxes-types, .skis-snowboards-boxes-types, .boxes-boxes-types, .bikes-boxes-types').addClass( "show-hide" );
		jQuery('.luggage-types.luggage-boxes .arrow, .luggage-types.golf-clubs .arrow, .luggage-types.skis-snowboards .arrow, .luggage-types.boxes .arrow, .luggage-types.bikes .arrow').addClass( "down" );
		jQuery('.luggage-types.luggage-boxes .arrow, .luggage-types.golf-clubs .arrow, .luggage-types.skis-snowboards .arrow, .luggage-types.boxes .arrow, .luggage-types.bikes .arrow').removeClass( "up" );


		var element = jQuery("option:selected", this);
		var form_show = element.attr("form-id");
		
		if (form_show == 'one_way') {
			jQuery('.form-show-hide').removeClass('active');
			jQuery('#one_way_quick_quote_form').addClass('active');
		}

		if (form_show == 'round_trip') {
			jQuery('.form-show-hide').removeClass('active');
			jQuery('#round_trip_quick_quote_form').addClass('active');
		}
	});

	/*========= fucntion for quantity button in dropdown ==========*/
	jQuery(".button.button-larger").on("click", function() {

		var $button = jQuery(this);
		var oldValue = $button.closest('div').parent().find('.number-input__count').text();

		var total_bags_value = parseInt(jQuery('.bags .total-bags').text());

		if ($button.text() == "+") {

			var newVal = parseFloat(oldValue) + 1;
			var new_total_bags_value = parseFloat(total_bags_value) + 1;
			//jQuery('.button.button-larger.decrease').addClass('selected');
			$button.closest('div').addClass('selected');
			/*jQuery('.bags .total-bags').text(total_bags_value + 1);*/

		} else {
			// 
			if (oldValue > 0) {
				var newVal = parseFloat(oldValue) - 1;
				if (newVal == 0) {
					$button.closest('div').removeClass('selected');
				}

				if (total_bags_value > 0) {
					var new_total_bags_value = parseFloat(total_bags_value) - 1;
				} else {
					new_total_bags_value = 0;
				}
			} else {
				newVal = 0;
				$button.closest('div').removeClass('selected');
			}
		}

		jQuery('.bags .total-bags').text(new_total_bags_value);
		$button.closest('div').parent().find('.number-input__count').text(newVal)
		$button.closest('div').parent().find('.number-input__count').attr('product-quantity', newVal);
	});

	/*========= ajax call for get one way quote ==========*/
	jQuery("#one_way_get_quote" ).click(function(e) {
		var total_bags_value = parseInt(jQuery('.bags .total-bags').text());
		if(total_bags_value == 0){
			e.preventDefault();
		jQuery(".error-msg .bags-error").text("Please Select Atleast 1 Bag");
		}
		else{
			e.preventDefault();
			var one_way_arrival_date = jQuery('#arrival_date').val();

			var one_way_from = jQuery('#one_way_from').val();
			var from_one_way_city = jQuery('#from_one_way_city').val();
			var from_one_way_lat = jQuery('#from_one_way_lat').val();
			var from_one_way_long = jQuery('#from_one_way_lng').val();
			var from_one_way_state_code = jQuery('#from_one_way_state_code').val();
			var from_one_way_postal_code = jQuery('#from_one_way_postal_code').val();
			var from_one_way_country_code = jQuery('#from_one_way_country_code').val();

			var one_way_to = jQuery('#one_way_to').val();
			var to_one_way_city = jQuery('#to_one_way_city').val();
			var to_one_way_lat = jQuery('#to_one_way_lat').val();
			var to_one_way_lng = jQuery('#to_one_way_lng').val();
			var to_one_way_state_code = jQuery('#to_one_way_state_code').val();
			var to_one_way_postal_code = jQuery('#to_one_way_postal_code').val();
			var to_one_way_country_code = jQuery('#to_one_way_country_code').val();

			var selected_bags = {};
			jQuery('.number-input.product.selected').each(function(){
				if(jQuery(this).length > 0){
					var product_id = jQuery(this).attr('product-id');
					var selected_packages = jQuery(this).attr('selected-packages');
					var product_qut = jQuery(this).find('.number-input__count').attr('product-quantity');
					selected_bags[selected_packages] = product_qut;
				}
			});
			
			jQuery('.popup-container').addClass('active');
			jQuery.ajax({
				type: "POST",
				dataType: "json",
				url: "<?php echo admin_url('admin-ajax.php'); ?>",
				data : {
					action:'get_one_way_quote',
					status:'1',
					arrival_date: one_way_arrival_date,
					origin_city: from_one_way_city,
					origin_lat: from_one_way_lat,
					origin_lng: from_one_way_lat,
					origin_state_code: from_one_way_state_code,
					origin_postal_code: from_one_way_postal_code,
					origin_country_code: from_one_way_country_code,
					destination_city: to_one_way_city,
					destination_lat: to_one_way_lat,
					destination_lng: to_one_way_lng,
					destination_state_code: to_one_way_state_code,
					destination_postal_code: to_one_way_postal_code,
					destination_country_code: to_one_way_country_code,
					shipper_address: one_way_from,
					recipient_address: one_way_to,
					selected_bags: selected_bags,
				},
				success: function(response) {
					if(response.error=='error'){
						jQuery('#fedex-loading').hide();
						jQuery('#fedex-result').html(response.html);
						//jQuery('#round_trip_get_quote').val('Search');
						//jQuery('#round_trip_get_quote').removeAttr('disabled');
						//window.location='http://sportshipper.eoxysitsolution.com/pricing';
					}
					else{
						window.location='http://sportshipper.eoxysitsolution.com/pricing';
					}
					return true;
				}
			});
		}
	});

	/*========= ajax call for get round trip quote ==========*/
	jQuery("#round_trip_get_quote" ).click(function(e) {
     var total_bags_value = parseInt(jQuery('.bags .total-bags').text());
     if(total_bags_value == 0){
     	e.preventDefault();
       jQuery(".error-msg .bags-error").text("Please Select Atleast 1 Bag");
     }
     else{
		e.preventDefault();
		var round_trip_arrival_date = jQuery('#round_trip_arrival_date').val();
		var round_trip_return_date = jQuery('#round_trip_return_date').val();
		
		var round_trip_from = jQuery('#round_trip_from').val();
		var from_round_trip_lat = jQuery('#from_round_trip_lat').val();
		var from_round_trip_long = jQuery('#from_round_trip_long').val();
		var from_round_trip_city = jQuery('#from_round_trip_city').val();
		var from_round_trip_state_code = jQuery('#from_round_trip_state_code').val();
		var from_round_trip_postal_code = jQuery('#from_round_trip_postal_code').val();
		var from_round_trip_country_code = jQuery('#from_round_trip_country_code').val();

		var round_trip_to = jQuery('#round_trip_to').val();
		var to_round_trip_lat = jQuery('#to_round_trip_lat').val();
		var to_round_trip_long = jQuery('#to_round_trip_long').val();
		var to_round_trip_city = jQuery('#to_round_trip_city').val();
		var to_round_trip_state_code = jQuery('#to_round_trip_state_code').val();
		var to_round_trip_postal_code = jQuery('#to_round_trip_postal_code').val();
		var to_round_trip_country_code = jQuery('#to_round_trip_country_code').val();


		var selected_bags = {};
		jQuery('.number-input.product.selected').each(function(){
			if(jQuery(this).length > 0){
				var product_id = jQuery(this).attr('product-id');
				var selected_packages = jQuery(this).attr('selected-packages');
				var product_qut = jQuery(this).find('.number-input__count').attr('product-quantity');
				selected_bags[selected_packages] = product_qut;
			}
		});
		
		jQuery('.popup-container').addClass('active');
		jQuery.ajax({
			type: "POST",
			dataType: "json",
			url: "<?php echo admin_url('admin-ajax.php'); ?>",
			data : {
				action:'get_round_trip_quote',
				status:'1',
				arrival_date: round_trip_arrival_date,
				return_date: round_trip_return_date,
				origin_city: from_round_trip_city,
				origin_lat: from_round_trip_lat,
				origin_long: from_round_trip_long,
				origin_state_code: from_round_trip_state_code,
				origin_postal_code: from_round_trip_postal_code,
				origin_country_code: from_round_trip_country_code,
				destination_city: to_round_trip_city,
				destination_lat: to_round_trip_lat,
				destination_long: to_round_trip_long,
				destination_state_code: to_round_trip_state_code,
				destination_postal_code: to_round_trip_postal_code,
				destination_country_code: to_round_trip_country_code,
				shipper_address: round_trip_from,
				recipient_address: round_trip_to,
				selected_bags: selected_bags,
			},
			success: function(response) {
				if(response.error=='error'){
					jQuery('#fedex-loading').hide();
					jQuery('#fedex-result').html(response.html);
					//jQuery('#round_trip_get_quote').val('Search');
					//jQuery('#round_trip_get_quote').removeAttr('disabled');
					//window.location='http://sportshipper.eoxysitsolution.com/pricing';
				}
				else{
					window.location='http://sportshipper.eoxysitsolution.com/pricing';
				}

				return true;
				
				
				
				
			}
		});
	}
	});

	jQuery(document).on('click','.service-option-name',function(){

		jQuery('.service-row').hide();
		jQuery(this).css('pointer-events','none');
		jQuery(this).parent('.service-row').show();
		jQuery(this).find('.select-fedex-service').attr('checked','checked');
		var selected_service = jQuery(this).attr('selected-service');
		var selected_service_price = jQuery(this).attr('service-price');
		var selected_service_type = jQuery(this).attr('selected-service-type');
		var checkout_url = '<?php echo wc_get_checkout_url(); ?>';
		var loading_icon = '<img width="80" src="<?php echo get_stylesheet_directory_uri(); ?>/img/loading-buffering.gif">';
		jQuery('#fedex-round-trip-result').html(loading_icon);
		jQuery.ajax({
			type: "POST",
			dataType: "json",
			url: "<?php echo admin_url('admin-ajax.php'); ?>",
			data : {
				action:'select_fedex_service',
				status:'1',
				selected_service: selected_service,
				selected_service_price: selected_service_price,
				selected_service_type: selected_service_type,
			},
			success: function(response) {
				jQuery('#fedex-round-trip-result').html(response.html);
				//window.location.href = checkout_url;
				return true;
			}
		});
		//jQuery('.fedex-plan-row').removeClass('choose-plan-show');
	});

	/*========= ajax call for select rount trip service option ==========*/
	jQuery(document).on('click','.rount-trip-service-option-name',function(){
		jQuery('.service-row.rount-trip').hide();
		jQuery(this).css('pointer-events','none');
		jQuery(this).parent('.service-row.rount-trip').show();
		jQuery(this).find('.select-fedex-service').attr('checked','checked');
		var selected_service = jQuery(this).attr('selected-service');
		var selected_service_price = jQuery(this).attr('service-price');
		var selected_service_type = jQuery(this).attr('selected-service-type');
		var checkout_url = '<?php echo wc_get_checkout_url(); ?>';
		jQuery.ajax({
			type: "POST",
			dataType: "json",
			url: "<?php echo admin_url('admin-ajax.php'); ?>",
			data : {
				action:'rount_trip_select_fedex_service',
				status:'1',
				selected_service: selected_service,
				selected_service_price: selected_service_price,
				selected_service_type: selected_service_type,
			},
			success: function(response) {
				//window.location.href = checkout_url;
				return true;
			}
		});
		jQuery('.fedex-plan-row').removeClass('choose-plan-show');
	});

	/*========= ajax call for select one way service option ==========*/
	jQuery(document).on('click','.one-way-service-option-name',function(){
		jQuery('.service-row').hide();
		jQuery(this).css('pointer-events','none');
		jQuery(this).parent('.service-row').show();
		jQuery(this).find('.select-fedex-service').attr('checked','checked');
		var selected_service = jQuery(this).attr('selected-service');
		var selected_service_price = jQuery(this).attr('service-price');
		var selected_service_type = jQuery(this).attr('selected-service-type');
		jQuery.ajax({
			type: "POST",
			dataType: "json",
			url: "<?php echo admin_url('admin-ajax.php'); ?>",
			data : {
				action:'one_way_select_fedex_service',
				status:'1',
				selected_service: selected_service,
				selected_service_price: selected_service_price,
				selected_service_type: selected_service_type,
			},
			success: function(response) {
				//window.location.href = checkout_url;
				return true;
			}
		});
		jQuery('.fedex-plan-row').removeClass('choose-plan-show');
	});

	/*========= ajax call for select service plan ==========*/
	jQuery(document).on('click','.select-plan',function(){

		var plan_id = jQuery(this).attr('plan-id');
		jQuery(this).attr('disabled', 'disabled');

		var checkout_url = '<?php echo wc_get_checkout_url(); ?>';
		jQuery.ajax({
			type: "POST",
			dataType: "json",
			url: "<?php echo admin_url('admin-ajax.php'); ?>",
			data : {
				action:'select_plan',
				status:'1',
				plan_id: plan_id,
			},
			success: function(response) {
				if(response.selected == true){
					window.location.href = checkout_url;
				}
				return true;
			}
		});
	});

	/*========= for popup close==========*/
	jQuery(".popup-close, .button.back" ).click(function(e) {
		jQuery('.popup-container').removeClass('active');
		jQuery('#fedex-loading').show();
		jQuery('#fedex-result').html('');
		jQuery('#fedex-round-trip-result').html('');
		jQuery('.fedex-plan-row').addClass('choose-plan-show');
	});
</script>