<?php
require('top.inc.php');
$name = '';
$email = '';
$mobile = '';
$department_id = '';
$address = '';
$birthday = '';
$id = '';
if (isset($_GET['id'])) {
	$id = mysqli_real_escape_string($con, $_GET['id']);
	if ($_SESSION['ROLE'] != 1 && $_SESSION['USER_ID'] != $id) {
		die('Access denied');
	}
	$res = mysqli_query($con, "select * from employee where id='$id'");
	$row = mysqli_fetch_assoc($res);
	$name = $row['name'];
	$email = $row['email'];
	$mobile = $row['mobile'];
	$department_id = $row['department_id'];
	$address = $row['address'];
	$birthday = $row['birthday'];
}
?>
<style>
	.form-control {
		display: block;
		width: 100%;
	}
</style>
<div class="content pb-0">
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header"><strong>Profile</strong></div>
					<div class="card-body card-block">
						<form method="post">
							<div class="form-group">
								<label class=" form-control-label">Name</label>
								<input type="text" value="<?php echo $name ?>" name="name" placeholder="Enter employee name" class="form-control" readonly>
							</div>
							<div class="form-group">
								<label class=" form-control-label">Email</label>
								<input type="email" value="<?php echo $email ?>" name="email" placeholder="Enter employee email" class="form-control" readonly>
							</div>
							<div class="form-group">
								<label class=" form-control-label">Mobile</label>
								<input type="text" value="<?php echo $mobile ?>" name="mobile" placeholder="Enter employee mobile" class="form-control" readonly>
							</div>
						
							<div class="form-group">
								<label class=" form-control-label">Department</label>
								<input type="text" value="<?php $res = mysqli_query($con, "select * from department order by department desc");
															while ($row = mysqli_fetch_assoc($res)) {
																if ($department_id == $row['id']) {
																	echo $row['department'];
																}
															}
															?>" class="form-control" readonly>
							</div>
							<div class="form-group">
								<label class=" form-control-label">Address</label>
								<input type="text" value="<?php echo $address ?>" name="address" placeholder="Enter employee address" class="form-control" readonly>
							</div>
							<div class="form-group">
								<label class=" form-control-label">Birthday</label>
								<input type="date" value="<?php echo $birthday ?>" name="birthday" placeholder="Enter employee birthday" class="form-control" readonly>
							</div>
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