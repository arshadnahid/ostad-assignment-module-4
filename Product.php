<?php

class Product
{
    private int $id;
    private string $name;
    private float $price;


    private static array $assignedIds = [];
    public function __construct(int $id, string $name, float $price)
    {
        if ($this->isIdUnique($id)) {
            $this->id = $id;
            // Add the ID to the list of assigned IDs
            self::$assignedIds[] = $id;
        } else {
            die("<br>ID $id is not unique.");

        }
        $this->name = $name;
        $this->price = $price;
    }
    private function isIdUnique(int $id): bool {
        return !in_array($id, self::$assignedIds, true);
    }
    public function getFormattedPrice(): string {
        // Format the price with two decimal places
        return '$' . number_format($this->price, 2);
    }

    public function showDetails(): void {
        echo "Product Details:\n" .
            "- ID: {$this->id}\n" .
            "- Name: {$this->name}\n" .
            "- Price: {$this->getFormattedPrice()}\n<br>";
    }

}

$product = new Product(1, 'T-shirt', 19.99);
$product->showDetails();


