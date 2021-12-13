
function startCalc()
{
  interval = setInterval("calc()",1);
}

function calc()
{
  one = document.autoSumForm.total.value;
  two = document.autoSumForm.discount.value; 
  three = (one * 1) - (two * 1);
  document.autoSumForm.amount_due.value = three.toFixed(2);

  four = document.autoSumForm.tendered.value; 
  five=(one * 1) - (four * 1);
  document.autoSumForm.change.value = five.toFixed(2);

  
}

function stopCalc()
{
  clearInterval(interval);
}

function CredFunction()
{
	one = document.autoSumForm.total.value;
	document.autoSumForm.amount_due.value = one;
}