<?php
	$connect = mysql_connect('localhost', 'root', "") or die(mysql_error());
	mysql_select_db("test");
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Page</title>
</head>
<body>
	<?php
		$result = mysql_query("SELECT * FROM data");
		$max_posts = 3;
		$num_posts = mysql_num_rows($result);
		$num_pages = intval(($num_posts-1)/$max_posts) + 1;

		for($i = 1; $i<$num_pages; $i++)
			echo "<a href='/view.php?page=$i'>$i</a>";
	?>
</body>

</html>