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
        if (!Schema::hasTable('donhang')) {
            Schema::create('donhang', function (Blueprint $table) {
                $table->integer('MaDonHang');
                $table->integer('MaNguoiDung');
                $table->date('NgayLap');
                $table->int('TinhTrang');
                $table->double('Tongtien'); 
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
        Schema::dropIfExists('donhang');
    }
};
