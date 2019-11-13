
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3" style="justify-content: center;">
                <div style="margin: 50px 0;">
                    <h1>Password Reset</h1>
                    <p>Enter your new password.</p>
                </div>
                <form id="verfiy_password_form" action="<?= URL.'user/submitVerifyPassword' ?>" method="post" data-redirect="<?= URL ?>">
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" name="newPassword" class="form-control">
                        <input type="hidden" name="email" value="<?= $_GET['email'] ?>" class="form-control">
                        <input type="hidden" name="id" value="<?= $_GET['orion'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Confirm New Password</label>
                        <input type="password" name="confirmPassword" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Change My Password</button>
                </form>
            </div>
        </div>
    </div>
</section>
