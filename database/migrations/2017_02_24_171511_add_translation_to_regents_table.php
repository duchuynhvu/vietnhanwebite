<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTranslationToRegentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('regents', function (Blueprint $table) {
            $table->string('name_en')->nullable();
            $table->string('regency_en')->nullable();
            $table->text('content_en')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('regents', function (Blueprint $table) {
            $table->dropColumn(['name_en', 'regency_en', 'content_en']);
        });
    }
}
