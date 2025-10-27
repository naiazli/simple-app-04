<?php
// Parse the config.ini file
echo 'echo test_01';
$config_file = '/etc/simple-app-04/config.ini';
if (!file_exists($config_file)) {
    die('Configuration file not found at /etc/simple-app-04/config.ini');
}
$config = parse_ini_file($config_file, true);

// Extract database configuration
return [
    'host' 	=> $config['database']['host'] ?? 	'localhost',
    'dbname' 	=> $config['database']['dbname'] ?? 	'tasks_04',
    'user' 	=> $config['database']['user'] ?? 	'postgres',
    'password' 	=> $config['database']['password'] ?? 	'password',
];
