<?php

declare(strict_types=1);

namespace App\Repository;

use App\Repository\{
	Interface\UserRepositoryInterface,
	AbstractSqlRepository
};
use App\Entity\{
	Interface\UserEntityInterface,
	UserEntity
};
use Exception;
use Throwable;

/**
 * Until we store users in DB this is propper repo to retrieve them.
 */
class SqlUserRepository extends AbstractSqlRepository implements UserRepositoryInterface
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

	public function findOneBy(array $criteria): ?UserEntityInterface
	{
		$userObject = null;
		$where      = ['1=1'];
		$bind       = [];

		foreach ($criteria as $field => $value) {
			$where[] = "{$field} = ?";
			$bind[]  = $value;
		}

		try {
			$where = implode(' AND ', $where);
			$stmt = $this->connection->prepare("SELECT * FROM users WHERE {$where};");

			foreach ($bind as $item) {
				$stmt->bind_param('s', $item);
			}

			$stmt->execute();

			$result = $stmt->get_result();
			$row    = $result->fetch_assoc();

			$user = $row ?? [];

			if ($user) {
				$userObject = new UserEntity();
				foreach ($criteria as $field => $value) {
					$setter = 'set' . str_replace('_', '', ucwords($field, '_'));
					$userObject->$setter($value);
				}
			}

			return $userObject;
		} catch (Throwable $e) {
			throw new Exception('Error on user find: ' . $e->getMessage());
		}
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

	public function findByLogin(string $login): ?UserEntityInterface
	{
		// TODO: Implement findByLogin() method.
		throw new Exception('Not implemented');
	}
}
