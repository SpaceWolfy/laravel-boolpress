<nav class="navigation-bar">
  <ul class="my-ul">
    <li class="nav-link {{ Request::route()->getName() === 'admin.home' ? 'active' : '' }}"><a href="{{ route('admin.home') }}">HOME</a></li>
    <li class="nav-link {{ Request::route()->getName() === 'admin.posts.index' ? 'active' : '' }}"><a href="{{ route('admin.posts.index') }}">POSTS</a></li>
    <li class="nav-link {{ Request::route()->getName() === 'admin.users.index' ? 'active' : '' }}"><a href="{{ route('admin.users.index') }}">UTENTI</a></li>
    <li class="nav-link {{ Request::route()->getName() === 'login-page' ? 'active' : '' }}"><a href="{{ route('login-page') }}">ACCOUNT</a></li>
  </ul>
</nav>