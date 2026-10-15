<div class="portlet box yellow-casablanca">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-cogs"></i>Files
        </div>

    </div>

    <div class="portlet-body">
        <div class="row">
            <div class="container" id="fcontainer">
                
            </div>
        </div>
        <span class="btn btn-success fileinput-button dz-clickable">
            <i class="glyphicon glyphicon-plus"></i>
            <span>Add files...</span>
        </span>
        <div class="table table-striped" class="files" id="previews">

            <div id="filetemplate" class="file-row">
                <!-- This is used as the file preview template -->
                <div>
                    <span class="filepreviews" style="max-width: 200px; max-height: 200px"><img data-dz-thumbnail /></span>
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
        <span class="fileupload-process">
          <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="opacity: 0;">
            <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress=""></div>
          </div>
        </span>
    </div>
</div>
<input name="FormFiles" id="FormFiles"  style="display: none">