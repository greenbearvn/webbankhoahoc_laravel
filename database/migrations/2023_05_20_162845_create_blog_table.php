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
        if (!Schema::hasTable('blog')) {
            Schema::create('blog', function (Blueprint $table) {
                $table->integer("MaBaiViet");
                $table->string('TenBaiViet');
                $table->text('NoiDung');
                $table->string('AnhMinhHoa');
                $table->date("NgayDang");
                $table->unsignedBigInteger('MaDanhMuc');
                $table->unsignedBigInteger('MaNguoiDung');
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
        Schema::dropIfExists('blog');
    }
};
