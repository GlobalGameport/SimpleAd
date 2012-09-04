<?php

define("REDIRECT", 0);
define("CODE", 1);
define("IMAGE", 2);
/**
array(
'[Ad Group ID]' => array(
  '[AD ID]' => array(
    'type' => DIRECT
    'code' => ''
  ),
  '[AD ID]' => array(
    'type' => REDIRECT,
    'url' => 
  ),
  '[AD ID]' => array(
    'type' => IMAGE,
    'formats' => array(
      'leaderboard' => array(
        'image' => '[PATH TO FILE]',
        'url' => 
        )
      )
    )
  ),
'[Ad Group ID]' => array()
);
**/
$ads = array(
  1 => array( //Ad Group 1 (Forum Ads)
    1 => array(
      'type' => CODE,
      'formats' => array(
        'leaderboard' => array(
          'code' => 'if (! frn046adxtra ) var frn046adxtra = "";var frn046enrich = (typeof pt027bw == \'undefined\')? "&amp;band=256"+frn046adxtra : "&amp;band="+pt027bw+frn046adxtra;document.write(\'&lt;scr\' + \'ipt type="text/javascript" src="http://adserver.freenet.de/js.ng/site=pcgames&amp;affiliate=globalgame&amp;adset=b&amp;prod=pcgames&amp;tbl=channel&amp;ppos=1&amp;wi=0\'+frn046enrich+\'"&gt;&lt;\/script&gt;\');',
        ),
      ),
      'weight' = 20,
    ),
    2 => array(
      'type' => IMAGE,
      'formats' => array(
        'leaderboard' => array(
          'image' => 'http://static.globalgameport.com/b4nner/preorder_ac3.gif',
          'url' => 'http://shop.globalgameport.com/?s=%22assassin%27s+creed+III%22&n=37',
        ),
      ),
      'weight' = 10,
    ),
  ),
);
?>