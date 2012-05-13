<?php
$lang['Tab_Info'] = 'Instrukcijas';
$lang['Tab_Manage'] = '1.solis : Spraudņa konfigurēšana';
$lang['Tab_Migration'] = '2.solis : Konta pārvietošana';
$lang['Tab_Synchro'] = 'Profilakse: Kontu atkārtota sinhronizēšana';
$lang['Title'] = 'Reģistrēt FluxBB';
$lang['Config_Title'] = 'Spraudņa iestatīšana';
$lang['Config_Disclaimer'] = '
  Pārbaudiet FluxBB instalācijas iestatījumus un, ja nepieciešams, veiciet korekcijas.<br>
  Ja vajadzīgs, izmainiet spraudņa darbību pēc saviem ieskatiem.';
$lang['Prefix'] = 'FluxBB Prefiksa tabulas :';
$lang['Guest'] = 'FluxBB Vieslietotāja lietotājvārds.';
$lang['Details'] = 'Detalizācijas līmenis ziņojumos par veiktajām darbībām.';
$lang['Details_true'] = ' --&gt; Skatīt visas darbību rezultātu detaļas.';
$lang['Details_false'] = ' --&gt; Rāda tik daudz darbību rezultātu detaļas';
$lang['Del_Pt'] = 'Tēmu un ziņojumu dzēšana, lietotāja dzēšanas gadījumā.';
$lang['Del_Pt_true'] = ' --&gt; Dzēst visu';
$lang['Del_Pt_false'] = ' --&gt; Nedzēst tēmas un ziņojumus';
$lang['Confirm'] = 'Dzēst apstiprinājumu par administrācijas darbību pārbaudi.';
$lang['Confirm_true'] = ' --&gt; Dzēst apstiprinājumu';
$lang['Confirm_false'] = ' --&gt; Pirms pārbaudes darbībām apstiprinājums obligāts';
$lang['save_config'] ='Iestatījumi saglabāti';
$lang['Audit_Btn'] = 'Pārbaude';
$lang['Sync_Btn'] = 'Sinhronizācija';
$lang['Sync_Title'] = 'Sinhronizēt Piwigo un FluxBB kontus';
$lang['Sync_Text'] = '
  <div class="warning">Jūs jau lietojāt spraudni, lai saistītu Jūsu Piwigo (spraudņa jauninājums) un/vai Jūsu FluxBB forums nav bez lietotājiem!</div>
  <br> - Tas nozīmē, ka lietotāji pieder jūsu forumam.<br><br>
  - Sinhronizācija, salīdzinot lietotājvārdus, paroles (šifrētas) un viņu e-pasta adrešu abas tabulas [PrefixPWG]_user un [PrefixFluxBB]_user, konstatēja datu esamību. <br>
  - Tad jāatjaunina atbilstību tabula, kā arī katra konta (Piwigo un FluxBB) paroli un e-pasta adreses, izņemot Piwigo Viesa un FluxBB Anonīmo kontu.<br>
  - Visbeidzot jānosaka pamestie konti, kas eksiste tikai vienā no 2 ###_user tables (lietotājtabulām).<br>
  <br>
  Operācijas beigās veic pārbaudi vai FluxBB nav dubultu lietotāju. Ja tā ir, dzeš vecāko (sakārto FluxBB lietotājus pēc to reģistrēšanas datuma).<br>';
$lang['Sync_Check_Dup'] = '<b>Analizē Piwigo un FluxBB lietotāju kontu tabulas, lai kontrolētu dubultnieku esamību</b>';
$lang['Advise_Check_Dup'] = '<b>Neiespējami turpināt sinhronizāciju, ja Piwigo vai FluxBB lietotāju kontos ir dubultnieki.</b>';
$lang['Sync_Link_Break'] = '<b>Analizē, vai pastāv labojamas saites starp Piwigo un FluxBB kontiem</b>';
$lang['Sync_Link_Bad'] = '<b>Sliktas sadarbības starp Piwigo un FluxBB kontiem analīze</b>';
$lang['Sync_DataUser'] = '<b>Piwigo un FluxBB kontu savstarpējo paroļu un e-pasta adrešu analīze</b>';
$lang['Sync_PWG2FluxBB'] = '<b>Piwigo eksistējošo un FluxBB neeksistējošo kontu analīze</b>';
$lang['Sync_FluxBB2PWG'] = '<b>FluxBB eksistējošo un Piwigo neeksistējošo kontu analīze</b>';
$lang['Sync_OK'] = 'Sinhronizācija OK<br>';
$lang['Audit_PWG_Dup'] = '<b>Piwigo kontu tabulas pārbaude</b>';
$lang['Error_PWG_Dup'] = '<b>Kļūda Piwigo kontu tabulā, tur ir dublikāti:</b> ';
$lang['Advise_PWG_Dup'] = '<b>UZMANĪBU! Pirms turpināt, Jums nepieciešams veikt šīs korekcijas Piwigo, <br>lietojiet Piwigo lietotāju pārvaldnieku, lai atrisinātu šo problēmu.</b>';
$lang['Audit_FluxBB_Dup'] = '<b>FluxBB kontu tabulas pārbaude</b>';
$lang['Error_FluxBB_Dup'] = '<b>Kļūda FluxBB kontu tabulā, tur ir dublikāti:</b> ';
$lang['Advise_FluxBB_Dup'] = '<b>UZMANĪBU! Pirms turpināt, Jums nepieciešams veikt šīs korekcijas FluxBB<br>, izmantojiet ikonas, lai izdzēstu lietotājus no FluxBB un atrisinātu problēmu.</b>';
$lang['Audit_Link_Break'] = '<b>Saišu starp Piwigo un FluxBB kontiem pārbaude</b>';
$lang['Error_Link_Break'] = '<b>Bojāta saite starp Piwigo un FluxBB kontiem:</b> ';
$lang['New_Link'] = 'Konts sasaistīts: ';
$lang['Audit_Link_Bad'] = '<b>Bojātu saišu starp Piwigo un FluxBB kontiem pārbaude</b>';
$lang['Error_Link_Del'] = '<b>Kļūda saišu tabulā starp 2 lietotājiem:</b> ';
$lang['Link_Del'] = 'Saites dzēšana: ';
$lang['Error_Link_Dead'] = '<b>Kļūda saišu tabulā, neesošas saites:</b> ';
$lang['Link_Dead'] = 'Neesošo saišu dzēšana ';
$lang['Error_Link_Dup'] = '<b>Kļūda saišu tabulā, eksistē dublikāti:</b> ';
$lang['Link_Dup'] = 'Dublikātu dzēšana ';
$lang['Audit_Synchro'] = '<b>Piwigo un FluxBB kontu paroļu un e-pasta adrešu savstarpējās sinhronizācijas pārbaude</b>';
$lang['Error_Synchro'] = '<b>Nekorekta konta sinhronizācija:</b> ';
$lang['Error_Synchro_Pswd'] = 'pēc paroles';
$lang['Error_Synchro_Mail'] = 'pēc e-pasta adreses';
$lang['Audit_Synchro_OK'] = ' <b>: Datu sinhronizācija OK</b>';
$lang['Sync_User'] = 'Konta sinhronizācija : ';
$lang['Audit_PWG2FluxBB'] = '<b>Piwigo eksistējošo un FluxBB iztrūkstošo kontu pārbaude</b>';
$lang['Error_PWG2FluxBB'] = '<b>Piwigo konts neeksistē FluxBB:</b> ';
$lang['Add_User'] = 'Konta pievienošana FluxBB: ';
$lang['Audit_FluxBB2PWG'] = '<b>FluxBB eksistējošo un Piwigo iztrūkstošo kontu pārbaude</b>';
$lang['Error_FluxBB2PWG'] = '<b>FluxBB konts neeksistē Piwigo:</b> ';
$lang['Del_User'] = 'Konta dzēšana no FluxBB: ';
$lang['Audit_OK'] = 'Pārbaude OK<br><br>';
$lang['Mig_Btn'] = 'Pārvietošana';
$lang['Mig_Title'] = 'Kontu pārvietošana no Piwigo uz FluxBB';
$lang['Mig_Text'] = '
 <div class="warning"> LIETOT TIKAI TAD, JA nekad neesat lietojis spraudni, lai sajūgtu Piwigo ar FluxBB <u>UN JA</u> jūsu forumā nav lietotāju !!!</b></div><br>
     --> Šajā gadījumā jūsu FluxBB tabulai [PrefixFluxBB]_user jābūt tukšai bez kontiem, izņemot viesa un administratora kontus.<br><br>
 - Pārvietošanas operācija vispirms dzēsīs saites starp Piwigo un FluxBB kontiem.<br>
 - Tad <b>NODZĒSĪS VISUS FluxBB KONTUS</b>, izņemot viesa un administratora kontus.<br>
 <br>
 <div class="warning">BRĪDINĀJUMS, JA JUMS IR JEBKĀDI SPECIĀLIE KONTI fluxBB == NELIETOJIET ŠO FUNKCIJU !!!</div><br>
 - Visbeidzot, pārvietošanas operācija izveidos visus Piwigo kontus FluxBB, izņemot viesa kontu.<br>
 <br>
 Ja procesa laikā rodas kļūdas, novēršiet problēmu un atkārtojiet pārvietošanas (migrācijas) operāciju (šai brīdī varat atjaunot tikai pārvietošanas procesu).<br>';
$lang['Mig_Disclaimer'] = '<div class="warning"> NEKAD NEVEICIET PĀRVIETOŠANU LAI VEIKTU ATJAUNINĀŠANU !!!</div>';
$lang['Mig_Start'] = '<b>Kontu pārvietošana no Piwigo uz FluxBB</b>';
$lang['Mig_Del_Link'] = '<b>Saišu dzēšana starp Piwigo un FluxBB kontiem</b>';
$lang['Mig_Del_AllUsers'] = '<b>FluxBB kontu dzēšana</b>';
$lang['Mig_Del_User'] = '<b>Konta dzēšana:</b> ';
$lang['Mig_Add_AllUsers'] = '<b>Piwigo kontu pārvietošana</b>';
$lang['Mig_Add_User'] = '<b>Konta pārvietošana:</b> ';
$lang['Mig_End'] = '<b>Pārvietošana pabeigta !</b>';
$lang['Title_Tab'] = 'Register_FluxBB - Versija: ';
$lang['No_Reg_advise'] = '
    Labākai integrācijai, jūsu FluxBB forumam iespējamas sekojošas izmaiņas (<b>Brīdinājums: Šīs izmaiņas izzudīs pēc foruma atjaunināšanas</b>):
<br><br>
 <b>* FluxBB administrēšanas panelī, izmainiet (Atļaut jaunu reģistrēšanos) "Allow new registrations" uz (NĒ) NO (iekš:Options - Registration)</b>
 <br><br>
<b>* Modificējiet failu</b> : [FluxBBRoot]/lang/English/register.php, samainot sekojošu rindiņu:
 <div class="mod">\'No new regs\'                =>    \'Šis forums neakceptē jaunus lietotājus.\'
 </div> <b>with :</b> <div class="info">\'No new regs\'                =>    \'&lt;a href=&quot;http://[YourPiwigoRoot]/register.php&quot; &gt; Iet šeit, lai reģistrētos &lt;/a&gt;&lt;br/&gt;&lt;br/&gt;\'
 </div> <br>    Protams jums jāveic tās pašas izmaiņas arī jūsu FluxBB foruma citām valodām. <br><br> <b>* Modificējiet failu</b> : [FluxBBRoot]/login.php aizvietojot rindiņu 69:
 <div class="mod">message($lang_login[\'Wrong user/pass\'].\'&lt;a href=&quot;login.php?action=forget&quot;&gt;</div>
 <b>ar :</b> <div class="info">message($lang_login[\'Wrong user/pass\'].\'&lt;a href=&quot;../[PiwigoRoot]/password.php&quot;&gt;</div>
 <br>    un 216 rindiņā: <div class="mod">&lt;a href=&quot;login.php?action=forget&quot; tabindex=&quot;5&quot;><?php echo $lang_login[\'Forgotten pass\']</a></p>
 </div> <b>ar :</b> <div class="info">&lt;a href=&quot;../[PiwigoRoot]/password.php&quot; tabindex=&quot;5&quot;><?php echo $lang_login[\'Forgotten pass\']</a></p></div> <br>';
$lang['About_Reg'] = 'Par lietotāju reģistrāciju FluxBB forumā';
$lang['Bridge_UAM'] = 'Piekļuves validācija forumam, izmantojot UserAdvManager (UAM) spraudni: Ieslēgt tiltu starp diviem spraudņiem, kas ļaus jums aizliegt piekļuvi jūsu FluxBB forumam, kamēr lietotājs nav validējis savu reģistrāciju gelerijā (funkcijai jābūt aktivētai UAM).';
$lang['Bridge_UAM_true'] = ' --> Iespējot tiltu Register_FluxBB / UAM';
$lang['Bridge_UAM_false'] = ' --> Atspējot tiltu Register_FluxBB / UAM (noklusējums)';
$lang['FluxBB_Group'] = 'Norādiet <b>FluxBB grupas</b> ID, kurā jāatrodas nevalidētiem lietotājiem (tikuši iepriekš izveidoti FluxBB). Lai efektīvi darbotos, šai grupai nevajadzētu atļauju forumam (skat. šīs lapas beigās detaļas, kā lietot šo iespēju).';
$lang['About_Bridge'] = 'Par Register_FluxBB / UAM tiltu';
$lang['UAM_Bridge_advice'] = 'Spraudnis UserAdvManager dod iespēju jaunajiem reģistrantiem apstiprināt savu reģistrēšanos pirms atļaujas piekļūt visai galerijai.
 Šī spraudņa kopīga lietošana ar Register_FluxBB var paveikt to pašu saistītos forumos: Reģistranti nevar nosūtīt savus ziņojumus, kamēr nav apstiprināta to reģistrācija galerijā.
 <br> Šeit ir vispārējā procedūra, kas būtu jāveic: <br> - Sava FluxBB foruma administrēšanas daļā, nosakiet vismaz 2 lietotāju grupas (piemēram: "validētā" un "nevalidētā").
 <br> - Piešķiriet pirmajai grupai ("validētā") tādas piekļuves tiesības jūsu forumā, kādas vēlaties, un iestatiet to kā noklusējuma grupu.<br> - Atņemiet otrajai grupai ("nevalidētā")
  visas atļaujas jūsu forumā (šīs grupas biedri var lasīt tikai publiskās ziņas).
  <br> - Atrodiet otrās grupas "nevalidētā" ID.<br> - Ievadiet šo ID Register_FluxBB spraudnī, aktivējiet tiltu un saglabājiet iestatījumus.
  <br> <b class="mod"><u>Svarīgi:</u></b> <br> Ja jūs jau lietojat Register_FluxBB kādu no iepriekšējām versijām , ar FluxBB forumu saistīto Piwigo kontu tilta radītie procesi neiespaidos.
  Pēc tilta aktivēšanas tiks iespaidoti tikai jaunie reģistri. <b><u>Konta atkārtotas sinhronizācijas funkcija tiks anulēta.</u></b><br>
  Līdzīgi, ja nekad nav lietots Register_FluxBB, Piwigo konta pārvietošanas posms no jūsu galerijas uz jūsu FluxBB forumu ignorēs validācijas statusu vai ignorēs tiem kontiem, kas piedalās migrācijas posmā.';
$lang['Admin'] = 'Piwigo administratora lietotājvārds. <b style="color: red">FluxBB administratora konta lietotājvārdam jābūt tādam pašam!</b>';
$lang['error_config_admin1'] = 'KĻŪDA : Piwigo administratora lietotājvārds ir nepareizs!';
$lang['error_config_admin2'] = 'KĻŪDA : FluxBB administratora konta vārds atšķiras no Piwigo ! Pārbaudiet jūsu FluxBB foruma konfigurāciju un pārsauciet administratora kontu tādā pašā vārdā kā Piwigo.';
$lang['error_config_guest'] = 'KĻŪDA : FluxBB viesa konta vārds ir nepareizs!';
$lang['Disclaimer'] = '    *** Lai sāktu, veiciet šos 2 soļus ***<br>
  Step 1 : Iestatiet spraudni ar FluxBB parametriem.<br>
  Step 2 : Pārvietojiet lietotājkontus no Piwigo uz FluxBB.<br><br>
  Veicot šos divus soļus, spraudnis ir pilnībā darboties spējīgs un jums nav jāatgriežas šajā lapā.<br><br>
  *** Jau aktivēto savienojumu profilaksei ***<br>
  Profilakse : Tabulu sinhronizācija (papildinājumu, jauninājumu gadījumā vai lietotāju nekorektas dzēšanas gadījumā) ļauj atjaunināt paroles un e-pasta adreses un konstatēt lietotāju ielaušanos (Bet nemaz nav nepieciešams lietot ).<br><br>
  <div class="warning">BRĪDINĀJUMS !! Drošības nolūkos, apsveriet iespēju izveidot jūsu datu bāzes kopiju, īpaši ###_user tabulām pirms jebkādas darbības.</div>
  <br><br> <div class="warning">Svarīgi zināt:<br>
  Pēc noklusēšanas, <b>FluxBB</b> ir <u>reģistrnejutīgs</u> lietotājvārdiem. Tas nozīmē, ja lietotājs saukts "test" jau ir reģistrējies, citi mēģinājumi reģistrēties kā "Test" vai "TEST" vai "TEst" (utt. ..) tiks noraidīti.<br><br>
  Pēc noklusēšanas, <b>Piwigo</b> darbojas pretēji un tāpēc ir <u>reģistrjutīgs</u> uz ielogošanos ("test" ir atšķirīgs lietotājs no "Test" vai "TEST", utt. ...).<br>
  Lai izvairītos no problēmām (pat, ja Piwigo uzvedību viegli var izmanīt - Skatīt konfigurācijas iespējas), Register_FluxBB savienos divas aplikācijas FluxBB: kas ir<u>reģistrnejutīga</u> loginiem.<br><br>
  </div>';
?>