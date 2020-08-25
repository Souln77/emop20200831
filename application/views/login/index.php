<div class="container" style="width:50%;">
	<div class="col-md-12">
		<div class="box box-info">
            <h3 class="box-title">Se connecter</h3>
			
			
            <?php echo form_open('login/check'); ?>			
          	<div class="box-body">
			<div class="alert-warning">
				<?php echo $this->session->flashdata('message'); ?>
			</div>
          		<div class="row clearfix">							
					<div class="col-md-6">
						<label for="email" class="control-label">E-mail</label>
						<div class="orm-group">
							<input type="text" name="email" value="<?php echo set_value('email'); ?>" class="form-control" id="email" />
						</div>
						<div class="alert-warning">
							<?php echo form_error('email'); ?>
						</div>
					</div>						
					<div class="col-md-6">
						<label for="mdp" class="control-label">Mot de passe</label>
						<div class="orm-group">
							<input type="password" name="mdp" value="<?php echo set_value('mdp'); ?>" class="form-control" id="mdp" placeholder="&#xf0e0;" />
						</div>
						<div class="alert-warning">
							<?php echo form_error('mdp'); ?>
						</div>
					</div>										
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Valider
            	</button>
          	</div>
            <?php echo form_close(); ?>
		<div>
    </div>    
</div>