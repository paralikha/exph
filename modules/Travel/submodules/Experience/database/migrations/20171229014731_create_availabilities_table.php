<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Pluma\Support\Migration\Migration;
use Phinx\Migration\AbstractMigration;

class CreateAvailabilitiesTable extends Migration
{
    /**
     * The table name.
     *
     * @var string
     */
    protected $tablename = 'availabilities';

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
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->datetime('date_start');
            $table->datetime('date_end');
            $table->integer('days')->nullable();
            $table->integer('available_id')->unsigned();
            $table->string('available_type')->nullable();
            $table->timestamps();
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
