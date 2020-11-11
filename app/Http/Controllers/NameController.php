<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class NameController extends Controller
{

    public function random($amount = 10)
    {
        $words = \App\Models\Word::all();

        return response()->json(['code' => '200', 'data' => $words]);
/*
        $results = app('db')->select("select * from pg_tables where schemaname='public'");

        echo implode("<br/>", $results);

        if ($amount < 1) return response()->json(['code' => '400']);
        if ($amount > 100) return response()->json(['code' => '403']);
        return response()->json(['code' => '200', 'data' => $amount]);
*/
    }

    public function createtable()
    {
        echo "Create tables ...";

        echo "<pre>";

        echo "<b>USERS</b><br/>";
        Schema::dropIfExists('users');
        Schema::create('users', function($table)
        {
            $table->increments('id');
            $table->string('email')->unique();
            $table->timestamps();
        });

        $columns = Schema::getColumnListing('users');
        print_r($columns);
        echo "<br/>";

        echo "<b>WORDS</b><br/>";
        Schema::dropIfExists('words');
        // TODO: normalize words table
        Schema::create('words', function($table)
        {
            $table->increments('id');
            $table->string('group_name');
            $table->string('word')->unique();
            $table->timestamps();
        });

        $columns = Schema::getColumnListing('words');
        print_r($columns);


        echo "</pre>";
    }

    public function droptable()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('words');
    }

    public function insertsample()
    {

        $data = array(
                    array('group_name' => 'color', 'word' => 'ablaze'),
                    array('group_name' => 'color', 'word' => 'beaming'),
                    array('group_name' => 'color', 'word' => 'bold'),
                    array('group_name' => 'color', 'word' => 'bright'),
                    array('group_name' => 'color', 'word' => 'vibrant'),
                    array('group_name' => 'adjective', 'word' => 'axiomatic'),
                    array('group_name' => 'adjective', 'word' => 'acidic'),
                    array('group_name' => 'adjective', 'word' => 'ambiguous'),
                    array('group_name' => 'adjective', 'word' => 'aquatic'),
                    array('group_name' => 'adjective', 'word' => 'auspicious'),
                );
        foreach ($data as $words) {
            $word = new \App\Models\Word;
            $word->group_name = $words['group_name'];
            $word->word = $words['word'];
            $word->save();
        }

        echo "Done";

/*
        DB::table('words')->insert(array(
            array('group_name' => 'color', 'word' => 'ablaze'),
            array('group_name' => 'color', 'word' => 'beaming'),
            array('group_name' => 'color', 'word' => 'bold'),
            array('group_name' => 'color', 'word' => 'bright'),
            array('group_name' => 'adjective', 'word' => 'axiomatic'),
            array('group_name' => 'adjective', 'word' => 'acidic'),
            array('group_name' => 'adjective', 'word' => 'ambiguous'),
            array('group_name' => 'adjective', 'word' => 'aquatic'),
            array('group_name' => 'adjective', 'word' => 'auspicious'),
        ));
        $id = DB::table('words')->insertGetId(
            array('group_name' => 'color', 'word' => 'vibrant')
        );
        echo "Last ID is $id";
*/

    }
}

//Note: 3 ways to log
//$foo = "is it work?";
//echo '<script>console.log("'.$foo.'"); </script>';
//file_put_contents('php://stderr', print_r($foo, TRUE));
//error_log($foo);

