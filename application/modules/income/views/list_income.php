<br>
<a href="<?php echo base_url(); ?>income/add-income" class="btn btn-success">Add income</a>
<h1>List Income</h1> 
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Price</th>
            <th>Type</th>
            <th>Note</th>
            <th>Date</th>
            <th>Action</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($query->result() as $row) {
              $edit = base_url() . 'income/add_income/' . $row->id;
            ?>
            <tr>
                <td><?php echo $row->id; ?></td>
                <td><?php echo number_format($row->price);?></td>
                <td><?php echo $row->type_name; ?></td>
                <td><?php echo $row->note; ?></td>
                <td><?php echo $row->date; ?></td>
                 <td><a href="<?php echo $edit; ?>"><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-pencil"></span></button></p</a></td>
            </tr>

            <?php
        }
        ?>
    </tbody>
</table>

   
