<!-- Stored in resources/views/admin/navbar.blade.php -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Admin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="<?=route('home',null,false)?>">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=route('admin.action1',null,false)?>">Action 1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=route('admin.action2',null,false)?>">Action 2</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=route('admin.logout',null,false)?>">Logout</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/welcome">Laravel</a>
            </li>
        </ul>
    </div>
</nav>
