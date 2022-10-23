fetch("https://kosei.doi.mydns.jp/data.json")
.then(response => {
	return response.json()
})
.then(data => {
	console.log(data)
})
.catch(error => {
	console.log(error)
})
