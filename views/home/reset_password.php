
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3" style="justify-content: center;">
                <div style="margin: 50px 0;">
                    <h1>Forgot Your Password?</h1>
                    <p> Enter your email address and we will send you a link to reset it.</p>
                </div>
                <form id="forgot_form" action="<?= URL.'user/submitForgotPassword' ?>" method="post">
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email">
                    </div>
                    <button type="submit" class="btn btn-primary">Reset Password</button>
                </form>
            </div>
        </div>
    </div>
</section>
