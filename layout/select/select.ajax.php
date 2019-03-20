<?php
/**
 * Created by PhpStorm.
 * User: jkruijt
 * Date: 19/12/2018
 * Time: 09:10
 */
?>


<script>
    function updateFucntion(vid, coid, cid, bid) {

        var VeldID = vid;
        var CursusonderdeelID = coid;
        var CursusID = cid;
        var BedrijfID = bid;


        $(document).ready(function () {
            $.ajax({
                url: "backgroundcel.php",
                method: "post",
                data: {VeldID: VeldID, CursusonderdeelID: CursusonderdeelID, CursusID: CursusID, BedrijfID: BedrijfID},
                success: function (data) {
                    $('#test').html(data);
                        $.ajax({
                            url: "select.php",
                            method: "post",
                            data: {cursusid: CursusID, coid: CursusonderdeelID, bid: BedrijfID},
                            success: function (data) {
                                $('#detailsplan').html(data);
                                $('#dataModal').modal("show");
                            }
                        });
                }
            });
        });
    }

    function deletefunction() {

    }
</script>