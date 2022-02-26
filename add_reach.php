<?php ob_start();?>
<?php
require('top.inc.php');
// if($_SESSION['ROLE']!=1){
// 	header('location:add_reach.php?id='.$_SESSION['USER_ID']);
// 	die();
// }

if (isset($_POST['submit'])) {

	$date_up = mysqli_real_escape_string($con, $_POST['date']);
	$Vehicle_No = mysqli_real_escape_string($con, $_POST['Vehicle_No']);
	$Weight_without_Material = mysqli_real_escape_string($con, $_POST['Weight_without_Material']);
	$Weight_with_Material = mysqli_real_escape_string($con, $_POST['Weight_with_Material']);
	$Gross_Wt = mysqli_real_escape_string($con, $_POST['Gross_Wt']);
	$employee_id = $_SESSION['USER_ID'];

	$In_Time = mysqli_real_escape_string($con, $_POST['In_Time']);
	$Out_Time = mysqli_real_escape_string($con, $_POST['Out_Time']);

	$Vehicle_Type = mysqli_real_escape_string($con, $_POST['Vehicle_Type']);
	$Project_Name = mysqli_real_escape_string($con, $_POST['Project_Name']);

	$sql = "insert into `reach`(date, Vehicle_No, In_Time, employee_id, Weight_without_Material, Weight_with_Material, Gross_Wt,Out_Time,Vehicle_Type, Project_Name, reach_status) 
	values('$date_up','$Vehicle_No','$In_Time','$employee_id','$Weight_without_Material' ,'$Weight_with_Material' ,'$Gross_Wt' ,'$Out_Time','$Vehicle_Type' ,'$Project_Name',1)";
	mysqli_query($con, $sql);
	header('Location: unloading-point.php');
	die();
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
					<div class="card-header" style="text-align: center;"><strong>unloading Point</strong></div>
					<div class="card-body card-block">
						<form method="post">

							<div class="form-group">
								<label class=" form-control-label">unloading Project Name</label>
								<select name="Project_Name" typr="text" required class="form-control">
									<option value="">Select Project Name</option>
									<?php
									$res = mysqli_query($con, "select * from reach_type order by reach_type desc");
									while ($row = mysqli_fetch_assoc($res)) {
										echo "<option value=" . $row['reach_type'] . ">" . $row['reach_type'] . "</option>";
									}
									?>
								</select>

							</div>
							<div class="form-group">
								<label class=" form-control-label">Vehicle Type </label>
								<select name="Vehicle_Type" typr="text" required class="form-control">
									<option value="">Select Vehicle Type</option>
									<?php
									$res = mysqli_query($con, "select * from vehicle_type order by vehicle_type desc");
									while ($row = mysqli_fetch_assoc($res)) {
										echo "<option value=" . $row['vehicle_type'] . ">" . $row['vehicle_type'] . "</option>";
									}
									?>
								</select>
							</div>

							<div class="form-group">
								<label class=" form-control-label">Date</label>
								<input name="date" type="date" class="form-control" readonly>
							</div>

							<div class="form-group">
								<label class=" form-control-label">Vehicle No</label>
								<input type="text" name="Vehicle_No" class="form-control" required>
							</div>

							<div class="form-group">
								<label class=" form-control-label">In Time </label>
								<input type="time" id="In_Time" name="In_Time" class="form-control" readonly>
							</div>

							<div class="form-group">
								<label class=" form-control-label">Weight without Material</label>
								<input type="number" id="Weight_without_Material" name="Weight_without_Material" class="form-control" required>
							</div>

							<div class="form-group">
								<label class=" form-control-label">Weight with Material</label>
								<input type="number" id="Weight_with_Material" name="Weight_with_Material" class="form-control" onchange="updateGross()" required>
							</div>

							<div class="form-group">
								<label class=" form-control-label">Gross Wt</label>
								<input type="number" id="Gross_Wt" name="Gross_Wt" class="form-control" readonly>
							</div>

							<div class="form-group">
								<label class=" form-control-label">Out Time </label>
								<input type="time" id="Out_Time" name="Out_Time" class="form-control" readonly>
							</div>

							<button type="submit" name="submit" class="btn btn-lg btn-info btn-block">
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

<script>
	var today = new Date();
	var dd = String(today.getDate()).padStart(2, '0');
	var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
	var yyyy = today.getFullYear();

	today = yyyy + '-' + mm + '-' + dd;
	document.getElementsByName("date")[0].value = today;
	
	var x = new Date()

	hours = x.getHours() % 12;
	hours = hours ? hours : 12;
	hours = hours.toString().length == 1 ? 0 + hours.toString() : hours;

	var minutes = x.getMinutes().toString()
	minutes = minutes.length == 1 ? 0 + minutes : minutes;

	var seconds = x.getSeconds().toString()
	seconds = seconds.length == 1 ? 0 + seconds : seconds;


	var x1 = hours + ":" + minutes + ":" + seconds;
	document.getElementById("In_Time").value = x1;



	function display_ct7() {
		var x = new Date()

		hours = x.getHours() % 12;
		hours = hours ? hours : 12;
		hours = hours.toString().length == 1 ? 0 + hours.toString() : hours;

		var minutes = x.getMinutes().toString()
		minutes = minutes.length == 1 ? 0 + minutes : minutes;

		var seconds = x.getSeconds().toString()
		seconds = seconds.length == 1 ? 0 + seconds : seconds;


		var x1 = hours + ":" + minutes + ":" + seconds;
		document.getElementById("Out_Time").value = x1;
		update_c7();
	}

	function update_c7() {
		var refresh = 10000; // Refresh rate in milli seconds
		mytime = setTimeout('display_ct7()', refresh)
	}
	update_c7()


	function updateGross() {

		var total = parseInt(document.getElementById("Weight_with_Material").value);
		var val2 = parseInt(document.getElementById("Weight_without_Material").value);

		// to make sure that they are numbers
		if (!total) {
			total = 0;
		}
		if (!val2) {
			val2 = 0;
		}

		var ansD = document.getElementById("Gross_Wt");
		ansD.value = total - val2;
	}
</script>