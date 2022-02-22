<?php

declare(strict_types=1);

namespace App\Repository;

use mysqli;
use Exception;
use Throwable;

/**
 * For operations with users of any type.
 */
class AbstractSqlRepository
{
	/**
	 * @var mysqli
	 */
	protected mysqli $connection;

	protected function __construct()
	{
		try {
			$this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			if ($this->connection->connect_error) {
				throw new Exception('DB connection error');
			}
		} catch (Throwable $e) {
			echo 'Fatal error: ' . $e->getMessage();
			die;
		}
	}
}
