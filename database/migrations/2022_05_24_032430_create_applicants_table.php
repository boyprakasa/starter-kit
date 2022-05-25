<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->references('id')->on('member_profiles')->constrained();
            $table->string('jns_pemohon')->nullable();
            $table->string('bntk_perusahaan')->nullable();
            $table->string('jns_perusahaan')->nullable();
            $table->string('nib')->nullable();
            $table->string('nm_perusahaan')->nullable();

            $table->string('nama')->nullable();
            $table->string('alamat')->nullable();
            $table->foreignId('province_id')->nullable()->references('id')->on('provinces')->constrained();
            $table->foreignId('city_id')->nullable()->references('id')->on('cities')->constrained();
            $table->foreignId('district_id')->nullable()->references('id')->on('districts')->constrained();
            $table->foreignId('village_id')->nullable()->references('id')->on('villages')->constrained();

            $table->string('akta_no')->nullable();
            $table->string('notaris')->nullable();
            $table->date('tgl_akta')->nullable();
            $table->string('akta_no_lama')->nullable();
            $table->string('notaris_lama')->nullable();
            $table->date('tgl_akta_lama')->nullable();

            $table->string('nm_pj')->nullable();
            $table->string('alamat_pj')->nullable();
            $table->enum('gender_pj', ['L', 'P'])->default('L');
            $table->string('jabatan')->nullable();

            $table->string('npwp')->nullable();
            $table->string('telepon')->nullable();
            $table->string('fax')->nullable();
            $table->enum('status', ['verified', 'unverified'])->default('unverified');

            $table->string('file_ktp');
            $table->string('file_npwp')->nullable();
            $table->string('file_nib')->nullable();
            $table->string('file_akta')->nullable();
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
        Schema::dropIfExists('applicants');
    }
}
