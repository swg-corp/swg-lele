<?php

namespace models;

/**
 * @Entity
 * @Table(name="user")
 */
class User {

    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     * @var int
     */
    private $id;

    /**
     * @Column(type="string", unique=true, nullable=false)
     * @var string 
     * */
    private $username;

    /**
     * @Column(type="string")
     * @var string 
     * */
    private $password;
    /**
     * @Column(type="string")
     * @var string 
     * */
    private $role;

    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getRole() {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
    }

}

