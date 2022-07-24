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
										<h4 class="page-title">Equipment View</h4>

										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							<!-- end row -->
							<div class="row">
							<?php
							$id = $_GET['id'];
							$sql	=	"select * from `assets` where `id`='$id'";
							$result = mysqli_query($db, $sql);
							$row=mysqli_fetch_array($result);
							?>
                            <div class="col-xs-12">
								<table width='100%'>				
									<tr>
										<td style="text-align:center"><div class="headbody">
											<h1 align="center"><img src="images/logoMenu.png" width="162" height=""></h1>
											<h2 align="center">SAIF POWERTEC LTD</h2>
											<p align="center">95 Bir Uttam AK Khandokar Road,Mohakhali, Dhaka, Bangladesh.</p>
											<h3 align="center">Equipment Details</h3>
										</div></td>
									</tr>
								</table>
								<table style="" class="table table-bordered">
									<tr>
										<th>Name:</th>
										<td>
										<?php echo $row['name'];?>
										</td>
									</tr>
									<tr>
										<th>EEL Code:</th>
										<td><?php echo $row['eel_code'] ?></td>
									</tr>
									<tr>
										<th>Project name:</th>
										<?php
										$project_id = $row['project_id'];
										$sqlpn	=	"select `project_name` from `projects` where `id`='$project_id'";
										$resultpn = mysqli_query($db, $sqlpn);
										$rowpn=mysqli_fetch_array($resultpn);
										?>
										<td><?php echo $rowpn['project_name'] ?></td>
									</tr>
									<tr>
										<th>Sub Project Name:</th>
										<?php
										if($row['sub_project_id']){
										$pro_id = $row['sub_project_id'];
										$sqlspn	=	"select `name` from `sub_projects` where `id`='$pro_id'";
										$resultspn = mysqli_query($db, $sqlspn);
										$rowspn=mysqli_fetch_array($resultspn);?>
										<td><?php if($rowspn['name']){echo $rowspn['name'];} ?></td>
										<?php } else{?>
										<td></td>
										<?php }?>
										
									</tr>
									<tr>
										<th>Current Location:</th>
										<td><?php echo $row['present_location'] ?></td>
									</tr>
									<tr>
										<th>Current Condition:</th>
										<?php
										$present_condition = $row['present_condition'];
										$sqlpc	=	"select * from `present_condition` where `id`='$present_condition'";
										$resultpc = mysqli_query($db, $sqlpc);
										$rowpc=mysqli_fetch_array($resultpc);
										?>
										<td><?php echo $rowpc['name'] ?></td>
									</tr>
									<tr>
										<th>Model:</th>
										<td><?php echo $row['model'] ?></td>
									</tr>
								</table>
							</div>
                            <div class="col-xs-6">
								<img src="<?php echo $row['qr_image'] ?>" height="250" />
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
