<?php namespace Ceylanur\Messages\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateCeylanurMessagesOrderForm extends Migration
{
    public function up()
    {
        Schema::create('ceylanur_messages_order_form', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('client_email')->nullable();
            $table->string('tel')->nullable();
            $table->string('genre')->nullable();
            $table->string('technique')->nullable();
            $table->text('description')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ceylanur_messages_order_form');
    }
}
