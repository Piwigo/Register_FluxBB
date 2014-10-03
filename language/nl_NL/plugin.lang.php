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