<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cidadao;

class Endereco extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cep',
        'logradouro',
        'complemento',
        'bairro',
        'cidade',
        'estado',
        'cidade'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'cidadao'
    ];

    protected $appends = ["links"];

    public function cidadao()
    {
        return $this->belongsTo(Cidadao::class);
    }

    public function getLinksAttribute()
    {        
        return [
            "self" => '/api/'. $this->cidadao["cpf"].'/endereco/',
            "cidadao" => "/api/".$this->cidadao["cpf"],
        ];
    }

}
