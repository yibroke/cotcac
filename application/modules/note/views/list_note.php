<br>
<a href="<?php echo base_url(); ?>note/add-note" class="btn btn-success">Add Note</a>
<h1>List Note</h1> 
<br>
<table class="table">
    <thead>
        <tr> 
            <th>Note</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($query->result() as $row) {
              $edit = base_url() . 'note/add-note/' . $row->id;
            ?>
            <tr>
                <td> <small>[ <?php echo date("F jS, Y", strtotime($row->date)); ?> ]</small> <strong><?php echo $row->content; ?></strong> </td>
                 <td><a href="<?php echo $edit; ?>"><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-pencil"></span></button></p</a></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>

   
