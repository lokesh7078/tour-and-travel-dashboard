<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- DataTables --}}
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <style>
        /* 🇮🇳 Indian Flag Background */
        body {
            min-height: 100vh;
            background: linear-gradient(
                to bottom,
                #ff9933 0%,
                #ff9933 33%,
                #ffffff 33%,
                #ffffff 66%,
                #138808 66%,
                #138808 100%
            );
            background-attachment: fixed;
        }

        .content-wrapper {
            background: rgba(255,255,255,0.96);
            border-radius: 16px;
            padding: 25px;
            margin: 25px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.12);
        }

        .table thead th {
            background: #f1f5f9;
            font-weight: 600;
        }

        .badge-status {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
        }

        .badge-pending {
            background: #ffe8a3;
            color: #8a6d00;
        }

        .badge-cancelled {
            background: #ffd6d6;
            color: #b30000;
        }

        .topbar {
            background: #111827;
            padding: 12px 20px;
            color: white;
            font-weight: 600;
        }
    </style>
</head>
<body>

<div class="topbar">
    🚖 Admin Panel
</div>

<div class="content-wrapper">
    @yield('content')
</div>

{{-- Scripts --}}
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

</body>
</html>
