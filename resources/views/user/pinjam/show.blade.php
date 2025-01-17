<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail LAB</title>
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
            height: 300px;
            object-fit: cover;
            border-radius: 8px;
        }
        .facilities-list {
            list-style: none;
            padding: 0;
        }
        .facilities-list li::before {
            content: "✔";
            color: green;
            margin-right: 5px;
        }
        .detail-content {
            padding-left: 20px;
        }
        .no-photo {
            color: #bbb;
            font-size: 18px;
        }
        .detail-card {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="welcome-text">
            👍 Welcome back, Ck Boy!
        </div>
        <img src="/mnt/data/image.png" alt="User Avatar" class="avatar">
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
        <div class="row">
            <!-- Foto LAB (kiri) -->
            <div class="col-md-4">
                <div class="text-center">
                    @if ($labor->photo)
                        <img src="{{ asset($labor->photo) }}" alt="{{ $labor->name }}" class="img-fluid">
                    @else
                        <div class="no-photo">Tidak ada foto</div>
                    @endif
                </div>
            </div>

            <!-- Detail LAB (kanan) -->
            <div class="col-md-8">
                <div class="detail-card">
                    <h2>{{ $labor->name }}</h2>
                    <p class="text-muted">{{ $labor->location }}</p>
                    <p class="mt-4"><strong>Deskripsi:</strong></p>
                    <p>{{ $labor->description }}</p>

                    <!-- Fasilitas -->
                    <p><strong>Fasilitas:</strong></p>
                    <ul class="facilities-list">
                        @if ($labor->facilities && json_decode($labor->facilities))
                            @foreach (json_decode($labor->facilities) as $facility)
                                <li>{{ $facility }}</li>
                            @endforeach
                        @else
                            <li>Tidak ada fasilitas tersedia</li>
                        @endif
                    </ul>

                    <!-- Tombol Pinjam dan Kembali -->
                    <div class="text-center mt-4">
                        <a href="#" class="btn btn-primary">Pinjam Ruangan</a>
                        <a href="{{ route('user.pinjam.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
