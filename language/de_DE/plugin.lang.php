<?php
$lang['Tab_Info'] = 'Anleitung';
$lang['Tab_Manage'] = 'Schritt 1 : Pluginkonfiguration';
$lang['Tab_Migration'] = 'Step 2 : Kontenmigration';
$lang['Tab_Synchro'] = 'Wartung : Kontensynchronisierung';

$lang['Title'] = 'Register FluxBB';

$lang['Config_Title'] = 'Pluginkonfiguration';
$lang['Config_Disclaimer'] = '
  Überprüfen Sie die Einstellungen ihrer FluxBB Installation und korrigieren Sie sie gegebenenfalls. <br>
  Passen Sie das Verhalten des Plugins nach Ihren Wünschen an.';
$lang['Prefix'] = 'FluxBB Tabellenpräfix :';
$lang['Guest'] = 'Benutzername des FluxBB Gast-benutzers.';
$lang['Details'] = 'Detailgrad der generierten Reports.';
$lang['Details_true'] = ' --&gt; Alle Ergebnisdetails anzeigen.';
$lang['Details_false'] = ' --&gt; Nur die wichtigsten Details der Ergebnisse anzeigen';
$lang['Del_Pt'] = 'Löschen von Themen und Beiträgen, wenn ein Benutzer gelöscht wird.';
$lang['Del_Pt_true'] = ' --&gt; Alle Löschen';
$lang['Del_Pt_false'] = ' --&gt; Themen und Beiträge nicht löschen';
$lang['Confirm'] = 'Bestätigung zum Löschen im Audit durch einen Administrator.';
$lang['Confirm_true'] = ' --&gt; Bestätigung unterdrücken';
$lang['Confirm_false'] = ' --&gt; Bestätigung erforderlich bevor Aktionen im Audit durchgeführt werden';

$lang['save_config'] ='Einstellungen gespeichert';

$lang['Audit_Btn'] = 'Audit';
$lang['Sync_Btn'] = 'Synchronisierung';
$lang['Sync_Title'] = 'Kontensynchronisierung von Piwigo nach FluxBB';
$lang['Sync_Text'] = '
  <div class="warning">Sie haben diesen Plugin bereits benutzt, um Piwigo mit FluxBB zu verbinden und/oder Ihr FluxBB Forum besitzt bereits Benutzerkonten!</div>
  <br> -> Das bedeutet, dass in Ihrem Forum bereits Benutzerkonten angelegt sind.<br><br>
  - Die Synchronisierung extrahiert die Daten durch Vergleichen der Benutzernamen und deren Passwörter (verschlüsselt) und e-mail Adressen in den beiden Tabellen [PrefixPWG]_user and [PrefixFluxBB]_user.<br>
  - Anschliessend müssen Sie diese Daten fuer jedes Benutzerkonto von Piwigo nach FluxBB in die entsprechende Tabelle übertragen (außer für die Benutzer Piwigo Gast und FluxBB Anonym).<br>
  - Danach müssen Sie die Benutzerkonten finden, die nur in einer der beiden ###_user Tabellen vorhanden sind.<br>
  <br>
  Abschliessend starten Sie einen Audit und suchen nach doppelt vorhandenen Benutzerkonten in FluxBB. Sollten Sie einen ausfindig machen, dann löschen Sie den Ältesten, indemSie die FluxBB Benutzerkonten nach dem Datum der Registrierung sortieren.<br>';
$lang['Sync_Check_Dup'] = '<b>Analyse der Tabellen für Benutzerkonten von Piwigo und FluxBB, um Duplikate ausfindig zu machen.</b>';
$lang['Advise_Check_Dup'] = '<b>Die Synchronisierung kann nicht fortgesetzt werden, wenn Sie doppelt vorhanden Benutzerkonten in Piwigo und FluxBB haben.</b><br><br>';
$lang['Sync_Link_Break'] = '<b>Analyse von reparierbaren Links von Benutzerkonten in Piwigo und FluxBB</b>';
$lang['Sync_Link_Bad'] = '<b>Analyse von falschen Beziehungen von Benutzerkonten in Piwigo und FluxBB</b>';
$lang['Sync_DataUser'] = '<b>Analyse von Passwörtern und e-mail Adressen von Benutzerkonten in Piwigo und FluxBB</b>';
$lang['Sync_PWG2FluxBB'] = '<b>Analyse von bestehenden Benutzerkonten in Piwigo und fehlenden Benutzerkonten in FluxBB</b>';
$lang['Sync_FluxBB2PWG'] = '<b>Analyse von bestehenden Benutzerkonten in FluxBB und fehlenden Benutzerkonten in Piwogo</b>';
$lang['Sync_OK'] = 'Synchronisierung OK<br><br>';

$lang['Audit_PWG_Dup'] = '<b>Audit der Kontentabelle von Piwigo</b>';
$lang['Error_PWG_Dup'] = '<b>Fehler in Piwigos Kontentabelle - Duplikate gefunden:</b> ';
$lang['Advise_PWG_Dup'] = '<b>WARNUNG! Sie müssen diese Änderungen in Piwigo vornehmen bevor sie fortfahren<br>Benutzen Sie Piwigos Benutzerverwaltung, um das Problem zu beheben.</b>';

$lang['Audit_FluxBB_Dup'] = '<b>Audit der Kontentabelle von FluxBB</b>';
$lang['Error_FluxBB_Dup'] = '<b>Fehler in FluxBBs Kontentabelle - Duplikate gefunden:</b> ';
$lang['Advise_FluxBB_Dup'] = '<b>WARNUNG! Sie müssen diese Änderungen in FluxBB vornehmen bevor sie fortfahren<br>Benutzen Sie die Icons, um die Benutzerkonten in FluxBB zu löschen und damit das Problem zu beheben.</b>';

$lang['Audit_Link_Break'] = '<b>Audit von reparierbaren Links von Benutzerkonten in Piwigo und FluxBB</b>';
$lang['Error_Link_Break'] = '<b>Fehlerhafter Link von Benutzerkonten in Piwigo und FluxBB:</b> ';
$lang['New_Link'] = 'Verbundene Benutzerkonten: ';

$lang['Audit_Link_Bad'] = '<b>Audit von fehlerhaften Links von Benutzerkonten in Piwigo und FluxBB</b>';
$lang['Error_Link_Del'] = '<b>Fehler in der Linktabelle zwischen zwei Benutzerkonten:</b> ';
$lang['Link_Del'] = 'Link löschen: ';
$lang['Error_Link_Dead'] = '<b>Fehler in der Linktabelle, tote Links:</b> ';
$lang['Link_Dead'] = 'Tote Links löschen ';
$lang['Error_Link_Dup'] = '<b>Fehler in der Linktabelle, Duplikate gefunden:</b> ';
$lang['Link_Dup'] = 'Duplikate löschen ';

$lang['Audit_Synchro'] = '<b>Audit der Synchronisierung von Passwörtern und e-mail Adressen von Benutzerkonten in Piwigo und FluxBB</b>';
$lang['Error_Synchro'] = '<b>Fehlerhafte Synchronisierung des Benutzerkontos:</b> ';
$lang['Error_Synchro_Pswd'] = 'mit dem Passwort';
$lang['Error_Synchro_Mail'] = 'mit der e-mail Adresse';
$lang['Audit_Synchro_OK'] = ' <b>: Datensynchronisierung OK</b>';
$lang['Sync_User'] = 'Kontensynchronisierung : ';

$lang['Audit_PWG2FluxBB'] = '<b>Audit von vorhandenen Benutzerkonten in Piwigo und fehlenden Benutzerkonten in FluxBB</b>';
$lang['Error_PWG2FluxBB'] = '<b>In FluxBB nicht vorhandene Piwigo Benutzerkonten:</b> ';
$lang['Add_User'] = 'Benutzerkonto in FluxBB hinzufügen: ';

$lang['Audit_FluxBB2PWG'] = '<b>Audit von vorhandenen Benutzerkonten in FluxBB und fehlenden Benutzerkonten in Piwigo</b>';
$lang['Error_FluxBB2PWG'] = '<b>In Piwigo nicht vorhandene FluxBB Benutzerkonten:</b> ';
$lang['Del_User'] = 'Benutzerkonto in FluxBB löschen: ';

$lang['Audit_OK'] = 'Audit OK<br><br>';

$lang['Mig_Btn'] = 'Migration';
$lang['Mig_Title'] = 'Migration von Benutzerkonten von Piwigo nach FluxBB';
$lang['Mig_Text'] = '
  <div class="warning"> NUR BENUTZEN wenn Sie diesen Plugin noch nie benutzt haben, um Piwigo mit FluxBB zu verbinden <u>UND</u> wenn es in Ihrem Forum keine Benutzerkonten gibt !!!</b></div><br>
  		--> In diesem Fall dürfen in der Tabelle [PrefixFluxBB]_user von FluxBB keine Benutzerkonten außer Gast und Administrator vorhanden sein.<br><br>
  - Die Migration wird als Erstes alle Links zwischen Benutzerkonten in Piwigo und FluxBB entfernen.<br>
  - Dann <b>WERDEN ALL FluxBB BENUTZERKONTEN GELÖSCHT</b> (mit Ausnahme der Konten Gast und Administrator).<br>
  <br>
  <div class="warning">WARNUNG SOLLTEN SIE SPEZIELLE BENUTZERKONTEN IN FluxBB HABEN == BENUTZEN SIE AUF KEINEN FALL DIESE FUNKTION !!!</div><br>
  - Abschließend werden alle Piwigo Benutzerkonten bis auf Gast in FluxBB angelegt.<br>
  <br>
  Sollten Fehler auftreten müssen Sie die Ursachen beheben und die Migration erneut starten.<br>';
$lang['Mig_Disclaimer'] = '<div class="warning"> FÜHREN SIE NIEMALS EINE MIGRATION ALS UPDATE DURCH !!!</div>';
$lang['Mig_Start'] = '<b>Migration von Benutzerkonten von Piwigo nach FluxBB</b>';
$lang['Mig_Del_Link'] = '<b>Links zwischen Benutzerkonten von Piwigo und FluxBB löschen</b>';
$lang['Mig_Del_AllUsers'] = '<b>FluxBB Benutzerkonten löschen</b>';
$lang['Mig_Del_User'] = '<b>Benutzerkonto löschen:</b> ';
$lang['Mig_Add_AllUsers'] = '<b>Benutzerkonten von Piwigo werden übertragen</b>';
$lang['Mig_Add_User'] = '<b>Übertragenes Benutzerkonto:</b> ';
$lang['Mig_End'] = '<b>Migration abgeschlossen !</b>';
$lang['Title_Tab'] = 'Register_FluxBB - Version: ';

// --------- Starting below: New or revised $lang ---- from version 2.3.0
/*TODO*/$lang['No_Reg_advise'] = '
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
/*TODO*/$lang['About_Reg'] = 'About the registration of users on the forum FluxBB';
/*TODO*/$lang['Bridge_UAM'] = 'Validation d\'accès au forum via le plugin UserAdvManager (UAM): Activez ici le pont entre les deux plugins qui vous permettra d\'interdir l\'accès à votre forum FluxBB tant que l\'utilisateur n\'a pas validé son inscription à la galerie (la fonction correspondante doit être active sur UAM). Access validation to the forum via UserAdvManager (UAM) plugin: Turn the bridge on between the two plugins that will allow you to prohibit the access to your FluxBB forum until the user has not validated its registration in the gallery (the function must be active on UAM).';
/*TODO*/$lang['Bridge_UAM_true'] = ' --> Enable bridge Register_FluxBB / UAM';
/*TODO*/$lang['Bridge_UAM_false'] = ' --> Disable bridge Register_FluxBB / UAM (default)';
/*TODO*/$lang['FluxBB_Group'] = 'Précisez ici l\'ID du <b>groupe FluxBB</b> dans lequel les utilisateurs non validé doivent se trouver (à créer au préalable dans FluxBB). Pour être efficace, ce groupe ne doit avoir aucune permission sur le forum (voir à la fin de cette page pour les détails d\'utilisation de cette option).Specify the ID of <b>FluxBB\' group</b> in which non validated users must be (to be created in advance in FluxBB). To be effective, this group should have no permission on the forum (see the end of this page for details on using this option).';
/*TODO*/$lang['About_Bridge'] = 'About Register_FluxBB / UAM bridge';
/*TODO*/$lang['UAM_Bridge_advice'] = 'The UserAdvManager plugin allows forcing new registrants to confirm their registration before allowing them to access the entire gallery. The joint use of this plugin with Register_FluxBB can do the same on the forum linked: Registrants can not post until they have validated their registration in the gallery. <br>
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
// --------- End: New or revised $lang ---- from version 2.3.0

// --------- Starting below: New or revised $lang ---- from version 2.3.3
/*TODO*/$lang['Admin'] = 'Piwigo\'s administrator username. <b style="color: red">The username of FluxBB\'s administrator account has to be the same!</b>';
/*TODO*/$lang['error_config_admin1'] = 'ERROR : Piwigo\'s admin username is wrong!';
/*TODO*/$lang['error_config_admin2'] = 'ERROR : The name of the FluxBB\'s administrator account is different from that of Piwigo ! Check the configuration of your FluxBB forum and rename the administrator account in the same name as that of Piwigo.';
/*TODO*/$lang['error_config_guest'] = 'ERROR : The name of the FluxBB\'s guest account is wrong!';
// --------- End: New or revised $lang ---- from version 2.3.3

// --------- Starting below: New or revised $lang ---- from version 2.3.5
$lang['Disclaimer'] = '
  *** Befolgen Sie bitte die folgenden zwei Schritte, um zu beginnen ***<br>
  Step 1 : Konfigurieren Sie den Plugin für den Zugriff auf FluxBB.<br>
  Step 2 : Migrieren Sie die Benutzerkonten von Piwigo nach FluxBB.<br><br>
  Wenn dies erfolgt ist arbeitet der Plugin voll funktionstüchtig und Sie müssen diese Seiten nicht mehr aufsuchen.<br><br>
  *** Für die Wartung bereits bestehender Verbindungen ***<br>
  Wartung: : Tabellensynchronisation (im Fall des Hinzufügens, Aktualisierens oder Löschens eines Users) erlaubt Ihnen, Passwörter und e-mail Adressen auf den neuesten Stand zu bringen und unerwünschte User zu erkennen (Dies sollten Sie jedoch im Normalfall nicht benötigen).<br><br>
  <div class="warning">Warnung !! Aus Sicherheitsgründen sollten Sie ein Backup Ihrer Datenbank anfertigen (Speziell die ###_user Tabellen).</div>
<br><br>
  <div class="warning">Wichtig zu wissen:<br>
  Standardmäßig ist <b>FluxBB</b> Fall <u>unempfindlich</u> für Benutzernamen. Das heißt, wenn ein Benutzer namens "test" ist bereits registriert, andere Einträge wie "Test" oder "TEST" oder "TEst" (etc. ..) werden abgelehnt.<br><br>
  Standardmäßig ist <b>Piwigo</b> arbeitet in umgekehrter und ist daher bei Fall <u>empfindlich</u> für Logins ("test" wird ein anderer Benutzer von "TEST" oder "TEst", etc. ...) werden<br>
  Um Probleme zu vermeiden (auch wenn Piwigo Verhalten leicht verändert werden kann - siehe Konfigurationsmöglichkeiten), wird Register_FluxBB Verknüpfung der beiden Anwendungen als FluxBB: Fall <u>unempfindlich</u> für Logins.<br><br></div>';
// --------- End: New or revised $lang ---- from version 2.3.5
$lang['About_Bridge_Title'] = 'Über Register_FluxBB / UAM bridge';
$lang['About_Bridge_Title_d'] = 'Anleitung über die bridge zwischen Register_FluxBB und UserAdvManager Plugin';
$lang['About_Reg_Title'] = 'Über die Registrierung von Benutzern im FluxBB Forum';
$lang['About_Reg_Title_d'] = 'Nützliche Hinweise zur besseren Integration';
$lang['Config_Title1'] = 'Einstellungen von bridge zwischen FluxBB und Piwigo';
$lang['Config_Title2'] = 'Erweiterte Einstellungen des Plugin ';
$lang['Config_Title_d'] = 'Plugin Einstellungen';
$lang['Instruction_Title'] = 'Anleitung (Wichtig bitte zuerst lesen!)';
$lang['Instruction_Title_d'] = 'Anleitung und wichtige Informationen';
$lang['Mig_Title_d'] = 'NUR BENUTZEN wenn dieses Plugin noch nicht benutzt wurde';
$lang['Sync_Title_d'] = 'Benutze um die Konten zu re-synchronisieren';
$lang['Add_User2pwg'] = 'Ein Konto Piwigo hinzufügen: ';
$lang['Please change your password at your first connexion on the gallery'] = 'Bitte ändere dein Passwort bei der ersten Verbindung zur Galerie um die Synchronisation zu beenden.';
$lang['RegFluxBB_Email_or_Username_already_exist'] = 'Synchronisation von FluxBB zu Piwigo gestoppt: Emailadresse oder Benutzername bereits in der Piwigo Benutzertabelle vorhanden.';
$lang['RegFluxBB_Password_Reset_Msg'] = 'Bitte aktualisiere dein Passwort zur Synchronisation mit dem Forum. Danach wirst du dich mit dem gleichen Konto im Forum und der Galerie anmelden können.';
$lang['To synchronize your forum access with the gallery you have been registered at %s!'] = 'Für die Synchronisation zwischen deinem Forum- und Galeriezugriff wurdest du registriert als %s!';
?>