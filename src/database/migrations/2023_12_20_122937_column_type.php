<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class ColumnType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::dropIfExists('types');


        Schema::create('types', function (Blueprint $table) {
            $table->bigIncrements('bigIncrements');
            $table->bigInteger('bigInteger');
            $table->binary('binary');
            $table->boolean('boolean');
            $table->char('char_100', 100);
            $table->dateTimeTz('dateTimeTz', $precision = 0);
            $table->dateTime('dateTime', $precision = 0);
            $table->date('date');
            $table->decimal('decimal', $precision = 8, $scale = 2);
            $table->double('double', 8, 2);
            $table->enum('enum', ['easy', 'hard']);
            $table->float('float', 8, 2);
            $table->foreignId('foreignId');
            $table->foreignIdFor(User::class);
            $table->foreignUuid('foreignUuid');
            $table->geometryCollection('geometryCollection');
            $table->geometry('geometry');
            $table->integer('integer');
            $table->ipAddress('ipAddress');
            $table->json('json');
            $table->jsonb('jsonb');
            $table->lineString('lineString');
            $table->longText('longText');
            $table->macAddress('macAddress');
            $table->mediumInteger('mediumInteger');
            $table->mediumText('mediumText');
            $table->morphs('morphs');
            $table->multiLineString('multiLineString');
            $table->multiPoint('multiPoint');

            $table->multiPolygon('multiPolygon');
            $table->nullableTimestamps(0);
            $table->nullableMorphs('nullableMorphs');
            $table->nullableUuidMorphs('nullableUuidMorphs');
            $table->point('point');
            $table->polygon('polygon');
            $table->rememberToken();
            $table->set('set', ['strawberry', 'vanilla']);
            $table->smallInteger('smallInteger');
            $table->softDeletesTz($column = 'softDeletesTz', $precision = 0);
            $table->softDeletes($column = 'softDeletes', $precision = 0);
            $table->string('string', 100);
            $table->text('text');
            $table->timeTz('timeTz', $precision = 0);
            $table->time('time', $precision = 0);
            // $table->timestampsTz($precision = 0);
            // $table->timestamps($precision = 0);
            $table->tinyInteger('tinyInteger');
            $table->tinyText('tinyText');
            $table->unsignedBigInteger('unsignedBigInteger');
            $table->unsignedDecimal('unsignedDecimal', $precision = 8, $scale = 2);
            $table->unsignedInteger('unsignedInteger');
            $table->unsignedMediumInteger('unsignedMediumInteger');
            $table->unsignedSmallInteger('unsignedSmallInteger');
            $table->unsignedTinyInteger('unsignedTinyInteger');
            $table->uuidMorphs('uuidMorphs');
            $table->uuid('uuid');
            $table->year('year');
        });

        Schema::create('types2', function (Blueprint $table) {
            $table->id();
            // $table->increments('id');
            // $table->mediumIncrements('id');
            // $table->smallIncrements('smallIncrements');
            // $table->tinyIncrements('tinyIncrements');
            $table->timestampTz('timestampTz', $precision = 0);
            $table->timestamp('timestamp', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('types2');
        Schema::dropIfExists('types');
    }
}
