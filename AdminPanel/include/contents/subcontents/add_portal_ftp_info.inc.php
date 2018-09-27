
<!-- #################### HAS CONTRACT  ######################## -->
<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>Invio su ftp</label>
            <div class="input-group">
                <input id="inp_portal_hasFtp" name="inp_portal_hasFtp" type='checkbox' class='switch' <?php echo($inpPortalHasFtp?"checked":"")?> />
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->


    <div class="col-md-6"> </div><!-- /.col-md-6 -->

</div><!-- /.row -->


<!-- #################### Link ftp  - Folder ftp  ######################## -->
<div class="row FTP_INFO">

    <div class="col-md-6">
        <div class="form-group">
            <label>FTP Link</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-feed"></i></div>
                <input id="inp_portal_link_ftp" name="inp_portal_link_ftp" type="text" class="form-control" placeholder="Link dell' ftp"  value="<?php echo $inpPortalLinkFtp ?>">
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

        <div class="col-md-6">
        <div class="form-group">
            <label>FTP nome file</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-feed"></i></div>
                <input id="inp_portal_file_name_ftp" name="inp_portal_file_name_ftp" type="text" class="form-control" placeholder="Cartella dell' ftp"  value="<?php echo $inpPortalFileNameFtp ?>">
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

</div><!-- /.row -->


<!-- #################### User ftp - Psw ftp  ######################## -->
<div class="row FTP_INFO">

    <div class="col-md-6">
        <div class="form-group">
            <label>FTP User</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-globe"></i></div>
                <input id="inp_portal_user_ftp" name="inp_portal_user_ftp" type="text" class="form-control" placeholder="Sito del Portale"  value="<?php echo $inpPortalUserFtp ?>">

            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->


    <div class="col-md-6">
        <div class="form-group">
            <label>FTP Password</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-feed"></i></div>
                <input id="inp_portal_psw_ftp" name="inp_portal_psw_ftp" type="text" class="form-control" placeholder="Password Ftp"  value="<?php echo $inpPortalPswFtp ?>">
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col-md-6 -->

</div><!-- /.row -->

