<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('email')->unique()->index();
            $table->tinyInteger('role');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // $data = array(
        //     array('id'=>1, 'first_name' => 'Daniyar', 'last_name'=>'Islamgaliyev', 'email'=>'test@gmail.com', 'role'=>1, 'password'=>'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm'),
        //     array('id'=>2, 'first_name' => 'Aydos', 'last_name'=>'Kuanyshev', 'email'=>'test1@gmail.com', 'role'=>1, 'password'=>'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm'),
        //     array('id'=>3, 'first_name' => 'Askhat', 'last_name'=>'Baltabayev', 'email'=>'test2@gmail.com', 'role'=>0, 'password'=>'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm'),
        //     array('id'=>4, 'first_name' => 'Daniyar', 'last_name'=>'Askarov', 'email'=>'test3@gmail.com', 'role'=>0, 'password'=>'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm'),
        //     array('id'=>5, 'first_name' => 'Abay', 'last_name'=>'Kappassov', 'email'=>'test4@gmail.com', 'role'=>0, 'password'=>'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm'),
        //     array('id'=>6, 'first_name' => 'Baurzhan', 'last_name'=>'Baibek', 'email'=>'test5@gmail.com', 'role'=>0, 'password'=>'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm'),
        //     array('id'=>7, 'first_name' => 'Nursultan', 'last_name'=>'Nazarbayev', 'email'=>'test6@gmail.com', 'role'=>0, 'password'=>'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm'),

        // );

        // DB::table('users')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
