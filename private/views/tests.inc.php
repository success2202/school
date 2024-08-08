
<div class="card-group justify-content-center">
<table class="table table-striped table-hover">
    <tr><th>Details</th><th>Test Name</th> <th>Created by</th> <th>Active</th> <th>Date</th> 
    
</tr>

    <?php if(isset($rows) && $rows):?>
        <?php foreach($rows as $row):?>

            <tr>
            <td>
                <a href="<?=ROOT?>/single_test/<?=$row->class_id?>">
                 <button class="btn btn-sm btn-primary"><i class="fa fa-chevron-right"></i></button>
                 </a>
            </td>
            <?php  $active = $row->disabled ? "No":"Yes"; ?>
            <td><?=$row->test?> <td><?=$row->user->firstname?>  <?=$row->user->lastname?> </td> <td><?=$active?></td> <td><?=get_date($row->date)?></td>
           
            </tr>
        <?php endforeach; ?>

        <?php else:?>
        <tr><td colspan="5"><center>No tests were found at the moment</center></td></tr>
    <?php endif; ?> <br>

    </table>
</div>