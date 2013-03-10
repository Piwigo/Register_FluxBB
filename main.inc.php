<?php
/*
Plugin Name: Register FluxBB
Version: auto
Description: Link user registration from Piwigo to FluxBB forum (registration, password changing, deletion)
Plugin URI: http://piwigo.org/ext/extension_view.php?eid=252
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

2.4.0     - 26/03/11  - Compliance with Piwigo 2.2

2.4.1     - 29/03/11  - Enhanced compliance with Piwigo 2.2 (using combine_css)

2.4.2     - 02/04/11  - Bug fixed on previous version update

2.4.3     - 26/04/11  - Small CSS bug fixed

2.4.4     - 11/05/12  - Small code refactory
                        Compatibility with Piwigo 2.4 and FluxBB 1.5 verifyed

2.4.5     - 13/05/12  - Update translations - Thx to ddtddt

2.4.6     - 16/06/12  - Add it_IT, thanks to : Gdvpixel and Ericnet
                      - Add uk_UA, thanks to : animan
                      - Add ru_RU, thanks to : nadusha

2.4.7     - 06/08/12  - Update it_IT, thanks to : Ericnet
                      - Update ru_RU, thanks to : rocket
                      - Add cs_CZ - Česky – Czech, Thanks to : webprostor
                      - Update uk_UA, thanks to : animan
                      - Update el_GR, thanks to : bas_alba

2.4.8     - 05/10/12  - Update uk_UA, thanks to : animan
                      - Update it_IT, thanks to : virgigiole
                      - Add da_DK, thanks to : Kaare
                      - Add es_ES, thanks to : petaqui

2.4.9     - 22/11/12  - Update es_ES, thanks to : jpr928
                      - Update tr_TR, thanks to : LazBoy
                      - Update it_IT, thanks to : virgigiole
                      - Update pl_PL, thanks to : kuba
                      - Bad explanation in inline tips fixed

2.5.0     - 10/03/13  - Compliance with Piwigo 2.5
                      - Code refactory : Plugin's configuration vars are now serialized in database
                      - Admin panel refactory : No more tabs
                      - Admin panel refactory : Clear and dark administration theme compatibility
                      - English language reference review
                      - Compliance improved with FluxBB 1.5 - Register_FluxBB is still compatible with 1.2 and 1.4 FluxBB forums
                      - Update tr_TR, thanks to : LazBoy
                      - Update it_IT, thanks to : Ericnet
                      - Update pl_PL, thanks to : K.S.
--------------------------------------------------------------------------------
*/

if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');

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