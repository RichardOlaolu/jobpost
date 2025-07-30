<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('applications', function (Blueprint $table) {
        // Drop the old foreign key constraint
        $table->dropForeign(['job_id']);

        // Add the new constraint referencing 'postjobs'
        $table->foreign('job_id')->references('id')->on('postjobs')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('applications', function (Blueprint $table) {
        $table->dropForeign(['job_id']);
        $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade'); // optional, revert to old
    });
}

};
