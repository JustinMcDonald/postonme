<?php
include('db.php');

define(DEBUG, false);

function sess_open($sess_path, $sess_name)
{
	return true;
}

function sess_close()
{
	return true;
}

function sess_read($sess_id)
{
	$sql = "SELECT Data FROM sessions WHERE SessionID = '$sess_id'";
	if ($result = mysql_query($sql))
	{
		if (mysql_num_rows($result))
		{
			$record = mysql_fetch_assoc($result);
			return $record['Data'];
		}
	}
	return '';
}

function sess_write($sess_id, $data)
{
	$access = time();
	$id = mysql_real_escape_string($sess_id);
	$data = mysql_real_escape_string($data);
	
	$sql = "SELECT Data FROM sessions WHERE SessionID = '$sess_id'";
	if ($result = mysql_query($sql))
	{
		if (!mysql_num_rows($result))
		{
			$sql = "INSERT INTO sessions (SessionID, Data, DateTouched) VALUES ('$id', '$data', $access);";
			$result = mysql_query($sql);
			//if (DEBUG) error_log('number of inserted sessions from sess_write: '.mysql_affected_rows().' - sessid: '.$id.' - sessdata: '.$data, 0);
			return $result;
		} else
		{
			$sql = "UPDATE sessions SET Data = '$data', DateTouched = $access WHERE SessionID = '$id';";
			$result = mysql_query($sql);
			//if (DEBUG) error_log('number of updated sessions from sess_write: '.mysql_affected_rows().' - sessid: '.$id.' - sessdata: '.$data, 0);
			return $result;
		}
	} else return false;
}

function sess_destroy($sess_id)
{
	mysql_query("DELETE FROM sessions WHERE SessionID = '$sess_id';");
	if (DEBUG) error_log('destroyed session: '.$sess_id, 0);
	return true;
}

function sess_gc($sess_maxlifetime)
{
	$CurrentTime = time();	
	$result = mysql_query("SELECT ID, Data FROM sessions WHERE DateTouched < $CurrentTime - $sess_maxlifetime");
	if (mysql_num_rows($result) > 0 && $result)
	{
		if (DEBUG) error_log("found " . mysql_num_rows($result) . " expired sessions.", 0);
		while ($expired = mysql_fetch_array($result))
		{
			if (DEBUG) error_log("found old session: " . $expired['ID'], 0);
			extract($expired, EXTR_PREFIX_ALL, 'sess');
			$fields = explode(";",$sess_Data);
			$username = "";
			for ($i = 0; $i < count($fields); $i++)
			{
				if (substr($fields[$i],0,8) == "username")
				{
					$parts = explode(":", $fields[$i]);
					$quoted = $parts[2];
					$parts2 = explode("\"", $quoted);
					$username = $parts2[1];
				}
			}
			if (DEBUG) error_log("parsed session data, username is: " . $username, 0);
			if ($username != "")
			{
				if (DEBUG) error_log('trying to set online status for ' . $username, 0);
				if (substr($username, 0, 5) == "Guest")	
				{
					$response = mysql_query("UPDATE account SET tmponline=0 WHERE username='$username'");
					if (!$response) error_log('could not set status: ' . mysql_error, 0);
					else
					{
						if (DEBUG) error_log('status successfully set for guest', 0);
					}
				}
				else 
				{
					$response = mysql_query("UPDATE account SET online=0 WHERE username='$username'");
					if (!$response) error_log('could not set status: ' . mysql_error, 0);
					else
					{
						if (DEBUG) error_log('status successfully set for user', 0);
					}
				}
				$response = mysql_query("DELETE FROM sessions WHERE ID=$sess_ID");
				if (!$response) error_log('could not delete session: ' . mysql_error, 0);
				else
				{
					if (DEBUG) error_log('session successfully deleted', 0);
				}
				/*unset($_SESSION['username']);
				unset($_SESSION['password']);
				unset($_SESSION['online']);
				if (isset($_SESSION['username']) || isset($_SESSION['password']) || isset($_SESSION['online'])) error_log('error, session variables could not be unset', 0);
				else
				{
					if (DEBUG) error_log('session variables unset', 0);
				}*/
			}
			else
			{
				$response = mysql_query("DELETE FROM sessions WHERE ID=$sess_ID");
				if (!$response) error_log('could not delete session: ' . mysql_error, 0);
				else
				{
					if (DEBUG) error_log('session successfully deleted', 0);
				}
			}
		}
	}
	
	return true;
}

session_set_save_handler("sess_open", "sess_close", "sess_read", "sess_write", "sess_destroy", "sess_gc");
session_start();
?>