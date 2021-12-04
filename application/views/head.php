<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="APLIKASI SURAT - <?= constant("namaAPP") ?>">
    <meta name="author" content="<?= constant("dev") ?>">
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>img/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?= base_url() ?>img/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?= base_url() ?>img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <title><?= constant("namaAPP") ?></title>
    <!-- This page css -->
    <!-- Custom CSS -->
    <link href="<?= base_url() ?>src/dist/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>highlights/highlight.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/datepicker.css">
    <script src="<?= base_url() ?>src/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url() ?>js/jquery-typehead.min.js"></script>
    <style>
        .plugin-details {
            display: none;
        }

        .plugin-details-active {
            display: block;
        }

        .datepicker {
            z-index: 1151;
        }

        .bcForm {
            background-color: antiquewhite;
            border-radius: 5px;
        }
    </style>

</head>