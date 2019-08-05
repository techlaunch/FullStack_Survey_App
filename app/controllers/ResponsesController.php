<?php

use Phalcon\Mvc\Controller;

class ResponsesController extends Controller
{
	public function indexAction()
	{
		// get variables for the calculations
		$genderM = 0;
		$genderF = 0;
		$attendant1 = 0;
		$attendant2 = 0;
		$attendant3 = 0;
		$attendant4 = 0;
		$attendant5 = 0;
		$timeliness1 = 0;
		$timeliness2 = 0;
		$timeliness3 = 0;
		$timeliness4 = 0;
		$timeliness5 = 0;
		$results1 = 0;
		$results2 = 0;
		$results3 = 0;
		$results4 = 0;
		$results5 = 0;

		// get all data from the database
		$inquisition = new Inquisition();
		$responses = $inquisition->find();

		// calculate all responses
		foreach ($responses as $res) {
			// calculate gender
			if($res->gender == "M") $genderM++; 
			if($res->gender == "F") $genderF++; 

			// calculate attendant
			if($res->q_Attendant == 1) $attendant1++; 
			if($res->q_Attendant == 2) $attendant2++; 
			if($res->q_Attendant == 3) $attendant3++; 
			if($res->q_Attendant == 4) $attendant4++; 
			if($res->q_Attendant == 5) $attendant5++; 

			// calculate timeliness
			if($res->q_Time == 1) $timeliness1++; 
			if($res->q_Time == 2) $timeliness2++; 
			if($res->q_Time == 3) $timeliness3++; 
			if($res->q_Time == 4) $timeliness4++; 
			if($res->q_Time == 5) $timeliness5++; 

			// calculate timeliness
			if($res->q_Results == 1) $results1++; 
			if($res->q_Results == 2) $results2++; 
			if($res->q_Results == 3) $results3++; 
			if($res->q_Results == 4) $results4++; 
			if($res->q_Results == 5) $results5++; 

		}

		// send info to the view
		$this->view->genderM = $genderM;
		$this->view->genderF = $genderF;
		$this->view->attendant1 = $attendant1;
		$this->view->attendant2 = $attendant2;
		$this->view->attendant3 = $attendant3;
		$this->view->attendant4 = $attendant5;
		$this->view->attendant5 = $attendant5;
		$this->view->timeliness1 = $timeliness1;
		$this->view->timeliness2 = $timeliness2;
		$this->view->timeliness3 = $timeliness3;
		$this->view->timeliness4 = $timeliness4;
		$this->view->timeliness5 = $timeliness5;
		$this->view->results1 = $results1;
		$this->view->results2 = $results2;
		$this->view->results3 = $results3;
		$this->view->results4 = $results4;
		$this->view->results5 = $results5;
	}
}