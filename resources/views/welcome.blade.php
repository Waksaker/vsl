<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link rel="icon" href="" type="image/x-icon" />
    <script src="{{ asset('assets/js/bootstrap1.bundle.min.js') }}"></script>
    <script>
      // Redirect to another page after 6 seconds
      setTimeout(function() {
        window.location.href = "{{ route('loginshow') }}"; // Replace "newpage.html" with the URL of the page you want to redirect to
      }, 5000);
    </script>
  </head>
  <body>
    <div class="vh-100 d-flex align-items-center justify-content-center">
      <div class="fade-in-image">
        <img src="{{ asset('assets/images/logo.jpg') }}" width="200">
      </div>
    </div>
  </body>
</html>