<?php

declare(strict_types=1);

namespace App\Manager;

use App\Repository\{
	Interface\UserRepositoryInterface,
	SqlUserRepository,
	ApiUserRepository
};

/**
 * Data provider logic.
 */
class ManagerRepository
{
	public static function getUserRepository(): UserRepositoryInterface
	{
		if (true) {
			return SqlUserRepository::instance();
		} else {
			return ApiUserRepository::instance();
		}
	}
}
