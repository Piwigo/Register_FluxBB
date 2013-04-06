<?php

include_once (PHPWG_ROOT_PATH.'/include/constants.php');
include_once (REGFLUXBB_PATH.'include/constants.php');


function Register_FluxBB_admin_menu($menu)
{
  array_push($menu, array(
    'NAME' => 'Register FluxBB',
    'URL' => get_root_url().'admin.php?page=plugin-'.basename(REGFLUXBB_PATH)
    )
  );
  return $menu;
}

/**
 * Add new registered user in FluxBB user table
 */
function Register_FluxBB_Adduser($register_user)
{
  global $errors, $conf;
	
  // Exclusion of Adult_Content users
  if ($register_user['username'] != "16" and $register_user['username'] != "18")
  {
    // Warning : FluxBB uses Sha1 hash instead of a salted md5 for Piwigo! // TODO: Reset password
    FluxBB_Adduser($register_user['id'], $register_user['username'], sha1($_POST['password']), $register_user['email']);
  }
}

/**
 * Delete registered user in FluxBB user table
 */
function Register_FluxBB_Deluser($user_id)
{
  FluxBB_Deluser(FluxBB_Searchuser($user_id), true);
}

/**
 * Change user's password in FluxBB user table if a new password is set in Piwigo
 */
function Register_FluxBB_InitPage()
{
  global $conf, $user;

  if (isset($_POST['validate']))
  {
    if (!empty($_POST['use_new_pwd']))
    {
      $query = '
SELECT '.$conf['user_fields']['username'].' AS username
FROM '.USERS_TABLE.'
WHERE '.$conf['user_fields']['id'].' = \''.$user['id'].'\'
AND '.$conf['user_fields']['username'].' NOT IN ("18","16")
;';

      list($username) = pwg_db_fetch_row(pwg_query($query));
      // Warning : FluxBB uses Sha1 hash instead of a salted md5 for Piwigo! // TODO: Reset password
      FluxBB_Updateuser($user['id'], stripslashes($username), sha1($_POST['use_new_pwd']), $_POST['mail_address']);
    }
  }
}


/**
 * Update FluxBB password if user uses "lost password"
 */
function Register_FluxBB_PasswReset()
{
  global $page, $user, $conf;

  if (isset($_POST['submit']))
  {
    if ('reset' == $_GET['action'])
    {
      $user_id = check_password_reset_key($_GET['key']);

      $query = '
SELECT '.$conf['user_fields']['username'].' AS username, mail_address
FROM '.USERS_TABLE.'
WHERE '.$conf['user_fields']['id'].' = \''.$user_id.'\'
AND '.$conf['user_fields']['username'].' NOT IN ("18","16")
;';

      list($username,$mail_address) = pwg_db_fetch_row(pwg_query($query));
      // Warning : FluxBB uses Sha1 hash instead of a salted md5 for Piwigo! // TODO: Reset password
      FluxBB_Updateuser($user_id, stripslashes($username), sha1($_POST['use_new_pwd']), $mail_address);
    }
  }
}

/**
 * Bridge with UAM confirmation option
 */
function UAM_Bridge()
{
  global $conf, $user;
  
  $conf_Register_FluxBB = unserialize($conf['Register_FluxBB']);
  
  // Check if UAM is installed and if bridge is set - Exception for admins and webmasters
  $query ='
SELECT user_id, status
FROM '.USER_INFOS_TABLE.'
WHERE user_id = '.$user['id'].'
;';
  $data = pwg_db_fetch_assoc(pwg_query($query));
  
  if ($data['status'] <> "admin" and $data['status'] <> "webmaster")
  {
    if (function_exists('FindAvailableConfirmMailID') and isset($conf_Register_FluxBB['FLUXBB_UAM_LINK']) and $conf_Register_FluxBB['FLUXBB_UAM_LINK'] == 'true')
    {
      $conf_UAM = unserialize($conf['UserAdvManager']);
    
      // Getting unvalidated users group else Piwigo's default group
      if (isset($conf_UAM['NO_CONFIRM_GROUP']) and $conf_UAM['NO_CONFIRM_GROUP'] != '-1')
      {
        $Waitingroup = $conf_UAM['NO_CONFIRM_GROUP'];
      }
      else
      {
        $query = '
SELECT id
FROM '.GROUPS_TABLE.'
WHERE is_default = "true"
LIMIT 1
;';
        $data = pwg_db_fetch_assoc(pwg_query($query));
        $Waitingroup = $data['id'];
      }
    
      // check if logged in user is in a Piwigo's validated or unvalidated users group
      $query = '
SELECT *
FROM '.USER_GROUP_TABLE.'
WHERE user_id = '.$user['id'].'
AND group_id = '.$Waitingroup.'
;';
      $count = pwg_db_num_rows(pwg_query($query));

      // Check if logged in user is in a FluxBB's unvalidated group
      $query = '
SELECT group_id
FROM '.FluxBB_USERS_TABLE.'
WHERE id = '.FluxBB_Searchuser($user['id']).'
;';

      $data = pwg_db_fetch_assoc(pwg_query($query));

      // Logged in user switch to the default FluxBB's group if he is validated
      if ($count == 0 and $data['group_id'] = $conf_Register_FluxBB['FLUXBB_GROUP'])
      {
        $query = '
SELECT conf_value
FROM '.FluxBB_CONFIG_TABLE.'
WHERE conf_name = "o_default_user_group"
;';

        $o_user_group = pwg_db_fetch_assoc(pwg_query($query));
      
        $query = '
UPDATE '.FluxBB_USERS_TABLE.'
SET group_id = '.$o_user_group['conf_value'].' 
WHERE id = '.FluxBB_Searchuser($user['id']).'
;';
        pwg_query($query);
      }
    }
  }
}

/**
 * Check the username accuracy in FluxBB users table
 */
function Register_FluxBB_RegistrationCheck($errors, $user)
{
  global $conf;
  
  // Because FluxBB is case insensitive on login name, we have to check if a similar login already exists in FluxBB's user table
  // If "test" user already exists, "TEST" or "Test" (and so on...) can't register
  $query = '
SELECT username
  FROM '.FluxBB_USERS_TABLE.'
WHERE LOWER('.stripslashes('username').') = "'.strtolower($user['username']).'"
;';

  $count = pwg_db_num_rows(pwg_query($query));

  if ($count > 0)
  {
    array_push($errors, l10n('this login is already used'));
  }
  return $errors; 
}


/**
 * Users linking in a dedicated links table
 */
function FluxBB_Linkuser($pwg_id, $bb_id)
{
  $query = '
SELECT pwg.id as pwg_id, bb.id as bb_id
FROM '.USERS_TABLE.' pwg, '.FluxBB_USERS_TABLE.' bb
WHERE pwg.id = '.$pwg_id.'
  AND bb.id = '.$bb_id.'
  AND pwg.username = bb.username
  AND pwg.username NOT IN ("18","16")
;';
  
  $data = pwg_db_fetch_row(pwg_query($query));
  
  if (!empty($data))
  {
    $subquery = '
DELETE FROM '.Register_FluxBB_ID_TABLE.'
WHERE id_user_pwg = "'.$pwg_id.'"
OR id_user_FluxBB = "'.$bb_id.'"
;';

    $subresult = pwg_query($subquery);

    $subquery = '
INSERT INTO '.Register_FluxBB_ID_TABLE.'
  (id_user_pwg, id_user_FluxBB)
VALUES ('.$pwg_id.', '.$bb_id.')
;';

    $subresult = pwg_query($subquery);
  }
}


/**
 * Users unlinking in a dedicated links table (on user deletion)
 */
function FluxBB_Unlinkuser($bb_id)
{
  $query = '
DELETE FROM '.Register_FluxBB_ID_TABLE.'
WHERE id_user_FluxBB = '.$bb_id.'
;';

  $result = pwg_query($query);
}


/**
 * Add new registered user in fluxBB users table
 * Called from Register_FluxBB_Adduser()
 */
function FluxBB_Adduser($pwg_id, $login, $password, $adresse_mail)
{
  global $errors, $conf;

  $conf_Register_FluxBB = unserialize($conf['Register_FluxBB']);

  $registred = time();
  $registred_ip = $_SERVER['REMOTE_ADDR'];
  
  // Check if UAM is installed and if bridge is set - Exception for admins and webmasters
  if (function_exists('FindAvailableConfirmMailID') and isset($conf_Register_FluxBB['FLUXBB_UAM_LINK']) and $conf_Register_FluxBB['FLUXBB_UAM_LINK'] == 'true')
  {
    $o_default_user_group1 = $conf_Register_FluxBB['FLUXBB_GROUP'];
  }
  else
  {
    $query = '
SELECT conf_value
FROM '.FluxBB_CONFIG_TABLE.'
WHERE conf_name = "o_default_user_group"
;';

    $o_default_user_group = pwg_db_fetch_assoc(pwg_query($query));
  }

// Check for FluxBB version 1.4.x or higher and get the correct value
  $query1 = '
SELECT conf_value
FROM '.FluxBB_CONFIG_TABLE.'
WHERE conf_name = "o_default_timezone"
;';

  $count1 = pwg_db_num_rows(pwg_query($query1));

// Check for FluxBB version 1.2.x and get the correct value
  $query2 = '
SELECT conf_value
FROM '.FluxBB_CONFIG_TABLE.'
WHERE conf_name = "o_server_timezone"
;';

  $count2 = pwg_db_num_rows(pwg_query($query2));
  
  if ($count1 == 1 and $count2 == 0)
  {
    $o_default_timezone = pwg_db_fetch_assoc(pwg_query($query1));
  }
  else if ($count1 == 0 and $count2 == 1)
  {
    $o_default_timezone = pwg_db_fetch_assoc(pwg_query($query2));
  }
  
  
  $query = '
SELECT conf_value
FROM '.FluxBB_CONFIG_TABLE.'
WHERE conf_name = "o_default_lang"
;';

  $o_default_lang = pwg_db_fetch_assoc(pwg_query($query));
  
  $query = '
SELECT conf_value
FROM '.FluxBB_CONFIG_TABLE.'
WHERE conf_name = "o_default_style"
;';

  $o_default_style = pwg_db_fetch_assoc(pwg_query($query));

  // Check if UAM is installed and if bridge is set - Exception for admins and webmasters
  if (function_exists('FindAvailableConfirmMailID') and isset($conf_Register_FluxBB['FLUXBB_UAM_LINK']) and $conf_Register_FluxBB['FLUXBB_UAM_LINK'] == 'true')
  {
    $query = "
INSERT INTO ".FluxBB_USERS_TABLE." (
  username,
  ". ( isset($o_default_user_group1) ? 'group_id' : '' ) .",
  password,
  email,
  ". ( isset($o_default_timezone['conf_value']) ? 'timezone' : '' ) .",
  ". ( isset($o_default_lang['conf_value']) ? 'language' : '' ) .",
  ". ( isset($o_default_style['conf_value']) ? 'style' : '' ) .",
  registered,
  registration_ip,
  last_visit
  )
VALUES(
  '".pwg_db_real_escape_string($login)."',
  ". ( isset($o_default_user_group1) ? "'".$o_default_user_group1."'" : '' ) .",
  '".$password."', 
	'".$adresse_mail."',
  ". ( isset($o_default_timezone['conf_value']) ? "'".$o_default_timezone['conf_value']."'" : '' ) .",
  ". ( isset($o_default_lang['conf_value']) ? "'".$o_default_lang['conf_value']."'" : '' ) .",
  ". ( isset($o_default_style['conf_value']) ? "'".$o_default_style['conf_value']."'" : '' ) .",
  '".$registred."',
  '".$registred_ip."',
  '".$registred."'
  );";
  
    $result = pwg_query($query);
  }
  else
  {
    $query = "
INSERT INTO ".FluxBB_USERS_TABLE." (
  username,
  ". ( isset($o_default_user_group['conf_value']) ? 'group_id' : '' ) .",
  password,
  email,
  ". ( isset($o_default_timezone['conf_value']) ? 'timezone' : '' ) .",
  ". ( isset($o_default_lang['conf_value']) ? 'language' : '' ) .",
  ". ( isset($o_default_style['conf_value']) ? 'style' : '' ) .",
  registered,
  registration_ip,
  last_visit
  )
VALUES(
  '".pwg_db_real_escape_string($login)."',
  ". ( isset($o_default_user_group['conf_value']) ? "'".$o_default_user_group['conf_value']."'" : '' ) .",
  '".$password."', 
	'".$adresse_mail."',
  ". ( isset($o_default_timezone['conf_value']) ? "'".$o_default_timezone['conf_value']."'" : '' ) .",
  ". ( isset($o_default_lang['conf_value']) ? "'".$o_default_lang['conf_value']."'" : '' ) .",
  ". ( isset($o_default_style['conf_value']) ? "'".$o_default_style['conf_value']."'" : '' ) .",
  '".$registred."',
  '".$registred_ip."',
  '".$registred."'
  )
;";
    $result = pwg_query($query);
  }

  $bb_id = pwg_db_insert_id();
  
  FluxBB_Linkuser($pwg_id, $bb_id);
}


/**
 * Search linked users
 */
function FluxBB_Searchuser($id_user_pwg)
{
  $query = '
SELECT id_user_FluxBB, id_user_pwg
FROM '.Register_FluxBB_ID_TABLE.'
WHERE id_user_pwg = '.$id_user_pwg.'
LIMIT 1
;';

  $data = pwg_db_fetch_assoc(pwg_query($query));
  
  if (!empty($data))
    return $data['id_user_FluxBB'];
  else
    return '0';  
}


/**
 * Delete user from FluxBB users table
 * Called from Register_FluxBB_Deluser()
 */
function FluxBB_Deluser($id_user_FluxBB, $SuppTopicsPosts)
{
  global $conf;

  $conf_Register_FluxBB = unserialize($conf['Register_FluxBB']);

  $query0 = '
SELECT username, id
FROM '.FluxBB_USERS_TABLE.'
WHERE id = '.$id_user_FluxBB.'
LIMIT 1
;';

  $data0 = pwg_db_fetch_assoc(pwg_query($query0));

  // If True, delete related topics and posts
  if ($SuppTopicsPosts and $conf_Register_FluxBB['FLUXBB_DEL_PT'])
  {
    // Delete posts and topics of this user
    $subquery = '
DELETE FROM '.FluxBB_POSTS_TABLE.'
WHERE poster_id = '.$id_user_FluxBB.'
;';

    $subresult = pwg_query($subquery);

    // Delete topics of this user
    $subquery = '
DELETE FROM '.FluxBB_TOPICS_TABLE.'
WHERE BINARY poster = BINARY "'.pwg_db_real_escape_string($data0['username']).'"
;';

    $subresult = pwg_query($subquery);
  }

  // Delete user's subscriptions
  $subquery = '
DELETE FROM '.FluxBB_SUBSCRIPTIONS_TABLE.'
WHERE user_id = '.$id_user_FluxBB.'
;';

  $subresult = pwg_query($subquery);
  
  // Delete user's account
  $subquery = '
DELETE FROM '.FluxBB_USERS_TABLE.'
WHERE id = '.$id_user_FluxBB.'
;';

  $subresult = pwg_query($subquery);

  FluxBB_Unlinkuser($id_user_FluxBB);
}


/**
 * Update user information in FluxBB users table
 */
function FluxBB_Updateuser($pwg_id, $username, $password, $adresse_mail)
{
  include_once( PHPWG_ROOT_PATH.'include/common.inc.php' );

  $query = '
SELECT id_user_FluxBB as FluxBB_id
FROM '.Register_FluxBB_ID_TABLE.'
WHERE id_user_pwg = '.$pwg_id.'
;';

  $row = pwg_db_fetch_assoc(pwg_query($query));

  if (!empty($row))
  {
    $query = '
UPDATE '.FluxBB_USERS_TABLE.'
SET username = "'.pwg_db_real_escape_string($username).'", email = "'.$adresse_mail.'", password = "'.$password.'" 
WHERE id = '.$row['FluxBB_id'].'
AND "'.pwg_db_real_escape_string($username).'" NOT IN ("18","16")
;';
   
    $result = pwg_query($query);
      
    FluxBB_Linkuser($pwg_id, $row['FluxBB_id']);
  }
  else
  {
    $query = '
SELECT id as FluxBB_id
FROM '.FluxBB_USERS_TABLE.'
WHERE BINARY username = BINARY "'.pwg_db_real_escape_string($username).'"
;';

    $row = pwg_db_fetch_assoc(pwg_query($query));
  
    if (!empty($row))
    {
      $query = '
UPDATE '.FluxBB_USERS_TABLE.'
SET username = "'.pwg_db_real_escape_string($username).'", email = "'.$adresse_mail.'", password = "'.$password.'" 
WHERE id = '.$row['FluxBB_id'].'
AND "'.pwg_db_real_escape_string($username).'" NOT IN ("18","16")
;';
     
      $result = pwg_query($query);
      
      FluxBB_Linkuser($pwg_id, $row['FluxBB_id']);
    }
  }
}

/**
 * Get plugin information
 */
function RegFluxBB_Infos($dir)
{
  $path = $dir;

  $plg_data = implode( '', file($path.'main.inc.php') );
  if ( preg_match("|Plugin Name: (.*)|", $plg_data, $val) )
  {
    $plugin['name'] = trim( $val[1] );
  }
  if (preg_match("|Version: (.*)|", $plg_data, $val))
  {
    $plugin['version'] = trim($val[1]);
  }
  if ( preg_match("|Plugin URI: (.*)|", $plg_data, $val) )
  {
    $plugin['uri'] = trim($val[1]);
  }
  if ($desc = load_language('description.txt', $path.'/', array('return' => true)))
  {
    $plugin['description'] = trim($desc);
  }
  elseif ( preg_match("|Description: (.*)|", $plg_data, $val) )
  {
    $plugin['description'] = trim($val[1]);
  }
  if ( preg_match("|Author: (.*)|", $plg_data, $val) )
  {
    $plugin['author'] = trim($val[1]);
  }
  if ( preg_match("|Author URI: (.*)|", $plg_data, $val) )
  {
    $plugin['author uri'] = trim($val[1]);
  }
  if (!empty($plugin['uri']) and strpos($plugin['uri'] , 'extension_view.php?eid='))
  {
    list( , $extension) = explode('extension_view.php?eid=', $plugin['uri']);
    if (is_numeric($extension)) $plugin['extension'] = $extension;
  }
// IMPORTANT SECURITY !
  $plugin = array_map('htmlspecialchars', $plugin);

  return $plugin ;
}


/**
 * Delete obsolete files at plugin update
 */
function regfluxbb_obsolete_files()
{
  if (file_exists(REGFLUXBB_PATH.'obsolete.list')
    and $old_files = file(REGFLUXBB_PATH.'obsolete.list', FILE_IGNORE_NEW_LINES)
    and !empty($old_files))
  {
    array_push($old_files, 'obsolete.list');
    foreach($old_files as $old_file)
    {
      $path = REGFLUXBB_PATH.$old_file;
      if (is_file($path))
      {
        @unlink($path);
      }
    }
  }
}


/**
 * Function to update plugin version number in config table
 * Used everytime a new version is updated even if no database
 * upgrade is needed
 */
function RegFluxBB_version_update()
{
  global $conf;

  // Get current plugin version
  // --------------------------
  $plugin =  RegFluxBB_Infos(REGFLUXBB_PATH);
  $version = $plugin['version'];

  // Upgrading options
  // -----------------
  $query = '
SELECT value
FROM '.CONFIG_TABLE.'
WHERE param = "Register_FluxBB"
;';

  $result = pwg_query($query);
  $Conf_RegFluxBB = pwg_db_fetch_assoc($result);

  $Newconf_RegFluxBB = unserialize($Conf_RegFluxBB['value']);

  $Newconf_RegFluxBB['REGFLUXBB_VERSION'] = $version;

  $update_conf = serialize($Newconf_RegFluxBB);

  conf_update_param('Register_FluxBB', pwg_db_real_escape_string($update_conf));


// Check #_plugin table consistency
// Only useful if a previous version upgrade has not worked correctly (rare case)
// ------------------------------------------------------------------------------
  $query = '
SELECT version
  FROM '.PLUGINS_TABLE.'
WHERE id = "Register_FluxBB"
;';
  
  $data = pwg_db_fetch_assoc(pwg_query($query));
  
  if (empty($data['version']) or $data['version'] <> $version)
  {
    $query = '
UPDATE '.PLUGINS_TABLE.'
SET version="'.$version.'"
WHERE id = "Register_FluxBB"
LIMIT 1
;';

    pwg_query($query);
  }
}


/**
 * Useful for debugging - 4 vars can be set
 * Output result to log.txt file
 *
 */
function RegFluxBBLog($var1, $var2, $var3, $var4)
{
   $fo=fopen (REGFLUXBB_PATH.'log.txt','a') ;
   fwrite($fo,"======================\n") ;
   fwrite($fo,'le ' . date('D, d M Y H:i:s') . "\r\n");
   fwrite($fo,$var1 ."\r\n") ;
   fwrite($fo,$var2 ."\r\n") ;
   fwrite($fo,$var3 ."\r\n") ;
   fwrite($fo,$var4 ."\r\n") ;
   fclose($fo) ;
}
?>