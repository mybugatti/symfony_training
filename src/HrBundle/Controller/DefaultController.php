<?php

namespace HrBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use HrBundle\Entity\Book;
use HrBundle\Entity\User;
class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('HrBundle:Default:index.html.twig');
    }

    public function createAction()
    {
        $book = new Book();
        $book->setIsbn('9782070752447');
        $book->setTitle('Villa vortex');
        $book->setSummary('11 septembre 2001, un nouveau monde commence...');
        $book->setPublicationYear(new \DateTime("now"));
        $book->setIssueDate(new \DateTime());
        $book->setCreatedAt(new \Datetime());
        $book->setUpdatedAt(new \Datetime());

        $em = $this->getDoctrine()->getManager();
        $em->persist($book);
        $em->flush();

        return new Response('Identifiant du livre ajouté : ' . $book->getId());
    }

    public function showAction($id)
    {
        $bookRepository = $this->getDoctrine()->getRepository('HrBundle:Book');
        $book = $bookRepository->find($id);

        if (!$book) {
            throw $this->createNotFoundException('Aucun livre ne correspond à l\'id '.$id);
        }

        return new Response('Livre consulté : ' . $book->getTitle());
    }

    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $book = $em->getRepository('HrBundle:Book')->find($id);

        if (!$book) {
            throw $this->createNotFoundException('Aucun livre ne correspond à l\'id '.$id);
        }

        $book->setSummary('Attention ! Ouvrir un roman de Dantec c\'est comme entrer en religion...');
        $em->flush();

        return new Response('Livre modifié : ' . $book->getTitle().' - ' .$book->getSummary());
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $book = $em->getRepository('HrBundle:Book')->find($id);

        if (!$book) {
            throw $this->createNotFoundException('Aucun livre ne correspond à l\'id '.$id);
        }

        $em->remove($book);
        $em->flush();

        return new Response('Livre supprimé : ' . $book->getTitle());
    }

    public function createUserAction()
    {
        $user = new User();
        $user->setEmail('t@g.com');
        $user->setPassword('Villavortex');
        $user->setLastname('NW');
        $user->setFirtname('11');
        $user->setAddress('45OAYE');
        $user->setZipCode('512');
        $user->setBirthDate(new \DateTime("now"));
        $user->setCreatedAt(new \Datetime());
        $user->setUpdatedAt(new \Datetime());

        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        return new Response('Identifiant du lecteur ajouté : ' . $user->getId());
    }


    public function loadAction($userId, $bookId)
    {
        $user = new User();
        $book = new Book();

        $bookRepository = $this->getDoctrine()->getRepository('HrBundle:Book');
        $book = $bookRepository->find($bookId);

        if (!$book || !$user) {
            throw $this->createNotFoundException('Aucun livre et auteur ne correspondend à l\'id '.$userId);
        }

        return new Response('Livre : ' . $book->getTitle() . ' emprunté par' .$user->getEmail());
    }

}
