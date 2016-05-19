<?php
/*
	Plugin Name: Re-engagement-email
	Plugin URI: 
	Plugin Description: send email 
	Plugin Version: 0.3
	Plugin Date: 2015-06-21
	Plugin Author:
	Plugin Author URI:
	Plugin License: GPLv2
	Plugin Minimum Question2Answer Version: 1.7
	Plugin Update Check URI: 
*/
if (!defined('QA_VERSION')) {
	header('Location: ../../');
	exit;
}

qa_register_plugin_module('module', 'admin.php', 'q2a_re_engage_admin', 're engage ');

// used to answer questions
function getNonActiveAnswerer($lastActionDayAgo) {
	$type = 'A';
	return getNonActiveUser($lastActionDayAgo, $type);
}

function getNonActiveQuestioner($lastActionDayAgo) {
	$type = 'Q';
	return getNonActiveUser($lastActionDayAgo, $type);
}

function getNonActiveUser($lastActionDayAgo, $type) {
	$date = date("Y-m-d", time() - $lastActionDayAgo * 24 * 60 * 60) . ' %';
	$sql = "select email, handle, GREATEST(ut.loggedin, ut.written) as lastaction, ut.userid, count(ut.userid) as ansnum from qa_users as ut INNER JOIN qa_posts as pt on pt.userid = ut.userid where pt.type='" . $type . "' and GREATEST(ut.loggedin, ut.written) like '" . $date . "' group by pt.userid;";
echo $sql;
	$result = qa_db_query_sub($sql); 
	return qa_db_read_all_assoc($result);
}



