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
    public function display()
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

        switch ($request->input('reportType')) {
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
        return redirect()->back()->with('successMessage', 'Your report was submited and will be carefully analysed!');
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


    public function handleReport(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            $obj = new Report();
            $data['id'] = $request->input('repID');

            if (isset($request['delete'])) {
                $data['state'] = 'Approved';

               $obj->setState($data);
               return back()->with('successMessage', 'Post was removed and report was marked as read');
    
            } else if (isset($request['keep'])) {
                $data['state'] = 'Rejected';

                $obj->setState($data);
                return back()->with('successMessage', 'Post was kept and report was marked as read');
            }
            return back()->with('errorMessage', 'Error handling report');
        }
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
