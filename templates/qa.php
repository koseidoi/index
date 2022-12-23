<div class="alert alert-primary" role="alert" style="margin-top:10px">
  質問してみよう
</div>
<h6>余裕があれば質問にお答えします。匿名も可</h6>
<div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="名前(匿名可)" aria-label="名前" aria-describedby="basic-addon1" id="name">
</div>
<div class="input-group">
  <span class="input-group-text">内容</span>
  <textarea class="form-control" aria-label="内容" id="content"></textarea>
</div>
<button type="button" class="btn btn-success" id="submit" style="margin:10px">送信</button>

<div id="err"></div>

<script>
    let button = document.getElementById("submit");
    let name = document.getElementById("name");
    let content = document.getElementById("content");
    let err = document.getElementById("err")
    button.addEventListener("click",()=>{
        fetch("http://koseidoi.starfree.jp/home/dynamic/question.php?name=" + name.value + "&comment=" + content.value)
        .then(c =>{
           err.innerHTML = '<div class="alert alert-success" role="alert">送信しました</div>';
        })
        .catch(error => {
        err.innerHTML = '<div class="alert alert-danger" role="alert">送信に失敗しました</div>';
        console.log("err");
        });
    })
</script>