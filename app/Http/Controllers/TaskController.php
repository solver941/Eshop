<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Session\Flash;
class TaskController
{
    public function add_cart($id)
    {

        //Here we are creating a session for the shopping cart where we are doing two things:
        //Checking if product exist in the cart then removing it or if it doesn't exist, then add to the cart.
        $products=Session::get('cartProducts');



        //dd(!is_null($products) && in_array($id,$products));
        if(!is_null($products) && in_array($id,$products)) {
            $key=array_search($id, $products);
            unset($products[$key]);
            $message = "Product was successfully removed from cart";
        }
        else{
            $products[] = $id;
            $message = "Product was successfully added to cart";
            //dd("else");
        }

        Session::put('cartProducts', $products);
        return redirect()->back()->with("success", $message);
    }
    public function shopping_cart()
    {
        $products=Session::get('cartProducts');

        if (((isset($products))==true)&&($products !== [])){
            $values = value($products);
            $all_from_rows = [];
            $a = 0;

            /*Flash::("Task was successful!");*/

            foreach($values as $value){
                $all_from_row = Product::where('id', $value)->get();
                array_push($all_from_rows, $all_from_row);
                $a++;
            }

            $length = count($values);
            $empty = false;
            $total_price = 0;
            return view("shopping-cart", compact("values", "length", "empty","total_price", "all_from_rows"));
        } else{
            $empty = true;
            return view("shopping-cart", compact("empty"));
            //dd("not set", compact("empty"));
        }
    }
    public function payment()
    {
        require_once 'library/BarionClientController.php';
        $myPosKey = "9c165cfc-cbd1-452f-8307-21a3a9cee664";

        $item = new ItemModel();
        $item->Name = "TestItem";
        $item->Description = "A test product";
        $item->Quantity = 1;
        $item->Unit = "piece";
        $item->UnitPrice = 1000;
        $item->ItemTotal = 1000;
        $item->SKU = "ITEM-01";

        $trans = new PaymentTransactionModel();
        $trans->POSTransactionId = "TRANS-01";
        $trans->Payee = "webshop@example.com";
        $trans->Total = 1000;
        $trans->Currency = Currency::HUF;
        $trans->Comment = "Test transaction containing the product";
        $trans->AddItem($item);

        $ppr = new PreparePaymentRequestModel();
        $ppr->GuestCheckout = true;
        $ppr->PaymentType = PaymentType::Immediate;
        $ppr->FundingSources = array(FundingSourceType::All);
        $ppr->PaymentRequestId = "PAYMENT-01";
        $ppr->PayerHint = "user@example.com";
        $ppr->Locale = UILocale::EN;
        $ppr->OrderNumber = "ORDER-0001";
        $ppr->Currency = Currency::HUF;
        $ppr->RedirectUrl = "http://webshop.example.com/afterpayment";
        $ppr->CallbackUrl = "http://webshop.example.com/processpayment";
        $ppr->AddTransaction($trans);

        $myPayment = $BC->PreparePayment($ppr);
        return redirect("https://secure.barion.com/Pay?id=<your_payment_id>");
    }
}
