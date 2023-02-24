<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Winning;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(Winning::getNameTable(), function (Blueprint $table) {
            $table->id();
            $table->foreignId('hash_link_id')->index()->references('id')->on(\App\Models\HashLink::getNameTable())->cascadeOnDelete();
            $table->integer('rand_number');
            $table->decimal('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Winning::getNameTable());
    }
};
