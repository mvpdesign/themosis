<?php
/*----------------------------------------------------*/
// Load must use plugins
/*----------------------------------------------------*/
$must_use_plugins = array(
    'themosis-framework' => 'themosis.php'
);

foreach ($must_use_plugins as $must_use_plugin_directory => $must_use_plugin_file) {
    if (file_exists($plugin_path = $root_path.DS.'public'.DS.'wp-content'.DS.'mu-plugins'.DS.$must_use_plugin_directory.DS.$must_use_plugin_file)) {
        require_once($plugin_path);
    }
}