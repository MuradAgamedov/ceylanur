<?php namespace Ceylanur\Socials\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCeylanurSocialsFooter extends Migration
{
    public function up()
    {
        Schema::table('ceylanur_socials_footer', function($table)
        {
            $table->integer('tiktok_seen')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('ceylanur_socials_footer', function($table)
        {
            $table->dropColumn('tiktok_seen');
        });
    }
}
