<?php

declare(strict_types=1);

namespace App\Repository\Interface;

use App\Entity\Interface\{
	EntityInterface,
	UserEntityInterface
};

/**
 * Everything should be searchable by an ID.
 */
interface RepositoryInterface
{
	public function getById(int $id): ?EntityInterface;

	public function findOneBy(array $criteria): ?UserEntityInterface;

	public function create(string $login): ?UserEntityInterface;

	public function update(string $login): ?UserEntityInterface;

	public function delete(string $login): bool;
}
