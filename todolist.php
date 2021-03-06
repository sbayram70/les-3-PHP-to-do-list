<?php

require_once 'app/connect.php';

$itemsQuery = $db->prepare("
	SELECT id, name, done
	FROM items
	WHERE user = :user
");

$itemsQuery->execute([
	'user' => $_SESSION['user_id']
]);

$items = $itemsQuery->rowCount() ? $itemsQuery : [];
?>

<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title> To do list </title>
	<link rel="stylesheet" href="todolist.css">
	
</head>
<body>
<div class="container">
<h1 class="header">To do list.</h1>
				<?php if (!empty($items)): ?>
<ul class="items">
				<?php foreach ($items as $item): ?>		
	<li>
		<span class="item<?php echo $item['done'] ? ' done' : '' ?>"><?php echo $item['name']; ?></span>
				<?php if (!$item['done']): ?>
							
							
	<a href="mark.php?as=done&item=<?php echo $item['id'];?>" class="done-button">Mark as done</a>
	
				<?php endif; ?>
				<?php if ($item['done']): ?>
	<a href="mark.php?as=undo&item=<?php echo $item['id'];?>" class="undo-button">Undo</a>
				<?php endif; ?>
				
				<?php if ($item['done']): ?>
	<a href="mark.php?as=delete&item=<?php echo $item['id'];?>" class="delete-button">Delete</a>
	            <?php endif; ?>
				
	</li>
				<?php endforeach; ?>
</ul>
				<?php else: ?>
<p>U heeft geen nieuwe items.</p>
				<?php endif;  ?>

<form class="item-add" action="add.php" method="post">
	<input type="text" name="name" placeholder="Typ een nieuwe item hier." class="input" autocomplete="off" required>
	<input type="submit" value="Toevoegen" class="submit">


</form>
</div>	
</body>
</html>



