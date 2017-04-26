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
    /*
     * Méthodes pour instancier les changements de statut des contacts reçus
     */
    public function index()
    {

        $contactManager = new ContactManager($this->bdd, Contact::class);

        $contact = $contactManager->findAll();


        if (isset($_POST['contactLus'])) {
            $contactLus = $contactManager->contactLus($_POST);
            header('location:index.php?p=contact');

        }elseif (isset($_POST['contactArchive'])) {
            $contactArchive = $contactManager->contactArchive($_POST);
            header('location:index.php?p=contact');

        }elseif (isset($_POST['contactDelete'])) {
            $contactDelete = $contactManager->contactDelete($_POST);
            header('location:index.php?p=contact');

        }

        return $this->twig->render('contact/Contact.twig', array('contacts' => $contact,));
    }
}