<?php
require('top.inc.php');

if (isset($_GET['type']) && $_GET['type'] == 'delete' && isset($_GET['id'])) {
   $id = mysqli_real_escape_string($con, $_GET['id']);
   mysqli_query($con, "delete from `diesel` where id='$id'");
}
if (isset($_GET['type']) && $_GET['type'] == 'update' && isset($_GET['id'])) {
   $id = mysqli_real_escape_string($con, $_GET['id']);
   $status = mysqli_real_escape_string($con, $_GET['status']);
   mysqli_query($con, "update `diesel` set diesel_status='$status' where id='$id'");
}
if ($_SESSION['ROLE'] == 1 || $_SESSION['ROLE'] == 2) {
   $sql = "select `diesel`.*, employee.name,employee.id as eid from `diesel`,employee where `diesel`.employee_id=employee.id order by `diesel`.id desc";
} else {
   $eid = $_SESSION['USER_ID'];
   $sql = "select `diesel`.*, employee.name ,employee.id as eid from `diesel`,employee where `diesel`.employee_id='$eid' and `diesel`.employee_id=employee.id order by `diesel`.id desc";
}
$res = mysqli_query($con, $sql);
?>
<div class="content pb-0">
   <div class="orders">
      <div class="row">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="box-title" style="float: left;"><strong>Loading Point</strong></h4>
                  <?php if ($_SESSION['ROLE'] == 3) { ?>
                     <button class="add_button"><a href="diesel_add.php" style="color: aliceblue;">Add Diesel Loading</a> </button>
                  <?php } ?>
               </div>
               <div class="card-body--">
                  <div class="table-stats order-table ov-h">
                     <table class="table ">
                        <thead>
                           <tr>
                              <th scope="col">Sl No.</th>
                              <th scope="col">ID</th>
                              <th scope="col">Date </th>
                              <th scope="col">Name of Pump </th>
                              <th scope="col">Diesel Quantity</th>
                              <th scope="col">Diesel Rate</th>
                              <th scope="col">Total Amount </th>
                              <th scope="col">Cash provided </th>
                              <th scope="col">Status</th>
                              <th scope="col">Modes</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           $i = 1;
                           while ($row = mysqli_fetch_assoc($res)) { ?>
                              <tr>
                                 <td data-label="Sl No."><?php echo $i ?></td>
                                 <td data-label="ID"><?php echo $row['id'] ?></td>
                                 <td data-label="Date"><?php echo $row['date'] ?></td>
                                 <td data-label="Name_of_Pump"><?php echo $row['namepump'] ?></td>
                                 <td data-label="Diesel_quantity"><?php echo $row['diesel_quantity'] ?></td>
                                 <td data-label="Diesel_Rate"><?php echo $row['diesel_rate'] ?></td>
                                 <td data-label="Total_Amount"><?php echo $row['total_amount'] ?></td>
                                 <td data-label="Cash_provided"><?php echo $row['cash_provided'] ?></td>
                                 <?php if ($_SESSION['ROLE'] == 1 || $_SESSION['ROLE'] == 2) { ?>
                                 <td data-label="Status">
                                   
                                    <?php if ($_SESSION['ROLE'] == 1 || $_SESSION['ROLE'] == 2) { ?>
                                       <select class="form-control" onchange="update_leave_status('<?php echo $row['id'] ?>',this.options[this.selectedIndex].value)">
                                          <option value="">Status</option>
                                          <option value="1">Applied</option>
                                          <option value="2">Approved</option>
                                          <option value="3">Rejected</option>
                                       </select>
                                    <?php } ?>
                                 </td>
                                 <?php } ?>
                                 <td data-label="Modes">
                                 <?php
                                    if ($row['diesel_status'] == 1) {
                                       echo "Applied";
                                    }
                                    if ($row['diesel_status'] == 2) {
                                       echo "Approved";
                                    }
                                    if ($row['diesel_status'] == 3) {
                                       echo "Rejected";
                                    }
                                    ?>
                                    <?php
                                    if ($row['diesel_status'] == 1 & $_SESSION['ROLE'] != 1) { ?>
                                       <a href="diesel-loading.php?id=<?php echo $row['id'] ?>&type=delete">Delete</a>
                                    <?php } ?>
                                 </td>

                              </tr>
                           <?php
                              $i++;
                           } ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   function update_leave_status(id, select_value) {
      window.location.href = 'diesel-loading.php?id=' + id + '&type=update&status=' + select_value;
   }
</script>
<?php
require('footer.inc.php');
?>


<style>
   table {
      border: 1px solid #ccc;
      border-collapse: collapse;
      margin: 0;
      padding: 0;
      width: 100%;
      table-layout: fixed;
   }

   table caption {
      font-size: 1.5em;
      margin: .5em 0 .75em;
   }

   table tr {
      background-color: #f8f8f8;
      border: 1px solid #ddd;
      padding: .35em;
   }

   table th,
   table td {
      padding: .625em;
      text-align: center;
      padding-bottom: 25px;
   }

   table th {
      font-size: .85em;
      letter-spacing: .1em;
      text-transform: uppercase;
   }

   @media screen and (max-width: 768px) {
      table {
         border: 0;
      }

      table caption {
         font-size: 1.3em;
      }

      table thead {
         border: none;
         clip: rect(0 0 0 0);
         height: 1px;
         margin: -1px;
         overflow: hidden;
         padding: 0;
         position: absolute;
         width: 1px;
      }

      table tr {
         border-bottom: 3px solid #ddd;
         display: block;
         margin-bottom: .625em;
      }

      table td {
         border-bottom: 1px solid #ddd;
         display: block;
         font-size: .8em;
         text-align: right;
      }

      table td::before {
         /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
         content: attr(data-label);
         float: left;
         font-weight: bold;
         text-transform: uppercase;
      }

      table td:last-child {
         border-bottom: 0;
      }
   }
</style>