<?php namespace Ceylanur\Socials\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCeylanurSocialsNavbar2 extends Migration
{
    public function up()
    {
        Schema::table('ceylanur_socials_navbar', function($table)
        {
            $table->integer('instragram_seen')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('ceylanur_socials_navbar', function($table)
        {
            $table->dropColumn('instragram_seen');
        });
    }
}
