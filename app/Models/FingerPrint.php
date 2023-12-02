<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Fingerprint
 *
 * @property $id
 * @property $user_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Fingerinout[] $fingerinouts
 * @property Report[] $reports
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Fingerprint extends Model
{
  public function user() {
    return $this->belongsTo(User::class);
}

public function fingerinouts() {
    return $this->hasMany(Fingerinout::class);
}

public function report() {
    return $this->hasOne(Report::class);
}

}
