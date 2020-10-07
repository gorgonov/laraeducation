<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Cource;

class CreateCourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists(Cource::TABLE_NAME);
        Schema::create(Cource::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->string('name', 65)->unique();
            $table->text('head_description')->nullable();
            $table->text('what_learn')->nullable();
            $table->text('requirements')->nullable();
            $table->text('long_description')->nullable();
            $table->integer('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Cource::TABLE_NAME);
    }
}
