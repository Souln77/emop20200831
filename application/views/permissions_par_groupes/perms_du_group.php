<!doctype html>
<html>
    <head>
        <title>Suivi EMOP | Permissions du groupe </title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>  
    <?php if(!ISSET($id_group)){
        redirect(site_url('permissions_par_groupes'));
    }
     ?>    
    <div class="alert-warning">
				<?php echo $this->session->flashdata('message'); ?>
	</div>      
        <h2 style="margin-top:0px"><?php echo $button ?> les permissions du groupe <?php echo $nom_group ?></h2>
        <form action="<?php echo $action; ?>" method="post">

        <?php foreach($perms_du_group as $E){ ?> 
            <div class="form-check">            
                <input type="checkbox" <?php if($E['statut'] != 0){ echo 'checked';} ?> class="form-check-input" id="<?php echo $E['id_perm'] ?>" name="id_perm<?php echo $E['id_perm'] ?>">            
                <label class="form-check-label" for="<?php echo $E['id_perm'] ?>"><?php echo $E['description'] ?></label>
            </div>
            <?php 
                if(ISSET($E['id_pg'])){ ?>
                <input type="hidden" name="id_pg<?php echo $E['id_perm'] ?>" value="<?php echo $E['id_pg'] ?>" /> 
            <?php } ?>
        <?php } ?>

	    <input type="hidden" name="id_group" value="<?php echo $id_group ?>" />         
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('groupes') ?>" class="btn btn-default">Annuler</a>
	</form>
    </body>
</html>