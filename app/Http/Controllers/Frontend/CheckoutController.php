<?php

namespace App\Http\Controllers\Frontend;


use Helper;
use Stripe;
use Validator;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Exception;
use Twilio\Rest\Client;

class CheckoutController extends Controller
{
    public function index()
    {
        $old_cartItems = Cart::where('user_id', Auth::id())->get();
        foreach ($old_cartItems as $item) {
            if (!Product::where('id', $item->prod_id)->where('qty', '>=', $item->prod_qty)->exists()) {
                $removeItem = Cart::where('user_id', Auth::id())->where('prod_id', $item->prod_id)->first();
                $removeItem->delete();
            }
        }
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('frontend.checkout', compact('cartItems'));
    }
    public function stripeindex()
    {
        $old_cartItems = Cart::where('user_id', Auth::id())->get();
        foreach ($old_cartItems as $item) {
            if (!Product::where('id', $item->prod_id)->where('qty', '>=', $item->prod_qty)->exists()) {
                $removeItem = Cart::where('user_id', Auth::id())->where('prod_id', $item->prod_id)->first();
                $removeItem->delete();
            }
        }
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('frontend.stripecheckout', compact('cartItems'));
    }
    public function paystackindex()
    {
        $old_cartItems = Cart::where('user_id', Auth::id())->get();
        foreach ($old_cartItems as $item) {
            if (!Product::where('id', $item->prod_id)->where('qty', '>=', $item->prod_qty)->exists()) {
                $removeItem = Cart::where('user_id', Auth::id())->where('prod_id', $item->prod_id)->first();
                $removeItem->delete();
            }
        }
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('frontend.paystack', compact('cartItems'));
    }
    public function thankyou()
    {
        return view('frontend.thankyou');
    }
    public function sendSms(Request $request)
    {
        // $receiver_number = $request->number;
        $message = 'Your Order is placed Successfully and you will receieve a delivery email .';
        try {
            $account_sid = env("TWILIO_SID");
            $auth_token = env("TWILIO_TOKEN");
            $twilio_number = env("TWILIO_FROM");

            $client = new Client($account_sid, $auth_token);
            $client->messages->create('+234'.$request->number, [
                'from' => $twilio_number,
                'body' => $message
            ]);
            return redirect('/');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    // public function confirmationmail()
    // {
    //     return view('frontend.orders.confirmationmail');
    // }
    // cod payment
    public function placeorder(Request $request)
    {
        $orders = new Order();
        $orders->user_id = Auth::id();
        $orders->firstname = $request->input('firstname');
        $orders->lastname = $request->input('lastname');
        $orders->email = $request->input('email');
        $orders->phone = $request->input('phone');
        $orders->address1 = $request->input('address1');
        $orders->city = $request->input('city');
        $orders->state = $request->input('state');
        $orders->country = $request->input('country');
        $orders->zipcode = $request->input('zipcode');
        $orders->tracking_no = 'myecomm' . rand(1111, 9999);
        $orders->payment_mode = $request->input('payment_mode');
        $orders->payment_id = $request->input('payment_id');
        $orders->message = $request->input('message');
        // //to calculate the total price
        $total = 0;
        $cartItems_total = Cart::where('user_id', Auth::id())->get();
        foreach ($cartItems_total as $prod) {
            $total += $prod->product->selling_price * $prod->prod_qty;
        }
        $orders->total_price = $total;

        $orders->save();
        $orders->total_price = Helper::currency_converter($total);


        $orders->save();

        $cartItems = Cart::where('user_id', Auth::id())->get();
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $orders->id,
                'prod_id' => $item->prod_id,
                'qty' => $item->prod_qty,
                'price' => Helper::currency_converter($item->product->selling_price),
            ]);
            $prod = Product::where('id', $item->prod_id)->first();
            $prod->qty = $prod->qty - $item->prod_qty;
            $prod->update();
        }
        if (Auth::user()->address1 == NULL) {
            $user = User::where('id', Auth::id())->first();
            $user->name = $request->input('firstname');
            $user->lastname = $request->input('lastname');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->address1 = $request->input('address1');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->country = $request->input('country');
            $user->zipcode = $request->input('zipcode');
            $user->update();
        }
        $cartItems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartItems);
        return redirect('thankyou')->with('message', 'Successfully Ordered');
        $this->mailsending($request);
    }

    // stripe payment

    public function stripeorder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'card_no' => 'required',
            'ccExpiryMonth' => 'required',
            'ccExpiryYear' => 'required',
            'cvvNumber' => 'required',
        ]);
        $input = $request->except('_token');
        if ($validator->passes()) {
            $stripe = Stripe::setApiKey(env('STRIPE_SECRET'));
            try {
                $token = $stripe->tokens()->create([
                    'card' => [
                        'number' => $request->get('card_no'),
                        'exp_month' => $request->get('ccExpiryMonth'),
                        'exp_year' => $request->get('ccExpiryYear'),
                        'cvc' => $request->get('cvvNumber'),
                    ],
                ]);
                if (!isset($token['id'])) {
                    return redirect()->route('stripe.add.money');
                }
                $total = 0;
                $cartItems_total = Cart::where('user_id', Auth::id())->get();
                foreach ($cartItems_total as $prod) {
                    $total += $prod->product->selling_price * $prod->prod_qty;
                }
                $charge = $stripe->charges()->create([
                    'card' => $token['id'],
                    'currency' => 'USD',
                    'amount' => Helper::currency_converter($total + 1),
                    'description' => 'Successfull',
                ]);
                if ($charge['status'] == 'succeeded') {
                    // dd($charge);
                    $orders = new Order();
                    $orders->user_id = Auth::id();
                    $orders->firstname = $request->input('firstname');
                    $orders->lastname = $request->input('lastname');
                    $orders->email = $request->input('email');
                    $orders->phone = $request->input('phone');
                    $orders->address1 = $request->input('address1');
                    $orders->city = $request->input('city');
                    $orders->state = $request->input('state');
                    $orders->country = $request->input('country');
                    $orders->zipcode = $request->input('zipcode');
                    $orders->tracking_no = 'myecomm' . rand(1111, 9999);
                    $orders->payment_mode = "Paid with Stripe";
                    $orders->payment_id = $token['id'];
                    $orders->message = "Successful";
                    $total = 0;
                    $cartItems_total = Cart::where('user_id', Auth::id())->get();
                    foreach ($cartItems_total as $prod) {

                        $total += $prod->product->selling_price * $prod->prod_qty;
                    }
                    $orders->total_price = Helper::currency_converter($total);

                    $orders->save();

                    $cartItems = Cart::where('user_id', Auth::id())->get();
                    foreach ($cartItems as $item) {
                        OrderItem::create([
                            'order_id' => $orders->id,
                            'prod_id' => $item->prod_id,
                            'qty' => $item->prod_qty,
                            'price' => Helper::currency_converter($item->product->selling_price),
                        ]);
                        $prod = Product::where('id', $item->prod_id)->first();
                        $prod->qty = $prod->qty - $item->prod_qty;
                        $prod->update();
                    }
                    if (Auth::user()->address1 == NULL) {
                        $user = User::where('id', Auth::id())->first();
                        $user->name = $request->input('firstname');
                        $user->lastname = $request->input('lastname');
                        $user->email = $request->input('email');
                        $user->phone = $request->input('phone');
                        $user->address1 = $request->input('address1');
                        $user->city = $request->input('city');
                        $user->state = $request->input('state');
                        $user->country = $request->input('country');
                        $user->zipcode = $request->input('zipcode');
                        $user->update();
                    }
                    $cartItems = Cart::where('user_id', Auth::id())->get();
                    Cart::destroy($cartItems);
                    return redirect('thankyou')->with('message', 'Successfully Ordered');
                    // $this->sendOrderConfirmationMail($orders);
                } else {
                    return redirect()->back()->with('error', 'Money not add in wallet!');
                }
                // (\Exception $e)
            } catch (\Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            } catch (\Cartalyst\Stripe\Exception\CardErrorException $e) {
                return redirect()->back()->with('error', $e->getMessage());
            } catch (\Cartalyst\Stripe\Exception\MissingParameterException $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
    }

    // paystack payment
    public function paystackorder()
    // (Request $request)
    {
        $total = 0;
        $cartItems_total = Cart::where('user_id', Auth::id())->get();
        foreach ($cartItems_total as $prod) {
            $total += $prod->product->selling_price * $prod->prod_qty;
        }
        $formData = [
            'email' => request('email'),
            'firstname' => request('firstname'),
            'lastname' => request('lastname'),
            'zipcode' => request('zipcode'),
            'country' => request('country'),
            'state' => request('state'),
            'city' => request('city'),
            'address1' => request('address1'),
            'phone' => request('phone'),
            'amount' => request('amount') * 74000,
            // 'amount' => Helper::currency_converter($total * 100) ,
            'callback_url' => url('thankyous'),
        ];

        session(['recent_transaction' => $formData]);

        // dd($formData);
        $pay = json_decode($this->initiate_payment($formData));
        if ($pay) {
            if ($pay->status) {
                return redirect($pay->data->authorization_url);
            } else {
                return back()->withError($pay->message);
            }
        } else {
            return back()->withError("No internet connection");
        }
    }
    public function payment_callback(Request $request)
    {

        $data = session('recent_transaction');
        $trxref = $request->query('trxref');
        $reference = $request->query('reference');

        // $user = User::where('id', Auth::id())->first();

        $response = json_decode($this->verify_payment(request('reference')));
        if ($response) {
            if ($response->status) {
                $orders = new Order();
                $orders->user_id = Auth::id();
                $orders->firstname = $data['firstname'];
                $orders->lastname = $data['lastname'];
                $orders->email = $data['email'];
                $orders->phone = $data['phone'];
                $orders->address1 = $data['address1'];
                $orders->city = $data['city'];
                $orders->state = $data['state'];
                $orders->country = $data['country'];
                $orders->zipcode = $data['zipcode'];
                $orders->tracking_no = 'myecomm' . rand(1111, 9999);
                $orders->payment_mode = "Paid with Paystack";
                $orders->payment_id =   $trxref;
                // $orders->payment_id =  json_decode($this->verify_payment(request('reference')));
                // $data= json_decode( json_encode($data), true);
                $orders->message = "Successful";
                $total = 0;
                $cartItems_total = Cart::where('user_id', Auth::id())->get();
                foreach ($cartItems_total as $prod) {

                    $total += $prod->product->selling_price * $prod->prod_qty;
                }
                // $orders->total_price = $total;
                $orders->total_price = Helper::currency_converter($total);
                $orders->save();
                $cartItems = Cart::where('user_id', Auth::id())->get();
                foreach ($cartItems as $item) {
                    OrderItem::create([
                        'order_id' => $orders->id,
                        'prod_id' => $item->prod_id,
                        'qty' => $item->prod_qty,
                        'price' => Helper::currency_converter($item->product->selling_price),
                        // 'price' => $item->product->selling_price,
                    ]);
                    $prod = Product::where('id', $item->prod_id)->first();
                    $prod->qty = $prod->qty - $item->prod_qty;
                    $prod->update();
                }
                if (Auth::user()->address1 == NULL) {
                    $user = User::where('id', Auth::id())->first();
                    $user->name = $request->input('firstname');
                    $user->lastname = $request->input('lastname');
                    $user->email = $request->input('email');
                    $user->phone = $request->input('phone');
                    $user->address1 = $request->input('address1');
                    $user->city = $request->input('city');
                    $user->state = $request->input('state');
                    $user->country = $request->input('country');
                    $user->zipcode = $request->input('zipcode');
                    $user->update();
                }
                $cartItems = Cart::where('user_id', Auth::id())->get();
                Cart::destroy($cartItems);

                return redirect('thankyou')->with('message', 'Successfully Ordered');
                // $this->sendOrderConfirmationMail($orders);
            } else {
                return back()->withError($response->message);
            }
        } else {
            return back()->withError("Something went wrong");
        }
    }
    public function initiate_payment($formData)
    {
        $url = "https://api.paystack.co/transaction/initialize";

        $fields_string = http_build_query($formData);
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer " . env("PAYSTACK_SECRET_KEY"),
            "Cache-Control: no-cache",
        ));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
    public function verify_payment($reference)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer " . env("PAYSTACK_SECRET_KEY"),
                "Cache-Control: no-cache",
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        return  $response;
    }

}
