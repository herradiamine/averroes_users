<?php

declare(strict_types=1);

namespace Tests\Models;

use Entities\User;
use Dotenv\Dotenv;
use Models\UserModel;
use Codeception\Test\Unit;
use Models\Exceptions\ModelException;
use PHPUnit\Framework\MockObject\MockObject;

/**
 * Class UserModelTest
 * @package Tests\Models
 */
class UserModelTest extends Unit
{
    /** @var UserModel $userModel */
    private UserModel $userModel;

    /** @var UserModel|MockObject $mockModel */
    private MockObject $mockModel;

    /**
     * @param string|null $name
     * @param array       $data
     * @param int|string  $dataName
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $dotenv = Dotenv::createImmutable('../averoes/averoes_users');
        $dotenv->load();

        $this->userModel = new UserModel();
        $this->mockModel = $this->createMock(UserModel::class);
    }

    public function testGetOneById()
    {
        $get_one_or_many_by_ids = $this->mockModel->method('getOneOrManyByIds');

        $users = $this->userModel->getOneOrManyByIds([1], ['*']);
        $user  = $users->current();
        self::assertInstanceOf(User::class, $user);
    }
}
