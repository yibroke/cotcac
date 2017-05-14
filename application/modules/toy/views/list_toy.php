<br>
<a href="<?php echo base_url(); ?>toy/add-toy" class="btn btn-success">Add Toy</a>
<h1>List Toys</h1> 
<br>
<table class="table">
    <thead>
        <tr> 
            <th>Name</th>
            <th>Buy</th>
            <th>Sell</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($query->result() as $row) {
              $edit = base_url() . 'toy/add-toy/' . $row->id;
            ?>
            <tr>
                <td> <small>[ <?php echo date("F jS, Y", strtotime($row->date)); ?> ]</small> <strong><?php echo $row->name; ?></strong> </td>
                <td>  <strong><?php echo number_format($row->buy); ?></strong> </td>
                <td>  <strong><?php echo number_format($row->sell); ?></strong> </td>
                 <td><a href="<?php echo $edit; ?>"><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-pencil"></span></button></p</a></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>

   
