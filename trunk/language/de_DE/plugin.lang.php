<?php
$lang['Tab_Info'] = 'Anleitung';
$lang['Tab_Manage'] = 'Schritt 1 : Pluginkonfiguration';
$lang['Tab_Migration'] = 'Step 2 : Kontenmigration';
$lang['Tab_Synchro'] = 'Wartung : Kontensynchronisierung';

$lang['Title'] = 'Register FluxBB';
$lang['Disclaimer'] = '
  *** Befolgen Sie bitte die folgenden zwei Schritte, um zu beginnen ***<br>
  Step 1 : Konfigurieren Sie den Plugin für den Zugriff auf FluxBB.<br>
  Step 2 : Migrieren Sie die Benutzerkonten von Piwigo nach FluxBB.<br><br>
  Wenn dies erfolgt ist arbeitet der Plugin voll funktionstüchtig und Sie müssen diese Seiten nicht mehr aufsuchen.<br><br>
  *** Für die Wartung bereits bestehender Verbindungen ***<br>
  Wartung: : Tabellensynchronisation (im Fall des Hinzufügens, Aktualisierens oder Löschens eines Users) erlaubt Ihnen, Passwörter und e-mail Adressen auf den neuesten Stand zu bringen und unerwünschte User zu erkennen (Dies sollten Sie jedoch im Normalfall nicht benötigen).<br><br>
  <div class="warning">Warnung !! Aus Sicherheitsgründen sollten Sie ein Backup Ihrer Datenbank anfertigen (Speziell die ###_user Tabellen).</div>';

$lang['Config_Title'] = 'Pluginkonfiguration';
$lang['Config_Disclaimer'] = '
  Überprüfen Sie die Einstellungen ihrer FluxBB Installation und korrigieren Sie sie gegebenenfalls. <br>
  Passen Sie das Verhalten des Plugins nach Ihren Wünschen an.';
$lang['FluxBB_Prefix'] = 'FluxBB Tabellenpräfix :';
$lang['FluxBB_Admin'] = 'Benutzername des Piwigo-administrators.';
$lang['Guest'] = 'Benutzername des FluxBB Gast-benutzers.';
$lang['User'] = '<div class="warning">Das Administratorkonto von FluxBB muss das selbe sein</div>';
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

// --------- Starting below: New or revised $lang ---- from version 2.2.2
$lang['No_Reg_advise'] = '<b>Über die Registrierung von Benutzern im FluxBB Forum</b><br><br>
  Für eine bessere Integration, ist es ratsam, die folgenden drei Änderungen an Ihrem FluxBB Forum (<b>Warnung: Nehmen Sie diese Änderungen werden verschwinden, wenn Update-Forum</b>):<br>
  <b>* Deaktivieren Sie die Option "Neuanmeldungen erlauben" auf der FluxBB-Administrationsseite (unter: Einstellungen - Registrierung)</b>
<br>
<br>
  <b>* Ändern Sie die Datei</b> : [FluxBBRoot]/lang/German/register.php und ersetzen Sie die folgende Zeile:
  <div class="mod">\'No new regs\'				=>	\'Dieses Forum akzeptiert momentan keine neuen Mitglieder.\'</div>
  <b>mit :</b>
  <div class="info">\'No new regs\'				=>	\'&lt;a href=&quot;http://[YourPiwigoRoot]/register.php&quot; &gt; Registrieren Sie sich bitte hier &lt;/a&gt;&lt;br/&gt;&lt;br/&gt;\'</div>
  <br>
  Selbstverständlich sollten Sie diese Änderung für alle installierten Sprachen Ihres FluxBB Forums vornehmen.
<br>
<br>
  <b>* Modifier le fichier</b> : [RacineDeFluxBB]/login.php und ersetzen Sie die Zeile 69:
  <div class="mod">message($lang_login[\'Wrong user/pass\'].\'&lt;a href=&quot;login.php?action=forget&quot;&gt;</div>
  <b>mit :</b>
  <div class="info">message($lang_login[\'Wrong user/pass\'].\'&lt;a href=&quot;../[VotreRacineDePiwigo]/identification.php&quot;&gt;</div>
<br>
  Und am Zeile 216:
  <div class="mod">&lt;a href=&quot;login.php?action=forget&quot; tabindex=&quot;5&quot;><?php echo $lang_login[\'Forgotten pass\']</a></p></div>
  <b>mit :</b>
  <div class="info">&lt;a href=&quot;../[VotreRacineDePiwigo]/identification.php&quot; tabindex=&quot;5&quot;><?php echo $lang_login[\'Forgotten pass\']</a></p></div>
  <br>';
// --------- End: New or revised $lang ---- from version 2.2.2
?>