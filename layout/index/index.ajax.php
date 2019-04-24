<style>
    .fade-scale {
        transform: scale(0);
        opacity: 0;
        -webkit-transition: all .25s linear;
        -o-transition: all .25s linear;
        transition: all .25s linear;
    }

    .fade-scale.in {
        opacity: 1;
        transform: scale(1);
    }
</style>

<div id="dataModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">cursusgegevens</h4>
            </div>
            <div class="modal-body" id="detailsplan">

            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>


<script>

    function modalFucntion(str, str2, str3) {

        var cid = str;
        var coid = str2;
        var bid = str3;

        var scroll = $('#table').scrollTop();

        $(document).ready(function () {
            $.ajax({
                url: "select.php",
                method: "post",
                data: {cursusid: cid, coid: coid, bid: bid, sl: scroll},
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
