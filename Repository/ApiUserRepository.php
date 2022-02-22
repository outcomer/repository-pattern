<?php

declare(strict_types=1);

namespace App\Repository;

use App\Repository\{
	Interface\UserRepositoryInterface,
	AbstractApiRepository
};
use App\Entity\{
	Interface\UserEntityInterface,
	UserEntity
};
use Exception;

/**
 * Until we store users in remote API this is propper repo to retrieve them.
 */
class ApiUserRepository extends AbstractApiRepository implements UserRepositoryInterface
{
	/**
	 * @var ?SqlUserRepository
	 */
	private static ?SqlUserRepository $instance = null;

	private function __construct()
	{
		parent::__construct();
	}

	public static function instance(): self
	{
		if (is_null(self::$instance)) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function getById(int $id): ?UserEntityInterface
	{
		return (new UserEntity())->setId($id);
	}

	public function create(string $login): ?UserEntityInterface
	{
		// TODO: Implement create() method.
		throw new Exception('Not implemented');
	}

	public function update(string $login): ?UserEntityInterface
	{
		// TODO: Implement update() method.
		throw new Exception('Not implemented');
	}

	public function delete(string $login): bool
	{
		// TODO: Implement delete() method.
		throw new Exception('Not implemented');
	}

	public function findOneBy(array $criteria): ?UserEntityInterface
	{
		// TODO: Implement findOneBy() method.
		throw new Exception('Not implemented');
	}

	public function findByLogin(string $login): ?UserEntityInterface
	{
		// TODO: Implement findByLogin() method.
		throw new Exception('Not implemented');
	}
}
