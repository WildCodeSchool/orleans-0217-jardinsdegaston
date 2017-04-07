<?php
/**
 * Created by PhpStorm.
 * User: jeremie
 * Date: 07/04/17
 * Time: 10:44
 */
use \wcs\controller\Controller;
use \wcs\model\Contact;
use \wcs\model\DB;

class ContactController extends Controller
{


    function showOneContact($id)
    {
        $contactTable = new Contact();
        $contact = $contactTable->db->findOne('contact',$id);


        // render de ta view showOneContact.html.twig, ['contact'=>$contact]
        // dans ta vue twig, {{ contact.contenu}} {{contact.titre}}
    }

    function showAllContact($id)
    {
        // findAll($)
        // $contacts = $contactTable->findAll()


    }

    function addAllContact($id)
    {
        $contact = new Contact;
        $contact->setContenu($_POST['contenu']);
        $contact->setTitre('fsdf');

        // $contactTable = new ContactTable;
        $contactTable->insert($contact)


    }
}