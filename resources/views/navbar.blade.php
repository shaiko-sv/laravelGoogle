<!-- Stored in resources/views/navbar.blade.php -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">News</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="<?=route('home',null,false)?>">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=route('category.all',null,false)?>">Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=route('news.all',null,false)?>">News</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=route('admin.index',null,false)?>">Admin</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/welcome">Laravel</a>
            </li>
        </ul>
    </div>
</nav>
