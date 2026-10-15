

<!-- BEGIN BREADCRUMBS -->
<div class="breadcrumbs">

    <ol class="breadcrumb">
        <li>
            <a href="/index.php?module=VM&method=List">Forms</a>
        </li>
        <li class="active"><a href="/index.php?module=VM&method=Index">SAP- Vendor Master</a></li>
    </ol>
</div>
<!-- END BREADCRUMBS -->
{% if vendornumb is defined and  vendornumb|trim !=  "" %}

<div class="alert alert-success  display-hide" style="display: block;">

    <span><strong>Vendor (in SAP): <strong>{{vendornumb|trim}}</strong></strong></span>
</div>
{% endif %}
{{sapreturn|raw}}

<form method="post" id="vmform" action="" onsubmit="return validateForm(this);" enctype="multipart/form-data">
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
                            <input type="text" maxlength="40" name="NAME_2" id="NAME_2" placeholder="Enter Arabic text"
                                   class="form-control">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Arabic Name 1</label>
                        <div class="col-md-8">
                            <input type="text" maxlength="40" name="NAME_3" id="NAME_3" placeholder="Enter Arabic text"
                                   class="form-control">

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Arabic Name 2</label>
                        <div class="col-md-8">
                            <input type="text" maxlength="40" name="NAME_4" id="NAME_4" placeholder="Enter Arabic text"
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
                        <label class="col-md-4 control-label">Trade Lic No</label>
                        <div class="col-md-8">
                            <input required="" type="text" maxlength="40" name="STCD5" id="STCD5" placeholder="Enter text"
                                   class="form-control">

                        </div>
                    </div>
                         <div class="form-group">
                        <label class="col-md-4 control-label">VAT Registration Number</label>
                        <div class="col-md-8">
                            <input  value=" " type="text" maxlength="40" name="STCEG" id="STCEG" placeholder="Enter text"
                                   class="form-control">

                        </div>
                    </div>

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
                    <div class="form-group">
                        <label class="col-md-4 control-label">Region</label>
                        <div class="col-md-8">
                            <input type="text" maxlength="3" name="REGION" id="REGION" placeholder="Enter text"
                                   class="form-control">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Country</label>
                        <div class="col-md-8">
                            <select name="LAND1" id="LAND1" class="form-control">

                            </select>

                        </div>
                    </div>
                    <div class="form-group" style="display:none">
                        <label class="col-md-4 control-label">Group Calculation Schema</label>
                        <div class="col-md-8">
                           <!-- <select name="KALSK" id="KALSK" class="form-control">

                            </select>-->
                            <input type="text" value="01"   name="KALSK" id="KALSK" placeholder="Enter text"
                                   >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Sales Person</label>
                        <div class="col-md-8">
                            <input type="text" maxlength="30" name="VERKF" id="VERKF" placeholder="Enter text"
                                   class="form-control">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Vendor Group</label>
                        <div class="col-md-8">
                            <select name="KTOKK" id="KTOKK" class="form-control">

                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Vendor Sub-Group</label>
                        <div class="col-md-8">
                            <select name="REGIOGROUP" id="REGIOGROUP" class="form-control">

                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">PO Box</label>
                        <div class="col-md-8">
                            <input type="text" maxlength="40" name="PO_BOX" id="PO_BOX" placeholder="Enter text"
                                   class="form-control">

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Customer Number</label>
                        <div class="col-md-8">
                            <input type="text" maxlength="10" name="KUNNR" id="KUNNR" placeholder="Enter text"
                                   class="form-control">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Related Party</label>
                        <div class="col-md-8">
                            <select name="RELATEDPARTY" id="RELATEDPARTY" class="form-control">
                                <option value="NO" >NO</option>
                                <option value="YES" >YES</option>
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
                    <div style="display: none" class="form-group">
                        <label class="col-md-4 control-label">Inter-Comapny Partner</label>
                        <div class="col-md-8">
                            <select name="RCOMP" id="RCOMP" class="form-control">

                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Company Code</label>
                        <div class="col-md-8">
                            <select name="COMP_CODE" id="COMP_CODE" class="form-control">

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
                    <div class="form-group">
                        <label class="col-md-4 control-label">Personnel Number</label>
                        <div class="col-md-8">
                            <input type="text" maxlength="8" name="PERNR" id="PERNR" placeholder="Enter text"
                                   class="form-control"  onkeypress="return isNumber(event)">

                        </div>
                    </div>
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
                    <div class="form-group">
                        <label class="col-md-4 control-label">Payment Method</label>
                        <div class="col-md-8">
                            <select name="ZWELS" id="ZWELS" class="form-control">

                            </select>

                        </div>
                    </div>
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
                <i class="fa fa-cogs"></i>Purchasing Data
            </div>


        </div>
        <div class="portlet-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Purchasing Organization</label>
                        <div class="col-md-8">
                            <select name="EKORG" id="EKORG" class="form-control">

                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Purchasing Group</label>
                        <div class="col-md-8">
                            <select name="EKGRP" id="EKGRP" class="form-control">

                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Rebate</label>
                        <div class="col-md-8">
                            <label class="checkbox"><input type="checkbox" id="BOLRE" name="BOLRE" value="X">Subsequent Settlement</label>
                            <label class="checkbox"><input type="checkbox" id="BOIND" name="BOIND" value="X">Subseq. Sett. Index</label>
                            <label class="checkbox"><input type="checkbox" id="UMSAE" name="UMSAE" value="X">B.vol.comp./ag.nec</label> 

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Currency</label>
                        <div class="col-md-8">
                            <select name="WAERS" id="WAERS" class="form-control">

                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">INCO Terms</label>
                        <div class="col-md-8">
                            <select required="" name="INCO1" id="INCO1" class="form-control">

                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">INCO Terms 2</label>
                        <div class="col-md-8">
                            <input  required=""type="text" maxlength="28" name="INCO2" id="INCO2" placeholder="Enter text"
                                    class="form-control">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Vendor Telephone</label>
                        <div class="col-md-8">
                            <input type="text" maxlength="40" name="TELF1" id="TELF1" placeholder="Enter text"
                                   class="form-control">

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



    <div class="col-xs-6">
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
    <div class="col-xs-6">
        {% include 'Shared/files.php' %}
        <!--  <div class="portlet box yellow-casablanca">
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
              </div>-->
    </div>
    <div class="clear clearfix"></div>
    {% include 'Shared/workflow.php' %}
    <input {{formdisabled}} type="submit" class="btn btn-success" value="Submit" onclick="return validateForm(this);"/>
    <div class="clear clearfix"></div>
</form>
<script src="./Frontend/Assets//global/plugins/jquery-validation/js/jquery.validate.min.js"
type="text/javascript"></script>
<script src="./Frontend/Assets//global/plugins/jquery-validation/js/additional-methods.min.js"
type="text/javascript"></script>
<script src="./Frontend/Assets//js/jinqjs.js"></script>
<script src="./Frontend/Assets//js/bytecode/FileManager.js"></script>
<script src="./Frontend/Assets//js/bytecode/VM.js?ref1"></script>
<script src="./Frontend/Assets//global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>

<script type="text/javascript">
    $(function () {
    $vm = new VM();
    {% if mode == "NEW" %}
    $vm.Boot("", "{{userinfo.UserID}}");
    {% else %}
    $vm.Boot("{{UID}}", "{{userinfo.UserID}}");
    {% endif %}
    EnableDateDrop($('.dtpicker'));
    });

    function validateForm(){
        var iban = $('#IBAN').val();
        if(iban && iban.length >0){
            var ibanVerification = IBAN.isValid(iban);
            if(!ibanVerification){
                alert('IBAN validation failed for : ' + iban);
                // $('#IBAN').focus();
                return false;
            }
        }
        return true;
    }
</script>