<?php
class Page extends SiteTree {

	public static $db = array(
	);

	public static $has_one = array(
	);

}
class Page_Controller extends ContentController {

	/**
	 * An array of actions that can be accessed via a request. Each array element should be an action name, and the
	 * permissions or conditions required to allow the user to access it.
	 *
	 * <code>
	 * array (
	 *     'action', // anyone can access this action
	 *     'action' => true, // same as above
	 *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
	 *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
	 * );
	 * </code>
	 *
	 * @var array
	 */
	public static $allowed_actions = array (
	);

	public function init() {
		parent::init();

		// Note: you should use SS template require tags inside your templates 
		// instead of putting Requirements calls here.  However these are 
		// included so that our older themes still work
		
	}
	
	public function updateMessages($arguments){
		$v = $arguments->allParams();
		$id = $v['ID']+1;
		$d = DataObject::get_by_id('IncomingMessage',$id);
		if($d){
			$data = $d->Body; 
			return $data;
		}else{
			echo 'nada';
		}
	}
	
	public function startMessages(){
		$d = DataObject::get('IncomingMessage',NULL,"ID DESC",NULL, 1);
		foreach($d as $m){
		return $m->ID;
		}
	}
	
	public function getMessages(){
	
		$d = DataObject::get('Messages');
		var_dump($d);
	}
	
	public function incomingMessage($arguments){
		$returningvisitor = true;
		$sex = false;
		$v = $arguments->requestVars();
		if(empty($v)){
			echo 'empty';
			return false;
		}
		$visitor = DataObject::get_one('Visitor',"Number='".$v['From']."'");
		if(!$visitor){
		//Parse message body for girl or boy if first time visiting
			$txt = explode(" ",$v['Body']);
			foreach($txt as $word){
			$word = strtolower($word);
				if($word == 'girl' || $word == 'boy'){
					//sex found. save.
					$sex = $word;
				}
			}
			if(!$sex){
				//Sex not found. inform user to enter girl or boy
				header("content-type: text/xml");
				echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
				echo '<Response>';
				echo '<Sms>Hey babe, I need you to let me know if you are a girl or a boy.</Sms>';
				echo '</Response>';
				exit;
			}
			$visitor = new Visitor();
			$visitor->Number = $v['From'];
			$visitor->Zip = $v['FromZip'];
			$visitor->City = $v['FromCity'];
			$visitor->Sex = $sex;
			$visitor->MessageCount = 1;
			$vid = $visitor->write();
			$returningvisitor = false;
		}else{
			$vid = $visitor->ID;
			$sex = $visitor->Sex;
			$visitor->MessageCount = $visitor->MessageCount +1;
			$visitor->write();
		}
		
		
		$message = new IncomingMessage();
		$message->Sid = $v['SmsSid'];
		$message->Body = $v['Body'];
		$message->VisitorID = $vid;
		//$message->LastResponse
		$message->write();
		
		if(!$returningvisitor){
			//New Visitor. Send first message
			if($sex == 'girl'){
				header("content-type: text/xml");
				echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
				echo '<Response>';
				echo '<Sms>Hey hot momma! I see you are from '.$visitor->City.'  You ready for some action sexy thing? Talk to me dirty baby!</Sms>';
				echo '</Response>';
			}else{
				header("content-type: text/xml");
				echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
				echo '<Response>';
				echo '<Sms>Hey my big daddy from '.$visitor->City.'! Im so ready for you. Tell me something dirty baby!</Sms>';
				echo '</Response>';
			}
		}else{
			//Returning user. Parse body check message count and respond accordingly.
			if($visitor->MessageCount == 4){
				//Last Message
				header("content-type: text/xml");
				echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
				echo '<Response>';
				echo '<Sms>Oooh baby! I think I reached my peak! ;) Lets take a break and go at it again soon! ;)</Sms>';
				echo '</Response>';
			}else if($visitor->MessageCount % 5 == 0){
				//Start Messages over
				if($sex == 'girl'){
					header("content-type: text/xml");
					echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
					echo '<Response>';
					echo '<Sms>Welcum back hot stuff! You ready for some more action? Talk to me dirty hot momma!</Sms>';
					echo '</Response>';
				}else{
					header("content-type: text/xml");
					echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
					echo '<Response>';
					echo '<Sms>Didnt get enough last time big daddy? Me either. ;) Tell me something nasty papi!</Sms>';
					echo '</Response>';
				}
			}else{
				//Pull a random Dirty message that isn't the same as the last one
				$msg = DataObject::get('DirtyMessage',"`For` ='".$sex."'",'Rand()',NULL,"1");
				foreach($msg as $m){
				$txt = $m->Message;
				}
				header("content-type: text/xml");
					echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
					echo '<Response>';
					echo '<Sms>'.$txt.'</Sms>';
					echo '</Response>';
			}
		}
		
	}
	
	public function setDirtyMessage($arguments){
		$v = $arguments->requestVars();
		if(empty($v)){
			echo 'empty';
			return false;
		}
		$message = new DirtyMessage();
		$message->For = $v['For'];
		$message->Message = $v['Body'];
		$message->write();
		var_dump($message);
	}
	
	public function getDirtyMessage($args){
	$msg = DataObject::get('DirtyMessage',"`For` ='boy'",'Rand()',NULL,"1");
	foreach($msg as $m){
	var_dump($m->Message);
	}
	}
	
	public function saveMessage($arguments){
		$v = $arguments->requestVars();
		if(empty($v)){
			echo 'empty';
			return false;
		}
		$message = new Messages();
		$message->Sid = $v['SmsSid'];
		$message->Status = $v['SmsStatus'];
		$message->To = $v['To'];
		$message->From = $v['From'];
		$message->Body = $v['Body'];
		$message->write();
		var_dump($v);
	}
	
	
}
