<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Liste utilisateur</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('utilisateur/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>PRENOM</th>
						<th>NOM</th>
						<th>EMAIL</th>																		
						<th>ACTIONS</th>
                    </tr>
                    <?php foreach($utilisateur as $E){ ?>
                    <tr>						
						<td><?php echo $E['prenom']; ?></td>
						<td><?php echo $E['nom']; ?></td>
						<td><?php echo $E['email']; ?></td>						
						<td>
                            <a href="<?php echo site_url('utilisateur/edit/'.$E['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('utilisateur/remove/'.$E['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
