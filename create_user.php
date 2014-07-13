<?php

//made for adding new users with a new hashed password.
$U = password_hash('Jason', PASSWORD_DEFAULT);
if (password_verify('Jason', $U)){

    print $U;

}