<?php namespace Ceylanur\Seo\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateCeylanurSeoLinks extends Migration
{
    public function up()
    {
        Schema::create('ceylanur_seo_links', function($table)
        {
            $table->increments('id')->unsigned();
            $table->text('link')->nullable();
            $table->string('title_for_search')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ceylanur_seo_links');
    }
}
