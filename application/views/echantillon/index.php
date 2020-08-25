<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Echantillon Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('echantillon/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>GRAPPE</th>
						<th>Equipe</th>
						<th>Lregion</th>
						<th>Region</th>		
						<th>ANNEE</th>						
						<th>Localite</th>
						<th>Contr</th>
						<th>Cercle</th>
						<th>Commune</th>						
						<th>Actions</th>
                    </tr>
                    <?php foreach($echantillon as $E){ ?>
                    <tr>
						<td><?php echo $E['GRAPPE']; ?></td>
						<td><?php echo $E['Equipe']; ?></td>
						<td><?php echo $E['lregion']; ?></td>
						<td><?php echo $E['region']; ?></td>						
						<td><?php echo $E['ANNEE']; ?></td>						
						<td><?php echo $E['Localite']; ?></td>
						<td><?php echo $E['Contr']; ?></td>
						<td><?php echo $E['cercle']; ?></td>
						<td><?php echo $E['commune']; ?></td>						
						<td>
                            <a href="<?php echo site_url('echantillon/edit/'.$E['GRAPPE']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('echantillon/remove/'.$E['GRAPPE']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
            </div>
        </div>
    </div>
</div>
