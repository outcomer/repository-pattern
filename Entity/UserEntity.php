<?php

declare(strict_types=1);

namespace App\Entity;

use App\Entity\Interface\UserEntityInterface;
use Exception;

/**
 * User object are always same.
 * Two legs, two hands, head, id and email.
 */
class UserEntity implements UserEntityInterface
{
	/**
	 * @var int
	 */
	private int $id;

	/**
	 * @var string
	 */
	private string $email;

	public function getId(): int
	{
		return $this->id;
	}

	public function setId(int $id): self
	{
		$this->id = $id;

		return $this;
	}

	public function getUserEmail(): string
	{
		return $this->email;
	}

	public function setUserEmail(string $email): self
	{
		$this->email = $email;

		return $this;
	}

	public function getUserLogin(): string
	{
		// TODO: Implement getUserLogin() method.
		throw new Exception('Not implemented');
	}

	public function setUserLogin(string $email): UserEntityInterface
	{
		// TODO: Implement setUserLogin() method.
		throw new Exception('Not implemented');
	}
}
