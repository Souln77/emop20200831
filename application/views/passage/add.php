<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Ajout passage</h3>
            </div>
			<div class="alert-warning">
				<?php echo $this->session->flashdata('duplicate_id'); ?>
			</div>
            <?php echo form_open('passage/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">				  
					<div class="col-md-6">
						<label for="annee" class="control-label">ANNEE</label>
						<div class="form-group">
							<input type="text" name="annee" value="<?php echo set_value('annee'); ?>" class="form-control" id="annee" />
						</div>
						<div class="alert-warning">
							<?php echo form_error('annee'); ?>
						</div>
					</div>
					<div class="col-md-6">
						<label for="passage" class="control-label">PASSAGE</label>
						<div class="form-group">
							<input type="text" name="passage" value="<?php echo set_value('passage'); ?>" class="form-control" id="passage" />
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