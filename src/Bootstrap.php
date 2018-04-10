<?php
namespace Frameduz;

class Bootstrap{
	
	public static function inputKey($nm_comp, $data){
        return '<input type="hidden" name="'.$nm_comp.'" id="'.$nm_comp.'" value="'.$data.'">';
    }

    public static function inputText($nm_comp, $type, $data, $opt){
        return '<input type="'.$type.'" id="'.$nm_comp.'" name="'.$nm_comp.'" value="'.$data.'" '.$opt.'>';
    }

    public static function inputTextArea($nm_comp, $data, $opt){
        return '<textarea id="'.$nm_comp.'" name="'.$nm_comp.'" '.$opt.'>'.$data.'</textarea>';
    }

    public static function inputSelect($nm_comp, $data, $val, $opt){
        $elmt = '<select id="'.$nm_comp.'" name="'.$nm_comp.'" '.$opt.'>';
        foreach($data as $key => $value){
            if($key == $val)
                $option[] = '<option value="'.$key.'" selected>'.$value.'</option>';
            else
                $option[] = '<option value="'.$key.'">'.$value.'</option>';
        }
        $set = implode('', $option);
        return $elmt.$set.'</select>';
    }
	
	public static function inputSelectGrup($nm_comp, $data, $val, $opt){
		$elmt = '<select id="'.$nm_comp.'" name="'.$nm_comp.'" '.$opt.'>';
		foreach($data as $g => $grup){
			if($grup['grup'] != ''){
				$option[] = ' <optgroup label="'.$grup['grup'].'">';
				foreach($grup['data'] as $key => $value){
					if($key == $val)
						$option[] = '<option value="'.$key.'" selected>'.$value.'</option>';
					else
						$option[] = '<option value="'.$key.'">'.$value.'</option>';
				}
			}
			else{
				foreach($grup['data'] as $key => $value){
					if($key == $val)
						$option[] = '<option value="'.$key.'" selected>'.$value.'</option>';
					else
						$option[] = '<option value="'.$key.'">'.$value.'</option>';
				}
			}
			
			$option[] = ' </optgroup>';
		}
		$set = implode('',$option);
		return $elmt.$set.'</select>';
	}
	
	public static function inputRadio($nm_comp, $data, $val){
		foreach ($data as $key => $value){
            if($key == $val)
                $option[] = '<label style="color: #000; cursor: pointer; margin: 10px;"><input type="radio" id="'.$nm_comp.'" name="'.$nm_comp.'" value="'.$key.'" checked> '.$value.'</label>';
            else
                $option[] = '<label style="color: #000; cursor: pointer; margin: 10px;"><input type="radio" id="'.$nm_comp.'" name="'.$nm_comp.'" value="'.$key .'"> '.$value.'</label>';
        }
        $set = implode('', $option);
        return $set;
	}
	
	public static function inputCheckbox($nm_comp, $data, $val){
		$val = (isset($val)) ? explode(',', $val) : array();
		foreach ($data as $key => $value){
			if(in_array($value, $val))
				$option[] = '<label style="color: #000; cursor: pointer; margin: 5px;"><input type="checkbox" id="'.$nm_comp.'" name="'.$nm_comp.'" value="'.$value.'" checked> '.$value.'</label>';
			else
                $option[] = '<label style="color: #000; cursor: pointer; margin: 5px;"><input type="checkbox" id="'.$nm_comp.'" name="'.$nm_comp.'" value="'.$value.'"> '.$value.'</label>';
		}
        $set = implode('', $option);
        return $set;
	}

    public static function errMsg($str, $class){
        return '<div class="alert alert-'.$class.' alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
					<strong>'.$str.'</strong>
				</div>'."\n";
    }

    public static function pagging($aktif, $batas, $jml_data){
        $jml_halaman = ceil($jml_data / $batas);
        $link_halaman = '<nav><ul class="pagination">';

        if($aktif > 1){
            $prev = $aktif - 1;
            $link_halaman .= '<li class="paging" number-page="1"><a style="cursor:pointer" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
							  <li class="paging" number-page="'.$prev.'"><a style="cursor:pointer" aria-label="Previous"><span aria-hidden="true">&lsaquo;</span></a></li>';
        }
		else{
            $link_halaman .= '<li class="paging" number-page="1"><a style="cursor:pointer" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
							  <li class="paging" number-page="1"><a style="cursor:pointer" aria-label="Previous"><span aria-hidden="true">&lsaquo;</span></a></li>';
        }

        $angka = ($aktif > 3 ? '<li><a>...</a></li>' : '');
        for($n = ($aktif - 2); $n < $aktif; $n++){
            if($n < 1) continue;
            $angka .= '<li class="paging" number-page="'.$n.'"><a style="cursor:pointer">'.$n.'</a></li>';
        }

        $angka .= '<li class="active"><span>'.$n.'</span></li>';
        for($n = ($aktif + 1); $n < ($aktif + 3); $n++){
            if($n > $jml_halaman) break;
            $angka .= '<li class="paging" number-page="'.$n.'"><a style="cursor:pointer">'.$n.'</a></li>';
        }

        $angka .= (($aktif + 2) < $jml_halaman ? '<li><a>...</a></li><li class="paging" number-page="'.$jml_halaman.'"><a style="cursor:pointer">'.$jml_halaman.'</a></li>' : ' ');
        $link_halaman .= $angka;

        if($aktif < $jml_halaman){
            $next = $aktif + 1;
            $link_halaman .= '<li class="paging" number-page="'.$next.'"><a style="cursor:pointer" aria-label="Next"><span aria-hidden="true">&rsaquo;</span></a></li>
							  <li class="paging" number-page="'.$jml_halaman.'"><a style="cursor:pointer" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
        }
		else{
            $link_halaman .= '<li class="paging" number-page="'.$jml_halaman.'"><a style="cursor:pointer" aria-label="Next"><span aria-hidden="true">&rsaquo;</span></a></li>
							  <li class="paging" number-page="'.$jml_halaman.'"><a style="cursor:pointer" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
        }

        return $link_halaman.'</ul></nav>';
    }

}

?>
