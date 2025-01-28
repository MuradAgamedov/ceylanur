<?php namespace Ceylanur\Messages\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateCeylanurMessagesContact2 extends Migration
{
    public function up()
    {
        Schema::table('ceylanur_messages_contact', function($table)
        {
            $table->renameColumn('message', 'mess');
        });
    }
    
    public function down()
    {
        Schema::table('ceylanur_messages_contact', function($table)
        {
            $table->renameColumn('mess', 'message');
        });
    }
}
