<?php

declare(strict_types=1);

namespace App\Entity\Interface;

use App\Entity\Interface\EntityInterface;

/**
 * Any user should have an email.
 */
interface UserEntityInterface extends EntityInterface
{
	public function getUserLogin(): string;

	public function setUserLogin(string $email): self;

	public function getUserEmail(): string;

	public function setUserEmail(string $email): self;
}
