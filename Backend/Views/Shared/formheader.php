<div class="row">
    <div class="col-sm-4">
        <div class="portlet box purple-soft">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Location
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div id="WF_Region_Wrap" class="form-group">

                            </div>
                        </div>
                        <div class="row">
                            <div id="WF_Country_Wrap" class="form-group ">

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="portlet box purple-soft">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Report Summary
                </div>

            </div>

            <div class="portlet-body">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="form-group form-md-line-input">
                            <input  value="{{ userinfo.DisplayName }}" class="form-control" type="text" required="" name="EmployeeName" id="_employeename" placeholder="Requested By">
                        </div>
                        <div class="form-group form-md-line-input">
                            <input value="{{ userinfo.Department }}" class="form-control" type="text" required="" name="Department" placeholder="Department" id="_department">
                        </div>

                    </div>
                    <div class="col-sm-5 pull-right">
                        <div class="form-group form-md-line-input">
                            <input value="{{ userinfo.Title}}"  class="form-control" type="text" required="" name="OrganizationResponsibility" id="_position" placeholder="Position">
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group form-md-line-input">
                                    <div class="input-group date dtpicker" id="periodfrom">
                                        <input placeholder="Report from" value="{{ "now"|date("Y-m-d") }}" required="" type="text" name="ReportFrom" id="_periodfrom" class="form-control" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-md-line-input">
                                    <div class="input-group date dtpicker" id="periodto">
                                        <input placeholder="Report to" required="" value="{{ "now"|date("Y-m-d") }}" type="text" name="ReportTo" id="_periodto" class="form-control" />
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
                        <div class="well">
                            Initiator <strong><span id="FormMETACreatorUser">{{ userinfo.DisplayName }}</span></strong>
                        </div>
                    </div>
                    <div class="col-sm-6 pull-right"> <button type="button" class="btn btn-success" id="PDFExport">PDF Export</button></div>
                    
                </div>
            </div>
        </div>
    </div>

</div>