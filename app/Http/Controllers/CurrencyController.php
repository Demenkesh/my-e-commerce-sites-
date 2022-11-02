<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;
use App\Http\Requests\CurrencyFormRequest;
use App\Http\Controllers\Controller;
class CurrencyController extends Controller
{

    public function index()
    {
        $currency = Currency::orderBy('id')->paginate(4) // ->get()
        ;
        return view('admin.currency.index', compact('currency'));
    }

    public function add()
    {
        return view('admin.currency.add');
    }


    public function insert(CurrencyFormRequest $request)
    {
        $validatedData = $request->validated();
        $currency = new Currency();

        // $currency =new $currency;
        $currency->name = $validatedData['name'];
        $currency->code = $validatedData['code'];
        $currency->exchange_rate = $validatedData['exchange_rate'];
        $currency->symbol = $validatedData['symbol'];
        $currency->trending = $request->trending == true ? '1' : '0';
        $currency->off = $request->off == true ? '1' : '0';
        $currency->on = $request->on == true ? '1' : '0';
        $currency->save();
        return redirect('/currency')->with('message', 'Currency Added Successfully');
    }


    public function edit($id)
    {
        $currency = Currency::find($id);
        if ($currency) {
            return view('admin.currency.edit', compact('currency'));
        } else {
            return back()->with('error', 'something went wrong');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CurrencyFormRequest $request, $id)
    {
        $currency = Currency::findOrFail($id);
        $validatedData = $request->validated();

        $currency->name = $validatedData['name'];
        $currency->code = $validatedData['code'];
        $currency->exchange_rate = $validatedData['exchange_rate'];
        $currency->symbol = $validatedData['symbol'];
        $currency->trending = $request->trending == true ? '1' : '0';
        $currency->off = $request->off == true ? '1' : '0';
        $currency->on = $request->on == true ? '1' : '0';
        $currency->update();
        return redirect('/currency')->with('message', 'Category Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $currency = Currency::findfindOrFail($id);

        $currency->delete();
        return redirect('/currency')->with('message', 'Currency deleted successfully');
    }
    public function currencyload(Request $request)
    {
        // dd($request->all());
        session()->put ('currency_code',$request->currency_code);
        $currency=Currency::where('code',$request->currency_code)->first();
        session()->put('currency_symbol',$currency->symbol);
        session()->put('currency_exchange_rate',$currency->exchange_rate);
        $response['status']=true;
        return $response;
    }
}
