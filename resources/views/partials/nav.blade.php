<div class="navbar bg-base-100">
    <div class="navbar-start">
      <div class="dropdown">
        <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
        </div>
        <ul class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
          <li><a href="{{route('home')}}">Home</a></li>
          <li>
            <a>Admin</a>
            <ul class="p-2">
              <li><a href="{{route('posts.index')}}">Posts</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <a class="btn btn-ghost text-xl">daisyUI</a>
    </div>
    <div class="navbar-center hidden lg:flex">
      <ul class="menu menu-horizontal px-1">
        <li><a href="{{route('home')}}">Home</a></li>
        @auth
        <li>
          <details>
            <summary>Admin</summary>
            <ul class="p-2 absolute z-20">
              <li><a href="{{route('posts.index')}}">Posts</a></li>
            </ul>
          </details>
        </li>
        @endauth
      </ul>
    </div>
    <div class="navbar-end">
        @guest
            <a class="btn btn-primary me-2" href="{{route('login')}}">Login</a>
            <a class="btn btn-success" href="{{route('register')}}">Register</a>
        @else
        <ul class="menu menu-horizontal px-1">
            <li>
              <details>
                <summary>{{auth()->user()->name}}</summary>
                <ul class="p-2 absolute z-20">
                    <li>
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <input type="submit" value="Logout">
                        </form>
                    </li>
                </ul>
              </details>
            </li>
          </ul>
        @endguest
    </div>
  </div>
