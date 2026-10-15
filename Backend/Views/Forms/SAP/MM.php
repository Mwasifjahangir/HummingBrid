

<!-- BEGIN BREADCRUMBS -->
<div class="breadcrumbs">

    <ol class="breadcrumb">
        <li>
            <a href="/index.php?module=MM&method=List">Forms</a>
        </li>
        <li class="active"><a href="/index.php?module=MM&method=Index">SAP- Material Master</a></li>
    </ol>
</div>
<!-- END BREADCRUMBS -->
{% if matnr is defined and  matnr|trim !=  "" %}

<div class="alert alert-success  display-hide" style="display: block;">

    <span><strong>Material Number (in SAP): <strong>{{matnr|trim}}</strong></strong></span>
</div>
{% endif %}
{{sapreturn|raw}}

<form method="post" id="mmform" class="form mainform" action="" enctype="multipart/form-data">

    <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button>
        You have some form errors. Please check below.
    </div>
    <div class="alert alert-success display-hide">
        <button class="close" data-close="alert"></button>
        Your form validation is successful!
    </div>
    {% include 'Shared/messages.php' %}

    <!--START TASK SUMMARY-->
    {% include 'Shared/formheader.php' %}
    <!--END TASK SUNMARY-->


    <div class="portlet box purple-seance">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>Client
            </div>


        </div>
        <div class="portlet-body">
            <div class="row">
                <div class="col-md-6" >
                    <div class="form-group" style="display: none">
                        <label class="col-md-4 control-label">Suggested Description</label>
                        <div class="col-md-8">
                            <input readonly=""  type="text" name="" id="REASONFORCREAT" placeholder="Enter text"
                                   class="form-control">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Material Type</label>
                        <div class="col-md-8">
                            <select name="PI_MATTYPE" id="PI_MATTYPE" class="form-control"></select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Base Unit of Measure</label>
                        <div class="col-md-8">
                            <select name="BASE_UOM" id="BASE_UOM" class="form-control">

                            </select>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Gross Weight (KG)</label>
                        <div class="col-md-8">
                            <input type="text" onkeypress="NumValidate(event)" name="GROSSWEIGHT" id="GROSSWEIGHT" placeholder="Enter text"
                                   class="form-control">

                        </div>
                    </div>
                    <!--<div class="form-group">
                        <label class="col-md-4 control-label">Gross/Net Weight UoM ()</label>
                        <div class="col-md-8">


                        </div>
                    </div>-->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Net Weight (KG)</label>
                        <div class="col-md-8">
                            <input type="text"  onkeypress="NumValidate(event)" name="NET_WEIGHT" id="NET_WEIGHT" placeholder="Enter text"
                                   class="form-control">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Sales Division</label>
                        <div class="col-md-8">
                            <select name="DIVISION" id="DIVISION" class="form-control">

                            </select>

                        </div>
                    </div>

                    <!--<div class="form-group">
                        <label class="col-md-4 control-label">Whole Case ID</label>
                        <div class="col-md-8">
                            <input type="text" name="WHOLECASEID" id="WHOLECASEID" placeholder="Enter text" class="form-control">

                        </div>
                    </div>-->

                    <div class="form-group">
                        <label class="col-md-4 control-label">HOST Source Code</label>
                        <div class="col-md-8">
                            <input type="text" name="STD_DESCR" id="PACKSIZE" placeholder="Enter text"
                                   class="form-control">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">HOST Product Code</label>
                        <div class="col-md-8">
                            <input type="text" name="PROD_MEMO" id="PROD_MEMO" placeholder="Enter text"
                                   class="form-control">

                        </div>
                    </div>
                    <!--<div class="form-group">
                        <label class="col-md-4 control-label">HS Code</label>
                        <div class="col-md-8">
                            <input type="text" name="HSCODE" id="HSCODE" placeholder="Enter text" class="form-control">

                        </div>
                    </div>-->

                    <div class="form-group" style="display: none">
                        <label class="col-md-4 control-label">General Item Material Group</label>
                        <div class="col-md-8">
                            <input type="text" name="ITEM_CAT" id="ITEM_CAT" value="NORM" disabled="disabled"
                                   placeholder="Enter text" class="form-control">


                        </div>
                    </div>
                    <!-- <div class="form-group">
                         <label class="col-md-4 control-label">Material Group PKG Material</label>
                         <div class="col-md-8">
                             <select class="form-control">

                             </select>

                         </div>
                     </div>
                    -->

                </div>
                <div class="col-md-6">
                    <div class="form-group" style="display: none">
                        <label class="col-md-4 control-label">Industry Sector</label>
                        <div class="col-md-8">
                            <input type="text" name="INDUSTRYSECTOR" id="INDUSTRYSECTOR" value="F" readonly=""
                                   placeholder="Enter text" class="form-control">

                        </div>
                    </div>

                    <div class="form-group" style="display: none" >
                        <label class="col-md-4 control-label">Material Description</label>
                        <div class="col-md-8">
                            <input type="text" value=" " name="PI_MATDESC" maxlength="40" id="PI_MATDESC"
                                   placeholder="Enter text" class="form-control">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Material Group</label>
                        <div class="col-md-8">
                            <select id="MATL_GROUP" name="MATL_GROUP" class="form-control">

                            </select>

                        </div>
                    </div>

                    <div class="form-group cognosfield">
                        <label class="col-md-4 control-label">Product Cognos Code</label>
                        <div class="col-md-8">
                            <select name="EXTMATLGRP" id="EXTMATLGRP" class="form-control">

                            </select>

                        </div>
                    </div>
                    <div class="form-group cognosfield">
                        <label class="col-md-4 control-label">Source Cognos Code</label>
                        <div class="col-md-8">
                            <select name="MEDIUM" id="MEDIUM" class="form-control">

                            </select>

                        </div>
                    </div>
                    <div class="form-group cognosfield">
                        <label class="col-md-4 control-label">EP Source</label>
                        <div class="col-md-8">
                            <input type="text" name="DOCUMENT" id="DOCUMENT" placeholder="Enter text"
                                   class="form-control">

                        </div>
                    </div>
                    <div class="form-group cognosfield">
                        <label class="col-md-4 control-label">EP Description</label>
                        <div class="col-md-8">
                            <input type="text" maxlength="40" name="BASIC_MATL" id="BASIC_MATL" placeholder="Enter text"
                                   class="form-control">

                        </div>
                    </div>
                    <!-- <div class="form-group">
                         <label class="col-md-4 control-label">REPO Source</label>
                         <div class="col-md-8">
                             <input type="text" readonly="" value="UAE" name="MEDIUM" id="MEDIUM" placeholder="Enter text" class="form-control">

                         </div>
                     </div>-->
                    <div class="form-group cognosfield">
                        <label class="col-md-4 control-label">Repo Box Size</label>
                        <div class="col-md-8">
                            <input type="text" maxlength="4" name="DOC_FORMAT" id="DOC_FORMAT" placeholder="Enter text"
                                   class="form-control">

                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>
    <div class="portlet box yellow-casablanca">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>Alternative UOM
            </div>
            <div class="actions">
                <a id="NewALTUOM" class="btn green" href="javascript:;">
                    <i class="fa fa-plus"></i>Add
                </a>
            </div>

        </div>
        <div class="portlet-body">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-striped table-bordered table-hover table-responsive table-condensed">
                        <thead>
                            <tr>
                                <th>UOM</th>
                                <th>Gross Weight UOM</th>
                                <th>Numerator</th>
                                <th>Denominatr</th>
                                <th>Gross Weight</th>
                            </tr>
                        </thead>
                        <tbody id="ALTUOMBODY">

                        </tbody>
                    </table>
                </div>
                <!-- <div class="col-sm-6">
                     <div class="form-group">
                         <label class="col-md-4 control-label">UoM</label>
                         <div class="col-md-8">
                             <select name="ALT_UNIT" id="ALT_UNIT" class="form-control">
 
                             </select>
 
                         </div>
                     </div>
                     <div class="form-group" style="display: none">
                         <label class="col-md-4 control-label">Gross Weight UoM</label>
                         <div class="col-md-8">
                             <select name="ALT_UNIT_OF_WT" id="ALT_UNIT_OF_WT" class="form-control">
 
                             </select>
 
                         </div>
                     </div>
                 </div>
                 <div class="col-sm-6">
                     <div class="form-group">
                         <label class="col-md-4 control-label">Numerator</label>
                         <div class="col-md-8">
                             <input id="NUMERATOR" name="NUMERATOR" type="text" placeholder="0" class="form-control">
 
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="col-md-4 control-label">Denominatr</label>
                         <div class="col-md-8">
                             <input id="DENOMINATR" name="DENOMINATR" type="text" placeholder="0" class="form-control">
 
                         </div>
                     </div>
                     <div style="" class="form-group">
                         <label class="col-md-4 control-label">Gross Weight</label>
                         <div class="col-md-8">
                             <input id="ALT_GROSS_WT" name="ALT_GROSS_WT" type="text" placeholder="0" class="form-control">
 
                         </div>
                     </div>
                 </div>-->
            </div>
        </div>
    </div>



    <div class="portlet box yellow-mint">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>Language
            </div>
            <div class="actions">
                <a id="NewLang" class="btn green" href="javascript:;">
                    <i class="fa fa-plus"></i>Add
                </a>
            </div>

        </div>
        <div class="portlet-body">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-striped table-bordered table-hover table-responsive table-condensed">
                        <thead>
                            <tr>
                                <th>Language</th>
                                <th>Material Description</th>
                            </tr>
                        </thead>
                        <tbody id="LANGBODY">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--<div class="portlet box blue-sharp">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>Alternative UoM
            </div>
            <div class="actions">
                <a id="NewCostCenterItembtn" class="btn green" href="javascript:;">
                    <i class="fa fa-plus"></i> Add
                </a>
            </div>
        </div>
        <div class="portlet-body">
            <div class="row">
                <div class="col-md-6">

                    <div class="form-group">
                        <label class="col-md-4 control-label">Alternative Unit</label>
                        <div class="col-md-8">
                            <select class="form-control">
                                <option>Option 1</option>
                                <option>Option 2</option>
                                <option>Option 3</option>
                                <option>Option 4</option>
                                <option>Option 5</option>
                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"></label>
                        <div class="col-md-8">
                            <label class="radio-inline">
                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Sales
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Purchasing
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Production
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Container
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Coversion</label>
                        <div class="col-md-8">
                            <input type="text" placeholder="Enter text" class="form-control">

                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>-->
    <!--<div class="portlet box blue-sharp">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>Classification View
            </div>
            <div class="actions">
                <a id="NewCostCenterItembtn" class="btn green" href="javascript:;">
                    <i class="fa fa-plus"></i> Add
                </a>
            </div>
        </div>
        <div class="portlet-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Individual Collective Indicator</label>
                        <div class="col-md-8">
                            <input type="text" placeholder="Enter text" class="form-control">

                        </div>
                    </div>


                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Class</label>
                        <div class="col-md-8">
                            <input type="text" placeholder="Enter text" class="form-control">

                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>-->
    <div class="portlet box red-sunglo">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>Sales and Purchasing View
            </div>

        </div>
        <div class="portlet-body">
            <div class="row">
                <div class="col-md-6">

                    <div class="form-group">
                        <label class="col-md-4 control-label">Plant</label>
                        <div class="col-md-8">
                            <select name="PLANT" id="PLANT" class="form-control">

                            </select>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Procurement Storage location</label>
                        <div class="col-md-8">
                            <select name="SLOC_EXPRC" id="SLOC_EXPRC" class="form-control">

                            </select>

                        </div>
                    </div>

                    <!--   <div class="form-group">
                           <label class="col-md-4 control-label">L1 PCG</label>
                           <div class="col-md-8">
                               <select class="form-control">
                                   <option>Option 1</option>
                                   <option>Option 2</option>
                                   <option>Option 3</option>
                                   <option>Option 4</option>
                                   <option>Option 5</option>
                               </select>

                           </div>
                       </div>
                       <div class="form-group">
                           <label class="col-md-4 control-label">L2 PCG</label>
                           <div class="col-md-8">
                               <select class="form-control">
                                   <option>Option 1</option>
                                   <option>Option 2</option>
                                   <option>Option 3</option>
                                   <option>Option 4</option>
                                   <option>Option 5</option>
                               </select>

                           </div>
                       </div>
                       <div class="form-group">
                           <label class="col-md-4 control-label">L3 PCG </label>
                           <div class="col-md-8">
                               <select class="form-control">
                                   <option>Option 1</option>
                                   <option>Option 2</option>
                                   <option>Option 3</option>
                                   <option>Option 4</option>
                                   <option>Option 5</option>
                               </select>

                           </div>
                       </div>-->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Profit Center</label>
                        <div class="col-md-8">
                            <select id="PROFIT_CTR" name="PROFIT_CTR" class="form-control">

                            </select>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Purchasing Group</label>
                        <div class="col-md-8">
                            <select name="PUR_GROUP" id="PUR_GROUP" class="form-control">

                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Country of Origion</label>
                        <div class="col-md-8">
                            <select name="COUNTRYORI" id="COUNTRYORI" class="form-control">

                            </select>

                        </div>
                    </div>
                </div>


                <div class="col-md-6">

                    <div class="form-group">
                        <label class="col-md-4 control-label">Sales Organization</label>
                        <div class="col-md-8">
                            <select name="SALES_ORG" id="SALES_ORG" class="form-control">

                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Distribution Channel</label>
                        <div class="col-md-8">
                            <select name="DISTR_CHAN" id="DISTR_CHAN" class="form-control">

                            </select>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Material Group – 1 (Product Type)</label>
                        <div class="col-md-8">
                            <select name="MATL_GRP_1" id="MATL_GRP_1" class="form-control">

                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Material Group – 2 (Variety)</label>
                        <div class="col-md-8">
                            <select name="MATL_GRP_2" id="MATL_GRP_2" class="form-control">

                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"> Material Group – 3 (Grade)</label>
                        <div class="col-md-8">
                            <select name="MATL_GRP_3" id="MATL_GRP_3" class="form-control">

                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Material Group – 4 (Source)</label>
                        <div class="col-md-8">
                            <select name="MATL_GRP_4" id="MATL_GRP_4" class="form-control">

                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Material Group – 5 (Size)</label>
                        <div class="col-md-8">
                            <select name="MATL_GRP_5" id="MATL_GRP_5" class="form-control">

                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Volume Rebate</label>
                        <div class="col-md-8">
                            <select name="REBATE_GRP" id="REBATE_GRP" class="form-control">

                            </select>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="portlet box blue-sharp">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>Plant Data View
            </div>
            <!--<div class="actions">
                <a id="NewCostCenterItembtn" class="btn green" href="javascript:;">
                    <i class="fa fa-plus"></i> Add
                </a>
            </div>-->
        </div>
        <div class="portlet-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Production Storage location</label>
                        <div class="col-md-8">
                            <select name="STGE_LOC" id="STGE_LOC" class="form-control">

                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Production Scheduler Profile</label>
                        <div class="col-md-8">
                            <select name="PRODPROF" id="PRODPROF" class="form-control">

                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Production Scheduler</label>
                        <div class="col-md-8">
                            <select name="PRODUCTION_SCHEDULER" id="PRODUCTION_SCHEDULER" class="form-control">

                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Total Shelf Life</label>
                        <div class="col-md-8">
                            <input name="SHELF_LIFE" onkeypress="NumValidate(event)" id="SHELF_LIFE" type="text" placeholder="Enter text"
                                   class="form-control">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Min Rem Shelf Life</label>
                        <div class="col-md-8">
                            <input type="text"  onkeypress="NumValidate(event)" name="MINREMLIFE" id="MINREMLIFE" placeholder="Enter text"
                                   class="form-control">

                        </div>
                    </div>
                    <div class="form-group" style="display:none">
                        <label class="col-md-4 control-label">Time Unit</label>
                        <div class="col-md-8">
                            <input type="text" name="TIMEUNIT" id="TIMEUNIT" readonly="readonly" value="D"
                                   placeholder="Enter text" class="form-control">

                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="form-group">
                        <label class="col-md-4 control-label">Product Hierarchy 1</label>
                        <div class="col-md-8">
                            <select name="PRODUCTH1" id="PRODUCTH1" class="form-control">

                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Product Hierarchy 2</label>
                        <div class="col-md-8">
                            <select name="PRODUCTH2" id="PRODUCTH2" class="form-control">

                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Product Hierarchy 3</label>
                        <div class="col-md-8">
                            <select name="PRODUCTH3" id="PRODUCTH3" class="form-control">

                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Product Hierarchy 4</label>
                        <div class="col-md-8">
                            <select name="PRODUCTH4" id="PRODUCTH4" class="form-control">

                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Product Hierarchy 5</label>
                        <div class="col-md-8">
                            <select name="PROD_HIER" id="PROD_HIER" class="form-control">

                            </select>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <div class="portlet box yellow-haze">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>MRP View
            </div>
            <!-- <div class="actions">
                 <a id="NewCostCenterItembtn" class="btn green" href="javascript:;">
                     <i class="fa fa-plus"></i> Add
                 </a>
             </div>-->
        </div>
        <div class="portlet-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label">MRP Group</label>
                        <div class="col-md-8">
                            <select name="MRP_GROUP" id="MRP_GROUP" class="form-control">

                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">MRP Type</label>
                        <div class="col-md-8">
                            <select name="MRP_TYPE" id="MRP_TYPE" class="form-control">

                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">ReOrder Point</label>
                        <div class="col-md-8">
                            <input onkeypress="NumValidate(event)" type="text" id="REORDER_PT" name="REORDER_PT" placeholder="Enter text"
                                   class="form-control">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Max Stock Level</label>
                        <div class="col-md-8">
                            <input onkeypress="NumValidate(event)" id="MAXSTOCK" name="MAXSTOCK" type="text" placeholder="Enter text"
                                   class="form-control">

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label">MRP Controller</label>
                        <div class="col-md-8">
                            <select name="MRP_CTRLER" id="MRP_CTRLER" class="form-control">

                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Safety Stock</label>
                        <div class="col-md-8">
                            <input onkeypress="NumValidate(event)" type="text" id="SAFETY_STK" name="SAFETY_STK" placeholder="Enter text"
                                   class="form-control">

                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>


    <div class="portlet box purple-studio">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>Company Code
            </div>
            <div class="actions">

            </div>
        </div>
        <div class="portlet-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Origin Group</label>
                        <div class="col-md-8">
                            <select name="ORIG_GROUP" id="ORIG_GROUP" class="form-control">

                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Moving Average Price</label>
                        <div class="col-md-8">
                            <input type="text" id="MOVING_PR" value="0.01" name="MOVING_PR"
                                   placeholder="Enter text" class="form-control">

                        </div>
                    </div>


                </div>
                <div class="col-md-6">
                    <!-- <div class="form-group">
                         <label class="col-md-4 control-label">Commercial Price 1</label>
                         <div class="col-md-8">
                             <input type="text" name="COMMPRICE1" id="COMMPRICE1" placeholder="Enter text" class="form-control">

                         </div>
                     </div>
                     <div class="form-group">
                         <label class="col-md-4 control-label">Commercial Price 2</label>
                         <div class="col-md-8">
                             <input type="text" name="COMMPRICE2" id="COMMPRICE2" placeholder="Enter text" class="form-control">

                         </div>
                     </div>
                     <div class="form-group">
                         <label class="col-md-4 control-label">Commercial Price 3</label>
                         <div class="col-md-8">
                             <input type="text" name="COMMPRICE3" id="COMMPRICE3" placeholder="Enter text" class="form-control">

                         </div>
                     </div>-->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Valuation Class</label>
                        <div class="col-md-8">
                            <select id="VAL_CLASS" name="VAL_CLASS" class="form-control">

                            </select>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- TAX -->
    <div class="portlet box purple-studio">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>TAX Data
            </div>
            <div class="actions">

            </div>
        </div>
        <div class="portlet-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Departure Country</label>
                        <div class="col-md-8">
                            <input type="text" id="DEPCOUNTRY" value="" name="DEPCOUNTRY"
                                   placeholder="" readonly="" class="form-control">

                        </div>
                    </div>



                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Tax classification</label>
                        <div class="col-md-8">
                            <select id="TAXCLASS_1" name="TAXCLASS_1" class="form-control">

                            </select>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>






    <div class="row">
        <div class="col-sm-9">
            <div class="portlet box yellow-mint">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs"></i>
                        Material Search
                    </div>
                    <div class="actions">
                        <a id="SearchMaterial" class="btn green" href="javascript:;">
                            <i class="fa fa-search"></i> Search
                        </a>
                    </div>
                </div>

                <div class="portlet-body">
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Plant</th>
                                    <th>Description</th>
                                    <th>Material # (SAP)</th>
                                    <th>Mat Type</th>
                                    <th>Net Weight</th>
                                    <th>Material Group</th>
                                    <th>Country of Origin</th>
                                    <th>Mat Grp 1 (Product Type)</th>
                                    <th>Mat Grp 4 (Source)</th>




                                </tr>
                            </thead>
                            <tbody id="matsearchbody">
                                <tr >
                                    <td colspan="9">Press search button after selecting the required data </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-sm-3">
        {% include 'Shared/files.php' %}
            <!-- <div class="portlet box yellow-casablanca">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs"></i>Files
                    </div>

                </div>

                <div class="portlet-body">
                    <div id="fcontainer">
                        <input name="files[]" type="file" multiple="" class="fileinput-controls"/>
                    </div>
                </div>
            </div> -->
        </div>
    </div>

    {% include 'Shared/workflow.php' %}
    <div class="row">
        <!-- Hidden FIelds-->
        <input type="text" name="SALESDATAGROUP" id="SALESDATAGROUP" style="display:none" value="" disabled="disabled"/>
        <input type="text" name="TRANS_GRP" id="TRANS_GRP" style="display:none" value="" disabled="disabled"/>
        <input type="text" name="LOADINGGRP" id="LOADINGGRP" style="display:none" value="" disabled="disabled"/>
        <input type="text" name="AUTO_P_ORD" id="AUTO_P_ORD" style="display:none" value="" disabled="disabled"/>
        <input type="text" name="VARIANCE_KEY" id="VARIANCE_KEY" style="display:none" value="" disabled="disabled"/>
        <input type="text" name="PPC_PL_CAL" id="PPC_PL_CAL" style="display:none" value="UAE"/>
        <input type="text" name="PRICE_CTRL" id="PRICE_CTRL" style="display:none" value=""/>
        <input type="text" name="PRICE_UNIT" id="PRICE_UNIT" style="display:none" value=""/>
        <input type="text" name="VAL_CAT" id="VAL_CAT" style="display:none" value="" disabled="disabled"/>
        <input type="text" name="MATL_STATS" id="MATL_STATS" style="display:none" value="" disabled="disabled"/>
        <input type="text" name="ACCT_ASSGT" id="ACCT_ASSGT" style="display:none" value="" disabled="disabled"/>
        <input type="text" name="ORIG_MAT" id="ORIG_MAT" style="display:none" value="X"/>
        <input type="text" name="QTY_STRUCT" id="QTY_STRUCT" style="display:none" value="X"/>

        <input type="text" id="LOTSIZEKEY" name="LOTSIZEKEY" disabled="disabled" style="display:none">
        <input type="text" id="PROC_TYPE" name="PROC_TYPE" style="display:none">
        <input type="text" id="BATCH_MGMT" name="BATCH_MGMT" disabled="disabled" style="display:none">
        <input type="text" id="MIXED_MRP" name="MIXED_MRP" disabled="disabled" style="display:none">
        <input type="text" id="ALT_BOM_ID" name="ALT_BOM_ID" disabled="disabled" style="display:none">
        <input type="text" id="SM_KEY" name="SM_KEY" disabled="disabled" style="display:none">
        <input type="text" id="PUR_VALKEY" name="PUR_VALKEY" disabled="disabled" style="display:none">
        <input type="text" id="AVAILCHECK" name="AVAILCHECK" value="" style="display:none">
        <input type="text" id="TAX_TYPE_1" name="TAX_TYPE_1" value="" style="display:none">
<!--        <input type="submit" {{formdisabled}} class="btn btn-success" value="Submit"/>-->
        
        <input {{formdisabled}} type="submit" class="btn btn-success" value="Submit"/>
      <!--  <input type="button" {{createmm}}
               onclick="window.location = 'index.php?module=MM&method=Index&UID={{UID}}& C = Q1JFQVRF'"
               class="btn btn-info" value="Create Material (Demo)"/>-->
        <select id="UNIT_OF_WT" name="UNIT_OF_WT" class="form-control" style="display: none">


        </select>
    </div>
</form>
<script src="/Frontend/Assets//global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="/Frontend/Assets//global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
<script src="/Frontend/Assets//js/jinqjs.js"></script>
<script src="/Frontend/Assets//js/bytecode/FileManager.js"></script>
<script src="/Frontend/Assets//js/bytecode/MM.js?ref1"></script>
<script src="/Frontend/Assets//global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>

<script type="text/javascript">
                                $(function () {
                                $mm = new MM();
                                {% if mode == "NEW" %}
                                $mm.Boot("", "{{userinfor.userid}}");
                                {% else %}
                                $mm.Boot("{{UID}}", "{{userinfo.UserID}}");
                                {% endif %}
                                EnableDateDrop($('.dtpicker'));
                                })
</script>