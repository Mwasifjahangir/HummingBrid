<!-- start: PAGE TITLE -->
<section id="page-title">
    <div class="row">
        <div class="col-sm-8">
            <h1 class="mainTitle">FORMS - CreditNote Request</h1>

        </div>
        <ol class="breadcrumb">
            <li>
                <span>Forms</span>
            </li>
            <li>
                <span>Finance</span>
            </li>
            <li class="active">
                <span>CreditNote Request</span>
            </li>
        </ol>
    </div>
</section>
<!-- end: PAGE TITLE -->
<!-- start: YOUR CONTENT HERE -->
<form method="POST" id="crdreqform" action="?module=CreditNoteRequest&method=ProcessForm">
    <div class="container" id="CRDREQ_INPUT" >
        <input id="CRDREQ_FormID" name="FormID"  type="text" value="" style="display:none">
        <div class="row rowbuffer">
            <div class="col-sm-4">

            </div>
            <div class="col-sm-4">
                <div id="WF_Region_Wrap"  class="form-group">

                </div>
            </div>
            <div class="col-sm-4">
                <div id="WF_Country_Wrap"  class="form-group">

                </div>

            </div>
        </div>
        <div class="row rowbuffer">
            <div class="col-sm-4">
                <p>
                    Form name: <span id="CRDREQ_Code">2014066565</span><br/>
                    User: <span id="CRDREQ_User">{{userinfo.DisplayName}}</span><br/>
                    Mode: <span id="CRDREQ_Mode">Saved</span><br/>
                </p>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label class="block" >
                        Division
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox1" value="option1">Fresh
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox2" value="option2">Food    
                    </label>

                </div>
            </div>
            <div class="col-sm-5">
                <div class="row form-horizontal">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">
                            Total in <span id="localcurrency">GBP</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" readonly="" name="countrycurrencytotal" class="form-control underline" id="countrycurrencytotal" placeholder="0.00">
                        </div>
                    </div>
                </div>
                <div class="row form-horizontal">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">
                            Total in USD
                        </label>
                        <div class="col-sm-6">
                            <input type="text" name="usdtotal" class="form-control underline" readonly="" id="usdtotal" placeholder="0.00">
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row rowbuffer">
            <div class="col-sm-6">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label  for="exampleInputEmail3">Customer Code</label>
                        <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Customer Code">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label  for="exampleInputEmail3">Customer Name</label>
                        <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Customer Name">
                    </div>
                </div>
                <div class="col-sm-4    ">
                    <div class="form-group">
                        <label for="exampleInputEmail3">Reference No</label>
                        <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Reference No">
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox1" value="option1">In-Store Promotion
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox2" value="option2">Stand Display
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox2" value="option2">Floor Display
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox2" value="option2">Rebate
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox2" value="option2">Gondola Rent
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox2" value="option2">Listing Rent
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox2" value="option2">Opening Fees
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox2" value="option2">Other Fees
                </label>
            </div>

        </div>
        <div class="row rowbuffer">
            <div class="col-sm-6"><h4>Items</h4></div>
            <div class="col-sm-6"><button onclick="$pr.AddItem();" type="button" class="btn btn-green pull-right"><i class="ti-plus"></i> Add Item</button></div>

            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-striped table-hover PYRItems" id="sample_2">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Vendor</th>
                                <th>Item</th>
                                <th>Quantity</th>
                                <th>Cost/Unit</th>
                                <th>Currency</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody id="pyr_body">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="comments"><h4>Comments</h4></label>
                    <textarea id="comments" data-field="Comments" class="form-control"></textarea>
                </div>
            </div>
            <div class="col-sm-6">
                <h4>Files</h4>
                <div class="row" id="extfiles">

                </div>
                <div class="row" id="actions">

                    <div class="col-lg-7">
                        <!-- The fileinput-button span is used to style the file input field as button -->
                        <span class="btn btn-success fileinput-button dz-clickable">
                            <i class="glyphicon glyphicon-plus"></i>
                            <span>Add files...</span>
                        </span>
                    </div>

                    <div class="col-lg-5">
                        <!-- The global file processing state -->
                        <span class="fileupload-process">
                            <div aria-valuenow="0" aria-valuemax="100" aria-valuemin="0" role="progressbar" class="progress progress-striped active" id="total-progress">
                                <div data-dz-uploadprogress="" style="width: 100%;" class="progress-bar progress-bar-success"></div>
                            </div>
                        </span>
                    </div>

                </div>
                <div class="row">
                    <div class="table table-striped" class="files" id="previews">

                        <div id="template" class="file-row">
                            <!-- This is used as the file preview template -->
                            <div style="display: none">
                                <span class="preview"><img data-dz-thumbnail /></span>
                            </div>
                            <div>
                                <p class="name" data-dz-name></p>
                                <strong class="error text-danger" data-dz-errormessage></strong>
                            </div>
                            <div>
                                <p class="size" data-dz-size></p>
                                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                    <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--<div class="row">
            <h4>Progress</h4>
            <div class="col-sm-12">

                <div class="progress progress-striped active">
                    <div style="width: 60%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-warning">
                        60% Complete (success)
                    </div>
                </div>
            </div>
        </div>-->
        <!-- Approvers -->
        <div class="row">

            <div class="row">
                <div class="col-md-6"><h4>Workflow CNP</h4></div>
                <div class="col-md-6"><button id="AddWFUser" type="button" class="btn btn-green pull-right"><i class="ti-plus"></i> Add User</button></div>

            </div>
            <div class="row">
                <div class="table-responsive">

                    <table class="table table-bordered table-hover" id="sample-table-1">
                        <thead>
                            <tr>
                                <th>Approver</th>
                                <th>Status</th>
                                <th>Action</th>
                                <th><i class="fa fa-time"></i> Update </th>
                                <th>Comment</th>
                            </tr>
                        </thead>
                        <tbody id="PYR_WF">


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end: YOUR CONTENT HERE -->


    </div>
</form>
<div class="row pull-right">
    <div class="col-sm-6"><button id="finalsave" onclick="$pr.MarkFinalSave(this)" class="btn btn-azure" type="button">Save</button></div>
    <div class="col-sm-6"><button onclick="$pr.CheckFinalSubmit()" id="finalsubmit" disabled="" class="btn btn-azure" type="button"  >Submit</button></div>

</div>
<script type="text/javascript">
    var $pr;
    var $wf;
    var $fm;
    function cint(number) {
        number = parseInt(number);
        return isNaN(number) ? 0 : number;
    }
    function CheckNull(item) {
        if (typeof (item) === "undefined" || item === null) {
            return "";
        }
        return item;
    }
    jQuery(document).ready(function () {

        fx.base = "USD";
        fx.rates = {
            "SAR": 3.75,
            "AED": 3.67,
            "EUR": 0.745101, // eg. 1 USD === 0.745101 EUR
            "GBP": 0.647710, // etc...
            "HKD": 7.781919,
            "USD": 1, // always include the base rate (1:1)
            /* etc */
        }
        /*$pr = new bytecode.PaymentRequest("pyr_body");
         $pr.MainInputContainer = "PYR_INPUT";
         $pr.FormCodeContainer = "PYR_Code"
         $pr.FormModeContainer = "PYR_Mode";
         $pr.FormIDContainer = "PYR_FormID";*/
        // $pr.LoadEixstingForm(1);
        { % if mode == "New" % }
        //$pr.Boot("New")
        { % else % }
        //$pr.Boot("Existing", {{formid}})
        { % endif % }


    });
</script>