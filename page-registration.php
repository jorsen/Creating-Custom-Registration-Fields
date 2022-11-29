<?php 

/*

* Template Name: New Account Registration

*/



get_header();



$policyDisclaimer = get_field('registration_process_disclaimer');



?>



<section class="section-space new-acc-reg">

    <div class="container">

        <div class="row">

            <div class="col-12">

                <h1 class="main--heading">New Account Registration</h1>

            </div>

        </div>



        <?php if( !is_user_logged_in() ): ?>



        <div class="row animate__animated my-5 <?php echo (isset($_COOKIE['register_error'])) ? 'd-none' : ''; ?>" id="policyDisclaimer">

            <div class="col-12">

                <p><?php echo $policyDisclaimer; ?></p>

                <div class="sales-and-tax">

                    <a href=""></a>

                </div>

                <div class="agreement-buttons mt-5">

                    <a href="javascript:void(0)" id="closethis" class="green--btn">I Accept</a>
                    <a href="/wholesale-registration-login" class="green--btn">I Don't Accept</a>

                </div>

            </div>

        </div>

        <div class="row my-5 animate__animated <?php echo (!isset($_COOKIE['register_error'])) ? 'd-none' : ''; ?>" id="reg--form">

            <div class="col-lg-12">

                <div class="text-center">

                    <h2>Register</h2>

                </div>
                <!--<form method="POST" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>">-->
                <form method="POST" enctype="multipart/form-data" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>">

                    <?php if (isset($_COOKIE['register_error'])) { ?>

                    <div class="alert alert-danger" role="alert">

                        <?php echo $_COOKIE['register_error']; ?>

                    </div>

                    <?php } ?>

                    <input type="hidden" name="action" value="register_account">

                    <div class="row">

                        <div class="col-lg-6">

                            <div class="form-group">

                                <label>First Name <span title="required">*</span></label>

                                <input type="text" class="form-control" name="firstname" value="<?php echo isset($_COOKIE['register_firstname']) ? $_COOKIE['register_firstname'] : ''; ?>" required>

                            </div>

                        </div>

                        <div class="col-lg-6">

                            <div class="form-group">

                                <label>Last Name <span title="required">*</span></label>

                                <input type="text" class="form-control" name="lastname" value="<?php echo isset($_COOKIE['register_lastname']) ? $_COOKIE['register_lastname'] : ''; ?>" required>

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-lg-6">

                            <div class="form-group">

                                <label>Phone <span title="required">*</span></label>

                                <input type="text" class="form-control" name="phone" value="<?php echo isset($_COOKIE['register_phone']) ? $_COOKIE['register_phone'] : ''; ?>" required>

                            </div>

                        </div>

                        <div class="col-lg-6">

                            <div class="form-group">

                                <label>Company <span title="required">*</span></label>

                                <input type="text" class="form-control" name="company" value="<?php echo isset($_COOKIE['register_company']) ? $_COOKIE['register_company'] : ''; ?>" required>

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-lg-12">

                            <div class="form-group">

                                <label>Address <span title="required">*</span></label>

                                <input type="text" class="form-control" name="address" value="<?php echo isset($_COOKIE['register_address']) ? $_COOKIE['register_address'] : ''; ?>" required>

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-lg-6">

                            <div class="form-group">

                                <label>City <span title="required">*</span></label>

                                <input type="text" class="form-control" name="city" value="<?php echo isset($_COOKIE['register_city']) ? $_COOKIE['register_city'] : ''; ?>" required>

                            </div>

                        </div>

                        <div class="col-lg-6">

                            <div class="form-group">

                                <label>State <span title="required">*</span></label>

                                <input type="text" class="form-control" name="state" value="<?php echo isset($_COOKIE['register_state']) ? $_COOKIE['register_state'] : ''; ?>" required>

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-lg-12">

                            <div class="form-group">

                                <label>Zip Code <span title="required">*</span></label>

                                <input type="text" class="form-control" name="zipcode" value="<?php echo isset($_COOKIE['register_zipcode']) ? $_COOKIE['register_zipcode'] : ''; ?>" required>

                            </div>

                        </div>

                        <div class="col-lg-6">

                            <div class="form-group">

                                <label>Email Address <span title="required">*</span></label>

                                <input type="email" class="form-control" name="email" value="<?php echo isset($_COOKIE['register_email']) ? $_COOKIE['register_email'] : ''; ?>" required>
                                
                            </div>

                        </div>
                        
                        <div class="col-lg-6">

                            <div class="form-group">

                                
                                <label>Username <span title="required">*</span></label>
                                
                                <input type="text" class="form-control" name="username" value="<?php echo isset($_COOKIE['login_username']) ? $_COOKIE['login_username'] : ''; ?>" required>
                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-lg-12" id="password-field"></div>

                        <div class="col-lg-6">

                            <div class="form-group">

                                <label>Password <span title="required">*</span></label>

                                <input type="password" class="form-control password" id="pw" name="password" required>

                            </div>

                        </div>

                        <div class="col-lg-6">

                            <div class="form-group">

                                <label>Confirm Password <span title="required">*</span></label>

                                <input type="password" class="form-control password" id="confirm_pw" name="confirm_password" required>

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-lg-6">

                            <div class="form-group">

                                <label>Tax ID <span title="required">*</span></label>

                                <input type="text" class="form-control" name="tax_id" value="<?php echo isset($_COOKIE['register_tax_id']) ? $_COOKIE['register_tax_id'] : ''; ?>" required>

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-lg-6">

                            <div class="form-group">

                                <label>Upload presale permit certificate:<span title="required">*</span></label>
                                
                                <input type="file" class="form-control" name="fileToUpload" id="fileToUpload" required>
                            </div>
  
                        </div>

                    </div>       
                    <p>*Note: You must have an order with a minimum of $200.00 to checkout.</p>

                    <button type="submit" class="btn green--btn" id="registerbtn" name="register">Register</button>

                </form>

            </div>
                       <label>If you did not previously download the resale permit certificate, <a href="https://lachic.us/wp-content/uploads/2020/06/Texas-Sales-and-Use-Resale-Certificate.pdf" class="download-link" download>please click HERE to download.</a></label>
                    </div>

        </div>



        <?php else: ?>



        <div class="row my-5">

            <div class="col-12">

                <h3>You are currently logged in. Please sign out to continue to register a new account.</h3>

            </div>

        </div>



        <?php endif; ?>



    </div>

</section>



<?php 



get_footer();



?>
