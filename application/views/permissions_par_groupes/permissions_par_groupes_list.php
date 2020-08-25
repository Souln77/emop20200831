<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Liste Permissions_par_groupes</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('permissions_par_groupes/create'),'Ajouter', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('permissions_par_groupes/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('permissions_par_groupes'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Recherche</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Groupe</th>
		<th>Permission</th>
		<th>Action</th>
            </tr><?php
            foreach ($permissions_par_groupes_data as $permissions_par_groupes)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
            <td><?php //echo $permissions_par_groupes->id_groupe 
                foreach ($groupes_data as $groupes)
                {
                    if($permissions_par_groupes->id_groupe == $groupes->id){
                        echo $groupes->nom;
                    }                    
                }
                ?></td>
            <td><?php //echo $permissions_par_groupes->id_permission; 
                foreach ($permissions_data as $permissions)
                {
                    if($permissions_par_groupes->id_permission == $permissions->id){
                        echo $permissions->code;
                    }                    
                }
            ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('permissions_par_groupes/read/'.$permissions_par_groupes->id),'Voir'); 
				echo ' | '; 
				echo anchor(site_url('permissions_par_groupes/update/'.$permissions_par_groupes->id),'Modifier'); 
				echo ' | '; 
				echo anchor(site_url('permissions_par_groupes/delete/'.$permissions_par_groupes->id),'Supprimer','onclick="javasciprt: return confirm(\'Etes-vous sûr ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total enr : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>