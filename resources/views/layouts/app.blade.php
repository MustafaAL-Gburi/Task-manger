<html>

<head>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Task Manager</title>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">

                <a class="navbar-brand" href="{{ route('welcome') }}">Task Manager</a>

                <!-- button -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!--list of links -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('tasks.index') }}">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('tasks.create') }}">Add Task</a>
                            </li>

                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-link nav-link text-white">Logout</button>
                                </form>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @endauth
                    </ul>
                </div>

            </div>
        </nav>
    </header>

    <main>
        @yield('list')
        @yield('addTask')
        @yield('content')
    </main>
    <footer class="bg-dark text-white text-center text-lg-start mt-5">
        <div class="container p-4">

            <div class="row">

                <div class="col-lg-12 col-md-12 mb-4">
                    <h5 class="text-uppercase">Task Manager</h5>
                    <p>
                        This is a simple task management application built with Laravel. It allows you to create, view,
                        and manage your tasks efficiently. Feel free to explore the features and improve your
                        productivity!
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 mb-12">
                    <h5 class="text-uppercase"></h5>
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="{{ route('tasks.index') }}" class="text-white me-3">Home</a>
                            <a href="{{ route('tasks.index') }}" class="text-white me-3">About</a>
                            <a href="{{ route('tasks.index') }}" class="text-white">Contact</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="text-center p-3 bg-secondary">
            © 2026 Copyright: MyApp
        </div>
    </footer>

</body>

</html>
