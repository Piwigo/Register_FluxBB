<?php
$lang['Tab_Info'] = 'Instructions';
$lang['Tab_Manage'] = 'Step 1 : Plugin configuration';
$lang['Tab_Migration'] = 'Step 2 : Accounts migration';
$lang['Tab_Synchro'] = 'Maintenance : Accounts re-synchronization';


$lang['Register_FluxBB_Title'] = 'Register FluxBB';
$lang['Register_FluxBB_Disclaimer'] = '
  *** To begin, follow this 2 steps ***<br/>
  Step 1 : Set plugin with the parameters of FluxBB.<br/>
  Step 2 : Migrate user accounts from Piwigo to FluxBB.<br/><br/>
  After these 2 main steps, the plugin is fully functional and you will not have to return to this pages.<br/><br/>
  *** For the maintenance of already active connections ***<br/>
  Maintenance : Synchronize tables (in case an addition, an update or a user deletion mismatched) allows to update passwords and email addresses and see users intruder (But you should not need to use ).<br/><br/>
  <b><blink>WARNING !! For safety, consider making a backup of your database, especially ###_user tables before any action.</blink></b>';


$lang['Register_FluxBB_Config_Title'] = 'Plugin setup';
$lang['Register_FluxBB_Config_Disclaimer'] = '
  Check the settings of your FluxBB installation and correct them if necessary. <br/>
  Change, if any, the behavior of the plugin at your convenience.';
$lang['Register_FluxBB_FluxBB_Prefix'] = 'FluxBB Prefix tables :';
$lang['Register_FluxBB_FluxBB_Admin'] = 'Username of the Piwigo administrator.';
$lang['Register_FluxBB_Register_FluxBB_Guest'] = 'Username of the FluxBB Guest user.';
$lang['Register_FluxBB_Register_FluxBB_User'] = '<b><u>FluxBB\'s administrator name must be the same</u></b>';
$lang['Register_FluxBB_Details'] = 'Level of detail in reports of operations.';
$lang['Register_FluxBB_Details_true'] = ' --&gt; View all details of the results of operations.';
$lang['Register_FluxBB_Details_false'] = ' --&gt; Shows that most of the results of operations';
$lang['Register_FluxBB_Del_Pt'] = 'Removal of topics and posts when the user is deleted.';
$lang['Register_FluxBB_Del_Pt_true'] = ' --&gt; Delete all';
$lang['Register_FluxBB_Del_Pt_false'] = ' --&gt; Don\'t delete topics and posts';
$lang['Register_FluxBB_Confirm'] = 'Delete confirmation on the administration actions in the audit.';
$lang['Register_FluxBB_Confirm_true'] = ' --&gt; Delete confirmation';
$lang['Register_FluxBB_Confirm_false'] = ' --&gt; Confirmation mandatory before actions in audit';
$lang['Register_FluxBB_No_Reg_advise'] = '<b>About the registration of users on the forum FluxBB</b><br/><br/>
  For easiest way for your users, I advise you to change 2 things:<br/>
  * In FluxBB\'s administration panel, change "Allow new registrations" to NO (in: Options - Registration)<br/><br/>
  * Modify the file</b> : [FluxBBRoot]/lang/English/register.php<br/>
  <b>By replacing the following line :</b><br/><br/>
  \'No new regs\'				=>	\'This forum is not accepting new users.\',<br/><br/>
  <b>with :</b><br/><br/>
  \'No new regs\'				=>	\'&lt;a href=&quot;http://[YourPiwigoRoot]/register.php&quot; &gt; Go here to register &lt;/a&gt;&lt;br/&gt;&lt;br/&gt;\',<br/>
  <br/>
  Of course you should also make the same change for other languages of your FluxBB forum.<br/>';

$lang['Register_FluxBB_save_config'] ='Settings saved';


$lang['Register_FluxBB_Audit_Btn'] = 'Audit';
$lang['Register_FluxBB_Sync_Btn'] = 'Synchronization';
$lang['Register_FluxBB_Sync_Title'] = 'Synchronize accounts from Piwigo to FluxBB';
$lang['Register_FluxBB_Sync_Text'] = '
  <b><u>You\'ve already used the plugin to link your Piwigo (plugin update) and / or your FluxBB forum is not empty of users!</u></b><br/>
  <br/> -> This means that your forum owns users.<br/><br/>
  - Synchronization detect the data by comparing the usernames, passwords (encrypted) and their email address in both tables [PrefixPWG]_user and [PrefixFluxBB]_user.<br/>
  - Then update the table of correspondence as well as password and email address for each account from Piwigo to FluxBB except Piwigo Guest and FluxBB Anonymous.<br/>
  - Finally indicate mislead orphaned accounts that exist only in one of the 2 ###_user tables.<br/>
  <br/>
  At the end of the operation, launch an audit and check for possible duplicates users in FluxBB. If so, delete the oldest (sorting FluxBB users according to their date of registration).<br/>';
$lang['Register_FluxBB_Sync_Check_Dup'] = '<b>Analyzing tables of user accounts of Piwigo and FluxBB to control duplicates</b>';
$lang['Register_FluxBB_Advise_Check_Dup'] = '<b>Impossible to continue the synchronization if you have duplicates in the User Account of Piwigo or FluxBB.</b><br/><br/>';
$lang['Register_FluxBB_Sync_Link_Break'] = '<b>Analysis of repairable links between accounts in Piwigo and FluxBB</b>';
$lang['Register_FluxBB_Sync_Link_Bad'] = '<b>Analysis of bad relationships between accounts in Piwigo and FluxBB</b>';
$lang['Register_FluxBB_Sync_DataUser'] = '<b>Analysis of passwords and email addresses between accounts in Piwigo and FluxBB</b>';
$lang['Register_FluxBB_Sync_PWG2FluxBB'] = '<b>Analysis of existing accounts in Piwigo and missing in FluxBB</b>';
$lang['Register_FluxBB_Sync_FluxBB2PWG'] = '<b>Analysis of existing accounts in FluxBB and missing in Piwigo</b>';
$lang['Register_FluxBB_Sync_OK'] = 'Synchronization OK<br/><br/>';

$lang['Register_FluxBB_Audit_PWG_Dup'] = '<b>Audit of Piwigo\'s accounts table</b>';
$lang['Register_FluxBB_Error_PWG_Dup'] = '<b>Error in Piwigo\'s accounts table, there are duplicates:</b> ';
$lang['Register_FluxBB_Advise_PWG_Dup'] = '<b>WARNING! You must make these corrections in Piwigo before continuing<br>use Piwigo\'s user manager to resolve the problem.</b>';

$lang['Register_FluxBB_Audit_FluxBB_Dup'] = '<b>Audit of FluxBB\'s accounts table</b>';
$lang['Register_FluxBB_Error_FluxBB_Dup'] = '<b>Error in FluxBB\'s accounts table, there are duplicates:</b> ';
$lang['Register_FluxBB_Advise_FluxBB_Dup'] = '<b>WARNING! You must make these corrections in FluxBB before continuing<br>use the icons to delete users from FluxBB and resolve the problem.</b>';

$lang['Register_FluxBB_Audit_Link_Break'] = '<b>Audit of repairable links between Piwigo and FluxBB accounts</b>';
$lang['Register_FluxBB_Error_Link_Break'] = '<b>Broken link between Piwigo and FluxBB accounts:</b> ';
$lang['Register_FluxBB_New_Link'] = 'Account linked: ';

$lang['Register_FluxBB_Audit_Link_Bad'] = '<b>Audit of bad links between Piwigo and FluxBB accounts</b>';
$lang['Register_FluxBB_Error_Link_Del'] = '<b>Error in the link table between 2 users:</b> ';
$lang['Register_FluxBB_Link_Del'] = 'Remove of link: ';
$lang['Register_FluxBB_Error_Link_Dead'] = '<b>Error in the link table, dead links:</b> ';
$lang['Register_FluxBB_Link_Dead'] = 'Remove of dead links ';
$lang['Register_FluxBB_Error_Link_Dup'] = '<b>Error in the link table, there are duplicates:</b> ';
$lang['Register_FluxBB_Link_Dup'] = 'Remove of duplicates ';

$lang['Register_FluxBB_Audit_Synchro'] = '<b>Audit of the synchronization of passwords and email addresses between Piwigo and FluxBB accounts</b>';
$lang['Register_FluxBB_Error_Synchro'] = '<b>Bad synchronization of account:</b> ';
$lang['Register_FluxBB_Error_Synchro_Pswd'] = 'on password';
$lang['Register_FluxBB_Error_Synchro_Mail'] = 'on email address';
$lang['Register_FluxBB_Audit_Synchro_OK'] = ' <b>: Data synchronization OK</b>';
$lang['Register_FluxBB_Sync_User'] = 'Account synchronization : ';

$lang['Register_FluxBB_Audit_PWG2FluxBB'] = '<b>Audit of the existing accounts in Piwigo and missing in FluxBB</b>';
$lang['Register_FluxBB_Error_PWG2FluxBB'] = '<b>The Piwigo account not in FluxBB:</b> ';
$lang['Register_FluxBB_Add_User'] = 'Adding in FluxBB of account: ';

$lang['Register_FluxBB_Audit_FluxBB2PWG'] = '<b>Audit of the existing accounts in FluxBB and missing in Piwigo</b>';
$lang['Register_FluxBB_Error_FluxBB2PWG'] = '<b>The FluxBB account not in Piwigo:</b> ';
$lang['Register_FluxBB_Del_User'] = 'Removal from FluxBB of account : ';

$lang['Register_FluxBB_Audit_OK'] = 'Audit OK<br/><br/>';

$lang['Register_FluxBB_Mig_Btn'] = 'Migration';
$lang['Register_FluxBB_Mig_Title'] = 'Migration of accounts from Piwigo to FluxBB';
$lang['Register_FluxBB_Mig_Text'] = '
  <b><u>!!! USE ONLY IF</u> you have never used the plugin to link Piwigo to FluxBB <u>AND IF</u> your forum is empty of users !!!</b><br/><br/>
  		--> In this case, your table [PrefixFluxBB]_user of FluxBB must be empty of any account except the 2 accounts guest and administrator.<br/><br/>
  - The migration will first remove the links between accounts of Piwigo and FluxBB.<br/>
  - Then <b>WILL DELETE ALL FluxBB ACCOUNTS</b> except the 2 accounts guest and administrator.<br/>
  <br/>
  <center><b>!!! WARNING IF YOU HAVE ANY SPECIAL ACCOUNTS IN FluxBB == DO NOT USE THIS FUNCTION !!!</b></center><br/>
  - Finally, the migration will create all Piwigo\'s accounts in FluxBB, except the guest.<br/>
  <br/>
  If errors occur during operation, correct the cause of the problem and retry the operation of migration (at the time only you can renew the migration).<br/>';
$lang['Register_FluxBB_Mig_Disclaimer'] = '<b><blink>!!! NEVER PERFORM MIGRATION FOR UPDATING !!!</blink></b>';
$lang['Register_FluxBB_Mig_Start'] = '<b>Migration of accounts from Piwigo to FluxBB</b>';
$lang['Register_FluxBB_Mig_Del_Link'] = '<b>Deleting links between accounts of Piwigo and FluxBB</b>';
$lang['Register_FluxBB_Mig_Del_AllUsers'] = '<b>Deleting FluxBB accounts</b>';
$lang['Register_FluxBB_Mig_Del_User'] = '<b>Deletion of the account:</b> ';
$lang['Register_FluxBB_Mig_Add_AllUsers'] = '<b>Transferring Piwigo accounts</b>';
$lang['Register_FluxBB_Mig_Add_User'] = '<b>Transfer of account:</b> ';
$lang['Register_FluxBB_Mig_End'] = '<b>Migration done !</b>';
?>
