<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Types;
use Ramsey\Uuid\Uuid;

class ColumnTypeTest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $update = [
            'age' => 11,
        ];

        $type_model = Types::find(1)->update($update);
        // var_dump($type_model);
        // die();




        // DB::table('types')->insert($insert);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
