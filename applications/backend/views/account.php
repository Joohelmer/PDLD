
<?php echo alert_box(); ?>

<div class="row">

	<!-- Account Info -->
	<div class="col-md-6">
		<?php echo form_open('account/update_account'); ?>
			<?php echo box_open('Information du compte'); ?>
				<?php echo form_group_input('Nom complet', $user['full_name']); ?>
			<?php echo box_close( btn_submit('Mettre à jour') ); ?>
		<?php echo form_close(); ?>
	</div>
	
	<!-- Change Password -->
	<div class="col-md-6">
		<?php echo form_open('account/change_password'); ?>
			<?php echo box_open('Changer de mot de passe'); ?>
				<?php echo form_group_password('Mot de passe', 'Nouveau mot de passe'); ?>
				<?php echo form_group_password('Confirmer mot de passe'); ?>
			<?php echo box_close( btn_submit('Confirmer') ); ?>
		<?php echo form_close(); ?>
	</div>

</div>