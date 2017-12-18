<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Pluma\Support\Migration\Migration;
use Phinx\Migration\AbstractMigration;

class CreateAmenityExperienceTable extends Migration
{
    /**
     * The table name.
     *
     * @var string
     */
    protected $tablename = 'amenity_experience';

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
            $table->integer('amenity_id')->unsigned();
            $table->integer('experience_id')->unsigned();

            // $table->foreign('amenity_id')->references('id')->on('amenities');
            // $table->foreign('experience_id')->references('id')->on('experiences');
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
