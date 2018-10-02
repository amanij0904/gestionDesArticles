<?php

namespace ApiBundle\Controller;

use ApiBundle\Entity\Article;
use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FOS\RestBundle\View\View;
use Symfony\Bundle\FrameworkBundle\Templating\TemplateReference;
use ApiBundle\Form\ArticleType;
use FOS\RestBundle\Routing\ClassResourceInterface;


class ArticleController extends FOSRestController implements ClassResourceInterface
{
   
    /**
     * @Rest\View()
     * @Rest\Get("/articles")
     */
    public function getArticlesAction()
    {
        $em = $this->getDoctrine()->getManager();

        $articles = $em->getRepository('ApiBundle:Article')->findBy(array(), array('id' => 'desc'));

        return $articles;
    }

    

    /**
     * @Rest\View()
     * @Rest\Post("/articles")
     */
    public function postArticlesAction( Request $request)
    {
        $article = new Article();
        $article
                ->setName($request->get('name'))
                ->setDescription($request->get('description'))
                ->setDetails($request->get('details'))
                ->setPricetc($request->get('pricetc'))
                ->setPriceht($request->get('priceht'))
                ->setOrderArticle($request->get('orderArticle'))
                ;


        
        $em = $this->getDoctrine()->getManager();
        $em->persist($article);
        $em->flush();

        var_dump("from symfony : ", $article);

         return $article;

    }

    /**
     * @Rest\View()
     * @Rest\Get("/articles/{id}")
     */
    public function getArticleAction(Article $article)
    {
        return $article;
    }

  
    /**
     * @Rest\View()
     * @Rest\Put("/articles/{id}")
     */
    public function putArticleAction( Article $article, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $article = $em->getRepository('ApiBundle:Article')->find($request->get('id')); 
      

        if (empty($article)) {
            return new JsonResponse(['message' => 'article not found'], Response::HTTP_NOT_FOUND);
        }

        $form = $this->createForm(ArticleType::class, $article);

        $form->submit($request->request->all());

        if ($form->isValid()) {
            
            $em = $this->getDoctrine()->getManager();
            $em->merge($article);
            $em->flush();
            
            return $article;
        } else {
            return $form;
        }
    }

       
    /**
     * @Rest\View()
     * @Rest\Delete("/articles/{id}")
     */
    public function removeArticleAction(Request $request, Article $article)
    {

        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository('ApiBundle:Article')->find($request->get('id')); 

        if ($article) {
            $em->remove($article);
            $em->flush();
        }
        $articles = $em->getRepository('ApiBundle:Article')->findAll(); 
        return $articles;
    }

    
    private function createDeleteForm(Article $article)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('article_delete', array('id' => $article->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
