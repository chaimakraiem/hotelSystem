<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Reservation;

class HomeController extends Controller
{
    // Affiche les détails d'une chambre
    public function detailsRoom($id)
    {
        $room = Room::findOrFail($id); // findOrFail pour gérer les erreurs
        return view('home.detailsRoom', compact('room'));
    }

    // Ajoute une réservation
    public function addReservation(Request $request, $id)
    {
        $request->validate([
            'startdate' => 'required|date',
            'enddate' => 'required|date|after:startdate',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|regex:/^[0-9]{8,15}$/',
        ]);

        $startdate = $request->startdate;
        $enddate = $request->enddate;

        // Vérifie si la chambre est déjà réservée entre ces dates
        $isBooked = Reservation::where('room_id', $id)
            ->where('start_date', '<=', $enddate)
            ->where('end_date', '>=', $startdate)
            ->exists();

        if ($isBooked) {
            return redirect()->back()->with('message', 'Chambre déjà réservée pour cette période.');
        }

        // Enregistrement de la réservation
        $data = new Reservation();
        $data->room_id = $id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->start_date = $startdate;
        $data->end_date = $enddate;
        $data->save();

        return redirect()->back()->with('message', 'Réservation effectuée avec succès.');
    }

    // Affiche les réservations de l'utilisateur connecté
   public function mesReservations()
{
    $userEmail = auth()->user()->email;

    // Récupère les réservations de l'utilisateur avec la chambre associée
    $reservations = Reservation::where('email', $userEmail)
        ->with('room')
        ->get();

    return view('home.mes_reservations', compact('reservations'));
}

}
