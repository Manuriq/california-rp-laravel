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
            $table->bigIncrements('id');
            $table->string('cNom', 24);
            $table->string('password', 1024);
            $table->string('cIp', 255)->nullable();
            $table->integer('cIpUpdated')->default(0);
            $table->integer('cStatut')->default(0);
            $table->integer('cAvert')->default(0);
            $table->integer('cTBan')->default(0);
            $table->string('ec_RBan', 128)->nullable();
            $table->integer('cAdmin')->default(0);
            $table->integer('cRP')->default(0);
            $table->string('cEmail');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->string('cRegIp')->nullable();
            $table->integer('cLastConnect')->default(0);
            $table->integer('cConnect')->default(0);
            $table->string('cAvatarUrl')->default("avatars/default.png");
            $table->string('roles')->nullable();

            // $table->dropColumn(['votes', 'avatar', 'location']); 
            // $table->renameColumn('from', 'to');
            // $table->string('name', 50)->nullable()->change();

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
