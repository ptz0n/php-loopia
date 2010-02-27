<?php
/* 
 * phpLoopia Class 1.0
 * Written by Erik Pettersson (mail@ptz0n.se)
 * Project Home Page: http://wiki.github.com/ptz0n/phpLoopia/
 * Released under GNU Lesser General Public License (http://www.gnu.org/copyleft/lgpl.html)
 *
 *	 Please submit all issues to the GitHub project page:
 *	 http://github.com/ptz0n/phpLoopia/issues
 */


class phpLoopia
{
	var $username;
	var $password;
	var $reseller;


	function phpLoopia($username, $password, $reseller = false)
	{
	   $this->username = $username;
	   $this->password = $password;
	   $this->reseller = $reseller;
	}
	

    /*
     * Get XML-RPC Response
     */
    function call($request)
    {
        $context = stream_context_create(array("http" => array('method' => "POST", 'header' => "Content-Type: text/xml", 'content' => $request)));
        $file = file_get_contents("https://api.loopia.se/RPCSERV", false, $context);
        $response = xmlrpc_decode($file);
        return $response;
    }


    /*
     * addDomainToAccount
     * https://www.loopia.se/api/adddomaintoaccount/
     */
    function addDomainToAccount($domain, $buy, $customer_number = null)
    {
        if($this->reseller == true) $request = xmlrpc_encode_request("addDomainToAccount", array($this->username, $this->password, $customer_number, $domain, $buy));
        else $request = xmlrpc_encode_request("addDomainToAccount", array($this->username, $this->password, $domain, $buy));
        return $this->call($request);
    }


    /*
     * addSubdomain
     * https://www.loopia.se/api/adddomaintoaccount/
     */
    function addSubdomain($domain, $subdomain, $customer_number = null)
    {
        if($this->reseller == true) $request = xmlrpc_encode_request("addSubdomain", array($this->username, $this->password, $customer_number, $domain, $subdomain));
        else $request = xmlrpc_encode_request("addSubdomain", array($this->username, $this->password, $domain, $subdomain));
        return $this->call($request);
    }


    /*
     * addZoneRecord
     * https://www.loopia.se/api/adddomaintoaccount/
     * https://www.loopia.se/api/record_obj/
     */
    function addZoneRecord($domain, $subdomain, $record_obj, $customer_number = null)
    {
        if($this->reseller == true) $request = xmlrpc_encode_request("addZoneRecord", array($this->username, $this->password, $customer_number, $domain, $subdomain, $record_obj));
        else $request = xmlrpc_encode_request("addZoneRecord", array($this->username, $this->password, $domain, $subdomain, $record_obj));
        return $this->call($request);
    }


    /*
     * domainIsFree
     * https://www.loopia.se/api/domainisfree/
     */
    function domainIsFree($domain)
    {
        $request = xmlrpc_encode_request("domainIsFree", array($this->username, $this->password, $domain));
        return $this->call($request);
    }


    /*
     * getDomain
     * https://www.loopia.se/api/getdomain/
     */
    function getDomain($domain, $customer_number = null)
    {
        if($this->reseller == true) $request = xmlrpc_encode_request("getDomain", array($this->username, $this->password, $customer_number, $domain));
        else $request = xmlrpc_encode_request("getDomain", array($this->username, $this->password, $domain));
        return $this->call($request);
    }


    /*
     * getDomains
     * https://www.loopia.se/api/getdomains/
     */
    function getDomains($customer_number = null)
    {
        if($this->reseller == true) $request = xmlrpc_encode_request("getDomains", array($this->username, $this->password, $customer_number));
        else $request = xmlrpc_encode_request("getDomains", array($this->username, $this->password));
        return $this->call($request);
    }


    /*
     * getSubdomains
     * https://www.loopia.se/api/getsubdomains/
     */
    function getSubdomains($domain, $customer_number = null)
    {
        if($this->reseller == true) $request = xmlrpc_encode_request("getSubdomains", array($this->username, $this->password, $customer_number, $domain));
        else $request = xmlrpc_encode_request("getSubdomains", array($this->username, $this->password, $domain));
        return $this->call($request);
    }


    /*
     * getZoneRecords
     * https://www.loopia.se/api/getzonerecords/
     */
    function getZoneRecords($domain, $subdomain, $customer_number = null)
    {
        if($this->reseller == true) $request = xmlrpc_encode_request("getZoneRecords", array($this->username, $this->password, $customer_number, $domain, $subdomain));
        else $request = xmlrpc_encode_request("getZoneRecords", array($this->username, $this->password, $domain, $subdomain));
        return $this->call($request);
    }


    /*
     * payInvoiceUsingCredits
     * https://www.loopia.se/api/payinvoiceusingcredits/
     */
    function payInvoiceUsingCredits($reference_no, $customer_number = null)
    {
        if($this->reseller == true) $request = xmlrpc_encode_request("payInvoiceUsingCredits", array($this->username, $this->password, $customer_number, $reference_no));
        else $request = xmlrpc_encode_request("payInvoiceUsingCredits", array($this->username, $this->password, $reference_no));
        return $this->call($request);
    }


    /*
     * removeSubdomain
     * https://www.loopia.se/api/removesubdomain/
     */
    function removeSubdomain($domain, $subdomain, $customer_number = null)
    {
        if($this->reseller == true) $request = xmlrpc_encode_request("removeSubdomain", array($this->username, $this->password, $customer_number, $domain, $subdomain));
        else $request = xmlrpc_encode_request("removeSubdomain", array($this->username, $this->password, $domain, $subdomain));
        return $this->call($request);
    }


    /*
     * removeZoneRecord
     * https://www.loopia.se/api/removezonerecord/
     */
    function removeZoneRecord($domain, $subdomain, $record_id, $customer_number = null)
    {
        if($this->reseller == true) $request = xmlrpc_encode_request("removeZoneRecord", array($this->username, $this->password, $customer_number, $domain, $subdomain, $record_id));
        else $request = xmlrpc_encode_request("removeZoneRecord", array($this->username, $this->password, $domain, $subdomain, $record_id));
        return $this->call($request);
    }


    /*
     * updateZoneRecord
     * https://www.loopia.se/api/removezonerecord/
     */
    function updateZoneRecord($domain, $subdomain, $record_obj, $customer_number = null)
    {
        if($this->reseller == true) $request = xmlrpc_encode_request("updateZoneRecord", array($this->username, $this->password, $customer_number, $domain, $subdomain, $record_obj));
        else $request = xmlrpc_encode_request("updateZoneRecord", array($this->username, $this->password, $domain, $subdomain, $record_obj));
        return $this->call($request);
    }
}