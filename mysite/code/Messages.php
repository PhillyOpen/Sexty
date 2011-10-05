<?php
class Messages extends DataObject {

	public static $db = array(
		'Sid' => 'Varchar(100)',
		'SmsStatus' => 'Varchar',
		'Debug' => 'Text',
		'Body' => 'Text',
		'From' => 'Varchar(20)',
		'To' => 'Varchar(20)'
	);

	

}
