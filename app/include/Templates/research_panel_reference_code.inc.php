<style>
    #search_by_ref_error{color:red;}
</style>
<div class="widget clearfix">
    <div class="search_widget">
        <div class="title"><h3><i class="fa fa-search"></i> Search For Property</h3></div>
        <p id="search_by_ref_error"></p>
        <div class="col-lg-8 PADDING-0">
            <input id='inp_search_property' type="text" class="form-control" placeholder="Search by Reference code">
        </div>
        <div class="col-lg-4">
            <input type="button" value="Cerca" class="btn btn-tecnoimm-red" onclick="findPropertyByReferenceCode()" />
        </div>

    </div><!-- end search_widget -->
</div><!-- end widget -->
<a id='linkRef' href=""></a>

<script src="<?php echo SITE_URL . "/js/research_panel_reference_code.js" ?>"></script>