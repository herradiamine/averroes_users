<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

include 'vendor/autoload.php';

use App\Entities\User;

$users = [
    'id'           => 39847398723876,
    'name'         => 'amineherradi',
    'firstName'    => 'Amine',
    'lastName'     => 'Herradi',
    'email'        => 'amine.herradi@gmail.com',
    'creationDate' => date(
        DATE_W3C,
        strtotime('yesterday')
    ),
    'updateDate'   => date(
        DATE_W3C,
        strtotime('today')
    )
];

$users = new User($users);
var_dump($users);
