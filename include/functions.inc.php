<?php

include_once (PHPWG_ROOT_PATH.'/include/constants.php');
include_once (REGFLUXBB_PATH.'include/constants.php');


function Audit_PWG_FluxBB()
{
  global $page, $conf, $errors;

  $page_Register_FluxBB_admin = get_admin_plugin_menu_link(__FILE__);

  $conf_Register_FluxBB = unserialize($conf['Register_FluxBB']);

  $msg_error_PWG_Dup = '';
  $msg_error_FluxBB_Dup = '';
  $msg_error_Link_Break = '';
  $msg_error_Link_Bad = '';
  $msg_error_Synchro = '';
  $msg_ok_Synchro = '';
  $msg_error_PWG2FluxBB = '';
  $msg_error_FluxBB2PWG = '';

  $query = '
SELECT COUNT(*) AS nbr_dup, id, username
FROM '.USERS_TABLE.'
WHERE username NOT IN ("18","16")
GROUP BY BINARY username
HAVING COUNT(*) > 1
;';
  $result = pwg_query($query);
  
  while($row = pwg_db_fetch_assoc($result))
    $msg_error_PWG_Dup .= '<br>'.l10n('Error_PWG_Dup').$row['nbr_dup'].' x '.stripslashes($row['username']);

  if ($msg_error_PWG_Dup == '')
    array_push($page['infos'], l10n('Audit_PWG_Dup').'<br>'.l10n('Audit_OK'));
  else
    $msg_error_PWG_Dup = l10n('Audit_PWG_Dup').$msg_error_PWG_Dup.'<br>'.l10n('Advise_PWG_Dup');
  


  $query = '
SELECT COUNT(*) AS nbr_dup, username
FROM '.FluxBB_USERS_TABLE.' 
GROUP BY BINARY username
HAVING COUNT(*) > 1
;';
  $result = pwg_query($query);
  
  while($row = pwg_db_fetch_assoc($result))
  {
    $msg_error_FluxBB_Dup .= '<br>'.l10n('Error_FluxBB_Dup').$row['nbr_dup'].' x '.stripslashes($row['username']);

    $subquery = '
SELECT id, username, email
FROM '.FluxBB_USERS_TABLE.' 
WHERE BINARY username = BINARY "'.$row['username'].'"
;';
    $subresult = pwg_query($subquery);
  
    while($subrow = pwg_db_fetch_assoc($subresult))
    {
      $msg_error_FluxBB_Dup .= '<br>id:'.$subrow['id'].'='.stripslashes($subrow['username']).' ('.$subrow['email'].')';
  
      $msg_error_FluxBB_Dup .= ' <a href="';
      
      $msg_error_FluxBB_Dup .= add_url_params($page_Register_FluxBB_admin, array(
        'action' => 'del_user',
        'id' => $subrow['id'],
      ));
        
      $msg_error_FluxBB_Dup .= '" title="'.l10n('Del_User').stripslashes($subrow['username']).'"';
        
      $msg_error_FluxBB_Dup .= $conf_Register_FluxBB['FLUXBB_CONFIRM']=='false' ?  ' onclick="return confirm(\''.l10n('Are you sure?').'\');" ' : ' ';
        
      $msg_error_FluxBB_Dup .= '><img src="'.REGFLUXBB_PATH.'/admin/template/icon/user_delete.png" alt="'.l10n('Del_User').$subrow['username'].'" /></a>';
    }
  }

  if ($msg_error_FluxBB_Dup == '')
    array_push($page['infos'], l10n('Audit_FluxBB_Dup').'<br>'.l10n('Audit_OK'));
  else
    $msg_error_FluxBB_Dup = l10n('Audit_FluxBB_Dup').$msg_error_FluxBB_Dup.'<br>'.l10n('Advise_FluxBB_Dup');
  


  $query = '
SELECT pwg.id as pwg_id, bb.id as bb_id, pwg.username as pwg_user, pwg.mail_address as pwg_mail
FROM '.FluxBB_USERS_TABLE.' AS bb, '.USERS_TABLE.' as pwg
WHERE bb.id NOT in (
  SELECT id_user_FluxBB
  FROM '.Register_FluxBB_ID_TABLE.'
  )
AND pwg.id NOT in (
  SELECT id_user_pwg
  FROM '.Register_FluxBB_ID_TABLE.'
  )
AND pwg.username = bb.username
AND pwg.username NOT IN ("18","16")
AND pwg.mail_address = bb.email
;';

  $result = pwg_query($query);
  
  while($row = pwg_db_fetch_assoc($result))
  {
    $msg_error_Link_Break .= '<br>'.l10n('Error_Link_Break').stripslashes($row['pwg_user']).' ('.$row['pwg_mail'].')';

    $msg_error_Link_Break .= ' <a href="';
  
    $msg_error_Link_Break .= add_url_params($page_Register_FluxBB_admin, array(
      'action'   => 'new_link',
      'pwg_id' => $row['pwg_id'],
      'bb_id' => $row['bb_id'],
    ));

    $msg_error_Link_Break .= '" title="'.l10n('New_Link').stripslashes($row['pwg_user']).'"';

    $msg_error_Link_Break .= $conf_Register_FluxBB['FLUXBB_CONFIRM']=='false' ?  ' onclick="return confirm(\''.l10n('Are you sure?').'\');" ' : ' ';

    $msg_error_Link_Break .= '><img src="'.REGFLUXBB_PATH.'/admin/template/icon/link_break.png" alt="'.l10n('New_Link').stripslashes($row['pwg_user']).'" /></a>';
  }

  if ($msg_error_Link_Break == '')
    array_push($page['infos'], l10n('Audit_Link_Break').'<br>'.l10n('Audit_OK'));
  else
    $msg_error_Link_Break = l10n('Audit_Link_Break').$msg_error_Link_Break;
    

  
  $query = '
SELECT pwg.username as pwg_user, pwg.id as pwg_id, pwg.mail_address as pwg_mail, bb.id as bb_id, bb.username as bb_user, bb.email as bb_mail
FROM '.FluxBB_USERS_TABLE.' AS bb 
INNER JOIN '.Register_FluxBB_ID_TABLE.' AS link ON link.id_user_FluxBB = bb.id
INNER JOIN '.USERS_TABLE.' as pwg ON link.id_user_pwg = pwg.id
WHERE pwg.username <> bb.username
AND pwg.username NOT IN ("18","16")
;';

  $result = pwg_query($query);
  
  while($row = pwg_db_fetch_assoc($result))
  {
    $msg_error_Link_Bad .= '<br>'.l10n('Error_Link_Del').stripslashes($row['pwg_user']).' ('.$row['pwg_mail'].')'.' -- '.stripslashes($row['bb_user']).' ('.$row['bb_mail'].')';

    $msg_error_Link_Bad .= ' <a href="';
  
    $msg_error_Link_Bad .= add_url_params($page_Register_FluxBB_admin, array(
      'action'   => 'link_del',
      'pwg_id' => $row['pwg_id'],
      'bb_id'  => $row['bb_id'],
    ));

    $msg_error_Link_Bad .= '" title="'.l10n('Link_Del').stripslashes($row['pwg_user']).' -- '.stripslashes($row['bb_user']).'"';

    $msg_error_Link_Bad .= $conf_Register_FluxBB['FLUXBB_CONFIRM']=='false' ?  ' onclick="return confirm(\''.l10n('Are you sure?').'\');" ' : ' ';

    $msg_error_Link_Bad .= '><img src="'.REGFLUXBB_PATH.'/admin/template/icon/link_delete.png" alt="'.l10n('Link_Del').stripslashes($row['pwg_user']).' -- '.stripslashes($row['bb_user']).'" /></a>';

    $msg_error_Link_Bad .= ' -- <a href="';

    $msg_error_Link_Bad .= add_url_params($page_Register_FluxBB_admin, array(
      'action' => 'sync_user',
      'username' => stripslashes($row['pwg_user']),
    ));

    $msg_error_Link_Bad .= '" title="'.l10n('Sync_User').stripslashes($row['pwg_user']).' --> '.stripslashes($row['bb_user']).'"';

    $msg_error_Link_Bad .= $conf_Register_FluxBB['FLUXBB_CONFIRM']=='false' ?  ' onclick="return confirm(\''.l10n('Are you sure?').'\');" ' : ' ';

    $msg_error_Link_Bad .= '><img src="'.REGFLUXBB_PATH.'/admin/template/icon/arrow_switch.png" alt="'.l10n('Sync_User').stripslashes($row['pwg_user']).' --> '.stripslashes($row['bb_user']).'" /></a>';
  }


  $query = '
SELECT COUNT(*) as nbr_dead
FROM '.Register_FluxBB_ID_TABLE.' AS Link
WHERE id_user_FluxBB NOT IN (
  SELECT id
  FROM '.FluxBB_USERS_TABLE.'
  )
OR id_user_pwg NOT IN (
  SELECT id
  FROM '.USERS_TABLE.'
  )
;';

  $Compteur = pwg_db_fetch_assoc(pwg_query($query));

  if (!empty($Compteur) and $Compteur['nbr_dead'] > 0)
  { 
    $msg_error_Link_Bad .= '<br>'.l10n('Error_Link_Dead').$Compteur['nbr_dead'];

    $msg_error_Link_Bad .= ' <a href="';

    $msg_error_Link_Bad .= add_url_params($page_Register_FluxBB_admin, array(
      'action'   => 'link_dead',
    ));

    $msg_error_Link_Bad .= '" title="'.l10n('Link_Dead').$Compteur['nbr_dead'].'"';

    $msg_error_Link_Bad .= $conf_Register_FluxBB['FLUXBB_CONFIRM']=='false' ?  ' onclick="return confirm(\''.l10n('Are you sure?').'\');" ' : ' ';

    $msg_error_Link_Bad .= '><img src="'.REGFLUXBB_PATH.'/admin/template/icon/link_delete.png" alt="'.l10n('Link_Dead').$Compteur['nbr_dead'].'" /></a>';
  }

  $query = '
SELECT COUNT(*) AS nbr_dup, pwg.id AS pwg_id, pwg.username AS pwg_user, bb.username AS bb_user, bb.id AS bb_id
FROM '.FluxBB_USERS_TABLE.' AS bb 
INNER JOIN '.Register_FluxBB_ID_TABLE.' AS link ON link.id_user_FluxBB = bb.id
INNER JOIN '.USERS_TABLE.' as pwg ON link.id_user_pwg = pwg.id
WHERE pwg.username NOT IN ("18","16")
GROUP BY link.id_user_pwg, link.id_user_FluxBB
HAVING COUNT(*) > 1
;';

  $result = pwg_query($query);
  
  while($row = pwg_db_fetch_assoc($result))
  {
    $msg_error_Link_Bad .= '<br>'.l10n('Error_Link_Dup').$row['nbr_dup'].' = '.stripslashes($row['pwg_user']).' -- '.stripslashes($row['bb_user']).')';

    $msg_error_Link_Bad .= ' <a href="';

    $msg_error_Link_Bad .= add_url_params($page_Register_FluxBB_admin, array(
      'action'   => 'new_link',
      'pwg_id' => $row['pwg_id'],
      'bb_id' => $row['bb_id'],
    ));

    $msg_error_Link_Bad .= '" title="'.l10n('Link_Dup').stripslashes($row['pwg_user']).' -- '.stripslashes($row['bb_user']).'"';

    $msg_error_Link_Bad .= $conf_Register_FluxBB['FLUXBB_CONFIRM']=='false' ?  ' onclick="return confirm(\''.l10n('Are you sure?').'\');" ' : ' ';

    $msg_error_Link_Bad .= '><img src="'.REGFLUXBB_PATH.'/admin/template/icon/link_error.png" alt="'.l10n('Link_Dup').stripslashes($row['pwg_user']).' -- '.stripslashes($row['bb_user']).'" /></a>';
  }

  if ($msg_error_Link_Bad == '')
    array_push($page['infos'], l10n('Audit_Link_Bad').'<br>'.l10n('Audit_OK'));
  else
    $msg_error_Link_Bad = l10n('Audit_Link_Bad').$msg_error_Link_Bad;
    

  
  $query = '
SELECT pwg.username as username, pwg.password as pwg_pwd, pwg.mail_address as pwg_eml, FluxBB.password as bb_pwd, FluxBB.email as bb_eml
FROM '.FluxBB_USERS_TABLE.' AS FluxBB 
INNER JOIN '.Register_FluxBB_ID_TABLE.' AS link ON link.id_user_FluxBB = FluxBB.id
INNER JOIN '.USERS_TABLE.' as pwg ON link.id_user_pwg = pwg.id
WHERE BINARY pwg.username = BINARY FluxBB.username
AND pwg.username NOT IN ("18","16")
ORDER BY LOWER(pwg.username)
;';

  $result = pwg_query($query);
  
  while($row = pwg_db_fetch_assoc($result))
  {
    if ( ($row['pwg_pwd'] != $row['bb_pwd']) or ($row['pwg_eml'] != $row['bb_eml']) )
    {
      $msg_error_Synchro .= '<br>'.l10n('Error_Synchro').stripslashes($row['username']);

      $msg_error_Synchro .= ' <a href="';

      $msg_error_Synchro .= add_url_params($page_Register_FluxBB_admin, array(
        'action' => 'sync_user',
        'username' => stripslashes($row['username']),
      ));

      $msg_error_Synchro .= '" title="'.l10n('Sync_User').stripslashes($row['username']).'"';

      $msg_error_Synchro .= $conf_Register_FluxBB['FLUXBB_CONFIRM']=='false' ?  ' onclick="return confirm(\''.l10n('Are you sure?').'\');" ' : ' ';

      $msg_error_Synchro .= '><img src="'.REGFLUXBB_PATH.'/admin/template/icon/user_refresh.png" alt="'.l10n('Sync_User').stripslashes($row['username']).'" /></a>';

      if ($row['pwg_pwd'] != $row['bb_pwd'])
        $msg_error_Synchro .= '<br>'.l10n('Error_Synchro_Pswd');

      if ($row['pwg_eml'] != $row['bb_eml'])
        $msg_error_Synchro .= '<br>'.l10n('Error_Synchro_Mail').'<br>-- PWG = '.$row['pwg_eml'].'<br>-- FluxBB = '.$row['bb_eml'];
    }
    else if ($conf_Register_FluxBB['FLUXBB_DETAIL'] == 'true')
      $msg_ok_Synchro .= '<br> - '.stripslashes($row['username']).' ('.$row['pwg_eml'].')'.l10n('Audit_Synchro_OK');
  }

  if ($msg_error_Synchro <> '')
    $msg_error_Synchro = l10n('Audit_Synchro').$msg_error_Synchro;
    
  if ($msg_ok_Synchro <> '')
    if ($msg_error_Synchro <> '')
      array_push($page['infos'], l10n('Audit_Synchro').$msg_ok_Synchro.'<br><br>');
    else
      array_push($page['infos'], l10n('Audit_Synchro').$msg_ok_Synchro.'<br><br>'.l10n('Audit_OK'));


  $query = '
SELECT username, mail_address FROM '.USERS_TABLE.'
WHERE BINARY username <> BINARY "guest"
AND username NOT IN ("18","16")
AND id not in (
  SELECT id_user_pwg FROM '.Register_FluxBB_ID_TABLE.'
  )
AND BINARY username not in (
  SELECT username FROM '.FluxBB_USERS_TABLE.'
  )
ORDER BY LOWER(username)
;';

  $result = pwg_query($query);

  while($row = pwg_db_fetch_assoc($result))
  {
    $msg_error_PWG2FluxBB .= '<br>'.l10n('Error_PWG2FluxBB').stripslashes($row['username']).' ('.$row['mail_address'].')';

    $msg_error_PWG2FluxBB .= ' <a href="';

    $msg_error_PWG2FluxBB .= add_url_params($page_Register_FluxBB_admin, array(
      'action' => 'add_user',
      'username' => stripslashes($row['username']),
    ));

    $msg_error_PWG2FluxBB .= '" title="'.l10n('Add_User').stripslashes($row['username']).'" ';

    $msg_error_PWG2FluxBB .= $conf_Register_FluxBB['FLUXBB_CONFIRM']=='false' ?  ' onclick="return confirm(\''.l10n('Are you sure?').'\');" ' : ' ';

    $msg_error_PWG2FluxBB .= '><img src="'.REGFLUXBB_PATH.'/admin/template/icon/user_add.png" alt="'.l10n('Add_User').stripslashes($row['username']).'" /></a>';
  }

  if ($msg_error_PWG2FluxBB == '')
    array_push($page['infos'], l10n('Audit_PWG2FluxBB').'<br>'.l10n('Audit_OK'));
  else
    $msg_error_PWG2FluxBB = l10n('Audit_PWG2FluxBB').$msg_error_PWG2FluxBB;

  

  $query = '
SELECT id, username, email FROM '.FluxBB_USERS_TABLE.'
WHERE BINARY username <> BINARY "'.$conf_Register_FluxBB['FLUXBB_GUEST'].'"
AND id not in (
  SELECT id_user_FluxBB FROM '.Register_FluxBB_ID_TABLE.'
  )
AND BINARY username not in (
  SELECT username FROM '.USERS_TABLE.'
  )
ORDER BY LOWER(username)
;';

  $result = pwg_query($query);

  while($row = pwg_db_fetch_assoc($result))
  {
    $msg_error_FluxBB2PWG .= '<br>'.l10n('Error_FluxBB2PWG').stripslashes($row['username']).' ('.$row['email'].')';

    $msg_error_FluxBB2PWG .= ' <a href="';

    $msg_error_FluxBB2PWG .= add_url_params($page_Register_FluxBB_admin, array(
      'action' => 'del_user',
      'id' => $row['id'],
    ));

    $msg_error_FluxBB2PWG .= '" title="'.l10n('Del_User').stripslashes($row['username']).'"';

    $msg_error_FluxBB2PWG .= $conf_Register_FluxBB['FLUXBB_CONFIRM']=='false' ?  ' onclick="return confirm(\''.l10n('Are you sure?').'\');" ' : ' ';

    $msg_error_FluxBB2PWG .= '><img src="'.REGFLUXBB_PATH.'/admin/template/icon/user_delete.png" alt="'.l10n('Del_User').stripslashes($row['username']).'" /></a>';
  }

  if ($msg_error_FluxBB2PWG == '')
    array_push($page['infos'], l10n('Audit_FluxBB2PWG').'<br>'.l10n('Audit_OK'));
  else
    $msg_error_FluxBB2PWG = l10n('Audit_FluxBB2PWG').$msg_error_FluxBB2PWG;



  if ($msg_error_PWG_Dup <> '')
    $errors[] = $msg_error_PWG_Dup . ( ($msg_error_FluxBB_Dup == '' and $msg_error_Link_Break == '' and $msg_error_Link_Bad == '' and $msg_error_Synchro == '' and $msg_error_PWG2FluxBB == '' and $msg_error_FluxBB2PWG == '') ? '' : '<br><br>' );
  
  if ($msg_error_FluxBB_Dup <> '')
    $errors[] = $msg_error_FluxBB_Dup . ( ($msg_error_Link_Break == '' and $msg_error_Link_Bad == '' and $msg_error_Synchro == '' and $msg_error_PWG2FluxBB == '' and $msg_error_FluxBB2PWG == '') ? '' : '<br><br>' );

  if ($msg_error_Link_Break <> '')
    $errors[] = $msg_error_Link_Break . ( ($msg_error_Link_Bad == '' and $msg_error_Synchro == '' and $msg_error_PWG2FluxBB == '' and $msg_error_FluxBB2PWG == '') ? '' : '<br><br>' );

  if ($msg_error_Link_Bad <> '')
    $errors[] = $msg_error_Link_Bad . ( ($msg_error_Synchro == '' and $msg_error_PWG2FluxBB == '' and $msg_error_FluxBB2PWG == '') ? '' : '<br><br>' );

  if ($msg_error_Synchro <> '')
    $errors[] = $msg_error_Synchro . ( ($msg_error_PWG2FluxBB == '' and $msg_error_FluxBB2PWG == '') ? '' : '<br><br>' );

  if ($msg_error_PWG2FluxBB <> '')
    $errors[] = $msg_error_PWG2FluxBB . ( ($msg_error_FluxBB2PWG == '') ? '' : '<br><br>' );

  if ($msg_error_FluxBB2PWG <> '')
    $errors[] = $msg_error_FluxBB2PWG;
}


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
AND '.$conf['user_fields']['username'].' NOT IN ("18","16")
;';

      list($username) = pwg_db_fetch_row(pwg_query($query));

      FluxBB_Updateuser($user['id'], stripslashes($username), sha1($_POST['use_new_pwd']), $_POST['mail_address']);
    }
  }
}


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



function FluxBB_Unlinkuser($bb_id)
{
  $query = '
DELETE FROM '.Register_FluxBB_ID_TABLE.'
WHERE id_user_FluxBB = '.$bb_id.'
;';

  $result = pwg_query($query);
}



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