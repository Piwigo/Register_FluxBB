<?php

define('Register_FluxBB_DIR' , basename(dirname(__FILE__)));
define('Register_FluxBB_PATH' , PHPWG_PLUGINS_PATH . Register_FluxBB_DIR . '/');

//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', true);

include_once (PHPWG_ROOT_PATH.'/include/constants.php');
include_once (Register_FluxBB_PATH.'include/constants.php');



function plugin_install()
{
  global $prefixeTable;

  $q = '
INSERT INTO '.CONFIG_TABLE.' (param,value,comment)
VALUES ("Register_FluxBB","FluxBB_;PhpWebGallery;Guest;false;false;true","Parametres Register_FluxBB")
;';
    
  pwg_query($q);
  
  $q = "
CREATE TABLE IF NOT EXISTS ".Register_FluxBB_ID_TABLE." (
  id_user_pwg smallint(5) NOT NULL default '0',
  id_user_FluxBB int(10) NOT NULL default '0',
PRIMARY KEY  (id_user_pwg),
  KEY id_user_pwg (id_user_pwg, id_user_FluxBB)
)
;";

  pwg_query($q);

}

function plugin_activate()
{

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