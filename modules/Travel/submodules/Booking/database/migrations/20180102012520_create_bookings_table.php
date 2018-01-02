<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Pluma\Support\Migration\Migration;
use Phinx\Migration\AbstractMigration;

class CreateBookingsTable extends Migration
{
    /**
     * The table name.
     *
     * @var string
     */
    protected $tablename = 'bookings';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if ($this->schema->hasTable($this->tablename)) {
            return;
        }

        $this->schema->create($this->tablename, function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('code');
            $table->string('price');
            $table->text('feature')->nullable();
            $table->text('cover')->nullable();
            $table->text('body')->nullable();
            $table->text('delta')->nullable();
            $table->text('map')->nullable();
            $table->text('map_instructions')->nullable();
            $table->string('rating', 11)->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('budget_id')->unsigned()->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('budget_id')->references('id')->on('budgets');
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
