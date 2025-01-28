<?php namespace Ceylanur\Seo\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateCeylanurSeoScripts2 extends Migration
{
    public function up()
    {
        Schema::create('ceylanur_seo_scripts', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('title_for_search')->nullable();
            $table->text('script');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ceylanur_seo_scripts');
    }
}
