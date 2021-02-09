<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationLegaciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration_legacies', function (Blueprint $table) {
            $table->id();
            $table->string('event');
            $table->string('participant_name');
            $table->string('participant_email')->nullable();
            $table->text('comment')->nullable();
            $table->boolean('virtual_flag');
            $table->boolean('deleted_flag')->default(false);
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
        Schema::dropIfExists('registration_legacies');
    }
}
