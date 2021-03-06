  <body class="be-splash-screen">
    <div class="be-wrapper be-login">
      <div class="be-content">
        <div class="main-content container-fluid">
          <div class="splash-container">
            <div class="card card-border-color card-border-color-primary">
              <div class="card-header">
                <img src="<?=base_url('themes/others/'); ?>defaultlogo.png" alt="logo" width="202" class="logo-img">
                <span class="splash-description">Please enter your user information.</span></div>
              <div class="card-body">
                <form action="<?=base_url('login/auth'); ?>" id="loginform">
                  <div class="form-group">
                    <input id="username" type="text" placeholder="Username" autocomplete="off" class="form-control">
                  </div>
                  <div class="form-group">
                    <input id="password" type="password" placeholder="Password" class="form-control">
                  </div>
                  <div class="form-group row login-tools">
                    <div class="col-12 login-remember">
                      <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Remember Me</span>
                      </label>
                    </div>
                    <!-- <div class="col-6 login-forgot-password"><a href="<?=base_url('recovery'); ?>">Forgot Password?</a></div> -->
                  </div>
                  <div class="form-group login-submit">
                    <button data-dismiss="modal" type="submit" class="btn btn-primary btn-xl">Sign me in</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="splash-footer"><span>Don't have an account? <a href="<?=base_url('signup'); ?>">Sign Up</a></span></div>
          </div>
        </div>
      </div>
    </div>
<!--     <script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="assets/js/app.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      	//initialize the javascript
      	App.init();
      });
      
    </script>
  </body>
</html> -->