<?php

namespace App;

use App\User;

use Illuminate\Database\Eloquent\Model;
use DB;


class Ad extends Model{

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
     	'id', 'user_id', 'status', 'like_amount'
     ];

     public function comfort(){
        return $this->hasOne('App\Comfort');
    }

    public function mainData(){
        return $this->hasOne('App\MainData');
    }

    public function place(){
        return $this->hasOne('App\Place');
    }

    public function photos(){
        return $this->hasMany('App\Photo');
    }

    public function videos(){
        return $this->hasMany('App\Video');
    }

    
    public static function search($query = [],  $request){

        $user_id = User::getUserId();

        $region_id = $request->get('region_id');
        $city_id = $request->get('city_id');
        $district_id = $request->get('district_id');

        $house_type = $request->get('house_type');

        $price_from = $request->get('price_from');
        $price_to = $request->get('price_to');
        
        $floor_from = $request->get('floor_from');
        $floor_to = $request->get('floor_to');

        $room_from = $request->get('room_from');
        $room_to = $request->get('room_to');

        $beds_from = $request->get('beds_from');
        $beds_to = $request->get('beds_to');

        $bathroom_from = $request->get('bathroom_from');
        $bathroom_to = $request->get('bathroom_to');


        $home_phone = $request->get('home_phone');
        $wifi = $request->get('wifi');
        $cupboard = $request->get('cupboard');
        $plastic_win = $request->get('plastic_win');
        $tv = $request->get('tv');
        $washer = $request->get('washer');
        $lift = $request->get('lift');
        $kitchenware = $request->get('kitchenware');
        $iron = $request->get('iron');
        $cabel_tv = $request->get('cabel_tv');
        $parking_place = $request->get('parking_place');
        $domofon = $request->get('domofon');
        $security = $request->get('security');
        $gate = $request->get('gate');
        $street_lighting = $request->get('street_lighting');
        $fen = $request->get('fen');
        $shower_cabin = $request->get('shower_cabin');
        $bath = $request->get('bath');
        $dryer = $request->get('dryer');
        $vac = $request->get('vac');

        

        $univer = $request->get('univer');
        $grocer = $request->get('grocer');
        $school = $request->get('school');
        $playschool = $request->get('playschool');
        $hospital = $request->get('hospital');
        $sport_complex = $request->get('sport_complex');
        $mart = $request->get('mart');
        $pharmacy = $request->get('pharmacy');


        $query = DB::table('ads')->select(['ads.id', DB::raw("min(photo_url) as photo_url, array(select case when user_id = ".$user_id." then 1 end from likes where ads.id = likes.ad_id and likes.user_id = ".$user_id.") as is_like"), 'districts.district_name', 'places.address', 'main_datas.price', 'main_datas.room_amount', 'cities.city_name', 'like_amount'])
        ->leftJoin('places', 'ads.id', '=', 'places.ad_id')
        ->leftJoin('cities', 'places.city_id', '=', 'cities.id')
        ->leftJoin('districts', 'places.district_id', '=','districts.id')
        ->leftJoin('main_datas', 'ads.id', '=', 'main_datas.ad_id')
        ->leftJoin('comforts', 'ads.id', '=', 'comforts.ad_id')
        ->leftJoin('photos', 'ads.id', '=', 'photos.ad_id')
        ->leftJoin('nears', 'places.id', '=', 'nears.place_id')
        ->groupBy('ads.id', 'districts.district_name','places.address','main_datas.price', 'main_datas.room_amount', 'cities.city_name')
        ->where(function($main_data) use ($request, $region_id, $city_id, $district_id, $house_type, $price_from, $price_to, $floor_from, $floor_to, $room_from, 
            $room_to, $beds_from, $beds_to, $bathroom_from, $bathroom_to){
            if ($region_id != NULL) {
                $main_data->where('places.region_id', '=', $region_id);
            }
            if ($city_id != NULL){
                $main_data->where('places.city_id', '=', $city_id);
            }
            if ($district_id != NULL) {
                $main_data->where('places.district_id', '=', $district_id);
            }
            if($house_type != NULL){
                $main_data->where('main_datas.house_type', '=', $house_type);
            }
            if($request->has('price_from')){
                $main_data->where('main_datas.price', '>=', $price_from);
            }
            if($request->has('price_to')){
                $main_data->where('main_datas.price', '<=', $price_to);
            }
            if($request->has('floor_from')){
                $main_data->where('places.floor', '>=', $floor_from);
            }
            if($request->has('floor_to')){
                $main_data->where('places.floor', '<=', $floor_to);
            }
            if($request->has('room_from')){
                $main_data->where('main_datas.room_amount', '>=', $room_from);
            }
            if($request->has('room_to')){
                $main_data->where('main_datas.room_amount', '<=', $room_to);
            }
            if($request->has('beds_from')){
                $main_data->where('main_datas.beds_amount', '>=', $beds_from);
            }
            if($request->has('beds_to')){
                $main_data->where('main_datas.beds_amount', '<=', $beds_to);
            }
            if($request->has('bathroom_from')){
                $main_data->where('main_datas.bathroom_amount', '>=', $bathroom_from);
            }
            if($request->has('bathroom_to')){
                $main_data->where('main_datas.bathroom_amount', '<=', $bathroom_to);
            }

        })
        ->where(function($comfort) use ($request, $home_phone, $wifi, $cupboard, 
            $plastic_win, $tv, $washer, $lift, $kitchenware, $iron, $cabel_tv, 
            $parking_place, $domofon, $security, $gate, $street_lighting, $fen, 
            $shower_cabin, $bath, $dryer, $vac){
            if($request->has('home_phone')){
                $comfort->where('comforts.home_phone', '=', $home_phone);
            }
            if($request->has('wifi')){
                $comfort->where('comforts.wifi', '=', $wifi);
            }
            if($request->has('cupboard')){
                $comfort->where('comforts.cupboard', '=', $cupboard);
            }
            if($request->has('plastic_win')){
                $comfort->where('comforts.plastic_win', '=', $plastic_win);
            }
            if($request->has('tv')){
                $comfort->where('comforts.tv', '=', $tv);
            }
            if($request->has('washer')){
                $comfort->where('comforts.washer', '=', $washer);
            }
            if($request->has('lift')){
                $comfort->where('comforts.lift', '=', $lift);
            }
            if($request->has('kitchenware')){
                $comfort->where('comforts.kitchenware', '=', $kitchenware);
            }
            if($request->has('iron')){
                $comfort->where('comforts.iron', '=', $iron);
            }
            if($request->has('parking_place')){
                $comfort->where('comforts.parking_place', '=', $parking_place);
            }
            if($request->has('cabel_tv')){
                $comfort->where('comforts.cabel_tv', '=', $cabel_tv);
            }
            if($request->has('domofon')){
                $comfort->where('comforts.domofon', '=', $domofon);
            }
            if($request->has('security')){
                $comfort->where('comforts.security', '=', $security);
            }
            if($request->has('gate')){
                $comfort->where('comforts.gate', '=', $gate);
            }
            if($request->has('street_lighting')){
                $comfort->where('comforts.street_lighting', '=', $street_lighting);
            }
            if($request->has('fen')){
                $comfort->where('comforts.fen', '=', $fen);
            }
            if($request->has('shower_cabin')){
                $comfort->where('comforts.shower_cabin', '=', $shower_cabin);
            }
            if($request->has('bath')){
                $comfort->where('comforts.bath', '=', $bath);
            }
            if($request->has('dryer')){
                $comfort->where('comforts.dryer', '=', $dryer);
            }
            if($request->has('vac')){
                $comfort->where('comforts.vac', '=', $vac);
            }
        })
        ->where(function($near) use ($request, $univer,$grocer,$school,$playschool,$hospital,$sport_complex,$mart,$pharmacy){
            if($request->has('univer')){
                $near->where('nears.univer', '=', $univer);
            }  
            if($request->has('grocer')){
                $near->where('nears.grocer', '=', $grocer);
            }
            if($request->has('school')){
                $near->where('nears.school', '=', $school);
            }
            if($request->has('playschool')){
                $near->where('nears.playschool', '=', $playschool);
            }
            if($request->has('hospital')){
                $near->where('nears.hospital', '=', $hospital);
            }
            if($request->has('sport_complex')){
                $near->where('nears.sport_complex', '=', $sport_complex);
            }
            if($request->has('mart')){
                $near->where('nears.mart', '=', $mart);
            }
            if($request->has('pharmacy')){
                $near->where('nears.pharmacy', '=', $pharmacy);
            }
        })
        ->where('ads.status','=', 4)
        ->orderBy('ads.created_at', 'desc')
        ->paginate(12);

        return $query;

    }

    public static function showAdById($id){

        $user_id = User::getUserId();

        $main_data = DB::table('ads')
        ->select('ads.id', 'ads.like_amount', 'ads.created_at', 'places.address',
            'places.floor', 'places.total_floor', 'places.longitude', 'places.latitude', 'regions.region_name', 'cities.city_name', 'districts.district_name', 'main_datas.room_amount', 'main_datas.bathroom_amount', 'main_datas.beds_amount', 'main_datas.house_type', 'main_datas.house_area', 'main_datas.price')
        ->join('places', 'ads.id', '=', 'places.ad_id')
        ->join('regions', 'places.region_id', '=', 'regions.id')
        ->join('cities', 'places.city_id', '=', 'cities.id')
        ->join('districts', 'places.district_id', '=','districts.id')
        ->join('main_datas', 'ads.id', '=', 'main_datas.ad_id')
        ->where('ads.id', '=', $id)
        ->first();


        $nears = DB::table('nears')
        ->select('univer', 'grocer', 'school', 'playschool', 'hospital', 'sport_complex', 'mart', 'pharmacy')
        ->join('places', 'places.id', '=', 'nears.place_id')
        ->where('places.ad_id', '=', $id)
        ->first();

        $comforts = DB::table('comforts')
        ->select('home_phone', 'wifi', 'cupboard', 'plastic_win',
            'tv', 'washer', 'lift','kitchenware', 'iron', 'cabel_tv', 'parking_place', 'domofon', 'security', 'gate' , 'street_lighting',
            'fen', 'shower_cabin', 'bath', 'dryer', 'vac')
        ->where('comforts.ad_id', '=', $id)
        ->first();


        $photos = DB::table('photos')
        ->select('photo_url')
        ->where('photos.ad_id', '=', $id)
        ->get();

        // $likes = DB::table('likes')
        // ->select(DB::raw("array(select case when user_id = ".$user_id." then 1 end from likes where ".$id." = likes.ad_id and likes.user_id = ".$user_id.") as is_like"))
        // ->first();

        $likeCheck = DB::table('likes')
        ->where('ad_id', $id)
        ->where('user_id', $user_id)
        ->first();

        if($likeCheck == NULL){
            $is_like = false;
        } else {
            $is_like = true;
        }

        $respond = DB::table('responds')
        ->select('status')
        ->where('ad_id', $id)
        ->where('user_id', $user_id)
        ->get();


        $data['main_data'] = $main_data;
        $data['comforts'] = $comforts;
        $data['nears'] = $nears;
        $data['photos'] = $photos;
        $data['is_like'] = $is_like;
        $data['respond'] = $respond;

        return $data;

    }


    public static function currentStatus(){

        $user_id = User::getUserId();

        $current_status = DB::table('ads')
        ->where('user_id', '=', $user_id)
        ->where('status', '!=', 4)
        ->first();

        if($current_status == NULL){

            return null;

        } else if ($current_status->status == 1) {

           $main_data = DB::table('ads')
           ->join('main_datas', 'ads.id', '=', 'main_datas.ad_id')
           ->where('ads.user_id', '=', $user_id)
           ->where('ads.status', '=', $current_status->status)
           ->first();

           $data['status'] = $current_status->status;
           $data['main_data'] = $main_data;

           return $data;

        } else if ($current_status->status == 2){

        $main_data = DB::table('ads')
        ->join('main_datas', 'ads.id', '=', 'main_datas.ad_id')
        ->where('ads.user_id', '=', $user_id)
        ->where('ads.status', '=', $current_status->status)
        ->first();

        $place = DB::table('ads')
        ->join('places', 'ads.id', '=', 'places.ad_id')
        ->join('regions', 'places.region_id', '=', 'regions.id')
        ->join('cities', 'places.city_id', '=', 'cities.id')
        ->join('districts', 'places.district_id', '=','districts.id')
        ->where('ads.user_id', '=', $user_id)
        ->where('ads.status', '=', $current_status->status)
        ->first();




        $nears = DB::table('ads')
        ->select('univer', 'grocer', 'school', 'playschool', 'hospital', 'sport_complex', 'mart', 'pharmacy')
        ->join('places', 'places.ad_id', '=', 'ads.id')
        ->join('nears', 'places.id', '=', 'nears.place_id')
        ->where('ads.user_id', '=', $user_id)
        ->where('ads.status', '=', $current_status->status)
        ->first();


        $data['status'] = $current_status->status;
        $data['main_data'] = $main_data;
        $data['place'] = $place;
        $data['nears'] = $nears;

        return $data;

       } else if ($current_status->status == 3) {

        $main_data = DB::table('ads')
        ->join('main_datas', 'ads.id', '=', 'main_datas.ad_id')
        ->where('ads.user_id', '=', $user_id)
        ->where('ads.status', '=', $current_status->status)
        ->first();

        $place = DB::table('ads')
        ->join('places', 'ads.id', '=', 'places.ad_id')
        ->join('regions', 'places.region_id', '=', 'regions.id')
        ->join('cities', 'places.city_id', '=', 'cities.id')
        ->join('districts', 'places.district_id', '=','districts.id')
        ->where('ads.user_id', '=', $user_id)
        ->where('ads.status', '=', $current_status->status)
        ->first();


        $nears = DB::table('ads')
        ->select('univer', 'grocer', 'school', 'playschool', 'hospital', 'sport_complex', 'mart', 'pharmacy')
        ->join('places', 'places.ad_id', '=', 'ads.id')
        ->join('nears', 'places.id', '=', 'nears.place_id')
        ->where('ads.user_id', '=', $user_id)
        ->where('ads.status', '=', $current_status->status)
        ->first();

        $comforts = DB::table('ads')
        ->select('home_phone', 'wifi', 'cupboard', 'plastic_win',
            'tv', 'washer', 'lift','kitchenware', 'iron', 'cabel_tv', 'parking_place', 'domofon', 'security', 'gate' , 'street_lighting',
            'fen', 'shower_cabin', 'bath', 'dryer', 'vac')
        ->join('comforts', 'comforts.ad_id', '=', 'ads.id')
        ->where('ads.user_id', '=', $user_id)
        ->where('ads.status', '=', $current_status->status)
        ->first();


        $data['status'] = $current_status->status;
        $data['main_data'] = $main_data;
        $data['place'] = $place;
        $data['nears'] = $nears;
        $data['comforts'] = $comforts;

        return $data;
      } 
    }

    public static function getAllAds(){

        $landlord_id = User::getUserId();

        return DB::table('ads')
        ->select(['ads.id', 'main_datas.room_amount', 'places.address', 'ads.updated_at','ads.status', 'main_datas.house_type', DB::raw('min(photos.photo_url) as photo_url')])
        ->join('main_datas', 'ads.id', '=', 'main_datas.ad_id')
        ->join('places', 'ads.id', '=', 'places.ad_id')
        ->join('photos', 'ads.id', '=', 'photos.ad_id')
        ->groupBy('ads.id','main_datas.room_amount', 'places.address', 'ads.updated_at','ads.status', 'main_datas.house_type')
        ->where('ads.user_id', '=', $landlord_id)
        ->orderBy('ads.updated_at', 'desc')
        ->get();

    }

    public static function shortInfo($ad_id){

        return DB::table('ads')
        ->select('ads.id', 'places.address', 'main_datas.room_amount', 'main_datas.house_type', DB::raw('min(photos.photo_url) as photo_url'))
        ->join('places', 'ads.id', '=', 'places.ad_id')
        ->join('main_datas', 'ads.id', '=', 'main_datas.ad_id')
        ->join('photos', 'ads.id', '=', 'photos.ad_id')
        ->groupBy('ads.id', 'places.address', 'main_datas.room_amount', 'main_datas.house_type')
        ->where('ads.id', '=', $ad_id)
        ->get();

    }
}
