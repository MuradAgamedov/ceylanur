<?php namespace Ceylanur\Settings\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateCeylanurSettingsMain extends Migration
{
    public function up()
    {
        Schema::create('ceylanur_settings_main', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('facebook_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('telegram_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->string('instagram_link')->nullable();
            $table->text('copywrite_text')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ceylanur_settings_main');
    }
}
