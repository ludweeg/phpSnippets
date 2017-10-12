<?php

define("PI", 3.14);

class Complex 
{
	/**
    * The real part of the complex number
    *
    * @var float
    * @access private
    */
	var $re;

	/**
    * The imaginary part of the complex number
    *
    * @var float
    * @access private
    */
	var $im;

	/**
    * The constructor taking the real and imaginary part of the complex number
    *
    * @access public
    * @param The real part of the complex number|float|       $re
    * @param The imaginary part of the complex number|float | $im
    * @return Complex number
    */	
	public function __construct($re, $im)
	{
		$this->re = $re;
		$this->im = $im;
	}

	/**
    * Get the real part of the complex number
    *
    * @access public
    * @return float
    */
	public function getRe()
	{
		return $this->re;
	}

	/**
    * Get the imaginary part of the complex number
    *
    * @access public
    * @return float
    */	
	public function getIm()
	{
		return $this->im;
	}

	/**
    * A complex number in the form of: a + bi
    * a = $re
    * b = $im
	*
    * @access public
    * @return Print complex number
    */
	public function Print()
	{
		if($this->im >= 0) 
			echo $this->re.' + '.$this->im."i<br>";
		else 
			echo $this->re.' - '.abs($this->im)."i<br>";
	}

	/**
    * Return module of a complex number
    * 
    * @access public
    * @return float
    */	
	public function Abs()
	{
		return sqrt($this->im * $this->im + $this->re * $this->re);	
	}

	/**
    * Returns argument of a complex number
    * 
    * @access public
    * @return float
    */	
	public function Arg()
	{
		return abs(atan($this->im / $this->re) * 180.0 / PI);	
	}

	/**
    * Check for equality of two complex numbers
    * 
    * @access public
    * @param Complex
    * @return bool
    */		
	public function Equals($c)
	{
		return $this->re == $c->re && $this->im == $c->im;		
	}

	/**
    * Returns a negative complex number
    * 
    * @access public
    * @return Complex
    */	
	public function Neg()
	{
		return new Complex(-$this->re, -$this->im);
	}
	
	/**
    * Returns a negative complex number
    * 
    * @access public
    * @return Complex
    */	
	public function Conj()
	{
		return new Complex($this->re, -$this->im);
	}	
}

/**
* Returns the sum of two complex numbers
* 
* @param Complex $c1
* @param Complex $c2
* @return Complex
*/
function Add($c1,$c2)
{
	$re_1 = $c1->getRe();
	$im_1 = $c1->getIm();
	$re_2 = $c2->getRe();
	$im_2 = $c2->getIm();
	
	return new Complex($re_1 + $re_2,$im_1 + $im_2);
}

/**
* Returns the difference of two complex numbers
* 
* @param Complex $c1
* @param Complex $c2
* @return Complex
*/
function Sub($c1,$c2)
{
	$re_1 = $c1->getRe();
	$im_1 = $c1->getIm();
	$re_2 = $c2->getRe();
	$im_2 = $c2->getIm();
	
	return new Complex($re_1 - $re_2,$im_1 - $im_2);
}

/**
* Returns the product of two complex numbers
* 
* @param Complex $c1
* @param Complex $c2
* @return Complex
*/

function Mul($c1,$c2)
{
	$re_1 = $c1->getRe();
	$im_1 = $c1->getIm();
	$re_2 = $c2->getRe();
	$im_2 = $c2->getIm();
	
	return new Complex($re_1 * $re_2 - $im_1 * $im_2,$re_1 * $im_2 + $im_1 * $re_2);
}

/**
* Returns the quotient of two complex numbers
* 
* @param Complex $c1
* @param Complex $c2
* @return Complex
*/

function Div($c1,$c2)
{
	$re_1 = $c1->getRe();
	$im_1 = $c1->getIm();
	$re_2 = $c2->getRe();
	$im_2 = $c2->getIm();
	
	$r = $re_2 * $re_2 + $im_2 * $im_2;
	if ($r == 0) 
		throw new Exception('Division by zero');
	else 
		return new Complex(($re_1 * $re_2 + $im_1 * $im_2) / $r,($im_1 * $re_2 - $re_1 * $im_2) / $r);
}

$c1 = new Complex(1,-2);
$c2 = new Complex(-1,6);
$c1->Print();
$c2->Print();
if($c1->Equals($c2))
{
	echo "Equals!<br>";
}
else
{
	echo "No equals!<br>";	
}
Add($c1,$c2)->Print();
Sub($c1,$c2)->Print();
Mul($c1,$c2)->Print();
Div($c1,$c2)->Print();
echo $c1->Abs()."<br>";
echo $c1->Arg()."<br>";
echo $c1->Neg()->Print();
echo $c1->Conj()->Print();