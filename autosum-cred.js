
function startCalc()
{
  interval = setInterval("calc()",1);
}

function calc()
{
  one = document.autoSumCred.total.value;
  two = document.autoSumCred.discount.value; 
  three = (one * 1) - (two * 1);
  document.autoSumCred.amount_due.value = three.toFixed(2);

  four = document.autoSumCred.tendered.value; 
  five=(one * 1) - (four * 1);
  document.autoSumCred.cash_change.value = five.toFixed(2);
}

function stopCalc()
{
  clearInterval(interval);
}

function CredFunction()
{
	one = document.autoSumCred.total.value;
	document.autoSumForm.amount_due.value = one;
}