<?php
/*
Plugin Name: Register FluxBB
Version: auto
Description: Link user registration from Piwigo to FluxBB forum (registration, password changing, deletion)
Plugin URI: http://piwigo.org/ext/extension_view.php?eid=252
Author: Eric
Author URI: http://www.infernoweb.net
*/

if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');

if (!defined('REGFLUXBB_PATH')) define('REGFLUXBB_PATH' , PHPWG_PLUGINS_PATH.basename(dirname(__FILE__)).'/');

include_once (REGFLUXBB_PATH.'include/constants.php');
include_once (REGFLUXBB_PATH.'include/functions.inc.php');

load_language('plugin.lang', REGFLUXBB_PATH);

/* plugin administration */
add_event_handler('get_admin_plugin_menu_links', 'Register_FluxBB_admin_menu');


/* user creation*/
add_event_handler('register_user', 'Register_FluxBB_Adduser');


// Check users registration
add_event_handler('register_user_check', 'Register_FluxBB_RegistrationCheck', EVENT_HANDLER_PRIORITY_NEUTRAL, 2);


/* user deletion */
add_event_handler('delete_user', 'Register_FluxBB_Deluser');

// Redirection to profile page
// ---------------------------
add_event_handler('login_success', 'Register_FluxBB_Login');

/* Profile management */
if (script_basename() == 'profile')
{
  add_event_handler('loc_begin_profile', 'Register_FluxBB_InitProfile', EVENT_HANDLER_PRIORITY_NEUTRAL, 2);
}

/* Password forget */
add_event_handler('loc_begin_password', 'Register_FluxBB_PasswReset');

/* Access validation in FluxBB when validated in Piwigo through UAM plugin */
add_event_handler('login_success', 'UAM_Bridge', EVENT_HANDLER_PRIORITY_NEUTRAL, 2);

?>