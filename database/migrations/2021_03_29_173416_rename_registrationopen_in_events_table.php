<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameRegistrationopenInEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->renameColumn('registrationOpen', 'is_registration_open');
            $table->renameColumn('isOwnEvent', 'is_own_event');
            $table->renameColumn('isOnline', 'is_online');
            $table->renameColumn('isOnsite', 'is_onsite');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->renameColumn('is_registration_open', 'registrationOpen');
            $table->renameColumn('is_own_event', 'isOwnEvent');
            $table->renameColumn('is_online', 'isOnline');
            $table->renameColumn('is_onsite', 'isOnsite');
        });
    }
}
