<?php

declare(strict_types=1);

namespace App\Entity\Interface;

/**
 * Everything should have an ID.
 */
interface EntityInterface
{
	public function getId(): int;

	public function setId(int $int): self;
}
