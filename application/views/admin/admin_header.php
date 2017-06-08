<head>
    <title>Newsletters</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?= link_tag('assets/jquery/bootbox.min.js') ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <?= link_tag('assets/css/bootstrap.min.css') ?>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">

    <!-- Include Editor style. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1/css/froala_style.min.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>
    <script src="<?= base_url('assets/jquery/jquery.min.js') ?>"></script>

    <!-- Include Editor JS files. -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1//js/froala_editor.pkgd.min.js"></script>

    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>

    <style>
        /*.navbar-default {
            background: url("< ?= base_url('assets/images/nav.jpg') ?>");

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
                  <a href="<?= base_url('dashboard') ?>">Home</a>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
               <li>
                    <?= anchor('login/logout','Logout') ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
