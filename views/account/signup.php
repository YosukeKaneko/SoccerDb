<?php $this->setLayoutVar('title', 'アカウント登録'); ?>
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<h2>管理者登録</h2>

		<form action="<?php echo $base_url; ?>/admin/register" method="POST">
			<input type="hidden" name="_token" value="<?php echo $this->escape($_token); ?>" />
			<?php if (isset($errors) && count($errors) > 0): ?>
			<?php echo $this->render('errors', array('errors' => $errors)); ?>
			<?php endif; ?>

			<?php echo $this->render('account/inputs', array('user_name' => $user_name, 'password' => $password)); ?>
			
			<button type="submit" class="btn btn-primary">REGISTER</button>
		</form>
	</div>
</div>