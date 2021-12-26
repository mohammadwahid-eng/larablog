<div class="col-md-3 col-lg-2">
    <ul>
        <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
        <li>
            <a href="{{ route('posts.index') }}">Posts</a>
            <ul>
                <li><a href="{{ route('posts.index') }}">All Posts</a></li>
                <li><a href="{{ route('posts.create') }}">Add New</a></li>
                <li>
                    <a href="{{ route('categories.index') }}">Categories</a>
                    <ul>
                        <li><a href="{{ route('categories.index') }}">All Categories</a></li>
                        <li><a href="{{ route('categories.create') }}">Add New</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('tags.index') }}">Tags</a>
                    <ul>
                        <li><a href="{{ route('tags.index') }}">All Tags</a></li>
                        <li><a href="{{ route('tags.create') }}">Add New</a></li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</div>