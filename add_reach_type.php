<?php ob_start();?>
<?php
require('top.inc.php');
// if($_SESSION['ROLE']!=1){
// 	header('location:add_reach_type.php?id='.$_SESSION['USER_ID']);
// 	die();
// }
$reach_type='';
$id='';
if(isset($_GET['id'])){
	$id=mysqli_real_escape_string($con,$_GET['id']);
	$res=mysqli_query($con,"select * from reach_type where id='$id'");
	$row=mysqli_fetch_assoc($res);
	$reach_type=$row['reach_type'];
}
if(isset($_POST['reach_type'])){
	$reach_type=mysqli_real_escape_string($con,$_POST['reach_type']);
	if($id>0){
		$sql="update reach_type set reach_type='$reach_type' where id='$id'";
	}else{
		$sql="insert into reach_type(reach_type) values('$reach_type')";
	}
	mysqli_query($con,$sql);
	header('Location: project-name-reach.php');
	die();
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Reach Type Form</strong></div>
                        <div class="card-body card-block">
                           <form method="post">
							   <div class="form-group">
								<label for="reach_type" class=" form-control-label">Reach Type</label>
								<input type="text" value="<?php echo $reach_type?>" name="reach_type" placeholder="Enter your reach type" class="form-control" required></div>
							   
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