<?php namespace Ceylanur\Copywrite\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCeylanurCopywriteMain2 extends Migration
{
    public function up()
    {
        Schema::table('ceylanur_copywrite_main', function($table)
        {
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('ceylanur_copywrite_main', function($table)
        {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
            $table->dropColumn('deleted_at');
        });
    }
}
