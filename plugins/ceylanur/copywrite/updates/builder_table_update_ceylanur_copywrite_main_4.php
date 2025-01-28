<?php namespace Ceylanur\Copywrite\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCeylanurCopywriteMain4 extends Migration
{
    public function up()
    {
        Schema::table('ceylanur_copywrite_main', function($table)
        {
            $table->integer('status')->nullable();
            $table->integer('nest_right')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('ceylanur_copywrite_main', function($table)
        {
            $table->dropColumn('status');
            $table->integer('nest_right')->nullable(false)->change();
        });
    }
}
