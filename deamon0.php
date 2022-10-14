<?php
while(true){
    file_put_contents("./sample0.txt", "Deamon 0 runnning.\n", FILE_APPEND);
    sleep(1);
}
