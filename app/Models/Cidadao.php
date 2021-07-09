<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Endereco;
use App\Models\Contato;

class Cidadao extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'sobrenome',
        'cpf'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    /**
     * Relationship with contact (n to n)
     * 
     */
    public function contato()
    {
        return $this->hasMany(Contato::class);
    }

    /**
     * Relationship with adress (n to n)
     * 
     */
    public function enderco()
    {
        return $this->hasMany(Endereco::class);
    }
}
