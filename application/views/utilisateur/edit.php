<?php //echo "<pre>"; echo print_r($utilisateur->code_groupe); echo "</pre>";?>

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
						<label for="prenom" class="control-label">PRENOM</label>
						<div class="form-group"> <input type="text" name="prenom" value="<?php echo ($this->input->post('prenom') ? $this->input->post('prenom') : $utilisateur['prenom']); ?>" class="form-control" id="prenom" />	</div>
						<div class="alert-warning">	<?php echo form_error('prenom'); ?>	</div>
					</div>
					<div class="col-md-6">
						<label for="nom" class="control-label">NOM</label>
						<div class="form-group"> <input type="text" name="nom" value="<?php echo ($this->input->post('nom') ? $this->input->post('nom') : $utilisateur['nom']); ?>" class="form-control" id="nom" /> </div>
						<div class="alert-warning"> <?php echo form_error('nom'); ?> </div>
					</div>



					<div class="form-group">
						<label for="code_groupe" class="col-md-6 control-label"><span class="text-danger">*</span>GROUPE</label>
						<div class="col-md-6">
							<select name="code_groupe" class="form-control">
								<option value="">selection groupe</option>
								<?php 								
								foreach($all_groupes as $groupe)
								{
									$selected = ($groupe->id == $utilisateur['code_groupe']) ? ' selected="selected"' : "";
									echo '<option value="'.$groupe->id.'" '.$selected.'>'.$groupe->nom.'</option>';
								} 
								?>
							</select>
							<span class="text-warning"><?php echo form_error('code_groupe');?></span>
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