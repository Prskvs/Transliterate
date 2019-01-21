<?php
class Transliterate {
	protected $_greek;
	
	function __construct() {
		$this->_greek = array('α'=>'a', 'ά'=>'a', 'β'=>'b', 'γ'=>'g', 'δ'=>'d', 'ε'=>'e', 'έ'=>'e', 'ζ'=>'z', 'η'=>'i', 'ή'=>'i', 'θ'=>'th', 'ι'=>'i', 'ί'=>'i', 'κ'=>'k', 'λ'=>'l', 'μ'=>'m', 'ν'=>'n', 'ξ'=>'ks', 'ο'=>'o', 'ό'=>'o', 'π'=>'p', 'ρ'=>'r', 'σ'=>'s', 'ς'=>'s', 'τ'=>'t', 'υ'=>'y', 'ύ'=>'y', 'ϋ'=>'y', 'φ'=>'f', 'χ'=>'x', 'ψ'=>'ps', 'ω'=>'o', 'ώ'=>'o', 'Α'=>'A', 'Ά'=>'A', 'Β'=>'B', 'Γ'=>'G', 'Δ'=>'D', 'Ε'=>'E', 'Έ'=>'E', 'Ζ'=>'Z', 'Η'=>'I', 'Θ'=>'TH', 'Ι'=>'I', 'Ί'=>'I', 'Κ'=>'K', 'Λ'=>'L', 'Μ'=>'M', 'Ν'=>'N', 'Ξ'=>'KS', 'Ο'=>'O', 'Ό'=>'O', 'Π'=>'P', 'Ρ'=>'R', 'Σ'=>'S', 'Τ'=>'T', 'Υ'=>'Y', 'Ύ'=>'Y', 'Φ'=>'F', 'Χ'=>'X', 'Ψ'=>'PS', 'Ω'=>'O', 'Ώ'=>'O');
	}

	public function toSlug($str) {
	  $splitted = preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
	  $new = "";
	  $g = FALSE;
	  $max = count($splitted) - 1;
	  foreach ($splitted as $key => $char):
		  if ($char == " "):
			  if ($key < $max && $splitted[$key+1] == "-"):
				  continue;
			  else:
				  $new .= "-";
				  continue;
			  endif;
		  endif;

		  if ($key < $max):
			  if ($char == "-" && $splitted[$key+1] == " ")
				  continue;
		  endif;

		  if (preg_match("/[0-9a-zA-Z`~!@#$%^&*()_+-=--==;':,.\<\>\|\[\]\{\}\?\"]/", $char)){
			  $new .= $char;
			  continue;
		  }

		  foreach($this->_greek as $gkey => $gr):
			  if ($key > 0 && ($char == "υ" || $char == "ύ") && in_array($splitted[$key-1], array("ο", "ε", "α"))):
				  $new .= "u";
				  $g = TRUE;
				  break;

			  elseif ($char == $gkey):
				  $new .= $gr;
				  $g = TRUE;
				  break;
			  endif;
		  endforeach;

		  if ($g == FALSE):
			  $new .= $char;
		  endif;
	  endforeach;

	  return mb_strtolower($new);
	}
}
?>
