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
$lang['Disclaimer'] = ' <Div class = "advarsel"> Viktig: FluxBB og Piwigo må installeres i samme database! For sikkerhets skyld bør du ta en sikkerhetskopi av databasen og spesielt på ### _ brukertabeller før eventuelle tiltak.</Div><br/><br/>
  *** For å begynne, følger du disse to trinnene ***<br/>
  Trinn 1 - Konfigurasjon: Konfigurer programtilleggets parametere knyttet til FluxBB parametere<br/>
  Trinn 2 - Synkronisering:
  - Hvis ditt FluxBB forum <b> ikke har </b> noen brukere, synkroniser alle bruker kontoer fra Piwigo til FluxBB<br/>
  - Hvis ditt FluxBB forum <b> har </b> brukere, som igangsetter et tilsyn. Tilsynet som utføres tester identiteten mellom Piwigo og FluxBB brukeres data. Basert på resultatene, vil forskjellige former for korreksjoner i hvert tilfelle bli foreslått <br/>

  <Div class = "advarsel"> Så langt er det ennå ikke mulig å synkronisere eksisterende brukere på en FluxBB forumet til et Piwigo galleri. Dette er grunnen til at det foreslåtte tilsyns handlingen sletter FluxBB kontoer. Du kan la disse ikke synkroniserte kontoene (de vil være i stand til å koble maskinen til forumet) vente på den neste evolusjonen av programtillegget som da vil gjøre denne synkroniseringen.
</Div>
<br/><br/>
  
  Merk: Passordene til de manuelle synkroniserte kontoer (ved tilsyn eller den generelle synkronisering) fra Piwigo til FluxBB er ikke gjenvunnet. Hver bruker bør endre sitt passord ved neste pålogging til galleriet (han vil automatisk bli omdirigert til hans profilside), slik at synkroniseringen skal bli effektiv, og han kan logge inn på forumet.
<br/><br/>


  <Div class = "advarsel"> Viktig å vite:<br/>
  Som standard er<b>FluxBB </b> veldig<u>ufølsom</u>på brukernavn. Det vil si, hvis en bruker som heter "test" er allerede registrert, andre oppføringer som f.eks "Test" eller "TEST" eller "TEst" (osv ..) vil bli avvist.<br/><br/>
  Som standard fungerer<b>Piwigo</b> motsatt og er derfor <u> følsom </u> på brukernavn ("test" vil være en annen bruker av "Test" eller "TEST", osv .. .). <br/>
  For å unngå problemer (selv om Piwigo atferd enkelt kan endres - Se konfigurasjonsalternativer), vil Register_FluxBB knytte de to programmene sammen ved hjelp av FluxBB sin atferd: Å være veldig <u> ufølsom </u> for brukernavn <br/><br/><./div>';
$lang['FluxBB_Group'] = 'Her angir du ID (format: heltall) på <b> en FluxBB brukere gruppe </b> der ubekreftede brukere må ligge hvis de ikke har fått godkjent sin registrering til galleriet. Denne brukere gruppen må skapes først i FluxBB. For å kunne virke, bør denne gruppen ikke ha noen rettigheter i forumet (se avsnittet "Instruksjoner" for detaljert informasjon)';
$lang['Details_true'] = ' --&gt; Maksimalt nivå - Viser alle detaljene på resultatene av synkronisering og migrasjons operasjoner';
$lang['Error_FluxBB2PWG'] = '<b>FluxBB kontoen er ikke i Piwigo:</b> ';
$lang['Error_FluxBB_Dup'] = '<b>Feil i FluxBB\'s kontos tabeller, det er dobbelt opp:</b> ';
$lang['Error_Link_Break'] = '<b>Ødelagt link mellom Piwigo og FluxBB kontoene:</b> ';
$lang['Error_Link_Dead'] = '<b>Feil i tabell linken, død link:</b>';
$lang['Error_Link_Del'] = '<b>Feil i tabell linken mellom to brukere:</b> ';
$lang['Error_Link_Dup'] = '<b>Feil i tabell linken, det er dobbelt opp:</b> ';
$lang['Error_PWG2FluxBB'] = '<b>I Piwigo kontoen ikke i FluxBB:</b> ';
$lang['Error_PWG_Dup'] = '<b>Feil i Piwigo\'s kontos tabeller, det er dobbelt opp:</b> ';
$lang['Error_Synchro'] = '<b>Dårlig synkronisering av konto:</b> ';
$lang['Error_Synchro_Mail'] = 'på e-postadresse';
$lang['Error_Synchro_Pswd'] = 'Denne brukeren er nødt til å endre passordet sitt ved neste pålogging til galleriet';
$lang['FluxBB_Admin'] = 'Piwigo\'s "Webmaster" kontos brukernavn. <b style="color: red">Og FluxBB\'s "Administrator" brukernavns konto må stemme overens!</b>';
$lang['FluxBB_Title'] = 'Register_FluxBB - Versjon: ';
$lang['Guest'] = 'FluxBB\'s gjest brukernavn';
$lang['Instruction_Title'] = 'Instruksjoner (viktig å lese først!)';
$lang['Instruction_Title_d'] = 'Instruksjoner og viktig informasjon';
$lang['Link_Dead'] = 'Fjerning av døde lenker';
$lang['Bridge_UAM_true'] = ' --> Aktiver Register_FluxBB / UAM bro';
$lang['Config_Disclaimer'] = 'Sjekk innstillingene for din FluxBB installasjon og fiks dem hvis nødvendig.<br/>
Bytt om nødvendig atferden til programtillegget som du vil.';
$lang['Config_Title'] = 'Programtilleggs oppsett';
$lang['Config_Title1'] = 'Innstillinger av broen mellom FluxBB og Piwigo';
$lang['Config_Title2'] = 'Programtilleggets avanserte innstillinger';
$lang['Config_Title_d'] = 'Programtilleggets oppsett';
$lang['Confirm'] = 'Bekreftelse på korrigerende tiltak av tilsynet';
$lang['Confirm_false'] = '--&gt; Bekreftelse kreves før noen endring i tilsynet';
$lang['Confirm_true'] = '--&gt; Ikke be om bekreftelse';
$lang['Del_Pt'] = 'Sletter brukerens emner og meldinger fra forumet når han slettes fra Piwigo';
$lang['Del_Pt_false'] = '--&gt; Ikke slett emner og innlegg fra forumet';
$lang['Del_Pt_true'] = '-&gt; Slett alle';
$lang['Del_User'] = 'Fjerning av konto i FluxBB: ';
$lang['Details'] = 'Detaljnivå som skal vises i rapporter om operasjoner (synkronisering og migrasjon)';
$lang['Details_false'] = '--&Gt; Minimums Nivå - Viser bare de viktigste resultatene av synkroniserings og migrasjons operasjoner';
$lang['Audit_PWG_Dup'] = '<b>Tilsyn av Piwigo regnskaps tabeler</b>';
$lang['Audit_Synchro'] = '<b>Tilsyn av synkronisering av passord og e-postadresser mellom Piwigo og FluxBB kontoer</b>';
$lang['Audit_Synchro_OK'] = '<b>: Datasynkronisering OK</b>';
$lang['Bridge_UAM'] = 'Godkjenning av tilgang til forumet ved hjelp av programtillegget UserAdvManager (EMA): Her aktiverer du broen mellom de to programtilleggene, som gir deg en begrenset tilgang til ditt FluxBB forum, vis brukeren ikke har fått godkjent sin registrering i galleriet (den relaterte EMA-funksjon må være aktiv)';
$lang['Bridge_UAM_false'] = '--> Deaktiver Register_FluxBB / UAM bro (default)';
$lang['%d registrations on error: %s'] = '%d registreringer ved feil:%s';
$lang['%d users registered'] = '%d brukere er registrert';
$lang['%d email addresses already exist: %s'] = '%d e-postadressen finnes allerede: %s';
$lang['%d email addresses rejected: %s'] = '%d e-postadressen avvist:%s';
$lang['About_Bridge_Title'] = 'Om Register_FluxBB / UAM bro';
$lang['About_Bridge_Title_d'] = 'Instruksjon om broen mellom programtilleggene Register_FluxBB og UserAdvManager';
$lang['About_Reg_Title'] = 'Om brukerregistrering i FluxBB forum';
$lang['About_Reg_Title_d'] = 'Nyttige instruksjoner for bedre integrering';
$lang['Add_User'] = 'Legge til en konto i FluxBB: ';
$lang['Add_User2pwg'] = 'Legge til en konto i Piwigo: ';
$lang['Advise_Check_Dup'] = '<B>UMULIG å fortsette synkronisering hvis du har kopiert brukerkontoer i Piwigo eller FluxBB. Vennligst korriger og prøv igjen.</b><br/><br/>';
$lang['Advise_FluxBB_Dup'] = '<B>ADVARSEL! Du må gjøre disse korreksjonene i FluxBB før du fortsetter<br/>Bruk ikonene til å slette brukere fra FluxBB og løse problemet.</b>';
$lang['Advise_PWG_Dup'] = '<B>ADVARSEL! Du må gjøre disse korreksjonene i Piwigo før du fortsetter<br/>Bruk Piwigo bruker manager for å løse problemet. </b>';
$lang['Audit_Btn'] = 'Tilsyn';
$lang['Audit_FluxBB2PWG'] = '<b>Tilsyn av eksisterende kontoer i FluxBB og mangler i Piwigo </b>';
$lang['Audit_FluxBB_Dup'] = '<b>Tilsyn av FluxBB regnskaps tabeler </ b>';
$lang['Audit_Link_Bad'] = '<b>Tilsyn av dårlige koblinger mellom Piwigo og FluxBB kontoer </b>';
$lang['Audit_Link_Break'] = '<b>Tilsyn av reparerbare koblinger mellom Piwigo og FluxBB kontoer</b>';
$lang['Audit_OK'] = 'Tilsyn OK<br/><br/>';
$lang['Audit_PWG2FluxBB'] = '<b>Tilsyn av eksisterende kontoer i Piwigo og mangler i FluxBB </b>';