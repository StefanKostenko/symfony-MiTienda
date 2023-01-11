<?php
namespace App\Service;
use App\Entity\Product;
use Symfony\Component\HttpFoundation\RequestStack;
use Doctrine\Persistence\ManagerRegistry;

class CartService{
    private const KEY = '_cart';
    private $requestStack;
    private $doctrine;
    private $repository;
    public function __construct(RequestStack $requestStack, ManagerRegistry $doctrine)
    {
        $this->requestStack = $requestStack;
        $this->doctrine = $doctrine;
        $this->repository = $doctrine->getRepository(Product::class);
    }
    public function productCart()
    {
        return $this->repository->getFromCart($this);
    }
    
    public function totalCart(){
        $products = $this->repository->getFromCart($this);
        //hay que añadir la cantidad de cada producto
        $items = [];
        $totalCart = 0;
        foreach($products as $product){
            $item = [
                "id"=> $product->getId(),
                "price" => $product->getPrice(),
                "quantity" => $this->getCart()[$product->getId()]
            ];
            $totalCart += $item["quantity"] * $item["price"];
            
        }
        return $totalCart;
    }

    public function getSession()
    {
        return $this->requestStack->getSession();
    }
    public function getCart(): array {
        return $this->getSession()->get(self::KEY, []);
    }
    public function add(int $id, int $quantity = 1){
        //https://symfony.com/doc/current/session.html
        $cart = $this->getCart();
        $cart[$id] = $quantity;
        $this->getSession()->set(self::KEY, $cart);
    }

    public function update(int $id, int $quantity = 1){
        $cart = $this->getCart();
        $cart[$id] = $quantity;
        $this->getSession()->set(self::KEY, $cart);
    }
    
    public function delete(int $id){
        $cart = $this->getCart();
        unset($cart[$id]);
        $this->getSession()->set(self::KEY, $cart);
    }

    public function totalItems(){
        return array_sum($this->getCart());
    }
}