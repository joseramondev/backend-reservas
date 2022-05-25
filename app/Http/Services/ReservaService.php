<?php

namespace App\Http\Services;

use App\Http\Services\ReservaService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class ReservaService {
    private $csvFile;

    function __construct() {
        $this->csvFile = Storage::disk('local')
            ->getDriver()->getAdapter()->getPathPrefix().'public\\csv\\reservas.csv';
    }

    public function readCSV() {
        $file_handle = fopen($this->csvFile, 'r');
        while (!feof($file_handle)) {
            $line_of_text[] = fgetcsv($file_handle, 0, ',');
        }
        fclose($file_handle);
        return $line_of_text;
    }

    public function criteria($column) {
        $file_handle = fopen($this->csvFile, "r");
        $result = false;
        while ($row = fgetcsv($file_handle)) {
            if ($row[1] == $column) {
                $result = $row;
                break;
            }
        }
        fclose($file_handle);
        return $result;
    }

    public function exportJsonFormat() {
        $reservas = $this->readCSV();
        Storage::put('public/json/reservas.json', json_encode($reservas));
    }
}