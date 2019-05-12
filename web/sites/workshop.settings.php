<?php

/**
 * @file
 * Drupal site-specific configuration file.
 */

$databases = [];
$config_directories = [];

$settings['hash_salt'] = 'HoV3Xu5Gj107lEZL6EIPgVKj_hRHYF5B1oIySwU0_O3C20gku78BqDw1EBw4kjMtCjcYp5NNmg';

$settings['update_free_access'] = FALSE;

$settings['container_yamls'][] = $app_root . '/' . $site_path . '/services.yml';

$settings['entity_update_batch_size'] = 50;

// if (file_exists($app_root . '/' . $site_path . '/settings.local.php')) {
//   include $app_root . '/' . $site_path . '/settings.local.php';
// }

$config_directories = [
  CONFIG_SYNC_DIRECTORY => '../config/sync',
];

$settings['install_profile'] = 'minimal';

// Drupal database.
$databases['default']['default'] = [
  'database'  => 'drupal8',
  'username'  => 'drupal8',
  'password'  => 'drupal8',
  'prefix'    => '',
  'host'      => 'database',
  'port'      => '3306',
  'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql',
  'driver'    => 'mysql',
];

// Source database.
$databases['source_db']['default'] = array (
  'database'  => 'database',
  'username'  => 'mysql',
  'password'  => 'mysql',
  'host'      => 'database_source',
  'port'      => '3306',
  'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql',
  'driver'    => 'mysql',
);

