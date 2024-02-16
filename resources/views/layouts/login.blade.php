    <!-- login popup-->
    <div class="modal fade" id="siguploginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog siguplogin-dailog modal-dialog-centered ">
          <div class="modal-content" id="signinbody">
            <div class="modal-header">
                <h5>Sign In</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <div class="row m-0">
                    <div class="col-12 p-0">
                        <div class="login-register-form-box">
                            <div>

                                <form  method="POST" class="login-form" id="signupform">
                                    @csrf
                                <div class="row mb-3">
                                    <div class="input-group ">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email1" name="email1" placeholder="Email" aria-label="email" aria-describedby="basic-addon1"> 
                                    </div>
                                    <div id="email-login"></div>
                                </div>

                                <div class="row mb-3">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key"></i></span>
                                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                    <div id="password-login"></div>
                                </div>

                                    

                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1"> Remember me</label>
                                    </div>
                                    <lable class="text-danger">{{Session::get('alert-danger')}}</lable>

                                    <div id="errormsg-login"></div>
                                    <button type="button" class="login-form-signin" id="save_login_data">SIGN IN</button>
                                </form>
                            </div>

                        </div>
                    </div>
              </div>
            </div>

          </div>

          <div class="modal-content" id="sendemailbody">
          <div class="modal-header">
                <h5>verified your email</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
              <div class="row m-0">
                    <div class="col-12 p-0">
                        <div class="login-register-form-box">
                            <div>

                                <form  method="POST" class="login-form" id="verifyform">
                                    @csrf
                                <div class="row mb-3">
                                    <div class="input-group ">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
                                        <input type="email" class="form-control" id="verifyemail" name="email1" placeholder="Email" readonly> 
                                    </div>
                                </div>

                                    <div id="errormsg-login"></div>
                                    <button type="button" class="login-form-signin" id="sendverifymail">SIGN IN</button>
                                </form>
                            </div>

                        </div>
                    </div>
              </div>
            </div>

          </div>
        </div>
    </div>
<!-- Login popup end -->
