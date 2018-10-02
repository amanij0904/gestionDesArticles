<?php

namespace ApiBundle\DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle\Fixture;
// use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ApiBundle\Entity\Article;

class LoadPostData extends Fixture
{
   public function load(ObjectManager $manager)
   {
        for ($i = 0; $i < 20; $i++) {
            $article = new Article();
            $article->setName('article '.$i);
            $article->setDescription('Description '.$i);
            $article->setDetails('Details '.$i);
            $article->setPriceht(mt_rand(10, 100));
            $article->setPricetc(mt_rand(10, 100));
            $article->setOrderArticle('Order'.$i);
            
            $manager->persist($article);
        }

        $manager->flush();
    }
}