<?php

/**
 * Interface for PHP classes that store and retrieve PHP objects 
 * to/from a relational database.
 * 
 * @author dutchukm
 */
interface TableDataGatewayInterface {
    
    /**
     * Fetch a record from the database identified by $id
     * 
     * @return PHP Object 
     */
 //   function find($id);
    
    /**
     * Return an array of objects matching the search conditions
     * For example the argument "some_column < 5" might be passed.
     * 
     * @param String $condition The boolean condition that records must match
     * @return Array of PHP objects
     */
   // function findWhere($condition);
    
    /**
     * Return all records in the table.
     * 
     * @return Array of PHP objects
     */
    function findAll();
    
    /**
     * Save the object as a record in a table
     * 
     * @param Object $object A PHP object to store in the database
     * @return integer The id of the inserted record or null if error.
     */
    function insert($object);
    
    /**
     * Update the record identified by $id with the data in the array
     * 
     * @param integer $id The primary key of the record to update
     * @param array $data An associative array of column_names=>values
     * @return Boolean true if successful, else false.
     */
    function update($id, $data);

    /**
     * Delete a record in the database identified by $id
     * 
     * @param integer $id The primary key of the record to delete
     * @return Boolean true if successful, else false.
     */
    //function delete($id);
}
