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
        Schema::table('users', function (Blueprint $table) {
            // Rename columns
            $table->renameColumn('type', 'type_id');
            $table->renameColumn('role', 'role_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Rename columns back to their original names
            $table->renameColumn('type_id', 'type');
            $table->renameColumn('role_id', 'role');
        });
    }
};
