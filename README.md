### Create settings.local.php
```
touch settings.local.php
vim settings.local.php
```
Then copy the contents below
```
<?php

$databases = array(
  'default' =>
    array(
      'default' =>
        array(
          'database' => 'dbname',
          'username' => 'dbuser',
          'password' => 'dbpassword',
          'host' => 'localhost',
          'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql',
          'driver' => 'mysql',
          'prefix' => '',
        ),
    ),
);
$settings['trusted_host_patterns'] = array(
  '^.+$',
);
$settings['hash_salt'] = 'V7XlQ8fhv4jQ4rooPH9CYiJvzRmcO2Yc2vsz0-H6vkuS0Kygo3Gi8Cxq8-5Xw3NPYjtuVT51-w';
$settings['container_yamls'][] = DRUPAL_ROOT . '/sites/development.services.yml';
$settings['cache']['bins']['render'] = 'cache.backend.null';
$settings['cache']['bins']['dynamic_page_cache'] = 'cache.backend.null';
$settings['cache']['bins']['page'] = 'cache.backend.null';
$config['system.performance']['css']['preprocess'] = FALSE;
$config['system.performance']['js']['preprocess'] = FALSE;
```