<?php
// +-----------------------------------------------------------------------+
// | Piwigo - a PHP based photo gallery                                    |
// +-----------------------------------------------------------------------+
// | Copyright(C) 2008-2014 Piwigo Team                  http://piwigo.org |
// | Copyright(C) 2003-2008 PhpWebGallery Team    http://phpwebgallery.net |
// | Copyright(C) 2002-2003 Pierrick LE GALL   http://le-gall.net/pierrick |
// +-----------------------------------------------------------------------+
// | This program is free software; you can redistribute it and/or modify  |
// | it under the terms of the GNU General Public License as published by  |
// | the Free Software Foundation                                          |
// |                                                                       |
// | This program is distributed in the hope that it will be useful, but   |
// | WITHOUT ANY WARRANTY; without even the implied warranty of            |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU      |
// | General Public License for more details.                              |
// |                                                                       |
// | You should have received a copy of the GNU General Public License     |
// | along with this program; if not, write to the Free Software           |
// | Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307, |
// | USA.                                                                  |
// +-----------------------------------------------------------------------+
$lang['New_Link'] = 'Account die gelinkt is:';
$lang['Link_Dup'] = 'Verwijderen van duplicaten:';
$lang['Link_Del'] = 'Verwijderen van link:';
$lang['Link_Dead'] = 'Het verwijderen van doodlopende links';
$lang['Instruction_Title_d'] = 'Instructies en belangrijke informatie';
$lang['Instruction_Title'] = 'Instructies (belangrijk om eerst te lezen!)';
$lang['FluxBB_Title'] = 'Register_FluxBB - Versie:';
$lang['Guest'] = 'FluxBB gebruikersnaam voor gast';
$lang['FluxBB_Group'] = 'Hier kunt u de ID specificeren (format: integer) van <b>een FluxBB-gebruikersgroep</b> waarin niet-gevalideerde gebruikers moeten zijn gelocaliseerd wanner zij nog niet hun registratie op de galerij hebben gevalideerd. Deze gebruikersgroep moet als eerste worden aangemaakt in FluxBB. Om de regeling effectief te laten zijn moet deze gebruikersgroep geen enkele permissies hebben in het forum (zie de sectie "Instructies" voor gedetailleerde informatie).';
$lang['Error_Synchro_Pswd'] = 'Deze gebruiker moet zijn wachtwoord aanpassen bij het volgende bezoek aan de galerij';
$lang['FluxBB_Admin'] = 'Piwigo\'s "Webmasteraccount" gebruikersnaam. <b style="color:red">De "Administrator"-gebruikersnaamaccount van FluxBB moet overeen komen!</b>';
$lang['Error_Synchro_Mail'] = 'Op emailadres';
$lang['Error_Synchro'] = '<b>Foutieve synchronisatie van account:</b>';
$lang['Error_PWG2FluxBB'] = '<b>De Piwigo-accounts die niet aanwezig zijn in FluxBB:</b>';
$lang['Error_PWG_Dup'] = '<b>Fout in Piwigo\'s accounttabel; er zijn duplicaten:</b>';
$lang['Error_Link_Dup'] = '<b>Fout in de linktabel; er zijn duplicaten:</b>';
$lang['Error_Link_Del'] = '<b>Fout in de linktabel tussen twee gebruikers:</b>';
$lang['Error_Link_Dead'] = '<b>Fout in de linktabel; doodlopende links:</b>';
$lang['Error_Link_Break'] = '<b>Doodlopende link tussen Piwigo- en FluxBB-accounts:</b>';
$lang['Error_FluxBB2PWG'] = '<b>De FluxBB-accounts die niet in Piwigo aanwezig zijn:</b>';
$lang['Error_FluxBB_Dup'] = '<b>Foutmelding in de accounttabel van FluxBB; er zijn dubbele accounts:</b>';
$lang['Disclaimer'] = '<div class="warning">Belangrijk: FluxBB en Piwigo moeten worden ge&iuml;nstalleerd in dezelfde database! Maak een backup van je database en in het bijzonder van je ###_user-tabellen in het oogpunt van veiligheid, voordat je enige andere stappen onderneemt.</div><br /><br />
*** Volg de volgende stappen om te beginnen ***<br />
Stap 1 - Configuratie: Configureer de plug-in parameters gerelateerd aan de FluxBB-parameters<br />
Stap 2 - Synchronisatie:<br />
- Als jouw FluxBB-forum <b>nog geen</b> gebruikers heeft, synchroniseer dan alle gebruikersaccounts vanuit Piwigo naar FluxBB<br />
- Als jouw FluxBB-forum <b>al wel</b> gebruikers heeft, voer dan een controle uit. De door de controle uitgevoerde tests welke betrekking hebben op samenhang vergelijken de Piwigo- en FluxBB-gebruikersdata. Delen van correcties worden in elk geval voorgesteld, gebaseerd op de resultaten<br /><br />';
$lang['Details_true'] = '--&gt; Maximaal niveau - Laat alle details van de resultaten zien van de synchronisatie- en migratie-uitvoering';
$lang['Details_false'] = '--&gt; Minimaal niveau - Laat alleen de hoofdresultaten zien van de synchronisatie- en migratie-uitvoeringen';
$lang['Details'] = 'Het niveau van weergave in de rapportages van ondernomen acties (synchronisatie en migratie)';
$lang['Del_User'] = 'Accountverwijdering in FluxBB:';
$lang['Del_Pt_true'] = '--&gt; Verwijder alles';
$lang['Del_Pt_false'] = '--&gt; Verwijder de topics en berichten van de gebruiker niet in het forum';
$lang['Del_Pt'] = 'Verwijderen van gebruikerstopics en -berichten van het forum wanneer hij wordt verwijderd van Piwigo';
$lang['Confirm_true'] = '--&gt; Vraag niet om bevestiging';
$lang['Confirm_false'] = '--&gt; Bevestiging benodigd voordat enige actie kan worden ondernomen in de controle';
$lang['Confirm'] = 'Bevestiging van corrigerende acties in controle';
$lang['Config_Title_d'] = 'Plug-in installatie';
$lang['Config_Title2'] = 'Geavanceerde instellingen van de plug-in';
$lang['Config_Title1'] = 'Instellingen van de overbrugging tussen FluxBB en Piwigo';
$lang['Config_Title'] = 'Plug-in installatie';
$lang['Config_Disclaimer'] = 'Controleer de instellingen van je FluxBB-installatie en pas deze indien nodig aan.<br /> Verander, indien nodig, het gedrag van de plug-in wanneer je dit wilt.';
$lang['Bridge_UAM_true'] = '--> Schakel de Register_FluxBB / UAM overbrugging in';
$lang['Bridge_UAM_false'] = '--> Schakel de Register_FluxBB / UAM overbrugging uit (standaard)';
$lang['Bridge_UAM'] = 'Validatie van toegang tot het forum waarbij de UserAdvManager plug-in (UAM) wordt gebruikt: Hier kan je de overbrugging activeren tussen de twee plug-ins, wat je toestaat om de toegang te beperken tot je FLuxBB-forum wanneer de gebruiker niet zijn of haar registratie heeft gevalideerd in de galerij (de gerelateerde UAM-functie moet actief zijn)';
$lang['Audit_Synchro_OK'] = '<b>: Datasyncrhonisatie OK</b>';
$lang['Audit_Synchro'] = '<b>Controle van de synchronisatie van wachtwoorden en emailadressen tussen Piwigo- en FluxBB-accounts</b>';
$lang['Audit_PWG_Dup'] = '<b>Controle van het accountoverzicht van Piwigo</b>';
$lang['Audit_PWG2FluxBB'] = '<b>Controle van de bestaande accounts in Piwigo en de missende in FluxBB</b>';
$lang['Audit_OK'] = 'Controle OK<br /><br />';
$lang['Audit_Link_Break'] = '<b>Controle van repareerbare links tussen Piwigo- en FluxBB-accounts</b>';
$lang['Audit_Link_Bad'] = '<b>Controle van doodlopende links tussen Piwigo- en FluxBB-accounts</b>';
$lang['Audit_FluxBB_Dup'] = '<b>Controle van het accountoverzicht van FluxBB</b>';
$lang['Audit_FluxBB2PWG'] = '<b>Controle van de bestaande accounts in FluxBB en de missende in Piwigo</b>';
$lang['Audit_Btn'] = 'Controle';
$lang['Advise_PWG_Dup'] = '<b>WAARSCHUWING! Je moet de volgende correcties aanbrengen in Piwigo voordat je verder gaat.<br /> Gebruik Piwigo\'s gebruikersbeheerder om het probleem op te lossen.</b>';
$lang['Advise_FluxBB_Dup'] = '<b>WAARSCHUWING! Je moet de volgende correcties aanbrengen in FluxBB voordat je verder gaat.<br /> Gebruik de icoontjes om gebruikers te verwijderen van FluxBB en los hiermee het probleem op.</b>';
$lang['Advise_Check_Dup'] = '<b>Het is ONMOGELIJK om door te gaan met synchroniseren zolang je overeenkomstige gebruikersaccounts in zowel Piwigo als FluxBB hebt. Corrigeer dit alsjeblieft en probeer het dan opnieuw.</b><br /><br />';
$lang['Add_User2pwg'] = 'Een account toevoegen in Piwigo:';
$lang['Add_User'] = 'Een account toevoegen in FluxBB:';
$lang['About_Reg_Title'] = 'Over de gebruikersregistratie in het FluxBB-forum';
$lang['About_Reg_Title_d'] = 'Handige instructies voor betere integratie';
$lang['About_Bridge_Title_d'] = 'Instructie met betrekking tot de overbrugging tussen Register_FluxBB en UserAdvManager plug-ins';
$lang['About_Bridge_Title'] = 'Over Register_FluxBB / UAM overbrugging';
$lang['%d users registered'] = '%d gebruikers geregistreerd';
$lang['%d registrations on error: %s'] = '%d registratiefouten: %s';
$lang['%d email addresses rejected: %s'] = '%d emailadres verworpen: %s';
$lang['%d email addresses already exist: %s'] = '%d dit e-mailadres bestaat al: %s';
$lang['UAM_Bridge_advice'] = 'De UserAdvManager plug-in staat toe om nieuw registrerende personen te forceren om hun registratie te bevestigen voordat ze toegang krijgen tot de gehele galerij. Het gezamenlijke gebruik van deze plug-in met Register_FluxBB kan hetzelfde doen op het aangesloten forum: registrerende bezoekers kunnen dan geen berichten plaatsen totdat zij hun registratie op de galerij hebben gevalideerd.<br />
Hier volgt de algemene procedure om dit toe te passen:<br />
- Configureer tenminste twee gebruikersgroepen in het beheerderspaneel van je FluxBB-forum (bijvoorbeeld: "gevalideerd" en "niet_gevalideerd").<br />
- Geef de eerste groep ("gevalideerd") permissies die jij wilt op je forum en verkies dit als de standaard groep.<br />
- Verwijder voor de tweede groep ("niet_gevalideerd") alle permissies op je forum (de leden van deze groep kunnen dan alleen publieke berichten bekijken).<br />
- Localiseer de ID van de tweede groep "niet_gevalideerd".<br />
- Vul deze ID in de Register_FluxBB plug-in in, activeer de overbrugging en sla de instellingen op.<br />
<b class="mod"><u>Belangrijke notities:"</u></b><br />
Als je al eens eerder een oudere versie van Register_FluxBB hebt gebruikt, dan zullen de overbruggingsinstellingen geen uitoefening hebben op de Piwigo-accounts die gelinkt zijn tussen je galerij en je FluxBB-forum. Alleen nieuwe registraties zullen worden aangepast door de activatie van de overbrugging. <b><u>De functie om de account opnieuw te synchroniseren moet leeg zijn.</u></b><br />
Vergelijkbaar is dat, wanneer je nooit eerder Register_FluxBB hebt gebruikt, het migratieproces van de Piwigo-accounts van je galerij naar je FluxBB-forum de validatiestaat veronachtzaamt of niet voor de accounts bij het starten van de migratie.';
$lang['save_config'] = 'Instellingen opgeslagen';
$lang['error_config_guest'] = 'FOUT: De gebruikersnaam van de gastaccount in FluxBB is onjuist!';
$lang['error_config_admin2'] = 'FOUT: De gebruikersnaam van de FluxBB administratoraccount is anders dan die van Piwigo! Controleer de configuratie van je FluxBB-forum en hernoem de administratoraccount naar dezelfde naam als die je hebt gebruikt in de Piwigo Galerij.';
$lang['error_config_admin1'] = 'FOUT: Piwigo\'s "Webmaster"-gebruikersnaam is onjuist!';
$lang['To synchronize your forum access with the gallery you have been registered at %s!'] = 'Je bent geregistreerd op %s. We moeten je forumtoegang synchroniseren met de galerij.';
$lang['Sync_User'] = 'Accountsynchronisatie:';
$lang['Sync_Title_d'] = 'Gebruik om accounts opnieuw te synchroniseren';
$lang['Sync_Title'] = 'Synchroniseer accounts van Piwigo naar FluxBB';
$lang['Sync_Text'] = '<div class="warning">Synchronisatie is een massa-actie die grote invloed kan hebben op je forumgebruikers! Controleer om elke zaak goed te kunnen beheren.</div><br /><br />

Herinneringen:<br />
De wachtwoorden van handmatig gesynchroniseerde accounts (via een controle of de globale synchronisatie) van Piwigo naar FluxBB worden niet hersteld. Elke gebruiker die hierover ongerust is zou zijn wachtwoord moeten wijzigen bij de volgende log-in op de galerij (hij zal dan automatisch worden doorgestuurd naar zijn profielpagina), zodat de synchronisatie effectief kan zijn en de persoon verbinding kan maken met het forum.<br /><br />
Tot nu toe is het niet mogelijk om bestaande gebruikers op een FluxBB-forum te synchroniseren naar een Piwigo-galerij. Dit is de reden waarom de voorgestelde controle-actie FluxBB-accounts verwijdert. Je kan deze niet-gesynchroniseerde statische accounts laten voor wat ze zijn (deze gebruikers zullen alleen kunnen verbinden met het forum), wachtend voor de volgende evolutie van deze plug-in die ook deze synchronisatie kan uitvoeren.<br /><br />';
$lang['Sync_PWG2FluxBB'] = '<b>Analyse van bestaande accounts in Piwigo die in FluxBB missen</b>';
$lang['Sync_OK'] = 'Synchronisatie OK<br /><br />';
$lang['Sync_Link_Break'] = '<b>Analyse van repareerbare links tussen accounts in Piwigo en FluxBB</b>';
$lang['Sync_Link_Bad'] = '<b>Analyse van foutieve overeenkomsten tussen Piwigo- en FluxBB-accounts</b>';
$lang['Sync_FluxBB2PWG'] = '<b>Analyse van bestaande accounts in FluxBB die in Piwigo missen</b>';
$lang['Sync_DataUser'] = '<b>Analyse van wachtwoorden en emailadressen tussen Piwigo- en FluxBB-accounts</b>';
$lang['Sync_Check_Dup'] = '<b>Analyse van gebruikerstabellen voor duplicaatcontrole</b>';
$lang['Sync_Btn'] = 'Synchronisatie';
$lang['RegFluxBB_Email_or_Username_already_exist'] = 'Synchronisatie van FluxBB naar Piwigo is gestopt: De doelemail of -gebruikersnaam bestaat reeds in de gebruikerstabel van Piwigo.';
$lang['RegFluxBB_Password_Reset_Msg'] = 'Update alsjeblieft je wachtwoord voor synchronisatie met het forum. Dan zal je de mogelijkheid hebben om in te loggen op het forum met dezelfde account als op de galerij.';
$lang['Prefix'] = 'FluxBB prefix tabellen:';
$lang['Please change your password at your first connexion on the gallery'] = 'Verander alsjeblieft je wachtwoord bij je eerstvolgende bezoek aan de galerij om de datasynchronisatie te be&euml;indigen.';
$lang['No_Reg_advise'] = 'Voor betere integratie is het adviseerbaar om de volgende aanpassingen aan je FluxBB-forum te maken (<b>Waarschuwing: deze veranderingen zullen teniet worden gedaan bij het updaten van het forum</b>):<br /><br />
<b>* Verander de waarde bij "Sta nieuwe registraties toe" naar "NEE" in het beheerderspaneel van FluxBB.<br /><br />
<b>* Pas het bestand</b>: [FluxBBRoot]/lang/English/register.php aan door de volgende regel aan te passen:<
<div class="mod">\'No new regs\' => \'Dit forum accepteert geen nieuwe gebruikers.\'</div>. 
<b>Pas dit aan naar:</b>
<div class="info">\'No new regs\' => \'&lt;a href=&quot;http://[YourPiwigoRoot]/register.php&quot; &gt; Klik hier om te registreren &lt;/a&gt;&lt;br/&gt;&lt;br/&gt;\'</div><br />
Natuurlijk moet je deze aanpassing ook doorvoeren in de andere talen die op je forum geactiveerd zijn.<br /><br />
<b>*Pas het bestand</b> [FluxBBRoot]/login.php <b>aan door het volgende te vervangen op regel 64:</b>
<div class="mod">message($lang_login[\'Wrong user/pass\'].\'&lt;a href=&quotlogin.php?action=forget&quot;&gt;</div> <b>door:</b>
<div class="info">message($lang_login[\'Wrong user/pass\'].&lt;a href=&quot;../[YourPiwigoRoot]/password.php&quot;&gt;</div><br />
<b>En op regel 295:</b>
<div class="mod">&lt;a href=&quot;login.php?action=forget&quot;tabindex=&quot;5&quot;&gt;&lt;?php echo $lang_login[\'Forgotten pass\']&lt;/a&gt;</div> <b>door:</b>
<div class="info">&lt;a href=&quot;../[YourPiwigoRoot]/password.php&quot;tabindex=&quot;5&quot;&gt;&lt;?php echo $lang_login[\'Forgotten pass\']?&gt;&lt;/a&gt;</div><br /><br />
<b>* Pas het bestand</b> [FluxBBRoot]/index.php <b>aan ACHTER regel 18:</b>
<div class="mod">
//Load the index.php language file<br />
require PUN_ROOT.\'lang/\'.$pun_user[\'language\'].\'index.php\';
</div>
<b>Voeg hieraan toe (erachter):</b>
<div class="info">
//Mod to regenerate user cache on each load<br />
&nbsp;if (!defined(\'FORUM_CACHE_FUNCTIONS_LOADED\'))<br />
&nbsp;&nbsp;&nbsp;require PUN_ROOT.\'include/cache.php\';
<br /><br />
&nbsp;&nbsp;&nbsp;generate_users_info_cache();<br />
// ---------------------------<br />
</div><br />';