<?php
$lang['Tab_Info'] = 'Instructions';
$lang['Tab_Manage'] = 'Etape 1 : Configuration du plugin';
$lang['Tab_Migration'] = 'Etape 2 : Migration des comptes';
$lang['Tab_Synchro'] = 'Maintenance : Resynchronisation des comptes';

$lang['Title'] = 'Register FluxBB';
$lang['Disclaimer'] = '
  *** Pour débuter, 2 étapes à suivre ***<br>
  1ère étape : Configurer les paramètres du plugin avec les paramètres de FluxBB.<br>
  2ème étape : Migrer les comptes utilisateurs de Piwigo vers FluxBB.<br><br>
  A l\'issue des 2 étapes principales, le plugin sera pleinement fonctionnel et vous n\'aurez plus à revenir sur cette page.<br><br>
  *** Pour maintenir les liaisons déjà actives ***<br>
  Maintenance : Synchroniser les tables (dans le cas où un ajout, une mise à jour ou une suppression d\'utilisateur s\'est mal déroulée) permet de remettre à jour mots de passe et adresses email et voir les utilisateurs intrus (Mais vous ne devriez pas avoir à l\'utiliser).<br><br>
  <div class="warning">Pensez faire une sauvegarde de votre base et spécialement de vos tables ###_USERS avant toutes actions par mesure de sécurité.</div>';

$lang['Config_Title'] = 'Configuration du plugin';
$lang['Config_Disclaimer'] = '
  Vérifiez les paramètres relatifs à votre installation de FluxBB et corrigez les au besoin.<br>
  Modifiez, le cas échéant, le comportement du plugin à votre convenance.';
$lang['Prefix'] = 'Préfixe des tables de FluxBB :';
$lang['Admin'] = 'Nom d\'utilisateur de l\'administrateur de Piwigo.';
$lang['Guest'] = 'Nom d\'utilisateur de l\'invité de FluxBB.';
$lang['User'] = '<div class="warning">Le nom de l\'administrateur de FluxBB doit être identique</div>';
$lang['Details'] = 'Niveau de détails dans les rapports d\'opérations.';
$lang['Details_true'] = ' --&gt; Afficher tous les détails des résultats sur les opérations.';
$lang['Details_false'] = ' --&gt; N\'affiche que l\'essentiel des résultats sur les opérations';
$lang['Del_Pt'] = 'Suppression des topics et posts de l\'utilisateur lorsqu\'il est supprimé.';
$lang['Del_Pt_true'] = ' --&gt; Supprime tout';
$lang['Del_Pt_false'] = ' --&gt; Ne supprime pas les posts et les topics';
$lang['Confirm'] = 'Suppression des confirmations sur les actions d\'administration dans l\'audit.';
$lang['Confirm_true'] = ' --&gt; Supprime les confirmations';
$lang['Confirm_false'] = ' --&gt; Confirmation obligatoire avant action dans l\'audit';
$lang['No_Reg_advise'] = '<b>A propos de l\'enregistrement d\'utilisateur sur le forum FluxBB</b><br><br>
  Pour plus de facilité pour vos utilisateurs, je vous conseille de modifier 2 choses:<br>
  <b>* modifier dans l\'interface d\'administration de FluxBB "Autoriser les nouvelles inscriptions" à NON ( dans : Options - Inscriptions )</b><br><br>
  <b>* modifier le fichier</b> : [RacineDeFluxBB]/lang/French/register.php en remplacant la ligne suivante:
  <div class="info">\'No new regs\'				=>	\'Ce forum n\\\'accepte pas de nouveaux utilisateurs.\'</div>
  <b>par :</b>
  <div class="info">\'No new regs\'				=>	\'&lt;a href=&quot;http://[VotreRacineDePiwigo]/register.php&quot; &gt; Cliquez ici pour vous inscrire &lt;/a&gt;&lt;br/&gt;&lt;br/&gt;\'</div>
  <br>
  Bien sur vous devez aussi faire le même changement pour les autres langues de votre forum FluxBB.<br>';

$lang['save_config'] ='Configuration enregistrée.';

$lang['Audit_Btn'] = 'Audit';
$lang['Sync_Btn'] = 'Synchronisation';
$lang['Sync_Title'] = 'Synchronisation des comptes Piwigo vers FluxBB';
$lang['Sync_Text'] = '
  <div class="warning">Vous avez déjà utilisé le plugin pour lier votre Piwigo (mise à jour du plugin) et/ou votre forum FluxBB n\'est pas vide d\'utilisateurs !!!</div><br>
  <br> -> Ceci signifie que votre forum posséde des utilisateurs.<br><br>
  - La synchronisation détectera les données présentes en comparant les noms des utilisateurs, leur mot de passe (crypté) et leur adresse email dans les deux tables [PrefixPWG]_users et [PrefixFluxBB]_users.<br>
  - Puis mettra à jour cette table de correspondance ainsi que le mot de passe et l\'adresse email de chaque compte depuis Piwigo vers FluxBB sauf Piwigo Guest et FluxBB Anonymous.<br>
  - Enfin indiquera en erreur les comptes orphelins qui n\'existent que dans l\'une des 2 tables ###_USERS.<br>
  <br>
  A l\'issue de l\'opération lancez un AUDIT et veuillez vérifier la présence de doublons éventuels dans les utilisateurs de FluxBB, si c\'est le cas, il faut supprimer les plus anciens (tri des utilisateurs FluxBB selon leur date d\'incription).<br>';
$lang['Sync_Check_Dup'] = '<b>Analyse des tables des comptes utilisateurs de Piwigo et FluxBB pour contrôler les doublons</b>';
$lang['Advise_Check_Dup'] = '<b>IMPOSSIBLE de continuer la synchronisation si vous avez des doublons dans les comptes utilisateurs de Piwigo ou FluxBB.</b><br><br>';
$lang['Sync_Link_Break'] = '<b>Analyse des liens réparables entre les comptes Piwigo et FluxBB</b>';
$lang['Sync_Link_Bad'] = '<b>Analyse des mauvais liens entre les comptes Piwigo et FluxBB</b>';
$lang['Sync_DataUser'] = '<b>Analyse des mots de passe et des adresses emails entre les comptes Piwigo et FluxBB</b>';
$lang['Sync_PWG2FluxBB'] = '<b>Analyse des comptes existants dans Piwigo et manquants dans FluxBB</b>';
$lang['Sync_FluxBB2PWG'] = '<b>Analyse des comptes existants dans FluxBB et manquants dans Piwigo</b>';
$lang['Sync_OK'] = 'Synchronisation OK<br><br>';

$lang['Audit_PWG_Dup'] = '<b>Audit de la table des comptes de Piwigo</b>';
$lang['Error_PWG_Dup'] = '<b>Erreur dans la table des comptes Piwigo, il y a des doublons :</b> ';
$lang['Advise_PWG_Dup'] = '<b>ATTENTION ! Vous devez faire ces corrections dans Piwigo avant de continuer<br>utilisez le gestionnaires d\'utilisateurs de Piwigo pour régler le problème.</b>';

$lang['Audit_FluxBB_Dup'] = '<b>Audit de la table des comptes FluxBB</b>';
$lang['Error_FluxBB_Dup'] = '<b>Erreur dans la table des comptes FluxBB, il y a des doublons :</b> ';
$lang['Advise_FluxBB_Dup'] = '<b>ATTENTION Vous devez faire ces corrections dans FluxBB avant de continuer<br>utilisez les icones pour supprimer les utilisateurs de FluxBB et régler le problème.</b>';

$lang['Audit_Link_Break'] = '<b>Audit des liens réparables entre les comptes Piwigo et FluxBB</b>';
$lang['Error_Link_Break'] = '<b>Lien brisé entre les comptes Piwigo et FluxBB :</b> ';
$lang['New_Link'] = 'Liaison du compte : ';

$lang['Audit_Link_Bad'] = '<b>Audit des mauvais liens entre les comptes Piwigo et FluxBB</b>';
$lang['Error_Link_Del'] = '<b>Erreur dans la table de lien entre les 2 utilisateurs :</b> ';
$lang['Link_Del'] = 'Suppression du lien : ';
$lang['Error_Link_Dead'] = '<b>Erreur dans la table de lien, des liens morts existent :</b> ';
$lang['Link_Dead'] = 'Suppression du liens morts ';
$lang['Error_Link_Dup'] = '<b>Erreur dans la table de lien, il y a des doublons :</b> ';
$lang['Link_Dup'] = 'Suppression des liens dupliqués ';

$lang['Audit_Synchro'] = '<b>Audit de la synchronisation des mots de passe et des adresses emails entre les comptes Piwigo et FluxBB</b>';
$lang['Error_Synchro'] = '<b>Mauvaise synchronisation du compte :</b> ';
$lang['Error_Synchro_Pswd'] = 'pour le mot de passe';
$lang['Error_Synchro_Mail'] = 'pour l\'adresse email';
$lang['Audit_Synchro_OK'] = ' <b>: Synchro des données OK</b>';
$lang['Sync_User'] = 'Synchronisation du compte : ';

$lang['Audit_PWG2FluxBB'] = '<b>Audit des comptes existants dans Piwigo et manquants dans FluxBB</b>';
$lang['Error_PWG2FluxBB'] = '<b>Le compte Piwigo n\'existe pas dans FluxBB :</b> ';
$lang['Add_User'] = 'Ajout dans FluxBB du compte : ';

$lang['Audit_FluxBB2PWG'] = '<b>Audit des comptes existants dans FluxBB et manquants dans Piwigo</b>';
$lang['Error_FluxBB2PWG'] = '<b>Le compte FluxBB n\'existe pas dans Piwigo :</b> ';
$lang['Del_User'] = 'Suppression de FluxBB du compte : ';

$lang['Audit_OK'] = 'Audit OK<br><br>';

$lang['Mig_Btn'] = 'Migration';
$lang['Mig_Title'] = 'Migration des comptes de Piwigo vers FluxBB';
$lang['Mig_Text'] = '
  <div class="warning"> A N\'UTILISER QUE SI vous n\'avez jamais utilisé le plugin pour lier Piwigo à FluxBB <u>ET SI</u> votre forum est vide d\'utilisateurs !!!</div><br>
  		--> Dans ce cas, votre table [PrefixFluxBB]_users de FluxBB doit être vide de tout compte sauf les 2 comptes d\'invité et d\'administrateur.<br><br>
  - La migration va d\'abord supprimer les liens des comptes entre Piwigo et FluxBB.<br>
  - Puis <b>SUPPRIMERA TOUS LES COMPTES FluxBB</b> sauf les 2 comptes d\'invité et d\'administrateur.<br>
  <br>
  <div class="warning">ATTENTION SI VOUS AVEZ DES COMPTES PARTICULIERS DANS FluxBB == NE SURTOUT PAS UTILISER CETTE FONCTION !!!</div><br>
  - Enfin la migration va créer tout les comptes de Piwigo dans FluxBB sauf l\'invité.<br>
  <br>
  Si des erreurs se produisent pendant l\'opération, corrigez la cause du problème et recommencez l\'opération de migration (à ce moment là seulement vous pouvez renouveller la migration).<br>';
$lang['Mig_Disclaimer'] = '<div class="warning"> NE JAMAIS EFFECTUER DE MIGRATION POUR METTRE A JOUR !!!</div>';
$lang['Mig_Start'] = '<b>Migration des comptes Piwigo vers FluxBB</b>';
$lang['Mig_Del_Link'] = '<b>Suppression des liens entre les comptes Piwigo et FluxBB</b>';
$lang['Mig_Del_AllUsers'] = '<b>Suppression des comptes FluxBB</b>';
$lang['Mig_Del_User'] = '<b>Suppression du compte :</b> ';
$lang['Mig_Add_AllUsers'] = '<b>Transfert des comptes Piwigo</b>';
$lang['Mig_Add_User'] = '<b>Transfert du compte :</b> ';
$lang['Mig_End'] = '<b>Migration finie !</b>';
$lang['Title_Tab'] = 'Register_FluxBB - Version: ';
?>