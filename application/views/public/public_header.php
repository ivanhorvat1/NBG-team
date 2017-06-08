<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?= link_tag('assets/jquery/bootbox.min.js') ?>
    <?= link_tag('assets/css/bootstrap.min.css') ?>
    <script src="<?= base_url('assets/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <style>
        /*.navbar-default {
            background: url("<?= base_url('assets/images/nav.jpg') ?>");

            border-color: #E7E7E7;
        }*/
        .collapse .navbar-nav > li > a {
            color: black;
        }
        .collapse .navbar-nav > li > a:hover,
        .collapse .navbar-nav > li > a:focus {
            color: red;
        }
        .collapse .navbar-nav > .active > a,
        .collapse .navbar-nav > .active > a:hover,
        .collapse .navbar-nav > .active > a:focus {
            color: #555;
            background-color: #E7E7E7;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <?= anchor('','Home') ?>
                </li>
                <li>
                    <?= anchor('Login/register_view','Register') ?>
                </li>
            </ul>
        </div>
    </div>
</nav>