


<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Opzioni di stampa</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <td><img src="<?php echo SITE_URL."/AdminPanel/images/rivista_completa.png"?>"</td>
                <td>Rivista completa</td>
                <td>
                    <form name="full_magazine_form" method="post" action="<?php echo SITE_URL."/rivista/stampa_rivista.html" ?>"  target="_blank">
                        <button  type="button" class="btn btn-primary" id="btn_editor_submit"  onclick="this.parentNode.submit()">Stampa</button>

                    </form>
                </td>

            </tr>
            <tr>
                <td><img src="<?php echo SITE_URL."/AdminPanel/images/rivista_prestige.png"?>"</td>
                <td>rivista Prestige</td>
                <td>
                    <form name="prestige_magazine_form" method="post" action="<?php echo SITE_URL."/rivista/stampa_rivista.html" ?>" target="_blank">
                        <input  type="hidden" name="id_agency" value="<?php echo $agency_id ?>">
                        <input  type="hidden" name="magazine_type" value="prestige">

                        <button  type="button" class="btn btn-primary" id="btn_editor_submit"  onclick="this.parentNode.submit()">Stampa</button>

                    </form>
                </td>
            </tr>
            <tr>
                <td><img src="<?php echo SITE_URL."/AdminPanel/images/rivista_imprese.png"?>"</td>
                <td>Rivista Imprese</td>
                <td>
                    <form name="companies_magazine_form" method="post" action="<?php echo SITE_URL."/rivista/stampa_rivista.html" ?>"  target="_blank">
                        <input  type="hidden" name="id_agency" value="<?php echo $agency_id ?>">
                        <input  type="hidden" name="magazine_type" value="companies">

                        <button  type="button" class="btn btn-primary" id="btn_editor_submit"  onclick="this.parentNode.submit()">Stampa</button>

                    </form>

                </td>
            </tr>
            <tr>
                <td><img src="<?php echo SITE_URL."/AdminPanel/images/personalizza_rivista.png"?>"</td>
                <td>Rivista Personalizzata</td>
                <td>
                    <form name="custom_magazine_form" method="post" action="<?php echo SITE_URL."/rivista/stampa_rivista_personalizzata.html" ?>"  target="_blank">
                        <input  type="hidden" name="id_agency" value="<?php echo $agency_id ?>">
                        <button  type="button" class="btn btn-primary" id="btn_editor_submit"  onclick="this.parentNode.submit()">Stampa</button>

                    </form>


                </td>
            </tr>
            </tbody>
        </table>
    </div>

</div>