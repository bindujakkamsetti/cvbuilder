<main class="form-signin text-center">
  <form method="post" action="<?=$action->helper->url('action/signup')?>">
    <img class="mb-4" src="<?=$action->helper->loadimage('logo.png')?>" alt="" width="72">
    <h1 class="h3 mb-3 fw-normal">Create New Account</h1>
    <div class="form-floating">
      <input type="name" class="form-control" id="floatingInput" name="full_name">
      <label for="floatingInput">Full Name</label>
    </div>

    <div class="form-floating">
      <input type="email" class="form-control" name="email" id="floatingInput">
      <label for="floatingInput">Email Address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="password" id="floatingPassword">
      <label for="floatingPassword">Password</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">SignUp</button>
    <a href="<?=$action->helper->url('login')?>" class="d-block mt-2">Already have an account</a>
  </form>
</main>
