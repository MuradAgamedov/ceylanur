<?php namespace Ceylanur\Socials\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCeylanurSocialsContactForm2 extends Migration
{
    public function up()
    {
        Schema::table('ceylanur_socials_contact_form', function($table)
        {
            $table->integer('twitter_seen')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('ceylanur_socials_contact_form', function($table)
        {
            $table->dropColumn('twitter_seen');
        });
    }
}
