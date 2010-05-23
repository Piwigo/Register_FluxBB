<?php
/*
Plugin Name: Register FluxBB
Version: 2.2.3
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

function Register_FluxBB_admin_menu($menu)
{
  array_push($menu, array(
    'NAME' => 'Register FluxBB',
    'URL'  => get_admin_plugin_menu_link(REGFLUXBB_PATH.'admin/admin.php')));
  return $menu;
}


/* user creation*/
add_event_handler('register_user', 'Register_FluxBB_Adduser');

function Register_FluxBB_Adduser($register_user)
{
  global $conf;
	
  include_once (REGFLUXBB_PATH.'include/functions.inc.php');

  // Warning : FluxBB uses Sha1 hash instead of md5 for Piwigo !
  FluxBB_Adduser($register_user['id'], $register_user['username'], sha1($_POST['password']), $register_user['email']);
}


/* user deletion */
add_event_handler('delete_user', 'Register_FluxBB_Deluser');

function Register_FluxBB_Deluser($user_id)
{
  include_once (REGFLUXBB_PATH.'include/functions.inc.php');

  FluxBB_Deluser( FluxBB_Searchuser($user_id), true );
}



add_event_handler('init', 'Register_FluxBB_InitPage');
 
function Register_FluxBB_InitPage()
{
  global $conf, $user ;
  include_once (REGFLUXBB_PATH.'include/functions.inc.php');

/* user update */
  if (script_basename() == 'profile')
  {
    if (isset($_POST['validate']))
    {
      $errors = array();

      $int_pattern = '/^\d+$/';
      if (empty($_POST['nb_image_line'])
        or (!preg_match($int_pattern, $_POST['nb_image_line'])))
      {
        $errors[] = l10n('nb_image_line_error');
      }
    
      if (empty($_POST['nb_line_page'])
        or (!preg_match($int_pattern, $_POST['nb_line_page'])))
      {
        $errors[] = l10n('nb_line_page_error');
      }
    
      if ($_POST['maxwidth'] != ''
        and (!preg_match($int_pattern, $_POST['maxwidth'])
        or $_POST['maxwidth'] < 50))
      {
        $errors[] = l10n('maxwidth_error');
      }

      if ($_POST['maxheight']
        and (!preg_match($int_pattern, $_POST['maxheight'])
        or $_POST['maxheight'] < 50))
      {
        $errors[] = l10n('maxheight_error');
      }

      if (isset($_POST['mail_address']))
      {
        $mail_error = validate_mail_address($user['id'],$_POST['mail_address']);
        if (!empty($mail_error))
        {
          $errors[] = $mail_error;
        }
      }
    
      if (!empty($_POST['use_new_pwd']))
      {
        // password must be the same as its confirmation
        if ($_POST['use_new_pwd'] != $_POST['passwordConf'])
        {
          $errors[] = l10n('New password confirmation does not correspond');
        }
    
        if ( !defined('IN_ADMIN') )
        {// changing password requires old password
          $query = '
SELECT '.$conf['user_fields']['password'].' AS password
FROM '.USERS_TABLE.'
WHERE '.$conf['user_fields']['id'].' = \''.$user['id'].'\'
;';

          list($current_password) = pwg_db_fetch_row(pwg_query($query));
      
          if ($conf['pass_convert']($_POST['password']) != $current_password)
          {
            $errors[] = l10n('Current password is wrong');
          }
        }
      }
    
      if (count($errors) == 0)
      {
        include_once (REGFLUXBB_PATH.'include/functions.inc.php');
      
        $query = '
SELECT '.$conf['user_fields']['username'].' AS username
FROM '.USERS_TABLE.'
WHERE '.$conf['user_fields']['id'].' = \''.$user['id'].'\'
;';

        list($username) = pwg_db_fetch_row(pwg_query($query));

        FluxBB_Updateuser($user['id'], stripslashes($username), sha1($_POST['use_new_pwd']), $_POST['mail_address']);
      }
    }
  }
}
?>