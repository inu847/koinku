<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobsController extends Controller
{
    public function index()
    {
        $jobs = \Auth::guard('user')->user()->job;

        return view('job.index', ['jobs' => $jobs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('job.create');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_job = new Job();
        $new_job->job_title = $request->get('job_title');
        $new_job->perusahaan = $request->get('perusahaan');
        $new_job->type_work = $request->get('type_work');
        $new_job->deskripsi = $request->get('deskripsi');
        $new_job->skill = $request->get('skill');
        $new_job->email = $request->get('email');
        $new_job->status = "active";
        $new_job->user_id = \Auth::guard('user')->user()->id;
        $new_job->save();

        return redirect()->route('job.index')->with('success', 'Lowongan Pekerjaan Berhasil Dipublish!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::findOrFail($id);

        return view('job.show', ['job' => $job]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::findOrFail($id);
        if ($alamat) {
            return view('job.edit', ['job' => $job, 'alamat' => $alamat]);
        }else{
            return redirect()->back()->with('fail', 'Tambahkan Alamat Toko!!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = \Auth::user();
        $new_job = Job::findOrFail($id);
        $new_job->job_title = $request->get('job_title');
        $new_job->perusahaan = $request->get('perusahaan');
        $new_job->type_work = $request->get('type_work');
        $new_job->deskripsi = $request->get('deskripsi');
        $new_job->skill = $request->get('skill');
        $new_job->email = $request->get('email');
        $new_job->status = $request->get('status');
        $new_job->alamat_id = $request->get('location');
        $user->job()->save($new_job);

        return redirect()->route('manage-job.index')->with('success', 'Lowongan Pekerjaan Berhasil Ubah!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();

        return redirect()->route('job.index')->with('success', 'Lowongan Pekerjaan Berhasil Dihapus!!');
    }

    public function ubahStatus(Request $request, $id)
    {
        $status_job = Job::findOrFail($id);
        $status_job->status = $request->get('status');
        $status_job->save();

        return redirect()->back()->with('success', 'Status Berhasil Diubah!!');
    }
}
