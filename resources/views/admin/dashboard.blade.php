<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f8ff;
            font-family: 'Segoe UI', sans-serif;
        }
        .card-box {
            background: #fff;
            border-radius: 14px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,.05);
        }
        .icon {
            font-size: 30px;
            color: #4e73df;
        }
    </style>
</head>

<body>

<!-- TOP BAR -->
<nav class="navbar bg-white shadow-sm px-4">
    <span class="navbar-brand fw-bold">🚖 Admin Panel</span>
    <span>{{ auth()->user()->name }}</span>
</nav>

<div class="container-fluid mt-4 px-4">

    <!-- STATS -->
    <div class="row g-4">
        <div class="col-md-3">
            <div class="card-box text-center">
                <div class="icon">👨‍✈️</div>
                <h3>3138</h3>
                <p>Total Drivers</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-box text-center">
                <div class="icon">⏳</div>
                <h3>401</h3>
                <p>Waiting Approval</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-box text-center">
                <div class="icon">👤</div>
                <h3>931</h3>
                <p>Total Rider</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-box text-center">
                <div class="icon">🚕</div>
                <h3>461</h3>
                <p>Total Ride</p>
            </div>
        </div>
    </div>

    <!-- SECOND ROW -->
    <div class="row g-4 mt-2">
        <div class="col-md-4">
            <div class="card-box text-center">
                <h6>Today Earning</h6>
                <h3>₹0.00</h3>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card-box text-center">
                <h6>Monthly Earning</h6>
                <h3>₹1.20</h3>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card-box text-center">
                <h6>Total Earning</h6>
                <h3>₹2660.02</h3>
            </div>
        </div>
    </div>

    <!-- TABLE + CHART -->
    <div class="row g-4 mt-3">
        <div class="col-md-7">
            <div class="card-box">
                <h5>Recent Request</h5>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Rider</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2132</td>
                            <td>Raj pail</td>
                            <td>29 Jan 2026</td>
                            <td><span class="badge bg-danger">Cancelled</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card-box">
                <h5>Income</h5>
                <div style="height:200px;background:#eef3ff;border-radius:10px"></div>
            </div>
        </div>
    </div>

</div>

</body>
</html>
