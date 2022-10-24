<?php

// coalescing operator (??)

// $name = isset($_GET['name']) ? $_GET['name'] : 'anonymous';

$name = $_GET['name'] ?? 'anonymous';

echo $name;