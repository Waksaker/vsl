<!doctype html>
<html lang="en">
<head>
    <title>Sign Up</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <link rel="stylesheet" href="assets/css/sweetalert2.min.css">
</head>
<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="{{ asset('assets/images/logo.jpg') }}" width="180" alt="">
                  <br>
                  <br>
                  <h3><b>Sign Up</b></h3>
                </a>
                @if(session('error'))
                    <div id="errorAlert" class="alert alert-danger alert-dismissible fade show">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                <form name="login" action="{{ route('signup') }}" method="post">
                  @csrf
                  <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                    <sup><font style="color:red">*Please enter your full name</font></sup>
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email">
                    <sup><font style="color:red">*Please enter your email</font></sup>
                  </div>
                  <div class="mb-3">
                    <label for="telphone" class="form-label">Telephone Number (no -)</label>
                    <input type="text" class="form-control" id="telphone" name="telphone" placeholder="example: 0123456789">
                    <sup><font style="color:red">*Please enter your telephone number</font></sup>
                  </div>
                  <div class="mb-3">
                    <label for="location" class="form-label">Location</label>
                    <textarea id="location" name="location" class="form-control" rows="4" placeholder=""></textarea>
                    <sup><font style="color:red">*Please enter your address</font></sup>
                  </div>
                  <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Submit</button>
                </form>
                <a href="{{ route('loginshow') }}" class="btn btn-secondary w-100 py-8 fs-4 mb-4 rounded-2">Back to Sign In</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert2.min.js') }}"></script>
<script>
document.getElementById('page').addEventListener('change', function () {
    if (this.value) {
        window.location.href = this.value;
    }
});
</script>
</body>
</html>
