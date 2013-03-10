<?php
$lang['Title'] = 'Register_FluxBB - Version: ';
$lang['save_config'] ='Settings saved';

$lang['Instruction_Title'] = 'Instructions (important to read first!)';
$lang['Instruction_Title_d'] = 'Instructions and important information';
$lang['Disclaimer'] = '
  *** To begin, follow this 2 steps ***<br/>
  Step 1 : Configure the plugin parameters related to FluxBB parameters<br/>
  Step 2 : Migrate users accounts from Piwigo to FluxBB<br/><br/>
  After these 2 main steps, the plugin is fully functional.<br/><br/>
  *** For the maintenance of already active connections ***<br/>
  Maintenance : Synchronize tables (in case an addition, an update or a user deletion mismatched) allows to update passwords and email addresses and shows intruders (But you should not have to use it regularly).<br/><br/>
  <div class="warning">WARNING !! For safety, be sure to make a backup of your database and especially your ###_user tables before any action.</div>
<br/><br/>
  <div class="warning">Important to know:<br/>
  By default, <b>FluxBB</b> is case <u>insensitive</u> on usernames. That is, if a user called "test" is already registered, other entries like "Test" or "TEST" or "TEst" (etc. ..) will be rejected.<br/><br/>
  By default, <b>Piwigo</b> works in reverse and is therefore case <u>sensitive</u> on usernames ("test" will be a different user of "Test" or "TEST", etc. ...).<br/>
  To avoid problems (even if Piwigo\'s behavior can be easily changed - See configuration options), Register_FluxBB will link the two applications using FluxBB behavior: Being case <u>insensitive</u> for usernames.<br/><br/></div>';


$lang['About_Reg_Title'] = 'About the registration of users on FluxBB forum';
$lang['About_Reg_Title_d'] = 'Useful instructions for better integration';
$lang['No_Reg_advise'] = '
  For better integration, it is advisable to make the following changes to your FluxBB forum (<b>Warning: These changes will disappear when updating the forum script</b>):
<br/><br/>
  <b>* In FluxBB\'s administration panel, change "Allow new registrations" to NO (see: Options - Registration)</b>
<br/><br/>
  <b>* Modify the file</b> : [FluxBBRoot]/lang/English/register.php by replacing the following line:
  <div class="mod">\'No new regs\'				=>	\'This forum is not accepting new users.\'</div>
  <b>with :</b>
  <div class="info">\'No new regs\'				=>	\'&lt;a href=&quot;http://[YourPiwigoRoot]/register.php&quot; &gt; Go here to register &lt;/a&gt;&lt;br/&gt;&lt;br/&gt;\'</div>
  <br/>
  Of course you should also make the same change for other languages of your FluxBB forum.
<br/><br/>
  <b>* Modify the file</b> : [FluxBBRoot]/login.php by replacing around line 64:
  <div class="mod">message($lang_login[\'Wrong user/pass\'].\'&lt;a href=&quot;login.php?action=forget&quot;&gt;</div>
  <b>with :</b>
  <div class="info">message($lang_login[\'Wrong user/pass\'].\'&lt;a href=&quot;../[YourPiwigoRoot]/password.php&quot;&gt;</div>
<br/>
  and around line 295:
  <div class="mod">&lt;a href=&quot;login.php?action=forget&quot; tabindex=&quot;5&quot;&gt;&lt;?php echo $lang_login[\'Forgotten pass\']&lt;/a&gt;</div>
  <b>with :</b>
  <div class="info">&lt;a href=&quot;../[YourPiwigoRoot]/password.php&quot; tabindex=&quot;5&quot;&gt;&lt;?php echo $lang_login[\'Forgotten pass\'] ?&gt;&lt;/a&gt;</div>
  <br/>';


$lang['About_Bridge_Title'] = 'About Register_FluxBB / UAM bridge';
$lang['About_Bridge_Title_d'] = 'Instruction about bridge between Register_FluxBB and UserAdvManager plugins';
$lang['UAM_Bridge_advice'] = 'The UserAdvManager plugin allows forcing new registrants to confirm their registration before allowing them to access the entire gallery. The joint use of this plugin with Register_FluxBB can do the same on the linked forum: Registrants can not post until they have validated their registration in the gallery. <br/>
Here is the general procedure to apply:
<br/>
- In the administration panel of your FluxBB forum, set at least 2 groups of users (for example: "validated" and "no_validated").<br/>
- Give the first group ("validated") access permissions you want on your forum and set it as the default group.<br/>
- Remove for the second group ("no_validated") all permissions on your forum (the members of this group can only read public posts).<br/>
- Locate the ID of the second group "no_validated".<br/>
- Enter this ID in Register_FluxBB plugin, activate the bridge and save the settings.
<br/>
<b class="mod"><u>Important notes:</u></b>
<br/>
If you already used an earlier version of Register_FluxBB, Piwigo\'s accounts linked between your gallery and your FluxBB forum will not be impacted by the effects of the bridge. Only new registers will be impacted after activation of the bridge.<b><u>Accounts resynchronization function will be void.</u></b><br/>
Similarly, if you\'ve never used Register_FluxBB, the Piwigo\'s accounts migration process from your gallery to your FluxBB forum will disregard the state validated or not for the accounts at the launch of the migration.';


$lang['Config_Title'] = 'Plugin setup';
$lang['Config_Title_d'] = 'Plugin setup';
$lang['Config_Title1'] = 'Settings of bridge between  FluxBB and Piwigo';
$lang['Config_Title2'] = 'Plugin\'s advanced settings';

$lang['Config_Disclaimer'] = '
  Check the settings of your FluxBB installation and fix them if necessary.<br/>
  Change, if necessary, the behavior of the plugin as you want.';

$lang['Details'] = 'Level of detail to display in the reports of operations (synchronization and migration)';
$lang['Details_true'] = ' --&gt; Maximum level - Displays all details of the results of synchronization and migration operations';
$lang['Details_false'] = ' --&gt; Minimum Level - Displays only the main results of the synchronization and migration operations';

$lang['Confirm'] = 'Confirmation of corrective actions in audit';
$lang['Confirm_true'] = ' --&gt; Do not ask for confirmation';
$lang['Confirm_false'] = ' --&gt; Confirmation required before any action in audit';

$lang['Prefix'] = 'FluxBB prefix tables :';

$lang['Admin'] = 'Username of Piwigo\'s "Webmaster" account. <b style="color: red">The FluxBB\'s "Administrator" username account must match!</b>';
$lang['error_config_admin1'] = 'ERROR : Piwigo\'s "Webmaster" username is wrong!';
$lang['error_config_admin2'] = 'ERROR : The username of the FluxBB\'s "Administrator" account is different of Piwigo\'s ! Check the configuration of your FluxBB forum and rename the "Administrator" account username in the same way as Piwigo\'s';

$lang['Guest'] = 'FluxBB\'s guest username';
$lang['error_config_guest'] = 'ERROR : The username of the FluxBB\'s "Guest" account is wrong!';

$lang['Del_Pt'] = 'Deleting user\'s topics and messages from forum when he is deleted from Piwigo';
$lang['Del_Pt_true'] = ' --&gt; Delete all';
$lang['Del_Pt_false'] = ' --&gt; Don\'t delete topics and posts from forum';

$lang['Bridge_UAM'] = 'Validation of access to the forum using UserAdvManager plugin (UAM): Activate here the bridge between the two plugins that allow you to restrict access to your FluxBB forum as the user has not validated its registration in the gallery (the related UAM function must be active)';
$lang['Bridge_UAM_true'] = ' --> Enable bridge Register_FluxBB / UAM';
$lang['Bridge_UAM_false'] = ' --> Disable bridge Register_FluxBB / UAM (default)';

$lang['FluxBB_Group'] = 'Specify here the ID (format: integer) of <b>a FluxBB\'s users group</b> in which unvalidated users must be located if they have not validated their registration to the gallery. This users group have to be created first in FluxBB. To be effective, this group should not have any permission on the forum (see the section "Instructions" for detailed information)';


$lang['Mig_Title'] = 'Migration of accounts from Piwigo to FluxBB';
$lang['Mig_Title_d'] = 'USE ONLY IF you have never used the plugin before';
$lang['Mig_Text'] = '
  <div class="warning"> USE MIGRATION ONLY IF you never used the plugin to link Piwigo to FluxBB before <u>AND IF</u> your forum is empty of users !!!</b></div><br/>
  		--> In this case, your [PrefixFluxBB]_user table of FluxBB must be empty of any account except the 2 "Guest" and "Administrator" accounts.<br/><br/>
  - The migration will first remove the links between accounts of Piwigo and FluxBB if any.<br/>
  - Then <b>ALL FluxBB ACCOUNTS WILL BE DELETE</b> except the 2 "Guest" and "Administrator" accounts.<br/>
  <br/>
  <div class="warning">WARNING - IF YOU HAVE ANY SPECIAL USERS ACCOUNTS IN FluxBB == DO NOT USE THIS FUNCTION !!!</div><br/>
  - Finally, the migration process will create all Piwigo\'s users accounts in FluxBB, except the "Guest".<br/>
  <br/>
  If errors occur during operation, a message will warn you and inform you about the problem. Fix the cause of the problem and retry a migration (at the time only you can renew a migration).<br/>
  You can also run an audit to verify the status of a migration.<br/>
  <div class="warning"> NEVER PERFORM MIGRATION FOR UPDATING !!!</div><br/>';
$lang['Mig_Start'] = '<b>Migration of accounts from Piwigo to FluxBB</b>';
$lang['Mig_Del_Link'] = '<b>Deleting links between Piwigo and FluxBB accounts</b>';
$lang['Mig_Del_AllUsers'] = '<b>Deleting FluxBB accounts</b>';
$lang['Mig_Del_User'] = '<b>Account deletion:</b> ';
$lang['Mig_Add_AllUsers'] = '<b>Transferring Piwigo accounts</b>';
$lang['Mig_Add_User'] = '<b>Transferring account:</b> ';
$lang['Mig_End'] = '<b>Migration done !</b>';
$lang['Mig_Btn'] = 'Migration';


$lang['Sync_Title'] = 'Synchronize accounts from Piwigo to FluxBB';
$lang['Sync_Title_d'] = 'Use to resynchronize accounts';
$lang['Sync_Text'] = '
  <div class="warning">Use this if you are already using this plugin, you have temporarily disabled it and new users registered on the gallery in the meantime</div>
  <br/> -> This means that your forum already owns users.<br/><br/>
  - Synchronization compares the usernames, their password (encrypted) and their email address in both tables [PrefixPWG] _users and [PrefixFluxBB] _users<br/>
  - Then it will update a mapping table as well as the password and email address for each account from Piwigo to FluxBB except the Piwigo\'s "Guest" user and FluxBB\'s "Anonymous" user.<br/>
  - Finally it will show orphaned accounts errors (which only exist in one of two ###_USERS tables) and will propose a fix.<br/>
  <br/>
  At the end of the synchronization, you can perform an AUDIT to check for possible duplicates users in FluxBB. If so, delete the oldest ones (sorting FluxBB users according to their date of registration).<br/>';
$lang['Sync_Check_Dup'] = '<b>Analysis of user tables for duplicates control</b>';
$lang['Advise_Check_Dup'] = '<b>IMPOSSIBLE to continue synchronizing if you have duplicate user accounts in Piwigo or FluxBB. Please correct and try again.</b><br/><br/>';
$lang['Sync_Link_Break'] = '<b>Analysis of repairable links between accounts in Piwigo and FluxBB</b>';
$lang['Sync_Link_Bad'] = '<b>Analysis of bad relationships between Piwigo and FluxBB accounts</b>';
$lang['Sync_DataUser'] = '<b>Analysis of passwords and email addresses between Piwigo and FluxBB accounts</b>';
$lang['Sync_PWG2FluxBB'] = '<b>Analysis of existing accounts in Piwigo but missing in FluxBB</b>';
$lang['Sync_FluxBB2PWG'] = '<b>Analysis of existing accounts in FluxBB but missing in Piwigo</b>';
$lang['Sync_OK'] = 'Synchronization OK<br/><br/>';
$lang['Sync_Btn'] = 'Synchronization';


$lang['Audit_Btn'] = 'Audit';
$lang['Audit_PWG_Dup'] = '<b>Audit of Piwigo\'s accounts table</b>';
$lang['Error_PWG_Dup'] = '<b>Error in Piwigo\'s accounts table, there are duplicates:</b> ';
$lang['Advise_PWG_Dup'] = '<b>WARNING! You must make these corrections in Piwigo before continuing<br/>Use Piwigo\'s user manager to resolve the problem.</b>';
$lang['Audit_FluxBB_Dup'] = '<b>Audit of FluxBB\'s accounts table</b>';
$lang['Error_FluxBB_Dup'] = '<b>Error in FluxBB\'s accounts table, there are duplicates:</b> ';
$lang['Advise_FluxBB_Dup'] = '<b>WARNING! You must make these corrections in FluxBB before continuing<br/>Use the icons to delete users from FluxBB and resolve the problem.</b>';
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
$lang['Audit_OK'] = 'Audit OK<br/><br/>';

?>