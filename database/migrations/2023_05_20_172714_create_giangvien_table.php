<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('giangvien')) {
            Schema::create('giangvien', function (Blueprint $table) {
                
                $table->integer('MaGiangVien');
                $table->string('TenGiangVien');
                $table->string('Email');
                $table->string('SoDienThoai');
                $table->string('AnhDaiDien');
                $table->string('MoTa');
                $table->integer('MaDanhMuc');
                
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('giangvien');
    }
};
