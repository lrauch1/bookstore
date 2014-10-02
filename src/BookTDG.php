<?php

/*
 class for working between php and sql
 */

class BookTDG implements TableDataGatewayInterface {

    private $mysqli;

    /**
     * Constructor for sailboatTDGateway class
     * 
     * @param Connection $mysqli
     */
    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }

    /**
     * Retrieve a sailboat object from the database by its PK
     * 
    
     */
    public function insert($sailboat) {

        $sql = "INSERT INTO `sailboat` VALUES (null, \"";
        $sql .= $sailboat->getName() . '", "';
        $sql .= $sailboat->getRegnum() . '", "';
        $sql .= $sailboat->getLength() . '", "';
        $sql .= $sailboat->getOwnerId() . '", "';
        $sql .= $sailboat->getImage() . '")';

        $result = $this->mysqli->query($sql);
        return $result;
    }

    public function find($id) {
        $sql = "SELECT * FROM `sailboat` WHERE `id` = $id";
        $result = $this->mysqli->query($sql);
        return $result->fetch_object('Sailboat');
    }

    public function findAll() {
        $sql = "SELECT * FROM `book`";
        $result = $this->mysqli->query($sql);
        while ($book = $result->fetch_object('Book')) {
            $books[] = $book;
        }
        return $books;
    }

   
   

    public function delete($id) {
        $sql = "DELETE from `sailboat` WHERE `id` = $id";
        return $this->mysqli->query($sql);
        // printf("Affected rows (INSERT): %d\n", $mysqli->affected_rows);
    }

    public function update($id, $data) {

        $boat = $this->find($id);

        $name = isset($data['name']) ? $data['name'] : $boat->getName();
        $reg_num = isset($data['reg_num']) ? $data['reg_num'] : $boat->getRegnum();
        $length = isset($data['length']) ? $data['length'] : $boat->getLength();
        $owner_id = isset($data['owner_id']) ? $data['owner_id'] : $boat->getOwnerId();
        $image = isset($data['image']) ? $data['image'] : $boat->getImage();

        $sql = "UPDATE `sailboat` "
        . "SET `name` = \"$name\","
        . " `reg_num` = \"$reg_num\","
        . " `length` = \"$length\","
        . " `owner_id` = \"$owner_id\","
        . " `image` = \"$image\""
            . "WHERE `id` = $id ";

return $result = $this->mysqli->query($sql);
        
    }
                
//        $sql = "UPDATE `sailboat`"
//       . " SET `name`='$name', `reg_num`='$reg_num', `length`='$length', `owner_id`='$owner_id', `image`='$image' "
//       . " WHERE `id`='$id'"
//       . " AND `name`='$data->getName()' AND `reg_num`='$data->getRegnum()' AND `length`='$data->getLength()' AND `owner_id`='$data->getOwnerId()' AND `image`='$data->getImage()' ";
    

}
