<div class="page-content">
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Library Admin Dashboard</h2>
            <span class="text-muted">Welcome Back, Admin</span>
        </div>

        <!-- Statistics Section -->
        <div class="row g-4">

            <div class="col-xl-3 col-md-6">
                <div class="card shadow border-0 rounded-3">
                    <div class="card-body text-center">
                        <i class="fa fa-users fa-2x text-primary mb-2"></i>
                        <h6 class="text-muted">Total Users</h6>
                        <h3 class="fw-bold">{{ $user }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card shadow border-0 rounded-3">
                    <div class="card-body text-center">
                        <i class="fa fa-book fa-2x text-success mb-2"></i>
                        <h6 class="text-muted">Total Books</h6>
                        <h3 class="fw-bold">{{ $book }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card shadow border-0 rounded-3">
                    <div class="card-body text-center">
                        <i class="fa fa-handshake fa-2x text-warning mb-2"></i>
                        <h6 class="text-muted">Borrowed Books</h6>
                        <h3 class="fw-bold">{{ $borrow }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card shadow border-0 rounded-3">
                    <div class="card-body text-center">
                        <i class="fa fa-user-plus fa-2x text-info mb-2"></i>
                        <h6 class="text-muted">Total Readers</h6>
                        <h3 class="fw-bold">{{ $create }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card shadow border-0 rounded-3">
                    <div class="card-body text-center">
                        <i class="fa fa-undo fa-2x text-danger mb-2"></i>
                        <h6 class="text-muted">Returned Books</h6>
                        <h3 class="fw-bold">{{ $return }}</h3>
                    </div>
                </div>
            </div>

        </div>


        <!-- Chart Section -->
        <div class="row mt-5">

            <div class="col-lg-6">
                <div class="card shadow border-0 rounded-3">
                    <div class="card-header bg-light">
                        <h6 class="mb-0">Books Statistics</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="booksChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card shadow border-0 rounded-3">
                    <div class="card-header bg-light">
                        <h6 class="mb-0">Users Statistics</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="usersChart"></canvas>
                    </div>
                </div>
            </div>

        </div>


        <!-- Quick Info Section -->
        <div class="row mt-5">

            <div class="col-lg-6">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body">
                        <h6 class="fw-bold mb-3">System Summary</h6>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between">
                                Total Users
                                <span class="badge bg-primary">{{ $user }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                Total Books
                                <span class="badge bg-success">{{ $book }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                Borrowed Books
                                <span class="badge bg-warning">{{ $borrow }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                Returned Books
                                <span class="badge bg-danger">{{ $return }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body">
                        <h6 class="fw-bold mb-3">Recent Activity</h6>
                        <p class="text-muted">
                            Library system is running smoothly.
                        </p>
                        <p>
                            📚 Books Available: <strong>{{ $book }}</strong><br>
                            👥 Active Users: <strong>{{ $user }}</strong><br>
                            🔄 Borrowed: <strong>{{ $borrow }}</strong><br>
                            ✅ Returned: <strong>{{ $return }}</strong>
                        </p>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
