<?php

namespace App\Http\Controllers;

use App\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['reported'] = $request->input('postID');
        $data['reporter'] = Auth::user()->id;
        $data['offense'] = $request->input('offense');

        switch ($request->input('reportType')){
            case 'IP':
                $data['type'] = 'Inappropriate Language';
            break;
            case 'OTO':
                $data['type'] = 'Offensive Towards Others';
            break;
            case 'MIS':
                $data['type'] = 'Spreading Misinformation';
            break;
            case 'SPM':
                $data['type'] = 'Spam';
            break;
            case 'OTHER':
                $data['type'] = 'Other';
            break;

        }


        $obj = new Report();
        $obj->create($data);
        return redirect()->back()->with('successMessage','Your report was submited and will be carefully analysed!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}
