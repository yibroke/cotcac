<br>
<a href="<?php echo base_url(); ?>debt/add-debt" class="btn btn-success">Add Debt</a>
<h1>List Debt</h1> 
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Price</th>
            <th>Name</th>
            <th>Owner</th>
            <th>Pay day</th>
            <th>Note</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($query->result() as $row) {
              $edit = base_url() . 'debt/add-debt/' . $row->id;
            ?>
            <tr>
                <td><?php echo $row->id; ?></td>
                <td><?php echo number_format($row->price);?></td>
                <td><?php echo $row->name; ?></td>
                <td><?php echo $row->owner; ?></td>
                <td><?php echo $row->pay_day; ?></td>
                <td><?php echo $row->note; ?></td>
                 <td><?php echo date("F jS, Y", strtotime($row->date)); ?></td>
                 <td><a href="<?php echo $edit; ?>"><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-pencil"></span></button></p</a></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>

   
