<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Bibliography;

// refer:
// http://laraveldaily.com/how-to-use-external-classes-and-php-files-in-laravel-controller/
// https://s8a.jp/laravel-custom-helper
use App\Classes\NDLsearch;

class BibliographyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return "hello";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $error_str = "";
        $command = Input::get('command');
        $barcode = Input::get('barcode');
        //
        if (is_null($command)||is_null($barcode)){
            return view('bibliographies.add',['isSubmitEnabled' => False,
                                              'error_str'       => $error_str,
                                              'user_id'         => Auth::id()]);
        } else {
//            $command = Input::get('command');
//            $barcode = Input::get('barcode');
            switch ($command) {
            case "addISBN":
                // read bibliographicals from NDL and put it on the FORM.
                if (mb_strlen($barcode) == 10 
                    || (mb_strlen($barcode) == 13
                    && (substr($barcode,0,3) == "978" || substr($barcode,0,3) == "979"))){
                    $ndl = new NDLsearch($barcode);
                    session(['isbn' => $barcode]);
                    session(['title' => (string)$ndl->title()]);
                    session(['creator' => (string)$ndl->creator()]);
                    session(['publisher' => (string)$ndl->publisher()]);
                } else {
                    $error_str = "ISBN コードではありません";
                }
                break;
            case "addJAN":
                // read the price and put it on the FORM.
                if (mb_strlen($barcode) == 13
                    && (substr($barcode,0,3) == "191" || substr($barcode,0,3) == "192")){
                    session(['price' => intval(substr($barcode,7,5))]);
                } else {
                    $error_str = "書籍JAN コードではありません";
                }
                break;
            }
            $isSubmitEnabled = session()->exists('isbn')&&session()->exists('price');
            return view('bibliographies.add',['isSubmitEnabled' => $isSubmitEnabled,
                                              'error_str'       => $error_str,
                                              'user_id'         => Auth::id()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $bibliography = new Bibliography;
        $bibliography->isbn      = $request->isbn;
        $bibliography->title     = $request->title;
        $bibliography->creator   = $request->creator;
        $bibliography->publisher = $request->publisher;
        $bibliography->price     = $request->price;
        $bibliography->memo      = $request->memo;
        $bibliography->user_id   = $request->user_id;
        $bibliography->save();
        return "hello";
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
