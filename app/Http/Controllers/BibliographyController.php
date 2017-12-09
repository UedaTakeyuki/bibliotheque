<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

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
        //
        if (is_null(Input::get('command'))||is_null(Input::get('barcode'))){
            return view('bibliographies.add');
        } else {
            $command = Input::get('command');
            $barcode = Input::get('barcode');
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
                    session(['price' => intval(substr($barcode,7,5))."円"]);
                } else {
                    $error_str = "書籍JAN コードではありません";
                }
                break;
            }
            $isSubmitEnabled = session()->exists('isbn')&&session()->exists('price');
            return view('bibliographies.add',['isSubmitEnabled' => $isSubmitEnabled ? "" : "disabled=disabled"]);
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
