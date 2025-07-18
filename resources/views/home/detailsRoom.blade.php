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
                            <p><strong>Disponibilité actuelle :</strong> 
                                {{ $room->disponibilite == 1 ? 'Oui' : 'Non' }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Formulaire de réservation -->
                <div class="col-md-5">
                    <div class="form-box shadow-sm">
                        <h4>Réserver cette chambre</h4>

                        @if (session('message'))
                            <div class="alert alert-info mt-2">
                                {{ session('message') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <ul class="mb-3">
                                @foreach ($errors->all() as $error)
                                    <li style="color:red">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form id="reservationForm"  action="{{ url('addReservation', $room->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nom</label>
                                <input type="text" name="name" 
                                @if(Auth::id()) 
                                value="{{Auth::user()->name}}"
                                @endif
                                class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" 
                                @if(Auth::id()) 
                                value="{{Auth::user()->email}}"
                                @endif
                                class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Téléphone</label>
                                <input type="tel" name="phone" id="phone" class="form-control" required pattern="[0-9]{8,15}">
                                <span id="phoneError" class="text-danger small"></span>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Date de début</label>
                                <input type="date" name="start_date" id="startdate" class="form-control" required min="">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Date de fin</label>
                                <input type="date" name="end_date" id="enddate" class="form-control" required>
                            </div>

                            <input type="submit" class="btn btn-primary w-100" value="Réserver">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('home.footer')

    <!-- Script validation date -->
    <script>
        <script>
    // Appliquer la date d'aujourd'hui comme valeur min pour le champ startdate
    window.onload = function () {
        const today = new Date().toISOString().split('T')[0];
        document.getElementById("startdate").setAttribute('min', today);
    };
</script>

    </script>

</body>
</html>
