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
        <h2 style="margin-top:0px">Aperçu Permissions_par_groupes</h2>
        <table class="table">
	    <tr><td>Id Groupe</td><td><?php echo $id_groupe; ?></td></tr>
	    <tr><td>Id Permission</td><td><?php echo $id_permission; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('permissions_par_groupes') ?>" class="btn btn-default">Annuler</a></td></tr>
	</table>
        </body>
</html>