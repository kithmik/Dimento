<?php

namespace App\Http\Controllers\Task;

use App\Models\Task\Task;
use App\Models\User\Follow;
use App\Models\User\Notification;
use App\Models\User\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Stripe\Customer;
use Stripe\Error\Card;
use Stripe\Stripe;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Make a Stripe payment.
     *
     * @param Illuminate\Http\Request $request
     * @param App\Product $product
     * @return chargeCustomer()
     */
    public function postPayWithStripe(Request $request)
    {
        $task = Task::findOrFail($request->input('task_id'));
        return $this->chargeCustomer($task, $request->input('stripeToken'));
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
    public function chargeCustomer($task, $token)
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

        return $this->createStripeCharge($task, $customer);
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
    public function createStripeCharge($task, $customer)
    {
        try {

            $charge = auth()->user()->invoiceFor("Payment for Task #".$task->id, $task->amount * 110, [
                "amount" => $task->amount * 110,
                "currency" => "usd",
                "customer" => $customer->id,
                "description" => $task->title
            ]);

            /*$charge = \Stripe\Charge::create(array(
                "amount" => $investment->amount,
                "currency" => "usd",
                "customer" => $customer->id,
                "description" => $investment->description
            ));*/
        } catch(Card $e) {
            return view('payment.job_pay')
                ->with('error', 'Your credit card was been declined. Please try again or contact us.');
        }

        return $this->postStorePayment($task);
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
    public function postStorePayment(Task $task)
    {
        $task->published_at = Carbon::now();
        $task->save();
        return redirect()->to('/task/'.$task->id);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::whereNotNull('published_at')->get();
        return view('tasks.index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        return $request->all();
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
            'deadline'=>'required',
            'time'=>'required'
        ]);
        if ($validator->fails()) {
            return redirect('/task/create')
                ->withErrors($validator)
                ->withInput();
        }


        $deadline = date("Y-m-d h:i:s", strtotime($request->input('time')." ".$request->input('deadline')));

        $task = new Task;
        $task->user_id = auth()->user()->id;
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->deadline = $deadline;

        if ($request->type == 1){
            $task->amount = $request->input('amount');
        }
        else{
            $task->published_at = Carbon::now();
        }

        $task->type = !empty($request->amount)?1:0;

        $task->save();


        if ($request->type == 1){
            return view('payment.job_pay')->with('task', $task);
        }
        else{
            return redirect()->to('/task/'.$task->id);
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
        $task = Task::findOrFail($id);
//        $user = $task->user
        return view('tasks.view', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', ['task' => $task]);
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
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
            'deadline'=>'required',
            'time'=>'required'
        ]);
        if ($validator->fails()) {
            return redirect('task/create')
                ->withErrors($validator)
                ->withInput();
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
        //
        if (auth()->user()->type == 4){
            $task = Task::findOrFail($id);
            $task->forceDelete();
            return redirect()->to('/task');
        }

    }
}
