
<!-- BEGIN BREADCRUMBS -->
<div class="breadcrumbs">

    <ol class="breadcrumb">
        <li>
            <a href="/">Forms</a>
        </li>
        <li>
            <a href="/index.php?module=ExpenseReport&method=List">Expense Report Dashboard</a>
        </li>
        <li class="active"><a href="/index.php?module=ExpenseReport&method=Index">New</a></li>
    </ol>
</div>
<!-- END BREADCRUMBS -->
<form method="post" id="erform" action="" enctype="multipart/form-data">

    <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button> You have some form errors. Please check below.
    </div>
    <div class="alert alert-success display-hide">
        <button class="close" data-close="alert"></button> Your form validation is successful!
    </div>
    {% include 'Shared/messages.php' %}
    {% include 'Shared/formheader.php' %}
    <!--START TASK SUMMARY-->
    <!--   <div class="portlet box purple-soft">
           <div class="portlet-title">
               <div class="caption">
                   <i class="fa fa-cogs"></i>Report Summary
               </div>
           </div>
           <div class="portlet-body">
               <div class="row">
                   <div class="col-sm-5">
                       <div class="form-group form-md-line-input">
                           <input class="form-control" type="text" required="" name="employeename" id="_employeename" placeholder="Employee Name">
                       </div>
                       <div class="form-group form-md-line-input">
                           <input class="form-control" type="text" required="" name="department" placeholder="Department" id="_department">
                       </div>

                   </div>
                   <div class="col-sm-5 pull-right">
                       <div class="form-group form-md-line-input">
                           <input class="form-control" type="text" required="" name="orgreponsibility" id="_orgresponsibility" placeholder="Organization Reponsibility">
                       </div>
                       <div class="row">
                           <div class="col-sm-6">
                               <div class="form-group form-md-line-input">
                                   <div class="input-group date" id="periodfrom">
                                       <input required="" type="text" name="periodfrom" id="_periodfrom" class="form-control" />
                                       <span class="input-group-addon">
                                           <span class="glyphicon glyphicon-calendar"></span>
                                       </span>
                                   </div>
                               </div>
                           </div>
                           <div class="col-sm-6">
                               <div class="form-group form-md-line-input">
                                   <div class="input-group date" id="periodto">
                                       <input required="" type="text" name="periodto" id="_periodto" class="form-control" />
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
       </div>-->
    <!--END TASK SUNMARY-->
    <div class="portlet box blue-sharp">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>Main Expense
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
                                Date
                            </th>
                            <th>
                                Currency
                            </th>
                            <th>
                                Exchange Rate
                            </th>
                            <th>
                                Location
                            </th>
                             <th>
                                Description
                            </th>
                            <th>
                                Transportation
                            </th>
                            <th>
                                Lodging
                            </th>
                            <th>
                                Personal Meals
                            </th>
                            <th>
                                Incidental
                            </th>
                            <th>
                                Total(<span class="currencyinfo"></span>)
                            </th>
                        </tr>
                    </thead>
                    <tbody id="MainExpBody"></tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="portlet box red-flamingo">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>Other Business Expenses
            </div>
            <div class="actions">
                <a id="NewOtherExpbtn" class="btn green" href="javascript:;">
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
                                Date
                            </th>
                            <th>
                                Currency
                            </th>
                            <th>
                                Exchange Rate
                            </th>
                            <th>
                                Entertain
                            </th>
                            <th>
                                Gifts
                            </th>
                            <th>
                                Description
                            </th>
                            <th>
                                Total(<span class="currencyinfo"></span>)
                            </th>
                        </tr>
                    </thead>
                    <tbody id="OtherExpBody"></tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="portlet box grey-steel">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>Company Automotive Expense
            </div>
            <div class="actions">
                <a id="NewAutoExpbtn" class="btn green" href="javascript:;">
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
                                Week Ending
                            </th>
                            <th>
                                Currency
                            </th>
                            <th>
                                Exchange Rate
                            </th>
                            <th>
                                Fuel GAL/Liters
                            </th>
                            <th>
                                Fuel Cost
                            </th>
                            <th>
                                Oil QTS
                            </th>
                            <th>
                                Oil Cost
                            </th>
                            <th>
                                Wash
                            </th>
                            <th>
                                Tires
                            </th>
                            <th>
                                Repair/Maintain
                            </th>
                            <th>
                                Park
                            </th>
                            <th>
                                Tolls
                            </th>
                            <th>
                                Misc
                            </th>
                            <th>
                                Total(<span class="currencyinfo"></span>)
                            </th>
                        </tr>
                    </thead>
                    <tbody id="FuelExpBody"></tbody>
                </table>
            </div>

        </div>
    </div>
    <div class="portlet box yellow-mint">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>Check Advances and Company Paid Charges
            </div>
            <div class="actions">
                <a id="NewCheckbtn" class="btn green" href="javascript:;">
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
                                Date
                            </th>
                            <th>
                                Currency
                            </th>
                            <th>
                                Exchange Rate
                            </th>
                            <th>
                                Description
                            </th>
                            <th>
                                Amount
                            </th>
                            <th>
                                Total (<span class="currencyinfo"></span>)
                            </th>
                        </tr>
                    </thead>
                    <tbody id="CheckTableBody"></tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-9">
            <div class="portlet box yellow-mint">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs"></i>   Summary of Totals
                    </div>
                    <div class="actions">

                    </div>
                </div>

                <div class="portlet-body">
                    <div class="row">

                        <table class="table table-condensed table-responsive">
                            <thead>
                                <tr>
                                    <th>

                                    </th>
                                    <th>

                                    </th>
                                    <th>

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td>
                                        <div class="form-group">
                                            <label for="MainExpGrandTotal">Main Expense Total (<span class="currencyinfo"></span>)</label>
                                            <input name="MainExpGrandTotal" type="text" readonly="readonly" class="form-control" id="MainExpGrandTotal" placeholder="0.00">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <label for="OtherExpGrandTotal">Other Business Expense (<span class="currencyinfo"></span>)</label>
                                            <input name="OtherExpGrandTotal" type="text" readonly="readonly" class="form-control" id="OtherExpGrandTotal" placeholder="0.00">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <div class="form-group">
                                            <label for="AutoExpGrandTotal">Automotive Expense Total (<span class="currencyinfo"></span>)</label>
                                            <input name="AutoExpGrandTotal" type="text" readonly="readonly" class="form-control" id="AutoExpGrandTotal" placeholder="0.00">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <label for="CheckAdvGrandTotal">Check Advances Total (<span class="currencyinfo"></span>)</label>
                                            <input name="CheckAdvGrandTotal" type="text" readonly="readonly" value="0.00" class="form-control" id="CheckAdvGrandTotal" placeholder="0.00">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            {% include 'Shared/files.php' %}
            <div class="alert alert-warning display-hide" style="display: block;">
                <button data-close="alert" class="close"></button>
                <span><Strong>* For all claims it is mandatory to provide scanned bills and Approved BTR’s for reimbursements</Strong></span>
            </div>

        </div>
    </div>
    <div class="row">

        <div class="col-sm-9">
            <table class="table table-condensed table-responsive">
                <thead>
                    <tr>
                        <th>
                            Total Gross expense (<span class="currencyinfo"></span>)
                        </th>
                        <th>
                            Total Check Advances (<span class="currencyinfo"></span>)
                        </th>
                        <th>
                            Net Total (<span class="currencyinfo"></span>)
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input readonly="" type="text" name="GrossTotal" class="form-control" id="totalgross" placeholder="0.00" value="0.00">
                        </td>
                        <td>
                            <input readonly="" type="text" name="CheckAdvancesTotal" class="form-control" id="totalcheckadvance" value="0.00" placeholder="0.00">
                        </td>
                        <td>
                            <input readonly="" type="text" name="NetTotal" class="form-control" id="nettotal" value="0.00" placeholder="0.00">
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        <div>
            <div class="col-sm-3">
                <div class="portlet box yellow-mint">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-cogs"></i>  Business Unit
                        </div>
                        <div class="actions">

                        </div>
                    </div>

                    <div class="portlet-body">
                        <div class="row">
                            <label class="col-md-4 control-label" id="SBUTITLE">Business Unit</label>
                            <div class="col-md-8">
                                <select class="form-control" name="SBUID" id="SBUList">
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

            </div> 
        </div>
    </div>
    {% include 'Shared/workflow.php' %}
    <div class="row">
        <input type="submit" {{formdisabled}} class="btn btn-success" value="Submit" />
    </div>
</form>
<script src="/Frontend/Assets//global/plugins/jquery-validation/js/jquery.validate.min.js"
type="text/javascript"></script>
<script src="/Frontend/Assets//global/plugins/jquery-validation/js/additional-methods.min.js"
type="text/javascript"></script>



<script src="/Frontend/Assets/js/bytecode/FileManager.js"></script>
<script src="/Frontend/Assets/js/bytecode/ExpenseReport.js?"></script>

<script type="text/javascript">

    $(function () {
    $er = new ExpenseReport();
    {% if mode == "NEW" %}
    $er.Boot("", "{{userinfo.UserID}}");
    {% else %}
    $er.Boot("{{UID}}", "{{userinfo.UserID}}");
    {% endif %}
    EnableDateDrop($('.dtpicker'));
    })
</script>