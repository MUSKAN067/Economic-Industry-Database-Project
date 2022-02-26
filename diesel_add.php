<?php ob_start(); ?>
<?php
require('top.inc.php');


if (isset($_POST['submit'])) {

	$date = mysqli_real_escape_string($con, $_POST['date']);
	$namepump = mysqli_real_escape_string($con, $_POST['namepump']);
	$diesel_quantity = mysqli_real_escape_string($con, $_POST['diesel_quantity']);
	$diesel_rate = mysqli_real_escape_string($con, $_POST['diesel_rate']);
	$total_amount = mysqli_real_escape_string($con, $_POST['total_amount']);
	$employee_id = $_SESSION['USER_ID'];
	$cash_provided = mysqli_real_escape_string($con, $_POST['cash_provided']);
	$diesel_status = mysqli_real_escape_string($con, $_POST['diesel_status']);

	$sql = "insert into `diesel`(date, namepump, diesel_quantity, employee_id, diesel_rate, total_amount, cash_provided, diesel_status) values('$date','$namepump','$diesel_quantity','$employee_id','$diesel_rate' ,'$total_amount' ,'$cash_provided',1)";
	mysqli_query($con, $sql);
	header('location:diesel-loading.php');
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
					<div class="card-header" style="text-align: center;"><strong>Diesel Loading </strong></div>
					<div class="card-body card-block">
						<form method="post">



							<div class="form-group">
								<label class=" form-control-label">Name Of Pump</label>
								<input type="text" name="namepump" class="form-control">
							</div>

							<div class="form-group">
								<label class=" form-control-label">Date</label>
								<input type="date" name="date" class="form-control" readonly>
							</div>

							<div class="form-group">
								<label class=" form-control-label">Diesel Quantity </label>
								<input type="number" name="diesel_quantity" id="diesel_quantity" class="form-control">
							</div>

							<div class="form-group">
								<label class=" form-control-label">Diesel Rate</label>
								<input type="number" name="diesel_rate" id="diesel_rate" class="form-control" onchange="updateTotal()">
							</div>

							<div class="form-group">
								<label class=" form-control-label">Total Amount</label>
								<input type="number" name="total_amount" id="total_amount" class="form-control" readonly>
							</div>

							<div class="form-group">
								<label class=" form-control-label">Cash Provided</label>
								<input type="number" name="cash_provided" class="form-control">
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
<?php ob_flush(); ?>

<script>
	var today = new Date().toISOString().split('T')[0];
	document.getElementsByName("date")[0].value = today;



	function updateTotal() {

		var total = parseInt(document.getElementById("diesel_quantity").value);
		var val2 = parseInt(document.getElementById("diesel_rate").value);

		// to make sure that they are numbers
		if (!total) {
			total = 0;
		}
		if (!val2) {
			val2 = 0;
		}

		var ansD = document.getElementById("total_amount");
		ansD.value = total * val2;
	}
</script>