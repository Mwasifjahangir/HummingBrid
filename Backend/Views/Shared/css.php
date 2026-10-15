<!-- start: GOOGLE FONTS -->

<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
<!-- end: GOOGLE FONTS -->
<!-- start: MAIN CSS -->
<link rel="stylesheet" href="Frontend/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="Frontend/vendor/fontawesome/css/font-awesome.min.css">
<link rel="stylesheet" href="Frontend/vendor/themify-icons/themify-icons.min.css">
<link href="Frontend/vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
<link href="Frontend/vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
<link href="Frontend/vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
<!-- end: MAIN CSS -->
<!-- start: CLIP-TWO CSS -->
<link rel="stylesheet" href="Frontend/Assets/css/styles.css">
<link rel="stylesheet" href="Frontend/Assets/css/plugins.css">
<link href="Frontend/vendor/select2/select2.min.css" rel="stylesheet" media="screen">
<link href="Frontend/vendor/DataTables/css/DT_bootstrap.css" rel="stylesheet" media="screen">
<link href="Frontend/vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
<link href="Frontend/vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
<link href="Frontend/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
<link href="Frontend/vendor/select2/select2.min.css" rel="stylesheet" media="screen">
<link href="Frontend/Assets/css/bootstrap-select.css" rel="stylesheet" media="screen">
<link href="Frontend/Assets/css/dropzone.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="Frontend/Assets/css/themes/theme-5.css" id="skin_color" />

<!-- end: CLIP-TWO CSS -->
<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
<style type="text/css">
    .rowbuffer{
        margin-bottom: 20px;
    }
    input[type=number]::-webkit-outer-spin-button,
    input[type=number]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance:textfield;
    }
    .PYRItems tr th {
        width: 14.1%;
    }
    input[readonly] {
        background-color: white;
    }
    input[disabled] {
        background-color: white;
    }
    nav.links {
        text-align: left;
    }

    #actions {
        margin: 2em 0;
    }


    /* Mimic table appearance */
    div.table {
        display: table;
    }
    div.table .file-row {
        display: table-row;
    }
    div.table .file-row > div {
        display: table-cell;
        vertical-align: top;
        border-top: 1px solid #ddd;
        padding: 8px;
    }
    div.table .file-row:nth-child(odd) {
        background: #f9f9f9;
    }



    /* The total progress gets shown by event listeners */
    #total-progress {
        opacity: 0;
        transition: opacity 0.3s linear;
    }

    /* Hide the progress bar when finished */
    #previews .file-row.dz-success .progress {
        opacity: 0;
        transition: opacity 0.3s linear;
    }

    /* Hide the delete button initially */
    #previews .file-row .delete {
        display: none;
    }

    /* Hide the start and cancel buttons and show the delete button */

    #previews .file-row.dz-success .start,
    #previews .file-row.dz-success .cancel {
        display: none;
    }
    #previews .file-row.dz-success .delete {
        display: block;
    }

</style>
