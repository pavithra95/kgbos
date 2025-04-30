<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Verify extends Model
{
    public function depart()
{
    return $this->belongsTo(Department::class, 'department');
}
    public function hod()
    {
        return $this->belongsTo(User::class, 'hod_name');
    }

    public function dean()
    {
        return $this->belongsTo(User::class, 'dean_name');
    }
}
