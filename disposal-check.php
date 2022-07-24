<?php include('resource/header.php'); ?>
<!-- Left Sidebar End -->
			<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
			<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
			<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<link href="plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">


		
		
        <!-- Left Sidebar End -->



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
                                    <h4 class="page-title"></h4>
                                    
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->


                        


                        <div class="row">
                            <div class="col-sm-12">	
							<div class="wrapper-page">

								<div class="m-t-40 account-pages" style="border:1px solid gray;border-radius:5px;background-color:#f5faf3;">
									<div class="text-center account-logo-box">
										<h2 class="text-uppercase">
											<a href="index.php" class="text-success" style="font-family:algerian;color:#fff;">
												Disposed Products Check
											</a>
										</h2>
										<!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
									</div>
									<div class="account-content">
										<form class="form-horizontal" name="contact_form" id="contact_form" method="post" action="disposalview.php">

											<div class="form-group">
												<label>Date From : </label>
												<input type="text" class="form-control" name="fromdate" id="fromdate" autocomplete="off">
											</div>    
											<div class="form-group">
												<label>Date To : </label>
												<input type="text" class="form-control" name="todate" id="todate" autocomplete="off">
											</div>
											<div class="form-group ">
												
												<div class="form-group account-btn text-center m-t-30">
													<div class="col-xs-12">
														<button class="btn btn-block btn-bordered btn-danger waves-effect waves-light" name="submit" type="submit">Search</button>
													</div>
												</div>
											</div>

										</form>

										<div class="clearfix"></div>

									</div>
								</div>
								<!-- end card-box-->

							</div>	
								
								
								
								
                            </div>
                        </div>
                        <!-- end row -->



                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                   2018 - <?php echo date('Y'); ?> © <a href="" target="blank">Saif Powertec</a>
                </footer>

            </div>

<script>
				$(function() {
				$("#fromdate").datepicker({
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
				$("#todate").datepicker({
						inline: true,
						dateFormat:"yy-mm-dd",
						yearRange:"-50:+10",
						changeYear: true,
						changeMonth: true
				});
			});
			</script>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->



        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>

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
                                            