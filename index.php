<?php

require_once 'service/Func.php';
require_once 'model/PatternData.php';

$pat = new PatternData();

$pat_data = $pat->makePattern();

Func::view('svg-01', $pat_data);


