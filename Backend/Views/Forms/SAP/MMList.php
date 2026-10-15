<div class="breadcrumbs">

    <ol class="breadcrumb">
        <li>
            <a href="#">Forms</a>
        </li>
        <li class="active">Material Master</li>
    </ol>
</div>
<div class="row">
    <div class="row ">
        <div class="col-sm-12">
            <button onclick="javascript: window.location = '/index.php?module=MM&method=Index'" class="btn grey-cascade btn-large pull-right" style="margin:15px" type="submit">New Material Master Request</button>
        </div>
    </div>
    <!--START MY Worklist-->
    <div class="row ">
        <div class="col-sm-12">
            <div class="portlet box green-sharp">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs"></i>Forms under Process
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div id="MainExp"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--END MY Worklist-->
    <div class="col-sm-6">
        <div class="portlet box green-sharp">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Forms for My Approval
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div id="FMyaction"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- SECOND COLUMN:Forms i Approved-->
    <div class="col-sm-6">
        <div class="portlet box purple">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Approved Forms
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">

                    <div id="FApproved"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script id="detailsTemplate" type="text/x-kendo-template">
    <tr class="row">
    <td>#= CreatedOn#</td>
    <td><a href="/Form/MaterialMaster/Manage?UID= #= UID#">#= Code #</a></td>
    <td></td>
    <td>#= UpdatedOn #</td>
    </tr>

</script>
<script src="/Frontend/Assets/kendoui/js/kendo.custom.min.js"></script>
<script type="text/javascript">


                $(document).ready(function () {

                    var remoteDataSource = new kendo.data.DataSource({
                        transport: {
                            read: {
                                url: "rpc.php?module=MM&method=GetFormsUnderProcess",
                                dataType: "json",
                                serverPaging: true
                            }


                        },
                        schema: {
                            total: "Total",
                            data: "Forms",
                            // total:"Total",
                            model: {
                                fields: {

                                    ///   CreatedOn: { type: "date" }
                                }
                            }
                        },
                        pageSize: 10,
                        serverPaging: true
                    });
                    $("#MainExp").kendoGrid({
                        columns: [{
                                title: "Created On", field: "f.CreatedOn.date",
                                template: '#= kendo.toString(new Date(f.CreatedOn.date), "yyyy-MM-dd hh:mm") #'

                            },
                            {title: "Code", field: "f.Code", template: '<a href="/index.php?module=MM&method=ViewForm&UID=#= f.UID#">#= f.Code#</a>'},
                            {title: "Pending with", field: "wf.NextUser.DisplayName"},
                            {title: "Status", template: '<span class="label label-warning"><strong>Pending</strong></span>'}
                        ],

                        dataSource: remoteDataSource,
                        mobile: true,
                        pageable: true,

                    });

                    // Forms for my approval:
                    var myappds = new kendo.data.DataSource({
                        transport: {
                            read: {
                                url: "rpc.php?module=MM&method=GetFormsPendingForMyAction",
                                dataType: "json",
                                serverPaging: true
                                        /*,
                                         data: {
                                         q: function () {
                                         return $("#searchFor").val();
                                         }
                                         }*/
                            }
                            //


                        },
                        schema: {
                            total: "Total",
                            data: "Forms",
                            // total:"Total",
                            model: {
                                fields: {

                                    //CreatedOn: { type: "date" }
                                }
                            }
                        },
                        pageSize: 10,
                        serverPaging: true
                    });
                    $("#FMyaction").kendoGrid({
                        columns: [{
                                title: "Created On", field: "f.CreatedOn",
                                template: '#= kendo.toString(new Date(f.CreatedOn.date), "yyyy-MM-dd hh:mm") #'
                            },
                            {title: "Code", field: "f.Code", template: '<a href="/index.php?module=MM&method=ViewForm&UID=#= f.UID#">#= f.Code#</a>'},
                            {title: "Creator", field: "wf.DisplayName"},
                            {title: "Status", template: '<span class="label label-warning"><strong>Pending</strong></span>'}
                        ],

                        dataSource: myappds,
                        mobile: true,
                        pageable: true,

                    });



                    var fapproved = new kendo.data.DataSource({
                        transport: {
                            read: {
                                url: "rpc.php?module=MM&method=GetFormsApproved",
                                dataType: "json",
                                serverPaging: true
                                        /*,
                                         data: {
                                         q: function () {
                                         return $("#searchFor").val();
                                         }
                                         }*/
                            }
                            //


                        },
                        schema: {
                            total: "Total",
                            data: "Forms",
                            // total:"Total",
                            model: {
                                fields: {

                                    CreatedOn: {type: "date"}
                                }
                            }
                        },
                        pageSize: 10,
                        serverPaging: true
                    });
                    $("#FApproved").kendoGrid({
                        columns: [{
                                title: "Created On", field: "f.CreatedOn.date",
                                template: '#= kendo.toString(new Date(f.CreatedOn.date), "yyyy-MM-dd hh:mm") #'
                            },
                            {title: "Code", field: "f.Code", template: '<a href="/index.php?module=MM&method=ViewForm&UID=#= f.UID#">#= f.Code#</a>'},
                            {title: "SAP Material #", field: "f.PE_MATNR"},
                            {title: "Status", template: '<span class="label label-success"><strong>Approved</strong></span>'}
                        ],

                        dataSource: fapproved,
                        mobile: true,
                        pageable: true,

                    });
                });


</script>