<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductSampleData extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $product1 = new Product();
        $product1->setName('Product 1');
        $product1->setPrice(10.99);
        $product1->setDescription('Description for product 1');
        $manager->persist($product1);

        $product2 = new Product();
        $product2->setName('Product 2');
        $product2->setPrice(20.99);
        $product2->setDescription('Description for product 2');
        $manager->persist($product2);

        $manager->flush();
    }
}
