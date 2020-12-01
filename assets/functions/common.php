<?php

// サニタイズ
function h($str) {
  return htmlspecialchars($str, ENT_QUOTES);
}

// ランダムな8桁の文字列を生成
function random($length = 8)
{
  return substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, $length);
}

?>