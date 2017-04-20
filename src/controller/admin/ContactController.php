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

        $contact = $contactManager->findAll();


        if (isset($_POST['contactLus'])) {
            $contactLus = $contactManager->updateLus($_POST);



            return $this->twig->render('contact/Contact.twig', array('contacts' => $contact,
                                                                     'contactLus' => $contactLus));
        }
        return $this->twig->render('contact/Contact.twig', array('contacts' => $contact,));
    }
}