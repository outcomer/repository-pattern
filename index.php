<?php
/**
 * An example of layered separation of logic
 * for storing data about various entities, including User.
 *
 * Hierarchy (parent > child)
 *
 * > App
 *   > RepositoryInterface     - enforce to assign cross-entities operations.
 *   > UserRepositoryInterface - enforce to assign user specific operations.
 *     > AbstractSqlRepository - connector for data provider.
 *     > AbstractApiRepository - connector for data provider.
 *       > SqlUserRepository   - provide cross-entity operations.
 *       > ApiUserRepository   - provide cross-entity operations.
 *    > EntityInterface        - enforce to assign cross-entities methods.
 *      > UserEntityInterface  - enforce to assign user specific methods.
 *
 * If you intend to test this code, then first replace DB_HOST, DB_USER, DB_NAME
 * and DB_PASS with valid values for your case and be sure your DB contains table
 * 'users' with at least one column named 'user_email'.
 */

declare(strict_types=1);

namespace App;

use App\Manager\ManagerRepository;
use Exception;

// define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_NAME', '');
define('DB_PASS', '');

if (!defined('DB_HOST') || !defined('DB_USER') || !defined('DB_NAME') || !defined('DB_PASS') ) {
	throw new Exception('Credentials for DB connection have not been provided.');
}

// Uncomment to debug.
// $_REQUEST['email'] = 'mail@gmail.com';

require __DIR__ . './Entity/Interface/EntityInterface.php';
require __DIR__ . './Entity/Interface/UserEntityInterface.php';
require __DIR__ . './Entity/UserEntity.php';
require __DIR__ . './Repository/Interface/RepositoryInterface.php';
require __DIR__ . './Repository/Interface/UserRepositoryInterface.php';
require __DIR__ . './Repository/AbstractSqlRepository.php';
require __DIR__ . './Repository/AbstractApiRepository.php';
require __DIR__ . './Repository/ApiUserRepository.php';
require __DIR__ . './Repository/SqlUserRepository.php';
require __DIR__ . './Manager/ManagerRepository.php';

$masterEmail = $_REQUEST['email'] ?? false;

$user = managerRepository::getUserRepository()->findOneBy([
	'user_email' => $masterEmail,
]);

$username = (is_null($user)) ? 'not found' : $user->getUserEmail();

echo "The master email is: {$masterEmail}<br>";
echo "The master email username is: {$username}<br>";
