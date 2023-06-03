<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FormController extends Controller
{
    public function show() : View {
        return view('forms');
    }

    public function submit(Request $request) : View {
        $name = $request->input('name');
        $password = $request->input('password');
        $radio = $request->input('radio');
        $checkbox1 = $request->input('checkbox1');
        $checkbox2 = $request->input('checkbox2');
        $checkbox3 = $request->input('checkbox3');
        $checkbox = ($checkbox1 ? $checkbox1.' ' : '').($checkbox2 ? $checkbox2.' ' : '').($checkbox3 ? $checkbox3.' ' : '');
        $color = $request->input('color');
        $date = $request->input('date');
        $minmaxdate = $request->input('minmaxdate');
        $datetime = $request->input('datetime');
        $minmaxdatetime = $request->input('minmaxdatetime');
        $email = $request->input('email');
        $imagex = $request->input('x');
        $imagey = $request->input('y');
        $filepath = $request->file('file') ? $request->file('file')->storeAs('upload', $name ? $name.'.png' : 'empty'.$request->file('file')->extension()) : 'empty';
        $hidden = $request->input('hidden');
        $number = $request->input('number');
        $range = $request->input('range');
        $search = $request->input('search');
        $telephone = $request->input('telephone');
        return view('forms', [
            'result' => true,
            'name' => $name ? $name : 'empty',
            'password' => $password ? $password : 'empty',
            'radio' => $radio ? $radio : 'empty',
            'checkbox' => $checkbox ? $checkbox : 'empty', 
            'color' => $color ? $color : 'empty',
            'date' => $date ? $date : 'empty', 
            'minmaxdate' => $minmaxdate ? $minmaxdate : 'empty', 
            'datetime' => $datetime ? $datetime : 'empty', 
            'minmaxdatetime' => $minmaxdatetime ? $minmaxdatetime : 'empty', 
            'email' => $email ? $email : 'empty', 
            'imagex' => $imagex ? $imagex : 'empty', 
            'imagey' => $imagey ? $imagey : 'empty', 
            'filepath' => $filepath,
            'hidden' => $hidden ? $hidden : 'empty',
            'number' => $number ? $number : 'empty',
            'range' => $range ? $range : 'empty',
            'search' => $search ? $search : 'empty',
            'telephone' => $telephone ? $telephone : 'empty',
        ]);
    }
}
