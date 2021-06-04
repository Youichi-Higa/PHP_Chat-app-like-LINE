<?php

// DB接続情報
$dbn = 'mysql:dbname=gsacf_l05_07;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// DB接続
try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}

$sql = 'SELECT * FROM chat_table';

$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  exit('sqlError:' . $error[2]);
} else {
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $output = "";
  foreach ($result as $record) {
    $output .= "<tr><td>{$record['u_name']}</td><td>{$record['u_message']}</td><tr>";
  };
};

?>

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
      padding: 5px 0 5px;
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

    /* 自分のメッセージ */
    #me {
      padding: 10px;
      border-radius: 10px;
      background: #1dcd00;
      max-width: 200px;
      font-size: 15px;
      word-wrap: break-word;
      margin: 10px 0 10px auto;
    }

    /* 他人のメッセージ */
    #others {
      padding: 10px;
      border-radius: 10px;
      background: #ccc;
      max-width: 200px;
      font-size: 15px;
      word-wrap: break-word;
      margin: 10px 0 10px;
    }

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
    <h1>＜PHP＞<br>LINE風チャットアプリ</h1>
  </header>

  <!-- データ出力場所 -->
  <div class="scroll">
    <ul id="output"></ul>
  </div>

  <!-- 入力場所を作成しよう -->
  <form action="chat_create.php" method="POST">
    <ul>
      <li class="mb-2">
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
    const data = <?= json_encode($result) ?>;
    console.log(data);

    data.forEach(function(x) {
      if (x.u_name == "比嘉") {
        x.id = "me"
      } else {
        x.id = "others"
      }
    });

    const tagArray = []; // `dataArray`は前回出てきたオブジェクトの配列
    data.forEach(function(x) {
      tagArray.push(`
      <li id=${x.id}>
        <p>${x.u_name}</p>
        <p>${x.u_message}</p>
        <p>${x.created_at}</p>
      </li> `);
    });

    $("#output").html(tagArray);


    $(document).ready(function() {
      hsize = $(window).height();
      $(".scroll").css("height", hsize - 185 + "px");

      // スクロールの開始位置を常に一番下に設定 親要素にcssで「overflow: scroll;」しておく必要あり
      let target = document.getElementById("output");
      target.scrollIntoView(false);
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