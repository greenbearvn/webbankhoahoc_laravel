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
        if (!Schema::hasTable('binhluan')) {
            Schema::create('binhluan', function (Blueprint $table) {
                $table->integer("MaBinhLuan");
                $table->integer('MaKhoaHoc');
                $table->integer('MaNguoiDung');
                $table->text('NoiDung');
                $table->date("ThoiGian");
               

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
        Schema::dropIfExists('binhluan');
    }
};
