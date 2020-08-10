<?php

interface AbstractFactory {
	
	public function createSQLiStrategy():SQLi;
	public function createXSSStrategy():XSS;	
   
}


class SecureFactory implements AbstractFactory
{
	public function createSQLiStrategy():SQLi
	{
		return new SQLi();
	}
	
	public function createXSSStrategy():XSS
	{
		return new XSS();
	}
	
}




?>



