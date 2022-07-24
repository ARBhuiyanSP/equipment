<?php include('resource/header.php'); ?>
            <!-- Left Sidebar End -->
			
			<!-- DataTables -->
        <link href="plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>
		
		
		
        <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css" rel="stylesheet" type="text/css"/>
		
		<style>
			tfoot input 
			{
				width: 100%;
				padding: 3px;
				box-sizing: border-box;
			}
			tfoot{display: table-header-group !important;}
		</style>



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
                                    <h4 class="page-title">Plant & Euipment List</h4>
									<!-- <a href="assign-entry.php" class="btn btn-success pull-right">Assign Euipment</a> -->
									<a href="euipment-add.php" class="btn btn-info pull-right">Add New Euipment</a>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->

                        <div class="row">
                           <div class="col-lg-12">
                                <div class="container">
									<table id="example" class="display table table-bordered" style="width:100%">
										<thead>
											<tr>
												<th>Name</th>
												<th>EEL Code</th>
												<th>Capacity</th>
												<th>Make By</th>
												<th>Model</th>
												<th>Assign Status</th>
												<th>Project</th>
												<th width="15%">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php $results = mysqli_query($db, "SELECT * FROM `assets` order by `id`"); 
												  while ($row = mysqli_fetch_array($results)) { ?>
										
										
											<tr>
												<td><?php echo $row['name']; ?></td>
												<td><?php echo $row['eel_code']; ?></td>
												<td><?php echo $row['capacity']; ?></td>
												<td><?php echo $row['makeby']; ?></td>
												<td><?php echo $row['model']; ?></td>
												<td><?php echo $row['assign_status']; ?></td>
												<td><?php echo $row['project_id']; 
												$dataresult =   getDataRowByTableAndId('projects', $row['project_id']);
												echo (isset($dataresult) && !empty($dataresult) ? $dataresult->project_name : '');
												?></td>
												<td>
												<!-- <a href="add-assets.php?del=<?php //echo $row['id']; ?>" class="del_btn" onclick = "if (! confirm('Sure to delete it?')) return false;"><button><i class="fa fa-trash text-danger"></i></button></a> -->
													<a href="equipment_edit.php?id=<?php echo $row['id']; ?>" class="edit_btn"  title='Edit'><button><i class="fa fa-edit text-success"></i></button></a>
													<a href="euipment-view.php?id=<?php echo $row['id']; ?>" class="edit_btn"  title='View'><button><i class="fa fa-eye text-success"></i></button></a>
													<button onclick="window.location.href = 'qrprintview.php?id=<?php echo $row['id'] ?>'" title='QR'><i class="fa fa-print text-success"></i></button>
													<button onclick="window.location.href = 'inspaction.php?id=<?php echo $row['id'] ?>'" title='Inspaction'><i class="fa fa-calendar text-success"></i></button>
												</td>
											</tr>
											
											<?php } ?>
											
											
										</tbody>
										<tfoot>
											<tr>
												<th>Name</th>
												<th>EEL Code</th>
												<th>Capacity</th>
												<th>Make By</th>
												<th>Model</th>
												<th>Assign Status</th>
												<th>Project</th>
											</tr>
										</tfoot>
									</table>
								</div>
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
<script type="text/javascript">
 $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy',
            'csv',
            'excel',
            'pdf',
            {
                extend: 'print',
                text: 'Print all (not just selected)',
                exportOptions: {
                    modifier: {
                        selected: null
                    }
                }
            }
        ],
        select: true
    } );
} );


$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change clear', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );

        </script>

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
		
		
        <script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
		
		
		
	

    </body>
</html>
