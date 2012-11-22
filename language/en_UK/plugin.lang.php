<?php
$lang['Tab_Info'] = 'Instructions';
$lang['Tab_Manage'] = 'Step 1 : Plugin configuration';
$lang['Tab_Migration'] = 'Step 2 : Accounts migration';
$lang['Tab_Synchro'] = 'Maintenance : Accounts re-synchronization';

$lang['Title'] = 'Register FluxBB';

$lang['Config_Title'] = 'Plugin setup';
$lang['Config_Disclaimer'] = '
  Check the settings of your FluxBB installation and correct them if necessary. <br>
  Change, if any, the behavior of the plugin at your convenience.';
$lang['Prefix'] = 'FluxBB Prefix tables :';
$lang['Guest'] = 'Username of the FluxBB Guest user.';
$lang['Details'] = 'Level of detail in reports of operations.';
$lang['Details_true'] = ' --&gt; View all details of the results of operations.';
$lang['Details_false'] = ' --&gt; Shows that most of the results of operations';
$lang['Del_Pt'] = 'Removal of topics and posts when the user is deleted.';
$lang['Del_Pt_true'] = ' --&gt; Delete all';
$lang['Del_Pt_false'] = ' --&gt; Don\'t delete topics and posts';
$lang['Confirm'] = 'Delete confirmation on the administration actions in the audit.';
$lang['Confirm_true'] = ' --&gt; Delete confirmation';
$lang['Confirm_false'] = ' --&gt; Confirmation mandatory before actions in audit';

$lang['save_config'] ='Settings saved';

$lang['Audit_Btn'] = 'Audit';
$lang['Sync_Btn'] = 'Synchronization';
$lang['Sync_Title'] = 'Synchronize accounts from Piwigo to FluxBB';
$lang['Sync_Text'] = '
  <div class="warning">You\'ve already used the plugin to link your Piwigo (plugin update) and / or your FluxBB forum is not empty of users!</div>
  <br> -> This means that your forum owns users.<br><br>
  - Synchronization detect the data by comparing the usernames, passwords (encrypted) and their email address in both tables [PrefixPWG]_user and [PrefixFluxBB]_user.<br>
  - Then update the table of correspondence as well as password and email address for each account from Piwigo to FluxBB except Piwigo Guest and FluxBB Anonymous.<br>
  - Finally indicate mislead orphaned accounts that exist only in one of the 2 ###_user tables.<br>
  <br>
  At the end of the operation, launch an audit and check for possible duplicates users in FluxBB. If so, delete the oldest (sorting FluxBB users according to their date of registration).<br>';
$lang['Sync_Check_Dup'] = '<b>Analyzing tables of user accounts of Piwigo and FluxBB to control duplicates</b>';
$lang['Advise_Check_Dup'] = '<b>Impossible to continue the synchronization if you have duplicates in the User Account of Piwigo or FluxBB.</b><br><br>';
$lang['Sync_Link_Break'] = '<b>Analysis of repairable links between accounts in Piwigo and FluxBB</b>';
$lang['Sync_Link_Bad'] = '<b>Analysis of bad relationships between accounts in Piwigo and FluxBB</b>';
$lang['Sync_DataUser'] = '<b>Analysis of passwords and email addresses between accounts in Piwigo and FluxBB</b>';
$lang['Sync_PWG2FluxBB'] = '<b>Analysis of existing accounts in Piwigo and missing in FluxBB</b>';
$lang['Sync_FluxBB2PWG'] = '<b>Analysis of existing accounts in FluxBB and missing in Piwigo</b>';
$lang['Sync_OK'] = 'Synchronization OK<br><br>';

$lang['Audit_PWG_Dup'] = '<b>Audit of Piwigo\'s accounts table</b>';
$lang['Error_PWG_Dup'] = '<b>Error in Piwigo\'s accounts table, there are duplicates:</b> ';
$lang['Advise_PWG_Dup'] = '<b>WARNING! You must make these corrections in Piwigo before continuing<br>use Piwigo\'s user manager to resolve the problem.</b>';

$lang['Audit_FluxBB_Dup'] = '<b>Audit of FluxBB\'s accounts table</b>';
$lang['Error_FluxBB_Dup'] = '<b>Error in FluxBB\'s accounts table, there are duplicates:</b> ';
$lang['Advise_FluxBB_Dup'] = '<b>WARNING! You must make these corrections in FluxBB before continuing<br>use the icons to delete users from FluxBB and resolve the problem.</b>';

$lang['Audit_Link_Break'] = '<b>Audit of repairable links between Piwigo and FluxBB accounts</b>';
$lang['Error_Link_Break'] = '<b>Broken link between Piwigo and FluxBB accounts:</b> ';
$lang['New_Link'] = 'Account linked: ';

$lang['Audit_Link_Bad'] = '<b>Audit of bad links between Piwigo and FluxBB accounts</b>';
$lang['Error_Link_Del'] = '<b>Error in the link table between 2 users:</b> ';
$lang['Link_Del'] = 'Remove of link: ';
$lang['Error_Link_Dead'] = '<b>Error in the link table, dead links:</b> ';
$lang['Link_Dead'] = 'Remove of dead links ';
$lang['Error_Link_Dup'] = '<b>Error in the link table, there are duplicates:</b> ';
$lang['Link_Dup'] = 'Remove of duplicates ';

$lang['Audit_Synchro'] = '<b>Audit of the synchronization of passwords and email addresses between Piwigo and FluxBB accounts</b>';
$lang['Error_Synchro'] = '<b>Bad synchronization of account:</b> ';
$lang['Error_Synchro_Pswd'] = 'on password';
$lang['Error_Synchro_Mail'] = 'on email address';
$lang['Audit_Synchro_OK'] = ' <b>: Data synchronization OK</b>';
$lang['Sync_User'] = 'Account synchronization : ';

$lang['Audit_PWG2FluxBB'] = '<b>Audit of the existing accounts in Piwigo and missing in FluxBB</b>';
$lang['Error_PWG2FluxBB'] = '<b>The Piwigo account not in FluxBB:</b> ';
$lang['Add_User'] = 'Adding in FluxBB of account: ';

$lang['Audit_FluxBB2PWG'] = '<b>Audit of the existing accounts in FluxBB and missing in Piwigo</b>';
$lang['Error_FluxBB2PWG'] = '<b>The FluxBB account not in Piwigo:</b> ';
$lang['Del_User'] = 'Removal from FluxBB of account : ';

$lang['Audit_OK'] = 'Audit OK<br><br>';

$lang['Mig_Btn'] = 'Migration';
$lang['Mig_Title'] = 'Migration of accounts from Piwigo to FluxBB';
$lang['Mig_Text'] = '
  <div class="warning"> USE ONLY IF you have never used the plugin to link Piwigo to FluxBB <u>AND IF</u> your forum is empty of users !!!</b></div><br>
  		--> In this case, your table [PrefixFluxBB]_user of FluxBB must be empty of any account except the 2 accounts guest and administrator.<br><br>
  - The migration will first remove the links between accounts of Piwigo and FluxBB.<br>
  - Then <b>WILL DELETE ALL FluxBB ACCOUNTS</b> except the 2 accounts guest and administrator.<br>
  <br>
  <div class="warning">WARNING IF YOU HAVE ANY SPECIAL ACCOUNTS IN FluxBB == DO NOT USE THIS FUNCTION !!!</div><br>
  - Finally, the migration will create all Piwigo\'s accounts in FluxBB, except the guest.<br>
  <br>
  If errors occur during operation, correct the cause of the problem and retry the operation of migration (at the time only you can renew the migration).<br>';
$lang['Mig_Disclaimer'] = '<div class="warning"> NEVER PERFORM MIGRATION FOR UPDATING !!!</div>';
$lang['Mig_Start'] = '<b>Migration of accounts from Piwigo to FluxBB</b>';
$lang['Mig_Del_Link'] = '<b>Deleting links between accounts of Piwigo and FluxBB</b>';
$lang['Mig_Del_AllUsers'] = '<b>Deleting FluxBB accounts</b>';
$lang['Mig_Del_User'] = '<b>Deletion of the account:</b> ';
$lang['Mig_Add_AllUsers'] = '<b>Transferring Piwigo accounts</b>';
$lang['Mig_Add_User'] = '<b>Transfer of account:</b> ';
$lang['Mig_End'] = '<b>Migration done !</b>';
$lang['Title_Tab'] = 'Register_FluxBB - Version: ';

$lang['No_Reg_advise'] = '
  For better integration, it is advisable to make the following changes to your FluxBB forum (<b>Warning: These changes will disappear when updating the forum</b>):
<br><br>
  <b>* In FluxBB\'s administration panel, change "Allow new registrations" to NO (in: Options - Registration)</b>
<br><br>
  <b>* Modify the file</b> : [FluxBBRoot]/lang/English/register.php by replacing the following line:
  <div class="mod">\'No new regs\'				=>	\'This forum is not accepting new users.\'</div>
  <b>with :</b>
  <div class="info">\'No new regs\'				=>	\'&lt;a href=&quot;http://[YourPiwigoRoot]/register.php&quot; &gt; Go here to register &lt;/a&gt;&lt;br/&gt;&lt;br/&gt;\'</div>
  <br>
  Of course you should also make the same change for other languages of your FluxBB forum.
<br><br>
  <b>* Modify the file</b> : [FluxBBRoot]/login.php by replacing the line 69:
  <div class="mod">message($lang_login[\'Wrong user/pass\'].\'&lt;a href=&quot;login.php?action=forget&quot;&gt;</div>
  <b>with :</b>
  <div class="info">message($lang_login[\'Wrong user/pass\'].\'&lt;a href=&quot;../[YourPiwigoRoot]/password.php&quot;&gt;</div>
<br>
  and at line 216:
  <div class="mod">&lt;a href=&quot;login.php?action=forget&quot; tabindex=&quot;5&quot;&gt;&lt;?php echo $lang_login[\'Forgotten pass\']&lt;/a&gt;</div>
  <b>with :</b>
  <div class="info">&lt;a href=&quot;../[YourPiwigoRoot]/password.php&quot; tabindex=&quot;5&quot;&gt;&lt;?php echo $lang_login[\'Forgotten pass\'] ?&gt;&lt;/a&gt;</div>
  <br>';
$lang['About_Reg'] = 'About the registration of users on the forum FluxBB';
$lang['Bridge_UAM'] = 'Access validation to the forum via UserAdvManager (UAM) plugin: Turn the bridge on between the two plugins that will allow you to prohibit the access to your FluxBB forum until the user has not validated its registration in the gallery (the function must be active on UAM).';
$lang['Bridge_UAM_true'] = ' --> Enable bridge Register_FluxBB / UAM';
$lang['Bridge_UAM_false'] = ' --> Disable bridge Register_FluxBB / UAM (default)';
$lang['FluxBB_Group'] = 'Specify the ID of <b>FluxBB\' group</b> in which non validated users must be (to be created in advance in FluxBB). To be effective, this group should have no permission on the forum (see the end of this page for details on using this option).';
$lang['About_Bridge'] = 'About Register_FluxBB / UAM bridge';
$lang['UAM_Bridge_advice'] = 'The UserAdvManager plugin allows forcing new registrants to confirm their registration before allowing them to access the entire gallery. The joint use of this plugin with Register_FluxBB can do the same on the linked forum: Registrants can not post until they have validated their registration in the gallery. <br>
Here is the general procedure to apply:
<br>
- In the administration of your FluxBB forum, set at least 2 groups of users (for example: "validated" and "no_validated").<br>
- Give the first group ("validated") access permissions you want on your forum and set it as the default group.<br>
- Remove the second group ("no_validated") all permissions on your forum (the members of this group can only read public posts).<br>
- Locate the ID of the second group "no_validated".<br>
- Enter this ID in Register_FluxBB plugin, activate the bridge and save the settings.
<br>
<b class="mod"><u>Important notes:</u></b>
<br>
If you already use an earlier version of Register_FluxBB, Piwigo\'s accounts linked between your gallery and your FluxBB forum will not be impacted by the effects of the bridge. Only new registers will be impacted after activation of the bridge.<b><u>Accounts resynchronization function will be void.</u></b><br>
Similarly, if you\'ve never used Register_FluxBB, the Piwigo\'s accounts migration phase from your gallery to your FluxBB forum will disregard the state validated or not for the accounts at the launch of the migration phase.';

$lang['Admin'] = 'Piwigo\'s administrator username. <b style="color: red">The username of FluxBB\'s administrator account has to be the same!</b>';
$lang['error_config_admin1'] = 'ERROR : Piwigo\'s admin username is wrong!';
$lang['error_config_admin2'] = 'ERROR : The name of the FluxBB\'s administrator account is different from that of Piwigo ! Check the configuration of your FluxBB forum and rename the administrator account in the same name as that of Piwigo.';
$lang['error_config_guest'] = 'ERROR : The name of the FluxBB\'s guest account is wrong!';

$lang['Disclaimer'] = '
  *** To begin, follow this 2 steps ***<br>
  Step 1 : Set plugin with the parameters of FluxBB.<br>
  Step 2 : Migrate user accounts from Piwigo to FluxBB.<br><br>
  After these 2 main steps, the plugin is fully functional and you will not have to return to this pages.<br><br>
  *** For the maintenance of already active connections ***<br>
  Maintenance : Synchronize tables (in case an addition, an update or a user deletion mismatched) allows to update passwords and email addresses and see users intruder (But you should not need to use ).<br><br>
  <div class="warning">WARNING !! For safety, consider making a backup of your database, especially ###_user tables before any action.</div>
<br><br>
  <div class="warning">Important to know:<br>
  By default, <b>FluxBB</b> is case <u>insensitive</u> on usernames. That is, if a user called "test" is already registered, other entries like "Test" or "TEST" or "TEst" (etc. ..) will be rejected.<br><br>
  By default, <b>Piwigo</b> works in reverse and is therefore case <u>sensitive</u> on logins ("test" will be a different user of "Test" or "TEST", etc. ...).<br>
  To avoid problems (even if Piwigo\'s behavior can be easily changed - See configuration options), Register_FluxBB will link the two applications as FluxBB: Being case <u>insensitive</u> for logins.<br><br></div>';
?>