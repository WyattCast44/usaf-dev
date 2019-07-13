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
            
            // GSuite
            $table->uuid('gsuiteable_id')->index()->nullable();
            $table->string('gsuiteable_type')->index()->nullable();
            $table->string('gsuite_email')->index()->unique();
            $table->boolean('suspended')->default(false);

            // Creation Status
            $table->boolean('creating')->default(false);
            $table->boolean('ready')->default(false);

            // Audit
            $table->uuid('creator_id')->index()->nullable();
            $table->foreign('creator_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('g_suite_accounts');
    }
}
