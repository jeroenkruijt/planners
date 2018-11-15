<script>
    function testFucntion(str, str2, str3) {
        if (str.length == 0) {
            document.getElementById("txtHint").innerHTML = "";

        } else {
            document.getElementById("txtHint").innerHTML = str + " " + str2 + " " + str3;
        }
    }
</script>

<div id="dataModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Employee Details</h4>
            </div>
            <!--            // deze word gevuld-->
            <div class="modal-body" id="employee_detail">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<p>text: <span id="txtHint"></span></p>