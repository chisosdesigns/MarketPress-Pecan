<?php

	/* bs3_row Shortcode */
	function bs3_row($atts, $content = NULL ) {
		extract( shortcode_atts( array( 'id' => NULL, 'extra_classes' => NULL ), $atts ) );
		
		$bs3_id = ' ';
		$bs3_xc = ' ';
		
		if(!empty($id)) {
			$bs3_id .= ' id="' . $id . '"';
		}
		
		if(!empty($extra_classes)) {
			$bs3_xc .= $extra_classes;
		}
		
		return '<div class="row' . $bs3_xc . '"' . $bs3_id . '>' . do_shortcode( $content ) . '</div>';
	}

	/* bs3_col Shortcode */
	function bs3_col( $atts, $content = NULL ) {
		extract( shortcode_atts( array( 'cols' => '12,12,12,12', 'offs' => '', 'pushes' => '', 'pulls' => '' ), $atts ) );
		
		$pecan = new bs3Block();
		$pecan->update($cols,$offs,$pushes,$pulls);
		$classes = $pecan->return_layout();
		
		return '<div class="' . $classes . '">' . do_shortcode( $content ) . '</div>';

	}
	
	add_shortcode( "bs3_col", "bs3_col" );
	
	



	
	class bs3Block {
		
		private $sizes = array('lg', 'md', 'sm', 'xs');
		private $types = array('col', 'off', 'push', 'pull');
		
		private $col_lg = '12';
		private $col_md = '12';
		private $col_sm = '12';
		private $col_xs = '12';
		
		private $off_lg = '0';
		private $off_md = '0';
		private $off_sm = '0';
		private $off_xs = '0';

		private $push_lg = '0';
		private $push_md = '0';
		private $push_sm = '0';
		private $push_xs = '0';

		private $pull_lg = '0';
		private $pull_md = '0';
		private $pull_sm = '0';
		private $pull_xs = '0';
		
		private function type_default($type) {
			if($type == 'col') {
				return '12';
			} else {
				return '0';
			}
		}

		private function boom_csv($thecsv) {
			$thecsv = str_replace(' ', '', $thecsv);
			$array = explode(',', $thecsv);
			return $array;
		}
		
		private function check_boom($thecsv) {
			if(!empty($thecsv)) {
				return $this->boom_csv($thecsv);
			} else {
				return false;
			}
		}
		
		private function update_vals($col_array, $off_array, $push_array, $pull_array) {

			foreach($this->types as $type) {
				$array_name = $type . '_array';
				if(!empty($$array_name)) {
					$default = $this->type_default($type);
					
					$the_array = $$array_name;
					
					for($i = 0; $i < 4; $i++) {
						$var_name = $type . '_' . $this->sizes[$i];
						
						if($the_array[$i]) {
							$this->$var_name = $the_array[$i];
						} else {
							$this-> $var_name = $default;
						}
					}					
				}
			}
		}
		
		public function show_vars() {
			foreach($this->types as $type) {
				foreach($this->sizes as $size) {
					$var_name = $type . '_' . $size;
					echo $var_name . ': ' . $this->$var_name . "<br />\n";
				}
			}
		}
		
		public function update($cols, $offs = NULL, $pushes = NULL, $pulls = NULL) {
			
			$col_array		= $this->boom_csv($cols);
			$off_array		= $this->check_boom($offs);
			$push_array		= $this->check_boom($pushes);
			$pull_array		= $this->check_boom($pulls);
			
			$this->update_vals($col_array, $off_array, $push_array, $pull_array );
			
		}
		
		public function return_layout() {
			
			$to_return = '';
			
			foreach($this->types as $type) {
				foreach($this->sizes as $size) {
					$var = $type . '_' . $size;
					if($this->$var != 0) {
						if($type == 'col') {
							$to_return .= ' col-' . $size . '-' . $this->$var;
						} elseif($type == 'off') {
							$to_return .= ' col-' . $size . '-offset-' . $this->$var;
						} else {
							$to_return .= ' col-' . $size . '-' . $type . '-' . $this->$var;
						}
					}
				}
			}
			
			return $to_return;
			
		}
		
	}
	
?>