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
        Schema::create('persuratans', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nama', 100);
            $table->enum('jenis_formulir', ['enum', 'pengajuan_akta_kelahiran', 'peristiwa_kependudukan', 'sebagai_pasangan_suami_istri', 'kebenaran_kelahiran', 'kebenaran_kematian_orang_tua', 'kebenaran_kematian']);
            $table->text('jawaban_formulir');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persuratans');
    }
};
