<div class="row">
    <div class="col-sm-12">
        <div class="portlet box yellow-casablanca">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Forms
                </div>
                <div class="actions">

                </div>

            </div>
            <div class="portlet-body">
                <div class="tiles">
                    <div class="tile bg-purple-seance " onclick="window.location = '/index.php?module=MM&method=List'">

                        <div class="tile-body">
                            <i class="fa fa-newspaper-o"></i>
                        </div>
                        <div class="tile-object">
                            <div class="name"> Material Master</div>

                        </div>
                    </div>

                    <div class="tile bg-green-soft " onclick="window.location = '/index.php?module=VM&method=List'">

                        <div class="tile-body">
                            <i class="fa fa-briefcase"></i>
                        </div>
                        <div class="tile-object">
                            <div class="name"> Vendor Master</div>

                        </div>
                    </div>


                    <div class="tile bg-blue-soft " onclick="window.location = '/index.php?module=CM&method=List'">

                        <div class="tile-body">
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="tile-object">
                            <div class="name">Customer Master</div>

                        </div>
                    </div>


                   
                    <div class="tile bg-blue " onclick="window.location = '/index.php?module=AssetTransfer&method=List'">

                        <div class="tile-body">
                            <i class="fa fa-share"></i>
                        </div>
                        <div class="tile-object">
                            <div class="name">Asset Transfer</div>

                        </div>

                    </div>
                    
                </div> 
            </div>
        </div>

    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div id="MainChart" style="width: 100%; height: 400px;"></div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="portlet box yellow-casablanca">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>My Pending Forms
                </div>
                <div class="actions">
                    <span class="label label-info chartdaterange"></span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="GFormsUnderProcess"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="portlet box yellow-casablanca">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>My Approved Forms 
                </div>

                <div class="actions">
                    <span class="label label-info chartdaterange"></span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="GFormsApproved"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="portlet box yellow-casablanca">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Forms Pending For My Action
                </div>
                <div class="actions">
                    <span class="label label-info chartdaterange"></span>
                </div>

            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="GFormsForMyApproval"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/Frontend/Assets/kendoui/js/kendo.custom.min.js"></script>
<script src="/Frontend/Assets/js/amcharts/amcharts.js" type="text/javascript"></script>
<script src="/Frontend/Assets/js/amcharts/serial.js" type="text/javascript"></script>
<script src="/Frontend/Assets/js/amcharts/pie.js" type="text/javascript"></script>
<script src="/Frontend/Assets/js/amcharts/themes/light.js" type="text/javascript"></script>
<script src="/Frontend/Assets/js/bytecode/Dashboard.js" type="text/javascript"></script>
<script type="text/javascript">
                        $(document).ready(function () {
                            $d = new Dashboard();
                            $d.LoadData();
                        });


</script>