<div class="container">
    <div class="row">
        <main class="col-lg-8 col-md-8 form-signin ">
            <form action="/users/Auth" method="post">
                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
                <?php if (isset($validation)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $validation->listErrors() ?>
                    </div>
                <?php endif; ?>
                <?php if (isset($validation)): ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->get('success') ?>
                    </div>
                <?php endif; ?>

                <div class="form-floating">
                    <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com"
                    value="<?= set_value('email') ?>">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                    <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>

                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            </form>
        </main>
    </div>
</div>