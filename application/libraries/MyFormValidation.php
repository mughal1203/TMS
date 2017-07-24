
<?php

/**
 * Created by PhpStorm.
 * User: Mughal
 * Date: 7/23/2017
 * Time: 11:33 PM
 */
class MyFormValidation extends CI_Form_validation
{
    function __construct(array $rules = array())
    {
        parent::__construct($rules);
    }

    public function edit_unique($str, $field, $id)
    {
        sscanf($field, '%[^.].%[^.].%[^.]', $table, $field, $id);
        return isset($this->CI->db)
            ? ($this->CI->db->limit(1)->get_where($table, array($field => $str, 'user_id !=' => $id))->num_rows() === 0)
            : FALSE;
    }
}