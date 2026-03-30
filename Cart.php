<?php
class Cart {
    private $items = [];
    
    public function add(Product $product, $quantity = 1) {
        $id = $product->getId();
        if (isset($this->items[$id])) {
            $this->items[$id]['quantity'] += $quantity;
        } else {
            $this->items[$id] = ['product' => $product, 'quantity' => $quantity];
        }
    }
    
    public function remove($productId) {
        unset($this->items[$productId]);
    }
    
    public function getItems() {
        return $this->items;
    }
    
    public function getTotal() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['product']->getPrice() * $item['quantity'];
        }
        return $total;
    }
    
    public function clear() {
        $this->items = [];
    }
}
?>
