<?php
/*
Plugin Name: Register FluxBB
Version: 2.1.1
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

2.0.0b			- 23/11/08  - Initial release. Basic changes to be available for Piwigo 2.0RC4

2.0.1b 			- 24/11/08  - Small bug correction on submit button display

2.0.2			- 19/02/09	- Language pack correction

2.1.0			- 25/04/09  - Admin panel with tabsheets
							- Radio buttons functionnalities corrections (now radio buttons show the configuration saved in database)
							- Language files (fr - en) improvement

2.1.1			- 30/04/09	- Bux fixed on profile update

--------------------------------------------------------------------------------
*/

// pour faciliter le debug - make debug easier :o)
//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', true);

if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');

define('Register_FluxBB_DIR' , basename(dirname(__FILE__)));
define('Register_FluxBB_PATH' , PHPWG_PLUGINS_PATH . Register_FluxBB_DIR . '/');
include_once (Register_FluxBB_PATH.'include/functions_Register_FluxBB.inc.php');

/* plugin administration */
add_event_handler('get_admin_plugin_menu_links', 'Register_FluxBB_admin_menu');

function Register_FluxBB_admin_menu($menu)
{
  array_push($menu, array(
      'NAME' => 'Register FluxBB',
      'URL'  => get_admin_plugin_menu_link(Register_FluxBB_PATH.'admin/Register_FluxBB_admin.php')));
      return $menu;
}


/* user creation*/
add_event_handler('register_user', 'Register_FluxBB_Adduser');

function Register_FluxBB_Adduser($register_user)
{
	global $conf;
	
  include_once (Register_FluxBB_PATH.'include/functions_Register_FluxBB.inc.php');

  FluxBB_Adduser($register_user['id'], $register_user['username'], $conf['pass_convert']($_POST['password']), $register_user['email']);
}


/* user deletion */
add_event_handler('delete_user', 'Register_FluxBB_Deluser');

function Register_FluxBB_Deluser($user_id)
{
	include_once (Register_FluxBB_PATH.'include/functions_Register_FluxBB.inc.php');

  FluxBB_Deluser( FluxBB_Searchuser($user_id), true );
}



add_event_handler('init', 'Register_FluxBB_InitPage');
 
function Register_FluxBB_InitPage()
{
  global $conf, $user ;
  include_once (Register_FluxBB_PATH.'include/functions_Register_FluxBB.inc.php');

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
      // periods must be integer values, they represents number of days
      if (!preg_match($int_pattern, $_POST['recent_period'])
          or $_POST['recent_period'] <= 0)
      {
        $errors[] = l10n('periods_error') ;
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
          list($current_password) = mysql_fetch_row(pwg_query($query));
      
          if ($conf['pass_convert']($_POST['password']) != $current_password)
          {
            $errors[] = l10n('Current password is wrong');
          }
        }
      }
    
      if (count($errors) == 0)
      {
      	include_once (Register_FluxBB_PATH.'include/functions_Register_FluxBB.inc.php');
      
        $query = '
          SELECT '.$conf['user_fields']['username'].' AS username
          FROM '.USERS_TABLE.'
          WHERE '.$conf['user_fields']['id'].' = \''.$user['id'].'\'
        ;';
        list($username) = mysql_fetch_row(pwg_query($query));

        FluxBB_Updateuser($user['id'], $username, $conf['pass_convert']($_POST['use_new_pwd']), $_POST['mail_address']);
      }
    }
  }
}

?>
