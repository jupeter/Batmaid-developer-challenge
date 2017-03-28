<?php

namespace AppBundle\Controller;

use AppBundle\Entity\AgentDecline;
use AppBundle\Form\Type\AgentDeclineType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $entity = new AgentDecline();

        $form = $this->createForm(AgentDeclineType::class, $entity);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                if ($request->isXmlHttpRequest()) {
                    return new JsonResponse(array(
                        'status' => 'success',
                    ));
                }

                // replace this example code with whatever you need
                return $this->render('default/index.html.twig', array(
                    'message' => array(
                        'type' => 'success',
                        'content' => 'Reason submitted successfully.',
                    ),
                ));
            }

            if ($request->isXmlHttpRequest()) {
                return new JsonResponse(array(
                    'status' => 'failed',
                    'message' => $this->getFormErrors($form),
            ));
            }
        }

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    protected function getFormErrors(Form $form)
    {
        $errors = array();

        // Global
        foreach ($form->getErrors() as $error) {
            $errors[] = $error->getMessage();
        }

        // Fields
        foreach ($form as $child /* @var Form $child */) {
            if (!$child->isValid()) {
                foreach ($child->getErrors() as $error) {
                    $errors[] = $error->getMessage();
                }
            }
        }

        return $errors;
    }
}
