<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign up - ipDigital</title>

    <!-- TABLER (https://github.com/tabler/tabler) -->
    <link rel="stylesheet" href="https://unpkg.com/@tabler/core@1.0.0-beta9/dist/css/tabler.min.css" />
</head>

<body class=" border-top-wide border-primary d-flex flex-column">
    <div class="page page-center">
        <div class="container-tight py-4">
            <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark"><img src="../static/logo.svg" height="36"
                        alt=""></a>
            </div>
            <form class="card card-md" action="./backend/sign-up.php" method="post">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Create new account</h2>
                    <div class="mb-3">
                        <label class="form-label">Firstname</label>
                        <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Enter firstname" maxlength="32" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Lastname</label>
                        <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Enter lastname" maxlength="32" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fiscal Code</label>
                        <input type="text" id="fiscalcode" name="fiscalcode" class="form-control" placeholder="Enter fiscal code" minlength="16" maxlength="16" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter email" maxlength="254" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <div class="input-group input-group-flat">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password" autocomplete="off" required >
                            <span class="input-group-text">
                                <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <circle cx="12" cy="12" r="2" />
                                        <path
                                            d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                    </svg>
                                </a>
                            </span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-check">
                            <input type="checkbox" id="legal" name="legal" class="form-check-input" required />
                            <span class="form-check-label">Agree the <a href="../legal/terms-of-service.html"
                                    tabindex="-1">terms and policy</a>.</span>
                        </label>
                    </div>

                    <?php
                        if (isset($_GET['error'])) {
                            $error = $_GET['error'];
                            $errorMsg = "";
                            
                            if (!empty($error)) {
                                switch ($error) {
                                    case 'userAlreadyExist':
                                        $errorMsg = "Sorry but this user already exixts. Please, try to use a different email address.";
                                        break;
                                    case 'genericError':
                                        $errorMsg = "Sorry but you have occurred in a Generic Error.";
                                        break;
                                    case 'genericInternalError':
                                        $errorMsg = "Sorry but you have occurred in a Generic Internal Error. The problem is not caused by you.";
                                        break;
                                    case 'wrongDataInputFormat':
                                        $errorMsg = "Please make sure you have completed all fields correctly.";
                                        break;
                                }

                                echo '<div class="text-danger">' . $errorMsg . '</div>';
                            }
                        }
                    ?>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">Create new account</button>
                    </div>
                </div>
            </form>
            <div class="text-center text-muted mt-3">
                Already have account? <a href="./sign-in.php" tabindex="-1">Sign in</a>
            </div>
        </div>
    </div>

    <!-- PLUGINS -->
    <script src="https://unpkg.com/@tabler/core@1.0.0-beta9/dist/js/tabler.min.js"></script>
</body>

</html>