<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = ['firstName', 'lastName', 'dob','address','mobile','designation','salary'];


    public function profileModels(){
        return $this->hasOne(Grade::class);
    }
}
