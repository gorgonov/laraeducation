<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Cource;
use App\Models\CourceAuthor;

class CreateCourceAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists(CourceAuthor::TABLE_NAME);
        Schema::create(CourceAuthor::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cource_id');
            $table->foreign('cource_id')->references('id')->on(Cource::TABLE_NAME);
            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')->references('id')->on(\App\Models\User::TABLE_NAME);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(CourceAuthor::TABLE_NAME);
    }
}
