<?php
    abstract class Cart {
        abstract public function GetCart();
        abstract public function AddToCart($product);
    }

    class Session extends Cart {
        private $productList = [];
        private $sessionId = 0;
        private $sessionDateTime;
        function __construct() {
            $this->sessionId = rand(1, 10000);
            $this->sessionDateTime = new DateTime();
        }

        public function GetCart() {
            return $this->productList;
        }
        public function AddToCart($product) {
            $this->productList[] = $product;
        }

        function isSessionLive($date) {
            $interval = $this->sessionDataTime->diff($date);
            if ($interval->h === 0 & $interval->i <= 5) {
                return true;
            } else return false;
        }
    }
?>