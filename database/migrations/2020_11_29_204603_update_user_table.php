<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->string('surname',255)
                ->after('name');
            $table->string('nickname')
                ->after('id');
            $table->boolean('sex')
                ->after('name');
            $table->string('avatar',255)
                ->after('email_verified_at');
            $table->string('phone',100)
                ->after('name');
            $table->boolean('email_spam')
                ->after('email_verified_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
