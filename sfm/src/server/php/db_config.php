<?php

$is_ci_framework = true;
//database config
$sfm_hostname = "localhost";
$sfm_username = 'root';
$sfm_password = '';
$sfm_database_name = 'website_yc';
$table_prefix = '';
define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : "development");
if ($is_ci_framework) {
    $server_root = SFM_SERVER_ROOT . SFM_BASE_URI;
    $appPath = $server_root . 'application/';
    $apps_path = 'application/';

//include database config
//include database config
    define('BASEPATH', $server_root);
    $application_folder = $server_root . 'application/';
    if (is_dir($application_folder)) {
        include_once $application_folder . 'config/database.php';
    } else {
        $application_folder = $server_root . 'system/application/';
        if (!is_dir($application_folder)) {
            exit("Your application folder path does not appear to be set correctly. Please open the  build_code/library/config.php and correct this ");
        }

        include_once $application_folder . 'config/database.php';
    }
    $sfm_hostname = $db['default']['hostname'];
    $sfm_username = $db['default']['username'];
    $sfm_password = $db['default']['password'];
    $sfm_database_name = $db['default']['database'];
}


$database_config = Array(
    'host' => $sfm_hostname,
    'username' => $sfm_username,
    'password' => $sfm_password,
    'db' => $sfm_database_name,
    'port' => 3306,
    'prefix' => $table_prefix,
    'charset' => 'utf8');
$db = new MysqliDb($database_config);
