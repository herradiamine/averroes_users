<?php

declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', 'On');

include '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable('/var/www/html/averoes/averoes_users');
$dotenv->load();

use Config\PDOConfigEntity;
use Entities\User;
use Entities\UserEmail;
use Entities\UserGroup;
use Entities\UserPassword;
use Entities\UserProperty;
use Entities\UserPropertyValue;
use Faker\Factory;
use Models\UserEmailModel;
use Models\UserGroupModel;
use Models\UserModel;

$model = new UserEmailModel();
$collections = $model->getOneById(6, ['*']);
var_dump($collections);

// $pdo_config = new PDOConfigEntity();
// $pdo = new PDO(
//     $pdo_config->getDns(),
//     $pdo_config->getUsername(),
//     $pdo_config->getPassword()
// );
//
// $query = $pdo->query("SELECT * FROM user WHERE user_id = '40001'");
// $query->setFetchMode(
//     PDO::FETCH_CLASS,
//     User::class
// );
// $user_email = $query->fetch();
// var_dump($user_email);
// $faker = new Factory();
// $create = $faker::create();

// $sql = "INSERT INTO user_email (user_email.user_id, user_email.user_email, user_email.local_part,
// user_email.domain_name, user_email.email_enabled, user_email.creation_date) VALUES ";
// $email       = "yschoen@gmail.com";
// $local_part  = "yschoen";
// $domain_name = "gmail.com";
// $date        = date(DATE_W3C, strtotime("now"));
//
// for ($iter = 1; $iter <= 5; $iter++) {
//     $sql.= "(";
//     $sql.= $pdo->quote("40001").", ";
//     $sql.= $pdo->quote($email).", ";
//     $sql.= $pdo->quote($local_part).", ";
//     $sql.= $pdo->quote($domain_name).", ";
//     $sql.= $pdo->quote("1").",";
//     $sql.= $pdo->quote($date)."";
//     $sql.= ")";
//     $sql.= ($iter != 5)? ", " : "";
// }
// echo($sql); die;

// $query  = $pdo->query($sql);
// $insert = $query->execute();
// var_dump($insert);

// $illuminate = new Model();
// $illuminate->addConnection([
//     PDOConfigEntity::LABEL_DRIVER   => $pdo_config->getDriver(),
//     PDOConfigEntity::LABEL_HOST     => $pdo_config->getHost(),
//     PDOConfigEntity::LABEL_DATABASE => $pdo_config->getDatabase(),
//     PDOConfigEntity::LABEL_USERNAME => $pdo_config->getUsername(),
//     PDOConfigEntity::LABEL_PASSWORD => $pdo_config->getPassword(),
//     PDOConfigEntity::LABEL_CHARSET  => $pdo_config->getCharset()
// ]);
// $illuminate->setFetchMode(PDO::FETCH_CLASS);
// $illuminate->setAsGlobal();
// /** @var Collection $users */
// $users = Model::table('user')->get();
// $users->each(
//     function (array $user) {
//         $user->user_enabled = (bool) $user->user_enabled;
//         $user->creation_date = DateTimeImmutable::createFromFormat(
//             DATE_W3C,
//             date(DATE_W3C, strtotime($user->creation_date))
//         );
//         var_dump(new User((array) $user));
//     }
// );

$email = [
    UserEmail::LABEL_EMAIL_ID         => 3098432098234,
    UserEmail::LABEL_USER_ID          => 2309823409834,
    UserEmail::LABEL_USER_EMAIL       => 'amine.herradi@eozijcze.com',
    UserEmail::LABEL_EMAIL_ENABLED    => true,
    UserEmail::LABEL_CREATION_DATE    => DateTimeImmutable::createFromFormat(
        DATE_W3C,
        date(
            DATE_W3C,
            strtotime('yesterday')
        )
    ),
    UserEmail::LABEL_UPDATE_DATE      => DateTimeImmutable::createFromFormat(
        DATE_W3C,
        date(
            DATE_W3C,
            strtotime('today')
        )
    ),
];
//$email = new UserEmail($email);
//var_dump($email);

$password = [
    UserPassword::LABEL_USER_PASSWORD_ID => 3208324089,
    UserPassword::LABEL_USER_ID          => 3239875402,
    UserPassword::LABEL_USER_PASSWORD    => 'DFZEeoizuç!è"/',
    UserPassword::LABEL_PASSWORD_ENABLED => true,
    UserPassword::LABEL_CREATION_DATE    => DateTimeImmutable::createFromFormat(
        DATE_W3C,
        date(
            DATE_W3C,
            strtotime('yesterday')
        )
    ),
    UserPassword::LABEL_UPDATE_DATE      => DateTimeImmutable::createFromFormat(
        DATE_W3C,
        date(
            DATE_W3C,
            strtotime('today')
        )
    ),
];
// $password = new UserPassword($password);
// var_dump($password);

// Instance d'un utilisateur
$user = [
    User::LABEL_USER_ID        => 3098240892734,
    User::LABEL_USER_GROUP_ID  => null,
    User::LABEL_USER_NAME      => 'amineherradi',
    User::LABEL_USER_FIRSTNAME => 'Amine',
    User::LABEL_USER_LASTNAME  => 'Herradi',
    User::LABEL_USER_ENABLED   => true,
    User::LABEL_CREATION_DATE  => DateTimeImmutable::createFromFormat(
        DATE_W3C,
        date(
            DATE_W3C,
            strtotime('yesterday')
        )
    ),
    User::LABEL_UPDATE_DATE    => DateTimeImmutable::createFromFormat(
        DATE_W3C,
        date(
            DATE_W3C,
            strtotime('today')
        )
    ),
];
// $user = new User($user);
// $user->setUserId(34098245);
// var_dump($user);

// Instance d'un groupe d'utilisateurs
$user_group = [
    UserGroup::LABEL_USER_GROUP_ID => 3098452309,
    UserGroup::LABEL_GROUP_NAME    => 'Administrateurs',
    UserGroup::LABEL_GROUP_ENABLED => true,
    UserGroup::LABEL_CREATION_DATE => DateTimeImmutable::createFromFormat(
        DATE_W3C,
        date(
            DATE_W3C,
            strtotime('yesterday')
        )
    ),
    UserGroup::LABEL_UPDATE_DATE   => DateTimeImmutable::createFromFormat(
        DATE_W3C,
        date(
            DATE_W3C,
            strtotime('today')
        )
    ),
];
// $user_group = new UserGroup($user_group);
// var_dump($user_group);

// Instance d'une propriété utilisateur
$user_property = [
    UserProperty::LABEL_USER_PROPERTY_ID => 3290874230987,
    UserProperty::LABEL_USER_GROUP_ID    => 3409248095243,
    UserProperty::LABEL_PROPERTY_NAME    => 'hasBankAccount',
    UserProperty::LABEL_PROPERTY_TYPE    => 'boolean',
    UserProperty::LABEL_PROPERTY_ENABLED => true,
    UserProperty::LABEL_CREATION_DATE    => DateTimeImmutable::createFromFormat(
        DATE_W3C,
        date(
            DATE_W3C,
            strtotime('yesterday')
        )
    ),
    UserProperty::LABEL_UPDATE_DATE      => DateTimeImmutable::createFromFormat(
        DATE_W3C,
        date(
            DATE_W3C,
            strtotime('today')
        )
    ),
];
// $user_property = new UserProperty($user_property);
// var_dump($user_property);

// Instance d'une valeur de propriété utilisateur
$user_property_value = [
    UserPropertyValue::LABEL_USER_PROPERTY_VALUE_ID => 3098235090982345,
    UserPropertyValue::LABEL_USER_ID                => 230985423098,
    UserPropertyValue::LABEL_USER_PROPERTY_ID       => 340982354098534,
    UserPropertyValue::LABEL_CUSTOM_VALUE           => true,
    UserPropertyValue::LABEL_CREATION_DATE          => DateTimeImmutable::createFromFormat(
        DATE_W3C,
        date(
            DATE_W3C,
            strtotime('yesterday')
        )
    ),
    UserPropertyValue::LABEL_UPDATE_DATE            => DateTimeImmutable::createFromFormat(
        DATE_W3C,
        date(
            DATE_W3C,
            strtotime('today')
        )
    ),
];
// $user_property_value = new UserPropertyValue($user_property_value);
// var_dump($user_property_value);
