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
        <h2 style="margin-top:0px"><?php echo $button ?> Permissions_par_groupes</h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Groupe <?php echo form_error('id_groupe') ?></label>
            <input type="text" class="form-control" name="id_groupe" id="id_groupe" placeholder="Id Groupe" value="<?php echo $id_groupe; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Permission <?php echo form_error('id_permission') ?></label>
            <input type="text" class="form-control" name="id_permission" id="id_permission" placeholder="Id Permission" value="<?php echo $id_permission; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('permissions_par_groupes') ?>" class="btn btn-default">Annuler</a>
	</form>
    </body>
</html>