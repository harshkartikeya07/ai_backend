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
        Schema::table('ai_tools', function (Blueprint $table) {
            // Add new columns
            $table->string('link', 255)->nullable()->after('image'); // Add 'link' column
            $table->text('usage')->nullable()->after('link');       // Add 'usage' column

            // Modify existing columns
            $table->unsignedBigInteger('category_id')->change();    // Change 'category_id' to unsignedBigInteger

            // Add foreign key constraint for 'category_id'
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ai_tools', function (Blueprint $table) {
            // Drop added columns
            $table->dropColumn('link');
            $table->dropColumn('usage');

            // Remove foreign key constraint and revert 'category_id'
            $table->dropForeign(['category_id']);
            $table->integer('category_id')->change();
        });
    }
};
