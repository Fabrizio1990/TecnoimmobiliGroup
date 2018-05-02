<style>
    #search_by_ref_error{color:red;}
</style>
<div class="widget clearfix LIGHT-GREY-BORDER BG_COLOR_WITHE PADDING-20">
    <div class="search_widget">
        <div class="title"><h3><i class="fa fa-search"></i> Search For Property</h3></div>
        <p id="search_by_ref_error"></p>
        <div class="col-md-8 PADDING-0">
            <input id='inp_search_property' type="text" class="form-control" placeholder="Codice riferimento" title="Cerca tramite codice di riferimento">
        </div>
        <div class="col-md-4">
            <button  class="btn btn-tecnoimm-red" onclick="findPropertyByReferenceCode()" ><i class="fa fa-search"></i></button>
        </div>

    </div><!-- end search_widget -->
</div><!-- end widget -->
<a id='linkRef' href=""></a>

<script src="<?php echo SITE_URL . "/js/research_panel_reference_code.js" ?>"></script>