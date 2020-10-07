<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Cource;
use App\Models\Keywords;
use App\Models\User;

class CreateKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists(Keywords::TABLE_NAME);
        Schema::create(Keywords::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->string('name', 65);
            $table->unsignedBigInteger('cource_id');
            $table->foreign('cource_id')->references('id')->on(Cource::TABLE_NAME);
            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')->references('id')->on(User::TABLE_NAME);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Keywords::TABLE_NAME);
    }
}
