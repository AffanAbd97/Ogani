<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'alamat', 'telepon', 'gender','umur','foto'
    ];
    public function user(){
        return $this->hasOne(User::class);
      }

}
