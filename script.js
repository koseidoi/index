let url = new URL(window.location.href);

// URLSearchParamsオブジェクトを取得
let params = url.searchParams;
const list = document.querySelectorAll(".list");

if(params.get("scene") == "comment"){
	list.forEach((item) => 
    item.classList.remove("active"));
    list[1].classList.add("active");
}
else if(params.get("scene") == "qa"){
	list.forEach((item) => 
    item.classList.remove("active"));
    list[2].classList.add("active");
}


function activeLink(){
    list.forEach((item) => 
    item.classList.remove("active"));
    this.classList.add("active");
}

list.forEach((item) =>
item.addEventListener("click",activeLink))