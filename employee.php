<?php include('resource/header.php');
include('add-employee.php'); 

	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM employees WHERE id=$id");

		if (count($record) == 1 ) {
			$n           	= mysqli_fetch_array($record);
			$employee_id 	= $n['employee_id'];
			$employee_name 	= $n['employee_name'];
			$division 		= $n['division'];
			$department 	= $n['department'];
			$designation 	= $n['designation'];
		}
	}
?>

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
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Employee </h4>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-sm-3">
								<?php if (isset($_SESSION['message'])): ?>
								<div class="msg">
									<?php 
										echo $_SESSION['message']; 
										unset($_SESSION['message']);
									?>
								</div>
								<?php endif ?>
								<form method="post" action="add-employee.php" >
									<input type="hidden" name="id" value="<?php echo $id; ?>">
									<div class="form-group">
										<label>Employee ID</label>
										<input type="text" name="employee_id" class="form-control" value="<?php echo $employee_id; ?>" autocomplete="off">
									</div>
									<div class="form-group">
										<label>Employee Name</label>
										<input type="text" name="employee_name" class="form-control" value="<?php echo $employee_name; ?>" autocomplete="off">
									</div>
									<div class="form-group">
										<label>Division</label>
										<select id="dv" name="division" class="select2 form-control">
											<option>Select Division</option>
											<?php 
											$sqld	= "select id,division_name from divisions ORDER BY id ASC";
											$resultd = mysqli_query($db, $sqld);
											while($rowd=mysqli_fetch_array($resultd))
												{
											?>
											<option value="<?php echo $rowd['id'] ?>"><?php echo $rowd['division_name'] ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label>Department</label>
										<select id="dv" name="department" class="form-control select2">
											<option>Select Department</option>
											<?php 
											$sqldpt	= "select id,dept_name from departments ORDER BY id ASC";
											$resultdpt = mysqli_query($db, $sqldpt);
											while($rowdpt=mysqli_fetch_array($resultdpt))
												{
											?>
											<option value="<?php echo $rowdpt['id'] ?>"><?php echo $rowdpt['dept_name'] ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label>Designation</label>
										<select id="dv" name="designation" class="form-control select2">
											<option>Select Designation</option>
											<?php 
											$sqldg	= "select id,deg_name from designations ORDER BY id ASC";
											$resultdg = mysqli_query($db, $sqldg);
											while($rowdg=mysqli_fetch_array($resultdg))
												{
											?>
											<option value="<?php echo $rowdg['id'] ?>"><?php echo $rowdg['deg_name'] ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<?php if ($update == true): ?>
											<button class="btn btn-info" type="submit" name="update" style="background: #556B2F;" >update</button>
										<?php else: ?>
											<button class="btn btn-success" type="submit" name="save" >Save</button>
										<?php endif ?>
									</div>
								</form>
							</div>
                            <div class="col-sm-9">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title"><b>Employee List</b></h4>
                                    <?php $results = mysqli_query($db, "SELECT * FROM employees order by id"); ?>
									<table id="datatable-buttons" class="table table-striped table-bordered">
										<thead>
											<tr>
												<th>Employee ID</th>
												<th>Employee Name</th>
												<th>Division</th>
												<th>Department</th>
												<th>Designation</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										<?php while ($row = mysqli_fetch_array($results)) { ?>
											<tr>
												<td><?php echo $row['employee_id']; ?></td>
												<td><?php echo $row['employee_name']; ?></td>
												<td>
													<?php 
													$div_id=$row['division'];
													$sqldiv	= "select division_name from divisions where id=$div_id";
													$resultdiv = mysqli_query($db, $sqldiv);
													$rowdiv=mysqli_fetch_array($resultdiv);
													echo $rowdiv['division_name'];
													?>
												</td>
												<td><?php 
													$dept_id=$row['department'];
													$sqldept	= "select dept_name from departments where id=$dept_id";
													$resultdept = mysqli_query($db, $sqldept);
													$rowdept=mysqli_fetch_array($resultdept);
													echo $rowdept['dept_name'];
													?></td>
												<td><?php 
													$deg_id=$row['designation'];
													$sqldeg	= "select deg_name from designations where id=$deg_id";
													$resultdeg = mysqli_query($db, $sqldeg);
													$rowdeg=mysqli_fetch_array($resultdeg);
													echo $rowdeg['deg_name'];
													?></td>
												<td>
													<a href="employee.php?edit=<?php echo $row['id']; ?>" class="edit_btn" ><button><i class="fa fa-edit text-success"></i></button></a>
												
													<a href="add-employee.php?del=<?php echo $row['id']; ?>" class="del_btn" onclick = "if (! confirm('Sure to delete it?')) return false;"><button><i class="fa fa-trash text-danger"></i></button></a>
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


            <!-- Right Sidebar -->
            <div class="side-bar right-bar">
                <a href="javascript:void(0);" class="right-bar-toggle">
                    <i class="mdi mdi-close-circle-outline"></i>
                </a>
                <h4 class="">Settings</h4>
                <div class="setting-list nicescroll">
                    <div class="row m-t-20">
                        <div class="col-xs-8">
                            <h5 class="m-0">Notifications</h5>
                            <p class="text-muted m-b-0"><small>Do you need them?</small></p>
                        </div>
                        <div class="col-xs-4 text-right">
                            <input type="checkbox" checked data-plugin="switchery" data-color="#7fc1fc" data-size="small"/>
                        </div>
                    </div>

                    <div class="row m-t-20">
                        <div class="col-xs-8">
                            <h5 class="m-0">API Access</h5>
                            <p class="m-b-0 text-muted"><small>Enable/Disable access</small></p>
                        </div>
                        <div class="col-xs-4 text-right">
                            <input type="checkbox" checked data-plugin="switchery" data-color="#7fc1fc" data-size="small"/>
                        </div>
                    </div>

                    <div class="row m-t-20">
                        <div class="col-xs-8">
                            <h5 class="m-0">Auto Updates</h5>
                            <p class="m-b-0 text-muted"><small>Keep up to date</small></p>
                        </div>
                        <div class="col-xs-4 text-right">
                            <input type="checkbox" checked data-plugin="switchery" data-color="#7fc1fc" data-size="small"/>
                        </div>
                    </div>

                    <div class="row m-t-20">
                        <div class="col-xs-8">
                            <h5 class="m-0">Online Status</h5>
                            <p class="m-b-0 text-muted"><small>Show your status to all</small></p>
                        </div>
                        <div class="col-xs-4 text-right">
                            <input type="checkbox" checked data-plugin="switchery" data-color="#7fc1fc" data-size="small"/>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Right-bar -->

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