<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application
{

	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Homepage for our app
	 */
	public function index()
	{
		// this is the view we want shown
		$this->data['pagebody'] = 'homepage';

		// build the list of authors, to pass on to our view
		$source = $this->quotes->all();
		$authors = array ();
		foreach ($source as $record)
		{
			$authors[] = array ('who' => $record['who'], 'mug' => $record['mug'], 'href' => $record['where'],'what'=>$record['what']);
		}
		$this->data['authors'] = $authors;

		$this->render();
	}
	
	public function random() {
		// this is the view we want shown
		$this->data['pagebody'] = 'homepage';

		// build the list of authors, to pass on to our view
		$source = $this->quotes->all();
		$authors = array ();
		
		//choose random integer from available number of quotes
		int randomIDNum = rand (0,7);
		foreach ($source as $record)
		{
			//when it lands on the one id that was randomly selected, add it and then break from the function.
			if($record['id'] == $randomIDNum) {
				$authors[] = array ('who' => $record['who'], 'mug' => $record['mug'], 'href' => $record['where'],'what'=>$record['what']);
				break;
			}
		}
		$this->data['authors'] = $authors;

		$this->render();
	}

}
