<?php 
	class Contacts 
	{
		public static function insert_contacts($fname, $lname, $email, $phone, $comment)
		{
			$db = new Database();
			$boundParameters = array(
				":fname" => $fname,
				":lname" => $lname,
				":email" => $email,
				":phone" => $phone,
				":comment" => $comment,
			);
			return $db->fetch_all("INSERT INTO Contacts (contactId, fname, lname, email, phone, comment) VALUES (NULL, :fname, :lname, :email, :phone, :comment)", $boundParameters);
		}

		public static function get_all_comments() {
			$db = new Database();
			return $db->fetch_all("SELECT * FROM Contacts");
		}
	}
	
