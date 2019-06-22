<?php

use Dotenv\Dotenv;
use src\App;

require_once 'vendor/autoload.php';

( new Dotenv( __DIR__ ) )->load();

error_reporting( App::isDev() ? E_ALL : 0 );
ini_set( 'display_errors', App::isDev() );