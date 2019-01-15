<script>
    function modalFucntion(str, str2) {

        var cid = str;
        var coid = str2;


        $(document).ready(function () {
            $.ajax({
                url: "select.php",
                method: "post",
                data: {cursusid: cid, coid: coid},
                success: function (data) {
                    $('#detailsplan').html(data);
                    $('#dataModal').modal("show");
                }
            });
        });
    }

    $('#dataModal').on('hidden.bs.modal', function () {
        location.reload();
    })

</script>

<div id="dataModal" class="modal fade ">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">cursusgegevens</h4>
            </div>
            <div class="modal-body" id="detailsplan">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Sluiten</button>
            </div>
        </div>
    </div>
</div>