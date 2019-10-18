<?php

require_once 'Account.php';

Account::logout();

header("Location: ../Pages/Seller/seller_login.php");