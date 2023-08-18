<?php

// Include the test cases
include 'test_cases.php';

//Find combinations with $array and $target parameter
function findCombinations($array, $target) {
    $result = [];
    generateCombinations($array, $target, [], 0, $result);
    return $result;
}

//Generate Combinations
function generateCombinations($array, $target, $currentCombination, $startIndex, &$result) {
    // Base case: If the target is reached, add the current combination to the result
    if ($target === 0) {
        $result[] = $currentCombination;
        return;
    }
    
    // Loop through the array starting from the given index
    for ($i = $startIndex; $i < count($array); $i++) {
        // If the current array element is less than or equal to the remaining target
        if ($array[$i] <= $target) {
            // Create a new combination including the current element
            $newCombination = $currentCombination;
            $newCombination[] = $array[$i];
            
            // Recursively call the function with updated target and combination
            generateCombinations($array, $target - $array[$i], $newCombination, $i, $result);
        }
    }
}

// Test each case and print the results
foreach ($testCases as $key => $testCase) {
    $array = $testCase['array'];
    $target = $testCase['target'];
    $result = findCombinations($array, $target);

    $step = ++$key;

    //Print all cases and parameters
    echo "Test Case $step: array = [" . implode(", ", $array) . "], target = $target\n";
    foreach ($result as $combination) {
        echo "[" . implode(", ", $combination) . "]\n";
    }
    echo "\n";
}
?>
