<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Pluma\Support\Migration\Migration;
use Phinx\Migration\AbstractMigration;

class CreateDetailsTable extends Migration
{
    /**
     * The table name.
     *
     * @var string
     */
    protected $tablename = 'details';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema->create($this->tablename, function (Blueprint $table) {
            $table->increments('id');
            $table->text('value')->nullable();
            $table->integer('user_id')->unsigned();
            $table->date('birthday')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('gender')->nullable();
            $table->text('address')->nullable();
            $table->text('shirt_size')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
                  ->onUpdate('CASCADE')
                  ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->schema->dropIfExists($this->tablename);
    }
}
