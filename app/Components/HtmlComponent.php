<?php

namespace App\Components;

use Collective\Html\HtmlBuilder;

class HtmlComponent extends HtmlBuilder {

	public function menu(array $items) 
	{
		return view('tickets.partials.menu', compact('items') );
	}




/*
{!! Html::classes([‘home’ => true, ‘main’, ‘dont-use-this’ => false]) !!}

Returns: class=“home main”.
*/
	public function classes(array $classes)
	{
		$html='';
		foreach ($classes as $name => $bool) {
			if (is_int($name)) {
				$name = $bool;
				$bool = true;
			}
			if ($bool) {
				$html .= $name.' ';
			}
		}

		if (! empty($html)) {
			return ' class="'.trim($html).'"';
		}
		return '';
	}
	
}