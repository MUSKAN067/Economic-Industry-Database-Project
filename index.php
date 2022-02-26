<?php
require('top.inc.php');
// if ($_SESSION['ROLE'] != 1) {
//    header('location:add_employee.php?id=' . $_SESSION['USER_ID']);
//    die();
// }
if (isset($_GET['type']) && $_GET['type'] == 'delete' && isset($_GET['id'])) {
   $id = mysqli_real_escape_string($con, $_GET['id']);
   mysqli_query($con, "delete from department where id='$id'");
}
$res = mysqli_query($con, "select * from department order by id desc");
?>
<style>
   .form-control {
      display: block;
      width: 100%;
   }
</style>
<div class="content pb-0">
   <div class="orders">
      <div class="row">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="box-title" style="float: left;">Department Master</h4>
                  <button class="add_button"><a href="add_department.php" style="color: aliceblue;">Add Department</a> </button>
               </div>
               <div class="card-body--">
                  <div class="table-stats order-table ov-h">
                     <table>
                        <thead>
                           <tr>
                              <th scope="col">Sl No.</th>
                              <th scope="col">ID</th>
                              <th scope="col">Department</th>
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
                                 <td data-label="Department"><?php echo $row['department'] ?></td>
                                 <td data-label="Modes"><a href="add_department.php?id=<?php echo $row['id'] ?>">Edit</a> <a href="index.php?id=<?php echo $row['id'] ?>&type=delete">Delete</a></td>
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