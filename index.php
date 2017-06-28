<?php

//run python with shell exec()
//$somequery = $_GET['query'];
$result= shell_exec("python /home/minerva/Desktop/programming/django/jobsproj/manage.py which_email 'Debitors notice - LB'");
var_dump($result); //output should be in here





