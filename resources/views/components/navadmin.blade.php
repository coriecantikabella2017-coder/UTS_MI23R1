<nav class="navbar navbar-expand-lg bg-primary navbar-dark mb-2">
  <div class="container-fluid">

    <a class="navbar-brand" href="#">POLGAN</a>

    <button class="navbar-toggler" type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarNav">

      <span class="navbar-toggler-icon"></span>

    </button>

    <div class="collapse navbar-collapse" id="navbarNav">

      <ul class="navbar-nav ms-3">

        <li class="nav-item">
          <a class="nav-link active" href="/dashboard">Dashboard</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/users">Users</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/products">Products</a>
        </li>

      </ul>

      <div class="ms-auto">

        <form action="/logout" method="POST">

          @csrf

          <button type="submit" class="btn btn-danger">
            Logout
          </button>

        </form>

      </div>

    </div>

  </div>
</nav>