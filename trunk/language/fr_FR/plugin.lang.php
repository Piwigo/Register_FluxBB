<?php
$lang['Tab_Info'] = 'Instructions';
$lang['Tab_Manage'] = 'Etape 1 : Configuration du plugin';
$lang['Tab_Migration'] = 'Etape 2 : Migration des comptes';
$lang['Tab_Synchro'] = 'Maintenance : Resynchronisation des comptes';

$lang['Register_FluxBB_Title'] = 'Register FluxBB';
$lang['Register_FluxBB_Disclaimer'] = '
  *** Pour débuter, 2 étapes à suivre ***<br/>
  1ère étape : Configurer les paramètres du plugin avec les paramètres de FluxBB.<br/>
  2ème étape : Migrer les comptes utilisateurs de Piwigo vers FluxBB.<br/><br/>
  A l\'issue des 2 étapes principales, le plugin sera pleinement fonctionnel et vous n\'aurez plus à revenir sur cette page.<br/><br/>
  *** Pour maintenir les liaisons déjà actives ***<br/>
  Maintenance : Synchroniser les tables (dans le cas où un ajout, une mise à jour ou une suppression d\'utilisateur s\'est mal déroulée) permet de remettre à jour mots de passe et adresses email et voir les utilisateurs intrus (Mais vous ne devriez pas avoir à l\'utiliser).<br/><br/>
  <b><blink>PENSEZ A ... faire une sauvegarde de votre base et spécialement de vos tables ###_USERS avant toutes actions par mesure de sécurité.</blink></b>';

$lang['Register_FluxBB_Config_Title'] = 'Configuration du plugin';
$lang['Register_FluxBB_Config_Disclaimer'] = '
  Vérifiez les paramètres relatifs à votre installation de FluxBB et corrigez les au besoin.<br/>
  Modifiez, le cas échéant, le comportement du plugin à votre convenance.';
$lang['Register_FluxBB_Prefix'] = 'Préfixe des tables de FluxBB :';
$lang['Register_FluxBB_Admin'] = 'Nom d\'utilisateur de l\'administrateur de Piwigo.';
$lang['Register_FluxBB_Guest'] = 'Nom d\'utilisateur de l\'invité de FluxBB.';
$lang['Register_FluxBB_User'] = '<b><u>Le nom de l\'administrateur de FluxBB doit être identique</u></b>';
$lang['Register_FluxBB_Details'] = 'Niveau de détails dans les rapports d\'opérations.';
$lang['Register_FluxBB_Details_true'] = ' --&gt; Afficher tous les détails des résultats sur les opérations.';
$lang['Register_FluxBB_Details_false'] = ' --&gt; N\'affiche que l\'essentiel des résultats sur les opérations';
$lang['Register_FluxBB_Del_Pt'] = 'Suppression des topics et posts de l\'utilisateur lorsqu\'il est supprimé.';
$lang['Register_FluxBB_Del_Pt_true'] = ' --&gt; Supprime tout';
$lang['Register_FluxBB_Del_Pt_false'] = ' --&gt; Ne supprime pas les posts et les topics';
$lang['Register_FluxBB_Confirm'] = 'Suppression des confirmations sur les actions d\'administration dans l\'audit.';
$lang['Register_FluxBB_Confirm_true'] = ' --&gt; Supprime les confirmations';
$lang['Register_FluxBB_Confirm_false'] = ' --&gt; Confirmation obligatoire avant action dans l\'audit';
$lang['Register_FluxBB_No_Reg_advise'] = '<b>A propos de l\'enregistrement d\'utilisateur sur le forum FluxBB</b><br/><br/>
  Pour plus de facilité pour vos utilisateurs, je vous conseille de modifier 2 choses :<br/>
  * modifier dans l\'interface d\'administration de FluxBB "Autoriser les nouvelles inscriptions" à NON ( dans : Options - Inscriptions )<br/><br/>
  * modifier le fichier</b> : [RacineDeFluxBB]/lang/French/register.php<br/>
  <b>en remplacant la ligne suivante :</b><br/><br/>
  \'No new regs\'				=>	\'Ce forum n\\\'accepte pas de nouveaux utilisateurs.\',<br/><br/>
  <b>par :</b><br/><br/>
  \'No new regs\'				=>	\'&lt;a href=&quot;http://[VotreRacineDePiwigo]/register.php&quot; &gt; Cliquez ici pour vous inscrire &lt;/a&gt;&lt;br/&gt;&lt;br/&gt;\',<br/>
  <br/>
  Bien sur vous devez aussi faire le même changement pour les autres langues de votre forum FluxBB.<br/>';

$lang['Register_FluxBB_save_config'] ='Configuration enregistrée.';

$lang['Register_FluxBB_Audit_Btn'] = 'Audit';
$lang['Register_FluxBB_Sync_Btn'] = 'Synchronisation';
$lang['Register_FluxBB_Sync_Title'] = 'Synchronisation des comptes Piwigo vers FluxBB';
$lang['Register_FluxBB_Sync_Text'] = '
  <b><u>Vous avez déjà utilisé le plugin pour lier votre Piwigo (mise à jour du plugin) et/ou votre forum FluxBB n\'est pas vide d\'utilisateurs !!!</u></b><br/>
  <br/> -> Ceci signifie que votre forum posséde des utilisateurs.<br/><br/>
  - La synchronisation détectera les données présentes en comparant les noms des utilisateurs, leur mot de passe (crypté) et leur adresse email dans les deux tables [PrefixPWG]_users et [PrefixFluxBB]_users.<br/>
  - Puis mettra à jour cette table de correspondance ainsi que le mot de passe et l\'adresse email de chaque compte depuis Piwigo vers FluxBB sauf Piwigo Guest et FluxBB Anonymous.<br/>
  - Enfin indiquera en erreur les comptes orphelins qui n\'existent que dans l\'une des 2 tables ###_USERS.<br/>
  <br/>
  A l\'issue de l\'opération lancez un AUDIT et veuillez vérifier la présence de doublons éventuels dans les utilisateurs de FluxBB, si c\'est le cas, il faut supprimer les plus anciens (tri des utilisateurs FluxBB selon leur date d\'incription).<br/>';
$lang['Register_FluxBB_Sync_Check_Dup'] = '<b>Analyse des tables des comptes utilisateurs de Piwigo et FluxBB pour contrôler les doublons</b>';
$lang['Register_FluxBB_Advise_Check_Dup'] = '<b>IMPOSSIBLE de continuer la synchronisation si vous avez des doublons dans les comptes utilisateurs de Piwigo ou FluxBB.</b><br/><br/>';
$lang['Register_FluxBB_Sync_Link_Break'] = '<b>Analyse des liens réparables entre les comptes Piwigo et FluxBB</b>';
$lang['Register_FluxBB_Sync_Link_Bad'] = '<b>Analyse des mauvais liens entre les comptes Piwigo et FluxBB</b>';
$lang['Register_FluxBB_Sync_DataUser'] = '<b>Analyse des mots de passe et des adresses emails entre les comptes Piwigo et FluxBB</b>';
$lang['Register_FluxBB_Sync_PWG2FluxBB'] = '<b>Analyse des comptes existants dans Piwigo et manquants dans FluxBB</b>';
$lang['Register_FluxBB_Sync_FluxBB2PWG'] = '<b>Analyse des comptes existants dans FluxBB et manquants dans Piwigo</b>';
$lang['Register_FluxBB_Sync_OK'] = 'Synchronisation OK<br/><br/>';

$lang['Register_FluxBB_Audit_PWG_Dup'] = '<b>Audit de la table des comptes de Piwigo</b>';
$lang['Register_FluxBB_Error_PWG_Dup'] = '<b>Erreur dans la table des comptes Piwigo, il y a des doublons :</b> ';
$lang['Register_FluxBB_Advise_PWG_Dup'] = '<b>ATTENTION ! Vous devez faire ces corrections dans Piwigo avant de continuer<br>utilisez le gestionnaires d\'utilisateurs de Piwigo pour régler le problème.</b>';

$lang['Register_FluxBB_Audit_FluxBB_Dup'] = '<b>Audit de la table des comptes FluxBB</b>';
$lang['Register_FluxBB_Error_FluxBB_Dup'] = '<b>Erreur dans la table des comptes FluxBB, il y a des doublons :</b> ';
$lang['Register_FluxBB_Advise_FluxBB_Dup'] = '<b>ATTENTION Vous devez faire ces corrections dans FluxBB avant de continuer<br>utilisez les icones pour supprimer les utilisateurs de FluxBB et régler le problème.</b>';

$lang['Register_FluxBB_Audit_Link_Break'] = '<b>Audit des liens réparables entre les comptes Piwigo et FluxBB</b>';
$lang['Register_FluxBB_Error_Link_Break'] = '<b>Lien brisé entre les comptes Piwigo et FluxBB :</b> ';
$lang['Register_FluxBB_New_Link'] = 'Liaison du compte : ';

$lang['Register_FluxBB_Audit_Link_Bad'] = '<b>Audit des mauvais liens entre les comptes Piwigo et FluxBB</b>';
$lang['Register_FluxBB_Error_Link_Del'] = '<b>Erreur dans la table de lien entre les 2 utilisateurs :</b> ';
$lang['Register_FluxBB_Link_Del'] = 'Suppression du lien : ';
$lang['Register_FluxBB_Error_Link_Dead'] = '<b>Erreur dans la table de lien, des liens morts existent :</b> ';
$lang['Register_FluxBB_Link_Dead'] = 'Suppression du liens morts ';
$lang['Register_FluxBB_Error_Link_Dup'] = '<b>Erreur dans la table de lien, il y a des doublons :</b> ';
$lang['Register_FluxBB_Link_Dup'] = 'Suppression des liens dupliqués ';

$lang['Register_FluxBB_Audit_Synchro'] = '<b>Audit de la synchronisation des mots de passe et des adresses emails entre les comptes Piwigo et FluxBB</b>';
$lang['Register_FluxBB_Error_Synchro'] = '<b>Mauvaise synchronisation du compte :</b> ';
$lang['Register_FluxBB_Error_Synchro_Pswd'] = 'pour le mot de passe';
$lang['Register_FluxBB_Error_Synchro_Mail'] = 'pour l\'adresse email';
$lang['Register_FluxBB_Audit_Synchro_OK'] = ' <b>: Synchro des données OK</b>';
$lang['Register_FluxBB_Sync_User'] = 'Synchronisation du compte : ';

$lang['Register_FluxBB_Audit_PWG2FluxBB'] = '<b>Audit des comptes existants dans Piwigo et manquants dans FluxBB</b>';
$lang['Register_FluxBB_Error_PWG2FluxBB'] = '<b>Le compte Piwigo n\'existe pas dans FluxBB :</b> ';
$lang['Register_FluxBB_Add_User'] = 'Ajout dans FluxBB du compte : ';

$lang['Register_FluxBB_Audit_FluxBB2PWG'] = '<b>Audit des comptes existants dans FluxBB et manquants dans Piwigo</b>';
$lang['Register_FluxBB_Error_FluxBB2PWG'] = '<b>Le compte FluxBB n\'existe pas dans Piwigo :</b> ';
$lang['Register_FluxBB_Del_User'] = 'Suppression de FluxBB du compte : ';

$lang['Register_FluxBB_Audit_OK'] = 'Audit OK<br/><br/>';

$lang['Register_FluxBB_Mig_Btn'] = 'Migration';
$lang['Register_FluxBB_Mig_Title'] = 'Migration des comptes de Piwigo vers FluxBB';
$lang['Register_FluxBB_Mig_Text'] = '
  <b><u>!!! A N\'UTILISER QUE SI</u> vous n\'avez jamais utilisé le plugin pour lier Piwigo à FluxBB <u>ET SI</u> votre forum est vide d\'utilisateurs !!!</b><br/><br/>
  		--> Dans ce cas, votre table [PrefixFluxBB]_users de FluxBB doit être vide de tout compte sauf les 2 comptes d\'invité et d\'administrateur.<br/><br/>
  - La migration va d\'abord supprimer les liens des comptes entre Piwigo et FluxBB.<br/>
  - Puis <b>SUPPRIMERA TOUS LES COMPTES FluxBB</b> sauf les 2 comptes d\'invité et d\'administrateur.<br/>
  <br/>
  <center><b>!!! ATTENTION SI VOUS AVEZ DES COMPTES PARTICULIERS DANS FluxBB == NE SURTOUT PAS UTILISER CETTE FONCTION !!!</b></center><br/>
  - Enfin la migration va créer tout les comptes de Piwigo dans FluxBB sauf l\'invité.<br/>
  <br/>
  Si des erreurs se produisent pendant l\'opération, corrigez la cause du problème et recommencez l\'opération de migration (à ce moment là seulement vous pouvez renouveller la migration).<br/>';
$lang['Register_FluxBB_Mig_Disclaimer'] = '<b><blink>!!! NE JAMAIS EFFECTUER DE MIGRATION POUR METTRE A JOUR !!!</blink></b>';
$lang['Register_FluxBB_Mig_Start'] = '<b>Migration des comptes Piwigo vers FluxBB</b>';
$lang['Register_FluxBB_Mig_Del_Link'] = '<b>Suppression des liens entre les comptes Piwigo et FluxBB</b>';
$lang['Register_FluxBB_Mig_Del_AllUsers'] = '<b>Suppression des comptes FluxBB</b>';
$lang['Register_FluxBB_Mig_Del_User'] = '<b>Suppression du compte :</b> ';
$lang['Register_FluxBB_Mig_Add_AllUsers'] = '<b>Transfert des comptes Piwigo</b>';
$lang['Register_FluxBB_Mig_Add_User'] = '<b>Transfert du compte :</b> ';
$lang['Register_FluxBB_Mig_End'] = '<b>Migration finie !</b>';
?>