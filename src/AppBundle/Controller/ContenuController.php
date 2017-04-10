<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 04/04/2017
 * Time: 11:39
 */

namespace AppBundle\Controller;


use AppBundle\Entity\ContenuConte;
use AppBundle\Form\ContenuConteType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ContenuController extends Controller
{
    /**
     *
     * @Route("/add", name="ajoutConte")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request) {
        //On crée un conte
        $conte = new ContenuConte();

        //On récupère le formulaire
        $form = $this->createForm(ContenuConteType::class, $conte);

        //On relie l'objet géré par le formulaire à la requête envoyée quand le formulaire est soumis
        $form->handleRequest($request);

        //Si le formulaire a été soumis
        if ($form->isSubmitted() && $form->isValid()) {

            //on enregistre le produit en bdd
            $em = $this->getDoctrine()->getManager();

            $em->persist($conte);
            $em->flush();

            return new Response('Conte enregistré');
        }

        //On génère le HTML du formulaire crée
        $formView = $form->createView();

        //on rend la vue
        return $this->render('ajoutConte.html.twig', array(
            'form'=>$formView
        ));
    }

    /**
     * @Route("/list", name="liste_contes")
     *
     * @return Response
     */
    public function listAction() {

        $repository = $this->getDoctrine()->getRepository('AppBundle:ContenuConte');

        $contes = $repository->findAll();

        return $this->render('conteList.html.twig', array(
          'contes'=>$contes
        ));
    }

    /**
     * @return Response
     *
     * @Route("/edit/{id}", name="edit_conte")
     */
    public function editAction(Request $request, ContenuConte $conte) {

        //On récupère le formulaire
        $form = $this->createForm(ContenuConteType::class, $conte);

        //On relie l'objet géré par le formulaire à la requête envoyée quand le formulaire est soumis
        $form->handleRequest($request);

        //Si le formulaire a été soumis
        if ($form->isSubmitted() && $form->isValid()) {

            //on enregistre le produit en bdd
            $em = $this->getDoctrine()->getManager();

            $em->flush();

            return new Response('Conte modifié !');
        }

        //On génère le HTML du formulaire crée
        $formView = $form->createView();

        //on rend la vue
        return $this->render('ajoutConte.html.twig', array(
            'form'=>$formView
        ));
    }

    /**
     * @Route("/delete/{id}", name="delete_conte")
     *
     * @param ContenuConte $conte
     * @return Response
     */
    public function deleteAction(ContenuConte $conte) {
        $em = $this->getDoctrine()->getManager();

        $em->remove($conte);

        $em->flush();

        return new Response('Conte supprimé !');
    }

}