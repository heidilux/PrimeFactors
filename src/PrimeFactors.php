<?php


class PrimeFactors {

    private $num;

    public $output;

    function __construct($num)
    {
        $this->num = $num;

        $this->output = $this->factorize($num);

    }

    private function factorize($num)
    {
        if ($num <= 0) {
            return 'Number must be positive';
        }

        if (! filter_var($num, FILTER_VALIDATE_INT)){
            return 'Number must be an integer';
        }

        echo 'The input number is ' . $num . ' and ';

        $primes = [];
        $mod = 2;

        if ($num == 1) {
            $primes[] = 1;
        }

        while ($num > 1) {

            while ($num % $mod == 0) {

                $primes[] = $mod;
                $num /= $mod;
            }

            $mod++;
        }

        return $primes;
    }

}

for ($loop = 1; $loop <=100; $loop++) {

    $test = new PrimeFactors($loop);

    if (is_array($test->output)) {

        $length = count($test->output);

        echo ($length > 1) ? 'the prime factors are ' : 'the prime factor is ';

        foreach ($test->output as $out)
        {
            echo $length > 1 ? strval($out) . ', ' : strval($out);
            $length --;
        }

        echo "\n";

    } else {

        echo $test->output;

        echo "\n";
    }
}





