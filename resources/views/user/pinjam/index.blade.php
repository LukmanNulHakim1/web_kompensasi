<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Ketersediaan LAB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
        }
        .navbar {
            background-color: #0d6efd;
            padding: 10px 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        .navbar .welcome-text {
            color: #fff;
            font-size: 18px;
            margin-right: 20px;
        }
        .navbar img.avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-left: 15px;
        }
        .nav-center {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            background-color: #e9ecef;
            padding: 15px 0;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .nav-center a {
            margin: 0 15px;
            text-decoration: none;
            color: #0d6efd;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #fff;
            border: 1px solid #0d6efd;
        }
        .nav-center a.active {
            background-color: #0b5ed7;
            color: #fff;
        }
        .card img {
            height: 150px;
            object-fit: cover;
        }
        .no-photo {
            font-size: 14px;
            color: #6c757d;
            text-align: center;
            padding: 50px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="welcome-text">
            👍 Welcome back, Ck Boy!
        </div>
        <img src="user-avatar.png" alt="Avatar" class="avatar">
    </nav>

    <!-- Navigasi Tengah -->
    <div class="nav-center">
        <a href="#" class="btn btn-outline-light">Home</a>
        <a href="#" class="btn btn-outline-light">Profil</a>
        <a href="#" class="btn btn-primary active">Pinjam</a>
        <a href="#" class="btn btn-outline-light">Riwayat</a>
    </div>

    <!-- Main Content -->
    <div class="container my-4">
        <h1 class="text-center mb-4">Apakah Ruangan Lab ini Tersedia?</h1>

        <!-- Form -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="GET" action="">
                    <div class="row g-3 align-items-center">
                        <div class="col-md-4">
                            <select class="form-select" name="lab">
                                <option value="" selected>Pilih LAB</option>
                                @foreach ($labors as $labor)
                                    <option value="{{ $labor->id }}">{{ $labor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="time" class="form-control" name="time">
                        </div>
                        <div class="col-md-3">
                            <input type="date" class="form-control" name="date">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100">Cek LAB</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Cards -->
        <div class="row mt-4">
            @foreach ($labors as $labor)
                <div class="col-md-3 mb-4">
                    <div class="card h-100 text-center">
                        @if ($labor->photo)
                            <img src="{{ asset($labor->photo) }}" alt="{{ $labor->name }}" class="card-img-top">
                        @else
                            <div class="no-photo">Tidak ada foto</div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $labor->name }}</h5>
                            <p class="card-text">{{ $labor->location }}</p>
                            <a href="{{ route('user.pinjam.show', ['id' => $labor->id]) }}" class="btn btn-info btn-sm">Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Load More -->
        <div class="text-center mt-4">
            <a href="#" class="btn btn-link">Selengkapnya...</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
