<?php
/* 
 * phpLoopia Class 1.0.1
 * Written by Erik Pettersson (mail@ptz0n.se)
 * Project Home Page: http://wiki.github.com/ptz0n/phpLoopia/
 * Loopia API Documentation: https://www.loopia.se/api
 * Released under GNU Lesser General Public License (http://www.gnu.org/copyleft/lgpl.html)
 *
 *	 Please submit all issues to the GitHub project page:
 *	 http://github.com/ptz0n/phpLoopia/issues
 *
 * Thanks to: Anton Lindqvist and Robert Lord!
 */

class phpLoopia
{
    private $_username, $_password;


    public function __construct($username, $password)
    {
        $this->_username = $username;
        $this->_password = $password;
    }


    /*
     * Magic Methods
     * For full details on available method calls visit https://www.loopia.se/api
     */
    public function __call($method, $params)
    {
        $params = array_merge(array($this->_username, $this->_password), $params);
        $request = xmlrpc_encode_request($method, $params);

        return $this->_request($request);
    }


    /*
     * Get XML-RPC Response
     */
    private function _request($request)
    {
        $context = stream_context_create(array('http' => array('method' => 'POST','header' => 'Content-Type: text/xml','content' => $request)));
        $response = file_get_contents('https://api.loopia.se/RPCSERV', false, $context);
        $response = xmlrpc_decode($response);

        return $response;
    }
}