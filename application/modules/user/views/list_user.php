<div class="container">
<script>
function doConfirm(id)
{

    var ok= confirm("Are you sure?");
    if(ok)
    {
        $.ajax({
        type:'post',
        url:base_url+'user/delete',
        data:'id='+id,
        success: function (data) {
            if(data=='true')
            {
                location.reload();  
            }else{
                alert('Opps cant delete'+data);
            }
        }
    });
    }
}
</script>  
<h1>List Users</h1>
<table class="table">
    <thead>
        <tr>
            
            <th>User Name</th>
            <th>Email</th>
            <th>Activated</th>
            
           
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
  <?php
        foreach ($query->result() as $row) {
            $edit=  base_url().'test/insert/'.$row->user_id;
            $detail=base_url().'user/detail/'.$row->user_id
            ?>
            <tr>
               
                <td><a href="<?php echo $detail;?> "><?php echo $row->user_name; ?></a></td>
                <td><?php echo $row->user_email; ?></td>
                <td><?php echo $row->user_active ;?></td>
              
                <td><a href="#" onclick="doConfirm('<?php echo $row->user_id; ?>')"><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button></p></a></td>
            </tr>

            <?php
        }
        ?>
    </tbody>
</table>
</div>