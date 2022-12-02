<?php 

namespace Helpers ;

use Database\MySQL ;
use PDOException ;

class Usertable {
    private $db = null ;

    public function __construct(MySQL $db) {
        $this->db = $db->connect() ;
    }

    // public function insert($data) {
    //     try {
    //         $query = "INSERT INTO users(name, email, created_at, modified_at) VALUES (:name, :email, NOW(), NOW() )" ;
    //         $statement = $this->db->prepare($query) ;
    //         $statement->execute($data) ;

    //         return $this->db->lastInsertId() ;
    //     } catch (PDOException $e) {
    //         return $e->getMessage() ;
    //     }
    // }

    public function register($data) {
        try {
            $query = "INSERT INTO register_users(name, email, password, comfirm_password, created_at, modified_at) VALUES (:name, :email, :password, :comfirm_password, NOW(), NOW() )" ;
            $statement = $this->db->prepare($query) ;
            $statement->execute($data) ;

            return $this->db->lastInsertId() ;
        } catch (PDOException $e) {
            return $e->getMessage() ;
        }
    }

    public function findByNameAndEmail($name, $email) {
        $statement = $this->db->prepare("SELECT * FROM register_users WHERE name = :name AND email = :email") ;
        $statement->execute([
            ':name' => $name ,
            ':email' => $email ,
        ]) ;

        $row = $statement->fetch() ;

        return $row ?? false ;
    }

    public function bioUpdate($id, $summary) {
        try {
            $statement = $this->db->prepare("UPDATE register_users SET bio = :summary WHERE id = :id") ;
            $statement->execute([
                ':summary' => $summary ,
                ':id' => $id ,
            ]) ;
            return $statement->rowCount() ;
        } catch (PDOException $e) {
            return $e->getMessage() ;
        }
    }

    public function talentInsert($data) {
        try {
            $query = "INSERT INTO talent (register_users_id, hobby, education, job, location, sport, tips, created_at, modified_at) VALUES (:register_users_id, :hobby, :education, :job, :location, :sport, :tips, NOW(), NOW() )" ;
            $statement = $this->db->prepare($query) ;
            $statement->execute($data) ;
            return $this->db->lastInsertId() ;
        } catch (PDOException $e) {
            return $e->getMessage() ;
        }
    }

    public function talentShow() {
        try {
            $statement = $this->db->query("SELECT * FROM talent") ;
            return $statement->fetchAll() ;
        } catch (PDOException $e) {
            return $e->getMessage() ;
        }
    }

    public function singelHobby($id, $hobby) {
        try {
            $query = $this->db->prepare("UPDATE talent SET hobby = :hobby WHERE register_users_id = :register_users_id") ;
            $query->execute([
                ':hobby' => $hobby ,
                ':register_users_id' => $id ,
            ]) ;

            $row = $query->fetch() ;
            return $row ?? false ;
        } catch (PDOException $e) {
            return $e->getMessage() ;
        }
    }

    public function singelEducation($id, $education) {
        try {
            $query = $this->db->prepare("UPDATE talent SET education = :education WHERE register_users_id = :register_users_id") ;
            $query->execute([
                ':education' => $education ,
                ':register_users_id' => $id ,
            ]) ;

            $row = $query->fetch() ;
            return $row ?? false ;
        } catch (PDOException $e) {
            return $e->getMessage() ;
        }
    }

    public function singelJob($id, $job) {
        try {
            $query = $this->db->prepare("UPDATE talent SET job = :job WHERE register_users_id = :register_users_id") ;
            $query->execute([
                ':job' => $job ,
                ':register_users_id' => $id ,
            ]) ;

            $row = $query->fetch() ;
            return $row ?? false ;
        } catch (PDOException $e) {
            return $e->getMessage() ;
        }
    }

    public function singelLocation($id, $location) {
        try {
            $query = $this->db->prepare("UPDATE talent SET location = :location WHERE register_users_id = :register_users_id") ;
            $query->execute([
                ':location' => $location ,
                ':register_users_id' => $id ,
            ]) ;

            $row = $query->fetch() ;
            return $row ?? false ;
        } catch (PDOException $e) {
            return $e->getMessage() ;
        }
    }

    public function singelSport($id, $sport) {
        try {
            $query = $this->db->prepare("UPDATE talent SET sport = :sport WHERE register_users_id = :register_users_id") ;
            $query->execute([
                ':sport' => $sport ,
                ':register_users_id' => $id ,
            ]) ;

            $row = $query->fetch() ;
            return $row ?? false ;
        } catch (PDOException $e) {
            return $e->getMessage() ;
        }
    }

    public function singelTips($id, $tips) {
        try {
            $query = $this->db->prepare("UPDATE talent SET tips = :tips WHERE register_users_id = :register_users_id") ;
            $query->execute([
                ':tips' => $tips ,
                ':register_users_id' => $id ,
            ]) ;

            $row = $query->fetch() ;
            return $row ?? false ;
        } catch (PDOException $e) {
            return $e->getMessage() ;
        }
    }

    public function postInsert($id, $text, $photo) {
        try {
            $statement = $this->db->prepare("INSERT INTO users_post(register_users_id ,text, photo, created_at, modified_at) VALUES ( :register_users_id,:text, :photo, NOW(), NOW())") ;
            $statement->execute([
                ':register_users_id' => $id ,
                ':text' => $text ,
                ':photo' => $photo,
            ]) ;
            return $this->db->lastInsertId() ;
        } catch (PDOException $e) {
            return $e->getMessage() ;
        }
    }
    // public function testInsert($text, $photo) {
    //     $statement = $this->db->prepare("INSERT INTO test_one(text, photo, created_at) VALUES (:text, :photo, NOW() )");
    //     $statement->execute([
    //         ':text' => $text ,
    //         ':photo' => $photo ,
    //     ]) ;
    //     return $this->db->lastInsertId() ;
    // }

    // public function showTest() {
    //     $statement = $this->db->query("SELECT * FROM test_one") ;
    //     return $statement->fetchAll() ;
    // }

    public function showPosts() {
        try {
            $statement = $this->db->query("SELECT register_users.name,register_users.id,users_post.register_users_id,users_post.text,users_post.id,users_post.photo,users_post.created_at FROM register_users,users_post WHERE register_users.id = users_post.register_users_id ORDER BY users_post.id DESC") ;
            return $statement->fetchAll() ;
        } catch (PDOException $e) {
            return $e->getMessage() ;
        }
    }

    public function like() {
        try {
            $statement = $this->db->prepare("SELECT * FROM users_post") ;
            return $statement->fetchAll() ;
        } catch (PDOException $e) {
            return $e->getMessage() ;
        }
    }

    public function deletePost($id) {
        try {
            $statement = $this->db->prepare("DELETE FROM users_post WHERE id = :id") ;
            $statement->execute([':id' => $id]) ;
            return $statement->rowCount() ;
        } catch (PDOException $e) {
            return $e->getMessage() ;
        }
    }

    public function detailPost($id) {
        try {
            $statement = $this->db->prepare("SELECT * FROM users_post WHERE id = :id") ;
            $statement->execute([':id' => $id]) ;
            return $statement->fetchAll() ;
        } catch (PDOExcetion $e) {
            return $e->getMessage() ;
        }
    }

    public function wallPhoto() {
        try {
            $statement = $this->db->query("SELECT * FROM register_users");
            return $statement->fetchAll() ;
        } catch (PDOException $e) {
            return $e->getMessage() ;
        }
    }

    public function updatePhoto($id, $name) {
        try {
            $statement = $this->db->prepare("UPDATE register_users SET photo = :name WHERE id = :id") ;
            $statement->execute([
                ':name' => $name ,
                ':id' => $id ,
            ]) ;
            return $statement->rowCount() ;
        } catch (PDOException $e) {
            return $e->getMessage() ;
        }
    }
}















