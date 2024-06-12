<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

    <head>
        
        <title>Login - HRMS admin template</title>
        <?php include 'layouts/title-meta.php'; ?>

        <?php include 'layouts/head-css.php'; ?>

    </head>

    <?php include 'layouts/body.php'; ?>

        <!-- Main Wrapper -->
        <div class="main-wrapper">
            <div class="account-content">
                <div class="container">
                
                    <!-- Account Logo -->
                    <div class="account-logo">
                        <a href="#"><img src="assets/img/logo2.png" alt="Dreamguy's Technologies"></a>
                    </div>
                    <!-- /Account Logo -->
                    
                    <div class="account-box">
                        <div class="account-wrapper">
                            <h3 class="account-title">Login</h3>
                            <p class="account-subtitle">Access to our dashboard</p>
                            
                            <!-- Account Form -->
                            <form action="admin-dashboard.php">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="form-control" type="text" value="admin@dreamguys.in">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label>Password</label>
                                        </div>
                                        <div class="col-auto">
                                            <a class="text-muted" href="forgot-password.php">
                                                Forgot password?
                                            </a>
                                        </div>
                                    </div>
                                    <div class="position-relative">
                                        <input class="form-control" type="password" value="123456" id="password">
                                        <span class="fa fa-eye-slash" id="toggle-password"></span>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <button class="btn btn-primary account-btn" type="submit">Login</button>
                                </div>
                                <div class="account-footer">
                                    <p>Don't have an account yet? <a href="register.php">Register</a></p>
                                </div>
                            </form>
                            <!-- /Account Form -->
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Main Wrapper -->

        <?php include 'layouts/vendor-scripts.php'; ?>

    </body>

</html>