<?php include('resource/header.php');
if(isset($_POST['submit'])){
	$id = $_POST['id'];
} 
?>
            <!-- Left Sidebar End -->
			<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
			<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
			<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
							$sql	=	"select * from assets where id=$id";
							$result = mysqli_query($db, $sql);
							$row=mysqli_fetch_array($result);
							?>
                            <div class="col-lg-4">
								<table style="" class="table table-bordered">
									<tr>
										<th>Category:</th>
										<td>
										<?php echo $row['category'];
										?>
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
								</table>
							</div>
                            <div class="col-lg-8">
								<img src="<?php echo $row['qr_image'] ?>" height="250" />
							</div>
						</div>
						<h3 style="color:red;">Want To Dispose This Product ?</h3>
						<form action="movetodisposal.php" method="post">
							<div class="row">
								<div class="col-xs-4">
									<div class="form-group">
										<label>Disposal Date</label>
										<input name="disposal_date" type="text" class="form-control" id="rndate" value="" size="30" autocomplete="off"/>
									</div>
								</div>
								<div class="col-xs-4">
									<div class="form-group">
										<label>Disposal Value</label>
										<input name="disposal_value" type="text" class="form-control" id="" value="" size="30" autocomplete="off"/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-4">
									<div class="form-group">
										<label for="ad">Reason</label>
										<textarea id="ad" name="reason" class="form-control"></textarea>
									</div>
								</div>
								<div class="col-xs-4">
									<div class="form-group">
										<label for="ad">Remarks</label>
										<textarea id="ad" name="remarks" class="form-control"></textarea>
									</div>
								</div>
							</div>
							<input type="hidden" name="product_id" value="<?php echo $id ?>" />
							<button class="btn btn-danger" type="submit" name="submit"> Dispose This Product</i></button> or 
							<button class="btn btn-info" type="submit" name="resubmit"> Repair This Product</i></button>
						</form>
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

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>
