<?php 
function findUserByEmail($email) {
  global $db;
  $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
  $stmt->execute(array(strtolower($email)));
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  return $user;
}

function findUserById($id) {
  global $db;
  $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
  $stmt->execute(array($id));
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  return $user;
}

function createUser($fullname, $email, $password) {
  global $db;
  $stmt = $db->prepare("INSERT INTO users (email, password, fullname) VALUE (?, ?, ?)");
  $stmt->execute(array($email, $password, $fullname));
  return $db->lastInsertId();
}

function findNameUserById($id) {
  global $db;
  $stmt = $db->prepare("SELECT users.fullname FROM users WHERE id = ?");
  $stmt->execute(array($id));
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  return $user["fullname"];
}

function addFeeds(){
  global $db;

  $stmt = $db->prepare("SELECT * FROM posts");
  //Thiết lập kiểu dữ liệu trả về
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $stmt->execute();

  $resultSet = $stmt->fetchAll();
  foreach ($resultSet as $row) {

    $user = findNameUserById($row["userId"]);
    $content =  $row["content"] . ' ';
    $time = $row["createdAt"] . ' ';

    echo "
      <div class=\"card  \" style=\"width: 20rem;\">
        <div class=\"card-body\">
          <h4 class=\"card-title\">$user</h4>
          <h6 class=\"card-subtitle mb-2 text-muted\">$time</h6>
          <p class=\"card-text\">$content</p>
        </div>
      </div>
      </br>
    ";
  }
}

function addNewFeed($content, $userId)
{
  global $db;

  $stmt = $db->prepare("INSERT INTO posts (userId, content) VALUE (?, ?)");
  $stmt->execute(array($userId, $content));

  return $db->lastInsertId();
}

function changePassword($userId, $oldpassword, $newpassword){
  global $db;

  $user = findUserById($userId);
  if (password_verify($oldpassword, $user['password'])) 
  {
    $password = password_hash($newpassword, PASSWORD_DEFAULT);
    $stmt = $db->prepare("UPDATE users SET users.password = $password WHERE users.userId = $userId");
  }
  else{
    return false;
  }
}