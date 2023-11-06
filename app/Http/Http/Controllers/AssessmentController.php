<?php

namespace App\Http\Controllers;

use App\Assessment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssessmentController extends Controller
{
    /**
     * Display a listicng of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userid=Auth::user()->id;
        $assessment=Assessment::where('user_id',$userid)->get();
        return view('dashboard.form_records.risk_assessment',compact('assessment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       try{
        $this->validate($request,[
            'jobNumber'=>'required',
        ]);

        $assessment= new Assessment();
        $assessment->user_id=Auth::user()->id;
        $assessment->jobNumber=$request->input('jobNumber');
        $assessment->date=$request->input('date');
        $assessment->qualitySatandard=$request->input('qualitySatandard');
        $assessment->delevryStandard=$request->input('delevryStandard');
        $assessment->commentsdelvery=$request->input('commentsdelvery');
        $assessment->priceRequiremnt=$request->input('priceRequiremnt');
        $assessment->commentprice=$request->input('commentprice');
        $assessment->interestedDeemed=$request->input('interestedDeemed');
        $assessment->commentsDeemed=$request->input('commentsDeemed');
        $assessment->DecisionComment=$request->input('DecisionComment');
        $assessment->dateDevelry=$request->input('dateDevelry');
        $assessment->RiskProbability=$request->input('RiskProbability');
        $assessment->riskSeverity=$request->input('riskSeverity');
        $assessment->save();

        return redirect('/risk_assessment')->with("Success","Data Save Successfully");
       }catch(Exception $exc){
        return redirect('/risk_assessment')->with("Error","Error");

       }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Assessment  $assessment
     * @return \Illuminate\Http\Response
     */
    public function show(Assessment $assessment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Assessment  $assessment
     * @return \Illuminate\Http\Response
     */
    public function edit(Assessment $assessment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Assessment  $assessment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id=$request->id;
        try{

            $assessment= Assessment::find($id);
            $assessment->user_id=Auth::user()->id;
        $assessment->jobNumber=$request->input('jobNumber');
        $assessment->date=$request->input('date');
        $assessment->qualitySatandard=$request->input('qualitySatandard');
        $assessment->delevryStandard=$request->input('delevryStandard');
        $assessment->commentsdelvery=$request->input('commentsdelvery');
        $assessment->priceRequiremnt=$request->input('priceRequiremnt');
        $assessment->commentprice=$request->input('commentprice');
        $assessment->interestedDeemed=$request->input('interestedDeemed');
        $assessment->commentsDeemed=$request->input('commentsDeemed');
        $assessment->DecisionComment=$request->input('DecisionComment');
        $assessment->dateDevelry=$request->input('dateDevelry');
        $assessment->RiskProbability=$request->input('RiskProbability');
        $assessment->riskSeverity=$request->input('riskSeverity');
             $assessment->save();
             $notification = [
                'message' => 'Record  updated successfully.!',
                'alert-type' => 'success'
            ];
             return redirect('/risk_assessment')->with($notification);
        }catch(Exception $exc){
            print_r($exc->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Assessment  $assessment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assessment $assessment)
    {
        //
    }
}
