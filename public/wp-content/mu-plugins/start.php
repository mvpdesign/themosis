<?php
/*----------------------------------------------------*/
// Load must use plugins
/*----------------------------------------------------*/

$mustUsePlugins = array(
    /*
    Plugin Name: Mu-Plugins Loader
    Description: Simple loader in order to run the Themosis framework core files.
    Author: Julien Lambé
    Version: 1.0
    Author URI: http://framework.themosis.com/
    */
    'themosis-framework' => 'themosis.php'
);

foreach ($mustUsePlugins as $mustUsePluginDirectory => $mustUsePluginFile) {
    $pluginPath = WPMU_PLUGIN_DIR.DS.$mustUsePluginDirectory.DS.$mustUsePluginFile;

    if (file_exists($pluginPath)) {
        require_once($pluginPath);
    }
}
