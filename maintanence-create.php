<?php include('resource/header.php');


include 'maintanence.php';
$maintanence = new Maintanence(); 
if(!empty($_POST['companyName']) && $_POST['companyName']) {	
	$maintanence->saveMaintanence($_POST);
	header("Location:maintanence_list.php");	
}
?>
            <!-- Left Sidebar End -->
			<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
			<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
			<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
			<script src="assets/js/maintanence.js"></script>
			
<style>

</style>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content it_bg">
                    <div class="container">
							<div class="row">
								<div class="col-xs-12">
									<div class="container content-invoice">
									<form action="" id="invoice-form" method="post" class="invoice-form" role="form" novalidate=""> 
										<div class="load-animate animated fadeInUp">
											
											<input id="currency" type="hidden" value="$">
											<div class="row">
												<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
													<h3>From,</h3>
													<?php echo $_SESSION['user']; ?><br>	
													<?php echo $_SESSION['address']; ?><br>	
													<?php echo $_SESSION['mobile']; ?><br>
													<?php echo $_SESSION['email']; ?><br>	
												</div>      		
												<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pull-right">
													<h3>To,</h3>
													<div class="form-group">
														<input type="text" class="form-control" name="companyName" id="companyName" placeholder="Project Name" autocomplete="off">
													</div>
													<div class="form-group">
														<textarea class="form-control" rows="3" name="address" id="address" placeholder="Your Address"></textarea>
													</div>
													
												</div>
											</div>
											<div class="row">
												<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
													<table class="table table-bordered table-hover" id="invoiceItem">	
														<tr>
															<th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>
															<th width="15%">Item No</th>
															<th width="38%">Item Name</th>
															<th width="15%">Quantity</th>
															<th width="15%">Price</th>								
															<th width="15%">Total</th>
														</tr>							
														<tr>
															<td><input class="itemRow" type="checkbox"></td>
															<td><input type="text" name="productCode[]" id="productCode_1" class="form-control" autocomplete="off"></td>
															<td><input type="text" name="productName[]" id="productName_1" class="form-control" autocomplete="off"></td>			
															<td><input type="number" name="quantity[]" id="quantity_1" class="form-control quantity" autocomplete="off"></td>
															<td><input type="number" name="price[]" id="price_1" class="form-control price" autocomplete="off"></td>
															<td><input type="number" name="total[]" id="total_1" class="form-control total" autocomplete="off"></td>
														</tr>						
													</table>
												</div>
											</div>
											<div class="row">
												<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
													<button class="btn btn-danger delete" id="removeRows" type="button"><i class="fa fa-trash"></i> Delete</button>
													<button class="btn btn-success" id="addRows" type="button">+ Add More</button>
												</div>
												<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
													<span class="form-inline">
														<div class="form-group">
															<label>Subtotal: &nbsp;</label>
															<div class="input-group">
																<div class="input-group-addon currency">$</div>
																<input value="" type="number" class="form-control" name="subTotal" id="subTotal" placeholder="Subtotal">
															</div>
														</div>
													</span>
												</div>
											</div>
											<div class="row">	
												<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
													<h3>Notes: </h3>
													<div class="form-group">
														<textarea class="form-control txt" rows="5" name="notes" id="notes" placeholder="Your Notes"></textarea>
													</div>
													<br>
													<div class="form-group">
														<input type="hidden" value="<?php echo $_SESSION['userid']; ?>" class="form-control" name="userId">
														<input data-loading-text="Saving Invoice..." type="submit" name="invoice_btn" value="Save Invoice" class="btn btn-block btn-success submit_btn invoice-save-btm">						
													</div>
													
												</div>
												<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
													<span class="form-inline">
														
														<div class="form-group">
															<label>Tax Rate: &nbsp;</label>
															<div class="input-group">
															<div class="input-group-addon">%</div>
																<input value="" type="number" class="form-control" name="taxRate" id="taxRate" placeholder="Tax Rate">
																
															</div>
														</div>
														<div class="form-group">
															<label>Tax Amount: &nbsp;</label>
															<div class="input-group">
																<div class="input-group-addon currency">$</div>
																<input value="" type="number" class="form-control" name="taxAmount" id="taxAmount" placeholder="Tax Amount">
															</div>
														</div>							
														<div class="form-group">
															<label>Total: &nbsp;</label>
															<div class="input-group">
																<div class="input-group-addon currency">$</div>
																<input value="" type="number" class="form-control" name="totalAftertax" id="totalAftertax" placeholder="Total">
															</div>
														</div>
														<div class="form-group">
															<label>Amount Paid: &nbsp;</label>
															<div class="input-group">
																<div class="input-group-addon currency">$</div>
																<input value="" type="number" class="form-control" name="amountPaid" id="amountPaid" placeholder="Amount Paid">
															</div>
														</div>
														<div class="form-group">
															<label>Amount Due: &nbsp;</label>
															<div class="input-group">
																<div class="input-group-addon currency">$</div>
																<input value="" type="number" class="form-control" name="amountDue" id="amountDue" placeholder="Amount Due">
															</div>
														</div>
													</span>
												</div>
											</div>
											<div class="clearfix"></div>		      	
										</div>
									</form>			
									</div>
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
