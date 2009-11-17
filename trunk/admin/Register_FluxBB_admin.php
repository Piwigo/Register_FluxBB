<?php

global $user, $lang, $conf, $template, $errors;

if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');

//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', true);

include_once (PHPWG_ROOT_PATH.'admin/include/tabsheet.class.php');
include_once (PHPWG_ROOT_PATH.'/include/constants.php');
include_once (Register_FluxBB_PATH.'include/constants.php');
include_once (Register_FluxBB_PATH.'include/functions_Register_FluxBB.inc.php');
$my_base_url = get_admin_plugin_menu_link(__FILE__);
load_language('plugin.lang', Register_FluxBB_PATH);

// +-----------------------------------------------------------------------+
// |                            Tabssheet                                  |
// +-----------------------------------------------------------------------+
if (!isset($_GET['tab']))
  $page['tab'] = 'info';
else
  $page['tab'] = $_GET['tab'];

$tabsheet = new tabsheet();
$tabsheet->add('info',
            l10n('Tab_Info'),
            $my_base_url.'&amp;tab=info');
$tabsheet->add('manage',
            l10n('Tab_Manage'),
            $my_base_url.'&amp;tab=manage');
$tabsheet->add('Migration',
            l10n('Tab_Migration'),
            $my_base_url.'&amp;tab=Migration');
$tabsheet->add('Synchro',
            l10n('Tab_Synchro'),
            $my_base_url.'&amp;tab=Synchro');
$tabsheet->select($page['tab']);
$tabsheet->assign();


$page['infos'] = array();
$error = array();

// +-----------------------------------------------------------------------+
// |                            Functions
// +-----------------------------------------------------------------------+
function Audit_PWG_FluxBB()
{
  global $page, $conf, $errors;

  $conf_Register_FluxBB = isset($conf['Register_FluxBB']) ? explode(";" , $conf['Register_FluxBB']) : array();

  $page_Register_FluxBB_admin = get_admin_plugin_menu_link(__FILE__);
  


  $msg_error_PWG_Dup = '';
  $msg_error_FluxBB_Dup = '';
  $msg_error_Link_Break = '';
  $msg_error_Link_Bad = '';
  $msg_error_Synchro = '';
  $msg_ok_Synchro = '';
  $msg_error_PWG2FluxBB = '';
  $msg_error_FluxBB2PWG = '';



  $query = "
SELECT COUNT(*) AS nbr_dup, id, username
FROM ".USERS_TABLE." 
GROUP BY BINARY username
HAVING COUNT(*) > 1
;";
  $result = pwg_query($query);
  
  while($row = mysql_fetch_array($result))
    $msg_error_PWG_Dup .= '<br/>'.l10n('Register_FluxBB_Error_PWG_Dup').$row['nbr_dup'].' x '.stripslashes($row['username']);

  if ($msg_error_PWG_Dup == '')
    array_push($page['infos'], l10n('Register_FluxBB_Audit_PWG_Dup').'<br/>'.l10n('Register_FluxBB_Audit_OK'));
  else
    $msg_error_PWG_Dup = l10n('Register_FluxBB_Audit_PWG_Dup').$msg_error_PWG_Dup.'<br>'.l10n('Register_FluxBB_Advise_PWG_Dup');
  


  $query = "
SELECT COUNT(*) AS nbr_dup, username
FROM ".FluxBB_USERS_TABLE." 
GROUP BY BINARY username
HAVING COUNT(*) > 1
;";
  $result = pwg_query($query);
  
  while($row = mysql_fetch_array($result))
  {
    $msg_error_FluxBB_Dup .= '<br/>'.l10n('Register_FluxBB_Error_FluxBB_Dup').$row['nbr_dup'].' x '.stripslashes($row['username']);

    $subquery = "
SELECT id, username, email
FROM ".FluxBB_USERS_TABLE." 
WHERE BINARY username = BINARY '".$row['username']."'
;";
    $subresult = pwg_query($subquery);
  
    while($subrow = mysql_fetch_array($subresult))
    {
      $msg_error_FluxBB_Dup .= '<br/>id:'.$subrow['id'].'='.stripslashes($subrow['username']).' ('.$subrow['email'].')';
  
      if ( !is_adviser() )
      {
        $msg_error_FluxBB_Dup .= ' <a href="';
      
        $msg_error_FluxBB_Dup .= add_url_params($page_Register_FluxBB_admin, array(
          'action' => 'del_user',
          'id' => $subrow['id'],
        ));
        
        $msg_error_FluxBB_Dup .= '" title="'.l10n('Register_FluxBB_Del_User').stripslashes($subrow['username']).'"';
        
        $msg_error_FluxBB_Dup .= $conf_Register_FluxBB[4]=='false' ?  ' onclick="return confirm(\''.l10n('Are you sure?').'\');" ' : ' ';
        
        $msg_error_FluxBB_Dup .= '><img src="'.Register_FluxBB_PATH.'/icon/user_delete.png" alt="'.l10n('Register_FluxBB_Del_User').$subrow['username'].'" /></a>';
      }
    }
  }

  if ($msg_error_FluxBB_Dup == '')
    array_push($page['infos'], l10n('Register_FluxBB_Audit_FluxBB_Dup').'<br/>'.l10n('Register_FluxBB_Audit_OK'));
  else
    $msg_error_FluxBB_Dup = l10n('Register_FluxBB_Audit_FluxBB_Dup').$msg_error_FluxBB_Dup.'<br>'.l10n('Register_FluxBB_Advise_FluxBB_Dup');
  


  $query = "
SELECT pwg.id as pwg_id, bb.id as bb_id, pwg.username as pwg_user, pwg.mail_address as pwg_mail
FROM ".FluxBB_USERS_TABLE." AS bb, ".USERS_TABLE." as pwg
WHERE bb.id NOT in (
  SELECT id_user_FluxBB
  FROM ".Register_FluxBB_ID_TABLE."
  )
AND pwg.id NOT in (
  SELECT id_user_pwg
  FROM ".Register_FluxBB_ID_TABLE."
  )
AND pwg.username = bb.username
AND pwg.mail_address = bb.email
;";

  $result = pwg_query($query);
  
  while($row = mysql_fetch_array($result))
  {
    $msg_error_Link_Break .= '<br/>'.l10n('Register_FluxBB_Error_Link_Break').stripslashes($row['pwg_user']).' ('.$row['pwg_mail'].')';

    if ( !is_adviser() )
    {
      $msg_error_Link_Break .= ' <a href="';
  
      $msg_error_Link_Break .= add_url_params($page_Register_FluxBB_admin, array(
        'action'   => 'new_link',
        'pwg_id' => $row['pwg_id'],
        'bb_id' => $row['bb_id'],
      ));
      
      $msg_error_Link_Break .= '" title="'.l10n('Register_FluxBB_New_Link').stripslashes($row['pwg_user']).'"';
      
      $msg_error_Link_Break .= $conf_Register_FluxBB[4]=='false' ?  ' onclick="return confirm(\''.l10n('Are you sure?').'\');" ' : ' ';

      $msg_error_Link_Break .= '><img src="'.Register_FluxBB_PATH.'/icon/link_break.png" alt="'.l10n('Register_FluxBB_New_Link').stripslashes($row['pwg_user']).'" /></a>';
    }
  }

  if ($msg_error_Link_Break == '')
    array_push($page['infos'], l10n('Register_FluxBB_Audit_Link_Break').'<br/>'.l10n('Register_FluxBB_Audit_OK'));
  else
    $msg_error_Link_Break = l10n('Register_FluxBB_Audit_Link_Break').$msg_error_Link_Break;
    

  
  $query = "
SELECT pwg.username as pwg_user, pwg.id as pwg_id, pwg.mail_address as pwg_mail, bb.id as bb_id, bb.username as bb_user, bb.email as bb_mail
FROM ".FluxBB_USERS_TABLE." AS bb 
INNER JOIN ".Register_FluxBB_ID_TABLE." AS link ON link.id_user_FluxBB = bb.id
INNER JOIN ".USERS_TABLE." as pwg ON link.id_user_pwg = pwg.id
WHERE pwg.username <> bb.username
;";

  $result = pwg_query($query);
  
  while($row = mysql_fetch_array($result))
  {
    $msg_error_Link_Bad .= '<br/>'.l10n('Register_FluxBB_Error_Link_Del').stripslashes($row['pwg_user']).' ('.$row['pwg_mail'].')'.' -- '.stripslashes($row['bb_user']).' ('.$row['bb_mail'].')';

    if ( !is_adviser() )
    {
      $msg_error_Link_Bad .= ' <a href="';
  
      $msg_error_Link_Bad .= add_url_params($page_Register_FluxBB_admin, array(
        'action'   => 'link_del',
        'pwg_id' => $row['pwg_id'],
        'bb_id'  => $row['bb_id'],
      ));
      
      $msg_error_Link_Bad .= '" title="'.l10n('Register_FluxBB_Link_Del').stripslashes($row['pwg_user']).' -- '.stripslashes($row['bb_user']).'"';
      
      $msg_error_Link_Bad .= $conf_Register_FluxBB[4]=='false' ?  ' onclick="return confirm(\''.l10n('Are you sure?').'\');" ' : ' ';
      
      $msg_error_Link_Bad .= '><img src="'.Register_FluxBB_PATH.'/icon/link_delete.png" alt="'.l10n('Register_FluxBB_Link_Del').stripslashes($row['pwg_user']).' -- '.stripslashes($row['bb_user']).'" /></a>';

      $msg_error_Link_Bad .= ' -- <a href="';

      $msg_error_Link_Bad .= add_url_params($page_Register_FluxBB_admin, array(
        'action' => 'sync_user',
        'username' => stripslashes($row['pwg_user']),
      ));
      
      $msg_error_Link_Bad .= '" title="'.l10n('Register_FluxBB_Sync_User').stripslashes($row['pwg_user']).' --> '.stripslashes($row['bb_user']).'"';
      
      $msg_error_Link_Bad .= $conf_Register_FluxBB[4]=='false' ?  ' onclick="return confirm(\''.l10n('Are you sure?').'\');" ' : ' ';
      
      $msg_error_Link_Bad .= '><img src="'.Register_FluxBB_PATH.'/icon/arrow_switch.png" alt="'.l10n('Register_FluxBB_Sync_User').stripslashes($row['pwg_user']).' --> '.stripslashes($row['bb_user']).'" /></a>';
    }
  }


  $query = "
SELECT COUNT(*) as nbr_dead
FROM ".Register_FluxBB_ID_TABLE." AS Link
WHERE id_user_FluxBB NOT IN (
  SELECT id
  FROM ".FluxBB_USERS_TABLE."
  )
OR id_user_pwg NOT IN (
  SELECT id
  FROM ".USERS_TABLE."
  )
;";

  $Compteur = mysql_fetch_array(pwg_query($query));

  if (!empty($Compteur) and $Compteur['nbr_dead'] > 0)
  { 
    $msg_error_Link_Bad .= '<br/>'.l10n('Register_FluxBB_Error_Link_Dead').$Compteur['nbr_dead'];

    if ( !is_adviser() )
    {
      $msg_error_Link_Bad .= ' <a href="';
  
      $msg_error_Link_Bad .= add_url_params($page_Register_FluxBB_admin, array(
        'action'   => 'link_dead',
      ));
      
      $msg_error_Link_Bad .= '" title="'.l10n('Register_FluxBB_Link_Dead').$Compteur['nbr_dead'].'"';
      
      $msg_error_Link_Bad .= $conf_Register_FluxBB[4]=='false' ?  ' onclick="return confirm(\''.l10n('Are you sure?').'\');" ' : ' ';
      
      $msg_error_Link_Bad .= '><img src="'.Register_FluxBB_PATH.'/icon/link_delete.png" alt="'.l10n('Register_FluxBB_Link_Dead').$Compteur['nbr_dead'].'" /></a>';
    }
  }

  $query = "
SELECT COUNT(*) AS nbr_dup, pwg.id AS pwg_id, pwg.username AS pwg_user, bb.username AS bb_user, bb.id AS bb_id
FROM ".FluxBB_USERS_TABLE." AS bb 
INNER JOIN ".Register_FluxBB_ID_TABLE." AS link ON link.id_user_FluxBB = bb.id
INNER JOIN ".USERS_TABLE." as pwg ON link.id_user_pwg = pwg.id
GROUP BY link.id_user_pwg, link.id_user_FluxBB
HAVING COUNT(*) > 1
;";

  $result = pwg_query($query);
  
  while($row = mysql_fetch_array($result))
  {
    $msg_error_Link_Bad .= '<br/>'.l10n('Register_FluxBB_Error_Link_Dup').$row['nbr_dup'].' = '.stripslashes($row['pwg_user']).' -- '.stripslashes($row['bb_user']).')';

    if ( !is_adviser() )
    {
      $msg_error_Link_Bad .= ' <a href="';

      $msg_error_Link_Bad .= add_url_params($page_Register_FluxBB_admin, array(
        'action'   => 'new_link',
        'pwg_id' => $row['pwg_id'],
        'bb_id' => $row['bb_id'],
      ));
      
      $msg_error_Link_Bad .= '" title="'.l10n('Register_FluxBB_Link_Dup').stripslashes($row['pwg_user']).' -- '.stripslashes($row['bb_user']).'"';
      
      $msg_error_Link_Bad .= $conf_Register_FluxBB[4]=='false' ?  ' onclick="return confirm(\''.l10n('Are you sure?').'\');" ' : ' ';
      
      $msg_error_Link_Bad .= '><img src="'.Register_FluxBB_PATH.'/icon/link_error.png" alt="'.l10n('Register_FluxBB_Link_Dup').stripslashes($row['pwg_user']).' -- '.stripslashes($row['bb_user']).'" /></a>';
    }      
  }

  if ($msg_error_Link_Bad == '')
    array_push($page['infos'], l10n('Register_FluxBB_Audit_Link_Bad').'<br/>'.l10n('Register_FluxBB_Audit_OK'));
  else
    $msg_error_Link_Bad = l10n('Register_FluxBB_Audit_Link_Bad').$msg_error_Link_Bad;
    

  
  $query = "
SELECT pwg.username as username, pwg.password as pwg_pwd, pwg.mail_address as pwg_eml, FluxBB.password as bb_pwd, FluxBB.email as bb_eml
FROM ".FluxBB_USERS_TABLE." AS FluxBB 
INNER JOIN ".Register_FluxBB_ID_TABLE." AS link ON link.id_user_FluxBB = FluxBB.id
INNER JOIN ".USERS_TABLE." as pwg ON link.id_user_pwg = pwg.id
AND BINARY pwg.username = BINARY FluxBB.username
ORDER BY LOWER(pwg.username)
;";

  $result = pwg_query($query);
  
  while($row = mysql_fetch_array($result))
  {
    if ( ($row['pwg_pwd'] != $row['bb_pwd']) or ($row['pwg_eml'] != $row['bb_eml']) )
    {
      $msg_error_Synchro .= '<br/>'.l10n('Register_FluxBB_Error_Synchro').stripslashes($row['username']);

      if ( !is_adviser() )
      {
        $msg_error_Synchro .= ' <a href="';
  
        $msg_error_Synchro .= add_url_params($page_Register_FluxBB_admin, array(
          'action' => 'sync_user',
          'username' => stripslashes($row['username']),
        ));
        
        $msg_error_Synchro .= '" title="'.l10n('Register_FluxBB_Sync_User').stripslashes($row['username']).'"';
        
        $msg_error_Synchro .= $conf_Register_FluxBB[4]=='false' ?  ' onclick="return confirm(\''.l10n('Are you sure?').'\');" ' : ' ';
        $msg_error_Synchro .= '><img src="'.Register_FluxBB_PATH.'/icon/user_refresh.png" alt="'.l10n('Register_FluxBB_Sync_User').stripslashes($row['username']).'" /></a>';
      }
      
      if ($row['pwg_pwd'] != $row['bb_pwd'])
        $msg_error_Synchro .= '<br>'.l10n('Register_FluxBB_Error_Synchro_Pswd');
      
      if ($row['pwg_eml'] != $row['bb_eml'])
        $msg_error_Synchro .= '<br>'.l10n('Register_FluxBB_Error_Synchro_Mail').'<br/>-- PWG = '.$row['pwg_eml'].'<br/>-- FluxBB = '.$row['bb_eml'];
    }
    else if ($conf_Register_FluxBB[5] == 'true')
      $msg_ok_Synchro .= '<br/> - '.stripslashes($row['username']).' ('.$row['pwg_eml'].')'.l10n('Register_FluxBB_Audit_Synchro_OK');
  }

  if ($msg_error_Synchro <> '')
    $msg_error_Synchro = l10n('Register_FluxBB_Audit_Synchro').$msg_error_Synchro;
    
  if ($msg_ok_Synchro <> '')
    if ($msg_error_Synchro <> '')
      array_push($page['infos'], l10n('Register_FluxBB_Audit_Synchro').$msg_ok_Synchro.'<br/><br/>');
    else
      array_push($page['infos'], l10n('Register_FluxBB_Audit_Synchro').$msg_ok_Synchro.'<br/><br/>'.l10n('Register_FluxBB_Audit_OK'));


  $query = "
SELECT username, mail_address FROM ".USERS_TABLE."
WHERE BINARY username <> BINARY 'guest'
AND id not in (
  SELECT id_user_pwg FROM ".Register_FluxBB_ID_TABLE."
  )
AND BINARY username not in (
  SELECT username FROM ".FluxBB_USERS_TABLE."
  )
ORDER BY LOWER(username)
;";

  $result = pwg_query($query);

  while($row = mysql_fetch_array($result))
  {
    $msg_error_PWG2FluxBB .= '<br/>'.l10n('Register_FluxBB_Error_PWG2FluxBB').stripslashes($row['username']).' ('.$row['mail_address'].')';

    if ( !is_adviser() )
    {
      $msg_error_PWG2FluxBB .= ' <a href="';

      $msg_error_PWG2FluxBB .= add_url_params($page_Register_FluxBB_admin, array(
        'action' => 'add_user',
        'username' => stripslashes($row['username']),
      ));
      
      $msg_error_PWG2FluxBB .= '" title="'.l10n('Register_FluxBB_Add_User').stripslashes($row['username']).'" ';
      
      $msg_error_PWG2FluxBB .= $conf_Register_FluxBB[4]=='false' ?  ' onclick="return confirm(\''.l10n('Are you sure?').'\');" ' : ' ';

      $msg_error_PWG2FluxBB .= '><img src="'.Register_FluxBB_PATH.'/icon/user_add.png" alt="'.l10n('Register_FluxBB_Add_User').stripslashes($row['username']).'" /></a>';
    }
  }

  if ($msg_error_PWG2FluxBB == '')
    array_push($page['infos'], l10n('Register_FluxBB_Audit_PWG2FluxBB').'<br/>'.l10n('Register_FluxBB_Audit_OK'));
  else
    $msg_error_PWG2FluxBB = l10n('Register_FluxBB_Audit_PWG2FluxBB').$msg_error_PWG2FluxBB;

  

  $query = "
SELECT id, username, email FROM ".FluxBB_USERS_TABLE."
WHERE BINARY username <> BINARY '".$conf_Register_FluxBB[2]."'
AND id not in (
  SELECT id_user_FluxBB FROM ".Register_FluxBB_ID_TABLE."
  )
AND BINARY username not in (
  SELECT username FROM ".USERS_TABLE."
  )
ORDER BY LOWER(username)
;";

  $result = pwg_query($query);

  while($row = mysql_fetch_array($result))
  {
    $msg_error_FluxBB2PWG .= '<br/>'.l10n('Register_FluxBB_Error_FluxBB2PWG').stripslashes($row['username']).' ('.$row['email'].')';

    if ( !is_adviser() )
    {
      $msg_error_FluxBB2PWG .= ' <a href="';
    
      $msg_error_FluxBB2PWG .= add_url_params($page_Register_FluxBB_admin, array(
        'action' => 'del_user',
        'id' => $row['id'],
      ));
      
      $msg_error_FluxBB2PWG .= '" title="'.l10n('Register_FluxBB_Del_User').stripslashes($row['username']).'"';
      
      $msg_error_FluxBB2PWG .= $conf_Register_FluxBB[4]=='false' ?  ' onclick="return confirm(\''.l10n('Are you sure?').'\');" ' : ' ';

      $msg_error_FluxBB2PWG .= '><img src="'.Register_FluxBB_PATH.'/icon/user_delete.png" alt="'.l10n('Register_FluxBB_Del_User').stripslashes($row['username']).'" /></a>';
    }
  }

  if ($msg_error_FluxBB2PWG == '')
    array_push($page['infos'], l10n('Register_FluxBB_Audit_FluxBB2PWG').'<br/>'.l10n('Register_FluxBB_Audit_OK'));
  else
    $msg_error_FluxBB2PWG = l10n('Register_FluxBB_Audit_FluxBB2PWG').$msg_error_FluxBB2PWG;



  if ($msg_error_PWG_Dup <> '')
    $errors[] = $msg_error_PWG_Dup . ( ($msg_error_FluxBB_Dup == '' and $msg_error_Link_Break == '' and $msg_error_Link_Bad == '' and $msg_error_Synchro == '' and $msg_error_PWG2FluxBB == '' and $msg_error_FluxBB2PWG == '') ? '' : '<br/><br/>' );
  
  if ($msg_error_FluxBB_Dup <> '')
    $errors[] = $msg_error_FluxBB_Dup . ( ($msg_error_Link_Break == '' and $msg_error_Link_Bad == '' and $msg_error_Synchro == '' and $msg_error_PWG2FluxBB == '' and $msg_error_FluxBB2PWG == '') ? '' : '<br/><br/>' );

  if ($msg_error_Link_Break <> '')
    $errors[] = $msg_error_Link_Break . ( ($msg_error_Link_Bad == '' and $msg_error_Synchro == '' and $msg_error_PWG2FluxBB == '' and $msg_error_FluxBB2PWG == '') ? '' : '<br/><br/>' );

  if ($msg_error_Link_Bad <> '')
    $errors[] = $msg_error_Link_Bad . ( ($msg_error_Synchro == '' and $msg_error_PWG2FluxBB == '' and $msg_error_FluxBB2PWG == '') ? '' : '<br/><br/>' );

  if ($msg_error_Synchro <> '')
    $errors[] = $msg_error_Synchro . ( ($msg_error_PWG2FluxBB == '' and $msg_error_FluxBB2PWG == '') ? '' : '<br/><br/>' );

  if ($msg_error_PWG2FluxBB <> '')
    $errors[] = $msg_error_PWG2FluxBB . ( ($msg_error_FluxBB2PWG == '') ? '' : '<br/><br/>' );

  if ($msg_error_FluxBB2PWG <> '')
    $errors[] = $msg_error_FluxBB2PWG;
}




// +-----------------------------------------------------------------------+
// |                            Actions process
// +-----------------------------------------------------------------------+

if ( isset($_GET['action']) and ($_GET['action']=='link_dead') and !is_adviser() )
{
  $query = "
DELETE FROM ".Register_FluxBB_ID_TABLE."
WHERE id_user_FluxBB NOT IN (
  SELECT id
  FROM ".FluxBB_USERS_TABLE."
  )
OR id_user_pwg NOT IN (
  SELECT id
  FROM ".USERS_TABLE."
  )
;";

  $result = pwg_query($query);
  
  Audit_PWG_FluxBB();
}
else if ( isset($_GET['action']) and ($_GET['action']=='link_del') and isset($_GET['pwg_id']) and isset($_GET['bb_id']) and !is_adviser() )
{
  $query = "
DELETE FROM ".Register_FluxBB_ID_TABLE."
WHERE id_user_pwg = ".$_GET['pwg_id']."
AND id_user_FluxBB = ".$_GET['bb_id']."
;";

  $result = pwg_query($query);
  
  Audit_PWG_FluxBB();
}
else if ( isset($_GET['action']) and ($_GET['action']=='new_link') and isset($_GET['pwg_id']) and isset($_GET['bb_id']) and !is_adviser() )
{
  FluxBB_Linkuser($_GET['pwg_id'], $_GET['bb_id']);
  
  Audit_PWG_FluxBB();
}
else if ( isset($_GET['action']) and ($_GET['action']=='sync_user') and isset($_GET['username']) and !is_adviser() )
{
  $query = "
SELECT id AS id_pwg, username, password, mail_address 
FROM ".USERS_TABLE."
WHERE BINARY username = BINARY '".mysql_real_escape_string($_GET['username'])."'
LIMIT 1
;";

  $data = mysql_fetch_array(pwg_query($query));
  
  if (!empty($data))
  {
    FluxBB_Updateuser($data['id_pwg'], stripslashes($data['username']), $data['password'], $data['mail_address']);
  }
  
  Audit_PWG_FluxBB();
}
else if ( isset($_GET['action']) and ($_GET['action']=='add_user') and isset($_GET['username']) and !is_adviser() )
{
  $query = "
SELECT id, username, password, mail_address 
FROM ".USERS_TABLE."
WHERE BINARY username = BINARY '".mysql_real_escape_string($_GET['username'])."'
LIMIT 1
;";

  $data = mysql_fetch_array(pwg_query($query));
  
  if (!empty($data))
    FluxBB_Adduser($data['id'], stripslashes($data['username']), $data['password'], $data['mail_address']);  
  
    Audit_PWG_FluxBB();
}
else if ( isset($_GET['action']) and ($_GET['action']=='del_user') and isset($_GET['id']) and !is_adviser() )
{
  FluxBB_Deluser( $_GET['id'], true );
  
  Audit_PWG_FluxBB();
}


// +-----------------------------------------------------------------------+
// |                            Tabssheet select                           |
// +-----------------------------------------------------------------------+

switch ($page['tab'])
{
  case 'info':
  
  $template->set_filename('plugin_admin_content', dirname(__FILE__) . '/info.tpl');
  $template->assign_var_from_handle('ADMIN_CONTENT', 'plugin_admin_content');

	break;

	case 'manage':
  
  if ( isset($_POST['submit']) and !is_adviser() and isset($_POST['FluxBB_prefix']) and isset($_POST['FluxBB_admin']) and isset($_POST['FluxBB_guest']) and isset($_POST['FluxBB_del_pt']) and isset($_POST['FluxBB_confirm']) and isset($_POST['FluxBB_details']) )
  {
    $conf['Register_FluxBB'] = $_POST['FluxBB_prefix'].';'.addslashes($_POST['FluxBB_admin']).';'.addslashes($_POST['FluxBB_guest']).';'.$_POST['FluxBB_del_pt'].';'.$_POST['FluxBB_confirm'].';'.$_POST['FluxBB_details'];

    $query = '
UPDATE '.CONFIG_TABLE.'
SET value="'.$conf['Register_FluxBB'].'"
WHERE param="Register_FluxBB"
LIMIT 1
;';

    pwg_query($query);

    array_push($page['infos'], l10n('Register_FluxBB_save_config'));
  }

  $conf_Register_FluxBB = isset($conf['Register_FluxBB']) ? explode(";" , $conf['Register_FluxBB']) : array();

  $template->assign(array(
    'FluxBB_PREFIX'           => $conf_Register_FluxBB[0],
    'FluxBB_ADMIN'            => stripslashes($conf_Register_FluxBB[1]),
    'FluxBB_GUEST'            => stripslashes($conf_Register_FluxBB[2]),
    'FluxBB_DEL_PT_TRUE'      => (isset($conf_Register_FluxBB[3]) and $conf_Register_FluxBB[3] == 'true') ? 'checked="checked"' : '' ,
    'FluxBB_DEL_PT_FALSE'     => (isset($conf_Register_FluxBB[3]) and $conf_Register_FluxBB[3] == 'false') ? 'checked="checked"' : '' ,
    'FluxBB_CONFIRM_TRUE'     => (isset($conf_Register_FluxBB[4]) and $conf_Register_FluxBB[4] == 'true') ? 'checked="checked"' : '' ,
    'FluxBB_CONFIRM_FALSE'    => (isset($conf_Register_FluxBB[4]) and $conf_Register_FluxBB[4] == 'false') ? 'checked="checked"' : '' ,
    'FluxBB_DETAILS_TRUE'     => (isset($conf_Register_FluxBB[5]) and $conf_Register_FluxBB[5] == 'true') ? 'checked="checked"' : '' ,
    'FluxBB_DETAILS_FALSE'    => (isset($conf_Register_FluxBB[5]) and $conf_Register_FluxBB[5] == 'false') ? 'checked="checked"' : '' ,
    )
  );


  $template->set_filename('plugin_admin_content', dirname(__FILE__) . '/manage.tpl');
  $template->assign_var_from_handle('ADMIN_CONTENT', 'plugin_admin_content');

	break;

	case 'Migration':
	
  if ( isset($_POST['Migration']) and !is_adviser() )
  {
    array_push($page['infos'], l10n('Register_FluxBB_Mig_Start').'<br/><br/>');
  
    array_push($page['infos'], l10n('Register_FluxBB_Mig_Del_Link').'<br/><br/>');

    $query = "TRUNCATE ".Register_FluxBB_ID_TABLE.";";
    $result = pwg_query($query);
  
  
    $msg_Mig_Del_AllUsers = '';

    $query = "
SELECT username, id
FROM ".FluxBB_USERS_TABLE."
;";

    $result = pwg_query($query);
  
    while ($row = mysql_fetch_array($result))
    {
      if((stripslashes($row['username']) != stripslashes($conf_Register_FluxBB[2])) and (stripslashes($row['username']) != stripslashes($conf_Register_FluxBB[1])))
      {
        $msg_Mig_Del_AllUsers .= '<br/> - '.l10n('Register_FluxBB_Mig_Del_User').stripslashes($row['username']);
        
        FluxBB_Deluser($row['id'], false);
      }
    }

    array_push($page['infos'], l10n('Register_FluxBB_Mig_Del_AllUsers').$msg_Mig_Del_AllUsers.'<br/><br/>');


    $query = "
SELECT id, username, password, mail_address
FROM ".USERS_TABLE."
;";

    $result = pwg_query($query);
  
    $registred = time();
    $registred_ip = $_SERVER['REMOTE_ADDR'];
  
    $msg_Mig_Add_AllUsers = '';
  
    while ($row = mysql_fetch_array($result))
    {
      if((stripslashes($row['username']) != 'guest') and (stripslashes($row['username']) != stripslashes($conf_Register_FluxBB[1])))
      {
        $msg_Mig_Add_AllUsers .= '<br/> - '.l10n('Register_FluxBB_Mig_Add_User').stripslashes($row['username']);

        FluxBB_Adduser($row['id'], stripslashes($row['username']), $row['password'], $row['mail_address']);
      }
    }

    array_push($page['infos'], l10n('Register_FluxBB_Mig_Add_AllUsers').$msg_Mig_Add_AllUsers.'<br/><br/>');


    $query = "
SELECT id, username, password, mail_address
FROM ".USERS_TABLE."
WHERE username = '".$conf_Register_FluxBB[1]."'
;";

    $row = mysql_fetch_array(pwg_query($query));

    if (!empty($row))
    {
      array_push($page['infos'], l10n('Register_FluxBB_Sync_User').stripslashes($row['username']).'<br/><br/>');
      
      FluxBB_Updateuser($row['id'], stripslashes($row['username']), $row['password'], $row['mail_address']);
    }

    array_push($page['infos'], l10n('Register_FluxBB_Mig_End'));
  }
  else if ( isset($_POST['Audit']))
  {
    Audit_PWG_FluxBB();
  }

  $template->set_filename('plugin_admin_content', dirname(__FILE__) . '/migration.tpl');
  $template->assign_var_from_handle('ADMIN_CONTENT', 'plugin_admin_content');

	break;
  
	case 'Synchro':
  
  if ( isset($_POST['Synchro']) and !is_adviser() )
  {
    global $page,$conf, $errors;

    $conf_Register_FluxBB = isset($conf['Register_FluxBB']) ? explode(";" , $conf['Register_FluxBB']) : array();

    $page_Register_FluxBB_admin = get_admin_plugin_menu_link(__FILE__);
  

    $msg_error_PWG_Dup = '';
    $msg_error_FluxBB_Dup = '';
    $msg_error_Link_Break = '';
    $msg_error_Link_Bad = '';
    $msg_error_Synchro = '';
    $msg_ok_Synchro = '';
    $msg_error_FluxBB2PWG = '';
    $msg_error_PWG2FluxBB = '';


    $query = "
SELECT COUNT(*) AS nbr_dup, id, username
FROM ".USERS_TABLE." 
GROUP BY BINARY username
HAVING COUNT(*) > 1
;";

    $result = pwg_query($query);
  
    while($row = mysql_fetch_array($result))
      $msg_error_PWG_Dup .= '<br/>'.l10n('Register_FluxBB_Error_PWG_Dup').$row['nbr_dup'].' x '.stripslashes($row['username']);

      if ($msg_error_PWG_Dup <> '')
        $msg_error_PWG_Dup = l10n('Register_FluxBB_Audit_PWG_Dup').$msg_error_PWG_Dup.'<br>'.l10n('Register_FluxBB_Advise_PWG_Dup');
  

    $query = "
SELECT COUNT(*) AS nbr_dup, username
FROM ".FluxBB_USERS_TABLE." 
GROUP BY BINARY username
HAVING COUNT(*) > 1
;";

    $result = pwg_query($query);
  
    while($row = mysql_fetch_array($result))
    {
      $msg_error_FluxBB_Dup .= '<br/>'.l10n('Register_FluxBB_Error_FluxBB_Dup').$row['nbr_dup'].' x '.stripslashes($row['username']);

      $subquery = "
SELECT id, username, email
FROM ".FluxBB_USERS_TABLE." 
WHERE BINARY username = BINARY '".$row['username']."'
;";

      $subresult = pwg_query($subquery);
  
      while($subrow = mysql_fetch_array($subresult))
      {
        $msg_error_FluxBB_Dup .= '<br/>id:'.$subrow['id'].'='.stripslashes($subrow['username']).' ('.$subrow['email'].')';
  
        if ( !is_adviser() )
        {
          $msg_error_FluxBB_Dup .= ' <a href="';
      
          $msg_error_FluxBB_Dup .= add_url_params($page_Register_FluxBB_admin, array(
            'action' => 'del_user',
            'id' => $subrow['id'],
          ));

          $msg_error_FluxBB_Dup .= '" title="'.l10n('Register_FluxBB_Del_User').stripslashes($subrow['username']).'"';

          $msg_error_FluxBB_Dup .= $conf_Register_FluxBB[4]=='false' ?  ' onclick="return confirm(\''.l10n('Are you sure?').'\');" ' : ' ';

          $msg_error_FluxBB_Dup .= '><img src="'.Register_FluxBB_PATH.'/icon/user_delete.png" alt="'.l10n('Register_FluxBB_Del_User').stripslashes($subrow['username']).'" /></a>';
        }
      }
    }

    if ($msg_error_FluxBB_Dup <> '')
      $msg_error_FluxBB_Dup = l10n('Register_FluxBB_Sync_Check_Dup').$msg_error_FluxBB_Dup.'<br>'.l10n('Register_FluxBB_Advise_FluxBB_Dup');
  

    if ($msg_error_FluxBB_Dup == '' and $msg_error_PWG_Dup == '')
    {
      $query = "
SELECT pwg.id as pwg_id, bb.id as bb_id, pwg.username as pwg_user, pwg.mail_address as pwg_mail
FROM ".FluxBB_USERS_TABLE." AS bb, ".USERS_TABLE." as pwg
WHERE bb.id NOT in (
  SELECT id_user_FluxBB
  FROM ".Register_FluxBB_ID_TABLE."
  )
AND pwg.id NOT in (
  SELECT id_user_pwg
  FROM ".Register_FluxBB_ID_TABLE."
  )
AND pwg.username = bb.username
AND pwg.mail_address = bb.email
;";

      $result = pwg_query($query);
    
      while($row = mysql_fetch_array($result))
      {
        $msg_error_Link_Break .= '<br/>'.l10n('Register_FluxBB_New_Link').stripslashes($row['pwg_user']).' ('.$row['pwg_mail'].')';
  
        FluxBB_Linkuser($row['pwg_id'], $row['bb_id']);
      }
  
      if ($msg_error_Link_Break == '')
        array_push($page['infos'], l10n('Register_FluxBB_Sync_Link_Break').'<br/>'.l10n('Register_FluxBB_Sync_OK'));
      else
        $msg_error_Link_Break = l10n('Register_FluxBB_Sync_Link_Break').$msg_error_Link_Break;
  
    
      $query = "
SELECT pwg.username as pwg_user, pwg.id as pwg_id, pwg.mail_address as pwg_mail, bb.id as bb_id, bb.username as bb_user, bb.email as bb_mail
FROM ".FluxBB_USERS_TABLE." AS bb 
INNER JOIN ".Register_FluxBB_ID_TABLE." AS link ON link.id_user_FluxBB = bb.id
INNER JOIN ".USERS_TABLE." as pwg ON link.id_user_pwg = pwg.id
WHERE BINARY pwg.username <> BINARY bb.username
;";

      $result = pwg_query($query);
    
      while($row = mysql_fetch_array($result))
      {
        $msg_error_Link_Bad .= '<br/>'.l10n('Register_FluxBB_Link_Del').stripslashes($row['pwg_user']).' ('.$row['pwg_mail'].')'.' -- '.stripslashes($row['bb_user']).' ('.$row['bb_mail'].')';

        $subquery = "
DELETE FROM ".Register_FluxBB_ID_TABLE."
WHERE id_user_pwg = ".$row['pwg_id']."
AND id_user_FluxBB = ".$row['bb_id']."
;";

        $subresult = pwg_query($subquery);
      }


      $query = "
SELECT COUNT(*) as nbr_dead
FROM ".Register_FluxBB_ID_TABLE." AS Link
WHERE id_user_FluxBB NOT IN (
  SELECT id
  FROM ".FluxBB_USERS_TABLE."
  )
OR id_user_pwg NOT IN (
  SELECT id
  FROM ".USERS_TABLE."
  )
;";

      $Compteur = mysql_fetch_array(pwg_query($query));
    
      if ( !empty($Compteur) and $Compteur['nbr_dead'] > 0)
      { 
        $msg_error_Link_Bad .= '<br/>'.l10n('Register_FluxBB_Link_Dead').$Compteur['nbr_dead'];
    
        $query = "
DELETE FROM ".Register_FluxBB_ID_TABLE."
WHERE id_user_FluxBB NOT IN (
  SELECT id
  FROM ".FluxBB_USERS_TABLE."
  )
OR id_user_pwg NOT IN (
  SELECT id
  FROM ".USERS_TABLE."
  )
;";

        $result = pwg_query($query);
      }
    
      
      $query = "
SELECT COUNT(*) AS nbr_dup, pwg.id AS pwg_id, pwg.username AS pwg_user, bb.username AS bb_user, bb.id AS bb_id
FROM ".FluxBB_USERS_TABLE." AS bb 
INNER JOIN ".Register_FluxBB_ID_TABLE." AS link ON link.id_user_FluxBB = bb.id
INNER JOIN ".USERS_TABLE." as pwg ON link.id_user_pwg = pwg.id
GROUP BY link.id_user_pwg, link.id_user_FluxBB
HAVING COUNT(*) > 1
;";

      $result = pwg_query($query);
    
      while($row = mysql_fetch_array($result))
      {
        $msg_error_Link_Bad .= '<br/>'.l10n('Register_FluxBB_Link_Dup').$row['nbr_dup'].' = '.stripslashes($row['pwg_user']).' -- '.stripslashes($row['bb_user']).')';
  
        FluxBB_Linkuser($row['pwg_id'], $row['bb_id']);
      }

      if ($msg_error_Link_Bad == '')
        array_push($page['infos'], l10n('Register_FluxBB_Sync_Link_Bad').'<br/>'.l10n('Register_FluxBB_Sync_OK'));
      else
        $msg_error_Link_Bad = l10n('Register_FluxBB_Sync_Link_Bad').$msg_error_Link_Bad;
  
    
      $query = "
SELECT pwg.id as pwg_id, pwg.username as username, pwg.password as pwg_pwd, pwg.mail_address as pwg_eml, FluxBB.id as bb_id, FluxBB.password as bb_pwd, FluxBB.email as bb_eml
FROM ".FluxBB_USERS_TABLE." AS FluxBB 
INNER JOIN ".Register_FluxBB_ID_TABLE." AS link ON link.id_user_FluxBB = FluxBB.id
INNER JOIN ".USERS_TABLE." as pwg ON link.id_user_pwg = pwg.id
AND BINARY pwg.username = BINARY FluxBB.username
ORDER BY LOWER(pwg.username)
;";

      $result = pwg_query($query);
    
      while($row = mysql_fetch_array($result))
      {
        if ( ($row['pwg_pwd'] != $row['bb_pwd']) or ($row['pwg_eml'] != $row['bb_eml']) )
        {
          $msg_error_Synchro .= '<br/>'.l10n('Register_FluxBB_Sync_User').stripslashes($row['username']);
  
          $query = "
SELECT id, username, password, mail_address 
FROM ".USERS_TABLE."
WHERE BINARY id = '".$row['pwg_id']."'
;";

          $data = mysql_fetch_array(pwg_query($query));
        
          if (!empty($data))
            FluxBB_Updateuser($data['id'], stripslashes($data['username']), $data['password'], $data['mail_address']);
        }
      }
  
      if ($msg_error_Synchro == '')
        array_push($page['infos'], l10n('Register_FluxBB_Sync_DataUser').'<br/>'.l10n('Register_FluxBB_Sync_OK'));
      else
        $msg_error_Synchro = l10n('Register_FluxBB_Sync_DataUser').$msg_error_Synchro;

  
      $query = "
SELECT username, mail_address FROM ".USERS_TABLE."
WHERE BINARY username <> BINARY 'guest'
AND id not in (
  SELECT id_user_pwg FROM ".Register_FluxBB_ID_TABLE."
  )
AND BINARY username not in (
  SELECT username FROM ".FluxBB_USERS_TABLE."
  )
ORDER BY LOWER(username)
;";

      $result = pwg_query($query);
  
      while($row = mysql_fetch_array($result))
      {
        $msg_error_PWG2FluxBB .= '<br/>'.l10n('Register_FluxBB_Add_User').stripslashes($row['username']).' ('.$row['mail_address'].')';

        $query = "
SELECT id, username, password, mail_address 
FROM ".USERS_TABLE."
WHERE BINARY username = BINARY '".$row['username']."'
LIMIT 1
;";

        $data = mysql_fetch_array(pwg_query($query));
      
        if (!empty($data))
          FluxBB_Adduser($data['id'], stripslashes($data['username']), $data['password'], $data['mail_address']);  
      }
  
      if ($msg_error_PWG2FluxBB == '')
        array_push($page['infos'], l10n('Register_FluxBB_Sync_PWG2FluxBB').'<br/>'.l10n('Register_FluxBB_Sync_OK'));
      else
        $msg_error_PWG2FluxBB = l10n('Register_FluxBB_Sync_PWG2FluxBB').$msg_error_PWG2FluxBB;
    
  
      $query = "
SELECT id, username, email FROM ".FluxBB_USERS_TABLE."
WHERE BINARY username <> BINARY '".$conf_Register_FluxBB[2]."'
AND id not in (
  SELECT id_user_FluxBB FROM ".Register_FluxBB_ID_TABLE."
  )
AND BINARY username not in (
  SELECT username FROM ".USERS_TABLE."
  )
ORDER BY LOWER(username)
;";

      $result = pwg_query($query);
  
      while($row = mysql_fetch_array($result))
      {
        $msg_error_FluxBB2PWG .= '<br/>'.l10n('Register_FluxBB_Error_FluxBB2PWG').stripslashes($row['username']).' ('.$row['email'].')';
  
        if ( !is_adviser() )
        {
          $msg_error_FluxBB2PWG .= ' <a href="';
      
          $msg_error_FluxBB2PWG .= add_url_params($page_Register_FluxBB_admin, array(
            'action' => 'del_user',
            'id' => $row['id'],
          ));

          $msg_error_FluxBB2PWG .= '" title="'.l10n('Register_FluxBB_Del_User').stripslashes($row['username']).'"';

          $msg_error_FluxBB2PWG .= $conf_Register_FluxBB[4]=='false' ?  ' onclick="return confirm(\''.l10n('Are you sure?').'\');" ' : ' ';

          $msg_error_FluxBB2PWG .= '><img src="'.Register_FluxBB_PATH.'/icon/user_delete.png" alt="'.l10n('Register_FluxBB_Del_User').stripslashes($row['username']).'" /></a>';
        }
      }
  
      if ($msg_error_FluxBB2PWG == '')
        array_push($page['infos'], l10n('Register_FluxBB_Sync_FluxBB2PWG').'<br/>'.l10n('Register_FluxBB_Sync_OK'));
      else
        $msg_error_FluxBB2PWG = l10n('Register_FluxBB_Sync_FluxBB2PWG').$msg_error_FluxBB2PWG;
    }
    else
      $errors[] = l10n('Register_FluxBB_Advise_Check_Dup');


    if ($msg_error_PWG_Dup <> '')
      $errors[] = $msg_error_PWG_Dup . ( ($msg_error_FluxBB_Dup == '' and $msg_error_Link_Break == '' and $msg_error_Link_Bad == '' and $msg_error_Synchro == '' and $msg_error_PWG2FluxBB == '' and $msg_error_FluxBB2PWG == '') ? '' : '<br/><br/>' );
  
    if ($msg_error_FluxBB_Dup <> '')
      $errors[] = $msg_error_FluxBB_Dup . ( ($msg_error_Link_Break == '' and $msg_error_Link_Bad == '' and $msg_error_Synchro == '' and $msg_error_PWG2FluxBB == '' and $msg_error_FluxBB2PWG == '') ? '' : '<br/><br/>' );

    if ($msg_error_Link_Break <> '')
      $errors[] = $msg_error_Link_Break . ( ($msg_error_Link_Bad == '' and $msg_error_Synchro == '' and $msg_error_PWG2FluxBB == '' and $msg_error_FluxBB2PWG == '') ? '' : '<br/><br/>' );

    if ($msg_error_Link_Bad <> '')
      $errors[] = $msg_error_Link_Bad . ( ($msg_error_Synchro == '' and $msg_error_PWG2FluxBB == '' and $msg_error_FluxBB2PWG == '') ? '' : '<br/><br/>' );

    if ($msg_error_Synchro <> '')
      $errors[] = $msg_error_Synchro . ( ($msg_error_PWG2FluxBB == '' and $msg_error_FluxBB2PWG == '') ? '' : '<br/><br/>' );

    if ($msg_error_PWG2FluxBB <> '')
      $errors[] = $msg_error_PWG2FluxBB . ( ($msg_error_FluxBB2PWG == '') ? '' : '<br/><br/>' );

    if ($msg_error_FluxBB2PWG <> '')
      $errors[] = $msg_error_FluxBB2PWG;
  }
  else if ( isset($_POST['Audit']))
  {
    Audit_PWG_FluxBB();
  }

  $template->set_filename('plugin_admin_content', dirname(__FILE__) . '/synchro.tpl');
  $template->assign_var_from_handle('ADMIN_CONTENT', 'plugin_admin_content');	

	break;
}
?>