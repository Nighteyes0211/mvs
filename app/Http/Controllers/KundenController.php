<?php

namespace MVS\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use MVS\Angebote;
use MVS\Kunden;
use MVS\timeline;
use Illuminate\Http\Request;
use MVS\Repayment;
use PDF;
use Auth;
use MVS\User;
use MVS\Group;
use MVS\Calculation;
use DB;

class KundenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($id=null)
    {
        // if($id==null){
        //   $user=Auth::user();
        //   $kundens = Kunden::where('user_id', $user->id)->with('myuser','myuser.mygroup')->paginate(10);
        //
        //   return view('admin.kunden.index', compact('kundens','user'));
        // } elseif ($id=='0'){
          $kundens = Kunden::with('myuser','myuser.mygroup')->paginate(10);
          $user=Auth::user();
          $user->id='0';
          return view('admin.kunden.index', compact('kundens','user'));
        // } else {
        //   $kundens = Kunden::where('user_id',$id )->with('myuser','myuser.mygroup')->paginate(10);
        //   $user=user::where("id",$id)->get();
        //   $user=$user[0];
        //   return view('admin.kunden.index', compact('kundens','user'));
        // }

    }


    /*

        Funktion das nur eingeloggte Benutzer Kunden anlegen können

    */


    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('admin.kunden.create');
    }

    public function search(Request $request)
    {

        // $kunden = \DB::table('Kundens');
        $kundens=Kunden::where('id',">",0);
        $user_id=request('user_id');

        if($user_id=='0'){
          $user=Auth::user();
          $user->id='0';
        }else{
          $kunden->where('user_id', $user_id);
          $user=user::where("id",$user_id)->get();
          $user=$user[0];
        }

        $filter_Vorname=request('filter_Vorname');

        if($filter_Vorname!="") $kundens->where('vorname', $filter_Vorname);

        $filter_Nachname=request('filter_Nachname');

        if($filter_Nachname!="") $kundens->where('nachname', $filter_Nachname);

        $filter_KundenID=request('filter_KundenID');

        if($filter_KundenID!="") $kundens->where('id', $filter_KundenID);

        $filter_Stadt=request('filter_Stadt');

        if($filter_Stadt!="") $kundens->where('wohnort', $filter_Stadt);

        $kundens=$kundens->paginate(10);

        return view('admin.kunden.index', compact('kundens','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'vorname' => 'required',
                'nachname' => 'required',
                'strasse' => 'required',
                'plz' => 'required',
                'wohnort' => 'required',
                'mail' => 'required',
                'telefon' => 'required',
                'geburtsdatum' => 'required'

            ]
        );

        $kunden = new kunden();
        $kunden->user_id = auth()->id();
        $kunden->vorname = request('vorname');
        $kunden->nachname = request('nachname');
        $kunden->strasse = request('strasse');
        $kunden->plz = request('plz');
        $kunden->wohnort = request('wohnort');
        $kunden->mail = request('mail');
        $kunden->telefon = request('telefon');
        $kunden->geburtsdatum = request('geburtsdatum');
        $kunden->save();
        return redirect()->route('kunden.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \MVS\Kunden $kunden
     * @return \Illuminate\Http\Response
     */
    public function show(Kunden $kunden)
    {
        $kunden['offer'] = Angebote::where('customer_id', $kunden->id)->get();
        $repayments = Repayment::where('kundens_id', $kunden->id)->get();

        $timeline = timeline::where('kundens_id', $kunden->id)->get();
        return view('admin.kunden.show', ['kunden' => $kunden, 'repayments' => $repayments, 'timeline' => $timeline]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \MVS\Kunden $kunden
     * @return \Illuminate\Http\Response
     */
    public function edit(Kunden $kunden)
    {
        $users = user::all();

        $Calculations = DB::table('calculation')->where('kunden_id', $kunden->id)->get();
        foreach($Calculations as &$Calculation){
            $Calculation->timeline = DB::table('timeline')->where('kundens_id', $kunden->id)->where('calculation_id', $Calculation->id)->get()->first();
        }

        return view('admin.kunden.edit', compact('kunden','users','Calculations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \MVS\Kunden $kunden
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kunden $kunden)
    {
        if ( isset($request->calculation) && $request->calculation == 'calculation' ) {
            $calData = $request->Cal;
            $cid = 0;
            // Calculation data
            // $this->validate($request->Cal,
            //     [
            //         'bank' => 'required',
            //         'annuities' => 'required',
            //         'to_interest' => 'required',
            //         'effectiveness' => 'required',
            //         'fixed_interest_rates' => 'required',
            //         'monthly_loan' => 'required',
            //         'residual_debt_interest_rate' => 'required',
            //         'calculated_luaf_time' => 'required',
            //         'net_loan_amount' => 'required',
            //         'initial_interest' => 'required',
            //         'optional_sound_recovery' => 'required'
            //     ]
            // );
            // dd($request->angebotdate);
            $usedCardId = [];
            foreach ($calData as $value) {
                // 11 fields 
                if(isset($value['id']) && $value['id'] != null && $value['id'] > 0){
                    $calCheck = DB::table('calculation')->where('id', $value['id'])->get()->first();
                    if($calCheck != null){
                        $insertData = [
                            'angebotdate' => $request->angebotdate,
                            'bank' => $value['bank'],
                            'annuities' => $value['annuities'],
                            'to_interest' => $value['to_interest'],
                            'effectiveness' => $value['effectiveness'],
                            'fixed_interest_rates' => $value['fixed_interest_rates'],
                            'monthly_loan' => $value['monthly_loan'],
                            'residual_debt_interest_rate' => $value['residual_debt_interest_rate'],
                            'calculated_luaf_time' => $value['calculated_luaf_time'],
                            'net_loan_amount' => $value['net_loan_amount'],
                            'initial_interest' => $value['initial_interest'],
                            'optional_sound_recovery' => $value['optional_sound_recovery'],
                            'prepared_by' => auth()->user()->id
                        ];
        
                        DB::table('calculation')->where('id', $value['id'])->update($insertData); 
                        $cid = $value['id']; 
                        $usedCardId[] = $cid;
                    }

                } else {
                    $insertData = [
                        'angebotdate' => $request->angebotdate,
                        'bank' => $value['bank'],
                        'kunden_id' => $request->segment(3),
                        'annuities' => $value['annuities'],
                        'to_interest' => $value['to_interest'],
                        'effectiveness' => $value['effectiveness'],
                        'fixed_interest_rates' => $value['fixed_interest_rates'],
                        'monthly_loan' => $value['monthly_loan'],
                        'residual_debt_interest_rate' => $value['residual_debt_interest_rate'],
                        'calculated_luaf_time' => $value['calculated_luaf_time'],
                        'net_loan_amount' => $value['net_loan_amount'],
                        'initial_interest' => $value['initial_interest'],
                        'optional_sound_recovery' => $value['optional_sound_recovery'],
                        'prepared_by' => auth()->user()->id
                    ];
    
                    $cid = DB::table('calculation')->insert($insertData);
                    $cid = DB::getPdo()->lastInsertId();
                    $usedCardId[] = $cid;
                }

                if (isset($value['timeline'])) {
                    if(isset($value['timeline']['id'])){
                        $calCheckTm = timeline::where('id', $value['timeline']['id'])->where('calculation_id', $value['id'])->get()->first();
                        if($calCheckTm != null){
                            $calCheckTm->finanzierungsbedarf_phase_eins = $value['timeline']['finanzierungsbedarf_phase_eins'];
                            $calCheckTm->jahreszins_phase_eins = $value['timeline']['jahreszins_phase_eins'];
                            $calCheckTm->laufzeit_phase_eins = $value['timeline']['laufzeit_phase_eins'];
                            $calCheckTm->rate_monatlich_phase_eins = $value['timeline']['rate_monatlich_phase_eins'];
                            $calCheckTm->finanzierungsbedarf_phase_zwei = $value['timeline']['finanzierungsbedarf_phase_zwei'];
                            $calCheckTm->jahreszins_phase_zwei = $value['timeline']['jahreszins_phase_zwei'];
                            $calCheckTm->laufzeit_phase_zwei = $value['timeline']['laufzeit_phase_zwei'];
                            $calCheckTm->rate_monatlich_phase_zwei = $value['timeline']['rate_monatlich_phase_zwei'];
                            $calCheckTm->restschuld_ende = $value['timeline']['restschuld_ende'];
                            $calCheckTm->restschuld_phase_eins = $value['timeline']['restschuld_phase_eins'];
                            $calCheckTm->save();
                        }
                    } else {
                        $timeline = new timeline;
                        $timeline->calculation_id = $cid;
                        $timeline->finanzierungsbedarf_phase_eins = $value['timeline']['finanzierungsbedarf_phase_eins'];
                        $timeline->jahreszins_phase_eins = $value['timeline']['jahreszins_phase_eins'];
                        $timeline->laufzeit_phase_eins = $value['timeline']['laufzeit_phase_eins'];
                        $timeline->rate_monatlich_phase_eins = $value['timeline']['rate_monatlich_phase_eins'];
                        $timeline->finanzierungsbedarf_phase_zwei = $value['timeline']['finanzierungsbedarf_phase_zwei'];
                        $timeline->jahreszins_phase_zwei = $value['timeline']['jahreszins_phase_zwei'];
                        $timeline->laufzeit_phase_zwei = $value['timeline']['laufzeit_phase_zwei'];
                        $timeline->rate_monatlich_phase_zwei = $value['timeline']['rate_monatlich_phase_zwei'];
                        $timeline->restschuld_ende = $value['timeline']['restschuld_ende'];
                        $timeline->restschuld_phase_eins = $value['timeline']['restschuld_phase_eins'];
                        $timeline->kundens_id = $request->segment(3);
                        $timeline->save();
                    }
                }
                else {
                    DB::table('timeline')->where('kundens_id', $request->segment(3))->where('calculation_id', $cid)->delete();
                }
            }

            DB::table('calculation')->where('kunden_id', $request->segment(3))->whereNotIn('id', $usedCardId)->delete();
            DB::table('timeline')->where('kundens_id', $request->segment(3))->whereNotIn('calculation_id', $usedCardId)->delete();

            return redirect()->route('kunden.edit',$request->segment(3))->withErrors(['success' => ['Calucation has been updated succesfully']]);
        }
        else {
            $this->validate($request,
                [
                    'vorname' => 'required',
                    'nachname' => 'required',
                    'strasse' => 'required',
                    'plz' => 'required',
                    'wohnort' => 'required',
                    'mail' => 'required',
                    'telefon' => 'required',
                    'geburtsdatum' => 'required'
                ]
            );

            $kunden->vorname = request('vorname');
            $kunden->nachname = request('nachname');
            $kunden->strasse = request('strasse');
            $kunden->plz = request('plz');
            $kunden->wohnort = request('wohnort');
            $kunden->mail = request('mail');
            $kunden->telefon = request('telefon');
            $kunden->geburtsdatum = request('geburtsdatum');
            $kunden->user_id = request('kunden_user');
            $kunden->kaufpreis = request('kaufpreis');
            $kunden->kostenumbau = request('kostenumbau');
            $kunden->kostennotar = request('kostennotar');
            $kunden->grunderwerbssteuer = request('grunderwerbssteuer');
            $kunden->maklerkosten = request('maklerkosten');
            $kunden->gesamtkosten = request('gesamtkosten');
            $kunden->eigenkapital = request('eigenkapital');
            $kunden->finanzierungsbedarf = request('finanzierungsbedarf');

            $kunden->save();
            return redirect()->route('kunden.index');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \MVS\Kunden $kunden
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = kunden::findOrFail($id);
        $blog->delete();

        return redirect()->route('kunden.index');
    }

    public function printoffer($id)
    {

        $kunden = Kunden::find($id);
        $last_offer = Angebote::orderBy('id', 'desc')->first();
        $repayments = Repayment::where('kundens_id', $id)->get();
        $timeline = timeline::where('kundens_id', $id)->get();
        $calculation = DB::table('calculation')->where('kunden_id', $id)->get();

        $angebotedate = DB::table('calculation')->where('kunden_id', $id)->first();

        $Calculations = DB::table('calculation')->where('kunden_id', $id)->get();
        foreach($Calculations as &$Calculation){
            $Calculation->timeline = DB::table('timeline')->where('kundens_id', $id)->where('calculation_id', $Calculation->id)->get()->first();
        }

        if (is_null($last_offer)) {
            $pdf_name = 1;
        } else {
            $pdf_name = $last_offer->id + 1;
        }

        $pdf_name .= '.pdf';

        //When you press  the html button, this function called. right?
        //Yes . ok. And when this function called, in the table "Angebote", new recod created. And saved some information such as pdf file name.  This is the perform course.
        // In this case, you can add more dadtas in the records. right?

        // ok i understand - but i add the data from "kundens" and "Angebote" via CRUD. I add them in the table from a form. Thats the plan. And the Info like "price". The information
        // are earlier in the table. I add first the data and then i create the PDF. I thought i casn read it like this:

        Angebote::create([
            'pdf_name' => $pdf_name,
            'customer_id' => $id
        ]);

        $angebote = Angebote::where('pdf_name', $pdf_name)->first();

        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdf = PDF::loadView('admin.kunden.printview', compact('kunden', 'angebote', 'angebotedate', 'repayments', 'timeline', 'Calculation', 'Calculations'));

        // return view('admin.kunden.printview', compact('kunden', 'angebote', 'repayments', 'timeline'));

        $subfolder = date("Y")."_".date("M");
        $result = Storage::disk('local')->put('/'.$subfolder.'/' . $pdf_name, $pdf->output());
        $path = "app/".$subfolder."/".$pdf_name;
        return response()->download(storage_path($path));
    }

    public function download_pdf($id) {
        $filename = $id.'.pdf';
        $subfolder = date("Y")."_".date("M");
        $path = "app/".$subfolder."/".$filename;
        return response()->download(storage_path($path));
    }

    public function saveRepayment($id, Request $request) {

        $data = $request->data;

        Repayment::where('kundens_id', $id)->delete();
        foreach ($data as $item) {
            $repayItem = new Repayment;
            $repayItem->kundens_id = $id;
            $repayItem->repayment_date = $item['repayment_date'];
            $repayItem->zinsen = $item['zinsen'];
            $repayItem->tilgung = $item['tilgung'];
            $repayItem->darlehensrest = $item['darlehensrest'];
            $repayItem->save();
        }
        return 'success';
    }

    public function deleteRepayment($id) {
        Repayment::where('kundens_id', $id)->delete();
        return 'success';
    }

    public function saveTimeline($id, Request $request) {

        dd(($request->fullForm));
        dd(json_decode($request->fullForm), true);


        $this->validate($request,
            [
                'bank' => 'required',
                'annuities' => 'required',
                'to_interest' => 'required',
                'effectiveness' => 'required',
                'fixed_interest_rates' => 'required',
                'monthly_loan' => 'required',
                'residual_debt_interest_rate' => 'required',
                'calculated_luaf_time' => 'required',
                'net_loan_amount' => 'required',
                'initial_interest' => 'required',
                'optional_sound_recovery' => 'required'
            ]
        );

        $cid = 0;
        if ( $request->ten_fields_flag == 1 ) {
            $this->validate($request,
                [
                    'jahreszins_phase_eins' => 'required',
                    'laufzeit_phase_eins' => 'required',
                    'rate_monatlich_phase_eins' => 'required',
                    'finanzierungsbedarf_phase_zwei' => 'required',
                    'jahreszins_phase_zwei' => 'required',
                    'laufzeit_phase_zwei' => 'required',
                    'rate_monatlich_phase_zwei' => 'required',
                    'restschuld_ende' => 'required',
                    'restschuld_phase_eins' => 'required',
                    'finanzierungsbedarf_phase_eins' => 'required',
                ]
            );

            // 11 fields 
            $insertData = [
                'bank' => $request->bank,
                'annuities' => $request->annuities,
                'to_interest' => $request->to_interest,
                'effectiveness' => $request->effectiveness,
                'fixed_interest_rates' => $request->fixed_interest_rates,
                'monthly_loan' => $request->monthly_loan,
                'residual_debt_interest_rate' => $request->residual_debt_interest_rate,
                'calculated_luaf_time' => $request->calculated_luaf_time,
                'net_loan_amount' => $request->net_loan_amount,
                'initial_interest' => $request->initial_interest,
                'optional_sound_recovery' => $request->optional_sound_recovery,
                'prepared_by' => $request->prepared_by,
            ];

            $cid = DB::table('calculation')->insert($insertData);

            $name = $request->timeline_name;
            $timeline = new timeline;
            $timeline->calculation_id = $cid;
            $timeline->finanzierungsbedarf_phase_eins = $request->finanzierungsbedarf_phase_eins;
            $timeline->jahreszins_phase_eins = $request->jahreszins_phase_eins;
            $timeline->laufzeit_phase_eins = $request->laufzeit_phase_eins;
            $timeline->rate_monatlich_phase_eins = $request->rate_monatlich_phase_eins;
            $timeline->finanzierungsbedarf_phase_zwei = $request->finanzierungsbedarf_phase_zwei;
            $timeline->jahreszins_phase_zwei = $request->jahreszins_phase_zwei;
            $timeline->laufzeit_phase_zwei = $request->laufzeit_phase_zwei;
            $timeline->rate_monatlich_phase_zwei = $request->rate_monatlich_phase_zwei;
            $timeline->restschuld_ende = $request->restschuld_ende;

            $timeline->restschuld_phase_eins = $request->restschuld_phase_eins;
            $timeline->kundens_id = $id;
            $timeline->save();
        }
        else {
            // 11 fields 
            $insertData = [
                'bank' => $request->bank,
                'annuities' => $request->annuities,
                'to_interest' => $request->to_interest,
                'effectiveness' => $request->effectiveness,
                'fixed_interest_rates' => $request->fixed_interest_rates,
                'monthly_loan' => $request->monthly_loan,
                'residual_debt_interest_rate' => $request->residual_debt_interest_rate,
                'calculated_luaf_time' => $request->calculated_luaf_time,
                'net_loan_amount' => $request->net_loan_amount,
                'initial_interest' => $request->initial_interest,
                'optional_sound_recovery' => $request->optional_sound_recovery,
                'prepared_by' => $request->prepared_by,
            ];

            $cid = DB::table('calculation')->insert($insertData);
        }        

        return 'success';
    }

    public function statusChange(Request $request)
    {
        if($request->ajax()) {
            $calculation = Calculation::find($request->calculation_id);
            $calculation->enabled ^= 1;
            $calculation->update();
            return response()->json(['calculation'=>$calculation]);
        }
    }
}


//Do you understad what I mean?

// yes! thank you! so i can make some more fields etc :)sss understand what is the error?
// i save just "timeline" and its "null" ut it doesnt allow to be null
