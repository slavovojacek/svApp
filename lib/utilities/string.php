<?php

namespace Utilities;

use Normalizer;

class String
{

	/**
	 * Returns SEO friendly URLs
	 * @param string $u
	 * @return string
	 */
	public static function sanUrl($u)
	{
		$c = $u;
		$c = preg_replace('/\p{M}/u', '', Normalizer::normalize($u, Normalizer::FORM_D));
		$c = preg_replace("/\%/", "-percentage-", $c);
		$c = preg_replace("/\@/", "-at-", $c);
		$c = preg_replace("/\&/", "-and-", $c);
		$c = preg_replace("/[\/_|+ -]+/", "-", $c);
		$c = preg_replace("/[\!?<>]+/", "", $c);
		$c = mb_strtolower(trim($c, "-"));

		return $c;
	}

	/**
	 * Returns sanitised string
	 * @param string $s
	 * @return string
	 */
	public static function san($s)
	{
		return filter_var($s, FILTER_SANITIZE_STRING);
	}

	/**
	 * Strips all whitespace in a string
	 * @param string $s
	 * @param string $r
	 * @return string
	 */
	public static function sanWhitespace($s, $r)
	{
		return preg_replace('/\s+/', $r, $s);
	}

	/**
	 * Returns the length of a string
	 * @global array $app
	 * @param string $s
	 * @return boolean | int
	 */
	public static function len($s)
	{
		global $app;

		if (is_string($s)) {
			return mb_strlen($s, $app["encoding"]);
		}

		Debug::err(new inputException(__METHOD__));
		return false;
	}

	/**
	 * Transforms text into a readable form
	 * by making links clickable
	 * @param string $s
	 * @return string
	 */
	public static function genLink($s)
	{
		return preg_replace('/(?<!S)((http(s?):\/\/)|(www.))+([\w.1-9\&=#?\-+~%;\/]+)/', '<a target="_blank" href="http$3://$4$5">http$3://$4$5</a>', $s);
	}

	/**
	 * Transforms text into a readable form
	 * by making mails clickable
	 * @param string $s
	 * @return string
	 */
	public static function genMailto($s)
	{
		return preg_replace('/(\S+@\S+\.\S+)/', '<a href="mailto:$1">$1</a>', $s);
	}

	/**
	 * Formats time() into date
	 * @param string $f
	 * @param int $t
	 * @return string | boolean
	 */
	public static function formatTime($f = "d M Y", $t = false)
	{
		if ($t) {
			return date($f, $t);
		}

		return date($f, time());
	}

	/**
	 * Formats bytes into readable form
	 * @param int $b
	 * @return string
	 */
	public static function formatSize($b)
	{
		$bt = (int) $b;
		if ($bt <= 0) {
			return "0 bytes";
		}
		$s = array('bytes', 'kb', 'MB', 'GB', 'TB', 'PB');
		$e = floor(log($bt) / log(1024));

		return sprintf('%.2f ' . $s[$e], ($bt / pow(1024, $e)));
	}

	/**
	 * Generates random strings
	 * @param int $l
	 * @return string | boolean
	 */
	public static function generate($l = 64)
	{
		$a = 'abcdefghijklmnopqrstuvwxyz1234567890';
		$s = '';

		if (!is_int($l) or $l > 128) {
			Debug::err(new appException(__METHOD__));
			return false;
		}
		for ($i = 1; $i < $l + 1; $i++)
		{
			$r = $a[rand(0, 35)];
			$s .= $r;
		}

		return $s;
	}

}