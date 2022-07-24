<?php include('resource/header.php'); 
$id=$_GET['id'];

?>
<style>
.form-horizontal .control-label {
	text-align:left;
}
.select2-container .select2-selection--single {
height:30px !important;
}
.form-control{
	height:30px !important;
}
.twarning{
	font-style:italic;
	font-size:10px;
	color:red;
}
</style>
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
                            <form action="edit_equipment.php" method="post" style="padding:15px;border-radius:5px;min-height:619px;">
							<div class="col-xs-1"></div>
                            <div class="col-xs-10" style="background-color:#F3F3F3;padding:10px;border:1px solid gray;border-radius:5px;">
							<center><h5 style="background-color:gray;color:#ffffff;padding:10px;border-radius:5px;">PLANT EQUIPMENT EDIT FORM</h5></center>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<?php
											$sql    = "select * from assets where id=$id";
											$result = mysqli_query($db, $sql);
											$row    = mysqli_fetch_array($result);
											?>
											<label>Project<span class="twarning"> is required***</span></label>
											<select class="form-control" id="project_id" name="project_id">
												<option value="<?php echo $row['project_id'] ?>"><?php echo $row['project_id'] ?></option>
												<?php
												$tableName = 'projects';
												$column = 'project_name';
												$order = 'asc';
												$dataType = 'obj';
												$projectsData = getTableDataByTableName($tableName, $order, $column, $dataType);
												if (isset($projectsData) && !empty($projectsData)) {
													foreach ($projectsData as $data) {
														?>
														<option value="<?php echo $data->id; ?>"><?php echo $data->project_name; ?></option>
														<?php
													}
												}
												?>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Sub Project<span class="twarning"> is required***</span></label>
											<select class="form-control" id="sub_project_id" name="sub_project_id">
												<option value="<?php echo $row['sub_project_id'] ?>"><?php echo $row['sub_project_id'] ?></option>
												<?php
												$tableName = 'sub_projects';
												$column = 'name';
												$order = 'asc';
												$dataType = 'obj';
												$projectsData = getTableDataByTableName($tableName, $order, $column, $dataType);
												if (isset($projectsData) && !empty($projectsData)) {
													foreach ($projectsData as $data) {
														?>
														<option value="<?php echo $data->id; ?>"><?php echo $data->name; ?></option>
														<?php
													}
												}
												?>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Equipment Type</label>
											<select class="form-control box-size" id="equipment_type" name="equipment_type">
												<option value="<?php echo $row['equipment_type'] ?>"><?php echo $row['equipment_type'] ?></option>
												<?php
												$tableName = 'project_type';
												$column = 'name';
												$order = 'asc';
												$dataType = 'obj';
												$projectsData = getTableDataByTableName($tableName, $order, $column, $dataType);
												if (isset($projectsData) && !empty($projectsData)) {
													foreach ($projectsData as $data) {
														?>
														<option value="<?php echo $data->id; ?>"><?php echo $data->name; ?></option>
														<?php
													}
												}
												?>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>From Date</label>
											<input type="text" class="form-control" autocomplete="off" name="from_date" id="from_date" class="datepicker" value="<?php echo $row['date_from'] ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>To Date</label>
											<input type="text" class="form-control" autocomplete="off" name="to_date" id="to_date" class="datepicker" value="<?php echo $row['date_to'] ?>">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Name<span class="twarning"> is required***</span></label>
											<input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name'] ?>">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>EEL code<span class="twarning"> is required***</span></label>
											<input type="text" class="form-control" id="eel_code" name="eel_code" value="<?php echo $row['eel_code'] ?>">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Country Of Origin</label>
											<select class="form-control box-size" id="country_of_origin" name="country_of_origin">
												<option value="<?php echo $row['origin'] ?>"><?php echo $row['origin'] ?></option>
												<?php
												$tableName = 'country';
												$column = 'nicename';
												$order = 'asc';
												$dataType = 'obj';
												$projectsData = getTableDataByTableName($tableName, $order, $column, $dataType);
												if (isset($projectsData) && !empty($projectsData)) {
													foreach ($projectsData as $data) {
														?>
														<option value="<?php echo $data->id; ?>"><?php echo $data->nicename; ?></option>
														<?php
													}
												}
												?>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Capacity<span class="twarning"> is required***</span></label>
											<input type="text" class="form-control" id="capacity" name="capacity" value="<?php echo $row['capacity'] ?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>MakeBy<span class="twarning"> is required***</span></label>
											<input type="text" class="form-control" id="makeby" name="makeby" value="<?php echo $row['makeby'] ?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Model<span class="twarning"> is required***</span></label>
											<input type="text" class="form-control" id="model" name="model" value="<?php echo $row['model'] ?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Year of Manufacture</label>
											<select class="form-control box-size" id="year_manufacture" name="year_manufacture">
												<option value="<?php echo $row['year_manufacture'] ?>"><?php echo $row['year_manufacture'] ?></option>
												<?php
												$start = date('Y');
												for ($start; $start >= 1950; $start--) {
													?>
													<option value="<?php echo $start; ?>"><?php echo $start; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Present Location<span class="twarning"> is required***</span></label>
											<input type="text" class="form-control" id="present_location" name="present_location" value="<?php echo $row['present_location'] ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Present Condition<span class="twarning"> is required***</span></label>
											<select class="form-control box-size" id="present_condition" name="present_condition">
												<option value="<?php echo $row['present_condition'] ?>"><?php echo $row['present_condition'] ?></option>
												<?php
												$tableName = 'present_condition';
												$column = 'name';
												$order = 'asc';
												$dataType = 'obj';
												$projectsData = getTableDataByTableName($tableName, $order, $column, $dataType);
												if (isset($projectsData) && !empty($projectsData)) {
													foreach ($projectsData as $data) {
														?>
														<option value="<?php echo $data->id; ?>"><?php echo $data->name; ?></option>
														<?php
													}
												}
												?>
											</select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>Remarks</label>
											<textarea class="form-control" id="remarks" name="remarks"><?php echo $row['remarks'] ?></textarea>
										</div>
									</div>
									<input type="hidden" name="id" value="<?php echo $row['id']; ?>"  />
									<div class="col-md-12">
										<div class="form-group">
											<button type="submit" name="submit" class="btn btn-success btn-block pull-right">Update Data</button>
										</div>
									</div>
								</div>
							</div>
                            <div class="col-xs-1"></div>
							</form>
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
				$("#to_date").datepicker({
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
				$("#from_date").datepicker({
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
