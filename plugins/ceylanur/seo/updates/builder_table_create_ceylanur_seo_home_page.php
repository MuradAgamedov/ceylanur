<?php namespace Ceylanur\Seo\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateCeylanurSeoHomePage extends Migration
{
    public function up()
    {
        Schema::create('ceylanur_seo_home_page', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('meta_title')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ceylanur_seo_home_page');
    }
}
