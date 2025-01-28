<?php namespace Ceylanur\Copywrite\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCeylanurCopywriteMain extends Migration
{
    public function up()
    {
        Schema::rename('ceylanur_copywrite_', 'ceylanur_copywrite_main');
    }
    
    public function down()
    {
        Schema::rename('ceylanur_copywrite_main', 'ceylanur_copywrite_');
    }
}
