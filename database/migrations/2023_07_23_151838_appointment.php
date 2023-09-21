<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('appointment', function (Blueprint $table){
            $table->id();
            $table->bigInteger('patient_id')->unsigned()->index()->nullable();
            $table->foreign('patient_id')->references('id')->on('patient')->onDelete('cascade');
            //$table->index('patientid');
            //$table->foreign('patientid')->references('id')->on('patient')->onDelete('cascade');
            $table->string('patientname');
            $table->string('phonenumber');
            $table->integer('age');
            $table->date('appointmentdate');
            $table->string('problem');
            $table->integer('bookingnumber')->unique();
//            $table->height();
//            $table->weight();
            $table->string('doctor');
            $table->rememberToken();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(Blueprint $table): void
    {
        //
        Schema::dropIfExists('appointment');
       // $table->dropForeign('patientid');
       // $table->dropIndex('patientid');
       // $table->dropColumn('patientid');
    }
};
