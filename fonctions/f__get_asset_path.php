<?php

/**
 * Fonction get_asset_path()
 * 
 * Permet de récupérer l'url des assets
 * Notament pour le mode demo
 *
 */


function get_asset_path(): string
{
  return WAMPMONO_DEMO_MODE
    ? get_home_url() . '/tool/wampmono/demo/'
    : get_home_url();
}
