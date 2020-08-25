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
        <h2 style="margin-top:0px">Liste Permissions</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('permissions/create'),'Ajouter', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('permissions/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('permissions'); ?>" class="btn btn-default">Reset</a>
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
		<th>Code</th>
		<th>Description</th>
		<th>Action</th>
            </tr><?php
            foreach ($permissions_data as $permissions)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $permissions->code ?></td>
			<td><?php echo $permissions->description ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('permissions/read/'.$permissions->id),'Voir'); 
				echo ' | '; 
				echo anchor(site_url('permissions/update/'.$permissions->id),'Modifier'); 
				echo ' | '; 
				echo anchor(site_url('permissions/delete/'.$permissions->id),'Supprimer','onclick="javasciprt: return confirm(\'Etes-vous sûr ?\')"'); 
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
		<?php echo anchor(site_url('permissions/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('permissions/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>