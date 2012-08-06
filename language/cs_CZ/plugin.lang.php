<?php
$lang['Tab_Info'] = 'Instrukce';
$lang['Tab_Manage'] = 'Krok 1 : nastavení pluginu';
$lang['Tab_Migration'] = 'Krok 2 : migrace účtů';
$lang['Tab_Synchro'] = 'Údržba : Re-synchronizace účtů';

$lang['Title'] = 'Registrace do FluxBB';

$lang['Config_Title'] = 'Nastavení pluginu';
$lang['Config_Disclaimer'] = '
  Zkontrolujte nastavení vaší instalace FluxBB a upravte jej pokud budet třeba. <br>
  Upravte plugin tak jak potřebujete.';
$lang['Prefix'] = 'FluxBB Prefix tabulek :';
$lang['Guest'] = 'Uživatelské jméno pro neregistrovaného návštěvníka FluxBB.';
$lang['Details'] = 'Úroveň detailů u statistik operací.';
$lang['Details_true'] = ' --&gt; Zobrazit co nejvíce detailů výsledků operací.';
$lang['Details_false'] = ' --&gt; Zobrazit detaily nejčastějších výsledků operací';
$lang['Del_Pt'] = 'Odstranění příspěvků a vláken když je uživatel odstraněn.';
$lang['Del_Pt_true'] = ' --&gt; Odstranit vše';
$lang['Del_Pt_false'] = ' --&gt; Neodstraňovat příspěvky a vlákna';
$lang['Confirm'] = 'Potvrzení pro odstraňování v administraci akcí v Auditu.';
$lang['Confirm_true'] = ' --&gt; Potvrzení odstranění';
$lang['Confirm_false'] = ' --&gt; Povinné potvrzení před akcí v Auditu';

$lang['save_config'] ='Nastavení uloženo';

$lang['Audit_Btn'] = 'Audit';
$lang['Sync_Btn'] = 'Synchronizace';
$lang['Sync_Title'] = 'Synchronizace účtů z Piwigo do FluxBB';
$lang['Sync_Text'] = '
  <div class="warning">Už jste použil tento plugin pro propojení vaší galerie Piwigo (plugin update) a nebo vaše FluxBB forum už obsahuje nějaké uživatele!</div>
  <br> -> To znamená, že vaše fórum má uživatele.<br><br>
  - Synchronizace detekovala data porovnáním uživatelů, hesel (encrypted) a jejich emailů v obou tabulkách [PrefixPWG]_user a [PrefixFluxBB]_user.<br>
  - Následně došlo k aktualizaci odpovídající tabulky a hesla a emailu pro každý účet z Piwigo do FluxBB kromě Piwigo nereg. návštěvníků a FluxBB anonymních uživatelů.<br>
  - Naposledy bylo indikováno nestejné účty, které existují jen v jedné z těchto ###_user tabulek.<br>
  <br>
  Před dokončením operace, spustťe Audit a zkontrolujte možné duplicity uživatelů ve FluxBB. Pokud ano, odstraňte starší (seřaďte FluxBB uživatele k datu jejich registrace).<br>';
$lang['Sync_Check_Dup'] = '<b>Analýza tabulek uživatelů Piwigo a FluxBB pro kontrolu duplicit</b>';
$lang['Advise_Check_Dup'] = '<b>Není možné ukončit synchronizaci pokud existují jakékoli duplicity v uživatelských účtech v Piwigo nebo FluxBB.</b><br><br>';
$lang['Sync_Link_Break'] = '<b>Analýza opravitelných spojení mezi účty Piwigo a FluxBB</b>';
$lang['Sync_Link_Bad'] = '<b>Analýza špatných propojení mezi účty v Piwigo a FluxBB</b>';
$lang['Sync_DataUser'] = '<b>Analýza hesel a emailů mezi účty v Piwigo a FluxBB</b>';
$lang['Sync_PWG2FluxBB'] = '<b>Analýza existujících účtů ve Piwigo a chybějících v FluxBB</b>';
$lang['Sync_FluxBB2PWG'] = '<b>Analýza existujících účtů ve FluxBB a chybějících v Piwigo</b>';
$lang['Sync_OK'] = 'Synchronizace OK<br><br>';

$lang['Audit_PWG_Dup'] = '<b>Audit tabulky účtů Piwigo</b>';
$lang['Error_PWG_Dup'] = '<b>Chyba v tabulce Piwigo účtů, jsou zde duplicity:</b> ';
$lang['Advise_PWG_Dup'] = '<b>Varování! Musíte udělat opravy v Piwigo před dokončením<br>použijte Piwigo správce uživatelů pro vyřešení tohoto problému.</b>';

$lang['Audit_FluxBB_Dup'] = '<b>Audit tabulky účtů FluxBB</b>';
$lang['Error_FluxBB_Dup'] = '<b>Chyba v tabulce FluxBB účtů, jsou zde duplicity:</b> ';
$lang['Advise_FluxBB_Dup'] = '<b>Varování! Musíte udělat opravy ve FluxBB před dokončením<br>použijte ikonky pro odstraňování uživtaelů z FluxBB a opravte tento problém.</b>';

$lang['Audit_Link_Break'] = '<b>Audit opravovaných vazeb mezi Piwigo a FluxBB účty</b>';
$lang['Error_Link_Break'] = '<b>Přerušené vazby mezi účty v Piwigo a FluxBB:</b> ';
$lang['New_Link'] = 'Účet napojen: ';

$lang['Audit_Link_Bad'] = '<b>Audit špatných propojení mezí Piwigo a FluxBB účty</b>';
$lang['Error_Link_Del'] = '<b>Chyba v provázání tabulky mezi 2 uživateli:</b> ';
$lang['Link_Del'] = 'Odstranění propojení: ';
$lang['Error_Link_Dead'] = '<b>Chyba v tabulce vazeb, neplatné vazby:</b> ';
$lang['Link_Dead'] = 'Odstranit neplatné vazby ';
$lang['Error_Link_Dup'] = '<b>Chyba v tabulce vazeb, jsou zde duplicity:</b> ';
$lang['Link_Dup'] = 'Odstranit duplicity ';

$lang['Audit_Synchro'] = '<b>Audit synchronizace hesel a emailů mezi Piwigo a FluxBB účty</b>';
$lang['Error_Synchro'] = '<b>Špatná synchronizace účtů:</b> ';
$lang['Error_Synchro_Pswd'] = 'na heslech';
$lang['Error_Synchro_Mail'] = 'na emailových adresách';
$lang['Audit_Synchro_OK'] = ' <b>: Synchronizace dat OK</b>';
$lang['Sync_User'] = 'Synchronizace účtů : ';

$lang['Audit_PWG2FluxBB'] = '<b>Audit existujících účtů v Piwigo a scházejících ve FluxBB</b>';
$lang['Error_PWG2FluxBB'] = '<b>Piwigo účet není ve FluxBB:</b> ';
$lang['Add_User'] = 'Přidání účtu do FluxBB: ';

$lang['Audit_FluxBB2PWG'] = '<b>Audit existujících účtů v FluxBB a scházejících ve Piwigo</b>';
$lang['Error_FluxBB2PWG'] = '<b>FluxBB účet není v Piwigo:</b> ';
$lang['Del_User'] = 'Odstranění účtu z FluxBB: ';

$lang['Audit_OK'] = 'Audit OK<br><br>';

$lang['Mig_Btn'] = 'Migrace';
$lang['Mig_Title'] = 'Migrace účtů z Piwigo do FluxBB';
$lang['Mig_Text'] = '
  <div class="warning"> POUŽIJTE JEN POKUD jste nikdy nepoužili tento plugin pro provázání Piwigo s FluxBB <u>A POKUD</u> je vaše fórum prázdné bez uživatelů !!!</b></div><br>
  		--> V takovém případě, tabulka [PrefixFluxBB]_user ve FluxBB musí být prázdná bez jakýchkoli účtů kromě základních 2 účtů pro návštěvníky (guest) a administrátora.<br><br>
  - Migrace nejprve odstraní vazbu mezi účty Piwigo a FluxBB.<br>
  - Následně <b>BUDOU SMAZÁNY VŠECHNY FluxBB ÚČTY</b>  kromě základních 2 účtů pro návštěvníky (guest) a administrátora.<br>
  <br>
  <div class="warning">VAROVÁNÍ POKUD MÁTE JAKÉKOLI SPECIÁLNÍ ÚČTY VE FluxBB == NEPOUŽÍVEJTE TUTO FUNKCI !!!</div><br>
  - Nakonec, migrace vytvoří všechny Piwigo účty také ve FluxBB, kromě guest účtu.<br>
  <br>
  Pokud nastane při operaci nějaká chyba, opravte původce chyby a opakujte migraci (jen v případě kdy obnovíte migraci).<br>';
$lang['Mig_Disclaimer'] = '<div class="warning"> NIKDY NEPOUŽÍVEJTE MIGRACI PRO AKTUALIZACI !!!</div>';
$lang['Mig_Start'] = '<b>Migrace účtů z Piwigo do FluxBB</b>';
$lang['Mig_Del_Link'] = '<b>Odstranění vazeb mezi účty Piwigo a FluxBB</b>';
$lang['Mig_Del_AllUsers'] = '<b>Odstranění účtů FluxBB</b>';
$lang['Mig_Del_User'] = '<b>Odstranění účtu:</b> ';
$lang['Mig_Add_AllUsers'] = '<b>Přenos Piwigo účtů</b>';
$lang['Mig_Add_User'] = '<b>Přenos účtů:</b> ';
$lang['Mig_End'] = '<b>Migrace dokončena !</b>';
$lang['Title_Tab'] = 'Register_FluxBB - Verze: ';

$lang['No_Reg_advise'] = '
  Pro lepší integraci, je vhodné provést následující úpravy ve vašem FluxBB fórum (<b>Varování: Tyto změny ztratíte při aktualizaci aplikace</b>):
<br><br>
  <b>* Ve FluxBB administračním panelu, změňte "Povolit nové registrace" na NE (v: Options - Registration)</b>
<br><br>
  <b>* Upravte soubor</b> : [FluxBBRoot]/lang/English/register.php nahrazením následujících řádek:
  <div class="mod">\'No new regs\'				=>	\'This forum is not accepting new users.\'</div>
  <b>za :</b>
  <div class="info">\'No new regs\'				=>	\'&lt;a href=&quot;http://[YourPiwigoRoot]/register.php&quot; &gt; Go here to register &lt;/a&gt;&lt;br/&gt;&lt;br/&gt;\'</div>
  <br>
  Samozřejmě je nutné toto aplikovat i pro váš jazykový překlad FluxBB forum.
<br><br>
  <b>* Upravte soubor</b> : [FluxBBRoot]/login.php nahrezním řádku č. 69:
  <div class="mod">message($lang_login[\'Wrong user/pass\'].\'&lt;a href=&quot;login.php?action=forget&quot;&gt;</div>
  <b>za :</b>
  <div class="info">message($lang_login[\'Wrong user/pass\'].\'&lt;a href=&quot;../[PiwigoRoot]/password.php&quot;&gt;</div>
<br>
  a na řádku č. 216:
  <div class="mod">&lt;a href=&quot;login.php?action=forget&quot; tabindex=&quot;5&quot;><?php echo $lang_login[\'Forgotten pass\']</a></p></div>
  <b>za :</b>
  <div class="info">&lt;a href=&quot;../[PiwigoRoot]/password.php&quot; tabindex=&quot;5&quot;><?php echo $lang_login[\'Forgotten pass\']</a></p></div>
  <br>';
$lang['About_Reg'] = 'O registraci uživatelů na fórum FluxBB';
$lang['Bridge_UAM'] = 'Povolení registrace uživatelů na fórum skrze UserAdvManager (UAM) plugin: Sputí most mezi dvěma pluginy které vám umožní přistupovat do FluxBB forum dokud registrace uživatele nebude schválena v galerii (funkce musí být aktivní na UAM).';
$lang['Bridge_UAM_true'] = ' --> Aktivovat most Register_FluxBB / UAM';
$lang['Bridge_UAM_false'] = ' --> Deaktivovat most Register_FluxBB / UAM (výchozí)';
$lang['FluxBB_Group'] = 'Určete ID <b>FluxBB skupiny</b> ve které nepotvrzení uživatelé musí být (pro vytvoření předem ve FluxBB). Pro efektivitu, tato skupina by neměla mít práva na fórum (pročtěte konec této stránky pro upřesnění použití této volby).';
$lang['About_Bridge'] = 'O Register_FluxBB / UAM mostu';
$lang['UAM_Bridge_advice'] = 'Plugin UserAdvManager umožňuje směrování nových registrujících se uživatelů na potvrzení jejich registrace před jejich povolením přístupu do galerie. Použití tohoto pluginu s Register_FluxBB může učinit totéž i na napojeném fórum: Registrující se nemohou přispívat dokud snejsou potvrzení jako zaregistrovaní uživatelé také v galerii. <br>
Zde je hlavní procedura pro aplikaci:
<br>
- V administraci vašeho FluxBB fóra, nastavte nejméně 2 skupiny uživatelů (napřklad: "validated" a "no_validated").<br>
- Dejte první skupině ("validated") přístupová oprávnění ktré chcete na vašem forum a nastavte ji jako výchozí skupinu.<br>
- Odstraňte pro druhou skupinu ("no_validated") všechna oprávnění pro vaše fórum (uživtael= této skupiny mohou pouze číst veřejné příspěvky).<br>
- Zjistěte ID druhé skupiny "no_validated".<br>
- Zadejte toto ID v Register_FluxBB pluginu, aktivujte most a uložte nastavení.
<br>
<b class="mod"><u>Důležité poznámky:</u></b>
<br>
Pokud používáte nějakou starší verzi Register_FluxBB, Piwigo účty napojené mezi vaší galerií a FluxBB fórem nebudou ovlivněny aktivací mostu. Pouze nové registrace budou ovlivněny po aktivaci mostu.<b><u>Funkce resynchronizace účtů bude neplatná.</u></b><br>
Jednoduše, pokud jste nikdy nepoužili Register_FluxBB, migrační fáze Piwigo účtů z vaší galerie do FluxBB fóra bude ignorovat stav povolených nebo nebude aplikoána na účty při zahájené migraci.';

$lang['Admin'] = 'Uživatelské jméno Piwigo administrátora. <b style="color: red">Uživatelské jméno  účtu FluxBB administrátora bude to samé!</b>';
$lang['error_config_admin1'] = 'CHYBA : Jméno admina Piwigo je chybné!';
$lang['error_config_admin2'] = 'CHYBA : Jméno účtu admina FluxBB je odlišné od toho v Piwigo! Zkontrolujte konfiguraci vašeho FluxBB a přejmenujte aministrátorský účet na stejné jméno jako v  Piwigo.';
$lang['error_config_guest'] = 'CHYBA : Název pro návštěvnický účet FluxBB (guest) je chybný!';

$lang['Disclaimer'] = '
  *** Pro začátek, následujte tyto 2 kroky ***<br>
  Krok 1 : Nastavte plugin s parametry FluxBB.<br>
  Krok 2 : Převeďte uživatelské účty z Piwigo do FluxBB.<br><br>
  Po těchto 2 hlavních krocích, je plugin funkční a nemusíte se už na tyto stránky vracet.<br><br>
  *** Pro údržbu už aktivních propojení ***<br>
  Údržba : Synchronizace tabulek (v případě rozšíření, aktualizace nebo při neshodě po výmazu uživatele) umožní aktualizace hesel a emailů a ukáže uživatelské vetřelce (Ale nemusíte to použít ).<br><br>
  <div class="warning">VAROVÁNÍ !! Pro bezpečnost, dělejte zálohu vaší databáze, zejména ###_user tabulek před každou akcí která vnich provádí nevratné změny.</div>
<br><br>
  <div class="warning">Dobré znát:<br>
  By default, <b>FluxBB</b> je příklad <u>necitlivosti</u> pro uživatelská jména. To znamená, pokud má uživatel jméno "test" a je ragistrován, jiné názvy uživatelů jako "Test" nebo "TEST" nebo "TEst" (atd. ..) budou odmítnuty.<br><br>
  V základu, <b>Piwigo</b> pracuje obráceně a je v tomto případě <u>citlivé</u> na přístupová jména ("test" bude jiný uživatel než "Test" nebo "TEST", atd. ...).<br>
  Pro zamezení problémů (ikdyž může Piwigo svoje chování snadno změnit - Podívejte se na možnosti nastavení), Register_FluxBB bude odkazovat na 2 aplikace jako FluxBB: Being case <u>insensitive</u> pro přihlášení.<br><br></div>';
?>
