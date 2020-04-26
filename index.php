<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

include 'vendor/autoload.php';

use App\Entities\UserEmail;
use App\Entities\UserPassword;
use App\Entities\User;
use App\Entities\UserGroup;
use App\Entities\UserProperty;
use App\Entities\UserPropertyValue;

// use Faker\Factory;

// Instance d'un email
$email = [
    UserEmail::LABEL_EMAIL_ID      => 3098432098234,
    UserEmail::LABEL_EMAIL         => 'amine.herradi@gmail.com',
    UserEmail::LABEL_LOCAL_PART    => 'amine.herradi',
    UserEmail::LABEL_DOMAIN_NAME   => 'gmail',
    UserEmail::LABEL_DOMAIN_EXT    => '.com',
    UserEmail::LABEL_CREATION_DATE => date(
        DATE_W3C,
        strtotime('yesterday')
    ),
    UserEmail::LABEL_UPDATE_DATE   => date(
        DATE_W3C,
        strtotime('today')
    )
];
$email = new UserEmail($email);
// var_dump($email);

$password = [
    UserPassword::LABEL_PASSWORD_ID      => 3208324089,
    UserPassword::LABEL_USER_ID          => 3239875402,
    UserPassword::LABEL_PASSWORD         => 'DFZEeoizuç!è"/',
    UserPassword::LABEL_PASSWORD_ENABLED => true,
    UserPassword::LABEL_CREATION_DATE    => date(
        DATE_W3C,
        strtotime('yesterday')
    ),
    UserPassword::LABEL_UPDATE_DATE      => date(
        DATE_W3C,
        strtotime('today')
    )
];
$password = new UserPassword($password);
// var_dump($password);

// Instance d'un utilisateur
$user = [
    User::LABEL_USER_ID        => 3098240892734,
    User::LABEL_USER_GROUP_ID  => 39847398723876,
    User::LABEL_USER_NAME      => 'amineherradi',
    User::LABEL_USER_FIRSTNAME => 'Amine',
    User::LABEL_USER_LASTNAME  => 'Herradi',
    User::LABEL_CREATION_DATE  => date(
        DATE_W3C,
        strtotime('yesterday')
    ),
    User::LABEL_UPDATE_DATE    => date(
        DATE_W3C,
        strtotime('today')
    )
];
$user = new User($user);
var_dump($user);

// Instance d'un groupe d'utilisateurs
$user_group = [
    UserGroup::LABEL_USER_GROUP_ID   => 3098452309,
    UserGroup::LABEL_USER_GROUP_NAME => 'Administrateurs',
    UserGroup::LABEL_CREATION_DATE   => date(DATE_W3C, strtotime('yesterday')),
    UserGroup::LABEL_UPDATE_DATE     => date(DATE_W3C, strtotime('today')),
];
$user_group = new UserGroup($user_group);
// var_dump($user_group);

// Instance d'une propriété utilisateur
$user_property = [
    UserProperty::LABEL_USER_PROPERTY_ID => 3290874230987,
    UserProperty::LABEL_USER_GROUP_ID    => 3409248095243,
    UserProperty::LABEL_NAME             => 'hasBankAccount',
    UserProperty::LABEL_TYPE             => 'boolean',
    UserProperty::LABEL_ENABLED          => true,
    UserProperty::LABEL_CREATION_DATE    => date(
        DATE_W3C,
        strtotime('yesterday')
    ),
    UserProperty::LABEL_UPDATE_DATE      => date(
        DATE_W3C,
        strtotime('today')
    )
];
$user_property = new UserProperty($user_property);
// var_dump($user_property);

// Instance d'une valeur de propriété utilisateur
$user_property_value = [
    UserPropertyValue::LABEL_USER_PROPERTY_VALUE_ID => 3098235090982345,
    UserPropertyValue::LABEL_USER_ID                => 230985423098,
    UserPropertyValue::LABEL_USER_PROPERTY_ID       => 340982354098534,
    UserPropertyValue::LABEL_CUSTOM_VALUE           => true,
    UserPropertyValue::LABEL_CREATION_DATE          => date(
        DATE_W3C,
        strtotime('yesterday')
    ),
    UserPropertyValue::LABEL_UPDATE_DATE            => date(
        DATE_W3C,
        strtotime('today')
    )
];
$user_property_value = new UserPropertyValue($user_property_value);
// var_dump($user_property_value);

// try {
//     $database = new PDO('mysql:host=172.17.0.3;dbname=averoes;charset=utf8', 'root', 'root');
// } catch (Exception $exception) {
//     die($exception->getMessage());
// }
// $faker = new Factory();
// $create = $faker::create();

/*
$sql = 'INSERT INTO users (user_name, user_firstname, user_lastname, user_email, user_password, creation_date) VALUES ';
*/

// for ($iter = 1; $iter <= 10000; $iter++) {
//    $sql.= "(";
//        $sql.= $database->quote($create->userName).", ";
//        $sql.= $database->quote($create->firstName).", ";
//        $sql.= $database->quote($create->lastName).", ";
//        $sql.= $database->quote($create->freeEmail).", ";
//        $sql.= $database->quote($create->password(10, 10)).", ";
//        $sql.= $database->quote($create->dateTime->format(DATE_W3C));
//    $sql.= ")";
//    $sql.= ($iter != 10000)? ", " : "";
// }
// $query = $database->query($sql);
// $insert = $query->execute();
// var_dump($insert);
