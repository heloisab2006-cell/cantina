<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 150);
            $table->string('descricao', 500)->nullable();
            $table->decimal('preco', 10, 2);
            $table->string('imagem', 500)->nullable();
            $table->string('categoria', 50); // 'salgados', 'doces', 'bebidas'
            $table->timestamps();
            $table->index('categoria');
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};