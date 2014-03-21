<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUtilisateurTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('utilisateur', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('nom', 50);
            $table->string('prenom', 50);
            $table->string('email', 255)->unique();
            $table->string('password', 120);
            $table->string('acces', 120);
            $table->tinyInteger('role');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('utilisateur');
	}

}
