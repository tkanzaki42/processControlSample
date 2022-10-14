<?php

while(true){
    file_put_contents("./sample1.txt", "Deamon 1 runnning.\n", FILE_APPEND);
    sleep(1);
}
