<?php

namespace App\Http\Controllers;

use App\MaterialStatistic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use DB;
use Carbon\Carbon;

class ApiChart extends Controller
{
    public function index()
    {

    }

    /*
     * Api Chart
     * Untuk RETURN Barang
     * */
    public function return(){
        $result=DB::table('material_statistic')
            ->join('type','material_statistic.type','=','type.id')
            ->where('type.name','=', 'return')
            ->orderBy('material_statistic.created_at', 'desc')
            ->get();

        if(!$result){
            return response()->json([
                'status'    => false,
                'message' => 'error , no data'
            ],404);
        }else{
            return $result;
        }
    }

    // chart dg limit
    public function returnLimit($limit){
        $result=DB::table('material_statistic')
            ->join('type','material_statistic.type','=','type.id')
            ->orderBy('material_statistic.created_at', 'desc')
            ->take($limit)
            ->get();

        if(!$result){
            return response()->json([
                'status'    => false,
                'message' => 'error , no data'
            ],404);
        }else{
            return $result;
        }
    }

    // chart 1 bulan terakhir
    public function returnMonth(){
        $result=DB::table('material_statistic')
            ->join('type','material_statistic.type','=','type.id')
            ->where( 'material_statistic.created_at', '>', Carbon::now()->subDays(30))
            ->orderBy('material_statistic.created_at', 'desc')
            ->get();

        if(!$result){
            return response()->json([
                'status'    => false,
                'message' => 'error , no data'
            ],404);
        }else{
            return $result;
        }
    }

    public function returnYear(){
        $result=DB::table('material_statistic')
            ->join('type','material_statistic.type','=','type.id')
            ->where( 'material_statistic.created_at', '>', Carbon::now()->subDays(365))
            ->orderBy('material_statistic.created_at', 'desc')
            ->get();

        if(!$result){
            return response()->json([
                'status'    => false,
                'message' => 'error , no data'
            ],404);
        }else{
            return $result;
        }
    }

    public function returnMonthLimit($limit){
        $result=DB::table('material_statistic')
            ->join('type','material_statistic.type','=','type.id')
            ->where( 'material_statistic.created_at', '>', Carbon::now()->subDays(30))
            ->orderBy('material_statistic.created_at', 'desc')
            ->take($limit)
            ->get();

        if(!$result){
            return response()->json([
                'status'    => false,
                'message' => 'error , no data'
            ],404);
        }else{
            return $result;
        }
    }

    public function returnYearLimit($limit){
        $result=DB::table('material_statistic')
            ->join('type','material_statistic.type','=','type.id')
            ->where( 'material_statistic.created_at', '>', Carbon::now()->subDays(365))
            ->orderBy('material_statistic.created_at', 'desc')
            ->take($limit)
            ->get();

        if(!$result){
            return response()->json([
                'status'    => false,
                'message' => 'error , no data'
            ],404);
        }else{
            return $result;
        }
    }

    public function returnDate($date){
        $result=DB::table('material_statistic')
            ->join('type','material_statistic.type','=','type.id')
            ->where( 'material_statistic.created_at', '>', Carbon::parse($date))
            ->orderBy('material_statistic.created_at', 'desc')
            ->get();

        if(!$result){
            return response()->json([
                'status'    => false,
                'message' => 'error , no data'
            ],404);
        }else{
            return $result;
        }
    }

    public function returnRange($one,$two){
        $result=DB::table('material_statistic')
            ->join('type','material_statistic.type','=','type.id')
            ->where('type.name','=', 'return')
            ->where('material_statistic.created_at', '>=', Carbon::parse($one))
            ->where('material_statistic.created_at', '<=', Carbon::parse($two))
            ->orderBy('material_statistic.created_at', 'desc')
            ->get();

        if(!$result){
            return response()->json([
                'status'    => false,
                'message' => 'error , no data'
            ],404);
        }else{
            return $result;
        }
    }


    /*
     * CHART TELARIS
     * */
    public function mostWanted(){
        $result=0;
        if(!$result){
            return response()->json([
                'status'    => false,
                'message' => 'error , no data'
            ],404);
        }else{
            return $result;
        }
    }

    public function mostWantedLimit($limit){
        $result = 0;
        if(!$result){
            return response()->json([
                'status'    => false,
                'message' => 'error , no data'
            ],404);
        }else{
            return $result;
        }
    }

    public function mostWantedMonth($id){
        $result = 0;
        if(!$result){
            return response()->json([
                'status'    => false,
                'message' => 'error , no data'
            ],404);
        }else{
            return $result;
        }
    }

    public function mostWantedYear($id){
        $result = 0;
        if(!$result){
            return response()->json([
                'status'    => false,
                'message' => 'error , no data'
            ],404);
        }else{
            return $result;
        }
    }

    public function mostWantedMonthLimit($id,$limit){
        $result = 0;
        if(!$result){
            return response()->json([
                'status'    => false,
                'message' => 'error , no data'
            ],404);
        }else{
            return $result;
        }
    }

    public function mostWantedYearLimit($id,$limit){
        $result = 0;
        if(!$result){
            return response()->json([
                'status'    => false,
                'message' => 'error , no data'
            ],404);
        }else{
            return $result;
        }
    }

    public function mostWantedDate($date){
        $result = 0;
        if(!$result){
            return response()->json([
                'status'    => false,
                'message' => 'error , no data'
            ],404);
        }else{
            return $result;
        }
    }

    public function mostWantedRange($one,$two){
        $result = 0;
        if(!$result){
            return response()->json([
                'status'    => false,
                'message' => 'error , no data'
            ],404);
        }else{
            return $result;
        }
    }

    /*
     *
     * */
    public function byDate(){

        $result=DB::table('material_statistic')
            ->join('type','material_statistic.type','=','type.id')
            ->where( 'material_statistic.created_at', '=', Carbon::now())
            ->orderBy('material_statistic.created_at', 'desc')
            ->get();

        if(!$result){
            return response()->json([
                'status'    => false,
                'message' => 'error , no data'
            ],404);
        }else{
            return $result;
        }
    }

    public function byDateType($id){
        $result=DB::table('material_statistic')
            ->join('type','material_statistic.type','=','type.id')
            ->where('material_statistic.created_at', '=', Carbon::now())
            ->where('type.id','=',$id)
            ->orderBy('material_statistic.created_at', 'desc')
            ->get();

        if(!$result){
            return response()->json([
                'status'    => false,
                'message' => 'error , no data'
            ],404);
        }else{
            return $result;
        }
    }

    // eror -> hasil
    public function byDateMaterial($id){
        $result=DB::table('material_statistic')
            ->join('material','material_statistic.material','=','material.id')
            ->where('material_statistic.created_at', '=', Carbon::now())
            ->where('material.id','=',$id)
            ->orderBy('material_statistic.created_at', 'desc')
            ->get();

        if(!$result){
            return response()->json([
                'status'    => false,
                'message' => 'error , no data'
            ],404);
        }else{
            return $result;
        }
    }

    /*
     *
     * */

    public function material($id){
        $result = MaterialStatistic::where('material',$id)
            ->orderBy('created_at', 'DESC')
            ->get();

        if(!$result){
            return response()->json([
                'status'    => false,
                'message' => 'error , no data'
            ],404);
        }else{
            return $result;
        }
    }

    public function materialLimit($id,$limit){
        $result = MaterialStatistic::where('material',$id)
            ->orderBy('created_at', 'DESC')
            ->take($limit)
            ->get();
        if(!$result){
            return response()->json([
                'status'    => false,
                'message' => 'error , no data'
            ],404);
        }else{
            return $result;
        }
    }

    public function materialType($id,$type){
        $result=DB::table('material_statistic')
            ->join('type','material_statistic.type','=','type.id')
            ->where(['material.id','=',$id],['type.id','=',$id])
            ->orderBy('created_at', 'desc')
            ->get();

        if(!$result){
            return response()->json([
                'status'    => false,
                'message' => 'error , no data'
            ],404);
        }else{
            return $result;
        }
    }

    public function materialDate($id,$date){
        $result=DB::table('material_statistic')
            ->join('type','material_statistic.type','=','type.id')
            ->where(['created_at', '>', Carbon::parse($date)],['material.id','=',$id])
            ->orderBy('created_at', 'desc')
            ->get();

        if(!$result){
            return response()->json([
                'status'    => false,
                'message' => 'error , no data'
            ],404);
        }else{
            return $result;
        }
    }

    public function materialRange($id,$one,$two){
        $result=DB::table('material_statistic')
            ->where(['created_at', '>', Carbon::parse($one)],['created_at', '<', Carbon::parse($two)],['material','=',$id])
            ->orderBy('created_at', 'desc')
            ->get();

        if(!$result){
            return response()->json([
                'status'    => false,
                'message' => 'error , no data'
            ],404);
        }else{
            return $result;
        }
    }



}
