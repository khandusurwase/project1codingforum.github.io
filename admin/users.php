<?php
require('top.inc.php');

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_value($con,$_GET['operation']);
		$sno=get_safe_value($con,$_GET['sno']);
		if($operation=='active'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status_sql="update users set status='$status' where sno='$sno'";
		mysqli_query($con,$update_status_sql);
	}
	if($type=='delete'){
		$sno=get_safe_value($con,$_GET['sno']);
		$delete_sql="delete from users where sno='$sno'";
		mysqli_query($con,$delete_sql);
	}
}

$sql="SELECT * FROM `users` ORDER BY `sno` ASC";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title" style="color:forestgreen">Users </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th class="serial">SR</th>
							   <th>ID</th>
							   <th>Name</th>
							   <th>Email</th> 
							   <th>Date</th>
							   <th></th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							   <td class="serial"><?php echo $i++?></td>
							   <td><?php echo $row['sno']?></td>
							   <td><?php echo $row['name']?></td>
							   <td><?php echo $row['user_email']?></td>
							   <td><?php echo $row['timestamp']?></td>
							   <td>
								<?php
								if($row['status']==1){
									echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&sno=".$row['sno']."'>Block</a></span>&nbsp;";
								}else{
									echo "<span class='badge badge-pending'><a href='?type=status&operation=active&sno=".$row['sno']."'>Unblock</a></span>&nbsp;";
								}
								echo "<span class='badge badge-edit'><a href='manage_users.php?sno=".$row['sno']."'>Edit</a></span>&nbsp;";
								
								echo "<span class='badge badge-delete'><a href='?type=delete&sno=".$row['sno']."'>Delete</a></span>";
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