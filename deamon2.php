<?php

while(true){
    file_put_contents("./sample2.txt", "Deamon 2 runnning.\n", FILE_APPEND);
    sleep(1);
}
