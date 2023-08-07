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
        if (!Schema::hasTable('baihoc')) {
            Schema::create('baihoc', function (Blueprint $table) {
                $table->integer("MaBaiHoc");
                $table->string('MaKhoaHoc');
                $table->string('TenBaiHoc');
                $table->string('ThoiGianHoanThanh');
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
        Schema::table('baihoc', function (Blueprint $table) {
            //
        });
    }
};
