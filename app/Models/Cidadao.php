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
        'updated_at',
        'deleted_at'
    ];

    protected $appends = ["links"];

    /**
     * Relationship with contact (n to n)
     * 
     */
    public function contatos()
    {
        return $this->hasOne(Contato::class);
    }

    /**
     * Relationship with adress (n to n)
     * 
     */
    public function enderecos()
    {
        return $this->hasOne(Endereco::class);
    }

    public function getLinksAttribute()
    {        
        return [
            "self" => "/api/". $this["cpf"],
            "contato" => '/api/'. $this["cpf"] .'/contato/',
            "endereco" => '/api/'. $this["cpf"] .'/endereco/',
        ];
    }

}
