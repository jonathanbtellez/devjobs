<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('vacantes', function (Blueprint $table) {
            $table->string('title');
            $table->foreignId('salary_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('company');
            $table->date('deadline');
            $table->text('description');
            $table->string('image');
            $table->integer('released')->default(1);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vacantes', function (Blueprint $table) {
            // if you want delete tables relationated you need delete first the foreing keys of the table
            $table->dropForeign('vacantes_category_id_foreign');
            $table->dropForeign('vacantes_salary_id_foreign');
            $table->dropForeign('vacantes_user_id_foreign');
            $table->dropColumn(['title','salary_id','category_id','company','deadline','description','image','released','user_id']);
        });
    }
};
