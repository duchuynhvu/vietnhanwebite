<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTranslateToBenefitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('benefits', function (Blueprint $table) {
            $table->string('title_en')->nullable();
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
        Schema::table('benefits', function (Blueprint $table) {
            $table->dropColumn(['title_en', 'content_en']);
        });
    }
}
