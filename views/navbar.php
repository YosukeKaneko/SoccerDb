<nav class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
			<!-- smart phone -->
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

			<!-- home -->
			<a class="navbar-brand" href="<?php echo $base_url; ?>">SoccerDB</a>
		</div><!-- navbar-header -->

		<!-- menu -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<!-- left side -->
			<ul class="nav navbar-nav">
				<li><a href="<?php echo $base_url;?>/">home</a></li>
				<?php if ($session->isAuthenticated()): ?>
					<li><a href="<?php echo $base_url; ?>/admin">admin</a></li>
				<?php endif; ?>
				
			</ul>

			<!-- right side -->
			<ul class="nav navbar-nav navbar-right">
				<?php if ($session->isAuthenticated()): ?>
					<li><a href="<?php echo $base_url; ?>/admin/signout">signout</a></li>
				<?php else: ?>
					<li><a href="<?php echo $base_url; ?>/admin/signin">Login</a></li>
					<li><a href="<?php echo $base_url; ?>/admin/signup">Register</a></li>
				<?php endif; ?>
			</ul>
		</div><!-- navbar-collapse -->
	</div><!-- .contaner -->
</nav>