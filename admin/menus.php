<?php
/**
 * A dummy member class for this demo
 */
class member {
 
    /**
     * The first name of the member
     * @var string
     * @access private
     */
    private $first_name;
 
    /**
     * The last name of the member
     * @var string
     * @access private
     */
    private $last_name;
 
    /**
     * The email of the member
     * @var string
     * @access private
     */
    private $email;
 
    /**
     * The location of the member
     * @var string
     * @access private
     */
    private $location;
 
    /**
     * The constructor
     *
     * Sets either user provided values or default empty string to the member variables
     *
     * @param string $first_name The first name
     * @param string $last_name The last name
     * @param string $email The email
     * @param string $location The location
     */
    public function __construct($first_name = '', $last_name = '', $email = '', $location = '') {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->location = $location;
    }
 
    /**
     * Get all the member information in an array
     *
     * @access public
     * @return array
     */
    public function get_information() {
        return array(
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'location' => $this->location,
        );
    }
 
    /**
     * Set the member information
     *
     * @param string $first_name The first name
     * @param string $last_name The last name
     * @param string $email The email
     * @param string $location The location
     */
    public function set_information($first_name, $last_name, $email, $location) {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->location = $location;
    }
 
}

new member;

echo '<h3>Before Serialization</h3>';
var_dump($member);
 
echo '<h3>After Serialization</h3>';
$serialized_my_member = serialize($member);
var_dump($serialized_my_member);

echo '<h3>After UnSerialization</h3>';
$deserialized_my_member = unserialize($serialized_my_member);
var_dump($deserialized_my_member);