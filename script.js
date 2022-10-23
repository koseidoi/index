fetch("https://kosei.doi.mydns.jp/data.json")
.then(response => {
	return response.json()
})
.then(data => {
	console.log(data);
	let elem = document.getElementById("data");
	elem.innerHtml = data.name + ":" + data.title; 
})
.catch(error => {
	console.log(error)
})
