<nav class="navigation-bar">
  <ul class="my-ul">
    <li class="nav-link {{ Request::route()->getName() === 'admin.home' ? 'active' : '' }}"><a href="{{ route('admin.home') }}">HOME</a></li>
    <li class="nav-link {{ Request::route()->getName() === 'admin.posts.index' ? 'active' : '' }}"><a href="{{ route('admin.posts.index') }}">POSTS</a></li>
    <li class="nav-link {{ Request::route()->getName() === 'admin.users.index' ? 'active' : '' }}"><a href="{{ route('admin.users.index') }}">UTENTI</a></li>
    {{--   <li class="nav-link {{ Request::route()->getName() === 'login-page' ? 'active' : '' }}"><a href="{{ route('login-page') }}">ACCOUNT</a></li> --}}
  </ul>

  <ul class="my-ul">
    <li class="nav-link ml-auto">
      <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          {{ Auth::user()->name }}
      </a>

      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('logout') }}"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
      </div>
    </li>
  </ul>
</nav>