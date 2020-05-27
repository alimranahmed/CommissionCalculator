<?php


namespace App\Services\Input;

class InputParser
{

    public function getLines(array $input): array
    {
        $inputLines = [];
        foreach ($input as $rawLine) {
            if (empty($rawLine)) {
                break;
            }
            $decodedRawLine = json_decode($rawLine);

            $inputLines[] = new InputLine($decodedRawLine->bin, $decodedRawLine->amount, $decodedRawLine->currency);
        }
        return $inputLines;
    }
}
