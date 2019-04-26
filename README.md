### Local setup

- Clone this repository and place it into your web server
- Create `settings.local.php`

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

- Install the project normally
- Import the configuration files found in `/config` directory

### Manual Migration of Car Contents from Car Query API

- Login to the site
- Open your chrome dev tool, and go to the console tab.
- Paste this code snippet from the console tab.

```
jQuery.ajax({
  type: 'GET',
  url: 'domain.com/challenge/cars/2009',
  success: function(data) {
    console.log(data);
  }
});
```

- Don't forget to update `domain.com` with the domain you are using
- Replace 2009 with the year you wanted.