<?php
App::uses('AppController', 'Controller');
/**
 * Payments Controller
 *
 * @property Payment $Payment
 * @property PaginatorComponent $Paginator
 */
class PaymentsController extends AppController {

	private function get_banks(){
		$bancos = Cache::read('bancos_'.date("Ymd"));

	    if(!$bancos || is_null($bancos)){
	    	$bancos = $this->Payment->callWebService("getBankList");
	    	Cache::write('bancos_'.date("Ymd"),$bancos);
	    	Cache::delete('bancos_'.date("Ymd",strtotime('-1 day' , strtotime ( date("Ymd") ))));
	    }
	    return $bancos;
	}

	public function add() {
		
		$bancos 		= $this->get_banks();
	    $user_info 		= $this->Session->read("User");
	    $person_info 	= $this->Session->read("Person");

	    if (is_null($user_info) || is_null($person_info)) {
	    	$this->redirect(array("controller"=>"users","action"=>"add"));
	    }

		if ($this->request->is('post')) {
			$this->loadModel("User");
			$reference = md5(uniqid());
			$atributes 						= $this->request->data["Payment"];
			$atributes["reference"] 		= $reference;
			$atributes["description"] 		= "Pago de productos electrónicos";
			$atributes["language"] 	  		= "ES";
			$atributes["currency"] 	  		= "COP";
			$atributes["totalAmount"] 		= $user_info["producto"];
			$atributes["taxAmount"]   		= "0";
			$atributes["devolutionBase"]   	= "0";
			$atributes["tipAmount"]   		= "0";
			$atributes["payer"]   			= $this->User->create_person($user_info);
			$atributes["buyer"]   			= $this->User->create_person($user_info);
			$atributes["shipping"]   		= $this->User->create_person($user_info);
			$atributes["ipAddress"]   		= $this->getRealIP();
			$atributes["userAgent"]   		= $_SERVER['HTTP_USER_AGENT'];
			$atributes["returnURL"]   		= Router::url("/",true)."payments/terminate/".$reference;

			$transaction 	= array("transaction"=>$this->Payment->create_transaction($atributes));
			$response 		= $this->Payment->callWebService("createTransaction",$transaction);
			$atributes 		= array_merge($atributes,$response);

			$atributes["user_id"] = $this->User->createUser($user_info);

			unset($atributes["payer"],$atributes["buyer"],$atributes["shipping"]);

			$this->Payment->save($atributes);
			if ($response["returnCode"] == "SUCCESS") {
				$this->redirect($response["bankURL"]);
			}

		}

		$this->set(compact("bancos","user_info"));
	}

	public function terminate($reference){

		$payment = $this->Payment->findByReference($reference);
		if (empty($payment)) {
			$this->redirect(array("controller"=>"users","action"=>"add"));
		}
		$datosPago = $this->Payment->get_transaction_information($payment["Payment"]["transactionID"]);
		$payment["Payment"] = array_merge($payment["Payment"],$datosPago);
		
		$this->Payment->id = $payment["Payment"]["id"];

		$this->Payment->save($payment);

		$this->set(compact("payment"));

	}


	public function getRealIP()
    { 
      if (isset($_SERVER["HTTP_CLIENT_IP"])){
         return $_SERVER["HTTP_CLIENT_IP"];
      }
      elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
         return $_SERVER["HTTP_X_FORWARDED_FOR"];
      }
      elseif (isset($_SERVER["HTTP_X_FORWARDED"])){
         return $_SERVER["HTTP_X_FORWARDED"];
      }
      elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])){
         return $_SERVER["HTTP_FORWARDED_FOR"];
      }
      elseif (isset($_SERVER["HTTP_FORWARDED"])){
         return $_SERVER["HTTP_FORWARDED"];
      }
      else{
         return $_SERVER["REMOTE_ADDR"];
      }
    }

}
