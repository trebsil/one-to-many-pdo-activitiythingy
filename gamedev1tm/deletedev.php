<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<?php $dev = isset($_GET['developer_id']) ? getGameDevByID($pdo, $_GET['developer_id']) : false; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Delete Developer</title>
</head>
<body>
	<h1>Delete Developer</h1>
	<?php if ($dev) { ?>
	<p>Are you sure you want to delete <strong><?php echo htmlspecialchars($dev['firstName'] . ' ' . $dev['lastName']); ?></strong>? All of their games will be deleted too.</p>
	<form action="core/handleForms.php" method="POST">
		<input type="hidden" name="developer_id" value="<?php echo $dev['developer_id']; ?>">
		<input type="submit" name="deleteDevBtn" value="Delete">
		<a href="index.php">Cancel</a>
	</form>
	<?php } else { ?>
	<p>Developer not found. <a href="index.php">Go back</a></p>
	<?php } ?>
</body>
</html>