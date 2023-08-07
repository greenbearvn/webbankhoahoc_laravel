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
        if (!Schema::hasTable('video')) {
            Schema::create('video', function (Blueprint $table) {

            $table->integer('MaVideo');
            $table->integer('MaBaiHoc');
            $table->string('LinkVideo');
            $table->string('ThoiLuongVideo');
            $table->integer('TinhTrang');
            $table->string('TenVideo');
            $table->text('NoiDungVideo'); 

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
        Schema::dropIfExists('video');
    }
};
