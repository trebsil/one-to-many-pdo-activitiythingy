<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h1>Welcome To Game Dev Projects Management System. Add new Game Devs!</h1>
	<form action="core/handleForms.php" method="POST">
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="firstName">
		</p>
		<p>
			<label for="firstName">Last Name</label> 
			<input type="text" name="lastName">
		</p>
		<p>
			<label for="firstName">E-Mail</label> 
			<input type="date" name="dateOfBirth">
			<input type="submit" name="insertWebDevBtn">
		</p>
	</form>
	<?php $seeAllGameDevRecords = seeAllGameDevRecords($pdo); ?>
	<?php foreach ($seeAllGameDevRecords as $row) { ?>
	<div class="container" style="border-style: solid; width: 50%; height: 300px; margin-top: 20px;">
		<h3>FirstName: <?php echo $row['firstName']; ?></h3>
		<h3>LastName: <?php echo $row['lastName']; ?></h3>
		<h3>Genre: <?php echo $row['genre']; ?></h3>

		<div class="editAndDelete" style="float: right; margin-right: 20px;">
			<a href="editdev.php?dev_id=<?php echo $row['dev_id']; ?>">Edit</a>
			<a href="deletedev.php?dev_id=<?php echo $row['dev_id']; ?>">Delete</a>
		</div>


	</div> 
	<?php } ?>
</body>
</html>