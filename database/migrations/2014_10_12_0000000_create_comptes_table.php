<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComptesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comptes', function (Blueprint $table) {
            $table->id();
            $table->string('cNom', 24);
            $table->string('password', 1024);
            $table->string('cIp', 16)->nullable();
            $table->integer('cStatut')->default(0);
            $table->integer('cInit')->default(0);
            $table->string('cUid', 16)->nullable();
            $table->integer('cPersonnages')->default(0);
            $table->integer('cAvert')->default(0);
            $table->integer('cTBan')->default(0);
            $table->string('ec_RBan', 128)->nullable();
            $table->integer('cAdmin')->default(0);
            $table->integer('cRP')->default(0);
            $table->integer('cTuto')->default(0);
            $table->integer('cFlyTuto')->default(0);
            $table->integer('cVersion')->default(0);
            $table->integer('cQCM')->default(0);
            $table->string('cEmail');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->string('cRegIp')->nullable();
            $table->integer('cVote')->default(0);
            $table->integer('cVoteTime')->default(0);
            $table->integer('cRegTime')->default(0);
            $table->integer('cLastConnect')->default(0);
            $table->integer('cConnect')->default(0);
            $table->integer('cVerifyEmail')->default(0);
            $table->integer('ec_NextTimeBan')->default(1);
            $table->integer('cLastActivity')->default(0);
            $table->longText('cAvatarUrl')->nullable();
            $table->integer('posts')->default(0);
            $table->string('roles')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comptes');
    }
}
