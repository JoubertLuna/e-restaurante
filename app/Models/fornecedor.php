<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fornecedor extends Model
{
    use HasFactory;

    protected $fillable = ['razao_social', 'nome_fantasia', 'cpf', 'cnpj', 'data_cadastro', 'ativo', 'fone', 'celular', 'email', 'cep', 'logradouro', 'numero', 'uf', 'cidade', 'complemento', 'bairro', 'rg'];
}
