<?php

declare(strict_types=1);

namespace App\Repository\Interface;

use App\Entity\Interface\UserEntityInterface;

/**
 * Any user should be searchable by extra criteria.
 */
interface UserRepositoryInterface extends RepositoryInterface
{
	public function findByLogin(string $login): ?UserEntityInterface;
}
