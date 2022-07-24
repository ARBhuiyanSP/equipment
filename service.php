<?php include('resource/header.php');
?>
            <!-- Left Sidebar End -->
			<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
			<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
			<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
			
			
		<link href="plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
        <link href="plugins/multiselect/css/multi-select.css"  rel="stylesheet" type="text/css" />
        <link href="plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
        <link href="plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content it_bg">
                    <div class="container">
							<div class="row">
								<div class="col-xs-1"></div>
								<div class="col-xs-10">
									<?php
									$id = $_GET['id'];
									$sql	=	"select * from `assets` where `eel_code`='$id'";
									$result = mysqli_query($db, $sql);
									$row=mysqli_fetch_array($result);
									?>
									<table width='100%'>				
										<tr>
											<td style="text-align:center"><div class="headbody">
												<h1 align="center"><img src="assets/images/logoMenu.png" width="162" height=""></h1>
												<h2 align="center">SAIF POWERTEC LTD</h2>
												<p align="center">95 Bir Uttam AK Khandokar Road,Mohakhali, Dhaka, Bangladesh.</p>
												<h3 align="center">Plant & Equipment Service/Maintence</h3>
											</div></td>
										</tr>
									</table>
									<table style="" class="table table-bordered">
										<tr>
											<th>EEL Code:</th>
											<td>
											<?php echo $row['eel_code']
											?>
											</td>
										</tr>
										<tr>
											<th>Name:</th>
											<td><?php echo $row['name'] ?></td>
										</tr>
										<tr>
											<th>Model:</th>
											<td><?php echo $row['model'] ?></td>
										</tr>
										<tr>
											<th>Country Origin:</th>
											<td><?php echo $row['origin'] ?></td>
										</tr>
										<tr>
											<th>Manufacture Year:</th>
											<td><?php echo $row['year_manufacture'] ?></td>
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
									</table>
									<div class="row">
										<div class="col-xs-3">
											<div class="form-group">
												<?php 
													$sql4	=	"select * from `inspaction` where `eel_code`='$id' and `status`='breakdown' ORDER BY `id` DESC";
													$result4 = mysqli_query($db, $sql4);
													$rowi=mysqli_fetch_array($result4);
													?>
												<label>Breakdown/Inspection Date:</label>
												<?php 
												$cDate = strtotime($rowi['ins_date']);
												$dDate = date("jS \of F Y",$cDate);
												?>
												<input name="employee_id" type="text" class="form-control" id="" value="<?php echo $dDate; ?>" readonly />
											</div>
										</div>
										<div class="col-xs-9">
											<div class="form-group">
												<label>Remarks</label>
												<input name="remarks" type="text" class="form-control" id="" value="<?php echo $rowi['remarks'] ?>" readonly />
											</div>
										</div>
									</div>
									<h3 style="">Plant & Equipment Repair/Maintence</h3>
									<form action="movetorepair.php" method="post">
										<div class="row">
											<div class="col-xs-3">
												<div class="form-group">
													<?php 
														$eel_code= $row['eel_code'];
														$sql2	= "SELECT * FROM `equipment_assign` WHERE `eel_code`='$eel_code' ORDER BY `id` DESC LIMIT 1 ;";
														$result2 = mysqli_query($db, $sql2);
														$row2=mysqli_fetch_array($result2);
														?>
													<label>Transfer To</label>
													<select id="dv" name="project_id" class="form-control select2">
														<option>Select Project</option>
														<?php 
														$sqllt	= "select * from `projects` WHERE `id`!='$project_id' ORDER BY id ASC";
														$resultlt = mysqli_query($db, $sqllt);
														while($rowlt=mysqli_fetch_array($resultlt))
															{
														?>
														<option value="<?php echo $rowlt['id'] ?>">
														<?php echo $rowlt['id'] ?>-
														<?php echo $rowlt['project_name'] ?>
														<?php } ?>
													</select>
												</div>
											</div>
											<div class="col-xs-3">
												<div class="form-group">
													<label>Transfer Date</label>
													<input name="assign_date" type="text" class="form-control" id="rndate" autocomplete="off" />
												</div>
											</div>
											<div class="col-xs-3">
												<div class="form-group">
													<label>Requisition No</label>
													<input name="req_no" type="text" class="form-control" autocomplete="off" />
												</div>
											</div>
											<div class="col-xs-3">
												<div class="form-group">
													<label>Requisition Date</label>
													<input name="req_date" type="text" class="form-control" id="rqdate" autocomplete="off" />
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-12">
												<div class="form-group">
													<label for="ad">Remarks</label>
													<textarea id="ad" name="remarks" class="form-control" placeholder=""></textarea>
												</div>
											</div>
										</div>
										<button class="btn btn-success btn-block" type="submit" name="submit"> Submit Data</i></button>
										<input type="hidden" name="id" value="<?php echo $row2['id'] ?>" />
										<input type="hidden" name="eel_code" value="<?php echo $row['eel_code'];?>" />
										<input type="hidden" name="equipment_type" value="<?php echo $row['equipment_type'];?>" />
									</form>
								</div>
								<div class="col-xs-1"></div>
							</div>
                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                   2018 - <?php echo date('Y'); ?> © <a href="" target="blank">Saif Powertec LTD</a>
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
	 <script>
				$(function() {
				$("#rqdate").datepicker({
						inline: true,
						dateFormat:"yy-mm-dd",
						yearRange:"-50:+10",
						changeYear: true,
						changeMonth: true
				});
			});
			</script>
			
			
			
			
											<script>
				$(function() {
				$("#rndate").datepicker({
						inline: true,
						dateFormat:"yy-mm-dd",
						yearRange:"-50:+10",
						changeYear: true,
						changeMonth: true
				});
			});
			</script>
        <!-- jQuery  -->
        <!-- jQuery  -->
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
		
		
		
		<script src="plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
        <script type="text/javascript" src="plugins/multiselect/js/jquery.multi-select.js"></script>
        <script type="text/javascript" src="plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
        <script src="plugins/select2/js/select2.min.js" type="text/javascript"></script>
        <script src="plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
        <script src="plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
        <script src="plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
        <script src="plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
		  <script type="text/javascript" src="plugins/autocomplete/jquery.mockjax.js"></script>
        <script type="text/javascript" src="plugins/autocomplete/jquery.autocomplete.min.js"></script>
        <script type="text/javascript" src="plugins/autocomplete/countries.js"></script>
        <script type="text/javascript" src="assets/pages/jquery.autocomplete.init.js"></script>

        <script type="text/javascript" src="assets/pages/jquery.form-advanced.init.js"></script>
		
		

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>
