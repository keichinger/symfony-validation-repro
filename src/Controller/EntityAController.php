<?php declare(strict_types=1);

namespace App\Controller;

use App\Entity\EntityA;
use App\Form\EntityAForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EntityAController extends AbstractController
{
    /**
     * @param Request $request
     *
     * @return Response
     */
    public function add (Request $request) : Response
    {
        $entity = new EntityA();

        $form = $this->createForm(EntityAForm::class, $entity, [
            "method" => "post",
            "action" => $this->generateUrl("entity_a.add"),
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            // @todo handle entity appropriately, for now have a look at the debug output
            exit;
        }

        return $this->render("entity-a/add.html.twig", [
            "form" => $form->createView(),
        ]);
    }
}
