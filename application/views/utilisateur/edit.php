<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editer utilisateur</h3>
            </div>
			<?php echo form_open('utilisateur/edit/'.$utilisateur['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="annee" class="control-label">ANNEE</label>
						<div class="form-group">
							<input type="text" name="annee" value="<?php echo ($this->input->post('annee') ? $this->input->post('annee') : $utilisateur['annee']); ?>" class="form-control" id="annee" />
						</div>
						<div class="alert-warning">
							<?php echo form_error('annee'); ?>
						</div>
					</div>
					<div class="col-md-6">
						<label for="utilisateur" class="control-label">PASSAGE</label>
						<div class="form-group">
							<input type="text" name="utilisateur" value="<?php echo ($this->input->post('utilisateur') ? $this->input->post('utilisateur') : $utilisateur['utilisateur']); ?>" class="form-control" id="utilisateur" />
						</div>
						<div class="alert-warning">
							<?php echo form_error('utilisateur'); ?>
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