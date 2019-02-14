
<a href="#" class="login-forgot pull-right text-white"   data-toggle="modal" data-target="#resetPassword">Forgot Password?</a>

<!--Reset Password Modal -->
<div class="modal fade" id="resetPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="justify-content-around text-center px-4">
            <i class="fa fa-lock p-2 circle" style="font-size:32px; color:#fff;"></i> 
            <h3 class="h3 pt-2">Reset Password</h3> 
            <p>Enter your email address in the form below and we will send you further instruction</p> 
            
            <input type="text" placeholder="Email address" class="form-control box-shadow py-4">
        </div>
      </div>
      <div class="modal-foot px-5 pb-4">
        <button type="button" class="btn btn-reset mx-3" data-dismiss="modal" data-toggle="modal" data-target="#confirmPassword">Reset Password</button>
        <button type="button" class="btn btn-light text-muted" data-dismiss="modal">Cancel</button>

      </div>
    </div>
  </div>
</div>


@include('auth.confirmpassword')

<style>
.modal-center{
    max-width: 400px;
}
.modal-header{
    border-bottom: none!important;
    padding: 0.5rem 1rem!important;
}
.modal-body{
    padding-top: 0;
    
}
.circle{
    border-radius: 50%;
    width: 50px;
    height: 50px;
    background: #00C259;
}
</style>