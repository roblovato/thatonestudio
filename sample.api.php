<?php

class Api_Customers_Controller extends Base_Controller {
	
	/*
		Search for customers
	*/
	public function post_search_customer(){
		$search = Input::get('search', '');
		$download = Input::get('download', false); 

		$customers = Customers::search_customer($search, $download);
		if($download){
			Utilities::echo_spreadsheet($customers['filename'], $customers['writer']);
		} else{
			return Response::json($customers);
		}
	}
	
	/* 
		Add a new customer
	*/
	public function post_add(){
		return Response::json(Customers::add_customer());
	}
	/* 
		Add a new customer
	*/
	public function post_edit(){
		return Response::json(Customers::edit_customer());
	}
	
	/**
		Get the customer details & orders for a given customer ID
	*/
	public function post_get_customer(){
		return Response::json(Customers::get_info_and_orders());
	}
	
	/**
		Delete a customer from the database
	*/
	public function post_delete(){
		return Response::json(array('success' => Customers::delete_customer()));
	}

	public function post_email_targeting(){
		$recipients = array('tom@talech.com', 'joy@talech.com', 'irv@talech.com', 'rob@rlprodesign.com');
		foreach ($recipients as $recipient) {
			$message = Message::to($recipient)
			->from('welcome@talech.com', 'talech')
			->subject(Input::get('subject', 'Get 50% off your next visit to the talech Cafe'))
			->body('view: emails.targeting_container');

			$message->body->discountAmount = '30%';
			$message->body->as_email = true;
			$message->body->firstName = 'Irv';
			$message->body->campaign_email_body1 = Input::get('body1', 'Thanks for shopping at <business name>.  As a token of our appreciation, we\'re offering $20 off your next purchase.  Just present the discount code below at your time of purchase. Be sure to check out our new fall collection. Use Congratulations!');
			$message->body->campaign_email_body2 = Input::get('body2', 'Congratulations! You earned it!\nThanks!');

			$message->html(true)->send();
		}
		
		return Response::json(array('success' => true));
	}
}
