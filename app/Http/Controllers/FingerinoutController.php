<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fingerinout;


class FingerinoutController extends Controller
{
  public function receiveFingerinoutData(Request $request)
  {
      if ($request->isMethod('post')) {
          if ($request->filled(['fingerprint_id', 'action'])) {
              $fingerprint_id = $request->input('fingerprint_id');
              $action = $request->input('action');

              if ($fingerprint_id > 0 && ($action === "entrada" || $action === "salida")) {
                  try {
                      Fingerinout::create([
                          'fingerprint_id' => $fingerprint_id,
                          'action' => $action,
                      ]);
                      return response()->json(['message' => 'Datos insertados correctamente en la base de datos']);
                  } catch (\Exception $e) {
                      return response()->json(['error' => 'Error al insertar datos en la base de datos: ' . $e->getMessage()], 500);
                  }
              } else {
                  return response()->json(['error' => 'Acción inválida. Debe ser "entrada" o "salida"'], 400);
              }
          } else {
              return response()->json(['error' => 'Faltan parámetros en la solicitud'], 400);
          }
      } else {
          return response()->json(['error' => 'Método de solicitud no válido'], 405);
      }
  }
}

