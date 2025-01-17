<nav class="py-2 bg-light border-bottom">
  <div class="container d-flex flex-wrap">
    <ul class="nav me-auto">
      <li class="nav-item"><a href="/" class="nav-link link-dark px-2 active" aria-current="page">Home</a></li>
      
      <li class="nav-item"><a href="/about" class="nav-link link-dark px-2">About</a></li>
      
        @if (Auth::check()) 
          <li class="nav-item"><a href="/posts" class="nav-link link-dark px-2">Posts</a></li>
          <li class="nav-item"><a href="/createpost" class="nav-link link-dark px-2">Create Post</a></li>
          <li class="nav-item"><a href="/profile" class="nav-link link-dark px-2">Profile</a></li>
          <li class="nav-item"><a href="/postdashboard" class="nav-link link-dark px-2">Post Dashboard</a></li>
          <li class="nav-item"><a href="/userdashboard" class="nav-link link-dark px-2">User Dashboard</a></li>
        @endif
      
    </ul>
    <ul class="nav">
      <li class="nav-item"><a href="/signin" class="nav-link link-dark px-2">Sign in</a></li>
      <li class="nav-item"><a href="/signup" class="nav-link link-dark px-2">Sign up</a></li>
      <li class="nav-item"><a href="/signout" class="nav-link link-dark px-2">Sign out</a></li>
    </ul>
  </div>
</nav>
<header class="py-3 mb-4 border-bottom">
  <div class="container d-flex flex-wrap justify-content-center">
    <a href="/posts" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-4">My Blog</span>
    </a>
    <form class="col-12 col-lg-auto mb-3 mb-lg-0" role="search">
      <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
    </form>
  </div>
</header>
