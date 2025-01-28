<?php namespace Ceylanur\Socials\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCeylanurSocialsNavbar extends Migration
{
    public function up()
    {
        Schema::table('ceylanur_socials_navbar', function($table)
        {
            $table->dropColumn('facebook');
            $table->dropColumn('tiktok');
            $table->dropColumn('telegram');
            $table->dropColumn('youtube');
            $table->dropColumn('whatsapp');
        });
    }
    
    public function down()
    {
        Schema::table('ceylanur_socials_navbar', function($table)
        {
            $table->string('facebook', 255)->nullable();
            $table->string('tiktok', 255)->nullable();
            $table->string('telegram', 255)->nullable();
            $table->string('youtube', 255)->nullable();
            $table->string('whatsapp', 255)->nullable();
        });
    }
}
