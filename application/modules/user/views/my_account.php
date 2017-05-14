<div class="container">
    <h1>My Account</h1>
    <?php
$row = $query->row();


?>
<table class="table">
    <tbody>

        <tr>
            <th> Name</th>
            <td> <?php echo $row->user_name; ?></td>
        </tr>
        <tr>
            <th> Email</th>
            <td> <?php echo $row->user_email; ?></td>
        </tr>
        <tr>
            <th> Date Join</th>
            <td> <?php echo $row->user_date; ?></td>
        </tr>
       
     
   
       

    </tbody>
</table>
    
</div>