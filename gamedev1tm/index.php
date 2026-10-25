<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Game Dev Projects Management System</title>
</head>
<body>
	<h1>Welcome To Game Dev Projects Management System. Add new Game Devs!</h1>
	<form action="core/handleForms.php" method="POST">
		<p>
			<label for="firstName">First Name</label>
			<input type="text" name="firstName" id="firstName">
		</p>
		<p>
			<label for="lastName">Last Name</label>
			<input type="text" name="lastName" id="lastName">
		</p>
		<p>
			<label for="email">E-Mail</label>
			<input type="email" name="email" id="email">
			<input type="submit" name="insertNewDevBtn" value="Add Developer">
		</p>
	</form>
	<?php $seeAllGameDevRecords = seeAllGameDevRecords($pdo); ?>
	<?php foreach ($seeAllGameDevRecords as $row) { ?>
	<div class="container" style="border-style: solid; width: 50%; margin-top: 20px; padding: 10px;">
		<h3>First Name: <?php echo htmlspecialchars($row['firstName']); ?></h3>
		<h3>Last Name: <?php echo htmlspecialchars($row['lastName']); ?></h3>
		<h3>E-Mail: <?php echo htmlspecialchars($row['email']); ?></h3>

		<div class="editAndDelete" style="text-align: right; margin-right: 20px;">
			<a href="viewgames.php?developer_id=<?php echo $row['developer_id']; ?>">View Games</a>
			<a href="editdev.php?developer_id=<?php echo $row['developer_id']; ?>">Edit</a>
			<a href="deletedev.php?developer_id=<?php echo $row['developer_id']; ?>">Delete</a>
		</div>
	</div>
	<?php } ?>
</body>
</html>