<ul class="error_list list-group">
	<?php foreach ($errors as $error): ?>
		<li class="list-group-item"><?php echo $this->escape($error); ?></li>
	<?php endforeach ?>
</ul>
