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

     // $(document).ready(function(){
     //     load_data();
     //     function load_data(page)
     //     {
     //         $.ajax({
     //             url:"pagination.php",
     //             method:"POST",
     //             data:{page:page},
     //             success:function(data){
     //                 $('#pagination_data').html(data);
     //             }
     //         })
     //     }
     //     $(document).on('click', '.pagination_link', function(){
     //         var page = $(this).attr("id");
     //         load_data(page);
     //     });
     // });


    function modalFucntion(str, str2, str3) {

        var cid = str;
        var coid = str2;
        var bid = str3;


        $(document).ready(function () {
            $.ajax({
                url: "select.php",
                method: "post",
                data: {cursusid: cid, coid: coid, bid: bid},
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
