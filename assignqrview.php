
<?php include('resource/header.php');
$id=$_GET['id'];
 ?>
            <!-- Left Sidebar End -->
			
			<!-- DataTables -->
        <link href="plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>
			
		


            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Assigned Products View</h4>

                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->

                        <div class="row" id="printableArea" style="display:block;">
							<div class="row">
								<?php
								$sql	=	"select * from `product_assign` where `product_id`='$id'";
								$result = mysqli_query($db, $sql);
								$row=mysqli_fetch_array($result);
								
								
									$product_id=$row['product_id'];
									$sql2	=	"select * from `assets` where `inventory_sl_no`='$product_id'";
									$result2 = mysqli_query($db, $sql2);
									$rowp=mysqli_fetch_array($result2);
								?>
								<div class="col-lg-4">
									<table style="" class="table table-bordered">
										<tr>
											<th>Category:</th>
											<td>
											<?php echo $rowp['category']
											?>
											</td>
										</tr>
										<tr>
											<th>Brand:</th>
											<td><?php echo $rowp['brand'] ?></td>
										</tr>
										<tr>
											<th>Model:</th>
											<td><?php echo $rowp['model'] ?></td>
										</tr>
										<tr>
											<th>Inventory No:</th>
											<td><?php echo $rowp['inventory_sl_no'] ?></td>
										</tr>
										<tr>
											<th>Country Origin:</th>
											<td><?php echo $rowp['origin'] ?></td>
										</tr>
										<tr>
											<th>Purchase Date:</th>
											<td><?php echo $rowp['purchase_date'] ?></td>
										</tr>
									</table>
								</div>
								<div class="col-lg-8">
									<img src="<?php echo $rowp['qr_image'] ?>" height="250" />
								</div>
							</div>
							<div class="row">
								<div class="col-lg-8">
									<table style="" class="table table-bordered">
										<tr>
											<th>Assign/Issue date:</th>
											<td><?php 
											$cDate = strtotime($row['assign_date']);
											$dDate = date("jS \of F Y",$cDate);
											echo $dDate;?></td>
											
										</tr>
										<tr>
											<th>Return date:</th>
											<td><?php 
											if($row['refund_date']){
												$rDate = strtotime($row['refund_date']);
												$rfDate = date("jS \of F Y",$rDate);
												echo $rfDate;
											}else{
												echo '--';
											}
											?>
											</td>

										</tr>
										<tr>
											<th>Assign/Issue To:</th>
											<td><?php 
											$employee_id=$row['employee_id'];
											$sql4	=	"select * from `employees` where `employee_id`='$employee_id'";
											$result4 = mysqli_query($db, $sql4);
											$rowe=mysqli_fetch_array($result4);
											echo $rowe['employee_name'];
											echo '-'.$row['employee_id'];

											 ?></td>
										</tr>
										<tr>
											<th>Remarks:</th>
											<td><?php echo $row['remarks']; ?></td>
										</tr>
									</table>
								</div>
							</div>
						</div>
						<button class="btn btn-primary" onclick="printDiv('printableArea')"><i class="fa fa-print" aria-hidden="true" style="    font-size: 17px;"> Print</i></button>
							
							<script>
							function printDiv(divName) {
								 var printContents = document.getElementById(divName).innerHTML;
								 var originalContents = document.body.innerHTML;

								 document.body.innerHTML = printContents;

								 window.print();

								 document.body.innerHTML = originalContents;
							}
							</script>
							<button class="btn btn-info" onclick="window.location.href = 'assign-list.php'"><i class="fa fa-hand-o-right" aria-hidden="true" style="  font-size: 17px;"> Back To Assign List</i></button>
							
							<button class="btn btn-danger" onclick="window.location.href = 'transfer.php?id=<?php echo $row['product_id'] ?>'"><i class="fa fa-hand-o-right" aria-hidden="true" style="  font-size: 17px;"> Transfer To Another User</i></button>
							
							<button class="btn btn-warning" onclick="window.location.href = 'refund.php?id=<?php echo $row['product_id'] ?>'"><i class="fa fa-hand-o-right" aria-hidden="true" style="  font-size: 17px;"> Return From User</i></button>
						</div> <!-- container -->
                    </div> <!-- container -->
					

                </div> <!-- content -->

                <footer class="footer text-right">
                   2018 - <?php echo date('Y'); ?> © <a href="" target="blank">Saif Powertec</a>
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->



        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>


		
        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="plugins/switchery/switchery.min.js"></script>
		
		  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="plugins/datatables/dataTables.bootstrap.js"></script>

        <script src="plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="plugins/datatables/buttons.bootstrap.min.js"></script>
        <script src="plugins/datatables/jszip.min.js"></script>
        <script src="plugins/datatables/pdfmake.min.js"></script>
        <script src="plugins/datatables/vfs_fonts.js"></script>
        <script src="plugins/datatables/buttons.html5.min.js"></script>
        <script src="plugins/datatables/buttons.print.min.js"></script>
        <script src="plugins/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="plugins/datatables/dataTables.keyTable.min.js"></script>
        <script src="plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="plugins/datatables/responsive.bootstrap.min.js"></script>
        <script src="plugins/datatables/dataTables.scroller.min.js"></script>
        <script src="plugins/datatables/dataTables.colVis.js"></script>
        <script src="plugins/datatables/dataTables.fixedColumns.min.js"></script>
<script type="text/javascript">
            $(document).ready(function () {
                $('#datatable').dataTable();
                $('#datatable-keytable').DataTable({keys: true});
                $('#datatable-responsive').DataTable();
                $('#datatable-colvid').DataTable({
                    "dom": 'C<"clear">lfrtip',
                    "colVis": {
                        "buttonText": "Change columns"
                    }
                });
                $('#datatable-scroller').DataTable({
                    ajax: "../plugins/datatables/json/scroller-demo.json",
                    deferRender: true,
                    scrollY: 380,
                    scrollCollapse: true,
                    scroller: true
                });
                var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
                var table = $('#datatable-fixed-col').DataTable({
                    scrollY: "300px",
                    scrollX: true,
                    scrollCollapse: true,
                    paging: false,
                    fixedColumns: {
                        leftColumns: 1,
                        rightColumns: 1
                    }
                });
            });
            TableManageButtons.init();

        </script>

        <!-- Counter js  -->
        <script src="plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="plugins/counterup/jquery.counterup.min.js"></script>

        <!--Morris Chart-->
		<script src="plugins/morris/morris.min.js"></script>
		<script src="plugins/raphael/raphael-min.js"></script>

        <!-- Dashboard init -->
        <script src="assets/pages/jquery.dashboard.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
		
		
		

    </body>
</html>
