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
        if (!Schema::hasTable('chitietdonhang')) {
            Schema::create('chitietdonhang', function (Blueprint $table) {
 
                $table->integer('MaDonHang');
                $table->integer('MaKhoaHoc');
                $table->string('MaGiangVien');
                $table->double('Gia');

               
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
        Schema::dropIfExists('chitietdonhang');
    }
};
