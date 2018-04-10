<?php
date_default_timezone_set('America/Bogota');
date_default_timezone_set('America/Bogota');
ini_set('max_execution_time', 180);
ini_set("default_socket_timeout", 180);

App::uses('AppModel', 'Model');
/**
 * Payment Model
 *
 */
class Payment extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */

	public $validate = array(
		'id_reference' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'transaction_date' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);


	public function callWebService($function,$params = array()){

        $params["auth"] = $this->get_auth();

        try {

        	$datos = array(
		        "trace" => 1,
		        "location" => Configure::read("PSE.location"),
		        'exceptions' => 1,
		        "stream_context" => stream_context_create(
		            array(
		                'ssl' => array(
		                    'verify_peer'       => false,
		                    'verify_peer_name'  => false,
		                )
		            )
		        )
			) ;

			$service = new SoapClient(Configure::read("PSE.wsdl"),$datos);
	        $response = $service->__soapCall($function, array($params));
	        switch ($function){
	            case "getTransactionInformation"://consultar informacion de transaccion
	                return get_object_vars($response->getTransactionInformationResult);
	                break;
	            case "createTransaction"://crear nueva transaccion
	                return get_object_vars($response->createTransactionResult);
	                break;
	            case "getBankList"://obtener lista de bancos
	                return $response->getBankListResult->item;
	                break;
	            default:
	                return null;
	                break;
	        }
		}
		catch(Exception $e) {
			echo "<pre>";
			var_dump($e->getMessage());
			echo die();
		}
        
    }

    public function create_transaction($params){
    	return new PSETransactionRequest($params);
    }

    public function get_transaction_information($id){
    	$atributos = $this->callWebService('getTransactionInformation',array("transactionID" => $id));
    	return $atributos;
    }

    private function get_auth($additional = null){

    	return new Authentication(Configure::read("PSE.auth.login"),Configure::read("PSE.auth.tranKey"),null);
    }

    public function datos(){

    	$wsdl = "https://test.placetopay.com/soap/pse";


    	$params["auth"] = $this->get_auth();
		$options = array(
				'uri'=>'https://test.placetopay.com/soap/pse',
				'style'=>SOAP_RPC,
				'use'=>SOAP_ENCODED,
				'soap_version'=>SOAP_1_1,
				'cache_wsdl'=>WSDL_CACHE_NONE,
				'connection_timeout'=>15,
				'verifypeer' => false,
				'verifyhost' => false,
				'trace'=>true,
				'encoding'=>'UTF-8',
				'exceptions'=>true,
			);
		try {

			$soap = new SoapClient($wsdl, $options);

			$data = $soap->getBankList(array("login"=>"akjsksajsa"));

			//$soap->getBankList(array("auth"=>Configure::read("PSE.auth"));

			//$soapClient = new SoapClient('https://test.placetopay.com/soap/pse/?wsdl',array("stream_context" => stream_context_create(array('ssl' => array('ciphers'=>'AES256-SHA')))));

			//$data = $soapClient->getBankList($params);
		}
		catch (SoapFault $fault) {
			echo "<pre>";
			var_dump($fault);
		    echo 'poop';
		    die();
		}
		catch(Exception $e) {
			die($e->getMessage());
		}
		echo "<pre>";
		var_dump($data);
		die;
    }



}


class Authentication
{
    private $login;
    private $tranKey;
    private $seed;
    private $additional;

    public function __construct($login, $tranKey, $additional = null)
    {
        $this->login = $login;
        $this->seed = date('c');
        $this->tranKey = sha1($this->seed . $tranKey, false);
        $this->additional = ($additional) ? $additional : null;
    }
}

class PSETransactionRequest
{
    private $bankCode;
    private $bankInterface;
    private $returnURL;
    private $reference;
    private $description;
    private $language;
    private $currency;
    private $totalAmount;
    private $taxAmount;
    private $devolutionBase;
    private $tipAmount;
    private $payer;
    private $buyer;
    private $shipping;
    private $ipAddress;
    private $userAgent;
    private $additionalData;

    
    public function __construct($attributes)
    {
        $this->bankCode = $attributes['bankCode'];
        $this->bankInterface = $attributes['bankInterface'];
        $this->returnURL = $attributes['returnURL'];
        $this->reference = $attributes['reference'];
        $this->description = $attributes['description'];
        $this->language = $attributes['language'];
        $this->currency = $attributes['currency'];
        $this->totalAmount = $attributes['totalAmount'];
        $this->taxAmount = $attributes['taxAmount'];
        $this->devolutionBase = $attributes['devolutionBase'];
        $this->tipAmount = $attributes['tipAmount'];
        $this->payer = $attributes['payer'];
        $this->buyer = $attributes['buyer'];
        $this->shipping = $attributes['shipping'];
        $this->additionalData = "";
        $this->ipAddress = $attributes['ipAddress'];
        $this->userAgent = $attributes['userAgent'];

    }
}