<?php

global $prefixeTable, $conf;

$conf_Register_FluxBB = unserialize($conf['Register_FluxBB']);

define('Register_FluxBB_ID_TABLE', $prefixeTable.'Register_FluxBB_id');
define('FluxBB_CONFIG_TABLE', $conf_Register_FluxBB['FLUXBB_PREFIX'].'config');
define('FluxBB_USERS_TABLE', $conf_Register_FluxBB['FLUXBB_PREFIX'].'users');
define('FluxBB_POSTS_TABLE', $conf_Register_FluxBB['FLUXBB_PREFIX'].'posts');
define('FluxBB_TOPICS_TABLE', $conf_Register_FluxBB['FLUXBB_PREFIX'].'topics');
define('FluxBB_SUBSCRIPTIONS_TABLE', $conf_Register_FluxBB['FLUXBB_PREFIX'].'topic_subscriptions');

?>