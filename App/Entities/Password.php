<?php

namespace App\Entities;

use DateTimeImmutable;

/**
 * Class Password
 * @package App\Entities
 */
class Password
{
    public const LABEL_PASSWORD_ID      = 'password_id';
    public const LABEL_PASSWORD         = 'password';
    public const LABEL_PASSWORD_ENABLED = 'password_enabled';
    public const LABEL_CREATION_DATE    = 'creation_date';
    public const LABEL_UPDATE_DATE      = 'update_date';

    /** @var int $passwordId */
    private int $passwordId;

    /** @var string $password */
    private string $password;

    /** @var bool $passwordEnabled */
    private bool $passwordEnabled;

    /** @var DateTimeImmutable $creationDate */
    private DateTimeImmutable $creationDate;

    /** @var DateTimeImmutable|null $updateDate */
    private ?DateTimeImmutable $updateDate;

    /**
     * Password constructor.
     * @param array $passwordData
     */
    public function __construct(array $passwordData = [])
    {
        if (!empty($passwordData)) {
            $this->initPassword($passwordData);
        }
    }

    private function initPassword(array $passwordData): void
    {

    }
}