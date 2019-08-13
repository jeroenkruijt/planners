<?php
/**
 * Created by PhpStorm.
 * User: jkruijt
 * Date: 19/12/2018
 * Time: 09:10
 */
?>


<script>


    function deletefunction(opid, coid, cid, bid, vid, mop) {

        var VeldID = vid;
        var opmerkingid = opid;
        var CursusID = cid;
        var CursusonderdeelID = coid;
        var BedrijfID = bid;
        var massaopmerking = mop;

        var optie = '0';

        $(document).ready(function () {
            $.ajax({
                url: 'layout/select/select.delete.php',
                method: 'post',
                data: {
                    opmerkingid: opmerkingid,
                    CursusonderdeelID: CursusonderdeelID,
                    CursusID: CursusID,
                    BedrijfID: BedrijfID,
                    VeldID: VeldID,
                    optie: optie,
                    massaopmerking: massaopmerking
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

    function opFunction(str, str2, str3) {

        var coid = str;
        var cid = str2;
        var bid = str3;

        var optie = '1';

        $(document).ready(function () {
            $.ajax({
                url: "select.php",
                method: "post",
                data: {cursusid: cid, coid: coid, bid: bid, optie: optie},
                success: function (data) {
                    $('#detailsplan').html(data);
                    $('#dataModal').modal("show");

                }
            });
        });
    }

    function updateFucntion(vid, coid, cid, bid) {

        var VeldID = vid;
        var CursusonderdeelID = coid;
        var CursusID = cid;
        var BedrijfID = bid;

        var optie = '0';


        $(document).ready(function () {
            $.ajax({
                url: "backgroundcel.php",
                method: "post",
                data: {
                    VeldID: VeldID,
                    CursusonderdeelID: CursusonderdeelID,
                    CursusID: CursusID,
                    BedrijfID: BedrijfID,
                    optie: optie
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
            });
        });
    }



</script>