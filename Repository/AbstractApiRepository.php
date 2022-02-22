<?php

declare(strict_types=1);

namespace App\Repository;

use Exception;

/**
 * For operations with users of any type.
 */
class AbstractApiRepository
{
	protected function __construct()
	{
		// TODO: Implement getting API connection token.
		throw new Exception('Not implemented');
	}
}
