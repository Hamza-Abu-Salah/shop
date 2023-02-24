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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',200);
            $table->string('email')->unique();
            $table->string('phone',250)->nullable();
            $table->string('image',500)->nullable();
            $table->enum('type',['admin','user'])->default('user');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('active')->default(0);
            $table->integer('added_by'); //الادمن الي ضاف اليوزر
            $table->integer('updated_by')->nullable(); // الادمن الي عمل تحديث
            $table->integer('come_code'); // ممكن اعمل نظام ويكون شغال عليه اكثر من شر
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
