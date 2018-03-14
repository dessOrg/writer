<?php

namespace App\Http\Controllers\Client;

use App\User;
use App\Project;
use App\Invoice;
use App\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PayPal\Rest\ApiContext;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Auth\OAuthTokenCredential;
use Validator;
use Session;
use Auth;

class WalletController extends Controller
{

  private $_api_context;

  public function __construct()
  {
    // setup PayPal api context
    $paypal_conf = config('paypal');
    $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
    $this->_api_context->setConfig($paypal_conf['settings']);
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        
        $project = Project::find($id);
        return view('client/wallet/index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        'amount' => 'required|numeric'
    ]);
       
        $id = $request->get('project_id');

    if ($validator->fails()) {
      return redirect('client/wallet/show'.$id)
        ->withErrors($validator)
        ->withInput();
    }

   
    $payer = new Payer();
    $payer->setPaymentMethod('paypal');
  
    $item = new Item();
    $item->setName('1')// item name
      ->setCurrency('USD')
      ->setQuantity(1)
      ->setPrice($request->input('amount')); // unit price
    
    // add item to list
    $item_list = new ItemList();
    $item_list->setItems([$item]);
    
    $amount = new Amount();
    $amount->setCurrency('USD')
      ->setTotal($request->input('amount'));
    
    $transaction = new Transaction();
    $transaction->setAmount($amount)
        ->setItemList($item_list)
      ->setDescription('Amount to Add');
    
    $redirect_urls = new RedirectUrls();
    // Specify return & cancel URL
    $redirect_urls->setReturnUrl(url('/payment/add-funds/paypal/status'.$id))
      ->setCancelUrl(url('/payment/add-funds/paypal/status'.$id));
  
    $payment = new Payment();
    $payment->setIntent('Sale')
      ->setPayer($payer)
      ->setRedirectUrls($redirect_urls)
      ->setTransactions(array($transaction));
  
    try {
      $payment->create($this->_api_context);
    } catch (\PayPal\Exception\PayPalConnectionException $ex) {
      Session::flash('alert', 'Something Went wrong, funds could not be loaded');
      Session::flash('alertClass', 'danger no-auto-close');
      return redirect('/client/wallet/show'.$id);
    }
  
    foreach ($payment->getLinks() as $link) {
      if ($link->getRel() == 'approval_url') {
        $redirect_url = $link->getHref();
        break;
      }
    }
  
    // add payment ID to session
    Session::put('paypal_payment_id', $payment->getId());
  
    if (isset($redirect_url)) {
      // redirect to paypal
      return redirect($redirect_url);
    }
  
  
    Session::flash('alert', 'Unknown error occurred');
    Session::flash('alertClass', 'danger no-auto-close');
    return redirect('/client/wallet/show'.$id);
  
    
    }


      // Paypal process payment after it is done
  public function getPaymentStatus(Request $request, $id)
  {
    // Get the payment ID before session clear
    $payment_id = Session::get('paypal_payment_id');

    // clear the session payment ID
    Session::forget('paypal_payment_id');

    if (empty($request->input('PayerID')) || empty($request->input('token'))) {
      Session::flash('alert', 'Payment failed');
      Session::flash('alertClass', 'danger no-auto-close');
      return redirect('/client/wallet/show'.$id);
    }

    $payment = Payment::get($payment_id, $this->_api_context);

    // PaymentExecution object includes information necessary
    // to execute a PayPal account payment.
    // The payer_id is added to the request query parameters
    // when the user is redirected from paypal back to your site
    $execution = new PaymentExecution();
    $execution->setPayerId($request->input('PayerID'));

    //Execute the payment
    $result = $payment->execute($execution, $this->_api_context);

    if ($result->getState() == 'approved') { // payment made
      // Payment is successful do your business logic here
      //  dd($result);

        $invoice = new Invoice;
        $invoice->user_id = Auth::user()->id;
        $invoice->project_id = $id;
        $invoice->amount = $result->transactions[0]->amount->total;
        $invoice->save();

        $log = new log;
        $log->user_id = Auth::user()->id;
        $log->project_id = $id;
        $log->status = "Success";
        $log->save();

      Session::flash('alert', 'Funds Loaded Successfully!');
      Session::flash('alertClass', 'success');
      return redirect('/order/show'.$id);
    }

        $log = new Log;
        $log->user_id = Auth::user()->id;
        $log->project_id = $id;
        $log->status = "Error";
        $log->save();


    Session::flash('alert', 'Unexpected error occurred & payment has been failed.');
    Session::flash('alertClass', 'danger no-auto-close');
    return redirect('/client/wallet/show'.$id);
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
