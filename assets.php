<?php include('resource/header.php');
include('add-assets.php'); 

	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		
	
		
		$sqlup	= "SELECT * FROM assets WHERE id=$id";
		$resultup = mysqli_query($db, $sqlup);
		$update = true;
		$n=mysqli_fetch_array($resultup);
		
		
			$category_id 			= $n['category'];
			$brand 					= $n['brand'];
			$model 					= $n['model'];
			$quality 				= $n['quality'];
			$warrenty 				= $n['warrenty'];
			$owner 					= $n['owner'];
			$floor 					= $n['floor'];
			$user 					= $n['user'];
			$inventory_sl_no 		= $n['inventory_sl_no'];
			$purchase_date 			= $n['purchase_date'];
			$ins_date 				= $n['inspaction_date'];
			$year_manufacture 		= $n['year_manufacture'];
			$price 					= $n['price'];
			$bill_note_req_rlp_no 	= $n['bill_note_req_rlp_no'];
			$origin 				= $n['origin'];
	}
?>

         <!-- -->
        <link href="plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
		<link href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
		<link href="plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
		<link href="plugins/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
		<link href="plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
		<!-- Plugins css-->
        <link href="plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
        <link href="plugins/multiselect/css/multi-select.css"  rel="stylesheet" type="text/css" />
        <link href="plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
        <link href="plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
		<!-- DataTables -->
        <link href="plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>


            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


								

                        <div class="row">
							
                            <div class="col-sm-5 card-box">
								<form method="post" action="add-assets.php" style="padding:15px;border-radius:5px;min-height:619px;">
									<center><h5 style="background-color:gray;color:#ffffff;padding:5px;border-radius:5px;">PLANT EQUIPMENT ENTRY FORM</h5></center>
									<?php if (isset($_SESSION['message'])): ?>
									<div class="msg">
										<?php 
											echo $_SESSION['message']; 
											unset($_SESSION['message']);
										?>
									</div>
									<?php endif ?>
									<input type="hidden" name="id" value="<?php echo $id; ?>">
									<div class="row">
										<div class="col-xs-4">
											<div class="form-group">
												<label>CATEGORY</label>
												<select id="dv" name="category_id" class="select2 form-control">
													<option value="<?php echo $category_id ?>"><?php echo $category_id ?></option>
													<?php 
													$sqld	= "select id,assets_category from categories ORDER BY id ASC";
													$resultd = mysqli_query($db, $sqld);
													while($rowd=mysqli_fetch_array($resultd))
														{
													?>
													<option value="<?php echo $rowd['assets_category'] ?>"><?php echo $rowd['assets_category'] ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
										<div class="col-xs-4">
											<div class="form-group">
												<label>TYPE</label>
												<select id="dv" name="quality" class="form-control select2">
													<option value="<?php echo $quality ?>"><?php echo $quality ?></option>
													<option value="New">New</option>
													<option value="Old">Old</option>
												</select>
											</div>
										</div>
										<div class="col-xs-4">
											<div class="form-group">
												<label>BRAND</label>
												<input type="text" name="brand" class="form-control" value="<?php echo $brand; ?>" autocomplete="off">
											</div>
										</div>
										<div class="col-xs-4">
											<div class="form-group">
												<label>MODEL NO</label>
												<input type="text" name="model" class="form-control" value="<?php echo $model; ?>" autocomplete="off">
											</div>
										</div>
										<div class="col-xs-4">
											<div class="form-group">
												<label>WARRENTY</label>
												<input type="text" name="warrenty" class="form-control" value="<?php echo $warrenty; ?>" autocomplete="off">
											</div>
										</div>
										<div class="col-xs-4">
											<div class="form-group">
												<label>PRICE</label>
												<input type="text" name="price" class="form-control" value="<?php echo $price; ?>" autocomplete="off">
											</div>
										</div>
										<div class="col-xs-4">
											<div class="form-group">
												<label>DIVISION</label>
												<select id="dv" name="owner" class="form-control select2">
													<option value="<?php echo $owner ?>"><?php echo $owner ?></option>
													<?php 
													$sqldg	= "select id,division_name from divisions ORDER BY id ASC";
													$resultdg = mysqli_query($db, $sqldg);
													while($rowdg=mysqli_fetch_array($resultdg))
														{
													?>
													<option value="<?php echo $rowdg['division_name'] ?>"><?php echo $rowdg['division_name'] ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
										<div class="col-xs-4">
											<div class="form-group">
												<label>DEPARTMENT</label>
												<select id="dv" name="dept" class="form-control select2">
													<option value="<?php echo $dept ?>"><?php echo $dept ?></option>
													<?php 
													$sqldpt	= "select id,dept_name from departments ORDER BY id ASC";
													$resultdpt = mysqli_query($db, $sqldpt);
													while($rowdpt=mysqli_fetch_array($resultdpt))
														{
													?>
													<option value="<?php echo $rowdpt['dept_name'] ?>"><?php echo $rowdpt['dept_name'] ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
										<div class="col-xs-4">
											<div class="form-group">
												<label>Floor</label>
												<select id="dv" name="floor" class="form-control select2">
													<option value="<?php echo $floor ?>"><?php echo $floor ?></option>
													<option value="KT-14">KT-14</option>
													<option value="KT-13">KT-13</option>
													<option value="KT-12">KT-12</option>
													<option value="KT-05">KT-05</option>
													<option value="KT-03">KT-03</option>
													<option value="KT-02">KT-02</option>
												</select>
											</div>
										</div>
										<div class="col-xs-4">
											<div class="form-group">
												<label>User</label>
												<select id="dv" name="user" class="form-control select2">
													<option value="<?php echo $user ?>"><?php echo $user ?></option>
													<?php 
													$sqldg	= "select employee_id,employee_name from employees ORDER BY id ASC";
													$resultdg = mysqli_query($db, $sqldg);
													while($rowdg=mysqli_fetch_array($resultdg))
														{
													?>
													<option value="<?php echo $rowdg['employee_id'] ?>"><?php echo $rowdg['employee_id'] ?> | <?php echo $rowdg['employee_name'] ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
										<div class="col-xs-4">
											<div class="form-group">
												<label style="">INV SL NO<span style="color:red;"> *</span></label>
												<input type="text" name="inventory_sl_no" class="form-control" value="<?php echo $inventory_sl_no; ?>" autocomplete="off" required >
											</div>
										</div>
										<div class="col-xs-4">
											<div class="form-group">
												<label>PURCHASE DATE</label>
												<input type="text" name="purchase_date" class="form-control" id="datepicker" value="<?php echo $purchase_date; ?>" autocomplete="off">
											</div>
										</div>
										<div class="col-xs-4">
											<div class="form-group">
												<label>MANUFACTURE YEAR</label>
												<input type="text" name="year_manufacture" class="form-control" value="<?php echo $year_manufacture; ?>" autocomplete="off">
											</div>
										</div>
										<div class="col-xs-4">
											<div class="form-group">
												<label>Bill/Note/Req/RLP No</label>
												<input type="text" name="bill_note_req_rlp_no" class="form-control" value="<?php echo $bill_note_req_rlp_no; ?>" autocomplete="off">
											</div>
										</div>
										<div class="col-xs-4">
											<div class="form-group">
												<label>COUNTRY OF ORIGIN</label>
												<input type="text" name="origin" class="form-control" value="<?php echo $origin; ?>" autocomplete="off">
											</div>
										</div>
										<div class="col-xs-12">
											<div class="form-group">
												<?php if ($update == true): ?>
													<button class="btn btn-info btn-block" type="submit" name="update" style="background: #556B2F;" >update</button>
												<?php else: ?>
													<button class="btn btn-success btn-block" type="submit" name="save" >Save</button>
												<?php endif ?>
											</div>
										</div>
									</div>
								</form>
							</div>
                            <div class="col-sm-7">
                                <div class="card-box table-responsive">
                                    <div style="text-align:center;">
										<button class="btn btn-info" onclick="window.location.href = 'allview.php'" class=''> Print QR of All Assets <i class="fa fa-eye text-success"></i></button>
										<button class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">Assets Code</button>
									</div>
									<h4 class="m-t-0 header-title"><b>Assets List</b></h4>
                                    <?php $results = mysqli_query($db, "SELECT * FROM assets order by id"); ?>
									<table id="datatable-buttons" class="table table-striped table-bordered">
										<thead>
											<tr>
												<th>INVENTORY SL NO</th>
												<th>CATEGORY</th>
												<th>OWNER</th>
												<th>USER</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										<?php while ($row = mysqli_fetch_array($results)) { ?>
											<tr>
												<td><?php echo $row['inventory_sl_no']; ?></td>
												<td><?php echo $row['category']; ?></td>
												<td><?php echo $row['owner']; ?></td>
												<td><?php echo $row['user']; ?></td>
												
												<td>
													<!-- <a href="add-assets.php?del=<?php //echo $row['id']; ?>" class="del_btn" onclick = "if (! confirm('Sure to delete it?')) return false;"><button><i class="fa fa-trash text-danger"></i></button></a> -->
													<a href="assets.php?edit=<?php echo $row['id']; ?>" class="edit_btn"  title='Edit'><button><i class="fa fa-edit text-success"></i></button></a>
													<a href="assets-view.php?id=<?php echo $row['inventory_sl_no']; ?>" class="edit_btn"  title='View'><button><i class="fa fa-eye text-success"></i></button></a>
													<button onclick="window.location.href = 'qrprintview.php?id=<?php echo $row['id'] ?>'" title='QR'><i class="fa fa-print text-success"></i></button>
													<button onclick="window.location.href = 'inspaction.php?id=<?php echo $row['id'] ?>'" title='Inspaction'><i class="fa fa-calendar text-success"></i></button>
												</td>
											</tr>
										<?php } ?>
										</tbody>
									</table>
                                </div>
                            </div>
                        </div>
                    </div> <!-- container -->

                </div> <!-- content -->

                <?php include('resource/footer.php'); ?>
            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Assets Code List</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Assets Category</th>
									<th>Code</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$resultcode = mysqli_query($db, "SELECT * FROM `categories` order by id");
								while ($rowcode = mysqli_fetch_array($resultcode)) { ?>
								<tr>
									<td><?php echo $rowcode['assets_category']; ?></td>
									<td><?php echo $rowcode['cat_id']; ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div><!-- /.modal -->

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
		
		
		<script src="plugins/moment/moment.js"></script>
     	<script src="plugins/timepicker/bootstrap-timepicker.js"></script>
     	<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
     	<script src="plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
     	<script src="plugins/clockpicker/js/bootstrap-clockpicker.min.js"></script>
     	<script src="plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
		<!-- Init js -->
        <script src="assets/pages/jquery.form-pickers.init.js"></script>
		
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

        <!-- init -->
        <script src="assets/pages/jquery.datatables.init.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

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
                    ajax: "plugins/datatables/json/scroller-demo.json",
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


    </body>
</html>