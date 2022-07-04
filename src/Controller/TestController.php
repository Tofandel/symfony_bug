<?php

namespace App\Controller;

use App\Entity\CaseFolder;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class TestController extends AbstractController
{
    public function __construct(
        protected ManagerRegistry $registry) {

    }
    #[Route('/test', name: 'app_create_test')]
    public function create()
    {
        $repo = $this->registry->getRepository(CaseFolder::class);

        $cf = new CaseFolder();
        $cf->setTest(2);
        $repo->add($cf, true);

        return new Response('Ok');
    }

    #[Route('/test/{id}', name: 'app_update_test')]
    public function update(
        string $id)
    {
        // Notice the slash added before the class, this is what triggers the issue
        $repo = $this->registry->getRepository('\\' . CaseFolder::class);

        $cf = $repo->find($id);
        $cf->setTest($cf->getTest() +1);
        $repo->add($cf, true);

        return new Response('Ok');
    }
}
