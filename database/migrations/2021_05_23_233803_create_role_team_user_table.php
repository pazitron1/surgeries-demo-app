<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleTeamUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_team_user', function (Blueprint $table) {
            $table->primary(['role_id', 'team_id', 'user_id']);
            $table->foreignId('role_id')->constrainer()->onDelete('cascade');
            $table->foreignId('team_id')->constrainer()->onDelete('cascade');
            $table->foreignId('user_id')->constrainer()->onDelete('cascade');
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
        Schema::dropIfExists('role_team_user');
    }
}
