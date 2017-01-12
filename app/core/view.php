<?php
class View
{
	//public $template_view; // общий вид по умолчанию.
    public $data = array();
	
	function generate($content_view, $template_view, $data = null)
	{

		if(is_array($data)) {
			extract($data);
		}
		
		include 'app/views/'.$template_view;
	}

	public function render($template_puth, $data = ''){
	    ob_start();
        $this->data[] = $data;
        require_once 'app/views/'.$template_puth;
        return ob_get_clean();
    }
}
