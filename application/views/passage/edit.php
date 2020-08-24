<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editer passage</h3>
            </div>
			<?php echo form_open('passage/edit/'.$passage['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="annee" class="control-label">ANNEE</label>
						<div class="form-group">
							<input type="text" name="annee" value="<?php echo ($this->input->post('annee') ? $this->input->post('annee') : $passage['annee']); ?>" class="form-control" id="annee" />
						</div>
						<div class="alert-warning">
							<?php echo form_error('annee'); ?>
						</div>
					</div>
					<div class="col-md-6">
						<label for="passage" class="control-label">PASSAGE</label>
						<div class="form-group">
							<input type="text" name="passage" value="<?php echo ($this->input->post('passage') ? $this->input->post('passage') : $passage['passage']); ?>" class="form-control" id="passage" />
						</div>
						<div class="alert-warning">
							<?php echo form_error('passage'); ?>
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