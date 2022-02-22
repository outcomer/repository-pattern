There was a task to refactor this legacy PHP code (form here and now assuming we are on PHP > 8.0):
```php
if ($_REQUEST['email']) {
	$masterEmail = $_REQUEST['email'];
}
$masterEmail = isset($masterEmail) && $masterEmail
	? $masterEmail
	: array_key_exists('masterEmail', $_REQUEST) && $_REQUEST["masterEmail"]
		? $_REQUEST['masterEmail'] : 'unknown';
		
echo 'The master email is ' . $masterEmail . '\n';

$conn = mysqli_connect('localhost', 'root', 'sldjfpoweifns', 'my_database');
$res  = mysqli_query($conn, "SELECT * FROM users WHERE email='" . $masterEmail . "'");
$row  = mysqli_fetch_row($res);

echo $row['username'] . "\n";
```

The rapid solution would be the next:
```php
declare(strict_types=1);

$masterEmail = $_REQUEST['email'] ?? 'unknown';

echo "The master email is: {$masterEmail}\n";

try {
	$conn = new mysqli('localhost', 'root', '', 'db_name' );
	$stmt = $conn->prepare('SELECT * FROM users WHERE email = ?;');
	$stmt->bind_param('s', $masterEmail);
	$stmt->execute();

	$result = $stmt->get_result();
	$row    = $result->fetch_assoc();

	$user = $row ?? [];
	echo $row['username'] ?? 'Not found';
} catch (\Throwable $e) {
	echo 'Fatal error: ' . $e->getMessage();
}
```

And on the other side a long-living and scalable solution is presented by this repository.\
**See [index.php](index.php) for details.**