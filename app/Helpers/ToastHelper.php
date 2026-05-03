<?php

namespace App\Helpers;

class ToastHelper
{
    public static function showToast($var1, $var2, $timeout = "", $position = "top-right")
    {
        if ($timeout == "") {
            if ($var1 == "success") {
                $timeout = 6000;
            } else {
                $timeout = 8000;
            }
        } else {
            $timeout = $timeout;
        }
        
        // Map position to Notyf position
        $positionMap = [
            'top-right' => ['x' => 'right', 'y' => 'top'],
            'top-left' => ['x' => 'left', 'y' => 'top'],
            'top-center' => ['x' => 'center', 'y' => 'top'],
            'bottom-right' => ['x' => 'right', 'y' => 'bottom'],
            'bottom-left' => ['x' => 'left', 'y' => 'bottom'],
            'bottom-center' => ['x' => 'center', 'y' => 'bottom']
        ];
        
        $pos = $positionMap[$position] ?? $positionMap['top-center'];
        
        echo '<script type="text/javascript">
            $(document).ready(function(){
                const notyf = new Notyf({
                    position: {x: "' . $pos['x'] . '", y: "' . $pos['y'] . '"},
                    duration: ' . $timeout . ',
                });
                notyf.' . $var1 . '("' . $var2 . '");
            });
        </script>';
    }
}
