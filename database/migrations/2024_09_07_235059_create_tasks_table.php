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
        //tabla tasks
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');//titulo
            $table->text('description');
            $table->dateTime('due_date')->nullable();//fecha limite para ejecutar la tares, campo puede ser nulo
            $table->enum('status',['Pendiente','En Progreso','Completada'])->nullable();// Estados que puede tener el estado 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
