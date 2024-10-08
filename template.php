<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo htmlspecialchars($title); ?></title>
</head>
<body>
<h1><?php echo htmlspecialchars($title); ?></h1>
<?php if ($show_list): ?>
    <ul>
        <?php foreach ($items as $item): ?>
            <li><?php echo htmlspecialchars($item); ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>The list is not available.</p>
<?php endif; ?>
<p>Total items: <?php echo count($items); ?></p>
</body>
</html>