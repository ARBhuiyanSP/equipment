<?php include('resource/header.php');
if(isset($_POST['submit'])){
	$id = $_POST['id'];
}else{
	$id = $_GET['id'];
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
								<div class="col-md-1"></div>
								<div class="col-md-10">
									
									<div class="page-title-box">
                                    <h4 class="page-title">Equipment Inspection</h4>

                                    <div class="clearfix"></div>
                                </div>
									<div class="row">
							<?php
							$sql	=	"select * from assets where id=$id";
							$result = mysqli_query($db, $sql);
							$row=mysqli_fetch_array($result);
							?>
                            <div class="col-lg-12">
								<table style="" class="table table-bordered table-striped">
									<tr>
										<th>Name:</th>
										<td>
										<?php echo $row['name'];?>
										</td>
										<td width="50%" rowspan="6"><center><h3>Equipment Image Not Found</h3></center></td>
									</tr>
									<tr>
										<th>EEL Code:</th>
										<td><?php echo $row['eel_code'] ?></td>
									</tr>
									<tr>
										<th>Origin:</th>
										<td><?php echo $row['origin'] ?></td>
									</tr>
									<tr>
										<th>Capacity:</th>
										<td><?php echo $row['capacity'] ?></td>
									</tr>
									<tr>
										<th>Model:</th>
										<td><?php echo $row['model'] ?></td>
									</tr>
									<tr>
										<th>Last Inspaction:</th>
										<td><?php echo $row['inspaction_date'] ?></td>
									</tr>
								</table>
							</div>
						</div>
						<form action="movetoinspaction.php" method="post">
							<div class="row">
								<div class="col-xs-6">
									<div class="form-group">
										<label>Inspection Date</label>
										<input name="ins_date" type="text" class="form-control" id="rndate" value="" size="30" autocomplete="off"/>
									</div>
								</div>
								<div class="col-xs-6">
									<div class="form-group">
										<label>Inspection Status</label>
										<select id="dv" name="status" class="form-control select2">
											<option value="ok">OK</option>
											<option value="idle">Idle</option>
											<option value="breakdown">Breakdown</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<div class="form-group">
										<label for="ad">Remarks</label>
										<textarea id="ad" name="remarks" class="form-control"></textarea>
									</div>
								</div>
							</div>
							<input type="hidden" name="id" value="<?php echo $row['id'] ?>" />
							<input type="hidden" name="product_id" value="<?php echo $row['eel_code'] ?>" />
							<button class="btn btn-block btn-danger" type="submit" name="submit"> Submit</i></button>
						</form>
								</div>
								<div class="col-md-1"></div>
							</div>
							<!-- end row -->
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
