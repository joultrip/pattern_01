<?php


// 004040 darkestblue
// BF0000 rot
// 7ccc7a lightlightgreen
// 64c462 lightgreen
// 00A0C6 doveblue
// 99e4ef lightblue

class PatternData
{
  public function makePattern()
  {

    $pattern_total = '';

    // Load SVG template
    $svg_template = file_get_contents('svgs/single-tile.svgdata');

    // Define colors and filters
    $colors = ["#BF0000", "#004040", "#99e4ef", "none", "none", "none", "none"];
    $blurs = ['url(#f1)', 'url(#f2)', 'url(#f3)'];
    $bg_color = '#7ccc7a';

    $fill_grid = [];


    for($n=1;$n<=50;$n++){
      $svg_content = $svg_template;

      // Replace placeholders with actual values
      $color_5 = $colors[$this->randChoose($n,1)];
      $color_6 = $colors[$this->randChoose($n,1)];
      $color_7 = $colors[$this->randChoose($n,1)];
      $color_8 = $colors[$this->randChoose($n,1)];
      $svg_content = str_replace('$color_1', $colors[$this->randChoose($n,1)], $svg_content);
      $svg_content = str_replace('$color_2', $colors[$this->randChoose($n,2)], $svg_content);
      $svg_content = str_replace('$color_3', $colors[$this->randChoose($n,3)], $svg_content);
      $svg_content = str_replace('$color_4', $colors[$this->randChoose($n,4)], $svg_content);

      if($n>11) {
        $choice = [$fill_grid[$n-1][8],$fill_grid[$n-10][7]];
        $svg_content = str_replace('$color_5', $choice[rand(0,1)], $svg_content);
        $choice2 = [$fill_grid[$n-10][6],$color_8];
        $svg_content = str_replace('$color_8', $choice2[rand(0,1)], $svg_content);
        $choice3 = [$fill_grid[$n-1][6],$color_7];
        $svg_content = str_replace('$color_7', $choice3[rand(0,1)], $svg_content);
      }
      else {
        $svg_content = str_replace('$color_5', $color_5, $svg_content);
        $svg_content = str_replace('$color_8', $color_8, $svg_content);
        $svg_content = str_replace('$color_7', $color_7, $svg_content);
      }
      $svg_content = str_replace('$color_6', $color_6, $svg_content);
      $svg_content = str_replace('$color_9', $colors[$this->randChoose($n,9)], $svg_content);
      $svg_content = str_replace('$blur1', $blurs[0], $svg_content);
      $svg_content = str_replace('bgr_color', $bg_color, $svg_content);

      $fill_grid[$n][5] = $color_5;
      $fill_grid[$n][6] = $color_6;
      $fill_grid[$n][7] = $color_7;
      $fill_grid[$n][8] = $color_8;

      $pattern_total .= $svg_content ;
      if($n % 10 == 0) $pattern_total .= '<div style="clear: both"></div>';
    }

    return $pattern_total;
    
  }

  private function randChoose($n, $m)
  {



    return rand(0, 6);
  }
}


