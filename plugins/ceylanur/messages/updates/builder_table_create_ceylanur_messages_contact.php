<?php namespace Ceylanur\Messages\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateCeylanurMessagesContact extends Migration
{
    public function up()
    {
        Schema::create('ceylanur_messages_contact', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('name')->nullable();
            $table->string('client_email')->nullable();
            $table->text('message')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ceylanur_messages_contact');
    }
}
