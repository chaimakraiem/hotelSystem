<div class="gallery">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>Mes Réservations</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12"> {{-- largeur complète pour la table --}}
                @if($reservations->isEmpty())
                    <p>Vous n'avez aucune réservation.</p>
                @else
                    <table class="table table-bordered mt-4">
                        <thead>
                            <tr>
                                <th>Chambre</th>
                                <th>Date de début</th>
                                <th>Date de fin</th>
                                <th>Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservations as $reservation)
                                <tr>
                                    <td>{{ $reservation->room->title ?? 'Chambre supprimée' }}</td>
                                    <td>{{ $reservation->start_date }}</td>
                                    <td>{{ $reservation->end_date }}</td>
                                    <td>Confirmée</td> {{-- Ajuste selon ton modèle --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>
