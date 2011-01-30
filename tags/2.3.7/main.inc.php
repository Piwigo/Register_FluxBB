<?php
/*
Plugin Name: Register FluxBB
Version: 2.3.7
Description: Link user registration from Piwigo to FluxBB forum (registration, password changing, deletion) - Original Nicco's NBC_LinkUser2PunBB plugin upgraded to Piwigo / Liez l'inscription des utilisateurs de Piwigo avec votre forum FluxBB - Portage du plugin NBC_LinkUser2PunBB de Nicco vers Piwigo
Plugin URI: http://phpwebgallery.net/ext/extension_view.php?eid=252
Author: Eric
Author URI: http://www.infernoweb.net
*/

/*
--------------------------------------------------------------------------------
  Author     : Eric
    email    : lucifer@infernoweb.net
    website  : http://www.infernoweb.net
    PWG user : http://forum.phpwebgallery.net/profile.php?id=1106
--------------------------------------------------------------------------------

:: HISTORY

2.0.0b		- 23/11/08  - Initial release. Basic changes to be available for Piwigo 2.0RC4

2.0.1b 		- 24/11/08  - Small bug correction on submit button display

2.0.2			- 19/02/09	- Language pack correction

2.1.0			- 25/04/09  - Admin panel with tabsheets
                      - Radio buttons functionnalities corrections (now radio buttons show the configuration saved in database)
                      - Language files (fr - en) improvement

2.1.1			- 30/04/09	- Bug fixed on profile update

2.1.2			- 22/08/09	- Compatibility bug fixed when used with DynamicRecentPeriod plugin

2.1.3     - 16/11/09  - Using sha1 hash instead of md5 for password hashing in FluxBB
                      - Escaping all characters in login names and be able to retreive them without slashes - FluxBB does not allow this so Piwigo's user names with escaped characters will not been escaped in FluxBB (ie : "it's" in Piwigo will be "It\'s" in FluxBB)
                      - Code refactoring
                      - Full HTML 4.0 for tpl

2.2.0     - 03/04/10  - Piwigo 2.1 compatibility
                      - Adding css file
                      - Templates refactory: Moved with css in a "template" subdirectory of admin directory, Moving icons in template directory, using css rules to improve important text display
                      - functions_Register_FluxBB.inc.php renamed in functions.inc.php
                      - Language files revision
                      - Obsolete files management

2.2.1     - 04/04/10  - Bug 1577 fixed : Multiple database support

2.2.2     - 23/05/10  - Bug 1674 fixed : Adding of mods for Fluxbb when users loose their password
                      - Adding of German language (Thx to duke)

2.2.3     - 23/05/10  - Bug 1674 re-fixed : Bad link fixed
                      - Re-adding of German language that was missed at last release :-( (Thx to duke)

2.2.4     - 22/08/10  - Bug 1812 fixed : Compliance with FluxBB 1.4

2.3.0     - 28/08/10  - Bug 1434 fixed : Bridge between Register_FluxBB and UserAdvManager for new users validation

2.3.1     - 31/08/10  - Bug 1825 fixed : Password corruption after Piwigo's profile page visit

2.3.2     - 11/09/10  - Bug 1847 fixed : Admins and webmasters was not excluded from registration validation

2.3.3     - 13/09/10  - Bug 1853 fixed : Add of controls on plugin configuration settings to avoid some mistakes
                      - Bug 1855 fixed : Improvement of use of UAM bridge (fixes php notices)
                      - Several language files fix

2.3.4     - 22/09/10  - Compatibility with Plugin Adult_Content

2.3.5     - 02/12/10  - Bug 2047 fixed : Check case sensitivity for logins in FluxBB's user table
                      - Code refactory and optimization

2.3.6     - 08/12/10  - Bug 2051 fixed : Compatibility with Captcha

2.3.7     - 31/01/11  - Bug 2154 fixed : Bad fluxbb table name
--------------------------------------------------------------------------------
*/

// pour faciliter le debug - make debug easier :o)
//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', true);

if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');

if (!defined('REGFLUXBB_DIR')) define('REGFLUXBB_DIR' , basename(dirname(__FILE__)));
if (!defined('REGFLUXBB_PATH')) define('REGFLUXBB_PATH' , PHPWG_PLUGINS_PATH.basename(dirname(__FILE__)).'/');

include_once (REGFLUXBB_PATH.'include/constants.php');
include_once (REGFLUXBB_PATH.'include/functions.inc.php');


/* plugin administration */
add_event_handler('get_admin_plugin_menu_links', 'Register_FluxBB_admin_menu');


/* user creation*/
add_event_handler('register_user', 'Register_FluxBB_Adduser');


// Check users registration
add_event_handler('register_user_check', 'Register_FluxBB_RegistrationCheck', EVENT_HANDLER_PRIORITY_NEUTRAL, 2);


/* user deletion */
add_event_handler('delete_user', 'Register_FluxBB_Deluser');


/* Profile management */
if (script_basename() == 'profile')
{
  add_event_handler('loc_begin_profile', 'Register_FluxBB_InitPage', EVENT_HANDLER_PRIORITY_NEUTRAL, 2);
}


/* Access validation in FluxBB when validated in Piwigo through UAM plugin */
add_event_handler('login_success', 'UAM_Bridge', EVENT_HANDLER_PRIORITY_NEUTRAL, 2);

?>