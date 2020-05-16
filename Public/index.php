<?php

declare(strict_types=1);

include '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable('/var/www/html/averoes/averoes_users');
$dotenv->load();

use Models\UserEmailModel;

$model = new UserEmailModel();
$collections = $model->getOneById(6, ['*']);
var_dump($collections);
