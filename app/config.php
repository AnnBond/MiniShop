<?php
/*return [
    'name' => 'Mini Shop',
    'db_host' => 'localhost',
    'db_name' => 'shop_db',
    'db_username' => 'root',
    'db_password' => ''
];*/

 $capsule->addConnection([
     'driver'    => 'mysql',
     'host'      => 'localhost',
     'database'  => 'shop_db',
     'username'  => 'root',
     'password'  => '',
     'charset'   => 'utf8',
     'collation' => 'utf8_unicode_ci',
     'prefix'    => '',
 ]);