<?php

namespace Acme\ShopBundle\DataFixtures\ORM;

use Acme\ShopBundle\Entity\Product;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadData implements FixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $tv = new Product();
        $tv->setName("T.V.");

        $phone = new Product();
        $phone->setName("Phone");

        $camera = new Product();
        $camera->setName("Camera");

        $manager->persist($tv);
        $manager->persist($phone);
        $manager->persist($camera);

        $manager->flush();
    }

} 