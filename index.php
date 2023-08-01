<?php
echo "Test";
function executeFunctionInNewWindow($functionName, $n)
{
    // Generate JavaScript code for opening a new window, executing the function, and waiting for 2 seconds.
    $javascriptCode = <<<JS
    function openAndExecute() {
        var win = window.open('', '_blank');
        win.document.write('<html><body><script type="text/javascript">{$functionName}(); setTimeout(function() { window.close(); }, 2000);</script></body></html>');
        win.document.close();
    }
JS;

    // Generate JavaScript code for repeating the process for n times.
    for ($i = 0; $i < $n; $i++) {
        $javascriptCode .= "setTimeout(openAndExecute, " . ($i * 2500) . ");";
    }

    // Output the generated JavaScript code.
    echo "<script type='text/javascript'>$javascriptCode</script>";
}

// Usage: Call the function with the desired function name and the number of times to repeat.
$functionName = 'yourFunctionName'; // Replace 'yourFunctionName' with the actual function name to be executed in the new windows.
$repeatTimes = 5; // Replace 5 with the desired number of repetitions.

executeFunctionInNewWindow($functionName, $repeatTimes);

?>