<?php namespace Ceylanur\Seo\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateCeylanurSeoScripts extends Migration
{
    public function up()
    {
        Schema::create('ceylanur_seo_scripts', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('title_for_search')->nullable();
            $table->text('script')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ceylanur_seo_scripts');
    }
}
