<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Fingerinout
 *
 * @property $id
 * @property $fingerprint_id
 * @property $action
 * @property $created_at
 * @property $updated_at
 *
 * @property Fingerprint $fingerprint
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Fingerinout extends Model
{
  protected $table ='fingerinout';
  protected $fillable = ['fingerprint_id', 'action'];
  public function fingerprint() {
    return $this->belongsTo(Fingerprint::class, 'fingerprint_id');
}


}
