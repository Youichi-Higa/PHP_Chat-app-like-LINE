<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <script src="https://kit.fontawesome.com/cf7bbc35a3.js" crossorigin="anonymous"></script>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
  <title>chatApp</title>
  <style>
    body {
      background-image: url(img/background.jpeg);
      margin: 0;
      height: 100vh;
    }

    header {
      background-color: #001e43;
      text-align: center;
      color: #fff;
    }

    h1 {
      margin: 0;
      padding: 20px 0 10px;
      font-size: 16px;
    }

    ul {
      list-style: none;
      margin: 0;
      padding: 5px 5px 10px;
    }

    p {
      margin: 0 0 10px;
    }

    .scroll {
      overflow: scroll;
    }

    #output li {
      padding: 10px;
      border-radius: 10px;
      background: #1dcd00;
      max-width: 200px;
      font-size: 15px;
      word-wrap: break-word;
      margin: 10px 0 10px auto;
    }

    /* .other_message {
        padding: 10px;
        border-radius: 10px;
        background: #ccc;
        max-width: 200px;
        font-size: 15px;
        word-wrap: break-word;
        margin: 10px 0 10px;
      } */
    form {
      display: flex;
      width: 100%;
      background: whitesmoke;
      align-items: center;
      justify-content: center;
      position: absolute;
      left: 50%;
      bottom: 0;
      transform: translateX(-50%);
      -webkit-transform: translateX(-50%);
    }

    #send_btn {
      width: 5px;
      height: 5px;
    }
  </style>
</head>

<body>
  <header>
    <h1>LINE風チャットアプリ</h1>
  </header>

  <!-- データ出力場所 -->
  <div class="scroll">
    <ul id="output"></ul>
  </div>

  <!-- 入力場所を作成しよう -->
  <form action="chat_create.php" method="POST">
    <ul>
      <li>
        <label for="name">name</label>
        <input type="text" id="name" name="u_name">
      </li>
      <li>
        <textarea name="u_message" id="text" cols="35" rows="3"></textarea>
      </li>
    </ul>
    <div id="send_btn">
      <button class="btn btn-outline-primary btn-sm fas fa-paper-plane" id="send"></button>
    </div>
  </form>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script>
    //  textareaの自動リサイズ（メッセージ部分に被るので無効に）
    // $(function () {
    //   $("#text").on("change keyup keydown paste cut", function () {
    //     if ($(this).outerHeight() > this.scrollHeight) {
    //       $(this).height(1);
    //     }
    //     while ($(this).outerHeight() < this.scrollHeight) {
    //       $(this).height($(this).height() + 1);
    //     }
    //   });
    // });

    $(document).ready(function() {
      hsize = $(window).height();
      $(".scroll").css("height", hsize - 185 + "px");
    });
    $(window).resize(function() {
      hsize = $(window).height();
      $(".scroll").css("height", hsize - 185 + "px");
    });
  </script>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>



<!-- とりあえず残しているやつ 後で削除する -->
<!-- <form action="todo_create.php" method="POST">
    <fieldset>
      <legend>DB連携型todoリスト（入力画面）</legend>
      <a href="todo_read.php">一覧画面</a>
      <div>
        todo: <input type="text" name="todo">
      </div>
      <div>
        deadline: <input type="date" name="deadline">
      </div>
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form> -->

<!-- db.orderBy("time", "asc").onSnapshot(function(querySnapshot) {
// onSnapshotでcloud firestoreのデータ変更時に実行される!
// querySnapshot.docsにcloud firestoreのデータが配列形式で入る
const dataArray = []; // 必要なデータだけが入った新しい配列を作成
querySnapshot.docs.forEach(function(doc) {
const data = {
id: doc.id,
data: doc.data(),
};
dataArray.push(data);
console.log(dataArray);
});

const tagArray = []; // `dataArray`は前回出てきたオブジェクトの配列
dataArray.forEach(function(data) {
tagArray.push(`
<li id=${data.id}>
  <p>${data.data.name}</p>
  <p>${data.data.text}</p>
  <p>${convertFromFirestoreTimestampToDatetime(
    data.data.time.seconds
    )}</p>
</li> `);
});

// 自分のメッセージは右、他人は左にしたかったけどできなかった！
// if (data.data.name != "比嘉") {
// // $(this).parent.removeClass();
// $(this).parent().addClass("other_message");
// }

$("#output").html(tagArray);
// スクロールの開始位置を常に一番下に設定 親要素にcssで「overflow: scroll;」しておく必要あり
let target = document.getElementById("output");
target.scrollIntoView(false);
}); -->