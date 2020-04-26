<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

include 'vendor/autoload.php';

use App\Entities\User;
use App\Entities\UserProperty;

$users = [
    'userId'        => 3098240892734,
    'userGroupId'   => 39847398723876,
    'userName'      => 'amineherradi',
    'userFirstName' => 'Amine',
    'userLastName'  => 'Herradi',
    'userEmail'     => [
        'emailId'    => 3098432098234,
        'email'      => 'amine.herradi@gmail.com',
        'localPart'  => 'amine.herradi',
        'domainName' => 'gmail',
        'domainExt'  => '.com',
        'creationDate' => date(
            DATE_W3C,
            strtotime('yesterday')
        ),
        'updateDate' => date(
            DATE_W3C,
            strtotime('today')
        )
    ],
    'creationDate'  => date(
        DATE_W3C,
        strtotime('yesterday')
    ),
    'updateDate'    => date(
        DATE_W3C,
        strtotime('today')
    )
];

$users = new User($users);
var_dump($users);

$user_property = [
    'userPropertyId' => 3290874230987,
    'userGroupId'    => 3409248095243,
    'name'           => 'hasBankAccount',
    'type'           => 'boolean',
    'enabled'        => true,
    'creationDate'   => date(
        DATE_W3C,
        strtotime('yesterday')
    ),
    'updateDate'     => date(
        DATE_W3C,
        strtotime('today')
    )
];

$user_property = new UserProperty($user_property);
var_dump($user_property);