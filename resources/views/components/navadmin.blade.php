<nav class="navbar navbar-expand-lg bg-primary navbar-dark mb-2">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">POLGAN</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-12">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">dashboard</a>
          <li class="nav-item">
          <a class="nav-link" href="/users">Users</a>
        </li>
        </li>
      </ul>
      <div>
      <div class="ms-auto navbar-nav">
        <form action="/logout" method="POST">
          @csrf
          <button type="submit" class="btn-danger">Logout</button>
        </form>  
      </div>
    </div>
  </div>
</nav>