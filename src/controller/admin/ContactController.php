<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 04/04/17
 * Time: 22:38
 */

namespace wcs\controller\admin;
use wcs\controller\Controller;
use wcs\model\Contact;
use wcs\model\ContactManager;

class ContactController extends Controller
{
    public function index()
    {
        $contactManager = new ContactManager($this->bdd, Contact::class);
        $param = ["content" => $contactManager->findAll()];

        return $this->twig->render('contact/Contact.twig', $param);
    }
}