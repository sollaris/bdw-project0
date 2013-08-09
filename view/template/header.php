<!DOCTYPE HTML>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<meta name="keywords" content="restaurant fastfood pizza pasta online ordering"/>
		<meta name="description" content="online ordering fastfood restaurant"/>
		<link href="favicon.png" rel="icon" type="image/x-icon" />
		<link rel="stylesheet" type="text/css" href="<?php echo $fullpath ?>/style.css" />
        <title><?php echo htmlspecialchars($storename . ' - ' . $pagetitle) ?></title>
    </head>
    <body>
        <header>
            <h1><?php echo htmlspecialchars($storename) ?></h1>
            <h2><?php echo htmlspecialchars($pagetitle) ?></h2>
        </header>
        <nav id="top">
            <?php
				echo "<p><a href='$fullpath/home'>Home</a> | <a href='$fullpath/cart'>View Cart</a> | <a href='$fullpath/clear'>Clear Cart</a></p>";
			?>
        </nav>
        <article>
