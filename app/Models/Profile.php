<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

//    protected $table = 'profiles_table';

    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['employee_id', 'image_path'];

    public function profile()
    {
        return $this->belongsTo(Employee::class);
    }
}
