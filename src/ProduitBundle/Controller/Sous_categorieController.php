<?php

namespace ProduitBundle\Controller;

use ProduitBundle\Entity\Sous_categorie;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Sous_categorie controller.
 *
 * @Route("sous_categorie")
 */
class Sous_categorieController extends Controller
{
    /**
     * Lists all sous_categorie entities.
     *
     * @Route("/", name="sous_categorie_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sous_categories = $em->getRepository('ProduitBundle:Sous_categorie')->findAll();

        return $this->render('sous_categorie/index.html.twig', array(
            'sous_categories' => $sous_categories,
        ));
    }

    /**
     * Creates a new sous_categorie entity.
     *
     * @Route("/new", name="sous_categorie_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $sous_categorie = new Sous_categorie();
        $form = $this->createForm('ProduitBundle\Form\Sous_categorieType', $sous_categorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sous_categorie);
            $em->flush();

            return $this->redirectToRoute('sous_categorie_show', array('id' => $sous_categorie->getId()));
        }

        return $this->render('sous_categorie/new.html.twig', array(
            'sous_categorie' => $sous_categorie,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a sous_categorie entity.
     *
     * @Route("/{id}", name="sous_categorie_show")
     * @Method("GET")
     */
    public function showAction(Sous_categorie $sous_categorie)
    {
        $deleteForm = $this->createDeleteForm($sous_categorie);

        return $this->render('sous_categorie/show.html.twig', array(
            'sous_categorie' => $sous_categorie,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing sous_categorie entity.
     *
     * @Route("/{id}/edit", name="sous_categorie_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Sous_categorie $sous_categorie)
    {
        $deleteForm = $this->createDeleteForm($sous_categorie);
        $editForm = $this->createForm('ProduitBundle\Form\Sous_categorieType', $sous_categorie);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sous_categorie_edit', array('id' => $sous_categorie->getId()));
        }

        return $this->render('sous_categorie/edit.html.twig', array(
            'sous_categorie' => $sous_categorie,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a sous_categorie entity.
     *
     * @Route("/{id}", name="sous_categorie_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Sous_categorie $sous_categorie)
    {
        $form = $this->createDeleteForm($sous_categorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($sous_categorie);
            $em->flush();
        }

        return $this->redirectToRoute('sous_categorie_index');
    }

    public function RemoveScAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $SousCateg= $em->getRepository('ProduitBundle:Sous_categorie')->find($id);


        $em->remove($SousCateg);
        $em->flush();

        return $this->redirectToRoute('sous_categorie_index');
    }

    /**
     * Creates a form to delete a sous_categorie entity.
     *
     * @param Sous_categorie $sous_categorie The sous_categorie entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Sous_categorie $sous_categorie)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('sous_categorie_delete', array('id' => $sous_categorie->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
