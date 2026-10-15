<!-- BEGIN BREADCRUMBS -->
<div class="breadcrumbs">

    <ol class="breadcrumb">
        <li>
            <a href="/">Forms</a>
        </li>
        <li>
            <a href="/index.php?module=AssetTransfer&method=List">Incident Report Dashboard</a>
        </li>
        <li class="active"><a href="/index.php?module=IncidentReport&method=Index">New Incident</a></li>
    </ol>
</div>
<form method="post" id="incenteform" action="" enctype="multipart/form-data">
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
                <i class="fa fa-cogs"></i>Incident Summary
            </div>
            <div class="actions">

            </div>
        </div>
        <div class="portlet-body">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="block" >
                            Incident / Accident #
                        </label>
                        <input value="" type="text" name="DummyCurrentLocation" class="form-control">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="block" >
                            Date and Time
                        </label>
                        <div class="input-group date" id="datetime">
                            <input type="text" name="IncidentDateTIme" class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="block" >
                            Incident Outcome
                        </label>
                        <select id="IncidentOutcome" name="IncidentOutcome" class="form-control">
                            <option value="Hight">Hight</option>
                            <option value="Medium">Medium</option>
                            <option value="Medium">Low</option>

                        </select>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <div class="portlet box blue-sharp">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>Employee / Contractor Involved in Incident/Accident
            </div>
            <div class="actions">

            </div>
        </div>
        <div class="portlet-body">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="block" >
                            Name
                        </label>
                        <input value="" type="text" name="EmployeeName" class="form-control">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="block" >
                            Department
                        </label>
                        <input value="" type="text" name="EmployeeDepartment" class="form-control">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="block" >
                            Sex
                        </label>
                        <select id="EmployeeSex" name="EmployeeSex" class="form-control">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>

                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="block" >
                            Employee or Contractor
                        </label>
                        <select id="EmloyeeOrContractor" name="EmployeeSex" class="form-control">
                            <option value="DM Employee">DM Employee</option>
                            <option value="Contractor">Contractor</option>


                        </select>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <div class="portlet box blue-sharp">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>Incident Detail
            </div>
            <div class="actions">
                <a id="NewAccident" class="btn green" href="javascript:;">
                    <i class="fa fa-plus"></i> Add Injury type
                </a>
                <a id="NewInjuryCause" class="btn  yellow-casablanca" href="javascript:;">
                    <i class="fa fa-plus"></i> Add Incident Cause
                </a>
            </div>
        </div>
        <div class="portlet-body">
            <div class="row">
                <div class="col-sm-4">
                    <img src="/Frontend/Assets/img/Body.jpg" width="50%" class="img-fluid" alt="Responsive image">
                </div>
                <div class="col-sm-4">
                    <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-cogs"></i>Injury Type
                            </div>
                            <div class="actions">

                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row" >
                                <table class="table table-striped table-bordered  table-hover table-responsive table-condensed" id="InjuryType">
                                    <thead>
                                        <tr>
                                            <th>
                                                Injury Type
                                            </th>
                                            <th>
                                                Comments
                                            </th>
                                            <th> </th>
                                        </tr>
                                    </thead>
                                    <tbody id="InjuryTypeBody"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="portlet box yellow-casablanca">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-cogs"></i>Incident Cause

                            </div>
                            <div class="actions">

                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row">
                                <table class="table table-striped table-bordered  table-hover table-responsive table-condensed" id="InjuryType">
                                    <thead>
                                        <tr>
                                            <th>
                                                Causation
                                            </th>
                                            <th>
                                                Comments
                                            </th>
                                            <th> </th>
                                        </tr>
                                    </thead>
                                    <tbody id="InjuryCauseBody"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <div class="portlet box yellow-casablanca">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>Incident Description

            </div>
            <div class="actions">

            </div>
        </div>
        <div class="portlet-body">
            <div class="row">
                <textarea class="form-control" rows="5"  placeholder="Describe, step-by-step the events that led up to the injury/Illness or damage. Include names of any machines, parts, objects, tools, materials Picture and other important details etc."></textarea>
            </div>
            <div class="row"> 
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="block" >
                            Name of Witness (If Any)
                        </label>
                        <input value="" type="text" name="EmployeeName" class="form-control">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="block" >
                            Root Cause
                        </label>
                        <input value="" type="text" name="EmployeeName" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="/Frontend/Assets//global/plugins/jquery-validation/js/jquery.validate.min.js"
type="text/javascript"></script>
<script src="/Frontend/Assets//global/plugins/jquery-validation/js/additional-methods.min.js"
type="text/javascript"></script>
<script src="/Frontend/Assets/js/jinqjs.js"></script>
<script src="/Frontend/Assets/js/bytecode/FileManager.js"></script>
<script src="/Frontend/Assets/js/bytecode/IncidentReport.js?ref1"></script>  

<script src="/Frontend/Assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
    $ir = new IncidentReport();
    { % if mode == "NEW" % }
    $ir.Boot("", "{{userinfo.UserID}}");
    { % else % }
    $ir.Boot("{{UID}}", "{{userinfo.UserID}}", {{enablecostcenter}});
    { % endif % }
    EnableDateDrop($('.dtpicker'), {});
    $('#datetime').datetimepicker();
    })
</script>
