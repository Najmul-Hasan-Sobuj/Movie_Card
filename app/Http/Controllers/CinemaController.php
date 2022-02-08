<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CinemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movieData['data'] = Cinema::get();
        return view('list', $movieData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'movieName'    => 'required',
            'categoryName' => 'required',
            'moviePoster'  => 'required|image|mimes:png,jpg,webp,jfif'
        ]);
        if ($validation->passes()) {
            $fileName = [];
            if ($request->moviePoster) {
                $fileName = time() . '.' . $request->moviePoster->extension();
                $request->moviePoster->move(public_path('uploads'), $fileName);
            }
            Cinema::create([
                'movieName'    => $request->movieName,
                'categoryName' => $request->categoryName,
                'moviePoster'  => $fileName,
            ]);
            return redirect()->back()->with('succes', 'successfull submitted');
        } else {
            return redirect()->back()->withErrors($validation);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit['dataEdit'] = Cinema::find($id);
        return view('update', $edit);
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
        $validation = Validator::make($request->all(), [
            'movieName'    => 'required',
            'categoryName' => 'required',
        ]);
        if ($validation->passes()) {
            Cinema::find($id)->update([
                'movieName'    => $request->movieName,
                'categoryName' => $request->categoryName,
            ]);
            return redirect()->back()->with('succes', 'successfull updated');
        } else {
            return redirect()->back()->withErrors($validation);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete =  cinema::find($id)->delete();
        if ($delete) {
            return redirect()->back()->with('succes', 'successfull updated');
        } else {
            return redirect()->back()->with('unsucces', 'successfull updated');
        }
    }
}
