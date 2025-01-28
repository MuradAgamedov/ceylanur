<?php namespace Ceylanur\Messages\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCeylanurMessagesOrderForm2 extends Migration
{
    public function up()
    {
        Schema::table('ceylanur_messages_order_form', function($table)
        {
            $table->integer('nest_left')->nullable();
            $table->integer('nest_right')->nullable();
            $table->integer('parent_id')->nullable();
            $table->integer('nest_depth')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('ceylanur_messages_order_form', function($table)
        {
            $table->dropColumn('nest_left');
            $table->dropColumn('nest_right');
            $table->dropColumn('parent_id');
            $table->dropColumn('nest_depth');
        });
    }
}
