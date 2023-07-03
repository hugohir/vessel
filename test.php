<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="img_avatar1.png" alt="Logo" style="width:40px;" class="rounded-pill">
    </a>


    <a class="navbar-brand" href="javascript:void(0)">Logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
     <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Vessels</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">All</a></li>
              <li><hr class="dropdown-divider"></hr></li>
              <li><a class="dropdown-item" href="#">By Company</a></li>
              <li><a class="dropdown-item" href="#">By First Letter</a></li>
              <li><a class="dropdown-item" href="#">By Flag</a></li>
              <li><a class="dropdown-item" href="#">By Year</a></li>
              <li><hr class="dropdown-divider"></hr></li>
              <li><a class="dropdown-item" href="#">Search"></a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Companies</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#" data-toggle="modal" data-target='#modal'>All</a></li>
              <li><hr class="dropdown-divider"></hr></li>
              <li><a class="dropdown-item" href="#">By First Letter</a></li>
              <li><hr class="dropdown-divider"></hr></li>
              <li><a class="dropdown-item" href="#">Search</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Ports</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">All</a></li>
              <li><hr class="dropdown-divider"></hr></li>
              <li><a class="dropdown-item" href="#">Shortlist</a></li>
              <li><a class="dropdown-item" href="#">Region</a></li>
              <li><hr class="dropdown-divider" href="#">Country</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Teleports</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">All</a></li>
              <li><hr class="dropdown-divider"></hr></li>
              <li><a class="dropdown-item" href="#">Shortlist</a></li>
              <li><a class="dropdown-item" href="#">Region</a></li>
              <li><a class="dropdown-item" href="#">Country</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Weather</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Rain</a></li>
              <li><a class="dropdown-item" href="#">Temperature</a></li>
              <li><a class="dropdown-item" href="#">Wind</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">About</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Vessel Tracker</a></li>
              <li><a class="dropdown-item" href="#">Developer</a></li>
              <li><a class="dropdown-item" href="#">Help</a></li>
               <li><hr class="dropdown-divider"></hr></li>
              <li><a class="dropdown-item" href="#">About</a></li>
            </ul>
          </li>

        </ul>



        <form class="d-flex">
          <input class="form-control me-2" type="text" placeholder="Search">
          <button class="btn btn-primary" type="button">Search</button>
        </form>
      </div>



<div class="container-fluid mt-3">
  <h3>Navbar Forms</h3>
  <p>You can also include forms inside the navigation bar.</p>
</div>
 </div>
</nav>

<div class="container-fluid mt-3">
  <h3>Brand / Logo</h3>
  <p>When using the .navbar-brand class with images, Bootstrap 5 will automatically style the image to fit the navbar.</p>
</div>

</body>
</html>
