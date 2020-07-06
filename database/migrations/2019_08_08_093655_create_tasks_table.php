<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->integer('payment')->unsigned();
            $table->string('name');
            $table->string('email');
            $table->string('subject_name');
            $table->string('documentType_name');
            $table->dateTime('deadline_datetime');
            $table->string('level');
            $table->decimal('suggested_price', 20, 2);
            $table->decimal('budget', 20, 2);
            $table->string('title');
            $table->unsignedInteger('status')->default(0);
            $table->longText('task');
            $table->string('format');
            $table->integer('pages');
            $table->string('spacing');
            $table->timestamps();

            $table->foreign('payment')->references('id')->on('payments');
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
