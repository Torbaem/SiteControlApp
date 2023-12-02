<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sensordata extends Model {
    protected $table = 'sensordata'; // Nombre de la tabla

    protected $fillable = [
        'temperature',
        'humidity',
        // Agrega aquí otros campos que puedan ser llenados masivamente
    ];

    // Puedes definir relaciones o métodos aquí si es necesario
}
