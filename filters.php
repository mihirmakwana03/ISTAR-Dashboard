<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter Data by Work Status</title>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-lg-12-center">
                <div class="card" style="background-color:#32bfff">
                    <div class="card-body mt-1">
                        <div class="text-center">
                            <h2> Filter Data by Work Status </h2>
                            <div class="col-sm-4-center">
                                <!-- <a href="new_entry.php" class="btn btn-primary" role="button">Go To Back</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form method="GET" action="filters.php">
            <div class="form-group mt-2">
                <label for="work_status"><h4>Work Status:</h4></label>
                <select name="work_status" id="work_status" class="form-control">
                    <option value="">All</option>
                    <option value="Done">Done</option>
                    <option value="Pending">Pending</option>
                </select>
            </div><br>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>
        <br>
        <h2>Filtered Data</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Managed By</th>
                    <th>Institute Name</th>
                    <th>CLG Out No</th>
                    <th>CLG In No</th>
                    <th>Product Info</th>
                    <th>Description</th>
                    <th>Appr By</th>
                    <th>Appr Date</th>
                    <th>Appr Amt</th>
                    <th>Agency</th>
                    <th>Work Status</th>
                    <th>Bill Appr Date</th>
                    <th>Bill Amt</th>
                </tr>
            </thead>
            <tbody>
                <?php include 'filters2.php'; ?>
            </tbody>
        </table>
    </div>
    <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <div class="text-center">
                            <!-- <h4>Click here for filter the page by Work Status </h4> -->
                            <div class="col-lg-4-center">
                                <a href="new_entry.php" class="btn btn-primary" role="button">Go To Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
