<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fingerinout;
use App\Models\Fingerprint;
use App\Models\Report;
use App\Models\User;
class ReportController extends Controller
{
    // Mostrar todos los reportes
    public function index()
    {

        $reports = Report::all();
        $fingerinouts = Fingerinout::with('fingerprint.user')->select('fingerprint_id', 'action', 'created_at')->get();
        return view('content.pages.reports', compact('reports','fingerinouts'));
    }

    // Mostrar el formulario para crear un nuevo reporte
    public function create()
    {
      $fingerprints = Fingerprint::select('id', 'user_id')->get();
      $fingerprints = Fingerprint::with('user')->get();
      return view('content.pages.reports-create', compact('fingerprints'));


    }

    // Almacenar un nuevo reporte
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
          'fingerprint_id' => 'required',
          'nombre' => 'required',
          'fecha_entrada' => 'required',
          'fecha_salida' => 'required',
          // Agrega aquí las reglas de validación para los campos restantes
      ]);

      // Crear un nuevo reporte en la base de datos
      $report = new Report();
      $report->fingerprint_id = $request->input('fingerprint_id');
      $report->nombre = $request->input('nombre');
      $report->fecha_entrada = $request->input('fecha_entrada');
      $report->fecha_salida = $request->input('fecha_salida');
      $report->user_notes = $request->input('user_notes');
      $report->admin_notes = $request->input('admin_notes');
      $report->save();

      // Redirigir a la vista deseada con un mensaje de éxito
      return redirect()->route('pages-reports')->with('success', 'Reporte creado exitosamente.');
    }

    // Mostrar un reporte específico
    public function show($id)
    {
        $report = Report::findOrFail($id);
        return view('reports.show', compact('report'));
    }

    // Mostrar el formulario para editar un reporte
    public function edit($id)
    {
        $report = Report::findOrFail($id);
        return view('reports.edit', compact('report'));
    }

    // Actualizar un reporte existente
    public function update(Request $request, $id)
    {
        $report = Report::findOrFail($id);

        // Validar los datos del formulario
        $request->validate([
            // Aquí coloca las reglas de validación para los campos del reporte
        ]);

        // Actualizar el reporte en la base de datos
        $report->fingerprint_id = $request->input('fingerprint_id');
        $report->user_notes = $request->input('user_notes');
        $report->admin_notes = $request->input('admin_notes');
        $report->save();

        // Redirigir a la vista deseada con un mensaje de éxito
        return redirect()->route('reports.index')->with('success', 'Reporte actualizado exitosamente.');
    }

    // Eliminar un reporte
    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();

        // Redirigir a la vista deseada con un mensaje de éxito
        return redirect()->route('reports.index')->with('success', 'Reporte eliminado exitosamente.');
    }

    public function getUserName($id)
{
    $user = User::find($id);

    if ($user) {
        return response()->json(['name' => $user->name]);
    }

    return response()->json(['name' => 'No se encontró el usuario'], 404);
}
}
