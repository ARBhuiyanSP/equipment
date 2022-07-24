<?php
include('resource/header.php');
include('add-projects.php');

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($db, "SELECT * FROM `projects` WHERE `id`='$id'");

   
        $n = mysqli_fetch_array($record);
        $name = $n['project_name'];
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
                        <h4 class="page-title">Projects </h4>
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
                    <form method="post" action="add-projects.php" >
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="form-group">
                            <label>Project Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
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
                        <h4 class="m-t-0 header-title"><b>Project List</b></h4>
						<?php $results = mysqli_query($db, "SELECT * FROM `projects` order by `id`"); ?>
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
									<?php while ($row = mysqli_fetch_array($results)) { ?>
                                    <tr>
                                        <td><?php echo $row['project_name']; ?></td>
                                        <td>
                                            <a href="projects.php?edit=<?php echo $row['id']; ?>" class="edit_btn" ><button><i class="fa fa-edit text-success"></i></button></a>

                                            <a href="add-projects.php?del=<?php echo $row['id']; ?>" class="del_btn" onclick = "if (!confirm('Sure to delete it?'))
                                                                                                                        return false;"><button><i class="fa fa-trash text-danger"></i></button></a>
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