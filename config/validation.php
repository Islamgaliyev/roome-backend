<?php

return [

	'zeroStepValidation' => [
		'room_amount' => 'required|integer',
		'bathroom_amount' => 'required|integer',
		'beds_amount' => 'required|integer',
		'house_type' => 'required|integer',
		'house_area' => 'required|integer',
		'price' => 'required|integer',
	],

	'firstStepValidation' => [
		'country_id' => 'required|integer',
		'city_id' => 'required|integer',
		'district_id' => 'integer',
		'address' => 'required|string',
		'floor' => 'integer',
		'total_floor' => 'integer',
		'latitude' => 'numeric',
		'longitude' => 'numeric',
		'sport_complex' => 'required|boolean', 
		'mart' => 'required|boolean', 
		'grocer' => 'required|boolean', 
		'hospital' => 'required|boolean', 
        'school' => 'required|boolean', 
        'pharmacy' => 'required|boolean', 
        'playschool' => 'required|boolean', 
        'univer' => 'required|boolean',
        // 'key' => 'integer',
	],

	'secondStepValidation' => [
		'wifi' => 'required|boolean',
		'lift' => 'required|boolean',
		'cupboard' => 'required|boolean',
		'kitchenware' => 'required|boolean',
		'iron' => 'required|boolean',
		'tv' => 'required|boolean',
		'cabel_tv' => 'required|boolean',
		'plastic_win' => 'required|boolean',
		'home_phone' => 'required|boolean',
		'parking_place' => 'required|boolean',
		'security' => 'required|boolean',
		'gate' => 'required|boolean',
		'street_lighting' => 'required|boolean',
		'washer' => 'required|boolean',
		'fen' => 'required|boolean',
		'domofon' => 'required|boolean',
		'shower_cabin' => 'required|boolean',
		'bath' => 'required|boolean',
		'dryer' => 'required|boolean',
		'vac' => 'required|boolean',
	],


	'thirdStepValidation' => [
		'photo_urls' => 'required|array',
		'video_url' => 'string',
	],

	'renterInfoValidation' => [
		'first_name' => 'required|string',
		'last_name' => 'required|string',
		'phone_number' => 'required|string',
		'dob' => 'required|date',
		'avatar_url' => 'max:255',
		'sex' => 'required|integer',
		'activity' => 'required|integer',
		'family_status' => 'required|integer',
		'smoking' => 'required|integer',
	],

	'landlordInfoValidation' => [
		'first_name' => 'required|string',
		'last_name' => 'required|string',
		'phone_number' => 'required|string',
		'dob' => 'required|date',
		'avatar_url' => 'max:255',
		'sex' => 'integer',
	]

];