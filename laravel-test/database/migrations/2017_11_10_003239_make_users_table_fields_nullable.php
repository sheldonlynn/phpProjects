<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeUsersTableFieldsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table){
            $table->string('linkedinurl')->nullable()->change();
            $table->string('workphone')->nullable()->change();
            $table->string('workphoneextension')->nullable()->change();
            $table->string('mobilephone')->nullable()->change();
            $table->string('homephone')->nullable()->change();
            $table->string('middlename')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {
            $table->string('linkedinurl')->nullable(false)->change();
            $table->string('workphone')->nullable(false)->change();
            $table->string('workphoneextension')->nullable(false)->change();
            $table->string('mobilephone')->nullable(false)->change();
            $table->string('homephone')->nullable(false)->change();
            $table->string('middlename')->nullable(false)->change();
        });
    }
}
