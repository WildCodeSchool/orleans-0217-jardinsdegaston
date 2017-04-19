<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 04/04/17
 * Time: 22:38
 */

namespace wcs\controller\admin;
use wcs\controller\Controller;
use wcs\Form\ContactForm;
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

    public function ajoutContact()
    {

//        if (isset($_POST['add'])){
//            $form->setData($_POST);
//            $contactManager = new ContactManager($this->bdd, Contact::class);
//            $contact = $contactManager->addContact($contact);
//            $nomContact = $form->getData('NomContact');
//            $prenomContact = $form->getData('PrenomContact');
//            $emailContact = $form->getData('EmailContact');
//            $telContact = $form->getData('TelContact');
//            $texteContact = $form->getData('TexteContact');
//            $contact->hydrate(0, $nomContact, $prenomContact, $emailContact, $telContact, $texteContact);
//            $contactManager->addContact($contact);
//
//        }
        $contactManager = new ContactManager($this->bdd, Contact::class);
        $contactManager->addContact();
        return $this->index();
    }
}