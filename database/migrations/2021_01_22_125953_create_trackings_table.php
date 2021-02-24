<?php use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackingsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('trackings', function (Blueprint $table) {
                $table->id();
                $table->foreignId('rw_id')->constrained('rws')->onUpdate('cascade')->onDelete('cascade');
                $table->string('positif');
                $table->string('sembuh');
                $table->string('meninggal');
                $table->date('tanggal');
                $table->timestamps();
            }

        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema: :dropIfExists('trackings');
    }
}
