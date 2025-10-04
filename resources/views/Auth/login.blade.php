<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<style>

</style>
<body class=" justify-content-center align-items-center d-flex">
    <form action="{{ url('loginForm') }}"  class="p-3 m-5 w-25 shadow-lg" method="post">
        @csrf
        <h4 class="text-center">Login Form</h4>
        <div class="form-group mb-2">
            <label for="" class="form-label">Email</label>
            <input type="text"  class="form-control"  placeholder="Email" name="Email">

        </div>
         <div class="form-group  mb-2">
            <label for="" class="form-label">Password</label>
            <input type="password" class="form-control" placeholder="psw" name="Password">

        </div>
        <div class="d-flex justify-content-end mt-2">

        <a style="font-size: 14px"  href="">Forgot password</a>
        </div>

        <div class="d-flex justify-content-center flex-column m-3 ">
            <button type="submit" class="btn btn-primary">Login Form</button>
            <a href="{{ url('register') }}" class="text-center mt-3" style="font-size: 14px">Don't have account</a>
        </div>
    </form>

</body>
</html>
