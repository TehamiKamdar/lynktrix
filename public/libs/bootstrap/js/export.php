<!DOCTYPE html>
<html lang="en">
<head>
    <title>Export Transactions</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <style>
        .font-extrabold { font-weight: bolder; }
    </style>
</head>
<body>

<div class="container-fluid p-3 bg-primary text-white text-center">
    <h1>Export Transactions</h1>
    <p>Select the network and choose the start and end date to export transactions in CSV format.</p>
</div>

<form action="process.php" class="was-validated" method="POST" id="exportTransactionForm">
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <label for="network" class="font-extrabold form-label">Select Network</label>
                <select class="form-select" id="network" name="network" required>
                    <option disabled value="" selected>Please Select</option>
                    <option>Awin</option>
                    <option>Impact Radius</option>
                </select>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please select the network for this field.</div>
            </div>
            <div class="col-lg-3"></div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <label for="startdate" class="font-extrabold form-label">Choose Start Date</label>
                <input id="startdate" class="form-control" required name="startdate" />
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please select the start date for this field.</div>
            </div>
            <div class="col-lg-3"></div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <label for="enddate" class="font-extrabold form-label">Choose End Date</label>
                <input id="enddate" class="form-control" required name="enddate" />
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please select the end date for this field.</div>
            </div>
            <div class="col-lg-3"></div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <button type="submit" class="btn btn-primary">Export</button>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
</form>

<script>
    $('#startdate').datepicker({
        uiLibrary: 'bootstrap5'
    });
    $('#enddate').datepicker({
        uiLibrary: 'bootstrap5'
    });

    $("#exportTransactionForm").on("submit", function (e) {
        setTimeout(function () {
            $("#exportTransactionForm")[0].reset(); // Reset the form
        }, 1000); // Delay to allow download to start
    });
</script>

</body>
</html>
