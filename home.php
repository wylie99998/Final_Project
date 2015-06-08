<?php
session_start();
include 'myInfo.php';
if(!isset($_SESSION['logged-in']))
{
	header("Location: login.php");
}
class t
{
	public $s_id;
	public $s_name;
	public $s_rate;
	public $s_review;
	public $s_grade;
	public $s_date;
	public $s_online;
	function oprint(){
		echo $this->s_id . $this->s_name . $this->s_cat . $this->s_length . $this->s_rented;
	}
	
	
	
echo 'home!';
?>