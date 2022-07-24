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
								<div class="col-xs-12">
									<div class="page-title-box">
										<h4 class="page-title">Products View</h4>

										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							<!-- end row -->
							<div class="row">
							<?php
							$id = $_GET['id'];
							$sql	=	"select * from `assets` where `inventory_sl_no`='$id'";
							$result = mysqli_query($db, $sql);
							$row=mysqli_fetch_array($result);
							?>
                            <div class="col-xs-6">
								<table style="" class="table table-bordered">
									<tr>
										<th>Category:</th>
										<td>
										<?php echo $row['category'];?>
										</td>
									</tr>
									<tr>
										<th>Brand:</th>
										<td><?php echo $row['brand'] ?></td>
									</tr>
									<tr>
										<th>Model:</th>
										<td><?php echo $row['model'] ?></td>
									</tr>
									<tr>
										<th>Inventory No:</th>
										<td><?php echo $row['inventory_sl_no'] ?></td>
									</tr>
									<tr>
										<th>Country Origin:</th>
										<td><?php echo $row['origin'] ?></td>
									</tr>
									<tr>
										<th>Purchase Date:</th>
										<td><?php echo $row['purchase_date'] ?></td>
									</tr>
									<tr>
										<th>Inspection Date:</th>
										<td><?php 
											if($row['inspaction_date']){
												$rDate = strtotime($row['inspaction_date']);
												$rfDate = date("jS \of F Y",$rDate);
												echo $rfDate;
											}else{
												echo '--';
											}
											?>
										</td>
									</tr>
								</table>
							</div>
                            <div class="col-xs-6">
								<img src="<?php echo $row['qr_image'] ?>" height="250" />
							</div>
						</div>
						<div class="row" style="background-color: #e0e1e3;padding:20px;">
							<div class="col-xs-6" style="">
								<h3 style="text-decoration:underline;">Want To Assign This Product ?</h3>
								<form action="movetoassign.php" method="post">
									<div class="row">
										<div class="col-xs-6">
											<div class="form-group">
												<label>Assign To</label>
												<select id="dv" name="employee_id" class="form-control select2">
													<option>Select Employee</option>
													<?php 
													$sql	= "select * from employees ORDER BY employee_id ASC";
													$result = mysqli_query($db, $sql);
													while($row=mysqli_fetch_array($result))
														{
													?>
													<option value="<?php echo $row['employee_id'] ?>">
													<?php echo $row['employee_id'] ?>-
													<?php echo $row['employee_name'] ?>--
													<?php 	$division_id=$row['division'];
															$sqldiv="select * from `divisions` where `id`='$division_id'";
															$resultdiv = mysqli_query($db, $sqldiv);
															$rowdiv=mysqli_fetch_array($resultdiv);
															echo $rowdiv['division_name']; ?>
													<?php } ?>
												</select>
											</div>
										</div>
										<div class="col-xs-6">
											<div class="form-group">
												<label>Assign Date</label>
												<input name="assign_date" type="text" class="form-control" id="rndate" value="" size="30" autocomplete="off"/>
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
									<button class="btn btn-info" type="submit" name="submit"> Assign This Product</i></button>
									<input type="hidden" name="product_id" value="<?php echo $id ?>" />
								</form>
							</div>
							<div class="col-xs-6" style="">
								<h3 style="color:red;text-decoration:underline;">Want To Damage This Product ?</h3>
								<form action="movetodamage.php" method="post">
									<div class="row">
										<div class="col-xs-6">
											<div class="form-group">
												<label>Damage Date</label>
												<input name="damage_date" type="text" class="form-control" id="dmdate" value="" size="30" autocomplete="off"/>
											</div>
										</div>
										<div class="col-xs-6">
											<div class="form-group">
												<label>Refference</label>
												<input name="ref" type="text" class="form-control" id="ref" value="" size="30" autocomplete="off"/>
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
									<button class="btn btn-danger" type="submit" name="submit"> Damage This Product</i></button>
									<input type="hidden" name="product_id" value="<?php echo $id ?>" />
								</form>
							</div>
						</div>
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
	 <script>
				$(function() {
				$("#cldate").datepicker({
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
			<script>
				$(function() {
				$("#dmdate").datepicker({
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
