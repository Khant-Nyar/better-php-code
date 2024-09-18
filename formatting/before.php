<?php
function check($scp, $uid){
  if (Auth::user()->hasRole('admin')){
    return true;
  }
  else {
  switch ($scp) {
    case 'public':
      return true;
      break;
    case 'private':
      if (Auth::user()->id === $uid)
        return true;
      break;
    default: return false;
  }
  return false;
  }
}
