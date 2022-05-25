<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\ReservaService;
use Response;
use File;
use App\Models\Test;

class ReservaController extends Controller
{
    /**
     * Retorna las reservas.
     * Ubicación del fichero csv origen: storage/app/public/csv/reservas.csv
     *
     * @return reservas/json
     */
    public function getReservas(ReservaService $reservaService) {
        $reservas = $reservaService->readCSV();
        return response()
            ->json(['reservas' => $reservas]);
    }

    /**
     * Devuelve una reserva por medio de una criteria.
     *
     * @return reserva/json
     */
    public function getReserva(ReservaService $reservaService, Request $request) {
        $reserva = $reservaService->criteria($request['criteria']);
        return response()
            ->json(['reserva' => $reserva]);
    }

    /**
     * Descarga fichero json con las reservas.
     * Ubicación del fichero descargado: storage/app/public/json/reservas.json
     *
     * @return void
     */
    public function exportReservasFormatJson(ReservaService $reservaService) {
        $reservaService->exportJsonFormat();
        $file = storage_path(). "\\app\\public\\json\\reservas.json";
        $headers = array('Content-Type: application/json');
        return Response::download($file, 'reservas.json', $headers);
    }
}
