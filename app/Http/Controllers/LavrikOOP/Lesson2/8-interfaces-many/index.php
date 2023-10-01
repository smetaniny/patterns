<?php

interface Renderable{
	public function render() : string;
}

interface Validable{
	public function isValid() : bool;
}

abstract class Tag implements Renderable, Validable{
	protected string $name; 
	protected array $attrs = []; 
	protected array $allowedNames;

	public function __construct(string $name){
		$this->name = $name;
	}

	public function attr(string $name, string $value){
		$this->attrs[$name] = $value;
		return $this;
	}

	public function isValid() : bool{
		return in_array($this->name, $this->allowedNames);
	}

	protected function attrsToString() : string{
		$pairs = [];

		foreach($this->attrs as $name => $value){
			$pairs[] = "$name=\"$value\"";
		}

		return implode(' ', $pairs);
	}
}

class SingleTag extends Tag{
	protected array $allowedNames = ['img', 'hr'];
	
	public function render() : string{
		$attrsStr = $this->attrsToString();
		return "<{$this->name} $attrsStr>";
	}
}

class PairTag extends Tag{
	protected array $allowedNames = ['div', 'span'];
	protected array $children = []; 
	
	public function appendChild(Renderable $child){
		$this->children[] = $child;
		return $this;
	}

	public function render() : string{
		$attrsStr = $this->attrsToString();

		$childrenHTML = array_map(function(Renderable $tag){
			return $tag->render();
		}, $this->children);

		$innerHTML = implode('', $childrenHTML);
		return "<{$this->name} $attrsStr>$innerHTML</{$this->name}>";
	}
}

class TextNode implements Renderable, Validable{
	protected string $text;

	public function __construct(string $text){
		$this->text = trim($text);
	}

	public function render() : string{
		return $this->text;
	}

	public function isValid() : bool{
		return $this->text !== '';
	}
}

class Markdown implements Validable {
	public function isValid() : bool{
		return true;
	}
}

$img = (new SingleTag('img'))->attr('src', 'f1.jpg')->attr('alt', 'f1 not found');
$a = (new PairTag('a'))->attr('href', '#')->appendChild(new TextNode('go home'));
$label = (new PairTag('label'))
	->appendChild($img)
	->appendChild(new TextNode('attention'))
	->appendChild($a);
//echo $img->isValid() ? 1 : 0;
$html = $label->render();
echo $html;
echo '<hr>' . htmlspecialchars($html);


