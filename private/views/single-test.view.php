<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>

    <div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px;">
    <?php $this->view('includes/crumbs',['crumbs'=>$crumbs])?>

    <?php if($row): ?>
   
    <div class="row">
        
        <center>
        <h4><?=esc(ucwords($row->test))?></h4>
        </center>
        
            <table class="table table-hover table-striped table-bordered">
            
            <tr>
                <th>Created by:</th><td><?=esc($row->user->firstname)?> <?=esc($row->user->lastname)?></td>
                <th>Date Created:</th><td><?=get_date($row->date)?></td>
                <td>
                <a href="<?=ROOT?>/single_class/<?=$row->class_id?>?tab=tests">
                    <button class="btn btn-sm btn-primary"><i class="fa fa-plus">&nbsp;&nbsp;view class</i></button>
                </a>
                </td>
            </tr>
           
           <?php $active = $row->disabled ? "No": "Yes";?>
           <tr><td><b>Active:</b>  <br><hr><?=$active?></td><td colspan = "5"><b>Test Description</b><br><hr><?=esc($row->description)?></td></tr>
        
          
        </table>
       
    </div>
    
    <?php
        switch ($page_tab) {
            case 'view':
                include(views_path('test-tab-view'));
                break;
    
            case 'add-subjective':
                include(views_path('test-tab-add-subjective'));
                break;
            case 'add-multiple':
                include(views_path('test-tab-add-multiple'));
                break;
            case 'add-objective':
                include(views_path('test-tab-add-objective'));
                break;

            case 'edit':
                include(views_path('test-tab-edit'));
                 break;
            case 'delete':
                include(views_path('test-tab-delete'));
                 break;
            
            
            default:
                # code...
                break;
        }

        ?>

    <?php else: ?>
        <h4 style="text-align:center;"> the test was not found</h4>
    <?php endif; ?>
    </div>
    <?php $this->view('includes/footer')?>