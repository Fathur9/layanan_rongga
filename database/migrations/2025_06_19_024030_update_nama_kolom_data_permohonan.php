<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Tambah kolom 'data' jika belum ada
        if (!Schema::hasColumn('permohonan_layanan', 'data')) {
            Schema::table('permohonan_layanan', function (Blueprint $table) {
                $table->json('data')->nullable();
            });
        }

        // Coba salin data jika kolom lama masih ada
        if (Schema::hasColumn('permohonan_layanan', 'data_permohonan')) {
            DB::statement('UPDATE permohonan_layanan SET data = data_permohonan');

            Schema::table('permohonan_layanan', function (Blueprint $table) {
                $table->dropColumn('data_permohonan');
            });
        }
    }

    public function down(): void
    {
        if (!Schema::hasColumn('permohonan_layanan', 'data_permohonan')) {
            Schema::table('permohonan_layanan', function (Blueprint $table) {
                $table->json('data_permohonan')->nullable();
            });
        }

        if (Schema::hasColumn('permohonan_layanan', 'data')) {
            DB::statement('UPDATE permohonan_layanan SET data_permohonan = data');

            Schema::table('permohonan_layanan', function (Blueprint $table) {
                $table->dropColumn('data');
            });
        }
    }
};
