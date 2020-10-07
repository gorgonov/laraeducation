<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Cource;
use App\Models\LessonBlock;
use App\Models\Lesson;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists(LessonBlock::TABLE_NAME);
        Schema::create(LessonBlock::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->string('name', 65);
            $table->unsignedBigInteger('cource_id');
            $table->foreign('cource_id')->references('id')->on(Cource::TABLE_NAME);
        });

        Schema::dropIfExists(Lesson::TABLE_NAME);
        Schema::create(Lesson::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->string('name', 65);
            $table->timestamp('duration');
            $table->unsignedBigInteger('block_id');
            $table->foreign('block_id')->references('id')->on(LessonBlock::TABLE_NAME);
            $table->string('video', 123);
            $table->boolean('is_open');
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
        Schema::dropIfExists(Lesson::TABLE_NAME);
        Schema::dropIfExists(LessonBlock::TABLE_NAME);
    }
}
