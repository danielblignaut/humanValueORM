<?php

// The following should be available:

// Ability to create a new user model.
$user = UserModel::create(array(
	'name' => 'Daniel',
	'occupation' => 'Programmer',
	'email' => 'daniel@gmail.com'
));

// Saves to database
$user->_save();

/*
 	Note that methods for every attribute of the given model should be generated 
	DYNAMICALLY/ON THE FLY based on schema, using PHP closures or other methods.
*/

echo $user->name(); // outputs "Luke"
echo $user->occupation(); // outputs "Programmer"

// Sets the name, occupations, updates
$user->name('Paul');
$user->occupation('Designer');

$user->_save();

// Finds the first existing user from the database, updates attributes, saves changes
$currentUser = UserModel::first();
$currentUser->name('Bob');
$currentUser->occupation('Project Manager');

// Saves to database
$currentUser->_save();

// Fails to save new email address
try {
	$currentUser->email('bademail');
	$currentUser->_save();
} catch( Exception $e ){
	// Shows email validation error message
	echo $e->getMessage();
}

// Deletes a user
$currentUser->_delete();

?>