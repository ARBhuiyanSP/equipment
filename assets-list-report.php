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
		

			
		
<style>
tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
</style>





            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <!-- end row -->
						<div class="row">
							<div class="col-sm-12">
								<form action="" method="post">
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label>Project</label>
												<select class="form-control" id="project_id" name="project_id">
														<option value="all">All Project</option>
														<?php $results = mysqli_query($db, "SELECT * FROM `projects`"); 
														while ($row = mysqli_fetch_array($results)) { ?>
														<option value="<?php echo $row['id']; ?>"><?php echo $row['project_name']; ?></option>
														<?php } ?>
												</select>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Make By</label>
												<select class="form-control" id="makeby" name="makeby">
														<option value="all">All Brand</option>
														<option value="DENAIR">DENAIR</option>
														<option value="ULTRATEX">ULTRATEX</option>
														<option value="VOGLEE">VOGLEE</option>
														<option value="TTM">TTM</option>
														<option value="CASE">CASE</option>
														<option value="ZENITH">ZENITH</option>
														<option value="ZOOMLION">ZOOMLION</option>
														<option value="LOCAL">LOCAL</option>
														<option value="POWER PLUS">POWER PLUS</option>
														<option value="LIUGONG">LIUGONG</option>
														<option value="NICOL">NICOL</option>
														<option value="XCMG">XCMG</option>
														<option value="DAWEOO">DAWEOO</option>
														<option value="SIFANG">SIFANG</option>
														<option value="FUJIAN">FUJIAN</option>
														<option value="MINDONG">MINDONG</option>
														<option value="TEKSAN">TEKSAN</option>
														<option value="PRAMAC">PRAMAC</option>
														<option value="STARKE">STARKE</option>
														<option value="IHC-BEAVER">IHC-BEAVER</option>
														<option value="Longking">Longking</option>
														<option value="JULONG">JULONG</option>
														<option value="SINO">SINO</option>
														<option value="EICHER">EICHER</option>
														<option value="DOOSAN">DOOSAN</option>
														<option value="SOOSAN">SOOSAN</option>
														<option value="TATA">TATA</option>
														<option value="ACE">ACE</option>
														<option value="HAMM">HAMM</option>
														<option value="JUNMA">JUNMA</option>
														<option value="AMYTECH">AMYTECH</option>
														<option value="SONALIKA">SONALIKA</option>
														<option value="TAFE">TAFE</option>
														<option value="Changling">Changling</option>
														<option value="Euro">Euro</option>
												</select>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-12">
											<input type="submit" name="submit" id="submit" class="btn btn-block btn-primary" value="Request" />
										</div>
									</div>
								</form>
							</div>
							 <?php
if(isset($_POST['submit'])){
	$assign_status	= 'assigned';
	//$origin			= $_POST['origin'];
	$project_id		= $_POST['project_id'];
	$makeby			= $_POST['makeby'];
	
	//query from db
	
	$resultSet = mysqli_query($db, "SELECT * FROM `assets` WHERE `assign_status` =  '$assign_status'".($project_id!='all'?" AND `project_id` = '$project_id'":'')." ".($makeby!='all'?" AND `makeby` = '$makeby'":'')." ");
	$count = $resultSet->num_rows;
	
/* 	echo "<pre>";
print_r($resultSet);
echo "</pre>"; */
	
	if($resultSet->num_rows > 0){
		echo "<div id='printableArea'><center><h1 align='center'><img src='images/logoMenu.png' height='50' style='padding-top:10px'></h1><h2>SAIF POWERTEC LIMITED</h2><p>72,Mohakhali C/A, (8th Floor),Rupayan Center,Dhaka-1212,bangladesh</p><h3>Equipment List Report</h3>Total Equipment: $count</center>";
		echo "<table id='rlp_list_table' class='table table-bordered table-striped list-table-custom-style'>
		<tr>
			<th>SL No</th>
			<th>Name</th>
			<th>EEl Code</th>
			<th>Origin</th>
			<th>Capacity</th>
			<th>Make By</th>
			<th>Model</th>
			<th>project</th>
		</tr>";

		$i = 0;
		while($rows = $resultSet->fetch_assoc()) {
			$i++;
			echo "<tr><td>" . $i . "</td>
					<td>" . $rows['name'] . "</td>
					<td>" . $rows['eel_code'] . "</td>
					<td>" . $rows['origin'] . "</td>
					<td>" . $rows['capacity'] . "</td>
					<td>" . $rows['makeby'] . "</td>
					<td>" . $rows['model'] . "</td>
					<td>" . $rows['project_id'] . "</td>
				</tr>";
			
		}
		echo "</table></div>";
	}
	else{
		echo "<center>No Result</center>";
	}
}
?>
<div class="row">
	<div class="col-sm-12">
		<center>
			<a class="btn btn-default" onclick="printDiv('printableArea')" value="print a div!">
				<i class="fa fa-print"></i> Print 
			</a>
		</center>
		<script>
		function printDiv(divName) {
			 var printContents = document.getElementById(divName).innerHTML;
			 var originalContents = document.body.innerHTML;

			 document.body.innerHTML = printContents;

			 window.print();

			 document.body.innerHTML = originalContents;
		}
		</script>
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
