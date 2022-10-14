<?php

if (! function_exists('pcntl_fork')) die('PCNTL functions not available on this PHP installation');

$pidArray[0] = -1;
$pidArray[1] = -1;
$pidArray[2] = -1;
for ($x = 0; $x < 3; $x++) {
   switch ($pidArray[$x] = pcntl_fork()) {
      case -1:
         // @fail
         die('Fork failed');
         break;
      case 0:
         // @child: Include() misbehaving code here
         print "FORK: Child #{$x} preparing to nuke...\n";
         require_once "./deamon{$x}.php";
         exit;
      default:
         // @parent
         print "FORK: Parent, letting the child[{$pidArray[$x]}] run amok...\n";
         break;
    }
}

$pidMonitor =  pcntl_fork();
switch ($pidMonitor) {
    case -1:
        die('Fork failed');
        break;
    case 0:
        exec("php ./deamonMonitor.php {$pidArray[0]} {$pidArray[1]} {$pidArray[2]}");
        exit;
    default:
        break;
}

foreach ($pidArray as $pid) {
    pcntl_waitpid($pid, $status);
}

print "Done! :^)\n\n";
?>