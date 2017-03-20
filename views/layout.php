<!DOCTYPE html>
<html lang="ja">
<meta charset="utf-8">
<head>
	<meta charset="utf-8">	
	<title>Soccer DB</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<?php include 'navbar.php'; ?>

	<div id="main" class="container">
		<?php echo $_content; ?>
	</div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script type=text/javascript src="scripts/underscore.js"></script>
    <script type=text/javascript src="scripts/jquery.js"></script>
    <script type=text/javascript src="scripts/backbone.js"></script>
    <?php if ($session->isAuthenticated()): ?>
    <script type=text/javascript src="scripts/app-admin.js"></script>
	<?php else: ?>
    <script type=text/javascript src="scripts/app.js"></script>
	<?php endif; ?>
</body>
</html>