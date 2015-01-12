<?

if (!isset($_SESSION['dbg_num_attempts'])) $_SESSION['dbg_num_attempts'] = 0;

class Login {

  var $validUser = FALSE;
	var $errorMsg  = '';
	var $maxAttempts = 10;
	
  function Login() {
		
	}
	
	function validateUser($userArray='', $username='',$password='') {
	
	  if (empty($username) && empty($password)) return TRUE;

		if ($_SESSION['dbg_num_attempts'] >= $this->maxAttempts) {
		  $this->setErrorMsg('Too many attempts.  Please try again later.');
			return FALSE;
		}

		$_SESSION['dbg_num_attempts'] = $_SESSION['dbg_num_attempts'] + 1;
		
	  // validate user input
	  if (empty($username)) {
		  $this->setErrorMsg('Username is a required field');
			return FALSE;
		}
		if (empty($password)) {
		  $this->setErrorMsg('Password is a required field');
			return FALSE;
    }
		
		// check against the config file
		if (empty($userArray)) {
		
		  $this->setErrorMsg('There was an error retrieving user data.  Please try again.');
		  return FALSE;
			
		} else {

      // validate user
		  foreach ($userArray as $value) {
			  if ($value[0] == $username && $value[1] == $password) {
		      $_SESSION['dbg_logged_in'] = TRUE;
			    $_SESSION['dbg_username']  = $value[0];
			    $_SESSION['dbg_firstname'] = $value[2];
			    $_SESSION['dbg_lastname']  = $value[3];
					$_SESSION['dbg_isadmin']   = $value[4];
					$_SESSION['dbg_num_attempts'] = 0;
					break;
				}
			}
			
		}
		
		if ($_SESSION['dbg_logged_in'] != TRUE) $this->setErrorMsg('Invalid username or password');
		
		return TRUE;
		
	}
	
	function doLogout() {
    session_unset();
    session_destroy();
    // Starting session should re-instate proper variables.
    session_start();
		$send = 'Location: '.$_SERVER['PHP_SELF'];
		header($send);
  }
	
	function setErrorMsg($msg='') {
	  if (!empty($msg)) $this->errorMsg = $msg;
	}
	
	function getErrorMsg() {
	  return $this->errorMsg;
	}
	
} // end of class