<?php
if (!defined('QA_VERSION')) { 
	require_once dirname(empty($_SERVER['SCRIPT_FILENAME']) ? __FILE__ : $_SERVER['SCRIPT_FILENAME']).'/../../qa-include/qa-base.php';
   require_once QA_INCLUDE_DIR.'app/emails.php';
}

for($i=1; $i<=3; $i++){

	//$types = array('Q', 'A');
	$types = array('Q');
	foreach($types as $type) {
		$days = qa_opt('q2a-re-engage-day-' . $i . '-' . $type);
		$body = qa_opt('q2a-re-engage-' . $i . '-' . $type);
		$title = qa_opt('q2a-re-engage-title-' . $i . '-' . $type);
		sendXDaysMail($days, $body, $title, $type);
	}
}

function sendXDaysMail($days, $bodyTemplate, $title, $type) {
	$users = getNonActiveUser($days, $type);
	foreach($users as $user) {
		$body = strtr($bodyTemplate, 
				array(
					'^username' => $user['handle'],
					'^sitename' => qa_opt('site_title')
				)
			);
		sendEmail($title, $body, $user['handle'], $user['email']);
	}
}

function sendEmail($title, $body, $toname, $toemail){

	$params['fromemail'] = qa_opt('from_email');
	$params['fromname'] = qa_opt('site_title');
	$params['subject'] = '【' . qa_opt('site_title') . '】' . $title;
	$params['body'] = $body;
	$params['toname'] = $toname;
	$params['toemail'] = $toemail;
	$params['html'] = false;

	var_dump($params);

	qa_send_email($params);

	$params['toemail'] = 'yuichi.shiga@gmail.com';
	qa_send_email($params);
}
