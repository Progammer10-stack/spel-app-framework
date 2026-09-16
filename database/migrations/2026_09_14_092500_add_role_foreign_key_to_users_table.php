<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Zorg dat er rollen zijn voordat we de foreign key zetten
        if (DB::table('roles')->count() === 0) {
            DB::table('roles')->insert([
                [
                    'id' => 1,
                    'name' => 'Admin',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 2,
                    'name' => 'Customer',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }

        DB::table('users')->where('role_id', 0)->update(['role_id' => 2]);

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('roles')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
        });
    }
};
