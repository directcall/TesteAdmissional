<?php
/**
 * Created by PhpStorm.
 * User: alexandre
 * Date: 20/05/2016
 * Time: 09:44
 *
 * admissional
 */

return array(
    'db'              => array(
        'driver'   => 'Pdo',
        'dsn'      => 'mysql:dbname=admissional;host=localhost',
        'username' => 'admissional',
        'password' => 'admissional'
    ),
    'service_manager' => array(
        'factories' => array(
            'Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory',
        ),
    ),
);

