<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<?php $game = isset($_GET['game_id']) ? getGamesById($pdo, $_GET['game_id']) : false; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Game</title>
</head>
<body>
	<h1>Edit Game</h1>
	<?php if ($game) { ?>
	<form action="core/handleForms.php" method="POST">
		<input type="hidden" name="game_id" value="<?php echo $game['game_id']; ?>">
		<input type="hidden" name="developer_id" value="<?php echo $game['developer_id']; ?>">
		<p>
			<label for="title">Title</label>
			<input type="text" name="title" id="title" value="<?php echo htmlspecialchars($game['title']); ?>">
		</p>
		<p>
			<label for="genre">Genre</label>
			<input type="text" name="genre" id="genre" value="<?php echo htmlspecialchars($game['genre']); ?>">
		</p>
		<p>
			<input type="submit" name="editGameBtn" value="Save Changes">
			<a href="viewgames.php?developer_id=<?php echo $game['developer_id']; ?>">Cancel</a>
		</p>
	</form>
	<?php } else { ?>
	<p>Game not found. <a href="index.php">Go back</a></p>
	<?php } ?>
</body>
</html>