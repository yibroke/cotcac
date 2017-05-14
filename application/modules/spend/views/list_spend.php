<br>
<a href="<?php echo base_url(); ?>spend/add-spend" class="btn btn-success">Add Spend</a>
<h1>List Spend</h1> 

  <ul class="nav nav-tabs">
      <?php 
      if($this->uri->segment(3)&&$this->uri->segment(4))
      {
          $month=$this->uri->segment(3);
          $year=$this->uri->segment(4);
          
      }else{
            $now = new DateTime('now');
       $month = $now->format('m');
         $year = $now->format('Y');
         //.'spend/list-spend/'.$month.'/'.$year;
      }
      
      ?>
                    <li <?php if($this->uri->segment(5)==''){ echo 'class="active"';} ?> ><a href="<?php echo base_url().'spend/list-spend/'.$month.'/'.$year; ?>" data-related="tag1">All</a></li>
                   <li <?php if($this->uri->segment(5)=='5'){ echo 'class="active"';} ?>><a href="<?php echo base_url().'spend/list-spend/'.$month.'/'.$year.'/5'; ?>" data-related="tag2"><i class="fa fa-heart" aria-hidden="true"></i> Lady</a></li>
                    <li <?php if($this->uri->segment(5)=='1'){ echo 'class="active"';} ?> ><a href="<?php echo base_url().'spend/list-spend/'.$month.'/'.$year.'/1'; ?>"> <i class="fa fa-home" aria-hidden="true"></i> Hosing</a></li>
                    <li <?php if($this->uri->segment(5)=='2'){ echo 'class="active"';} ?> ><a href="<?php echo base_url().'spend/list-spend/'.$month.'/'.$year.'/2'; ?>"><i class="fa fa-cutlery" aria-hidden="true"></i> Food</a></li>
                    <li <?php if($this->uri->segment(5)=='3'){ echo 'class="active"';} ?> ><a href="<?php echo base_url().'spend/list-spend/'.$month.'/'.$year.'/3'; ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Buy stuff</a></li>
                    <li <?php if($this->uri->segment(5)=='4'){ echo 'class="active"';} ?> ><a href="<?php echo base_url().'spend/list-spend/'.$month.'/'.$year.'/4'; ?>"><i class="fa fa-credit-card" aria-hidden="true"></i> Pay loan</a></li>
                    <li <?php if($this->uri->segment(5)=='6'){ echo 'class="active"';} ?> ><a href="<?php echo base_url().'spend/list-spend/'.$month.'/'.$year.'/6'; ?>">Other</a></li>
   </ul>

<br>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Price</th>
            <th>Name</th>
            <th>Type</th>
            <th>Note</th>
            <th>Date</th>
            <th>Action</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
        $total=0;
        foreach ($query->result() as $row) {
              $edit = base_url() . 'spend/add-spend/' . $row->id;
              $total=$total+$row->price;
            ?>
            <tr>
                <td><?php echo $row->id; ?></td>
                <td><?php echo number_format($row->price);?></td>
                <td><?php echo $row->name; ?></td>
                <td><?php echo $row->type_name; ?></td>
                <td><?php echo $row->note; ?></td>
                <td><?php echo date("F jS, Y", strtotime($row->date)); ?></td>
                 <td><a href="<?php echo $edit; ?>"><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-pencil"></span></button></p</a></td>
            </tr>

            <?php
        }
        ?>
    </tbody>
</table>
<h1>Total:<?php echo number_format($total); ?></h1>
   
