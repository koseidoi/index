<div style="background:#eef;">
<!-- ▼LINE風ここから -->
<div class="line__container">
    <!-- タイトル -->
    <div class="line__title">
      オープンチャット
    </div>

    <!-- ▼会話エリア scrollを外すと高さ固定解除 -->
    <div class="line__contents scroll" id="el">

      <!-- 相手の吹き出し
      <div class="line__left">
        <div class="line__left-text">
          <div class="name">うさきち</div>
          <div class="text">ねぇねぇ、帰ってくるのおそいんだけど！！今どこいまどこいまどこーー</div>
        </div>
      </div>

      相手の吹き出し
      <div class="line__left">
        <div class="line__left-text">
          <div class="name">うさきち</div>
          <div class="text">今から帰るよー</div>
        </div>
      </div> 

       自分の吹き出し 
      <div class="line__right">
        <div class="text">了解！寝過ごさないようにだよ〜風呂ためとこ</div>
      </div> -->

    </div>
    <!--　▲会話エリア ここまで -->
  </div>
  <!--　▲LINE風ここまで -->

  <div class="commit" style="width:100vw;">
    <h1>コメント</h1>
    <div class="input-group mb-3" style="width:200px; padding: 10px;">
        <input type="text" class="form-control" placeholder="名前" aria-label="名前" aria-describedby="名前" name="name" id="name">
    </div>
    <div class="input-group mb-3" style="padding:10px;padding-top:0px;width:350px; ">
    <input type="text" class="form-control" placeholder="コメント内容" aria-label="コメント内容" aria-describedby="コメント内容" name="comment" id="comment">
    <button class="btn btn-outline-secondary" type="submit" id="submit">投稿</button>
    </div>
    <div id="err">
     
    </div>
   
    <div style="height:120px;"></div>
</div>

</div>

<script>
  const el = document.getElementById('el');
  el.scrollTo(0, el.scrollHeight);

  const submit = document.getElementById("submit");
  let name = document.getElementById("name");
  let comment = document.getElementById("comment");

  const err = document.getElementById("err");
  
  let id = 0;


  submit.addEventListener("click",()=>{
    if(name.value == "" || comment.value == ""){
      return;
    }

    fetch("http://koseidoi.starfree.jp/home/dynamic/add-comment.php?name="+name.value+"&comment="+comment.value)
    .catch(error => {
      err.innerHTML = '<div class="alert alert-danger" role="alert">投稿できませんでした。</div>';
      console.log("err");
    });
    
    comment.value = "";
    
    update();

    fetch("http://koseidoi.starfree.jp/home/dynamic/get-id.php")
    .then((promise) => promise.text())
    .then(response =>{
      id = Number(response);
    });
  });


  fetch("http://koseidoi.starfree.jp/home/dynamic/get-comment.php")
  .then((promise) => promise.text())
  .then(response =>{
    let source = response;
    split = source.split("#");
    data = [];

    for(let i=0;i<split.length-1;i++){
      data.push(split[i].split(" "));
    }

    for(let i=0;i<split.length-1;i++){
      html = '<div class="line__left"><div class="line__left-text"><div class="name" id="NAME">' + data[i][0] + '</div><div class="text">' + data[i][1] +'</div></div></div>';

      let div = document.createElement("div");

      div.innerHTML = html;

      el.appendChild(div);
    
      el.scrollTo(0, el.scrollHeight);

    }
  });
  
  fetch("http://koseidoi.starfree.jp/home/dynamic/get-id.php")
  .then((promise) => promise.text())
  .then(response =>{
    id = Number(response);
  })
    

  let update = () =>{
    fetch("http://koseidoi.starfree.jp/home/dynamic/update-comment.php?id=" + String(id))
    .then((promise) => promise.text())
    .then(response =>{
      let source = response;
      split = source.split("#");
      data = [];

      for(let i=0;i<split.length-1;i++){
        data.push(split[i].split(" "));
      }

      for(let i=0;i<split.length-1;i++){
        html = '<div class="line__left"><div class="line__left-text"><div class="name" id="NAME">' + data[i][0] + '</div><div class="text">' + data[i][1] +'</div></div></div>';

        let div = document.createElement("div");

        div.innerHTML = html;

        el.appendChild(div);
        
        if(el.scrollTop > 485){
          el.scrollTo(0, el.scrollHeight);
        }
      }

      names = document.getElementsByClassName("name");

      for(let i=0;i<names.length;i++){
        if(names[i].innerText == name.value){
          console.log(names[i].innerText);
          let txt = names[i].nextElementSibling;
          let parent = names[i].parentNode;
          let grandParent = parent.parentNode;
          grandParent.className = "line__right";
          grandParent.innerHTML = '<div class="text">'+ txt.innerText +'</div>';

          //names[i].remove();
        }
      }

      fetch("http://koseidoi.starfree.jp/home/dynamic/get-id.php")
      .then((promise) => promise.text())
      .then(response =>{
        id = Number(response);
      });

    });
    
    

    console.log("updated");
  }
  
  setInterval(update, 3000);
   

</script>