<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGSuiteAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gsuite_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('gsuiteable_id')->index()->nullable();
            $table->string('gsuiteable_type')->index()->nullable();
            $table->uuid('creator_id')->index()->nullable();
            $table->string('email')->index()->unique();
            $table->timestamps();

            $table->foreign('creator_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gsuite_accounts');
    }
}
