<div class="container">
    <div class="row">
        <main class="col-lg-8 col-md-8 form-signin ">
            <form action="/register" method="post">
                <h1 class="h3 mb-3 fw-normal">Registration</h1>
                <?php if (isset($validation)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $validation->listErrors() ?>
                    </div>
                <?php endif; ?>

                <div class="form-floating">
                    <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com"
                    value="<?= set_value('email') ?>">
                    <label for="floatingInput">Email Address</label>
                </div>

                <div class="form-floating">
                    <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>

                <div class="form-floating">
                    <input name="cpassword" type="password" class="form-control" id="floatingCPassword" placeholder="Confirm Password">
                    <label for="floatingPassword">Confirm Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
            </form>
        </main>
    </div>
</div>