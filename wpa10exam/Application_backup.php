<?php 

namespace Core;

class Application {
	private $question_sh;
	private $question_multi;
	public function __construct($question) {
		$this->question_sh = $question->getsh();	
		$this->question_multi = $question->getmulti();
	}	
	public function getQuestionView($type, $id) {
		if ($type == 'm'){
			if(array_key_exists($id, $this->question_multi)) {
				$ques = $this->question_multi[$id];
				$question = '<div class="question">';
					$question .= '<h1>' . $ques['question'] . '</h1>';
					foreach( $ques['answer'] as $ans){
						$question .= '<input type="radio" name="ans" value="' . $ans .
								'">' . $ans . '</input>' ;
					}						
					$question .= '</div>';
				return $question;	
			} else {
				return "No question found!";
			}

		}
		elseif($type == 's'){

			if(array_key_exists($id, $this->question_sh)) {
				$ques = $this->question_sh[$id];
				$question = '<div class="question">';
				foreach($ques as $q) {
					$question .= '<h1>' . $q['question'] . '</h1>';
					$question .= '<textarea></textarea>';	
				}
				$question .= '</div>';
				return $question;	
			} else {
				return "No question found!";
			}
		}
		else{
			return "NO question type found!";
		}

		

		
	}
}

?>