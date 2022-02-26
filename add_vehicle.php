<?php ob_start();?>
<?php
require('top.inc.php');
// if($_SESSION['ROLE']!=1){
// 	header('location:add_vehicle.php?id='.$_SESSION['USER_ID']);
// 	die();
// }
$leave_type='';
$id='';
if(isset($_GET['id'])){
	$id=mysqli_real_escape_string($con,$_GET['id']);
	$res=mysqli_query($con,"select * from vehicle_type where id='$id'");
	$row=mysqli_fetch_assoc($res);
	$leave_type=$row['leave_type'];
}
if(isset($_POST['leave_type'])){
	$leave_type=mysqli_real_escape_string($con,$_POST['leave_type']);
	if($id>0){
		$sql="update vehicle_type set vehicle_type='$leave_type' where id='$id'";
	}else{
		$sql="insert into vehicle_type(vehicle_type) values('$leave_type')";
	}
	mysqli_query($con,$sql);
	header('Location: vehicle-type.php');
	die();
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Vehicle Type Form</strong></div>
                        <div class="card-body card-block">
                            
                           <form method="post">
							   <div class="form-group">
								<label for="leave_type" class=" form-control-label">Vehicle Type </label>
								<input type="text" value="<?php echo $leave_type?>" name="leave_type" placeholder="Enter your vehicle type" class="form-control" required></div>
							   
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