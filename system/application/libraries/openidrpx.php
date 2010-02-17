<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
* OpenIDRpx 0.92
* For easy OpenID handling using the RPX service, http://rpxnow.com/
*
* @access public
* @author Andreas Söderlund, ciscoheat CARE OF gmail DOT com
*/
class OpenIDRpx
{
	protected $authInfoUrl = 'https://rpxnow.com/api/v2/auth_info';
	protected $widgetUrl = 'https://rpxnow.com/openid/v2/widget';
	
    private $apiKey;
    private $realm;
    
    private $ch;

	public function __construct($params)
	{
        $ci =& get_instance();
        $ci->config->load('openidrpx');
        
        $this->apiKey = $ci->config->item('openidrpx_apikey');
        $this->realm = $ci->config->item('openidrpx_realm');
	}

	///// Public methods ////////////////////////////////////////////

	/**
	* Return auth_info as XML
	*/
	public function AuthInfoXml($token)
	{
		return $this->authGet($this->authInfoUrl . '?format=xml', $token);
	}

	/**
	* Return auth_info as Json
	*/
	public function AuthInfoJson($token)
	{
		return $this->authGet($this->authInfoUrl, $token);
	}
	
	/**
	* Return auth_info as a PHP object.
	* Remember that the output data is UTF8-encoded.
	*/
	public function AuthInfo($token)
	{
		$output = $this->AuthInfoJson($token);
		
		return json_decode($output);
	}
	
	/**
	* URL for the javascript when using the popup sign-in interface
	*/
	public function WidgetUrl()
	{
		return $this->widgetUrl;
	}
	
	/**
	* URL when using the iframe embedded interface.
	*/
	public function EmbedUrl($returnTo, $hideText = true)
	{
        $url = $this->baseUrl('embed', $returnTo);
		
		if($hideText)
			$url .= '&flags=hide_sign_in_with';
		
		return $url;
	}

	/**
	* URL for login buttons when using the popup sign-in interface.
	*/
	public function SignInUrl($returnTo)
	{
		return $this->baseUrl('v2/signin', $returnTo);
	}

	/**
	* When the AuthInfo is received, this method can extract the identifier
	* for immediate use. Returns false if 
	*/
	public static function Identifier($authInfo)
	{
		if(isset($authInfo->stat) && $authInfo->stat == 'ok')
			return $authInfo->profile->identifier;
		else
			return false;
	}
	
	/////////////////////////////////////////////////////////////////
	
	private function baseUrl($action, $returnTo)
	{
        $ci =& get_instance();
        $ci->load->helper('url');
        
		$url = 'https://' . $this->realm . '.rpxnow.com/openid/' . $action . '?token_url=';
		$url .= urlencode(site_url($returnTo));
		
		return $url;
	}
	
	private function authGet($url, $token)
	{
		$this->curlInit($url);
		return $this->curlPost(array('apiKey' => $this->apiKey, 'token' => $token));
	}
	
	///// Curl methods //////////////////////////////////////////////
	
	private function curlExecute()
	{
		return curl_exec($this->ch);
	}

	private function curlGet()
	{
		curl_setopt($this->ch, CURLOPT_POST, false);
		
		return $this->curlExecute();
	}
	
	private function curlPost($array)
	{
		curl_setopt($this->ch, CURLOPT_POST, true);
		curl_setopt($this->ch, CURLOPT_POSTFIELDS, http_build_query($array));
		
		return $this->curlExecute();
	}
	
	private function curlInit($url)
	{
		if(!$this->ch)
		{
			$this->ch = curl_init();

			curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, false);

			curl_setopt($this->ch, CURLOPT_HEADER, false);
			curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
		}

		if($url)
			curl_setopt($this->ch, CURLOPT_URL, $url);
	}
}

