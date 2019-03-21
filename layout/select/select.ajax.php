<?php
/**
 * Created by PhpStorm.
 * User: jkruijt
 * Date: 19/12/2018
 * Time: 09:10
 */
?>


<script>

    function deletefunction(opid, coid, cid, bid, vid) {

        var VeldID = vid;
        var opmerkingid = opid;
        var CursusID = cid;
        var CursusonderdeelID = coid;
        var BedrijfID = bid;

        $(document).ready(function () {
            $.ajax({
                url: 'layout/select/select.delete.php',
                method: 'post',
                data: {
                    opmerkingid: opmerkingid,
                    CursusonderdeelID: CursusonderdeelID,
                    CursusID: CursusID,
                    BedrijfID: BedrijfID,
                    VeldID: VeldID
                },
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
            })
        })
    }

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


</script>