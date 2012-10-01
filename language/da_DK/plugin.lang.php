<?php
// +-----------------------------------------------------------------------+
// | Piwigo - a PHP based photo gallery                                    |
// +-----------------------------------------------------------------------+
// | Copyright(C) 2008-2012 Piwigo Team                  http://piwigo.org |
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
$lang['About_Bridge'] = 'Om Register_FluxBB / UAM-forbindelse';
$lang['About_Reg'] = 'Om registrering af brugere på FluxBB-forummet';
$lang['Add_User'] = 'Tilføjelse af FluxBB-konto:';
$lang['Admin'] = 'Piwigos administratorbrugernavn. <b style="color: red">Brugernavnet på FluxBB\'s administratorkonto skal være det samme!</b>';
$lang['Advise_Check_Dup'] = '<b>Det er ikke muligt at fortsætte synkroniseringen, hvis du har duplikater i Piwigos eller FluxBB\'s brugerkontotabel.</b><br><br>';
$lang['Advise_FluxBB_Dup'] = '<b>ADVARSEL! Du skal foretage disse rettelser i FluxBB før du fortsætter<br>benyt ikonerne til at slette brugere fra FluxBB og løse problemet.</b>';
$lang['Advise_PWG_Dup'] = '<b>ADVARSEL! Du skal foretage disse rettelser i Piwigo før du kan fortsætter<br>benyt Piwigos brugerhåndtering til at løse problemet.</b>';
$lang['Del_Pt_true'] = ' --&gt; Slet alt';
$lang['Del_User'] = 'Fjernelse af konto i FluxBB:';
$lang['Details'] = 'Detaljeringsniveau i handlingsrapporter.';
$lang['Details_false'] = ' --&gt; Viser af de fleste af handlingsresultaterne';
$lang['Details_true'] = ' --&gt; Se alle detaljerede oplysninger vedrørende handlingsresultaterne.';
$lang['Disclaimer'] = '  *** For at begynde, følges disse to trin ***<br>
  Trin 1: Opsæt plugin\'en med FluxBB\'s parametre.<br>
  Trin 2: Migrér brugerkonti fra Piwigo til FluxBB.<br><br>
  Efter disse to hovedtrin, er plugin\'en helt funktionsdygtig og du behøver ikke at vende tilbage til disse sider.<br><br>
  *** Til vedligeholdelse af allerede aktive forbindelser ***<br>
  Vedligeholdelse: Synkroniseringstabeller (i tilfælde af en tilføjelse, en opdatering eller manglende sammenhæng mellem brugersletninger) gør det muligt at opdatere adgangskoder og e-mail-adresser samt se brugerlogins (men det burde ikke være nødvendigt).<br><br>
  <div class="warning">ADVARSEL!! Af sikkerhedshensyn bør du overveje at lave en sikkerhedskopi af din database, særligt ###_user-tabeller før enhver handling.</div>
<br><br>
  <div class="warning">Vigtige oplysninger:<br>
  Som standard kender <b>FluxBB</b> <u>ikke forskel på store og små bogstaver</u> i brugernavne. Det vil sige, hvis en bruger kaldet "test" allerede er registeret, vil andre registreringer så som "Test", "TEST" eler "TEst" (mv.) blive afvist.<br><br>
  Som standard fungerer <b>Piwigo</b> modsat og kender derfor <u>forskel på store og små bogstaver</u> i brugernavne ("test" vil være en anden bruger en "Test", "TEST", mv.).<br>
  For at undgå problemer (selv hvis Piwigos virkemåde let kan ændres - Se opsætningsvalgmulighederne), vil Register_FluxBB linke de to applikationer efter FluxBB\'s metode: Det vil sige at der  <u>ikke kendes forskel på store og små bogstaver</u> i brugernavne.<br><br></div>';
$lang['Error_FluxBB2PWG'] = '<b>FluxBB-konto ikke i Piwigo:</b> ';
$lang['Error_FluxBB_Dup'] = '<b>Fejl i FluxBB\'s kontitabel, der er duplikater:</b> ';
$lang['Error_Link_Break'] = '<b>Ikke-fungerende link mellem Piwigo- og FluxBB-konti:</b> ';
$lang['Error_Link_Dead'] = '<b>Fejl i linktabel, døde links:</b> ';
$lang['Error_Link_Del'] = '<b>Fejl i linktabellen mellem to brugere:</b> ';
$lang['Error_Link_Dup'] = '<b>Fejl i linktabellen, der er duplikater:</b> ';
$lang['Error_PWG2FluxBB'] = '<b>Piwigo-konto ikke i FluxBB:</b> ';
$lang['Error_PWG_Dup'] = '<b>Fejl i Piwigos kontitabel, der er duplikater:</b> ';
$lang['Error_Synchro'] = '<b>Dårlig kontosynkronisering:</b> ';
$lang['Error_Synchro_Mail'] = 'på e-mail-adresse';
$lang['Error_Synchro_Pswd'] = 'på adgangskode';
$lang['FluxBB_Group'] = 'Angiv id\'en på <b>FluxBB-gruppen</b> som ikke-validerede brugere skal placeres i (skal være oprettet på forhånd i FluxBB). For at være effektiv, skal gruppen ikke have nogen tilladelser i forummet (se slutningen af denne side for detaljerede oplysninger om denne valgmulighed).';
$lang['Guest'] = 'FluxBB\'s gæstebrugers brugernavn.';
$lang['Link_Dead'] = 'Fjernelse af døde links';
$lang['Audit_Btn'] = 'Audit';
$lang['Audit_FluxBB2PWG'] = '<b>Audit af eksisterende konti i FluxBB, som mangler i Piwigo</b>';
$lang['Audit_FluxBB_Dup'] = '<b>Audit af FluxBB\'s kontitabel</b>';
$lang['Audit_Link_Bad'] = '<b>Audit af dårlige links mellem Piwigo- og FluxBB-konti</b>';
$lang['Audit_Link_Break'] = '<b>Audit af reparérbare links mellem Piwigo- og FluxBB-konti</b>';
$lang['Audit_OK'] = 'Audit er ok<br><br>';
$lang['Audit_PWG2FluxBB'] = '<b>Audit af eksisterende konti i Piwigo, som mangler i FluxBB</b>';
$lang['Audit_PWG_Dup'] = '<b>Audit af Piwigos kontitabel</b>';
$lang['Audit_Synchro'] = '<b>Audit af adgangskodesynkronisering og e-mail-adresser mellem Piwigo- og FluxBB-konti</b>';
$lang['Audit_Synchro_OK'] = '<b>: Datasynkronisering er ok</b>';
$lang['Bridge_UAM'] = 'Adgangsvalidering i forummet via UserAdvManager-plugin (UAM): Aktiver forbindelsen mellem de to plugins, som vil gøre det muligt at forhindre adgang til dit FluxBB-forum, indtil brugeren har valideret sin registrering i galleriet (funktionen skal være aktiv i UAM).';
$lang['Bridge_UAM_false'] = ' --> Deaktiver forbindelsen Register_FluxBB / UAM (standard)';
$lang['Bridge_UAM_true'] = ' --> Aktiver forbindelse Register_FluxBB / UAM';
$lang['Config_Disclaimer'] = '  Kontroller indstillingerne i din FluxBB-installation og tilpas dem om nødvendigt.<br>
  Du kan efter behov ændre hvordan plugin\'en fungerer.';
$lang['Config_Title'] = 'Opsætning af plugin';
$lang['Confirm'] = 'Sletbekræftelse ved administrationshandlinger i auditen.';
$lang['Confirm_false'] = ' --&gt; Bekræfelse krævet før handlinger i auditen';
$lang['Confirm_true'] = ' --&gt; Sletbekræftelse';
$lang['Del_Pt'] = 'Fjernelse af emner og indlæg, hvor brugeren er slettet.';
$lang['Del_Pt_false'] = ' --&gt; Slet ikke emner og indlæg';
?>