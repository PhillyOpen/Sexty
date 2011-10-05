<?php
class IncomingMessage extends DataObject {

	public static $db = array(
		'Sid' => 'Varchar(100)',
		'SmsStatus' => 'Varchar',
		'Debug' => 'Text',
		'Body' => 'Text',
		'LastResponse' => 'Int'
	);

	public static $has_one = array(
		'Visitor' => 'Visitor'
	);

}
