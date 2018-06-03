<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/backend/sessionHandler.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/backend/db.php');

$itemsArray = getAllTheItems();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ShortM - Records</title>
    <link rel="stylesheet" id="loaderCSS" href="/css/loader.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/resources/DataTables/datatables.min.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css">


    <style>
        .buttons-columnVisibility:not(.active) {
            text-decoration: line-through;
        }
    </style>
	<?php getLoader(); ?>
</head>


<body>
<br>
<div class="container-fluid">
    <nav class="navbar navbar-expand-sm navbar-dark" style="background: #5a6268">
        <a class="navbar-brand" href="/">ShortM - URL Shortening Service</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a href="/records" class="nav-link">Records</a>
                </li>
                <li class="nav-item">
                    <a href="/about" class="nav-link">About</a>
                </li>

            </ul>

        </div>
    </nav>
</div>
<hr class="customHR">
<br>


<div class="container col-md-12">


    <div class="table-responsive">

        <table id="items" class="table table-striped table-hover">

            <thead>
            <tr style="background-color: #428bca;color: white;">
                <th>Slang</th>
                <th>URL</th>
                <th>Creation Date</th>
                <th>Last Access Date</th>
                <th>Redirection Number</th>
            </tr>

            </thead>


            <tbody>
			<?php
			foreach ($itemsArray as $item): ?>

                <tr>
                    <td><a href="/<?= $item['Slang'] ?>"><?= $item['Slang'] ?></a></td>
                    <td><a href="<?= $item['URL'] ?>"><?= $item['URL'] ?></a></td>
                    <td><?= $item['CreationDate'] ?></td>
                    <td><?

						$lastAccessDate = $item['LastAccessDate'];
						if (strpos($lastAccessDate, '0000') !== false) {
							$lastAccessDate = 'Never';
						}

						echo $lastAccessDate; ?></td>
                    <td><?= $item['RedirectionNumber'] ?></td>

                </tr>
			<? endforeach;

			?>
            </tbody>

        </table>
    </div>

</div>


<script src="/js/jquery-3.3.1.min.js"></script>
<script>
    if (!window.jQuery) {
        var JQSScript = document.createElement('script');
        JQSScript.type = "text/javascript";
        JQSScript.src = "https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js";
        document.getElementsByTagName('head')[0].appendChild(JQSScript);
    }
</script>
<script src="/js/bootstrap.min.js"></script>

<script src="/resources/DataTables/DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
<script src="/resources/DataTables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="/resources/DataTables/Buttons-1.5.1/js/dataTables.buttons.min.js"></script>
<script src="/resources/DataTables/Buttons-1.5.1/js/buttons.bootstrap4.min.js"></script>
<script src="/resources/DataTables/Buttons-1.5.1/js/buttons.html5.min.js"></script>
<script src="/resources/DataTables/Buttons-1.5.1/js/buttons.print.min.js"></script>
<script src="/resources/DataTables/Buttons-1.5.1/js/buttons.colVis.min.js"></script>
<script src="/resources/DataTables/JSZip-2.5.0/jszip.min.js"></script>

<script src="/resources/DataTables/pdfmake-0.1.32/pdfmake.min.js"></script>
<script src="/resources/DataTables/pdfmake-0.1.32/vfs_fonts.js"></script>


<script>
    $(document).ready(function () {

        let table = $('#items').DataTable({

            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            columns: [

                {data: 'Slang'},
                {data: 'URL'},
                {data: 'CreationDate'},
                {data: 'LastUsageDate'},
                {data: 'UsageNumbers'}
            ],
            "order": [[2, "desc"]],
            dom: '<B<"rowSpecial"<"col-xs-6"l><"col-xs-6"f>>rtip>',
            buttons: ['columnsToggle'],

            stateSave: false
        });

        new $.fn.dataTable.Buttons(table, {
            buttons: [
                'copy', 'excel', 'pdf', 'csv', 'print'
            ]
        });

        table.buttons(1, null).container().appendTo(
            table.table().container()
        );

        let rowSpecial = jQuery(".rowSpecial");
        rowSpecial.css("margin-top", "15px");
    })

</script>

</body>
</html>
