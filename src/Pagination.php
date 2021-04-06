<?php

  namespace Whoman;

  class Pagination {

    protected $_items_per_page;
    protected $_current_page;
    protected $_number_of_items;
    
    function __construct(){

      $this->setCurrentPage(0);
      $this->setItemsPerPage(10);

    }
    
    public function setItemsPerPage($items_per_page){
      
      $this->_items_per_page = $items_per_page;

      return $this->_items_per_page;

    }

    public function getItemsPerPage(){

      return $this->_items_per_page;

    }

    public function setCurrentPage($current_page){
      
      $this->_current_page = $current_page;

      return $this->_current_page;

    }

    public function getCurrentPage(){

      return $this->_current_page;

    }

    public function setNumberOfItems($number_of_items){

      $this->_number_of_items = $number_of_items;
      return $this->_number_of_items;

    }

    public function getNumberOfItems(){

      return $this->_number_of_items;

    }

    public function hasPrev(){

      $result = $this->_current_page > 1;
      return $result;

    }

    public function hasNext(){

      $result = ceil( $this->getNumberOfItems() / $this->getItemsPerPage() ) > $this->getCurrentPage();
      return $result;

    }

    public function getNext(){

      if(!$this->hasNext()):
        return false;
      endif;

      return $this->getCurrentPage() + 1;

    }

    public function getPrev(){

      if(!$this->hasPrev()):
        return false;
      endif;

      return $this->getCurrentPage() - 1;

    }

    public function getLastPage(){
      return ceil( $this->getNumberOfItems() / $this->getItemsPerPage() );
    }

    public function getFirstPage(){
      return 1;
    }

  }
