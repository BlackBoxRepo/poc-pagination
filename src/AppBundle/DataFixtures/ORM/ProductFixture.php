<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ProductFixture implements FixtureInterface {

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     * @internal param $ |\Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $shorts = new \AppBundle\Entity\Product();
        $shorts->setDescription("shorts that are sweet");
        $shorts->setName("Nike Shorts");
        $shorts->setSlug("shortsSlug");
        $manager->persist($shorts);

        $shirt = new \AppBundle\Entity\Product();
        $shirt->setDescription("shirt that are sweet");
        $shirt->setName("Nike shirt");
        $shirt->setSlug("shirtSlug");
        $manager->persist($shirt);

        $pants = new \AppBundle\Entity\Product();
        $pants->setDescription("pants that are sweet");
        $pants->setName("Nike pants");
        $pants->setSlug("pantsSlug");
        $manager->persist($pants);


        $manager->flush();

    }
}