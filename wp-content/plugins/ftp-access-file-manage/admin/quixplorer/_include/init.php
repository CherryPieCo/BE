<?php
/*
* @package		WitFTP
* @copyright	Copyright (C) 2009-2014 Miwisoft, LLC. All rights reserved.
* @license		GNU General Public License version 2 or later
*
*/

// no direct access
defined('ABSPATH') or die('MIWI');


require MPATH_WITFTP_QX."/_include/error.php";

if (isset($_SERVER)) {
	$GLOBALS['__GET'] = &$_GET;
	$GLOBALS['__POST'] = &$_POST;
	$GLOBALS['__SERVER'] = &$_SERVER;
	$GLOBALS['__FILES']	= &$_FILES;
} elseif(isset($HTTP_SERVER_VARS)) {
	$GLOBALS['__GET'] = &$HTTP_GET_VARS;
	$GLOBALS['__POST'] = &$HTTP_POST_VARS;
	$GLOBALS['__SERVER'] = &$HTTP_SERVER_VARS;
	$GLOBALS['__FILES']	= &$HTTP_POST_FILES;
} else {
	die("<B>ERROR: Your PHP version is too old</B><BR>".
	"You need at least PHP 4.0.0 to run QuiXplorer; preferably PHP 4.3.1 or higher.");
}

function cleanVar($data) {
	if (is_array($data)) {
		foreach ($data as $key => $value) {
			unset($data[$key]);
		
			$data[$key] = cleanVar($value);
		}
	}
	else {
		$data = htmlspecialchars($data, ENT_COMPAT, 'UTF-8');
	}
	
	return $data;
}

foreach ($GLOBALS['__GET'] as $key => $value) {
	$GLOBALS['__GET'][$key] = cleanVar($value);
}
foreach ($GLOBALS['__POST'] as $key => $value) {
	$GLOBALS['__POST'][$key] = cleanVar($value);
}
foreach ($GLOBALS['__SERVER'] as $key => $value) {
	$GLOBALS['__SERVER'][$key] = cleanVar($value);
}
foreach ($GLOBALS['__FILES'] as $key => $value) {
	$GLOBALS['__FILES'][$key] = cleanVar($value);
}

//------------------------------------------------------------------------------
// Get Action
if(isset($GLOBALS['__GET']["action"])) $GLOBALS["action"]=$GLOBALS['__GET']["action"];
else $GLOBALS["action"]="list";
if($GLOBALS["action"]=="post" && isset($GLOBALS['__POST']["do_action"])) {
	$GLOBALS["action"]=$GLOBALS['__POST']["do_action"];
}
if($GLOBALS["action"]=="") $GLOBALS["action"]="list";
$GLOBALS["action"]=stripslashes($GLOBALS["action"]);

// Default Dir
if(isset($GLOBALS['__GET']["dir"])) $GLOBALS["dir"]=stripslashes($GLOBALS['__GET']["dir"]);
else $GLOBALS["dir"]="";
if($GLOBALS["dir"]==".") $GLOBALS["dir"]=="";

// Get Item
if(isset($GLOBALS['__GET']["item"])) $GLOBALS["item"]=stripslashes($GLOBALS['__GET']["item"]);
else $GLOBALS["item"]="";
// Get Sort
if(isset($GLOBALS['__GET']["order"])) $GLOBALS["order"]=stripslashes($GLOBALS['__GET']["order"]);
else $GLOBALS["order"]="name";
if($GLOBALS["order"]=="") $GLOBALS["order"]=="name";
// Get Sortorder (yes==up)
if(isset($GLOBALS['__GET']["srt"])) $GLOBALS["srt"]=stripslashes($GLOBALS['__GET']["srt"]);
else $GLOBALS["srt"]="yes";
if($GLOBALS["srt"]=="") $GLOBALS["srt"]=="yes";
// Get Language
if(isset($GLOBALS['__GET']["lang"])) $GLOBALS["lang"]=$GLOBALS['__GET']["lang"];
elseif(isset($GLOBALS['__POST']["lang"])) $GLOBALS["lang"]=$GLOBALS['__POST']["lang"];
//------------------------------------------------------------------------------
// Necessary files
ob_start(); // prevent unwanted output

if (!is_readable(MPATH_WITFTP_QX."/_config/conf.php"))
    show_error(MPATH_WITFTP_QX."/_config/conf.php not found.. please see installation instructions");

require MPATH_WITFTP_QX."/_config/conf.php";
require MPATH_WITFTP_QX."/_config/configs.php";
if(isset($GLOBALS["lang"])) $GLOBALS["language"]=$GLOBALS["lang"];
require MPATH_WITFTP_QX."/_lang/".$GLOBALS["language"].".php";
require MPATH_WITFTP_QX."/_lang/".$GLOBALS["language"]."_mimes.php";
require MPATH_WITFTP_QX."/_config/mimes.php";
require MPATH_WITFTP_QX."/_include/fun_extra.php";
require_once MPATH_WITFTP_QX."/_include/header.php";
require MPATH_WITFTP_QX."/_include/footer.php";
ob_start(); // prevent unwanted output
require_once MPATH_WITFTP_QX."/_include/login.php";
ob_end_clean(); // get rid of cached unwanted output
$prompt = isset($GLOBALS["login_prompt"][$GLOBALS["language"]])
	? $GLOBALS["login_prompt"][$GLOBALS["language"]]
	: $GLOBALS["login_prompt"]["en"];
if (isset($prompt))
	$GLOBALS["messages"]["actloginheader"] = $prompt;

ob_end_clean(); // get rid of cached unwanted output
//------------------------------------------------------------------------------
do_login();
//------------------------------------------------------------------------------
$abs_dir=get_abs_dir($GLOBALS["dir"]);
if(!@file_exists($GLOBALS["home_dir"])) {
	if($GLOBALS["require_login"]) {
		$extra="<A HREF=\"".make_link("logout",NULL,NULL)."\">".
			$GLOBALS["messages"]["btnlogout"]."</A>";
	} else $extra=NULL;
	show_error($GLOBALS["error_msg"]["home"],$extra);
}
if(!down_home($abs_dir)) show_error($GLOBALS["dir"]." : ".$GLOBALS["error_msg"]["abovehome"]);
if(!is_dir($abs_dir)) show_error($GLOBALS["dir"]." : ".$GLOBALS["error_msg"]["direxist"]);
//------------------------------------------------------------------------------
/**
  Do the login if required
  */
function do_login ()
{
	if ($GLOBALS["action"]=="logout")
	{
		logout();
		return;
	}

	// if no login is required and the user does not explicitly call
	// the login function, no login is required.
	if ($GLOBALS["require_login"] == false 
	&& $GLOBALS['action'] != "login"
	&& !isset($GLOBALS['__SESSION']["s_user"])
	&& !isset($GLOBALS['__POST']["p_user"]))
		return;
	login();
}

function miwoftp_redirect($url){
    if (headers_sent()) {
        echo "<script>document.location.href='" . $url . "';</script>\n";
        exit();
    }
    else{
        header("Location: ".$url);
    }
}
?>
