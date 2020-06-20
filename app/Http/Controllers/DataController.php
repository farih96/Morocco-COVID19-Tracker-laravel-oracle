<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDO;

class DataController extends Controller
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = DB::getPdo();
    }

    public function index()
    {
        $total_cases = self::total_cases();
        $last_7days_cases = self::last_7days_cases();
        $last_7days_cases = array_reverse($last_7days_cases);
        $cases_per_region = self::cases_per_region();

      //  dd($last_7days_cases);
        // dd($total_cases);
        return view('welcome')->with(['total_cases'=>$total_cases,'last_7days_cases'=>$last_7days_cases,'cases_per_region'=>$cases_per_region]);
    }

    public function regiondetails($id){
        $region_cases = self::region_cases($id);
        $cases_per_city =self::region_cases_per_city($id);
        return ['region_cases'=>$region_cases,'cases_per_city'=>$cases_per_city];
    }

    public function total_cases(){
        $result = DB::selectOne("SELECT SUM(CONFIRMED) as CONFIRMED, SUM(DEATHS) as DEATHS , SUM(RECOVERED) as RECOVERED , MAX(DAY) as DAY FROM CASES");
        return $result;
    }
    public function cases_per_region()
    {
        $i = 1;
        $result = array();
        do {
            $result[] = self::region_cases($i);
            $i++;
        } while ($i < 13);
        return $result;
    }

    public function region_cases($id_region)
    {


        $stmt = $this->pdo->prepare("SELECT SUM(CONFIRMED) as CONFIRMED, SUM(DEATHS) as DEATHS, SUM(RECOVERED) as RECOVERED, MAX(DAY) as DAY, NAME
         FROM CASES, REGIONS WHERE REGION_ID = :id_region AND REGIONS.ID = :id_region GROUP BY NAME");
        $stmt->bindParam(':id_region', $id_region);

        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;

    }

    public function region_cases_per_city($id_region)
    {
        $stmt = $this->pdo->prepare("SELECT
                                        SUM(confirmed) as confirmed,
                                        SUM(deaths) as deaths,
                                        SUM(recovered) as recovered,
                                        name
                                    FROM
                                        cases,
                                        villes
                                    WHERE
                                        cases.ville_id = villes.id
                                        AND cases.region_id = :id_region
                                    GROUP BY
                                        name");

        $stmt->bindParam(':id_region', $id_region);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $row;

    }

    public function last_7days_cases()
    {
        $result = DB::select("SELECT
                                                trunc(day) as day,
                                                SUM(confirmed) as confirmed,
                                                SUM(deaths) as deaths,
                                                SUM(recovered) as recovered
                                            FROM
                                                cases
                                            GROUP BY
                                                trunc(day)
                                            ORDER BY
                                                trunc(day) desc
                                            FETCH FIRST 7 ROWS ONLY");
        return $result;
    }
}
