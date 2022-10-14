<?php
sleep(5);
file_put_contents("./sampleMonitor.txt", $argv[1]." をkill...\n", FILE_APPEND);
posix_kill($argv[1], SIGQUIT);

file_put_contents("./sampleMonitor.txt", $argv[2]." をkill...\n", FILE_APPEND);
posix_kill($argv[2], SIGQUIT);

file_put_contents("./sampleMonitor.txt", $argv[3]." をkill...\n", FILE_APPEND);
posix_kill($argv[3], SIGQUIT);
