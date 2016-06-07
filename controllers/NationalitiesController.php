<?php 
	namespace Controllers;

	use Models\Authors;
	use Models\Books;
    	use Models\Editors;

	class NationalitiesController {
		private $nationalities_model = null;

        		public function __construct() {
            		$this->nationalities_model = new Nationality();
        		}
	}