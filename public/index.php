<?php

/**
 * DRM - an mini framwork php
 *
 * @package drm_frm
 * @author Vahry
 * @license http://opensource.org/licenses/MIT MIT License
 */

//chck php version
$PHPVersion = '7.2';
if (version_compare(PHP_VERSION, $PHPVersion, '<')) {
    die("Your PHP version must be {$PHPVersion} or higher to run Drm. Current version: " . PHP_VERSION);
}
unset($PHPVersion);


use Drm\Core\basecore;

//Jalankan session
if (!session_id()) session_start();

/*
 * COre DIRECTORY NAME
 *-
 * This variable must contain the name of your "core" directory.
 */
$system_core = 'core';

/*
 * SYSTEM DIRECTORY NAME
 *-
 * This variable must contain the name of your "system" directory.
 * Set the path if it is not in the same directory as this file.
 */

$system_folder = 'system';


//config system
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('DRM', ROOT . $system_folder . DIRECTORY_SEPARATOR);

/*
 * Error Handling system
 */
require_once DRM . 'check/error_fatal.php';
ob_start();

//auto load composer
require ROOT . 'vendor/autoload.php';
/*
 * LOAD CONFIG FILE
 *-
 * This variable must contain the name of your "config" directory.
 * Set the path if it is not in the same directory as this file.
 */

require_once DRM . 'config/config.php';


/*
 * LOADING 
 */
require_once DRM . 'init.php';


//memeriksa config maintenance
if ($maintance == "On") {
    echo "maintenance";
} else {
    //memulai Application
    $app = new basecore;
}
ob_end_flush();