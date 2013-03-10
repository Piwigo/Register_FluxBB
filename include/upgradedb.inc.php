<?php
/**
 * @author Eric@piwigo.org
 *  
 * Upgrade processes for old plugin version
 * Called from maintain.inc.php on plugin activation
 * 
 */

if(!defined('REGFLUXBB_PATH'))
{
  define('REGFLUXBB_PATH' , PHPWG_PLUGINS_PATH.basename(dirname(__FILE__)).'/');
}

include_once (REGFLUXBB_PATH.'include/functions.inc.php');

// +----------------------------------------------------------+
// |       Upgrading database from old plugin versions        |
// +----------------------------------------------------------+

/* upgrade from 2.4.x to 2.5.0 */
/* *************************** */
function upgrade_240_250()
{
  global $conf;

  load_language('plugin.lang', REGFLUXBB_PATH);

  $plugin =  RegFluxBB_Infos(REGFLUXBB_PATH);
  $version = $plugin['version'];

  // Upgrading options - Changing config variables to assoc array
  // ------------------------------------------------------------

  $conf_RegFluxBB = isset($conf['Register_FluxBB']) ? explode(";" , $conf['Register_FluxBB']) : array();

  $Newconf_RegFluxBB = array(
    'REGFLUXBB_VERSION' => $version,
    'FLUXBB_PREFIX'     => $conf_RegFluxBB[0],
    'FLUXBB_ADMIN'      => $conf_RegFluxBB[1],
    'FLUXBB_GUEST'      => $conf_RegFluxBB[2],
    'FLUXBB_DEL_PT'     => $conf_RegFluxBB[3],
    'FLUXBB_CONFIRM'    => $conf_RegFluxBB[4],
    'FLUXBB_DETAIL'     => $conf_RegFluxBB[5],
    'FLUXBB_UAM_LINK'   => $conf_RegFluxBB[6],
    'FLUXBB_GROUP'      => $conf_RegFluxBB[7]
  );

  $update_conf = serialize($Newconf_RegFluxBB);

  $q = '
DELETE FROM '.CONFIG_TABLE.'
WHERE param="Register_FluxBB" LIMIT 1
;';

  pwg_query($q);

  $q = '
INSERT INTO '.CONFIG_TABLE.' (param, value, comment)
VALUES ("Register_FluxBB","'.pwg_db_real_escape_string($update_conf).'","Register_FluxBB parameters")
  ;';

  pwg_query($q);
}
?>