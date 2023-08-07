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
        if (!Schema::hasTable('khaohoc')) {
            Schema::create('khoahoc', function (Blueprint $table) {
            
                $table->id();
                $table->string('TenKhoaHoc');
                $table->string('AnhKhoaHoc');
                $table->text('MoTaNgan');
                $table->text('MoTaDayDu');
                $table->date('ThoiGian');
                $table->integer('LuotXem');
                $table->string('ThoiLuongKhoaHoc');
                $table->double('GiaCu');
                $table->integer('GiamGia');
                $table->double('GiaMoi');
                $table->integer('TrangThai');
                $table->integer('MaCapDo');
                $table->integer('MaGiangVien');
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
        Schema::dropIfExists('khoahoc');
    }
};
