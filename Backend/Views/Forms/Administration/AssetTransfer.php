<!-- BEGIN BREADCRUMBS -->
<div class="breadcrumbs">

    <ol class="breadcrumb">
        <li>
            <a href="/">Forms</a>
        </li>
        <li>
            <a href="/index.php?module=AssetTransfer&method=List">Asset Transfer Dash</a>
        </li>
        <li class="active"><a href="/index.php?module=AsseTransfer&method=Index">Asset Transfer Request</a></li>
    </ol>
</div>
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
                <i class="fa fa-cogs"></i>Asset Location
            </div>
            <div class="actions">

            </div>
        </div>
        <div class="portlet-body">
            <div class="row">

                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="block" >
                                    Current Location
                                </label>
                              <!--  <select id="CurrentLocation" name="CurrentLocation" class="form-control" disabled="">
                                    <option selected="" value="UAE">UAE</option>
                                    <option value="KSA">KSA</option>

                                </select>-->
                                <input type="text" style="display: none" id="CurrentLocation" readonly=""  name="CurrentLocation" class="form-control">
                                <input value="{{SelectedCountry.Title}}" type="text" readonly=""   id="DummyCurrentLocation" name="DummyCurrentLocation" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="block" >
                                    Current Department
                                </label>
                                <select id="CurrentDepartment" name="CurrentDepartment" class="form-control">
                                    <option value="Procurement">Procurement</option><option value="Management">Management</option><option value="Sales &amp; Procure">Sales &amp; Procure</option><option value="HR">HR</option><option value="Supply Chain">Supply Chain</option><option value="Qlty Assurance">Qlty Assurance</option><option value="Finance">Finance</option><option value="Sales Fresh">Sales Fresh</option><option value="Warehouse">Warehouse</option><option value="Logistics">Logistics</option><option value="Production">Production</option><option value="Engineering">Engineering</option><option value="National Sales">National Sales</option><option value="Fresh Export">Fresh Export</option><option value="Operations">Operations</option><option value="IT">IT</option><option value="Sales Export">Sales Export</option><option value="Sales">Sales</option><option value="Marketing">Marketing</option><option value="Farming Admin">Farming Admin</option>
                                    <option value="FandB">F&B</option>
                                    <option value="Legal">Legal</option>

                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="block" >
                                    New Location
                                </label>
                                <select id="NewLocation" name="NewLocation" class="form-control">
                                    {% for c in assetcountries %}

                                    <option value="{{ c.Code|e }}">{{ c.Title|e }}</option>
                                    {% endfor %}
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="block" >
                                    New Department
                                </label>
                                <select id="NewDepartment" name="NewDepartment" class="form-control">
                                    <option value="Procurement">Procurement</option><option value="Management">Management</option><option value="Sales &amp; Procure">Sales &amp; Procure</option><option value="HR">HR</option><option value="Supply Chain">Supply Chain</option><option value="Qlty Assurance">Qlty Assurance</option><option value="Finance">Finance</option><option value="Sales Fresh">Sales Fresh</option><option value="Warehouse">Warehouse</option><option value="Logistics">Logistics</option><option value="Production">Production</option><option value="Engineering">Engineering</option><option value="National Sales">National Sales</option><option value="Fresh Export">Fresh Export</option><option value="Operations">Operations</option><option value="IT">IT</option><option value="Sales Export">Sales Export</option><option value="Sales">Sales</option><option value="Marketing">Marketing</option><option value="Farming Admin">Farming Admin</option><option value="Quality Assuran">Quality Assuran</option>
 <option value="FandB">F&B</option>
                                    <option value="Legal">Legal</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portlet box blue-sharp">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>Asset List
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
                                Asset #
                            </th>
                            <th>
                                Serial #
                            </th>
                            <th>
                                Description
                            </th>
                            <th>
                                Purchase Date
                            </th>
                            <th>
                                Useful Life (In Years)
                            </th>
                            <th>
                                Quantity
                            </th>
                            <th>
                                Original Life
                            </th>
                            <th>
                                Net Book Value (<span class="currencyinfo"></span>)
                            </th>
                            <th>

                            </th>
                        </tr>
                    </thead>
                    <tbody id="MainAssetBody"></tbody>
                </table>
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
                                Value Allocated 
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
                        <i class="fa fa-cogs"></i>Asset Transfer Justification
                    </div>
                    <div class="actions">

                    </div>
                </div>

                <div class="portlet-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Reason for Transfer</label>
                                <div class="col-md-9">
                                    <textarea rows="3" class="form-control" name="ReasonForTransfer"></textarea>
                                </div>
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
<script src="/Frontend/Assets/js/bytecode/AssetTransfer.js?ref1"></script>  

<script src="/Frontend/Assets//global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
    $at = new AssetTransfer();
    {% if mode == "NEW" %}
    $at.Boot("", "{{userinfo.UserID}}");
    {% else %}
    $at.Boot("{{UID}}", "{{userinfo.UserID}}", {{enablecostcenter}});
    {% endif %}
    EnableDateDrop($('.dtpicker'), {});
    })
</script>