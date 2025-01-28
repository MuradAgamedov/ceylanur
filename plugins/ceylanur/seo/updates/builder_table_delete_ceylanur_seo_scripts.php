<?php namespace Ceylanur\Seo\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteCeylanurSeoScripts extends Migration
{
    public function up()
    {
        Schema::dropIfExists('ceylanur_seo_scripts');
    }
    
    public function down()
    {
        Schema::create('ceylanur_seo_scripts', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('title_for_search', 255)->nullable();
            $table->text('script')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
}
