<?php namespace Ceylanur\Gallary\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateCeylanurGallaryImages extends Migration
{
    public function up()
    {
        Schema::create('ceylanur_gallary_images', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('title')->nullable();
            $table->string('short_description')->nullable();
            $table->string('price')->nullable();
            $table->string('currency')->nullable();
            $table->integer('style')->nullable();
            $table->string('size')->nullable();
            $table->integer('see')->nullable();
            $table->integer('availability')->nullable();
            $table->text('description')->nullable();
            $table->text('for_buy')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ceylanur_gallary_images');
    }
}
