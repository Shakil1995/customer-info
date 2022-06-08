<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('area_id');
            $table->string('code')->unique()->nullable();
            $table->string('name')->nullable();        
            $table->text('age')->nullable();
            $table->boolean('is_active')->default(true);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('area_id')->references('id')->on('areas')->onUpdate('cascade')->onDelete('restrict');
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
