<?php
	function render($template, $data = array())
	{
		$path=__DIR__ . '/../view/' . $template . '.php';
		if (file_exists($path))
		{
		$host = $_SERVER["HTTP_HOST"];
		$uri = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
		$fullpath = 'http://' . $host . $uri;
		extract($data);
		require($path);
        	}
	}
	function redirect($location)
	{
		$host = $_SERVER["HTTP_HOST"];
		$uri = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
		header("Location: http://$host$uri/$location");
		exit;
	}
	function goback()
	{
		header("Location: {$_SERVER['HTTP_REFERER']}");
		exit;
	}
?>
