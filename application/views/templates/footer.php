<!-- Footer -->

<!-- End of Footer -->
<input type="hidden" id="base_path" value="<?= base_url(); ?>" />
</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('assets'); ?> /vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets'); ?> /vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet" />
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<script src="<?= base_url('assets/vendor/jquery/jquery-2.2.3.min.js')?>"></script>
<script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js')?>"></script>
<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets'); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->


<script>
    function SetActiveDiv(el) {

        var element = $(el).closest('.nav-link collapsed');
        element.toggleClass("active");
    }
</script>
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
    $('.form-check-input').on('click', function() {
        // jquery ambilkan cara class yang bernama form-check-input ketika diklik maka
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url('admin/changeaccess'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
            }
        });
    });
</script>

<!-- <script type="text/javascript">
    $(document).ready(function() {
        var basePath = $("#base_path").val();
        $("#nama_barang").autocomplete({
            source: function(request, cb) {
                console.log(request);

                $.ajax({
                    url: basePath + 'Pengadaan/get_auto/' + request.term,
                    method: 'GET',
                    dataType: 'json',
                    success: function(res) {
                        var result;
                        result = [{
                            label: 'There is no matching record found for ' + request.term,
                            value: ''
                        }];

                        console.log("Before format", res);


                        if (res.length) {
                            result = $.map(res, function(obj) {
                                return {
                                    label: obj.nama_barang,
                                    value: obj.nama_barang,
                                    data: obj
                                };
                            });
                        }

                        console.log("formatted response", result);
                        cb(result);
                    }
                });
            },
            select: function(event, selectedData) {
                console.log(selectedData);

                if (selectedData && selectedData.item && selectedData.item.data) {
                    var data = selectedData.item.data;

                    $('#stok').val(data.stok);
                    $('#id').val(data.id);
                }

            }
        });
    });
</script> -->

</body>

</html>