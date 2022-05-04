<?php
    session_start();

    if (!isset($_SESSION['email'])) {
        header("Location: ../auth/sign-in.html");
    }

    require_once '../utils/api.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Non compliance - ipDigital</title>

    <!-- TABLER (https://github.com/tabler/tabler) -->
    <script src="https://unpkg.com/@tabler/core@1.0.0-beta9/dist/js/tabler.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/@tabler/core@1.0.0-beta9/dist/css/tabler.min.css" />

    <!-- PLUGINS -->
    <link rel="stylesheet" href="https://unpkg.com/@tabler/core@1.0.0-beta9/dist/css/tabler-flags.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/@tabler/core@1.0.0-beta9/dist/css/tabler-payments.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/@tabler/core@1.0.0-beta9/dist/css/tabler-vendors.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>

<body>
    <div class="page">
        <header class="navbar navbar-expand-md navbar-dark navbar-overlap d-print-none">
            <div class="container-xl">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href=".">
                        <img src="../static/logo-white.svg" width="110" height="32" alt="Tabler"
                            class="navbar-brand-image">
                    </a>
                </h1>
                <div class="navbar-nav flex-row order-md-last">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                            aria-label="Open user menu">
                            <span class="avatar avatar-sm"
                                style="background-image: url(../static/avatars/000m.jpg)"></span>
                            <div class="d-none d-xl-block ps-2">
                                <?php
                                    $user_data = getUserData($_SESSION['email']);
                                    $settings_data = getSettingsData($_SESSION['email']);
                                    
                                    echo '
                                        <div>' . $user_data["result"]["firstName"] . ' ' . $user_data["result"]["lastName"] . '</div>
                                        <div class="mt-1 small text-muted">' . $settings_data["result"]["role"] . '</div>
                                    ';
                                ?>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <a href="./account.php" class="dropdown-item">Profile & account</a>
                            <a href="../auth/backend/logout.php" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="./index.php">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Home
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="./non-compliance.php">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/archive -->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-archive" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <rect x="3" y="4" width="18" height="4" rx="2"></rect>
                                            <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10"></path>
                                            <line x1="10" y1="12" x2="14" y2="12"></line>
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Non compliance
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./form-elements.html">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/ticket -->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-ticket" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <line x1="15" y1="5" x2="15" y2="7"></line>
                                            <line x1="15" y1="11" x2="15" y2="13"></line>
                                            <line x1="15" y1="17" x2="15" y2="19"></line>
                                            <path
                                                d="M5 5h14a2 2 0 0 1 2 2v3a2 2 0 0 0 0 4v3a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-3a2 2 0 0 0 0 -4v-3a2 2 0 0 1 2 -2">
                                            </path>
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Ticket
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <div class="page-wrapper">
            <div class="container-xl">
                <!-- Page title -->
                <div class="page-header d-print-none text-white">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <!-- Page pre-title -->
                            <div class="page-pretitle">
                                Overview
                            </div>
                            <h2 class="page-title">
                                Non compliance
                            </h2>
                        </div>
                        <!-- Page title actions -->
                        <div class="col-12 col-md-auto ms-auto d-print-none">
                            <div class="btn-list">
                                <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                                    data-bs-target="#modal-new-non-compliance">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <line x1="12" y1="5" x2="12" y2="19" />
                                        <line x1="5" y1="12" x2="19" y2="12" />
                                    </svg>
                                    Add new
                                </a>
                                <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                                    data-bs-target="#modal-new-non-compliance" aria-label="Create new report">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <line x1="12" y1="5" x2="12" y2="19" />
                                        <line x1="5" y1="12" x2="19" y2="12" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-body">
                <div class="container-xl">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Manager</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th class="w-1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $nonCompliances = getNonCompliances(10, 1);
                                        $nonCompliancesType = getNonComplianceTypes();

                                        foreach($nonCompliances["result"] as $ncList) {
                                            $nc = getNonComplianceDetails($ncList["nonComplianceCode"]);
                                            
                                            $ncID = "";
                                            switch ($nc["result"]["origin"]) {
                                                case "internal":
                                                    $ncID = "I-" . $ncList["nonComplianceCode"];
                                                    break;
                                                case "customer":
                                                    $ncID = "C-" . $ncList["nonComplianceCode"];
                                                    break;
                                                case "supplier":
                                                    $ncID = "S-" . $ncList["nonComplianceCode"];
                                                    break;
                                                default:
                                                    $ncID = $ncList["nonComplianceCode"];
                                            }

                                            $ncTypeDetails = getNonComplianceTypeDetails($nc);
                                            $manager = getNonComplianceManager($nc);
                                            $ncStatus = getNonComplianceStatus($nc);

                                            echo '
                                                <tr>
                                                    <td class="text-muted">' . $ncID . '</td>
                                                    <td>' . $ncTypeDetails["name"] . '</td>
                                                    <td class="text-muted">
                                                        <a href="#" class="text-reset">' . $manager . '</a>
                                                    </td>
                                                    <td class="text-muted">' . $nc["result"]["nonComplianceDate"] . '</td>
                                                    <td class="text-muted">' . $ncStatus . '</td>
                                                    <td>
                                                        <a href="./non-compliance-details.php?id=' . $ncList["nonComplianceCode"] . '">Details</a>
                                                    </td>
                                                </tr>
                                            ';
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                    <div class="row text-center align-items-center flex-row-reverse">
                        <div class="col-lg-auto ms-lg-auto">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    <a href="./docs/index.html" class="link-secondary">Documentation</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="./license.html" class="link-secondary">License</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://github.com/tabler/tabler" target="_blank" class="link-secondary"
                                        rel="noopener">Source code</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    Copyright &copy; 2022
                                    <a href="." class="link-secondary">ipDigital</a>. All rights
                                    reserved.
                                </li>
                                <li class="list-inline-item">
                                    <a href="./changelog.html" class="link-secondary" rel="noopener">
                                        v1.0.0
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>


    <!-- Add new non compliance modal -->
    <div class="modal modal-blur fade" id="modal-new-non-compliance" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="./backend/add-non-compliance.php" method="get">
                    <div class="modal-header">
                        <h5 class="modal-title">New non compliance</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="form-label">Type</div>
                            <select class="form-select" id="type" name="type">
                                <?php
                                    $nonCompliancesType = getNonComplianceTypes();

                                    foreach($nonCompliancesType["result"] as $ncTypeCode) {
                                        echo '<option value=' . $ncTypeCode["code"] . '>' . $ncTypeCode["name"] . '</option>';
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Lot</label>
                            <select type="text" class="form-select" placeholder="Select a lot" id="lot" name="lot" value="">
                                <?php
                                    $lotList = getLots();

                                    foreach($lotList["result"] as $lot) {
                                        echo '<option value=' . $lot["shippingCode"] . '>' . $lot["shippingCode"] . '</option>';
                                    }
                                ?>
                            </select>
                        </div>

                        <label class="form-label">Origin</label>
                        <div class="form-selectgroup-boxes row mb-3">
                            <div class="col-lg-4">
                                <label class="form-selectgroup-item">
                                    <input type="radio" id="nc-origin" name="nc-origin" value="internal" class="form-selectgroup-input"
                                        checked />
                                    <span class="form-selectgroup-label d-flex align-items-center p-3">
                                        <span class="me-3">
                                            <span class="form-selectgroup-check"></span>
                                        </span>
                                        <span class="form-selectgroup-label-content">
                                            <span class="form-selectgroup-title strong mb-1">Internal</span>
                                            <span class="d-block text-muted">Insert charts and additional advanced
                                                analyses to
                                                be inserted in the report</span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-selectgroup-item">
                                    <input type="radio" id="nc-origin" name="nc-origin" value="customer" class="form-selectgroup-input" />
                                    <span class="form-selectgroup-label d-flex align-items-center p-3">
                                        <span class="me-3">
                                            <span class="form-selectgroup-check"></span>
                                        </span>
                                        <span class="form-selectgroup-label-content">
                                            <span class="form-selectgroup-title strong mb-1">Customer</span>
                                            <span class="d-block text-muted">Insert charts and additional advanced
                                                analyses to
                                                be inserted in the report</span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-selectgroup-item">
                                    <input type="radio" id="nc-origin" name="nc-origin" value="supplier" class="form-selectgroup-input" />
                                    <span class="form-selectgroup-label d-flex align-items-center p-3">
                                        <span class="me-3">
                                            <span class="form-selectgroup-check"></span>
                                        </span>
                                        <span class="form-selectgroup-label-content">
                                            <span class="form-selectgroup-title strong mb-1">Supplier</span>
                                            <span class="d-block text-muted">Insert charts and additional advanced
                                                analyses to
                                                be inserted in the report</span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label class="form-label">Additional information</label>
                                <textarea class="form-control" id="details" name="details" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>