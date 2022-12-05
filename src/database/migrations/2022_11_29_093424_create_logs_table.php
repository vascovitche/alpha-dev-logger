<?php

use AlphaDevTeam\Logger\Enums\ErrorStatus;
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
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->text('message')->nullable();
            $table->text('class')->nullable();
            $table->integer('code')->nullable();
            $table->text('file')->nullable();
            $table->json('trace')->nullable();
            $table->integer('level')->nullable();
            $table->string('level_name')->nullable();
            $table->string('channel')->nullable();
            $table->text('user_id')->nullable();
            $table->smallInteger('status')->default(ErrorStatus::NEW->value);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
    }
};
