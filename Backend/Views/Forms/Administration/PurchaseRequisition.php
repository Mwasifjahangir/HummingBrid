
<!-- BEGIN BREADCRUMBS -->
<div class="breadcrumbs">

    <ol class="breadcrumb">
        <li>
            <a href="/">Forms</a>
        </li>
        <li class="active"><a href="/index.php?module=ExpenseReport&method=List">Purchase Requisition</a></li>
    </ol>
</div>
<!-- END BREADCRUMBS -->
<form method="post" id="prform" action="" enctype="multipart/form-data">
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

                <table class="table table-striped table-bordered  table-hover table-responsive table-condensed">
                    <thead>
                        <tr>
                            <th>
                                Item Description
                            </th>
                            <th>
                                Currency
                            </th>
                            <th>
                                Exchange Rate
                            </th>
                            <th>
                                Quantity/Service
                            </th>
                            <th>
                                Targeted Cost/Unit
                            </th>
                            <th>
                                Targeted Total Cost (<span class="currencyinfo"></span>)
                            </th>
                            <th>

                            </th>
                        </tr>
                    </thead>
                    <tbody id="MainExpBody"></tbody>
                </table>
            </div>
            <div class="row">
                <div class="form-group pull-right">
                    <label class="col-md-4 control-label"><strong>Total (<span class="currencyinfo"></span>)</strong></label>
                    <div class="col-md-8">
                        <input type="text" id="PRTotalLocal" readonly="" placeholder="0.00" value="0.00" name="PRTotalLocal" class="form-control">
                    </div>
                </div>
                <div class="form-group pull-right">
                    <label class="col-md-4 control-label"><strong>Total (USD)</strong>
                    </label>
                    <div class="col-md-8">
                        <input type="text" id="PRTotalUSD" readonly="" placeholder="0.00" value="0.00" name="PRTotalUSD" class="form-control">
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="portlet box blue-sharp">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>Cost Center Allocation
            </div>
            <div class="actions">
                <a id="NewCostCenterItembtn" class="btn green" href="javascript:;">
                    <i class="fa fa-plus"></i> Add
                </a>
            </div>
        </div>
        <div class="portlet-body">
            <div class="row">

                <table class="table table-striped table-bordered  table-hover table-responsive table-condensed">
                    <thead>
                        <tr>
                            <th>
                                Cost Center
                            </th>
                            <th>
                                Percentage (%)
                            </th>
                            <th>
                                Value Allocated (<span class="currencyinfo"></span>)
                            </th>
                            <th>
                            
                            </th>
                        </tr>
                    </thead>
                    <tbody id="CostCenterBody"></tbody>
                </table>
            </div>
            <div class="row">

                <div class="form-group pull-right">
                    <label class="col-md-4 control-label">Total Allocation (%)</label>
                    <div class="col-md-8">
                        <input type="text" id="CostCenterTotalPer" readonly="" placeholder="0.00" value="0.00" name="CostCenterTotalPer" class="form-control">
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
                        <i class="fa fa-cogs"></i>Purchase Requisition Meta
                    </div>
                    <div class="actions">

                    </div>
                </div>

                <div class="portlet-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Type Of Purchase</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="PRType">
                                        <option value="Local">Local Purchase Requisition</option>
                                        <option value="Corporate">Corporate Purchase Requisition</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Required Date of Delivery</label>
                                <div class="col-md-9">
                                    <div class="input-group date dtpicker" id="deliverydate">
                                        <input placeholder="Delivery Date" required="" type="text" name="DeliveryDate" id="_deliveryDate" class="form-control" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Reason for Purchase</label>
                                <div class="col-md-9">
                                    <textarea rows="3" class="form-control" name="PurchaseReason"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-md-3 control-label">Business Unit</label>
                            <div class="col-md-9">
                                <select class="form-control" name="SBUID" id="SBUList">
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            {% include 'Shared/files.php' %}
        </div>
    </div>

    {% include 'Shared/workflow.php' %}
    <div class="row">
        <input type="submit"  {{formdisabled}} class="btn btn-success" value="Submit" />
    </div>
</form>
<script src="/Frontend/Assets//global/plugins/jquery-validation/js/jquery.validate.min.js"
type="text/javascript"></script>
<script src="/Frontend/Assets//global/plugins/jquery-validation/js/additional-methods.min.js"
type="text/javascript"></script>
<script src="/Frontend/Assets/js/jinqjs.js"></script>
<script src="/Frontend/Assets/js/bytecode/FileManager.js"></script>
<script src="/Frontend/Assets/js/bytecode/PurchaseRequisition.js?ref1"></script>

<script src="/Frontend/Assets//global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
    $pr = new PurchaseRequisition();
    {% if mode == "NEW" %}
    $pr.Boot("", "{{userinfo.UserID}}");
    {% else %}
    $pr.Boot("{{UID}}", "{{userinfo.UserID}}");
    {% endif %}
    EnableDateDrop($('.dtpicker'), {minDate: new Date()});
    })
</script>