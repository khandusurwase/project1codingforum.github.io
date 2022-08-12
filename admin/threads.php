<?php
require('top.inc.php');

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_value($con,$_GET['operation']);
		$thread_id=get_safe_value($con,$_GET['thread_id']);
		if($operation=='active'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status_sql="update threads set status='$status' where thread_id='$thread_id'";
		mysqli_query($con,$update_status_sql);
	}
	
	if($type=='delete'){
		$thread_id=get_safe_value($con,$_GET['thread_id']);
		$delete_sql="DELETE FROM `threads` WHERE thread_id ='$thread_id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql = "SELECT * FROM `threads` ORDER BY `threads`.`thread_title` ASC";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title" style="color: green;">Thread </h4>
                        <h4 class="box-link"><a href="manage_thread.php" style="color: blue">Add Thread</a> </h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th class="serial">SR</th>

                                        <th>ID</th>
                                        <th>Cat_id</th>
                                        <th>User_id</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Posted on</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
                                    <tr>
                                        <td class="serial"><?php echo $i++?></td>
                                        <td><?php echo $row['thread_id']?></td>
                                        <td><?php echo $row['thread_cat_id']?></td>
                                        <td><?php echo $row['thread_user_id']?></td>
                                        <td><?php echo $row['thread_title']?></td>
                                        <td><?php echo $row['thread_desc']?></td>
                                        <td><?php echo $row['timestamp']?></td>


                                        <td>
                                            <?php
								if($row['status']==1){
									echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&thread_id=".$row['thread_id']."'>Block</a></span>&nbsp;";
								}else{
									echo "<span class='badge badge-pending'><a href='?type=status&operation=active&thread_id=".$row['thread_id']."'>Unblock</a></span>&nbsp;";
								}
								echo "<span class='badge badge-edit'><a href='manage_thread.php?thread_id=".$row['thread_id']."'>Edit</a></span>&nbsp;";
								
								echo "<span class='badge badge-delete'><a href='?type=delete&thread_id=".$row['thread_id']."'>Delete</a></span>";
								
								?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require('footer.inc.php');
?>