<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class Data
{
    public static function allData()
    {
        return Session::get('bucket_game');
    }
    public static function store_data(array $bucketVolumes, array $ballVolumes, )
    {
        Session::put('bucket_game', [
            "buckets"=>$bucketVolumes,
            "balls"=>$ballVolumes
        ]);
    }
    public static function make_suggestion(array $ballVolumes)
    {

        $all = Session::get('bucket_game');
        if (is_null($all)) {
            throw new Exception();
        }
        $balls = Data::getBalls();
        $buckets = Data::getBuckets();
        $bucketsID = ["A","B","C","D","E"];
        $all["current_suggestion"]["suggestion"] = $ballVolumes;

        foreach ($ballVolumes as $key => $ballNumber) {
            $volumeOfCurrentBall =$balls[$key];
            $currentBallNumber = $ballNumber;
            if ($currentBallNumber==0) {
                continue;
            }
            foreach ($bucketsID as $keyBucket) {
                if ($buckets[$keyBucket]["empty"]==0) {
                    continue;
                }
                $result = Data::canPlace($buckets[$keyBucket]["empty"],$volumeOfCurrentBall,$currentBallNumber);
                $numberToUseForThisBucket = $result;
                $all["current_suggestion"]["results"][$keyBucket][] = [
                    "key"=>$key,
                    "value"=>$numberToUseForThisBucket
                ];
                $value = $numberToUseForThisBucket*$volumeOfCurrentBall;
                $buckets[$keyBucket]["empty"] = $buckets[$keyBucket]["empty"] - $value;
                $buckets[$keyBucket]["used"] = $buckets[$keyBucket]["used"] + $value;
                $currentBallNumber -= $numberToUseForThisBucket;
                if ($currentBallNumber==0) {
                    break;
                }
            }

            if ($currentBallNumber>0) {
                $all["current_suggestion"]["results"]["cannot"][] = [
                    "key"=>$key,
                    "value"=>$currentBallNumber
                ];
            }
        }
        Session::put('bucket_game',$all);
    }

    public static function canPlace($bucketVolume,$ballVolume,$ballNumber) : int {
        $result = $bucketVolume/($ballVolume*$ballNumber);
        if ($result >= 1) {
            return $ballNumber;
        }else{
            return $bucketVolume/((1-$result) * ($ballVolume*$ballNumber));
        }
    }

    public static function getBuckets()
    {
        $data = Data::allData();
        if (is_null($data)) {
            return null;
        }
        return $data["buckets"];
    }

    public static function currentSuggestion()
    {
        $data = Data::allData();
        if (is_null($data)) {
            return null;
        }
        return array_key_exists("current_suggestion",$data) && !is_null($data["current_suggestion"]) ? $data["current_suggestion"] : null;
    }

    public static function getBalls()
    {
        $data = Data::allData();
        if (is_null($data)) {
            return null;
        }
        return $data["balls"];
    }
}
