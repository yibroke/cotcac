<script>
function doConfirm(id)
{

    var ok= confirm("Are you sure?");
    if(ok)
    {
        $.ajax({
        type:'post',
        url:base_url+'test/delete',
        data:'id='+id,
        success: function (data) {
            if(data=='true')
            {
                location.reload();  
            }
        }
    });
    }
}
</script>  
<h1>List Topic</h1>
<a href="<?php echo base_url() ?>test/insert">Insert</a>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Topic Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($query->result() as $row) {
            $edit=  base_url().'test/insert/'.$row->id;
            ?>
            <tr>
                <td><?php echo $row->id ?></td>
                <td><?php echo $row->name ?></td>
                <td><a href="<?php echo $edit ?>">Edit</a></td>
                <td><a href="#" onclick="doConfirm('<?php echo $row->id; ?>')">Delete</a></td>
            </tr>

            <?php
        }
        ?>


    </tbody>
</table>