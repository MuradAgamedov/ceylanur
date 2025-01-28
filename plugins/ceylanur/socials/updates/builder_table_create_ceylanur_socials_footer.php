<?php namespace Ceylanur\Socials\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateCeylanurSocialsFooter extends Migration
{
    public function up()
    {
        Schema::create('ceylanur_socials_footer', function($table)
        {
            $table->increments('id')->unsigned();
            $table->integer('facebook_seen')->nullable();
            $table->integer('twitter_seen')->nullable();
            $table->integer('telegram_seen')->nullable();
            $table->integer('whatsapp_seen')->nullable();
            $table->integer('youtube_seen')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ceylanur_socials_footer');
    }
}
