<?php $this->setLayoutVar('title', 'ログイン'); ?>
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<h2>管理画面ログイン</h2>

		<form action="<?php echo $base_url; ?>/admin/authenticate" method="POST">
			<input type="hidden" name="_token" value="<?php echo $this->escape($_token); ?>">

			<?php if (isset($errors) && count($errors) > 0): ?>
			<?php echo $this->render('errors', array('errors' => $errors)); ?>
			<?php endif; ?>

			<?php echo $this->render('account/inputs', array(
				'user_name' => $user_name, 'password' => $password,
			)); ?>

			<button type="submig" class="btn btn-primary">LOGIN</button>
		</form>		
	</div>
</div>
