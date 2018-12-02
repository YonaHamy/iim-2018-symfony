<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Article;
use App\Entity\Contact;
use App\Repository\ArticleRepository;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index(ArticleRepository $repo)
    {
        $repo = $this->getDoctrine()->getRepository(Article::class);

        $articles = $repo->findAll();

        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
            'articles'=>$articles
        ]);
    }

    /**
     * @Route("/",name="home")
     */


    public function home(){
        return $this->render('blog/home.html.twig',[
            'title'=> "Bienvenue !",
        ]);
    }

    /**
     * @Route("/blog/{id}", name="blog_suite")
     */
    public function suite(Article $article){

        return $this->render('blog/suite.html.twig',[
            'article' =>$article
        ]);
    }

    /**
     * @Route("/contact",name="blog_contact")
     */


    public function contact(Request $request,ObjectManager $manager){

        $contact = new Contact();

        $form = $this->createFormBuilder($contact)
            ->add('title', TextType::class, [
                'attr'=>[
                    'placeholder' => "Sujet de votre Message"
                ]
            ])
            ->add('email', EmailType::class, [
            'attr'=>[
            'placeholder' => "Indiquez votre Mail"
            ]
            ])
            ->add('message', TextareaType::class)
            ->add('save', SubmitType::class, array('label' => 'Envoyer le Message'))
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $contact->setCreatedAt(new \DateTime());

            $manager->persist($contact);
            $manager->flush();
        }

        return $this->render('blog/contact.html.twig', array(
            'formMessage' => $form->createView(),
        ));
    }

    /**
     * @Route("/about",name="blog_about")
     */


    public function about(){
        return $this->render('blog/about.html.twig');
    }

}
