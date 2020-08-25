<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Passage Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('passage/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Edition</th>
						<th>Passage</th>
						<th>Date création</th>
						<th>Date MAJ</th>													
						<th>Actions</th>
                    </tr>
                    <?php foreach($passage as $E){ ?>
                    <tr>						
						<td><?php echo $E['annee']; ?></td>
						<td><?php echo $E['passage']; ?></td>
						<td><?php echo $E['date_creation']; ?></td>						
						<td><?php echo $E['date_maj']; ?></td>												
						<td>
                            <a href="<?php echo site_url('passage/edit/'.$E['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('passage/remove/'.$E['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
