<?php

function FluxBB_Linkuser($pwg_id, $bb_id)
{
	include_once (PHPWG_ROOT_PATH.'/include/constants.php');
	include_once (Register_FluxBB_PATH.'include/constants.php');

  $query = "
    SELECT pwg.id as pwg_id, bb.id as bb_id
  	FROM ".USERS_TABLE." pwg, ".FluxBB_USERS_TABLE." bb
  	WHERE pwg.id = ".$pwg_id."
  	AND bb.id = ".$bb_id."
  	AND pwg.username = bb.username
  ;";
  $data = mysql_fetch_array(pwg_query($query));
  
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
	include_once (PHPWG_ROOT_PATH.'/include/constants.php');
	include_once (Register_FluxBB_PATH.'include/constants.php');

  $query = "
		DELETE FROM ".Register_FluxBB_ID_TABLE."
		WHERE id_user_FluxBB = ".$bb_id."
  ;";
  $result = pwg_query($query);
}



function FluxBB_Adduser($pwg_id, $login, $password, $adresse_mail)
{
	include_once (PHPWG_ROOT_PATH.'/include/constants.php');
	include_once (Register_FluxBB_PATH.'include/constants.php');

  global $conf;

  $conf_Register_FluxBB = isset($conf['Register_FluxBB']) ? explode(";" , $conf['Register_FluxBB']) : array();

  $registred = time();
  $registred_ip = $_SERVER['REMOTE_ADDR'];

  $query = "
    SELECT conf_value
    FROM ".FluxBB_CONFIG_TABLE."
    WHERE conf_name = 'o_default_user_group'
  ;";
  $o_default_user_group = mysql_fetch_array(pwg_query($query));
  
  $query = "
    SELECT conf_value
    FROM ".FluxBB_CONFIG_TABLE."
    WHERE conf_name = 'o_server_timezone'
  ;";
  $o_server_timezone = mysql_fetch_array(pwg_query($query));
  
  $query = "
    SELECT conf_value
    FROM ".FluxBB_CONFIG_TABLE."
    WHERE conf_name = 'o_default_lang'
  ;";
  $o_default_lang = mysql_fetch_array(pwg_query($query));
  
  $query = "
    SELECT conf_value
    FROM ".FluxBB_CONFIG_TABLE."
    WHERE conf_name = 'o_default_style'
  ;";
  $o_default_style = mysql_fetch_array(pwg_query($query));
  
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
	    '".$login."',
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

  $bb_id = mysql_insert_id();
  
  FluxBB_Linkuser($pwg_id, $bb_id);
}



function FluxBB_Searchuser($id_user_pwg)
{
	include_once (PHPWG_ROOT_PATH.'/include/constants.php');
	include_once (Register_FluxBB_PATH.'include/constants.php');

  $query = "
    SELECT id_user_FluxBB, id_user_pwg FROM ".Register_FluxBB_ID_TABLE."
    WHERE id_user_pwg = ".$id_user_pwg."
    LIMIT 1
  ;";
  $data = mysql_fetch_array(pwg_query($query));
  
  if (!empty($data))
    return $data['id_user_FluxBB'];
  else
    return '0';  

}



function FluxBB_Deluser($id_user_FluxBB, $SuppTopicsPosts)
{
	include_once (PHPWG_ROOT_PATH.'/include/constants.php');
	include_once (Register_FluxBB_PATH.'include/constants.php');

  global $conf;

  $conf_Register_FluxBB = isset($conf['Register_FluxBB']) ? explode(";" , $conf['Register_FluxBB']) : array();

  $query0 = "
		SELECT username, id FROM ".FluxBB_USERS_TABLE."
		WHERE id = ".$id_user_FluxBB."
    LIMIT 1
  ;";
  $data0 = mysql_fetch_array(pwg_query($query0));

  // Si égale à VRAI, suppression de tous les posts et topics
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
			WHERE BINARY poster = BINARY '".$data0['username']."'
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
	include_once (PHPWG_ROOT_PATH.'/include/constants.php');
	include_once (Register_FluxBB_PATH.'include/constants.php');
	include_once( PHPWG_ROOT_PATH.'include/common.inc.php' );

  $query = "
    SELECT id_user_FluxBB as FluxBB_id
    FROM ".Register_FluxBB_ID_TABLE."
    WHERE id_user_pwg = ".$pwg_id."
  ;";
  $row = mysql_fetch_array(pwg_query($query));

  if (!empty($row))
  {
    $query = "
      UPDATE ".FluxBB_USERS_TABLE."
      SET username = '".$username."', email = '".$adresse_mail."', password = '".$password."' 
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
      WHERE BINARY username = BINARY '".$username."'
    ;";
    $row = mysql_fetch_array(pwg_query($query));
  
    if (!empty($row))
    {
      $query = "
        UPDATE ".FluxBB_USERS_TABLE."
        SET username = '".$username."', email = '".$adresse_mail."', password = '".$password."' 
        WHERE id = ".$row['FluxBB_id']."
      ;";
      
      $result = pwg_query($query);
      
      FluxBB_Linkuser($pwg_id, $row['FluxBB_id']);
    }
  }
}


?>
