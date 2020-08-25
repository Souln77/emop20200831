<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Ajout utilisateur</h3>
            </div>
			<div class="alert-warning">
				<?php echo $this->session->flashdata('duplicate_id'); ?>
			</div>
            <?php echo form_open('utilisateur/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">				  
					<div class="col-md-6">
						<label for="prenom" class="control-label">PRENOM</label>
						<div class="form-group">
							<input type="text" name="prenom" value="<?php echo set_value('prenom'); ?>" class="form-control" id="prenom" />
						</div>
						<div class="alert-warning">
							<?php echo form_error('prenom'); ?>
						</div>
					</div>
					<div class="col-md-6">
						<label for="nom" class="control-label">NOM</label>
						<div class="form-group">
							<input type="text" name="nom" value="<?php echo set_value('nom'); ?>" class="form-control" id="nom" />
						</div>
						<div class="alert-warning">
							<?php echo form_error('nom'); ?>
						</div>
					</div>	
					<div class="col-md-6">
						<label for="email" class="control-label">EMAIL</label>
						<div class="form-group">
							<input type="text" name="email" value="<?php echo set_value('email'); ?>" class="form-control" id="email" />
						</div>
						<div class="alert-warning">
							<?php echo form_error('email'); ?>
						</div>
					</div>	
					<div class="col-md-6">
						<label for="mdp" class="control-label">MOT DE PASSE</label>
						<div class="form-group">
							<input type="password" name="mdp" value="<?php echo set_value('mdp'); ?>" class="form-control" id="mdp" />
						</div>
						<div class="alert-warning">
							<?php echo form_error('mdp'); ?>
						</div>
					</div>										
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Enregistrer
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>