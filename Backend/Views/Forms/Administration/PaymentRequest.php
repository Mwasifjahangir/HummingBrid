
<!-- BEGIN BREADCRUMBS -->
<div class="breadcrumbs">

    <ol class="breadcrumb">
        <li>
            <a href="/index.php">Forms</a>
        </li>
        <li class="active"><a href="/index.php?module=PaymentRequest&method=Index">Payment Request</a></li>
    </ol>
</div>
<!-- end: PAGE TITLE -->
<!-- start: YOUR CONTENT HERE -->
<form method="POST" id="passwithform">
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
                <i class="fa fa-cogs"></i>Summary
            </div>
            <div class="actions">

            </div>
        </div>
        <div class="portlet-body">
            <div class="row">

                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="block" >
                            Payment Mode
                        </label>
                        <select id="PaymentMode" name="PaymentMode" class="form-control">
                            <option selected="" value="Cash">Cash</option>
                            <option value="Check">Check </option>
                            <option value="Bank">Bank Transfer</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="row form-horizontal">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">
                                Total in <span class="currencyinfo"></span>
                            </label>
                            <div class="col-sm-6">
                                <input type="text" readonly="" name="TotalLocal" class="form-control underline" id="TotalLocal" placeholder="0.00">
                            </div>
                        </div>
                    </div>
                    <div class="row form-horizontal">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">
                                Total in USD
                            </label>
                            <div class="col-sm-6">
                                <input type="text" name="TotalUSD" class="form-control underline" readonly="" id="TotalUSD" placeholder="0.00">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portlet box yellow-mint">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>Line Items
            </div>
            <div class="actions">
                <a id="NewMainItembtn" class="btn green" href="javascript:;">
                    <i class="fa fa-plus"></i> Add
                </a>
            </div>
        </div>
        <div class="portlet-body">
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered  table-hover table-responsive table-condensed" >
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Vendor</th>
                                <th>Item</th>
                                <th>Quantity</th>
                                <th>Cost/Unit</th>
                                <th>Currency</th>
                                <th>Exchange Rate</th>
                                <th>Amount (<span class="currencyinfo"></span>)</th>
                            </tr>
                        </thead>
                        <tbody id="MainPYRBody">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="col-sm-6"> 
            <div class="portlet box red-flamingo ">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs"></i>Comments & Attachments
                    </div>
                    <div class="actions">

                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-sm-13">
                            <div class="form-group">
                                <label for="Comments"><h4>Comments</h4></label>
                                <textarea id="Comments" name="Comments" data-field="Comments" class="form-control"></textarea>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <div class="col-sm-6">
            {% include 'Shared/files.php' %}
        </div>
    </div>

    {% include 'Shared/workflow.php' %}


</form>
<div class="row">
    <input type="submit" {{formdisabled}} class="btn btn-success" value="Submit" />
</div>
<script src="/Frontend/Assets/global/plugins/jquery-validation/js/jquery.validate.min.js"
type="text/javascript"></script>
<script src="/Frontend/Assets/global/plugins/jquery-validation/js/additional-methods.min.js"
type="text/javascript"></script>
<script src="/Frontend/Assets/js/jinqjs.js"></script>
<script src="/Frontend/Assets/js/bytecode/FileManager.js"></script>
<script src="/Frontend/Assets/js/bytecode/PaymentRequest.js?ref1"></script>

<script src="/Frontend/Assets//global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
    $pr = new PaymentRequest();
    {% if mode == "NEW" %}
    $pr.Boot("", "{{userinfo.UserID}}");
    {% else %}
    $pr.Boot("{{UID}}", "{{userinfo.UserID}}");
    {% endif %}
    EnableDateDrop($('.dtpicker'));
    })


</script>