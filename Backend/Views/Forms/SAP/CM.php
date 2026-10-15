

<!-- BEGIN BREADCRUMBS -->
<div class="breadcrumbs">

    <ol class="breadcrumb">
        <li>
            <a href="/index.php?module=CM&method=List">Forms</a>
        </li>
        <li class="active"><a href="/index.php?module=CM&method=Index">SAP- Customer Master</a></li>
    </ol>
</div>
<!-- END BREADCRUMBS -->
{% if customernumb is defined and  customernumb|trim !=  "" %}

<div class="alert alert-success  display-hide" style="display: block;">

    <span><strong>Customer (in SAP): <strong>{{customernumb|trim}}</strong></strong></span>
</div>
{% endif %}
{{sapreturn|raw}}

<form method="post" id="vmform" action="" enctype="multipart/form-data">
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

    <div class="portlet box blue-sharp">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>Central Data
            </div>


        </div>
        <div class="portlet-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Title</label>
                        <div class="col-md-8">
                            <select name="TITLE" id="TITLE" class="form-control">

                                <option value="0003">Company</option>
                                <option value="0002">Mr.</option>
                                <option value="0004">Mr. and Mrs.</option>
                                <option value="0001">Ms.</option>
                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Name</label>
                        <div class="col-md-8">
                            <input type="text" required="" maxlength="40" name="NAME" id="NAME" placeholder="Enter text"
                                   class="form-control">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Name 2</label>
                        <div class="col-md-8">
                            <input type="text" maxlength="40" name="NAME_2" id="NAME_2" placeholder="Enter text"
                                   class="form-control">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Search Term</label>
                        <div class="col-md-8">
                            <input required="" type="text" maxlength="20" name="SORT1" id="SORT1" placeholder="Enter text"
                                   class="form-control">

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Street</label>
                        <div class="col-md-8">
                            <input type="text" maxlength="60" name="STREET" id="STREET" placeholder="Enter text"
                                   class="form-control">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">District</label>
                        <div class="col-md-8">
                            <input type="text" maxlength="40" name="DISTRICT" id="DISTRICT" placeholder="Enter text"
                                   class="form-control">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Postal Code</label>
                        <div class="col-md-8">
                            <input type="text" maxlength="10" name="POSTL_COD1" id="POSTL_COD1" placeholder="Enter text"
                                   class="form-control">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">City</label>
                        <div class="col-md-8">
                            <input required="" type="text" maxlength="40" name="CITY" id="CITY" placeholder="Enter text"
                                   class="form-control">

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">PO Box</label>
                        <div class="col-md-8">
                            <input type="text" maxlength="40" name="PO_BOX" id="PO_BOX" placeholder="Enter text"
                                   class="form-control">

                        </div>
                    </div>
                    <!--
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Vendor Number</label>
                                            <div class="col-md-8">
                                                <input type="text" maxlength="10" name="LIFNR" id="LIFNR" placeholder="Enter text"
                                                       class="form-control">
                    
                                            </div>
                                        </div>-->

                </div>
                <div class="col-md-6">

                    <div class="form-group">
                        <label class="col-md-4 control-label">FAX</label>
                        <div class="col-md-8">
                            <input type="text" maxlength="30" name="FAX" id="FAX" placeholder="Enter text"
                                   class="form-control">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Email</label>
                        <div class="col-md-8">
                            <input type="text" maxlength="241" name="E_MAIL" id="E_MAIL" placeholder="Enter text"
                                   class="form-control">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Telephone</label>
                        <div class="col-md-8">
                            <input type="text" maxlength="30" name="TELEPHONE" id="TELEPHONE" placeholder="Enter text"
                                   class="form-control">

                        </div>
                    </div>
                    <!--   <div class="form-group">
                           <label class="col-md-4 control-label">Trading Partner</label>
                           <div class="col-md-8">
                               <input type="text" maxlength="10" name="VBUND" id="VBUND" placeholder="Enter text"
                                      class="form-control">
   
                    
                           </div>
                       </div>-->
                    <!-- <div class="form-group">
                         <label class="col-md-4 control-label">Region</label>
                         <div class="col-md-8">
                             <input type="text" maxlength="3" name="REGION" id="REGION" placeholder="Enter text"
                                    class="form-control">
 
                         </div>
                     </div>-->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Country</label>
                        <div class="col-md-8">
                            <select name="COUNTRY" id="COUNTRY" class="form-control">

                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Customer Account Group</label>
                        <div class="col-md-8">
                            <select name="KTOKD" id="KTOKD" class="form-control">
                                <option value="ZLOC">Local</option>
                                <option value="ZEXP">Export</option>
                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Trade Lic No</label>
                        <div class="col-md-8">
                            <input required="" type="text" maxlength="40" name="STCD5" id="STCD5" placeholder="Enter text"
                                   class="form-control">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">VAT Registration Number</label>
                        <div class="col-md-8">
                            <input required="" type="text" maxlength="40" name="STCEG" id="STCEG" placeholder="Enter text"
                                   class="form-control">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Partner Type</label>
                        <div class="col-md-8">
                            <select name="NIELS" id="NIELS" class="form-control">
                                <option value="01">01 - Payer</option>
                                <option value="02">02 - Ship-to Party</option>
                            </select>

                        </div>
                    </div>
                    <!-- <div class="form-group">
                         <label class="col-md-4 control-label">Sales Person</label>
                         <div class="col-md-8">
                             <input type="text" maxlength="30" name="VERKF" id="VERKF" placeholder="Enter text"
                                    class="form-control">
 
                         </div>
                     </div>-->
                    <!--    <div class="form-group">
                            <label class="col-md-4 control-label">Company Code</label>
                            <div class="col-md-8">
                                <select name="VBUND" id="VBUND" class="form-control">
    
                                </select>
    
                            </div>
                        </div>-->
                </div>
            </div>

        </div>
    </div>

    <div class="portlet box red-sunglo">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>Supplementary Data
            </div>


        </div>
        <div class="portlet-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Customer Legal Status</label>
                        <div class="col-md-8">
                            <select name="LEGALSTATUS" id="LEGALSTATUS" class="form-control">
                                <option value="Z1">LLC</option>
                                <option value="Z2">INC</option>
                                <option value="Z3">CORP</option>
                                <option value="Z4">Single Person Company</option>
                                <option value="Z5">Partnership</option>

                            </select>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Related Party?</label>
                        <div class="col-md-8">
                            <select name="RELATEDPARTY" id="RELATEDPARTY" class="form-control">
                                <option value="NO">NO</option>
                                <option value="YES">YES</option>
                            </select>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portlet box yellow-casablanca">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>Company Data
            </div>


        </div>
        <div class="portlet-body">
            <div class="row">


                <div class="col-md-6">

                    <div class="form-group">
                        <label class="col-md-4 control-label">Company Code</label>
                        <div class="col-md-8">
                            <select name="BUKRS" id="BUKRS" class="form-control">

                            </select>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Sort Key</label>
                        <div class="col-md-8">
                            <select name="ZUAWA" id="ZUAWA" class="form-control">

                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Previous Record</label>
                        <div class="col-md-8">
                            <input type="text" maxlength="10" name="ALTKN" id="ALTKN" placeholder="Enter text"
                                   class="form-control">

                        </div>
                    </div>


                </div>
                <div class="col-md-6">
                    <!--    <div class="form-group">
                            <label class="col-md-4 control-label">Personnel Number</label>
                            <div class="col-md-8">
                                <input type="text" maxlength="8" name="PERNR" id="PERNR" placeholder="Enter text"
                                       class="form-control">
    
                            </div>
                        </div>-->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Reconciliation Account</label>
                        <div class="col-md-8">
                            <select name="AKONT" id="AKONT" class="form-control">

                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Planning Group</label>
                        <div class="col-md-8">
                            <select name="FDGRV" id="FDGRV" class="form-control">

                            </select>

                        </div>
                    </div>
                    <!--<div class="form-group">
                        <label class="col-md-4 control-label">Payment Method</label>
                        <div class="col-md-8">
                            <select name="ZLSCH" id="ZLSCH" class="form-control">

                            </select>

                        </div>
                    </div>-->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Payment Terms</label>
                        <div class="col-md-8">
                            <select name="ZTERM" id="ZTERM" class="form-control">

                            </select>

                        </div>
                    </div>
                    <!--<div class="form-group">
                        <label class="col-md-4 control-label">Postal Code</label>
                        <div class="col-md-8">
                            <input type="text" maxlength="10" name="POSTL_COD1" id="POSTL_COD1" placeholder="Enter text"
                                   class="form-control">

                        </div>
                    </div>-->
                </div>
            </div>

        </div>
    </div>
    <div class="portlet box red-sunglo">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>Sales Data
            </div>


        </div>
        <div class="portlet-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Sales Organization</label>
                        <div class="col-md-8">
                            <select name="VKORG" id="VKORG" class="form-control">

                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Distribution Channel</label>
                        <div class="col-md-8">
                            <select name="VTWEG" id="VTWEG" class="form-control">
                                <option value="10">10-Direct</option>
                                <option value="20">20-Indirect</option>
                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Division</label>
                        <div class="col-md-8">
                            <select name="SPART" id="SPART" class="form-control">

                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Sales Office</label>
                        <div class="col-md-8">
                            <select name="VKBUR" id="VKBUR" class="form-control">

                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Sales Group</label>
                        <div class="col-md-8">
                            <select name="VKGRP" id="VKGRP" class="form-control">

                            </select>

                        </div>
                    </div>


                    <!--   <div class="form-group">
                           <label class="col-md-4 control-label">Delivering Plant</label>
                           <div class="col-md-8">
                               <select name="VWERK" id="VWERK" class="form-control">
   
                               </select>
                           </div>
                       </div>-->
                    <!-- <div class="form-group">
                         <label class="col-md-4 control-label">Cust is Rebate Relevant</label>
                         <div class="col-md-8">
                             <select name="BOKRE" id="BOKRE" class="form-control">
                                 <option value=""></option>
                                 <option value="X">Yes (X)</option>
                             </select>
 
                         </div>
                     </div>-->
                    <div class="form-group">
                        <label class="col-md-4 control-label">INCO Terms 1</label>
                        <div class="col-md-8">
                            <select name="INCO1" id="INCO1" class="form-control">

                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">INCO Terms 2</label>
                        <div class="col-md-8">
                            <input type="text" maxlength="28" name="INCO2" id="INCO2" placeholder="Enter text"
                                   class="form-control">


                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Payment Terms</label>
                        <div class="col-md-8">
                            <select name="SALES_ZTERM" id="SALES_ZTERM" class="form-control">

                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Account Group</label>
                        <div class="col-md-8">
                            <select name="KTGRD" id="KTGRD" class="form-control">

                            </select>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Customer Group</label>
                        <div class="col-md-8">
                            <select name="KDGRP" id="KDGRP" class="form-control">

                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Currency</label>
                        <div class="col-md-8">
                            <select name="WAERS" id="WAERS" class="form-control">

                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Price List Type</label>
                        <div class="col-md-8">
                            <select name="PLTYP" id="PLTYP" class="form-control">

                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Order Probability</label>
                        <div class="col-md-8">
                            <input type="text" maxlength="3" name="AWAHR" id="AWAHR" placeholder="Out of 100"
                                   class="form-control">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Customer Group 1</label>
                        <div class="col-md-8">
                            <select name="KVGR1" id="KVGR1" class="form-control">

                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Customer Group 2</label>
                        <div class="col-md-8">
                            <select name="KVGR2" id="KVGR2" class="form-control">

                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Shipping Conditions</label>
                        <div class="col-md-8">
                            <select name="VSBED" id="VSBED" class="form-control">

                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Delivering Plant</label>
                        <div class="col-md-8">
                            <select name="VWERK" id="VWERK" class="form-control">

                            </select>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!--
        <div class="col-sm-6">
            <div class="portlet box red-sunglo">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs"></i>Bank Data
                    </div>
                    <div class="actions">
                        <a id="EnableBankBTN" class="btn green" href="javascript:;">
                            <i class="fa fa-plus"></i><span id="EnableBankText">Enable</span>
                        </a>
                    </div>
    
                </div>
                <div class="portlet-body">
                    <input style="display: none" name="BANK_ENABLE" id="BANK_ENABLE" value="0" />
                    <div class="row" id="BANK_BODY">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Country</label>
                                <div class="col-md-8">
                                    <select name="BANKS" id="BANKS" class="form-control">
    
                                    </select>
    
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Bank</label>
                                <div class="col-md-8">
                                    <select name="BANKL" id="BANKL" class="form-control">
    
                                    </select>
    
    
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Account #</label>
                                <div class="col-md-8">
                                    <input required="" type="text" maxlength="18" name="BANKN" id="BANKN" placeholder="Enter text"
                                           class="form-control">
    
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Account Name</label>
                                <div class="col-md-8">
                                    <input required="" type="text" maxlength="60" name="KOINH" id="KOINH" placeholder="Enter text"
                                           class="form-control">
    
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">IBAN</label>
                                <div class="col-md-8">
                                    <input required="" type="text" maxlength="34" name="IBAN" id="IBAN" placeholder="Enter text"
                                           class="form-control">
    
    
                                </div>
    
                            </div>
                            <div class="form-group form-md-line-input">
                                <label class="col-md-4 control-label">IBAN From </label>
                                <div class="col-md-8">
                                    <div class="input-group date" id="IBANDATEP">
                                        <input required="" type="text" value="{{ "now"|date("dmY") }}"  maxlength="10" name="IBAN_FROM_DATE" id="IBAN_FROM_DATE" placeholder="Enter Date"
                                               class="form-control">
                                               <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                    </div>
                </div>
            </div>
        </div>
        
    -->
    <div class="row">
        <div class="col-sm-6">
            {% include 'Shared/files.php' %}

        </div>
        <div class="col-sm-6">
            <div class="portlet box yellow-haze">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs"></i>Comments
                    </div>

                </div>

                <div class="portlet-body">
                    <textarea id="Comments" name="Comments" class="form-control" cols="12" rows="5">
    
                    </textarea>

                </div>
            </div>
        </div>
    </div>
    <div class="clear clearfix"></div>
    {% include 'Shared/workflow.php' %}
    <input {{formdisabled}} type="submit" class="btn btn-success" value="Submit"/>
    <div class="clear clearfix"></div>
</form>
<script src="/Frontend/Assets//global/plugins/jquery-validation/js/jquery.validate.min.js"
type="text/javascript"></script>
<script src="/Frontend/Assets//global/plugins/jquery-validation/js/additional-methods.min.js"
type="text/javascript"></script>
<script src="/Frontend/Assets//js/jinqjs.js"></script>
<script src="/Frontend/Assets//js/bytecode/FileManager.js"></script>
<script src="/Frontend/Assets//js/bytecode/CM.js?ref1"></script>
<script src="/Frontend/Assets//global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>

<script type="text/javascript">
    $(function () {
    $cm = new CM();
    {% if mode == "NEW" %}
    $cm.Boot("", "{{userinfo.UserID}}");
    {% else %}
    $cm.Boot("{{UID}}", "{{userinfo.UserID}}");
    {% endif %}
    EnableDateDrop($('.dtpicker'));
    })
</script>