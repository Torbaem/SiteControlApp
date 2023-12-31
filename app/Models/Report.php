<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Report
 *
 * @property $id
 * @property $fingerprint_id
 * @property $nombre
 * @property $fecha_entrada
 * @property $fecha_salida
 * @property $user_notes
 * @property $admin_notes
 * @property $created_at
 * @property $updated_at
 *
 * @property Fingerprint $fingerprint
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Report extends Model
{
  public function fingerprint() {
    return $this->belongsTo(Fingerprint::class);
}

}
