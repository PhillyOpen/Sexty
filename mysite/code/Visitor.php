<?php
class Visitor extends DataObject {

	public static $db = array(
		'Number' => 'Varchar(20)',
		'Zip' => 'Int',
		'City' => 'Varchar(30)',
		'Sex' => 'Varchar',
		'MessageCount' => 'Int'
	);
	
	public static $has_many = array(
		'Messages' => 'IncomingMessage'
	);
	

}
