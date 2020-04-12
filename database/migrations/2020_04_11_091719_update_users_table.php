<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'openhumans_access_token'))
            {
                $table->string('openhumans_access_token', 100)->nullable()->change();
            }
            if (Schema::hasColumn('users', 'openhumans_refresh_token'))
            {
                $table->string('openhumans_refresh_token', 100)->nullable()->change();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'openhumans_access_token'))
            {
                $table->char('openhumans_access_token', 100)->change();
            }
            if (Schema::hasColumn('users', 'openhumans_refresh_token'))
            {
                $table->char('openhumans_refresh_token', 100)->change();
            }
        });
    }
}
