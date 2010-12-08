<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Zacl
{
    function __construct()
    {
        session_start();
        //Append Zend's folder in PHP's include path
        set_include_path(get_include_path() . PATH_SEPARATOR . BASEPATH . "application/Custom");

        //Load the Acl class
        require_once 'Zend/Acl.php';
        require_once 'Zend/Acl/Role.php';
        require_once 'Zend/Acl/Resource.php';

        //Create a new Acl object
        $this->acl = new Zend_Acl();

        /**
         * Add roles and resources. Check Zend's documentation for excellent
         * information on all these.
         * http://framework.zend.com/manual/en/zend.acl.html
         */
        $this->acl->addRole(new Zend_Acl_Role('guest'));
        $this->acl->addRole(new Zend_Acl_Role('users'),array('guest'));

        /**
         * Add some resources
         */
        $this->acl->add(new Zend_Acl_Resource('users_login'));
        $this->acl->add(new Zend_Acl_Resource('users_profile'));

        /**
         * Set rules for Acl
         */
        $this->acl->deny(); //Deny everything, so as to follow a whitelist approach.
        $this->acl->allow('guest','users_login');
        $this->acl->allow('users','users_profile');
    }

    function check_acl($resource)
    {
        if (!$this->acl->has($resource))
        {
            return 1;
        }

        if (isset($_SESSION['user_id']))
        {
            $role = 'users';
        }
        else
        {
            $role = 'guest';
        }

        return $this->acl->isAllowed($role,$resource);
    }

}