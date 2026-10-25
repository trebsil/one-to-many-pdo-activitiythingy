<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<?php $game = isset($_GET['game_id']) ? getGamesById($pdo, $_GET['game_id']) : false; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Delete Game</title>
</head>
<body>
	<h1>Delete Game</h1>
	<?php if ($game) { ?>
	<p>Are you sure you want to delete <strong><?php echo htmlspecialchars($game['title']); ?></strong>?</p>
	<form action="core/handleForms.php" method="POST">
		<input type="hidden" name="game_id" value="<?php echo $game['game_id']; ?>">
		<input type="hidden" name="developer_id" value="<?php echo $game['developer_id']; ?>">
		<input type="submit" name="deleteGameBtn" value="Delete">
		<a href="viewgames.php?developer_id=<?php echo $game['developer_id']; ?>">Cancel</a>
	</form>
	<?php } else { ?>
	<p>Game not found. <a href="index.php">Go back</a></p>
	<?php } ?>
</body>
</html>