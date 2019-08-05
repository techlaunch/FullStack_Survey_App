<?php

use Phalcon\Mvc\Controller;

class DemographicsController extends Controller
{
	public function indexAction()
	{
	}

	public function saveAction()
	{
		// get info from the view
		$name = $this->request->get('name');
		$age = $this->request->get('age');
		$gender = $this->request->get('gender');

		// save info in the database
		$inquisition = new Inquisition();
		$inquisition->name = $name;
		$inquisition->age = $age;
		$inquisition->gender = $gender;
		$inquisition->save();

		// save the last ID
		$this->session->set('id', $inquisition->id);

		// redirect to questions
		$this->response->redirect('questions');
	}
}