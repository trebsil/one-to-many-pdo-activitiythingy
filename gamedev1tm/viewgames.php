<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<?php $dev = isset($_GET['developer_id']) ? getGameDevByID($pdo, $_GET['developer_id']) : false; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Games</title>
</head>
<body>
	<p><a href="index.php">&larr; Back to developers</a></p>
	<?php if ($dev) { ?>
	<h1>Games by <?php echo htmlspecialchars($dev['firstName'] . ' ' . $dev['lastName']); ?></h1>

	<form action="core/handleForms.php" method="POST">
		<input type="hidden" name="developer_id" value="<?php echo $dev['developer_id']; ?>">
		<p>
			<label for="title">Title</label>
			<input type="text" name="title" id="title">
		</p>
		<p>
			<label for="genre">Genre</label>
			<input type="text" name="genre" id="genre">
			<input type="submit" name="insertGameBtn" value="Add Game">
		</p>
	</form>

	<table border="1" cellpadding="8" cellspacing="0" style="margin-top: 20px;">
		<tr>
			<th>Title</th>
			<th>Genre</th>
			<th>Project Owner</th>
			<th>Actions</th>
		</tr>
		<?php foreach (getGamesByDev($pdo, $dev['developer_id']) as $game) { ?>
		<tr>
			<td><?php echo htmlspecialchars($game['title']); ?></td>
			<td><?php echo htmlspecialchars($game['genre']); ?></td>
			<td><?php echo htmlspecialchars($game['project_owner']); ?></td>
			<td>
				<a href="editgame.php?game_id=<?php echo $game['game_id']; ?>">Edit</a>
				<a href="deletegame.php?game_id=<?php echo $game['game_id']; ?>">Delete</a>
			</td>
		</tr>
		<?php } ?>
	</table>
	<?php } else { ?>
	<p>Developer not found.</p>
	<?php } ?>
</body>
</html>