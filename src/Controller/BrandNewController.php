<?php

namespace App\Controller;

use App\Entity\Blog;
use App\Repository\BlogRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BrandNewController extends AbstractController
{
    #[Route('/', name: 'app_brand_new')]
    public function index(BlogRepository $blogRepository, EntityManagerInterface $em): Response
    {
//        $blog = $blogRepository->findOneBy(['id' => 2]);
//        $blog->setTitle('New title title');
//        $em->flush();
//        exit();

        $blog = (new Blog())
            ->setTitle('Title')
            ->setText('Text')
            ->setDescription('Description')
            ;

        $em->persist($blog);
        $em->flush();
//        exit;

        return $this->render('brand_new/index.html.twig', []);
    }
}
