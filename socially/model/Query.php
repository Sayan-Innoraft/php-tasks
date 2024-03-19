<?php

require 'creds.php';

/**
 * Query class initiates a database connection to mysql database server, adds
 * new users, resets passwords, checks if the username is already in database
 * and returns password to a specific username.
 */
class Query {

  /**
   * Database connection.
   */
  private static mixed $conn = null;

  /**
   * Connects to mysql database. If the connection is successful, returns true
   * else returns false.
   *
   * @return bool
   *   If connection is successful , returns true, else returns false.
   */
  static function connect(): bool {
    global $server_host, $db_username, $db_password, $dbname;

    // Connection.
    self::$conn = new mysqli(
      $server_host,
      $db_username,
      $db_password,
      $dbname
    );

    // For checking if connection is successful or not.
    return !self::$conn->connect_error;
  }

  /**
   * Adds new user to the database. If a User gets added successfully, returns
   * true,else returns false.
   *
   * @param string $username
   *   Username of the user.
   * @param string $first_name
   *   First name of the user.
   * @param string $last_name
   *   Last name of the user.
   * @param string $password
   *   Password of the user.
   *
   * @return bool
   *   Returns true if inserting new user details to the server is
   *   successful, else returns false.
   */
  static function addUser(string $username, string $first_name,
                          string $last_name, string $password):bool {
    if ($username != null && $password != null) {
      $sql1 = "INSERT INTO users(username, first_name, last_name) VALUE ('$username', '$first_name','$last_name')";
      $sql2 = "INSERT INTO user_password VALUE ( '$username','$password')";
      return mysqli_query(self::$conn, $sql1) && mysqli_query(self::$conn,
          $sql2);
    }
    return false;
  }

  /**
   * Resets password of a user after validating user's old password.Returns
   * true if operation successful, else returns false.
   *
   * @param string $name
   *   Username of the user.
   * @param string $oldPass
   *   Old password of the user.
   * @param string $newPass
   *   New Password of the user.
   *
   * @return bool
   *   Returns true if operation successful, else returns false.
   */
  static function resetPassword(string $name, string $oldPass, string $newPass)
  :bool {
    if (self::getUserPassword($name) == $oldPass) {
      $sql = "UPDATE user_password SET password = '$newPass' WHERE username = '$name'";
      return (bool)mysqli_query(self::$conn, $sql);
    }
    else {
      return false;
    }
  }

  /**
   * Gets password of the user. Returns password as a string. If a username
   * doesn't exist in the database, returns false.
   *
   * @param string $name
   *   Username of the user.
   *
   * @return string|null
   *   Returns password as string. returns null if username doesn't exist in
   *   the database.
   */
  static function getUserPassword(string $name):?string {
    if (self::checkUser($name)) {
      $sql = "SELECT password FROM user_password WHERE username = '$name'";
      $res = mysqli_query(self::$conn, $sql);
      return mysqli_fetch_assoc($res)['password'];
    }
    return null;
  }

  /**
   * Checks if the username already exists in the database or not.
   *
   * @param string $username
   *   Username of the user.
   *
   * @return bool
   *   Returns true if user already exists in the database, returns false if
   *   username doesn't exist in a database.
   */
  static function checkUser(string $username):bool {
    $sql = "SELECT username FROM users WHERE username = '$username'";
    $res = mysqli_query(self::$conn, $sql);
    return !mysqli_fetch_assoc($res) == null;
  }

  /**
   * @param string $username
   * @param string|null $postText
   * @param string|null $post
   * @return bool
   */
  static function addPost(string $username, ?string $postText, ?string
  $post):bool {
      $sql = "INSERT INTO posts(username, text, post) VALUE ('$username',
                                                '$postText', '$post')";
      return mysqli_query(self::$conn, $sql);

  }

  /**
   * @return mysqli_result|bool
   */
  static function showPost(int $start, int $end): mysqli_result|bool {
    $sql = 'SELECT * FROM posts order by id desc limit ' . $start . ',' . $end;
     return mysqli_query(self::$conn, $sql);
  }

  /**
   * @param string $username
   * @return false|array|null
   */
  static function getProfile(string $username): false|array|null {
    $sql = "SELECT * FROM users where username = '$username'";
    $res = mysqli_query(self::$conn,$sql);
    return mysqli_fetch_assoc($res);
  }

  /**
   * @param string $username
   * @param string|null $firstName
   * @param string|null $lastName
   * @param string|null $email
   * @param string|null $bio
   * @param string|null $image
   * @return bool
   */
  static function uprateProfile(string $username, ?string $firstName, ?string
  $lastName, ?string $email, ?string $bio, ?string $image):bool {
    $sql = "UPDATE users SET first_name = '$firstName', last_name = '$lastName', profile_photo = '$image', email = '$email', bio = '$bio' WHERE username = '$username'";
    return mysqli_query(self::$conn,$sql);
  }

}
