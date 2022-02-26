<?php ob_start();?>
<?php
require('top.inc.php');
// if($_SESSION['ROLE']!=1){
// 	header('location:add-role.php?id='.$_SESSION['USER_ID']);
// 	die();
// }
$role='';
$id='';
if(isset($_GET['id'])){
	$id=mysqli_real_escape_string($con,$_GET['id']);
	$res=mysqli_query($con,"select * from role where id != 1 and id='$id'");
	$row=mysqli_fetch_assoc($res);
	$role=$row['role'];
}
if(isset($_POST['role'])){
	$role=mysqli_real_escape_string($con,$_POST['role']);
	if($id>0){
		$sql="update role set role='$role' where id='$id'";
	}else{
		$sql="insert into role(role) values('$role')";
	}
	mysqli_query($con,$sql);
	header('Location: role.php');
	die();
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Add Role</strong></div>
                        <div class="card-body card-block">
                           <form method="post">
							   <div class="form-group">
								<label for="role" class=" form-control-label">Role Name</label>
								<input type="text" value="<?php echo $role?>" name="role" placeholder="Enter Role Type" class="form-control" required></div>
							   
							   <button  type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							  </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
                  
<?php
require('footer.inc.php');
?>
<?php ob_flush();?>