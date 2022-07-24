<?php include('resource/header.php'); ?>
            <!-- Left Sidebar End -->
			<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
			<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
			<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
			
			
		<link href="plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
        <link href="plugins/multiselect/css/multi-select.css"  rel="stylesheet" type="text/css" />
        <link href="plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
        <link href="plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />  
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
<div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <div class="row">
					<form method="post" action="add-assets.php" style="padding:15px;border-radius:5px;min-height:619px;">
                    <div class="col-md-1"></div>
                    <div class="col-md-10" style="background-color:#F3F3F3;padding:10px;border:1px solid gray;border-radius:5px;">
					<center><h5 style="background-color:gray;color:#ffffff;padding:10px;border-radius:5px;">PLANT & EQUIPMENT ENTRY FORM</h5></center>
                        <div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Project<span class="twarning"> is required***</span></label>
									<select class="form-control" id="project_id" name="project_id">
										<option value="">Select Project</option>
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
										<option value="">Select Sub Project</option>
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
										<option value="">Select Project Type</option>
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
									<input type="text" class="form-control" autocomplete="off" name="from_date" id="from_date" class="datepicker">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>To Date</label>
									<input type="text" class="form-control" autocomplete="off" name="to_date" id="to_date" class="datepicker">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Name<span class="twarning"> is required***</span></label>
									<input type="text" class="form-control" id="name" name="name" value="">
								</div>
                            </div>
                            <div class="col-md-4">
								<div class="form-group">
									<label>EEL code<span class="twarning"> is required***</span></label>
									<input type="text" class="form-control" id="eel_code" name="eel_code" value="">
								</div>
                            </div>
                            <div class="col-md-4">
								<div class="form-group">
									<label>Country Of Origin</label>
									<select class="form-control box-size" id="country_of_origin" name="country_of_origin">
										<option value="">Select</option>
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
									<input type="text" class="form-control" id="capacity" name="capacity" value="">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>MakeBy<span class="twarning"> is required***</span></label>
									<input type="text" class="form-control" id="model" name="make_by" value="">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Model<span class="twarning"> is required***</span></label>
									<input type="text" class="form-control" id="model" name="model" value="">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Year of Manufacture</label>
									<select class="form-control box-size" id="year_manufacture" name="year_manufacture">
										<option value="">Select</option>
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
									<input type="text" class="form-control" id="present_location" name="present_location">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Present Condition<span class="twarning"> is required***</span></label>
									<select class="form-control box-size" id="present_condition" name="present_condition">
										<option value="">Select</option>
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
									<textarea class="form-control" id="remarks" name="remarks"></textarea>
								</div>
                            </div>
							<div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" name="save" class="btn btn-success btn-block pull-right">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="col-md-1"></div>
					</form>
                </div>
            </div>
        </div>
</div>

<?php include('resource/footer.php'); ?>

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
				$("#from_date").datepicker({
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
				$("#to_date").datepicker({
						inline: true,
						dateFormat:"yy-mm-dd",
						yearRange:"-50:+10",
						changeYear: true,
						changeMonth: true
				});
			});
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
