<?php include('resource/header.php'); 
if(isset($_POST['submit'])){
	
	$fromdate = $_POST['fromdate'];
	$todate = $_POST['todate'];
}
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
                    <div class="container" id="printableArea" style="display:block;">
                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
										<h3 style="text-align:center;">Disposal Products List<span style="text-decoration:underline;">
										  <?php
										  $frDate = strtotime($fromdate);
										  $fdate=date("jS \of F Y",$frDate); 
										  echo $fdate; 
										  ?>
										  </span> To <span style="text-decoration:underline;">
										  <?php 
										  $trDate = strtotime($todate);
										  $tdate=date("jS \of F Y",$trDate);
										  echo $tdate;
										  ?>
										  </span></h3>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->

                        <div class="row">
                           <div class="col-lg-12">
                                <div class="container">
									<table id="" class="table table-striped table-bordered">
										<thead>
                                        <tr>
											<th>ID</th>
											<th>Product Name</th>
											<th>Disposal Date</th>
											<th>Disposal Reason</th>
											<th>Disposal Value</th>
                                        </tr>
                                        </thead>
										<tbody>
											<tr id="" bgcolor="#f2f2f2" class="edit_tr">
											<?php
											
											$sql	=	"select * from disposals where `disposal_date` BETWEEN '$fromdate' and '$todate'";
											$result = mysqli_query($db, $sql);
											while($row=mysqli_fetch_array($result))
											{
											?>
												<td><span class="text"><?php echo $row['id'] ?></span></td>
												<?php 
													$product_id=$row['product_id'];
													$sql2	=	"select * from assets where id=$product_id";
													$result2 = mysqli_query($db, $sql2);
													$rowp=mysqli_fetch_array($result2)
													
												?>
												<td><span class="text"><?php echo $rowp['inventory_sl_no'] ?></span></td>
												<td><span class="text"><?php echo $row['disposal_date'] ?></span></td>
												<td><span class="text"><?php echo $row['reason'] ?></span></td>
												<td><span class="text"><?php echo $row['disposal_value'] ?></span></td>
											</tr>

										<?php
										}
										?>
											<tr>
												<td><span class="text">Total </span></td>
												<td><span class="text"></span></td>
												<td><span class="text"></span></td>
												<td><span class="text"></span></td>
												<td>
													<span class="text">
														<?php													
														$sql6 = "SELECT sum(disposal_value) from `disposals` where `disposal_date` BETWEEN '$fromdate' and '$todate'";
														$result6 = mysqli_query($db, $sql6);
														while($row6=mysqli_fetch_array($result6)){
														$fgfg6=$row6['sum(disposal_value)'];
														$fgfg6 ;
														echo $subtotal = number_format($fgfg6, 2, '.', ''); ;
														}
														?>
													</span>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
                    </div> <!-- container -->
					<button class="btn btn-default" onclick="printDiv('printableArea')"><i class="fa fa-print" aria-hidden="true" style="    font-size: 17px;"> Print</i></button>
								
								<script>
								function printDiv(divName) {
									 var printContents = document.getElementById(divName).innerHTML;
									 var originalContents = document.body.innerHTML;

									 document.body.innerHTML = printContents;

									 window.print();

									 document.body.innerHTML = originalContents;
								}
								</script>
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
