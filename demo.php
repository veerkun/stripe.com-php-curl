<?php 
require_once dirname(__FILE__) . '/stripe_class.php';

//Demo create customer subscription with credit card and plan

$secret_key = "sk_test_xxxxxxxxx"; // secret_key
$stripe_plan_id = "test_plan"; //subscription plan ID

$request = array (
	'plan' => $stripe_plan_id, //subscription plan ID
	'email' => 'abc.xyz', //customer email
	'source' => array(
		'object' => 'card',
		'number' => '4242424242424242',
		'exp_month' => '08',
		'exp_year' => '2018',
		'cvc' => '123',
		'name' => 'michael Stoner',
		'address_line1' => '258 main st',
		'address_line2' => 'card',
		'address_city' => 'card',
		'address_state' => 'Anaheim',
		'address_zip' => '92804',
		'address_country' => 'US',
		'currency' => 'usd',
		
	),
);

$Stripe = new VK_Stripe();
$Stripe->secret_key = $secret_key; //SET secret_key
$Stripe->url .= 'customers'; //API customers URL
$Stripe->fields = $request; // Request fields
$customer = $Stripe->process(); // Process with Stripe
print_r ($customer); //return array result



?>
