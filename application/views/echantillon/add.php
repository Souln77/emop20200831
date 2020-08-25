<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Echantillon Add</h3>
            </div>
            <?php echo form_open('echantillon/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="Equipe" class="control-label">Equipe</label>
						<div class="form-group">
							<input type="text" name="Equipe" value="<?php echo $this->input->post('Equipe'); ?>" class="form-control" id="Equipe" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="lregion" class="control-label">Lregion</label>
						<div class="form-group">
							<input type="text" name="lregion" value="<?php echo $this->input->post('lregion'); ?>" class="form-control" id="lregion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="region" class="control-label">Region</label>
						<div class="form-group">
							<input type="text" name="region" value="<?php echo $this->input->post('region'); ?>" class="form-control" id="region" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="Envoi" class="control-label">Envoi</label>
						<div class="form-group">
							<input type="text" name="Envoi" value="<?php echo $this->input->post('Envoi'); ?>" class="form-control" id="Envoi" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="DateFinCOl" class="control-label">DateFinCOl</label>
						<div class="form-group">
							<input type="text" name="DateFinCOl" value="<?php echo $this->input->post('DateFinCOl'); ?>" class="form-control" id="DateFinCOl" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="IDSE" class="control-label">IDSE</label>
						<div class="form-group">
							<input type="text" name="IDSE" value="<?php echo $this->input->post('IDSE'); ?>" class="form-control" id="IDSE" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="Denombrement" class="control-label">Denombrement</label>
						<div class="form-group">
							<input type="text" name="Denombrement" value="<?php echo $this->input->post('Denombrement'); ?>" class="form-control" id="Denombrement" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="ASEGMENTER" class="control-label">ASEGMENTER</label>
						<div class="form-group">
							<input type="text" name="ASEGMENTER" value="<?php echo $this->input->post('ASEGMENTER'); ?>" class="form-control" id="ASEGMENTER" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="ANNEE" class="control-label">ANNEE</label>
						<div class="form-group">
							<input type="text" name="ANNEE" value="<?php echo $this->input->post('ANNEE'); ?>" class="form-control" id="ANNEE" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="Fermeture" class="control-label">Fermeture</label>
						<div class="form-group">
							<input type="text" name="Fermeture" value="<?php echo $this->input->post('Fermeture'); ?>" class="form-control" id="Fermeture" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="Localite" class="control-label">Localite</label>
						<div class="form-group">
							<input type="text" name="Localite" value="<?php echo $this->input->post('Localite'); ?>" class="form-control" id="Localite" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="Contr" class="control-label">Contr</label>
						<div class="form-group">
							<input type="text" name="Contr" value="<?php echo $this->input->post('Contr'); ?>" class="form-control" id="Contr" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="cercle" class="control-label">Cercle</label>
						<div class="form-group">
							<input type="text" name="cercle" value="<?php echo $this->input->post('cercle'); ?>" class="form-control" id="cercle" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="commune" class="control-label">Commune</label>
						<div class="form-group">
							<input type="text" name="commune" value="<?php echo $this->input->post('commune'); ?>" class="form-control" id="commune" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="arrondissement" class="control-label">Arrondissement</label>
						<div class="form-group">
							<input type="text" name="arrondissement" value="<?php echo $this->input->post('arrondissement'); ?>" class="form-control" id="arrondissement" />
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Save
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>