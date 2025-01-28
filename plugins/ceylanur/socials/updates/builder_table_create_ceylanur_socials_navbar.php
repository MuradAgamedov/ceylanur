<?php namespace Ceylanur\Socials\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateCeylanurSocialsNavbar extends Migration
{
    public function up()
    {
        Schema::create('ceylanur_socials_navbar', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('facebook')->nullable();
            $table->integer('facebook_seen')->nullable();
            $table->string('tiktok')->nullable();
            $table->integer('tiktok_seen')->nullable();
            $table->string('telegram')->nullable();
            $table->integer('telegram_seen')->nullable();
            $table->string('youtube')->nullable();
            $table->integer('youtube_seen')->nullable();
            $table->string('whatsapp')->nullable();
            $table->integer('whatsapp_seen')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ceylanur_socials_navbar');
    }
}
