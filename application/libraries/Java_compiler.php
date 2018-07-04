<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Java_compiler {

	public function compile($code, $input){
		putenv("PATH=C:\Program Files\Java\jdk1.8.0_111\bin");
		$CC="javac";
		$out="java Main";
		$filename_code="Main.java";
		$filename_in="input.txt";
		$filename_error="error.txt";
		$runtime_file="runtime.txt";
		$executable="*.class";
		$command=$CC." ".$filename_code;	
		$command_error=$command." 2>".$filename_error;
		$runtime_error_command=$out." 2>".$runtime_file;
		$file_code=fopen($filename_code,"w+");
		fwrite($file_code,$code);
		fclose($file_code);
		$file_in=fopen($filename_in,"w+");
		fwrite($file_in,$input);
		fclose($file_in);
		exec("cacls  $executable /g everyone:f"); 
		exec("cacls  $filename_error /g everyone:f");	
		shell_exec($command_error);
		$error=file_get_contents($filename_error);
		if(trim($error)==""){
			if(trim($input)==""){
				shell_exec($runtime_error_command);
				$runtime_error=file_get_contents($runtime_file);
				$output=shell_exec($out);
			} else {
				shell_exec($runtime_error_command);
				$runtime_error=file_get_contents($runtime_file);
				$out=$out." < ".$filename_in;
				$output=shell_exec($out);
			}
		} else if(!strpos($error,"error")) {
			echo "<pre>$error</pre>";
			if(!$this->input->post('input')) {
				$output=shell_exec($out);
			} else {
				$out=$out." < ".$filename_in;
				$output=shell_exec($out);
			}
		} else {
			$output = "<pre>$error</pre>";
		}
		exec("del $filename_code");
		exec("del *.txt");
		exec("del $executable");
		return $output;
	}
}
?>