<?php namespace Ceylanur\About\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCeylanurAboutMain extends Migration
{
    public function up()
    {
        Schema::table('ceylanur_about_main', function($table)
        {
            $table->renameColumn('second_desc', 'second_text');
        });
    }
    
    public function down()
    {
        Schema::table('ceylanur_about_main', function($table)
        {
            $table->renameColumn('second_text', 'second_desc');
        });
    }
}
