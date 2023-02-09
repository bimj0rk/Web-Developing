function area(length, width) {
    let result = length * width; 
    return result; 
}

function max(a, b) {
	if (a > b) {
		return a;
	} else {
		return b;
	}
}

function factorialLoopFor(n) {
	let resultat = 1;

	for (let i = 1; i <= n; i++) {
		resultat = resultat * i;
	}

	return resultat;
}


function factorialLoopWhile(n) {
	let resultat = 1;
	let i = 1; 

	while (i <= n) {
		resultat = resultat * i;
		i++;
	}

	return resultat;
}

function sumDigit(n){
	let sum = 0;

	while(n > 0){
		sum += n%10;
		n=parseInt(n/10);
	}

	return sum;
}

function deleteElement(arr, element){
	let index = arr.indexOf(element);

	if(index !== -1)
		arr.splice(index, 1);

	return arr;
}