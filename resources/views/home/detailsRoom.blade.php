<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    @include('home.css')
    <style>
        .room-detail {
            padding: 60px 0;
        }
        .card-img-top {
            max-height: 400px;
            object-fit: cover;
        }
        .form-box {
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
        }
    </style>
</head>

<body class="main-layout">

    <!-- Loader -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="Chargement..."/></div>
    </div>

    <!-- Header -->
    <header>
        @include('home.header')
    </header>

    <!-- Détail de la chambre + formulaire -->
    <section class="room-detail">
        <div class="container">
            <div class="row">
                <!-- Détails de la chambre -->
                <div class="col-md-7">
                    <div class="card shadow-sm mb-4">
                        <img src="{{ asset('room/' . $room->image) }}" class="card-img-top" alt="{{ $room->title }}">
                        <div class="card-body">
                            <h3 class="card-title">{{ $room->title }}</h3>
                            <p class="card-text">{{ $room->description }}</p>
                            <p><strong>Prix :</strong> {{ $room->prix }} TND / nuit</p>
                            <p><strong>Disponibilité :</strong> 
                                {{ $room->disponibilite == 1 ? 'Oui' : 'Non' }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Formulaire de réservation -->
                <div class="col-md-5">
                    <div class="form-box shadow-sm">
                        <h4>Réserver cette chambre</h4>
                        <form action="" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="date" class="form-label">Date de réservation</label>
                                <input type="date" class="form-control" name="date_reservation" required>
                            </div>
                            <div class="mb-3">
                                <label for="nights" class="form-label">Nombre de nuits</label>
                                <input type="number" class="form-control" name="nights" min="1" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Confirmer la réservation</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('home.footer')

</body>
</html>
