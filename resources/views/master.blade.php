<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title','dashboard')</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      min-height: 100vh;
      display: flex;
    }
    nav {
      min-width: 200px;
      background-color: #343a40;
      color: white;
      height: 100vh;
    }
    nav a {
      color: white;
      text-decoration: none;
    }
    nav a:hover {
      background-color: #495057;
      color: white;
    }
    .content {
      flex: 1;
      padding: 20px;
    }
  </style>
</head>
<body>
  <!-- Sidebar Navigation -->
  <nav class="d-flex flex-column p-3">
    <h3 class="text-center">Dashboard</h3>
    <ul class="nav nav-pills flex-column mt-3">
      <li class="nav-item mb-2">
        <a class="nav-link active" href="{{ url('/') }}">Home</a>
      </li>
      <li class="nav-item mb-2">
        <a class="nav-link" href="{{ url('/view') }}">View Products</a>
      </li>
      <li class="nav-item mb-2">
        <a class="nav-link" href="{{ url('/add') }}">Add Product</a>
      </li>
    </ul>
  </nav>

  <!-- Main Content -->
  <div class="content">
    @yield('content')
  </div>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
