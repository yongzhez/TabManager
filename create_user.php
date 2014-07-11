<?php

//made for adding new users with a new hashed password.
$U = password_hash('\'Eddie\'', PASSWORD_DEFAULT);
if (password_verify('\'Eddie\'', $U)){

    print $U;

}