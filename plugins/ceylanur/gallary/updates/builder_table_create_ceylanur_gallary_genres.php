<?php namespace Ceylanur\Gallary\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateCeylanurGallaryGenres extends Migration
{
    public function up()
    {
        Schema::create('ceylanur_gallary_genres', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ceylanur_gallary_genres');
    }
}
