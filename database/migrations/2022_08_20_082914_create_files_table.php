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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
			$table->string('code')->unique()->nullable();
			// $table->morphs('modelable');
			$table->string('original_name');
			$table->string('filepath');
			$table->string('filename');
			$table->string('filesize');
			$table->string('fileurl');
			$table->string('mime_type');
			$table->string('extension');
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
        Schema::dropIfExists('files');
    }
};
