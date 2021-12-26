<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <span class="nav-link">
                <div class="profile-image">
                    @if(Auth::user()->getFirstMedia())
                        <img class="img-xs rounded-circle" src="{{ Auth::user()->getFirstMediaUrl() }}" alt="{{ Auth::user()->name }}">
                    @else
                        <img class="img-xs rounded-circle" src="{{ asset('images/faces/face8.jpg') }}" alt="{{ Auth::user()->name }}">
                    @endif
                    <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                    <p class="profile-name">{{ Auth::user()->name }}</p>
                    <p class="designation">{{ Auth::user()->roles->pluck('name')[0] ?? '' }}</p>
                </div>
            </span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.home') }}">
                <span class="menu-title">Dashboard</span>
                <i class="icon-screen-desktop menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-posts">
                <span class="menu-title">Posts</span>
                <i class="icon-layers menu-icon"></i>
            </a>
            <div class="collapse" id="ui-posts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('posts.index') }}">All posts</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('posts.create') }}">Add new</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-categories">
                <span class="menu-title">Categories</span>
                <i class="icon-layers menu-icon"></i>
            </a>
            <div class="collapse" id="ui-categories">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('categories.index') }}">All categories</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('categories.create') }}">Add new</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-tags">
                <span class="menu-title">Tags</span>
                <i class="icon-layers menu-icon"></i>
            </a>
            <div class="collapse" id="ui-tags">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('tags.index') }}">All tags</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('tags.create') }}">Add new</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item pro-upgrade">
            <form action="{{ route('logout') }}" method="POST" class="nav-link">
                @csrf
                <button class="btn btn-block px-0 btn-rounded btn-upgrade" type="submit"><i class="icon-logout mr-2"></i> Logout</button>
            </form>
        </li>
    </ul>
</nav>