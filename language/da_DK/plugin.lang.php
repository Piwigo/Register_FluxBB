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
$lang['UAM_Bridge_advice'] = 'Plugin\'en UserAdvManager gør det muligt at tvinge nyregistrerede brugere til at bekræfte deres registrering, før de får adgang til hele galleriet. Benyttes samtidig med denne plugin, Register_FluxBB kan det samme gøres i det linkede forum: Registranter kan ikke skrive indlæg indtil de har godkendt deres registrering i galleriet. <br>
Her er den generelle procedure, som skal anvendes:
<br>
- I administration i det FluxBB-forum opsættes mindst to brugergrupper (for eksempel: "validated" og "no_validated").<br>
- Giv den første gruppe ("validated") de adgangstilladelelser, som du ønsker i dit forum, og opsæt den som standardgruppen.<br>
- Fra den anden gruppe ("no_validated") fjernes alle tilladelser i dit forum (medlemmer af gruppen kan kun læse offentlige indlæg).<br>
- Find den anden gruppes, "no_validated", id.<br>
- Skriv id\'en i Register_FluxBB-plugin\'en, aktiver forbindelsen og gem indstillingerne.
<br>
<b class="mod"><u>Vigtige bemærkninger:</u></b>
<br>
Hvis du allerede anvender en tidligere version af Register_FluxBB, og Piwigos konti er linket mellem dit galleri og dit FluxBB-forum, vil de ikke blive påvirket af forbindelsen. Kun nyregistreringen vil blive påvirket efter aktiveringen af forbindelsen.<b><u>Funktione til konto-gensynkronisering vil ikke fungere.</u></b><br>
Tilsvarende, hvis du aldrig har benyttet Register_FluxBB, vil fasen med migreringn af Piwigos konti fra dit galleri til dit FluxBB-forum ignorere tilstanden, der fortæller om der er tale om en konto er godkendt eller ej, for at alle konti der findes på det tidspunkt, migreringen sættes i værk.';
$lang['No_Reg_advise'] = '  For bedre integration anbefales det at foretage følgende ændringer i dit FluxBB-forum (<b>Advarsel: Ændringerne vil forsvinde når forummet opdateres</b>):
<br><br>
  <b>* I FluxBB\'s administrationspanel ændres "Allow new registrations" til NO (i: Options - Registration)</b>
<br><br>
  <b>* Ændring af filen</b>: [FluxBBRoot]/lang/English/register.php ved at erstatte følgende linje:
  <div class="mod">\'No new regs\'				=>	\'This forum is not accepting new users.\'</div>
  <b>med:</b>
  <div class="info">\'No new regs\'				=>	\'&lt;a href=&quot;http://[YourPiwigoRoot]/register.php&quot; &gt; Go here to register &lt;/a&gt;&lt;br/&gt;&lt;br/&gt;\'</div>
  <br>
  Du skal selvfølgelig gøre det samme for alle andre sprog i dit FluxBB-forum.
<br><br>
  <b>* Ændring af filen</b> : [FluxBBRoot]/login.php ved er erstatte linje 69:
  <div class="mod">message($lang_login[\'Wrong user/pass\'].\'&lt;a href=&quot;login.php?action=forget&quot;&gt;</div>
  <b>med:</b>
  <div class="info">message($lang_login[\'Wrong user/pass\'].\'&lt;a href=&quot;../[PiwigoRoot]/password.php&quot;&gt;</div>
<br>
  og linje 216:
  <div class="mod">&lt;a href=&quot;login.php?action=forget&quot; tabindex=&quot;5&quot;><?php echo $lang_login[\'Forgotten pass\']</a></p></div>
  <b>med:</b>
  <div class="info">&lt;a href=&quot;../[PiwigoRoot]/password.php&quot; tabindex=&quot;5&quot;><?php echo $lang_login[\'Forgotten pass\']</a></p></div>
  <br>';
$lang['Sync_Text'] = '<div class="warning">Du har allerede benyttet plugin\'en til at linke din Piwigo (pluginopdatering) og/eller dit FluxBB-forum ikke er tomt for brugere!</div>
  <br> -> Det betyder, at der er brugere i dit forum.<br><br>
  - Synkroniseringen finder data ved at sammenligne brugernavne, adgangskoder (krypterede) og deres e-mail-adresser i begge tabeller [PrefixPWG]_user og [PrefixFluxBB]_user.<br>
  - Dernæst opdateres den svarende tabel, foruden adgangskode og e-mail-adresse for hver konto fra Piwigo til FluxBB, bortset fra Piwigo Guest og FluxBB Anonymous.<br>
  - Slutteligt indikeres misvisende forældreløse konti, som kun findes i en af de to ###_user-tabeller.<br>
  <br>
  Når handlingen er udført, startes en audit og kontroller for mulige duplikerede brugere i FluxBB. Hvis det er tilfældet, slettes den ældste (FluxBB-brugere sorteres jævnfør deres registreringsdato).<br>';
$lang['Mig_Text'] = '  <div class="warning">BRUG KUN HVIS du aldrig før har benyttet plugin\'en til at linke Piwigo til FluxBB <u>OG HVIS</u> dit forum ikke har nogen brugere!!!</b></div><br>
  		--> I det tilfælde, må tabellen [PrefixFluxBB]_user i FluxBB ikke indeholde nogen brugerkonto, bortset fra de to konti guest og administrator.<br><br>
  - Migreringen fjerner først links mellem konti i Piwigo og FluxBB.<br>
  - Dernæst <b>SLETTES ALLE FluxBB-KONTI</b> bortset fra de to konti guest og administrator.<br>
  <br>
  <div class="warning">ADVARSEL: HVIS DU HAR NOGEN SÆRLIGE KONTI I FluxBB == ANVENDT IKKE DENNE FUNKTION!!!</div><br>
  - Slutteligt, migreringen opretter alle Piwigos konti i FluxBB, bortset fra guest.<br>
  <br>
  Hvis der opstår fejl undervejs, skal du rette årsagen til fejlen og starte migreringen igen (på det tidspunkt kan man kun fornye migreringen).<br>';
$lang['Sync_Link_Bad'] = '<b>Analyse af dårlige forbindelser mellem konti i Piwigo og FluxBB</b>';
$lang['Sync_Link_Break'] = '<b>Analyse af reparérbare links mellem konti i Piwigo og FluxBB</b>';
$lang['Sync_OK'] = 'Synkronisering er ok<br><br>';
$lang['Sync_PWG2FluxBB'] = '<b>Analyse af eksisterende konti i Piwigo, som mangler i FluxBB</b>';
$lang['Sync_Title'] = 'Sykroniser konti fra Piwigo til FluxBB';
$lang['Sync_User'] = 'Kontosynkronisering:';
$lang['Tab_Info'] = 'Vejledning';
$lang['Tab_Manage'] = 'Trin 1: Opsætning af plugin';
$lang['Tab_Migration'] = 'Trin 2: Kontomigrering';
$lang['Tab_Synchro'] = 'Vedligeholdelse: Gensynkronisering af konti';
$lang['Title'] = 'Registrer FluxBB';
$lang['Title_Tab'] = 'Registrer FluxBB - Version:';
$lang['error_config_admin1'] = 'FEJL: Piwigos administratorbrugernavn er forkert!';
$lang['error_config_admin2'] = 'FEJL: Navnet på FluxBB\'s administratorkonto er forskelligt fra det i Piwigo! Kontrollerer opsætningen af dit FluxBB-forum og omdøb admninistratorkontoen til det samme navn, som det i Piwigo.';
$lang['error_config_guest'] = 'FEJL: Navnet på FluxBB\'s gæstekonto er forkert!';
$lang['save_config'] = 'Indstillinger gemt';
$lang['Link_Del'] = 'Fjernelse af link:';
$lang['Link_Dup'] = 'Fjernelse af duplikater:';
$lang['Mig_Add_AllUsers'] = '<b>Overfører Piwigo-konti</b>';
$lang['Mig_Add_User'] = '<b>Overførsel af konto:</b> ';
$lang['Mig_Btn'] = 'Migrering';
$lang['Mig_Del_AllUsers'] = '<b>Sletter FluxBB-konti</b>';
$lang['Mig_Del_Link'] = '<b>Sletter links mellem Piwigo- og FluxBB-konti</b>';
$lang['Mig_Del_User'] = '<b>Sletter kontoen:</b> ';
$lang['Mig_Disclaimer'] = '<div class="warning">UDFØR ALDRIG MIGRERING FOR OPDATERING!!!</div>';
$lang['Mig_End'] = '<b>Migrering udført!</b>';
$lang['Mig_Start'] = '<b>Mirgrering af konti fra Piwigo til FluxBB</b>';
$lang['Mig_Title'] = 'Migrering af konti fra Piwigo til FluxBB';
$lang['New_Link'] = 'Konti linket:';
$lang['Prefix'] = 'FluxBB Prefix-tabeller:';
$lang['Sync_Btn'] = 'Synkronisering';
$lang['Sync_Check_Dup'] = '<b>Analyserer tabeller med brugerkonti i Piwigo og FluxBB, for at finde duplikater</b>';
$lang['Sync_DataUser'] = '<b>Analyse af adgangskoder og e-mail-adresser mellem konti i Piwigo og FluxBB</b>';
$lang['Sync_FluxBB2PWG'] = '<b>Analyse af eksisterende konti i FluxBB, som mangler i Piwigo</b>';
$lang['About_Bridge_Title'] = 'Om Register_FluxBB- / UAM-forbindelse';
$lang['About_Bridge_Title_d'] = 'Vejledning til forbindelsen mellem plugin\'erne Register_FluxBB og UserAdvManager';
$lang['About_Reg_Title'] = 'Om brugerregistrering i FluxBB-forum';
$lang['About_Reg_Title_d'] = 'Nyttig vejledning til bedre integration';
$lang['Config_Title1'] = 'Opsætning af forbindelsen mellem FluxBB og Piwigo';
$lang['Config_Title2'] = 'Plugin\'ens avancerede indstillinger';
$lang['Config_Title_d'] = 'Opsætning af plugin';
$lang['Instruction_Title'] = 'Vejledning (vigtig at læse først!)';
$lang['Instruction_Title_d'] = 'Vejledning og vigtige oplysninger';
$lang['Mig_Title_d'] = 'BENYT KUN HVIS du aldrig før har benyttet plugin\'en';
$lang['Sync_Title_d'] = 'Benyt for at gensynkronisere konti';
?>