<?php
if(!defined('REGFLUXBB_PATH'))
{
  define('REGFLUXBB_PATH' , PHPWG_PLUGINS_PATH.basename(dirname(__FILE__)).'/');
}

include_once (PHPWG_ROOT_PATH.'/include/constants.php');
include_once (REGFLUXBB_PATH.'include/functions.inc.php');

function plugin_install($id, $version, &$errors)
{
  global $prefixeTable, $conf;

  // Set current plugin version in config table
  $plugin =  RegFluxBB_Infos(REGFLUXBB_PATH);
  $version = $plugin['version'];

  // Default global parameters for RegisterFluxBB conf
  // -------------------------------------------------
  $defaultRegFluxBB = array(
    'REGFLUXBB_VERSION' => $version,
    'FLUXBB_PREFIX'     => '',
    'FLUXBB_ADMIN'      => '',
    'FLUXBB_GUEST'      => '',
    'FLUXBB_DEL_PT'     => 'false',
    'FLUXBB_CONFIRM'    => 'false',
    'FLUXBB_DETAIL'     => 'false',
    'FLUXBB_UAM_LINK'   => 'false',
    'FLUXBB_GROUP'      => ''
  );

  // Create RegisterFluxBB conf if not already exists
  // ------------------------------------------------
	$query = '
SELECT param
  FROM '.CONFIG_TABLE.'
WHERE param = "Register_FluxBB"
;';
  $count = pwg_db_num_rows(pwg_query($query));
  
  if ($count == 0)
  {
    $q = '
INSERT INTO '.CONFIG_TABLE.' (param, value, comment)
VALUES ("Register_FluxBB","'.pwg_db_real_escape_string(serialize($defaultRegFluxBB)).'","Register_FluxBB parameters")
  ;';
    pwg_query($q);
  }

  // Create relation table between FluxBB and Piwigo
  // -----------------------------------------------
  $q = '
CREATE TABLE IF NOT EXISTS '.Register_FluxBB_ID_TABLE.' (
  id_user_pwg smallint(5) NOT NULL default "0",
  id_user_FluxBB int(10) NOT NULL default "0",
  PwdSynch varchar(3) default NULL,
PRIMARY KEY  (id_user_pwg),
  KEY id_user_pwg (id_user_pwg, id_user_FluxBB, PwdSynch)
)
;';

  pwg_query($q);

}

function plugin_activate($id, $version, &$errors)
{
  global $conf;

/* Cleaning obsolete files */
/* *********************** */
  regfluxbb_obsolete_files();

  include_once (REGFLUXBB_PATH.'include/upgradedb.inc.php');

/* Database upgrade */
/* **************** */
  $conf_RegFluxBB = isset($conf['Register_FluxBB']) ? explode(";" , $conf['Register_FluxBB']) : array();

  if (isset($conf_RegFluxBB[0]) and strpos($conf_RegFluxBB[0],"{") === false) /* Version < 2.5.0 */
  {
    upgrade_240_250();
  }

/* Check database upgrade for version > 2.5.0 */
/* ****************************************** */
  $conf_Register_FluxBB = unserialize($conf['Register_FluxBB']);

  if (isset($conf_Register_FluxBB['REGFLUXBB_VERSION']))
  {
    if (version_compare($conf_Register_FluxBB['REGFLUXBB_VERSION'], '2.5.5') < 0)
    {
    /* upgrade from 2.5.x to 2.5.5 */
    /* *************************** */
      upgrade_250_255();
    }
  }

/* Update plugin version number in #_config table */
/* and check consistency of #_plugins table       */
/* ********************************************** */
  RegFluxBB_version_update();

/* Reload plugin parameters */
/* ************************ */
  load_conf_from_db('param like \'Register_FluxBB\'');
}

function plugin_uninstall()
{
  global $conf;

  if (isset($conf['Register_FluxBB']))
  {
    $q = '
DELETE FROM '.CONFIG_TABLE.'
WHERE param="Register_FluxBB" LIMIT 1
;';

    pwg_query($q);
  }

  $q = 'DROP TABLE '.Register_FluxBB_ID_TABLE.';';
  pwg_query( $q );

}
?>