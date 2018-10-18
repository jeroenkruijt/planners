<?php
    /**
     * Created by PhpStorm.
     * User: jkruijt
     * Date: 18-10-2018
     * Time: 9:18
     */

?>
<script>
    $("#showModal").click(function () {
        $(".modal").addClass("is-active");
    });

    $(".modal-close").click(function () {
        $(".modal").removeClass("is-active");
    });
</script>

<section class="hero is-fullheight is-dark is-bold">
    <div class="hero-body">
        <div class="container">
            <div class="columns is-vcentered">
                <div class="column is-10 is-offset-1 has-text-centered">

                    <div class="container" id="app">
                        <div class="modal">
                            <div class="modal-background"></div>
                            <div class="modal-content">
                                <!-- Any other Bulma elements you want -->
                                <table>
                                    <tr>
                                        <td>Jhon</td>
                                        <td>Hi</td>
                                    </tr
                                </table>
                                <input type="text" class="input"/>
                            </div>
                            <button class="modal-close"></button>
                        </div>
                        <textarea style="position:absolute;z-index: 9999" name="" id="" cols="30" rows="2"></textarea>
                        <br/><br/><br/>
                        <p>
                            <button class="button" id="showModal">Show</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>