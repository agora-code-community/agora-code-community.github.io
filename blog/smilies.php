<?php
function Smiley($texttoreplace)
{
    $smilies=array( 
    
    
    ':)' => "<img src='images/smile.gif'>",
    ':blush' =>"<img src='images/blush.gif'>",
    ':angry' =>"<img src='images/angry.gif'>",
    ':o'=>     "<img src='images/shocked.gif'>",
    ':shocked'=>     "<img src='images/shocked.gif' />",
    ':{blink}'=>"<img src='images/winking.gif'>",
    '{clover}'=>"<img src='images/clover.gif'>",
    ':[glasses]'=>"<img src='images/glasses.gif'>",
    ':[barf]'=>"<img src='images/barf.gif'>",
    ':[reallymad]'=>"<img src='images/mad.gif'>",
    ':[normal]'=>"<img src='../smiley/normal.gif'>",
    ':[inqu]'=>"<img src='../smiley/inquisitive.gif'>",
    ':[happyinlove]'=>"<img src='../smiley/happyinlove.gif'>",
    ':[sadinlove]'=>"<img src='../smiley/sadinlove.gif'>",
    ':[normalinlove]'=>"<img src='../smiley/normalaboutlove.gif'>",
    ':[bangry]'=>"<img src='../smiley/angry.jpg'>",
    ':[grin]'=>"<img src='../smiley/grin.jpg'>",
    ':[sadness]'=>"<img src='../smiley/sadness.jpg'>",
    ':[smilies]'=>"<img src='../smiley/smiles.jpg'>",
    ':[winking]'=>"<img src='../smiley/winking.jpg'>",
    'fuck'=>"$#$%",
    'Fuck'=>"&$#@"
  
 
    );

    $texttoreplace=str_replace(array_keys($smilies), array_values($smilies), $texttoreplace);
    return $texttoreplace;
}
?>