
<?php include('resource/header.php');
$id=$_GET['id'];
 ?>
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
                                    <h4 class="page-title">Assigned Equipment View</h4>

                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->

                        <div class="row">
							<div class="row">
								<?php
								$sql	=	"select * from `equipment_assign` where `eel_code`='$id'";
								$result = mysqli_query($db, $sql);
								$row=mysqli_fetch_array($result);
								
								
									$sql2	=	"select * from `assets` where `eel_code`='$id'";
									$result2 = mysqli_query($db, $sql2);
									$rowp=mysqli_fetch_array($result2);
								?>
								<div class="col-lg-1"></div>
								<div class="col-lg-10">
									<div id="printableArea" style="display:block;">
									<table width='100%'>				
										<tr>
											<td style="text-align:center"><div class="headbody">
												<h1 align="center"><img src="assets/images/logoMenu.png" width="162" height=""></h1>
												<h2 align="center">SAIF POWERTEC LTD</h2>
												<p align="center">95 Bir Uttam AK Khandokar Road,Mohakhali, Dhaka, Bangladesh.</p>
												<h3 align="center">Euipment Details</h3>
											</div></td>
										</tr>
									</table>
									<table style="" class="table table-bordered">
										<tr>
											<th>EEL Code:</th>
											<td>
											<?php echo $rowp['eel_code']
											?>
											</td>
										</tr>
										<tr>
											<th>Name:</th>
											<td><?php echo $rowp['name'] ?></td>
										</tr>
										<tr>
											<th>Model:</th>
											<td><?php echo $rowp['model'] ?></td>
										</tr>
										<tr>
											<th>Country Origin:</th>
											<td><?php echo $rowp['origin'] ?></td>
										</tr>
										<tr>
											<th>Manufacture Year:</th>
											<td><?php echo $rowp['year_manufacture'] ?></td>
										</tr>
									</table>
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
											<th>Assigned project:</th>
											<td><?php 
											$project_id=$row['project_id'];
											$sql4	=	"select * from `projects` where `id`='$project_id'";
											$result4 = mysqli_query($db, $sql4);
											$rowe=mysqli_fetch_array($result4);
											echo $rowe['project_name'];

											 ?></td>
										</tr>
										<tr>
											<th>Remarks:</th>
											<td><?php echo $row['remarks']; ?></td>
										</tr>
									</table>
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
							
							<button class="btn btn-danger" onclick="window.location.href = 'transfer.php?id=<?php echo $row['eel_code'] ?>'"><i class="fa fa-hand-o-right" aria-hidden="true" style="  font-size: 17px;"> Transfer To Another Project</i></button>
							
							<button class="btn btn-warning" onclick="window.location.href = 'refund.php?id=<?php echo $row['product_id'] ?>'"><i class="fa fa-hand-o-right" aria-hidden="true" style="  font-size: 17px;"> Return Back To Equipment Shade</i></button>
								</div>
								<div class="col-lg-1"></div>
							</div>
						</div>
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
