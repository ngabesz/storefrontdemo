<?php

namespace App\DataFixtures;

use App\Domain\BillingAddress;
use App\Domain\BillingMethod;
use App\Domain\Customer;
use App\Domain\Order;
use App\Domain\Product;
use App\Domain\ShippingAddress;
use App\Domain\ShippingMethod;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Uid\Uuid;

class OrderFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 20; $i++) {
            $order = $this->createOrder();
            $manager->persist($order);
        }
        $manager->flush();
    }

    private function createOrder(): Order
    {
        $customer = new Customer(Uuid::v4(), 'Eszter', 'Teszt', 'test@domain.com', '+36301234567');
        $order = new Order(
            Uuid::v4(),
            $customer,
            new ShippingAddress(
                'Magyarország',
                1234,
                'Debrecen',
                'Teszt utca 5. 2/7'
            ),
            new ShippingMethod(Uuid::v4(), 'Házhozszállítás', 'gls', 1700),
            new BillingAddress(
                'Magyarország',
                1234,
                'Debrecen',
                'Teszt utca 5. 2/7'
            ),
            new BillingMethod(Uuid::v4(), 'Utánvétel', 'cod', 1500),
        );
        $order->addProduct(new Product(Uuid::v4(), 'Egykezes fakitermerleő segédeszköz', 2, 23000));
        $order->addProduct(new Product(Uuid::v4(), 'Kétkezes fakitermerleő segédeszköz', 1, 35000));
        $order->addProduct(new Product(Uuid::v4(), 'Háromkezes fakitermerleő segédeszköz', 0.5, 46000));
        return $order;
    }
}
