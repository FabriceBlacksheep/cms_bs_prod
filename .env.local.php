<?php

// This file was generated by running "composer dump-env prod"

return array (
  'APP_ENV' => 'dev',
  'APP_SECRET' => '4b44954158f2d360204760befe75a234',
  'TRUSTED_PROXIES' => '127.0.0.1,REMOTE_ADDR',
  'MESSENGER_TRANSPORT_DSN' => 'doctrine://default?auto_setup=0',
  // 'DATABASE_URL' => 'mysql://root@127.0.0.1:3306/bs_cms?serverVersion=mariadb-10.5.8',
  // 'DATABASE_URL' => 'mysql://root:Ps14087940!@34.155.171.58:3306/blacksheep_cms?serverVersion=mariadb-10.5.8',
  //'DATABASE_URL' => 'mysql://dbu5664121:Ps14087940!@db5012128856.hosting-data.io:3306/bs_cms?serverVersion=mariadb-10.5.8',
  'DATABASE_URL' => 'mysql://toto@free.fr',
  'MAILER_DSN' => 'gmail://stackoverflow@gmail.com:admin123@default?verify_peer=0',
  'CORS_ALLOW_ORIGIN' => '^https?://(localhost|127\\.0\\.0\\.1)(:[0-9]+)?$',
  'CORS_ALLOW_CREDENTIALS' => 'true',
);
