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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
			$table->string('title');
			$table->foreignId('file_id')->nullable();
			$table->string('slug')->nullable();
			$table->string('url')->nullable();
			$table->text('desc')->nullable();
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
        Schema::dropIfExists('services');
    }
};
