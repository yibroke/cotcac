<script>
$(document).ready(function(){
    $(".show").click(function(){
        var id=$(this).attr('data-hidden');
        $(".show"+id).toggle();
    });
});
</script>
<style>
    .hide1{
        display: none;
    }
</style>
<br>
<a href="<?php echo base_url(); ?>mima/add-mima" class="btn btn-success">Add Mima</a>
<h1>List Mima</h1> 
<br>
<table class="table">
    <thead>
        <tr> 
            <th>Name</th>
            <th>Content</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($query->result() as $row) {
              $edit = base_url() . 'mima/add-mima/' . $row->id;
            ?>
            <tr>
                <td><?php echo $row->name; ?></td>
                <td> <button class="show btn btn-warning btn-xs" data-hidden="<?php echo $row->id; ?>">show</button> <strong class="hide1 <?php echo 'show'.$row->id; ?>"><?php echo $row->content; ?></strong> </td>
                 <td><a href="<?php echo $edit; ?>"><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-pencil"></span></button></p</a></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>

   
