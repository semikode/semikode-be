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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
			$table->foreignId('file_id')->nullable()->comment('logo');
			$table->string('phone');
			$table->string('email');
			$table->text('address');
			$table->text('name')->comment('company name');
			$table->text('tagline')->comment('company tagline');
			$table->text('desc')->comment('company description');
            $table->timestamps();
			$table->softDeletes();
			$table->foreignId('created_by')->nullable();
			$table->foreignId('updated_by')->nullable();
			$table->foreignId('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abouts');
    }
};
