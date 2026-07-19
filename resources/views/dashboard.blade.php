<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <link rel="stylesheet" href="assets/css/sweetalert2.min.css">
</head>
<body>
    <h1>Welcome to the Dashboard</h1>
<script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert2.min.js') }}"></script>
@if(session('success'))
<script>
  Swal.fire({
    icon: 'success',
    text: '{{ session('success') }}',
    confirmButtonColor: '#1B95CF'
  });
</script>
@endif
</body>
</html>
