<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ad_id')->index();
            $table->string('photo_url', 255)->unique();
            $table->timestamps();


            $table->foreign('ad_id')->references('id')->on('ads');

        });

           $data = array(
                array('ad_id'=>1, 'photo_url'=> 'http://www.kvsspb.ru/upload/img/s_otdelkoy/janino/8.jpg'),
                array('ad_id'=>1, 'photo_url'=> 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQF4tsczGYW8d9rXO0PQFX2ZCW5Dprn61hd2GbqcCgvjmt3IcaJ'),
                array('ad_id'=>2, 'photo_url'=> 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSHgIzwcnpaqwvfLL8MnzHQxGe-Zc1qyNoTxWdZabLJfp6faV4E'),
                array('ad_id'=>3, 'photo_url'=> 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQDzRERu9sS8EreQiIWJo8HSpPveXjhrsfaiw9oo-pAMjyjvbd8'),
                array('ad_id'=>3, 'photo_url'=> 'https://avatars.mds.yandex.net/get-pdb/251121/1413888d-3932-4cbd-8e20-e51827e53ae4/s800'),
                array('ad_id'=>3, 'photo_url'=> 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR2yjDVYQ4agiml-miCuRPKTQ5E8sQw9Np8DE7BbbBhQvy2gXjU'),
                array('ad_id'=>4, 'photo_url'=> 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR1Yu0Mm76TcIKBRiRaM1goUPoVR1IlCGyX5nHSz1jbssGY00Xo'),
                array('ad_id'=>4, 'photo_url'=> 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQr4NdTHlJyPgYFY8xhjN0NOGmnHm9u_vtqxzYWpYPdFvvTxrlU2g'),
                array('ad_id'=>5, 'photo_url'=> 'http://www.fainaidea.com/wp-content/uploads/2015/11/kvartira5.gif'),
                array('ad_id'=>6, 'photo_url'=> 'https://i.ytimg.com/vi/zYYBm57zMfQ/maxresdefault.jpg'),
                array('ad_id'=>7, 'photo_url'=> 'http://ust-kamenogorsk.vsesdelki.kz/content/2016/20160810/visitor/images/201608/f20160810184847-1442562706_kvartiry-posutochno.jpg'),
                array('ad_id'=>7, 'photo_url'=> 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSzAFwPX9HjAY4xcDIYY7OUBC3du2JQCD_EBJR954mEGXQvjKX3'),
                array('ad_id'=>8, 'photo_url'=> 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRd6QEmlbe8PeLpUjIbUFQrxI28hcPP_plF_pIMpI0xhM_vsMBK'),
                array('ad_id'=>8, 'photo_url'=> 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSMMfUjsbdXKKiyrkhA9tJZWPGgLCtyFkLAWBGni2EpxTBe8TcK'),
            );

           // DB::table('photos')->insert($data);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photos');
    }
}
