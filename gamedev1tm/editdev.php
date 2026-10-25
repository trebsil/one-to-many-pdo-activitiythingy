<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<?php $dev = isset($_GET['developer_id']) ? getGameDevByID($pdo, $_GET['developer_id']) : false; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Developer</title>
</head>
<body>
	<h1>Edit Developer</h1>
	<?php if ($dev) { ?>
	<form action="core/handleForms.php" method="POST">
		<input type="hidden" name="developer_id" value="<?php echo $dev['developer_id']; ?>">
		<p>
			<label for="firstName">First Name</label>
			<input type="text" name="firstName" id="firstName" value="<?php echo htmlspecialchars($dev['firstName']); ?>">
		</p>
		<p>
			<label for="lastName">Last Name</label>
			<input type="text" name="lastName" id="lastName" value="<?php echo htmlspecialchars($dev['lastName']); ?>">
		</p>
		<p>
			<label for="email">E-Mail</label>
			<input type="email" name="email" id="email" value="<?php echo htmlspecialchars($dev['email']); ?>">
		</p>
		<p>
			<input type="submit" name="editDevBtn" value="Save Changes">
			<a href="index.php">Cancel</a>
		</p>
	</form>
	<?php } else { ?>
	<p>Developer not found. <a href="index.php">Go back</a></p>
	<?php } ?>
</body>
</html>