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
        if (!Schema::hasTable('nguoidung')) {
            Schema::create('nguoidung', function (Blueprint $table) {
                $table->integer("MaNguoiDung");
                $table->string('TenNguoiDung');
                $table->string('MatKhau');
                $table->string('Quyen');
                $table->rememberToken();
            });
        }
        else{
            $table->rememberToken();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nguoidung');
    }
};
