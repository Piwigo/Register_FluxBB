<?php
$lang['Title'] = 'Register_FluxBB - Version: ';
$lang['save_config'] ='Configuration enregistrée.';

$lang['Instruction_Title'] = 'Instructions (important à lire en premier !)';
$lang['Instruction_Title_d'] = 'Notice d\'utilisation et informations importantes';
$lang['Disclaimer'] = '
  <div class="warning">Important : FluxBB et Piwigo doivent être installés sur la même base de données ! Pensez faire une sauvegarde de votre base et spécialement de vos tables ###_USERS avant toute action par mesure de sécurité.</div><br/><br/>
  *** Pour débuter, 2 étapes à suivre ***<br/>
  1ère étape - Section Configuration : Configurez les paramètres du plugin en relation avec les paramètres de FluxBB<br/>
  2ème étape - Section Synchronisation :<br/>
  - Si votre forum FluxBB <b>est vide d\'utilisateurs</b>, synchronisez en masse les comptes utilisateurs de Piwigo vers FluxBB<br/>
  - Si votre forum FluxBB <b>contient des utilisateurs</b>, lancez un audit. L\'audit effectue des tests de cohérences entre les données d\'utilisateurs de Piwigo et de FluxBB. En fonction des résultats, des actions de corrections au cas par cas seront proposées<br/><br/>

  <div class="warning">A ce jour, il n\'est pas encore possible de synchroniser des utilisateurs existants sur un forum FluxBB vers une galerie Piwigo. C\'est pourquoi l\'action proposée par l\'audit est la suppression des comptes FluxBB. Vous pouvez laisser ces comptes non synchronisés en l\'état (il ne pourront se connecter que sur le forum) dans l\'attente d\'une évolution prochaine du plugin qui permettra des les synchroniser.</div>
<br/><br/>

  A noter : Les mots de passe de comptes synchronisés manuellement (par l\'audit ou par la synchro globale) de Piwigo vers FluxBB ne sont pas récupérés. Chaque utilisateur concerné devra modifier son mot de passe lors de sa prochaine connexion à la galerie (automatiquement redirigé vers sa page de profil) pour que la synchro soit effective et qu\'il puisse se connecter au forum.
<br/><br/>

  <div class="warning">A savoir :<br/>
  Par défaut, <b>FluxBB</b> est <u>insensible</u> à la casse sur les noms d\'utilisateurs. C\'est à dire que si un utilisateur "test" est déjà inscrit, d\'autres inscriptions avec "Test" ou "TEST" ou "TEst" (etc...) seront refusées.<br/><br/>
  Par défaut, <b>Piwigo</b> fonctionne de manière inverse et est donc <u>sensible</u> à la casse sur les logins ("test" sera un utilisateur différent de "Test" etc...).<br/><br/>
  Afin d\'éviter des erreurs (même si le comportement de Piwigo peut-être facilement changé - Voir les options de configuration), Register_FluxBB fera le lien entre les deux applications à la manière de FluxBB : En étant <u>insensible</u> à la casse pour les logins.<br/><br/></div>';


$lang['About_Reg_Title'] = 'A propos de l\'enregistrement d\'utilisateur sur le forum FluxBB';
$lang['About_Reg_Title_d'] = 'Instructions importantes pour une meilleure intégration';
$lang['No_Reg_advise'] = '
  Pour une meilleur intégration, il est conseillé d\'apporter les modifications suivantes à votre forum FluxBB (<b>Attention! Ces modifications disparaitront en cas de mise à jour du script du forum</b>):
<br/><br/>
  <b>* Modifiez dans l\'interface d\'administration de FluxBB l\'option "Autoriser les nouvelles inscriptions" à NON ( dans : Options - Inscriptions )</b>
<br/><br/>
  <b>* Modifiez le fichier</b> : [RacineDeFluxBB]/lang/French/register.php en remplacant la ligne suivante:
  <div class="mod">\'No new regs\'				=>	\'Ce forum n\\\'accepte pas de nouveaux utilisateurs.\'</div>
  <b>par :</b>
  <div class="info">\'No new regs\'				=>	\'&lt;a href=&quot;http://[VotreRacineDePiwigo]/register.php&quot; &gt; Cliquez ici pour vous inscrire &lt;/a&gt;&lt;br/&gt;&lt;br/&gt;\'</div>
  <br/>
  Et reportez cette modification pour toutes les langues gérées sur votre forum.
<br/><br/>
  <b>* Modifiez le fichier</b> : [RacineDeFluxBB]/login.php en remplacant vers la ligne 64 :
  <div class="mod">message($lang_login[\'Wrong user/pass\'].\'&lt;a href=&quot;login.php?action=forget&quot;&gt;</div>
  <b>par :</b>
  <div class="info">message($lang_login[\'Wrong user/pass\'].\'&lt;a href=&quot;../[VotreRacineDePiwigo]/password.php&quot;&gt;</div>
<br/>
  et vers la ligne 295:
  <div class="mod">&lt;a href=&quot;login.php?action=forget&quot; tabindex=&quot;5&quot;&gt;&lt;?php echo $lang_login[\'Forgotten pass\']&lt;/a&gt;</div>
  <b>par :</b>
  <div class="info">&lt;a href=&quot;../[VotreRacineDePiwigo]/password.php&quot; tabindex=&quot;5&quot;&gt;&lt;?php echo $lang_login[\'Forgotten pass\'] ?&gt;&lt;/a&gt;</div>
  <br/>';


$lang['About_Bridge_Title'] = 'A propos du pont Register_FluxBB / UAM';
$lang['About_Bridge_Title_d'] = 'Instructions au sujet du pont entre les plugins Register_FluxBB et UserAdvManager';
$lang['UAM_Bridge_advice'] = 'Le plugin UserAdvManager permet de forcer les nouveaux inscrits à valider leur inscription avant de leur permettre d\'accéder à la totalité de la galerie. L\'utilisation conjointe de ce plugin avec Register_FluxBB permet de faire de même sur le forum lié: Ils ne pourront pas poster tant qu\'ils n\'auront pas validé leur inscription à la galerie.<br/>
Voici la procédure générale à appliquer:
<br/><br/>
- Dans la partie d\'administration de votre forum FluxBB, établissez au minimum 2 groupes d\'utilisateurs (par exemple: "validés" et "non_validés").<br/>
- Attribuez au premier groupe ("validés") les permissions d\'accès souhaitées sur votre forum et définissez le comme groupe par défaut.<br/>
- Retirez au second groupe ("non_validés") toutes les permissions sur votre forum (les membres de ce groupe ne pourront que lire les posts publics).<br/>
- Repérez l\'ID du second groupe "non_validés".<br/>
- Notez l\'ID dans le plugin Register_FluxBB, activez le pont et sauvegardez les paramètres.
<br/><br/>
<b class="mod"><u>Notes importantes:</u></b>
<br/><br/>
Si vous utilisiez déjà Register_FluxBB dans une version antérieur, les comptes liés entre votre galerie Piwigo et votre forum FluxBB ne seront pas impactés par les effets du pont. Seuls les nouveaux inscrits après l\'activation du pont y seront soumis.<b><u>La fonction de resynchronisation des comptes sera sans effet.</u></b><br/><br/>
De même, si vous n\'avez jamais utilisé Register_FluxBB, la phase de migration des comptes de votre galerie Piwigo vers votre forum FluxBB ne tiendra pas compte de l\'état validé ou non de vos inscrits au moment du lancement de la phase de migration.';


$lang['Config_Title'] = 'Configuration du plugin';
$lang['Config_Title_d'] = 'Configuration du plugin';
$lang['Config_Title1'] = 'Paramétrages du pont entre FluxBB et Piwigo';
$lang['Config_Title2'] = 'Paramétrages avancés du plugin';

$lang['Config_Disclaimer'] = '
  Vérifiez les paramètres relatifs à votre installation de FluxBB et corrigez les au besoin.<br/>
  Modifiez, le cas échéant, le comportement du plugin à votre convenance.';

$lang['Details'] = 'Niveau de détails à afficher dans les rapports d\'opérations (synchronisation et migration)';
$lang['Details_true'] = ' --&gt; Niveau maximum - Affiche tous les détails des résultats sur les opérations de synchronisation et de migration';
$lang['Details_false'] = ' --&gt; Niveau minimum - N\'affiche que l\'essentiel des résultats sur les opérations de synchronisation et de migration';

$lang['Confirm'] = 'Confirmations des actions de correction dans l\'audit';
$lang['Confirm_true'] = ' --&gt; Ne pas demander de confirmations';
$lang['Confirm_false'] = ' --&gt; Confirmation obligatoire avant toute action dans l\'audit';

$lang['Prefix'] = 'Préfixe des tables de FluxBB :';

$lang['Admin'] = 'Nom d\'utilisateur du compte "Webmaster" de Piwigo. <b style="color: red">Le nom du compte "Administrateur" de FluxBB doit être identique !</b>';
$lang['error_config_admin1'] = 'ERREUR : Le nom du compte "Webmaster" de Piwigo est incorrect !';
$lang['error_config_admin2'] = 'ERREUR : Le nom du compte "Administrateur" de FluxBB est différent du compte "Webmaster" de Piwigo ! Vérifiez la configuration de votre forum FluxBB et nommez le compte "Administrateur" de la même manière que celui de Piwigo';

$lang['Guest'] = 'Nom d\'utilisateur du compte "invité" de FluxBB';
$lang['error_config_guest'] = 'ERREUR : Le nom du compte visiteur ("Guest") de FluxBB est incorrect !';

$lang['Del_Pt'] = 'Suppression des sujets et messages de l\'utilisateur sur le forum lorsqu\'il est supprimé de Piwigo';
$lang['Del_Pt_true'] = ' --&gt; Supprimer tout';
$lang['Del_Pt_false'] = ' --&gt; Ne pas supprimer les sujets et messages du forum';

$lang['Bridge_UAM'] = 'Validation d\'accès au forum via le plugin UserAdvManager (UAM): Activez ici le pont entre les deux plugins qui vous permettra d\'interdire l\'accès à votre forum FluxBB tant que l\'utilisateur n\'a pas validé son inscription à la galerie (la fonction correspondante doit être active sur UAM)';
$lang['Bridge_UAM_true'] = ' --> Pont Register_FluxBB / UAM activé';
$lang['Bridge_UAM_false'] = ' --> Pont Register_FluxBB / UAM désactivé (par défaut)';

$lang['FluxBB_Group'] = 'Précisez ici l\'ID (format : nombre entier) du <b>groupe d\'utilisateurs FluxBB</b> dans lequel les utilisateurs non validés doivent se trouver lorsqu\'ils n\'ont pas validé leur inscription à la galerie. Ce groupe d\'utilisateurs est à créer au préalable dans FluxBB. Pour être efficace, ce groupe ne doit avoir aucune permission sur le forum (voir dans la section "Instructions" pour les informations détaillées)';


$lang['Sync_Title'] = 'Synchronisation des comptes Piwigo vers FluxBB';
$lang['Sync_Title_d'] = 'A utiliser pour resynchroniser les comptes';
$lang['Sync_Text'] = '
  <div class="warning">La synchronisation est une action de masse qui videra votre forum de ses utilisateurs s\'il y en a ! Lancez un audit pour gérer au cas par cas.</div><br/><br/>
  
  Rappels :<br/>
  Les mots de passe de comptes synchronisés manuellement (par l\'audit ou par la synchro globale) de Piwigo vers FluxBB ne sont pas récupérés. Chaque utilisateur concerné devra modifier son mot de passe lors de sa prochaine connexion à la galerie (automatiquement redirigé vers sa page de profil) pour que la synchro soit effective et qu\'il puisse se connecter au forum.<br/><br/>
  A ce jour, il n\'est pas encore possible de synchroniser des utilisateurs existants sur un forum FluxBB vers une galerie Piwigo. C\'est pourquoi l\'action proposée par l\'audit est la suppression des comptes FluxBB. Vous pouvez laisser ces comptes non synchronisés en l\'état (il ne pourront se connecter que sur le forum) dans l\'attente d\'une évolution prochaine du plugin qui permettra des les synchroniser.<br/><br/>';
$lang['Sync_Check_Dup'] = '<b>Analyse des tables d\'utilisateurs pour contrôle les doublons</b>';
$lang['Advise_Check_Dup'] = '<b>IMPOSSIBLE de continuer la synchronisation si vous avez des doublons dans les comptes utilisateurs de Piwigo ou FluxBB. Veuillez corriger puis réessayez.</b><br/><br/>';
$lang['Sync_Link_Break'] = '<b>Analyse des liens réparables entre les comptes Piwigo et FluxBB</b>';
$lang['Sync_Link_Bad'] = '<b>Analyse des mauvais liens entre les comptes Piwigo et FluxBB</b>';
$lang['Sync_DataUser'] = '<b>Analyse des mots de passe et des adresses emails entre les comptes Piwigo et FluxBB</b>';
$lang['Sync_PWG2FluxBB'] = '<b>Analyse des comptes existants dans Piwigo mais manquants dans FluxBB</b>';
$lang['Sync_FluxBB2PWG'] = '<b>Analyse des comptes existants dans FluxBB mais manquants dans Piwigo</b>';
$lang['Sync_OK'] = 'Synchronisation OK<br/><br/>';
$lang['Sync_Btn'] = 'Synchronisation';


$lang['Audit_Btn'] = 'Audit';
$lang['Audit_PWG_Dup'] = '<b>Audit de la table des comptes de Piwigo</b>';
$lang['Error_PWG_Dup'] = '<b>Erreur dans la table des comptes Piwigo, il y a des doublons :</b> ';
$lang['Advise_PWG_Dup'] = '<b>ATTENTION ! Vous devez faire ces corrections dans Piwigo avant de continuer<br/>Utilisez le gestionnaire d\'utilisateurs de Piwigo pour régler le problème.</b>';
$lang['Audit_FluxBB_Dup'] = '<b>Audit de la table des comptes FluxBB</b>';
$lang['Error_FluxBB_Dup'] = '<b>Erreur dans la table des comptes FluxBB, il y a des doublons :</b> ';
$lang['Advise_FluxBB_Dup'] = '<b>ATTENTION Vous devez faire ces corrections dans FluxBB avant de continuer<br/>utilisez les icones pour supprimer les utilisateurs de FluxBB et régler le problème.</b>';
$lang['Audit_Link_Break'] = '<b>Audit des liens réparables entre les comptes Piwigo et FluxBB</b>';
$lang['Error_Link_Break'] = '<b>Lien brisé entre les comptes Piwigo et FluxBB :</b> ';
$lang['New_Link'] = 'Liaison du compte : ';
$lang['Audit_Link_Bad'] = '<b>Audit des mauvais liens entre les comptes Piwigo et FluxBB</b>';
$lang['Error_Link_Del'] = '<b>Erreur dans la table de liens entre les 2 utilisateurs :</b> ';
$lang['Link_Del'] = 'Suppression du lien : ';
$lang['Error_Link_Dead'] = '<b>Erreur dans la table de liens, des liens morts existent :</b> ';
$lang['Link_Dead'] = 'Suppression du liens morts ';
$lang['Error_Link_Dup'] = '<b>Erreur dans la table de liens, il y a des doublons :</b> ';
$lang['Link_Dup'] = 'Suppression des liens dupliqués ';
$lang['Audit_Synchro'] = '<b>Audit de la synchronisation des mots de passe et des adresses emails entre les comptes Piwigo et FluxBB</b>';
$lang['Error_Synchro'] = '<b>Mauvaise synchronisation du compte :</b> ';
$lang['Error_Synchro_Pswd'] = 'Cet utilisateur devra modifier son mot de passe lors de sa prochaine connexion à la galerie';
$lang['Error_Synchro_Mail'] = 'pour l\'adresse email';
$lang['Audit_Synchro_OK'] = ' <b>: Synchro des données OK</b>';
$lang['Sync_User'] = 'Synchronisation du compte : ';
$lang['Audit_PWG2FluxBB'] = '<b>Audit des comptes existants dans Piwigo et manquants dans FluxBB</b>';
$lang['Error_PWG2FluxBB'] = '<b>Le compte Piwigo n\'existe pas dans FluxBB :</b> ';
$lang['Add_User'] = 'Ajout dans FluxBB du compte : ';
$lang['Audit_FluxBB2PWG'] = '<b>Audit des comptes existants dans FluxBB et manquants dans Piwigo</b>';
$lang['Error_FluxBB2PWG'] = '<b>Le compte FluxBB n\'existe pas dans Piwigo :</b> ';
$lang['Del_User'] = 'Suppression de FluxBB du compte : ';
$lang['Audit_OK'] = 'Audit OK<br/><br/>';

$lang['RegFluxBB_Password_Reset_Msg'] = 'Veuillez modifier votre mot de passe pour synchronisation avec l\'accès au forum. Vous pourrez alors vous connecter au forum avec le même compte que pour la galerie.';

$lang['Add_User2pwg'] = 'Ajout dans Piwigo du compte : ';
$lang['RegFluxBB_Email_or_Username_already_exist'] = 'Synchronisation de FluxBB vers Piwigo suspendue : L\'email ou le nom d\'utilisateur cible existe déjà dans la table des utilisateurs de Piwigo.';
$lang['To synchronize your forum access with the gallery you have been registered at %s!'] = 'Afin de synchroniser votre compte d\'accès au forum avec la galerie, vous avez été inscrit sur %s!';
$lang['Please change your password at your first connexion on the gallery'] = 'Merci de bien vouloir modifier votre mot de passe lors de votre première connexion à la galerie pour terminer la synchronisation des données.';
?>