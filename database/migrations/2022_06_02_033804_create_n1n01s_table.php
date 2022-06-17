<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateN1n01sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('n1n01s', function (Blueprint $table) {
            $table->id();
            $table->string('no_register')->nullable();
            $table->foreignId('applicant_id')->references('id')->on('applicants')->constrained();
            $table->foreignId('service_id')->references('id')->on('services')->constrained();
            $table->string('no_mohon')->nullable();
            $table->date('tgl_mohon')->nullable();
            $table->string('uraian')->nullable();
            $table->string('no_sk')->nullable();
            $table->integer('urutan_sk')->nullable();
            $table->date('tgl_sk_terbit')->nullable();
            $table->date('tgl_sk_mulai')->nullable();
            $table->date('tgl_sk_akhir')->nullable();
            $table->foreignId('signature_id_1')->nullable()->references('id')->on('signatures')->constrained();
            $table->foreignId('signature_id_2')->nullable()->references('id')->on('signatures')->constrained();
            $table->enum('notifikasi', ['active', 'inactive'])->default('inactive')->nullable();
            $table->enum('cetak', ['active', 'inactive'])->default('inactive')->nullable();
            $table->integer('flow')->nullable()->default('0');
            $table->enum('flowa', ['Internal', 'Pemohon', 'Dikembalikan'])->default('Internal')->nullable();
            $table->enum('flow_status', ['Setuju', 'Revisi', 'Tolak'])->default('Setuju')->nullable();
            //
            $table->integer('jenis_permohonan')->default(1)->comment('1: Permohonan Baru, 2: Perpanjangan');
            $table->string('nama_konsultan', 100);
            $table->string('telp_konsultan', 16)->nullable();
            $table->text('alamat_konsultan')->nullable();
            $table->foreignId('kegiatan_id')->references('id')->on('kegiatans')->constrained();
            $table->foreignId('jenis_kegiatan_id')->references('id')->on('jenis_kegiatans')->constrained();
            $table->integer('luas_lahan')->nullable();
            $table->integer('luas_bangunan')->nullable();
            $table->integer('jumlah_siswa')->nullable();
            $table->integer('jumlah_unit')->nullable();
            $table->integer('srp')->nullable();
            $table->integer('lhr')->nullable();
            $table->foreignId('bangkitan_id')->nullable()->references('id')->on('skala_bangkitans')->constrained();
            $table->text('alamat_kegiatan');
            $table->foreignId('district_id')->references('id')->on('districts')->constrained();
            $table->foreignId('village_id')->references('id')->on('villages')->constrained();
            $table->text('narasi_lbr_akses_io')->nullable();
            $table->string('file_ba')->nullable();
            $table->date('tgl_ba')->nullable();
            $table->date('tgl_tinjau')->nullable();
            $table->date('tgl_sidang')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('n1n01s');
    }
}
