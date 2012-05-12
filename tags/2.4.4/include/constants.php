<?php

global $prefixeTable, $conf;

$conf_Register_FluxBB = isset($conf['Register_FluxBB']) ? explode(";" , $conf['Register_FluxBB']) : array();

define('Register_FluxBB_ID_TABLE', $prefixeTable.'Register_FluxBB_id');

if (isset($conf_Register_FluxBB[0]))
{
  define('FluxBB_CONFIG_TABLE', $conf_Register_FluxBB[0].'config');
  define('FluxBB_USERS_TABLE', $conf_Register_FluxBB[0].'users');
  define('FluxBB_POSTS_TABLE', $conf_Register_FluxBB[0].'posts');
  define('FluxBB_TOPICS_TABLE', $conf_Register_FluxBB[0].'topics');
  define('FluxBB_SUBSCRIPTIONS_TABLE', $conf_Register_FluxBB[0].'topic_subscriptions');
}
?>