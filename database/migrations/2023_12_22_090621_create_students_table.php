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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string("first_name",30)->nullable();            
            $table->string("last_name",30)->nullable();            
            $table->string("email",30)->unique();            
            $table->date("dob");            
            $table->string("mobile_number",30);            
            $table->char("gender")->comment("[m:male,f:female]");            
            $table->text("address");            
            $table->string("city",30);            
            $table->integer("pin_code");
            $table->string("state",30);
            $table->string("country",30);
            $table->string("hobbies",200);
            $table->string("courses",200);
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
        Schema::dropIfExists('students');
    }
};
