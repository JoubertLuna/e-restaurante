<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fornecedors', function (Blueprint $table) {
            $table->id();
            $table->string('razao_social');
            $table->string('nome_fantasia')->nullable();
            $table->string('cpf', 20)->nullable()->unique();
            $table->string('cnpj', 20)->nullable()->unique();
            $table->date('data_cadastro');
            $table->string('ativo', 1)->default('S'); // S = Sim - N = Não
            $table->string('fone', 20)->nullable();
            $table->string('celular', 20)->nullable();
            $table->string('email')->unique();
            $table->string('cep', 20);
            $table->string('logradouro')->nullable();
            $table->string('numero')->nullable();
            $table->string('uf', 2)->nullable();
            $table->string('cidade')->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->string('rg', 20)->nullable()->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fornecedors');
    }
};
