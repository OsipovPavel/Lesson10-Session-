<?php
    trait Collect {
        public function AddProduct(&$arr) {
            $arr[] = $this;
        }
    }

    class Product {
        protected $id;
        protected $name;
        protected $price;
        protected $description;
        protected $brand;
// protected виден для дочерних, private только для продукта, Public виден всем, всегда можно к нему обратиться
        function __construct($id, $n, $p, $d, $b) {
            $this->id = $id;
            $this->name = $n;
            $this->price = $p;
            $this->description = $d;
            $this->brand = $b;
        }
        protected function getProduct() {
            $str = "Name: {$this->name}, ";
            $str .= "Price: {$this->price}, ";
            $str .= "Description: {$this->description}, ";
            $str .= "Brand: {$this->brand}";
            return $str;
        }
        function getId() {
            return $this->id;
        }
    }
    class Phone extends Product {
        use Collect;
        protected $cpu;
        protected $ram;
        protected $countSim;
        protected $hdd;
        protected $os;
        function __construct($id, $n, $p, $d, $b, $c, $r, $cS, $h, $o) {
            parent::__construct($id, $n, $p, $d, $b);
            $this->cpu = $c;
            $this->ram = $r;
            $this->countSim = $cS;
            $this->hdd = $h;
            $this->os = $o;    
        }
        function getProduct() {
            $str = parent::getProduct();
            $str .= ", CPU: {$this->cpu}, ";
            $str .= "RAM: {$this->ram}, ";
            $str .= "Count Sim: {$this->countSim}, ";
            $str .= "HDD: {$this->hdd}, ";
            $str .= "OS: {$this->os}";
            return $str;
        }
    }
    class Monitor extends Product {
        use Collect;
        protected $diagonal;
        protected $frequency;
        protected $ports;
        function __construct($id, $n, $p, $d, $b, $di, $f, $po) {
            parent::__construct($id, $n, $p, $d, $b);
            $this->diagonal = $di;
            $this->frequency = $f;
            $this->ports = $po;    
        }
        function getProduct() {
            $str = parent::getProduct();
            $str .= ", Diagonal: {$this->diagonal}, ";
            $str .= "Frequency: {$this->frequency}, ";
            $str .= "Ports: {$this->ports}";
            return $str;
        }
    }
?>