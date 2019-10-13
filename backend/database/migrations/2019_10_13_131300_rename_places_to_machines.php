<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class RenamePlacesToMachines extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    private $from = "places";
    private $to = "machines";

    public function up()
    {
        Schema::rename($this->from, $this->to);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename($this->to, $this->from);
    }
}
