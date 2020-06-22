<?php
/*
 * @IsmailBouaza
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;
use App\Ville;
use App\Cases;
use Illuminate\Support\Facades\DB;

use PDO;

class AdminController extends Controller
{
    protected $pdo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->pdo = DB::getPdo();
    }


    public function home()
    {

        $date = date('Y-m-d');
        $caseTest = Cases::whereDate('DAY', '=', $date)->exists();

        return View('admin')->with('caseTest',$caseTest);
    }

    public function addRecord()
    {

        $regions = DB::select("SELECT * FROM regions");
        $cities = DB::select("SELECT * FROM villes ");

        return view('addRecord')->with(['regions'=>$regions,'cities'=>$cities]);


    }

    public function store(Request $request)
    {
        $request->validate([

            'CONFIRMED' => 'required|numeric',
            'DEATHS' => 'required|numeric',
            'RECOVERED' => 'required|numeric',
            'ville_id' => 'required|numeric',
            'region_id' => 'required|numeric',
            'DAY' => 'required|date',
        ]);

        $case =  new Cases;

        $case->CONFIRMED=$request->CONFIRMED;
        $case->DEATHS=$request->DEATHS;
        $case->RECOVERED=$request->RECOVERED;
        $case->DAY=$request->DAY;
        $case->ville_id=$request->ville_id;
        $case->region_id=$request->region_id;
        $case->save();

        return redirect('/addRecord');


    }

    public function list()
    {

        $regions = DB::select("SELECT * FROM regions");
        $cities = DB::select("SELECT * FROM villes ");

        $cases = Cases::whereDate('DAY', date("Y-m-d"))->get();

        $cases = $cases->toArray();

        return view('updateRecord')->with([
            'cases' => $cases,
            'cities' => $cities,
            'regions' => $regions,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request)
    {
        $id = $request->input('case_id');

        $CONFIRMED=$request->input('confirmed');
        $DEATHS= $request->input('deaths');
        $RECOVERED= $request->input('recovered');

        // calling updatecase procedure from database
        $stmt = $this->pdo->prepare("begin updatecase(:id, :c, :r, :d); end;");

        $stmt->bindParam(':c', $CONFIRMED);
        $stmt->bindParam(':r', $RECOVERED);
        $stmt->bindParam(':d', $DEATHS);
        $stmt->bindParam(':id', $id);

        $check = $stmt->execute();
        return $check;


    }

}
