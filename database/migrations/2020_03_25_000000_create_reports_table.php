<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    // ['patient_id', 'wbc', 'neno', 'lymno', 'mono', 'eono', 'bano', 'hb', 'hct', 'mcv', 'plt', 'disease', 'next_date', 'doctor_comment'];
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id');
            $table->float('wbc', 8, 2)->default('0')->nullable();
            $table->float('neno', 8, 2)->default('0')->nullable();
            $table->float('lymno', 8, 2)->default('0')->nullable();
            $table->float('mono', 8, 2)->default('0')->nullable();
            $table->float('eono', 8, 2)->default('0')->nullable();
            $table->float('bano', 8, 2)->default('0')->nullable();
            $table->float('hb', 8, 2)->default('0')->nullable();
            $table->float('hct', 8, 2)->default('0')->nullable();
            $table->float('mcv', 8, 2)->default('0')->nullable();
            $table->float('plt', 8, 2)->default('0')->nullable();
            $table->string('disease')->nullable();
            $table->date('next_date')->nullable();
            $table->text('doctor_comment')->nullable();
            $table->string('pdf_name')->nullable();
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
        Schema::dropIfExists('reports');
    }
}
