<!-- BEGIN BREADCRUMBS -->
<div class="breadcrumbs">

    <ol class="breadcrumb">
        <li>
            <a href="/index.php">Forms</a>
        </li>
        <li class="active"><a href="/index.php?module=PassportWithdrawal&method=Index">Passport Withdrawal</a></li>
    </ol>
</div>
<form method="POST" id="pyrform" action="">
    <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button>
        You have some form errors. Please check below.
    </div>
    <div class="alert alert-success display-hide">
        <button class="close" data-close="alert"></button>
        Your form validation is successful!
    </div>
    {% include 'Shared/messages.php' %}
    {% include 'Shared/formheader.php' %}

    <div class="portlet box blue-sharp">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>Request
            </div>
            <div class="actions">

            </div>
        </div>
        <div class="portlet-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="block" >
                            Location
                        </label>
                        <select id="HRLocation" name="HRLocation" class="form-control">

                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="block" >
                            Department
                        </label>
                        <select id="HRDepartment" name="HRDepartment" class="form-control">
                           
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="block" >
                            Employee 
                        </label>
                        <select id="HREmployeeName" name="HREmployeeName" data-field="HREmployeeName" class="form-control">
                          
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="block" >
                            DM ID
                        </label>
                        <input type="text" required="" maxlength="40" name="DMID" id="DMID" placeholder="ID #" readonly="" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="block" >
                            Position
                        </label>
                        <input type="text" required="" name="HRPosition" id="HRPosition" placeholder="Position" readonly="" class="form-control">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="block" >
                            Reason for Withdrawal
                        </label>
                        <input type="text" required="" name="Reason" id="Reason" placeholder="..."  class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="block" >
                            Passport Required On
                        </label>
                        <div class="input-group date dtpicker" id="RequiredOn">
                            <input placeholder="..." value="{{ "now"|date("Y-m-d") }}" required="" type="text" name="RequiredOn" id="RequiredOn" class="form-control" />
                                   <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="block" >
                            Passport Returned On (Expected Date)
                        </label>
                        <div class="input-group date dtpicker" id="ReturnOn">
                            <input placeholder="..." value="{{ "now"|date("Y-m-d") }}" required="" type="text" name="ReturnOn" id="ReturnOn" class="form-control" />
                                   <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="block" >
                            Travelling Date
                        </label>
                        <div class="input-group date dtpicker" id="TravellingOn">
                            <input placeholder="..." value="{{ "now"|date("Y-m-d") }}" required="" type="text" name="TravellingOn" id="TravellingOn" class="form-control" />
                                   <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-sm-6">
            {% include 'Shared/files.php' %}
        </div>
        <div class="col-sm-6">
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
    {% include 'Shared/workflow.php' %}
    <div class="row">
        <input type="submit" {{formdisabled}} class="btn btn-success" value="Submit" />
    </div>
</form>

<script src="/Frontend/Assets/global/plugins/jquery-validation/js/jquery.validate.min.js"
type="text/javascript"></script>
<script src="/Frontend/Assets/global/plugins/jquery-validation/js/additional-methods.min.js"
type="text/javascript"></script>
<script src="/Frontend/Assets/js/jinqjs.js"></script>
<script src="/Frontend/Assets/js/bytecode/FileManager.js"></script>
<script src="/Frontend/Assets//global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
<script src="/Frontend/Assets/js/bytecode/PassportWithdrawal.js?ref1"></script>
<script type="text/javascript">
    $(function () {
    $pw = new PassportWithdrawal();
    {% if mode == "NEW" %}
    $pw.Boot("", "{{userinfo.UserID}}");
    {% else %}
    $pw.Boot("{{UID}}", "{{userinfo.UserID}}");
    {% endif %}
    EnableDateDrop($('.dtpicker'));
    })


</script>