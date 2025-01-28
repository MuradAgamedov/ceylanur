<?php namespace Ceylanur\About\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCeylanurAboutMain2 extends Migration
{
    public function up()
    {
        Schema::table('ceylanur_about_main', function($table)
        {
            $table->text('first_text_second')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('ceylanur_about_main', function($table)
        {
            $table->dropColumn('first_text_second');
        });
    }
}
