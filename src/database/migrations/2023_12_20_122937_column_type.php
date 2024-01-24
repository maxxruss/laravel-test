<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Types;
use Ramsey\Uuid\Uuid;

class ColumnType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('types2');
        Schema::dropIfExists('types');

        Schema::create('types', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            // Столбец `created_at` будет установлен текущей меткой времени при вставке
            $table->timestamps();

            // Дополнительно указываем, что столбец `updated_at` также будет использовать текущую метку времени при обновлении
            $table->timestamp('custom_updated_at')->useCurrentOnUpdate()->useCurrent();
            $table->integer('age');
            // $table->integer('integer')->storedAs('age * 2');
            // $table->increments('id');
            // $table->tinyIncrements('id');
            // $table->bigIncrements('id');
            // $table->bigInteger('bigInteger');
            // $table->binary('binary');
            // $table->boolean('boolean');
            // $table->char('char_100', 100);
            // $table->dateTimeTz('dateTimeTz', $precision = 0);
            // $table->dateTime('dateTime', $precision = 0);
            // $table->date('date');
            // $table->decimal('decimal', 8, 2);
            // $table->double('double', 8, 2);
            // $table->enum('enum', ['easy', 'hard']);
            // $table->enum('status', ['active', 'inactive', 'pending']);
            // $table->float('float', 8, 2);
            // $table->foreignId('foreignId');
            // $table->foreignIdFor(User::class);
            // $table->foreignUuid('foreignUuid');
            // $table->geometryCollection('geometryCollection');
            // $table->geometry('geometry');
            // $table->integer('integer');
            // $table->ipAddress('ipAddress');
            // $table->json('json');
            // $table->jsonb('jsonb');
            // $table->jsonb('jsonb');
            // $table->lineString('lineString');
            // $table->longText('longText');
            // $table->macAddress('macAddress');
            // $table->mediumInteger('mediumInteger');
            // $table->mediumText('mediumText');
            // $table->morphs('morphs');
            // $table->multiLineString('multiLineString');
            // $table->multiPoint('multiPoint');
            // $table->multiPolygon('multiPolygon');
            // $table->nullableTimestamps(2);
            // $table->nullableMorphs('nullableMorphs');
            // $table->nullableUuidMorphs('nullableUuidMorphs');
            // $table->point('point');
            // $table->polygon('polygon');
            // $table->rememberToken();
            // $table->set('set', ['strawberry', 'vanilla']);
            // $table->smallInteger('smallInteger');
            // $table->softDeletesTz($column = 'softDeletesTz', $precision = 0);
            // $table->softDeletes();
            // $table->string('string', 100);
            // $table->text('text');
            // $table->timeTz('timeTz', $precision = 3);
            // $table->time('time', $precision = 3);
            // $table->timestampsTz($precision = 4);
            // $table->timestampTz('timestampTz', $precision = 2)->nullable();
            // $table->timestamps($precision = 0);
            // $table->timestamp('timestamp', $precision = 4)->nullable();
            // $table->tinyInteger('tinyInteger');
            // $table->tinyText('tinyText');
            // $table->unsignedBigInteger('unsignedBigInteger');
            // $table->unsignedDecimal('unsignedDecimal', $precision = 8, $scale = 2);
            // $table->unsignedInteger('unsignedInteger');
            // $table->unsignedMediumInteger('unsignedMediumInteger');
            // $table->unsignedSmallInteger('unsignedSmallInteger');
            // $table->unsignedTinyInteger('unsignedTinyInteger');
            // $table->uuidMorphs('uuidMorphs');
            // $table->uuid('uuid');
            // $table->uuid('id')->primary();
            // $table->year('year');
        });

        // $uuid = Uuid::uuid4()->toString();

        $insert = [
            'age' => 3
        ];

        DB::table('types')->insert($insert);

        // Schema::table('types', function (Blueprint $table) {
        //     $table->string('column_2')->first();            
        // });

        Schema::create('types2', function (Blueprint $table) {
            $table->id();
            // $table->bigIncrements('id');
            // $table->boolean('boolean');
            // $table->increments('id');
            // $table->mediumIncrements('id');
            // $table->smallIncrements('smallIncrements');
            // $table->tinyIncrements('tinyIncrements');
            // $table->timestampTz('timestampTz', $precision = 0);
            // $table->foreignId('types_id')->constrained('types');
            // $table->foreignId('types_id')->constrained('types');
            // $table->foreignIdFor(Types::class)->constrained('types');
            // $table->foreignUuid('fias_id')->constrained('types');
            // $table->timestamp('timestamp', $precision = 0);
            // $table->set('permissions', ['read', 'write', 'delete']);
        });

        // $insert = [
        //     'jsonb' => '{"key": "value", "array": [1, 2, 3]}'
        // ];

        // DB::table('types2')->insert($insert);

        // ==================================================================

        // Получение конкретного продукта
        // $product = Types::find(1);

        // // Извлечение данных из поля options
        // $options = $product->json; // Получаем ассоциативный массив

        // // Вывод конкретного значения из options
        // echo $options['key']; // Выведет значение ключа 'key'

        // Использование json (менее эффективно)
        // $productsJSON = Types::whereJsonContains('json->key', 'value')->get()->toArray();

        // Использование jsonb (более эффективно)
        // $productsJSONB = Types::whereRaw('jsonb->>key', 'value1')->get()->toArray();

        // var_dump('productsJSON: ', $productsJSON);
        // var_dump('productsJSONB: ', $productsJSONB);
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
