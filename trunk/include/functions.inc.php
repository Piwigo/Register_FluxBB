<?php

  include_once (PHPWG_ROOT_PATH.'/include/constants.php');
  include_once (REGFLUXBB_PATH.'include/constants.php');

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
  global $conf;

  $conf_Register_FluxBB = isset($conf['Register_FluxBB']) ? explode(";" , $conf['Register_FluxBB']) : array();

  $registred = time();
  $registred_ip = $_SERVER['REMOTE_ADDR'];

  $query = "
SELECT conf_value
FROM ".FluxBB_CONFIG_TABLE."
WHERE conf_name = 'o_default_user_group'
;";

  $o_default_user_group = pwg_db_fetch_assoc(pwg_query($query));
  
  $query = "
SELECT conf_value
FROM ".FluxBB_CONFIG_TABLE."
WHERE conf_name = 'o_server_timezone'
;";

  $o_server_timezone = pwg_db_fetch_assoc(pwg_query($query));
  
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
  
  $query = '
INSERT INTO '.FluxBB_USERS_TABLE." (
  username, 
  ". ( isset($o_default_user_group['conf_value']) ? 'group_id' : '' ) .",
  password, 
  email, 
  ". ( isset($o_server_timezone['conf_value']) ? 'timezone' : '' ) .",
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
  ". ( isset($o_server_timezone['conf_value']) ? "'".$o_server_timezone['conf_value']."'" : '' ) .",
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

  // Si יgale א VRAI, suppression de tous les posts et topics
  if ($SuppTopicsPosts and $conf_Register_FluxBB[3])
  {
    // Suppression des posts de cet utilisateur
    $subquery = "
DELETE FROM ".FluxBB_POSTS_TABLE."
WHERE poster_id = ".$id_user_FluxBB."
;";

    $subresult = pwg_query($subquery);

    // Suppression des topics de cet utilisateur
    $subquery = "
DELETE FROM ".FluxBB_TOPICS_TABLE."
WHERE BINARY poster = BINARY '".pwg_db_real_escape_string($data0['username'])."'
;";

    $subresult = pwg_query($subquery);
  }

  // Suppression des abonnements de l'utilisateur
  $subquery = "
DELETE FROM ".FluxBB_SUBSCRIPTIONS_TABLE."
WHERE user_id = ".$id_user_FluxBB."
;";

  $subresult = pwg_query($subquery);
  
  // Suppression du compte utilisateur
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