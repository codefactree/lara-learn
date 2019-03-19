<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <title>Lara-Learn</title>
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                    aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
                <a class="navbar-brand" href="{{url('/')}}">Lara-Learn</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a  href="{{ route('logout') }}" onclick="event.preventDefault();            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
                <form class="navbar-form navbar-right">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <style>
        .panel-table .panel-body {
            padding: 0;
        }

        .panel-table .panel-body .table-bordered {
            border-style: none;
            margin: 0;
        }

        .panel-table .panel-body .table-bordered>thead>tr>th:first-of-type {
            text-align: center;
            width: 100px;
        }

        .panel-table .panel-body .table-bordered>thead>tr>th:last-of-type,
        .panel-table .panel-body .table-bordered>tbody>tr>td:last-of-type {
            border-right: 0px;
        }

        .panel-table .panel-body .table-bordered>thead>tr>th:first-of-type,
        .panel-table .panel-body .table-bordered>tbody>tr>td:first-of-type {
            border-left: 0px;
        }

        .panel-table .panel-body .table-bordered>tbody>tr:first-of-type>td {
            border-bottom: 0px;
        }

        .panel-table .panel-body .table-bordered>thead>tr:first-of-type>th {
            border-top: 0px;
        }

        .panel-table .panel-footer .pagination {
            margin: 0;
        }

        .panel-table .panel-footer .col {
            line-height: 34px;
            height: 34px;
        }

        .panel-table .panel-heading .col h3 {
            line-height: 30px;
            height: 30px;
        }

        .panel-table .panel-body .table-bordered>tbody>tr>td {
            line-height: 34px;
        }

        .is-invalid{
            border-color: red
        }

        .invalid-feedback{
            color: red;
        }
    </style>
</body>

</html>