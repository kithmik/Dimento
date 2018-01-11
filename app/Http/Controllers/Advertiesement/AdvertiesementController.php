<?php

namespace App\Http\Controllers\Advertiesement;

use App\Models\Advertisement\Advertisement;
use App\Models\User\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Stripe\Customer;
use Stripe\Error\Card;
use Stripe\Stripe;

class AdvertiesementController extends Controller
{


    /**
     * Make a Stripe payment.
     *
     * @param Illuminate\Http\Request $request
     * @param App\Product $product
     * @return chargeCustomer()
     */
    public function postPayWithStripe(Request $request)
    {
        $ad = Advertisement::findOrFail($request->input('ad_id'));
        return $this->chargeCustomer($ad, $request->input('stripeToken'));
    }

    /**
     * Charge a Stripe customer.
     *
     * @var Stripe\Customer $customer
     * @param integer $product_id
     * @param integer $product_price
     * @param string $product_name
     * @param string $token
     * @return createStripeCharge()
     */
    public function chargeCustomer($ad, $token)
    {
        Stripe::setApiKey('sk_test_LJnZHwvQLczseA0WQu3yKmT1');

        if (!$this->isStripeCustomer())
        {
            $customer = $this->createStripeCustomer($token);
        }
        else
        {
            $customer = Customer::retrieve(auth()->user()->stripe_id);
        }

        return $this->createStripeCharge($ad, $customer);
    }

    /**
     * Create a Stripe charge.
     *
     * @var Stripe\Charge $charge
     * @var Stripe\Error\Card $e
     * @param integer $product_id
     * @param integer $product_price
     * @param string $product_name
     * @param Customer $customer
     * @return postStorePayment()
     */
    public function createStripeCharge($ad, $customer)
    {
        try {

            $charge = auth()->user()->invoiceFor("Payment for Advertisement #".$ad->id, $ad->total_impressions, [
                "amount" => $ad->total_impressions,
                "currency" => "usd",
                "customer" => $customer->id,
                "description" => $ad->title
            ]);

            /*$charge = \Stripe\Charge::create(array(
                "amount" => $investment->amount,
                "currency" => "usd",
                "customer" => $customer->id,
                "description" => $investment->description
            ));*/
        } catch(Card $e) {
            return view('payment.ad_pay')
                ->with('error', 'Your credit card was been declined. Please try again or contact us.');
        }

        return $this->postStorePayment($ad);
    }

    /**
     * Create a new Stripe customer for a given user.
     *
     * @var Customer $customer
     * @param string $token
     * @return Customer $customer
     */
    public function createStripeCustomer($token)
    {
        Stripe::setApiKey('sk_test_LJnZHwvQLczseA0WQu3yKmT1');

        $customer = Customer::create([
            'description' => auth()->user()->email,
            'source' => $token
        ]);


        auth()->user()->stripe_id = $customer->id;
        auth()->user()->save();

        return $customer;
    }

    /**
     * Check if the Stripe customer exists.
     *
     * @return boolean
     */
    public function isStripeCustomer()
    {
        return auth()->check() && User::where('id', auth()->user()->id)->whereNotNull('stripe_id')->first();
    }

    /**
     * Store a order.
     *
     * @param Investment $investment
     * @return redirect()
     */
    public function postStorePayment(Advertisement $ad)
    {
        $ad->accepted = 1;
        $ad->save();
        return redirect()->to('advertisement/'.$ad->id);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Advertisement::where('accepted', 1)->get();
        return view('advertisements.index', ['ads'=>$ads]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('advertisements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect('advertisement/create')
                ->withErrors($validator)
                ->withInput();
        }


        // dd($request->input('time')." ".$request->input('deadline'));

        // date(format)
        $deadline = date("Y-m-d h:i:s", strtotime($request->input('time')." ".$request->input('deadline')));

        // dd($deadline);
        $advertisement = new Advertisement;
        $advertisement->user_id = auth()->user()->id;
        $advertisement->title = $request->input('title');
        $advertisement->description = $request->input('description');
         $advertisement->total_impressions = $request->input('total_impressions');
        //$advertisement->object = $request->input('object');
        //$advertisement->texture = $request->input('texture');
        $advertisement->deadline = $deadline;
        // $advertisement->time = $request->input('time');

        $advertisement->save();

        if ($request->hasFile('image')) {
            # code...
            $file = $request->file('image');

            $file_name = $advertisement->id.".".$file->getClientOriginalExtension();

            $file->storeAs('/images/', $file_name, 'public');

            Advertisement::where('id', $advertisement->id)->update(['image'=>'/storage/images/'.$file_name]);
        }


        return view('payment.ad_pay')->with(['ad' => $advertisement]);
        // return redirect()->to('advertisement/'.$advertisement->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ad = Advertisement::findOrFail($id);

        return view('advertisements.view', ['ad' => $ad]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ad = Advertisement::findOrFail($id);
        return view('advertisements.edit', ['ad' => $ad]);
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
        $ad = Advertisement::findOrFail($id);
        if (auth()->user()->type == 4 || auth()->user()->id == $ad->user->id){
            $ad->forceDelete();
            return redirect()->to('/home');
        }

    }
}
