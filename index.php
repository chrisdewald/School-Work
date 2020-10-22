</head>
	<body>

		<?php  include("includes/header.php") ?>

		<?php include("includes/nav.html") ?>

		<?php include("includes/content.php") ?>

        <?php include("includes/footer.php") ?>
        
    <?php    if (!isset($_COOKIE['visits']))
{
  $_COOKIE['visits'] = 0;
}
$visits = $_COOKIE['visits'] + 1;
setcookie('visits', $visits, time() + 3600 * 24 * 365);

include 'includes/welcome.html.php';
?>

	</body>
</html>
