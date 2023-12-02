<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sensordata;

class SensordataController extends Controller
{
    public function receiveSensorData(Request $request)
    {
        if ($request->has('temperature') && $request->has('humidity')) {
            $temperature = $request->input('temperature');
            $humidity = $request->input('humidity');

            // Actualizar los valores de temperatura y humedad en la base de datos
            $sensorData = Sensordata::find(1); // Suponiendo que los datos se actualizan en una fila específica

            if ($sensorData) {
                $sensorData->temperature = $temperature;
                $sensorData->humidity = $humidity;
                $sensorData->save();

                return response()->json(['message' => 'Datos de temperatura y humedad actualizados correctamente']);
            } else {
                return response()->json(['error' => 'No se encontraron datos de sensor para actualizar'], 404);
            }
        } else {
            return response()->json(['error' => 'Datos incompletos'], 400);
        }
    }

    public function getLatestTemperature()
    {
        $latestData = Sensordata::latest()->first();

        return response()->json([
            'temperature' => $latestData ? $latestData->temperature : null,
            'humidity' => $latestData ? $latestData->humidity : null,
            // Puedes incluir otros datos si es necesario (fecha, etc.)
        ]);
    }
}
