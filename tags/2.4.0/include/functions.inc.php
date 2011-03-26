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


function Register_FluxBB_Adduser($register_user)
{
  global $errors, $conf;
	
  // Exclusion of Adult_Content users
  if ($register_user['username'] != "16" and $register_user['username'] != "18")
  {
    // Warning : FluxBB uses Sha1 hash instead of md5 for Piwigo!
    FluxBB_Adduser($register_user['id'], $register_user['username'], sha1($_POST['password']), $register_user['email']);
  }
}


function Register_FluxBB_Deluser($user_id)
{
  FluxBB_Deluser(FluxBB_Searchuser($user_id), true);
}


function Register_FluxBB_InitPage()
{
  global $conf, $user;

  if (isset($_POST['validate']) and !is_admin())
  {
    if (!empty($_POST['use_new_pwd']))
    {
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


function UAM_Bridge()
{
  global $conf, $user;
  
  $conf_Register_FluxBB = isset($conf['Register_FluxBB']) ? explode(";" , $conf['Register_FluxBB']) : array();
  
  // Check if UAM is installed and if bridge is set - Exception for admins and webmasters
  $query ='
SELECT user_id, status
FROM '.USER_INFOS_TABLE.'
WHERE user_id = '.$user['id'].'
;';
  $data = pwg_db_fetch_assoc(pwg_query($query));
  
  if ($data['status'] <> "admin" and $data['status'] <> "webmaster")
  {
    if (function_exists('FindAvailableConfirmMailID') and isset($conf_Register_FluxBB[6]) and $conf_Register_FluxBB[6] == 'true')
    {
      $conf_UAM = unserialize($conf['UserAdvManager']);
    
      // Getting unvalidated users group else Piwigo's default group
      if (isset($conf_UAM[2]) and $conf_UAM[2] != '-1')
      {
        $Waitingroup = $conf_UAM[2];
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
      $query = "
SELECT group_id
FROM ".FluxBB_USERS_TABLE."
WHERE id = ".FluxBB_Searchuser($user['id'])."
;";

      $data = pwg_db_fetch_assoc(pwg_query($query));

      // Logged in user switch to the default FluxBB's group if he'is validated
      if ($count == 0 and $data['group_id'] = $conf_Register_FluxBB[7])
      {
        $query = "
SELECT conf_value
FROM ".FluxBB_CONFIG_TABLE."
WHERE conf_name = 'o_default_user_group'
;";

        $o_default_user_group = pwg_db_fetch_assoc(pwg_query($query));
      
        $query = "
UPDATE ".FluxBB_USERS_TABLE."
SET group_id = ".$o_default_user_group['conf_value']." 
WHERE id = ".FluxBB_Searchuser($user['id'])."
;";
        pwg_query($query);
      }
    }
  }
}


function Register_FluxBB_RegistrationCheck($errors, $user)
{
  global $conf;
  
  //Because FluxBB is case insensitive on login name, we have to check if a similar login already exists in FluxBB's user table
  // If "test" user already exists, "TEST" or "Test" (and so on...) can't register
  $query = "
SELECT username
  FROM ".FluxBB_USERS_TABLE."
WHERE LOWER(".stripslashes('username').") = '".strtolower($user['username'])."'
;";

  $count = pwg_db_num_rows(pwg_query($query));

  if ($count > 0)
  {
    array_push($errors, l10n('this login is already used'));
  }
  return $errors; 
}


function FluxBB_Linkuser($pwg_id, $bb_id)
{
  $query = "
SELECT pwg.id as pwg_id, bb.id as bb_id
FROM ".USERS_TABLE." pwg, ".FluxBB_USERS_TABLE." bb
WHERE pwg.id = ".$pwg_id."
AND bb.id = ".$bb_id."
AND pwg.username = bb.username
;";
  
  $data = pwg_db_fetch_row(pwg_query($query));
  
  if (!empty($data))
  {
    $subquery = "
DELETE FROM ".Register_FluxBB_ID_TABLE."
WHERE id_user_pwg = '".$pwg_id."'
OR id_user_FluxBB = '".$bb_id."'
;";

    $subresult = pwg_query($subquery);

    $subquery = "
INSERT INTO ".Register_FluxBB_ID_TABLE."
  (id_user_pwg, id_user_FluxBB)
VALUES (".$pwg_id.", ".$bb_id.")
;";

    $subresult = pwg_query($subquery);
  }
}



function FluxBB_Unlinkuser($bb_id)
{
  $query = "
DELETE FROM ".Register_FluxBB_ID_TABLE."
WHERE id_user_FluxBB = ".$bb_id."
;";

  $result = pwg_query($query);
}



function FluxBB_Adduser($pwg_id, $login, $password, $adresse_mail)
{
  global $errors, $conf;

  $conf_Register_FluxBB = isset($conf['Register_FluxBB']) ? explode(";" , $conf['Register_FluxBB']) : array();

  $registred = time();
  $registred_ip = $_SERVER['REMOTE_ADDR'];
  
  // Check if UAM is installed and if bridge is set - Exception for admins and webmasters
  if (function_exists('FindAvailableConfirmMailID') and isset($conf_Register_FluxBB[6]) and $conf_Register_FluxBB[6] == 'true')
  {
    $o_default_user_group = $conf_Register_FluxBB[7];
  }
  else
  {
    $query = "
SELECT conf_value
FROM ".FluxBB_CONFIG_TABLE."
WHERE conf_name = 'o_default_user_group'
;";

    $o_default_user_group = pwg_db_fetch_assoc(pwg_query($query));
  }

// Check for FluxBB version 1.4.x and get the correct value
  $query1 = "
SELECT conf_value
FROM ".FluxBB_CONFIG_TABLE."
WHERE conf_name = 'o_default_timezone'
;";

  $count1 = pwg_db_num_rows(pwg_query($query1));

// Check for FluxBB version 1.2.x and get the correct value
  $query2 = "
SELECT conf_value
FROM ".FluxBB_CONFIG_TABLE."
WHERE conf_name = 'o_server_timezone'
;";

  $count2 = pwg_db_num_rows(pwg_query($query2));
  
  if ($count1 == 1 and $count2 == 0)
  {
    $o_default_timezone = pwg_db_fetch_assoc(pwg_query($query1));
  }
  else if ($count1 == 0 and $count2 == 1)
  {
    $o_default_timezone = pwg_db_fetch_assoc(pwg_query($query2));
  }
  
  
  $query = "
SELECT conf_value
FROM ".FluxBB_CONFIG_TABLE."
WHERE conf_name = 'o_default_lang'
;";

  $o_default_lang = pwg_db_fetch_assoc(pwg_query($query));
  
  $query = "
SELECT conf_value
FROM ".FluxBB_CONFIG_TABLE."
WHERE conf_name = 'o_default_style'
;";

  $o_default_style = pwg_db_fetch_assoc(pwg_query($query));

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

  $bb_id = pwg_db_insert_id();
  
  FluxBB_Linkuser($pwg_id, $bb_id);
}



function FluxBB_Searchuser($id_user_pwg)
{
  $query = "
SELECT id_user_FluxBB, id_user_pwg FROM ".Register_FluxBB_ID_TABLE."
WHERE id_user_pwg = ".$id_user_pwg."
LIMIT 1
;";

  $data = pwg_db_fetch_assoc(pwg_query($query));
  
  if (!empty($data))
    return $data['id_user_FluxBB'];
  else
    return '0';  
}



function FluxBB_Deluser($id_user_FluxBB, $SuppTopicsPosts)
{
  global $conf;

  $conf_Register_FluxBB = isset($conf['Register_FluxBB']) ? explode(";" , $conf['Register_FluxBB']) : array();

  $query0 = "
SELECT username, id FROM ".FluxBB_USERS_TABLE."
WHERE id = ".$id_user_FluxBB."
LIMIT 1
;";

  $data0 = pwg_db_fetch_assoc(pwg_query($query0));

  // If True, delete related topics and posts
  if ($SuppTopicsPosts and $conf_Register_FluxBB[3])
  {
    // Delete posts and topics of this user
    $subquery = "
DELETE FROM ".FluxBB_POSTS_TABLE."
WHERE poster_id = ".$id_user_FluxBB."
;";

    $subresult = pwg_query($subquery);

    // Delete topics of this user
    $subquery = "
DELETE FROM ".FluxBB_TOPICS_TABLE."
WHERE BINARY poster = BINARY '".pwg_db_real_escape_string($data0['username'])."'
;";

    $subresult = pwg_query($subquery);
  }

  // Delete user's subscriptions
  $subquery = "
DELETE FROM ".FluxBB_SUBSCRIPTIONS_TABLE."
WHERE user_id = ".$id_user_FluxBB."
;";

  $subresult = pwg_query($subquery);
  
  // Delete user's account
  $subquery = "
DELETE FROM ".FluxBB_USERS_TABLE."
WHERE id = ".$id_user_FluxBB."
;";

  $subresult = pwg_query($subquery);

  FluxBB_Unlinkuser($id_user_FluxBB);
}



function FluxBB_Updateuser($pwg_id, $username, $password, $adresse_mail)
{
  include_once( PHPWG_ROOT_PATH.'include/common.inc.php' );

  $query = "
SELECT id_user_FluxBB as FluxBB_id
FROM ".Register_FluxBB_ID_TABLE."
WHERE id_user_pwg = ".$pwg_id."
;";

  $row = pwg_db_fetch_assoc(pwg_query($query));

  if (!empty($row))
  {
    $query = "
UPDATE ".FluxBB_USERS_TABLE."
SET username = '".pwg_db_real_escape_string($username)."', email = '".$adresse_mail."', password = '".$password."' 
WHERE id = ".$row['FluxBB_id']."
;";
   
    $result = pwg_query($query);
      
    FluxBB_Linkuser($pwg_id, $row['FluxBB_id']);
  }
  else
  {
    $query = "
SELECT id as FluxBB_id
FROM ".FluxBB_USERS_TABLE."
WHERE BINARY username = BINARY '".pwg_db_real_escape_string($username)."'
;";

    $row = pwg_db_fetch_assoc(pwg_query($query));
  
    if (!empty($row))
    {
      $query = "
UPDATE ".FluxBB_USERS_TABLE."
SET username = '".pwg_db_real_escape_string($username)."', email = '".$adresse_mail."', password = '".$password."' 
WHERE id = ".$row['FluxBB_id']."
;";
     
      $result = pwg_query($query);
      
      FluxBB_Linkuser($pwg_id, $row['FluxBB_id']);
    }
  }
}


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
?>