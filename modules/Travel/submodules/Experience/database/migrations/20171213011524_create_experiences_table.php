<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Pluma\Support\Migration\Migration;
use Phinx\Migration\AbstractMigration;

class CreateExperiencesTable extends Migration
{
    /**
     * The table name.
     *
     * @var string
     */
    protected $tablename = 'experiences';

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
            $table->text('reference_number');
            $table->string('price');
            $table->timestamp('date_start');
            $table->timestamp('date_end');
            $table->text('feature')->nullable();
            $table->text('cover')->nullable();
            $table->text('body')->nullable();
            $table->text('delta')->nullable();
            $table->string('map')->nullable();
            $table->text('map_instructions')->nullable();
            $table->string('rating', 11)->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned()->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');
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
