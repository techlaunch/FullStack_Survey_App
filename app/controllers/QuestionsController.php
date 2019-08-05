<?php

use Phalcon\Mvc\Controller;

class QuestionsController extends Controller
{
	public function indexAction()
	{
	}

	public function saveAction()
	{
		// get info from the view
		$q1 = $this->request->get('q1');
		$q2 = $this->request->get('q2');
		$q3 = $this->request->get('q3');

		// get the ID
		$id = $this->session->get('id');

		// save info in the database
		$inquisition = Inquisition::findFirst($id);
		$inquisition->q_Attendant = $q1;
		$inquisition->q_Time = $q2;
		$inquisition->q_Results = $q3;
		$inquisition->save();

		// redirect to questions
		$this->response->redirect('responses');
	}
}