<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\HashLink;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(HashLink::getNameTable(), function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->index()->references('id')->on(\App\Models\User::getNameTable())->cascadeOnDelete();
            $table->string('token');
            $table->boolean('deactivated')->default(0);
            $table->dateTime('expires_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(HashLink::getNameTable());
    }
};
